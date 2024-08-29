<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoiModel;
use App\Models\WithdrawModel;
use App\Models\AddPaymentModel;
use App\Models\KycModel;
use Hash;
use Session;
use DB;

class UserController extends Controller
{
    
    public function userDashboard() {
        return view('backend.index');
    }

    public function userStatus() {
        $userId = session()->get('user_id');
        $user = User::where('id',$userId)->first();
        return view('user.view-status', compact('user'));
    }
    
    public function viewReferal() {
        $referalCode = session()->get('referal_code');
        $users = User::where('sponsor',$referalCode)->get();
        return view('user.view-referal', compact('users'));
    }
    
    public function viewWithdraw() {
        $userId = session()->get('user_id');
        $users = WithdrawModel::where('user_id',$userId)->get();
        return view('user.view-withdraw', compact('users'));
    }
    
    public function dailyRoi() {
        $data = date('Y-m-d');
        $day = date('l');
        $prev_date = date('Y-m-d', strtotime($data .' -1 day'));
        if ($day == 'Saturday' || $day == 'Sunday') {
            return false;
        }
       // dd($day);
        $users = User::where('expiration_date','>=', $data)->where('status','1')->where('plan','0')->get();
        if ($users) {
            foreach ($users as $user) {
                $roi = $user->daily_roi;
                $prevRoi =  $user->total_roi;
                $dailyRoi = ($roi*$user->amount)/100;
                $nextRoi = $prevRoi+$dailyRoi;
                $insData = array(
                        'user_id' => $user->id,
                        'roi_amount' => $dailyRoi
                    );
                    RoiModel::insert($insData);
                    User::where('id',$user->id)->update(['total_roi' => $nextRoi]);
                    $sponsorId = User::where(['sponsor' => $user->referal_code, 'status' => '1'])->get(['id']);
                    foreach ($sponsorId as $id) {
                        // $todayRoi = RoiModel::where('user_id',$id)->where('created_at','like','%'.$prev_date.'%')->first()->roi_amount;
                        // $sroi = $suser->daily_roi;
                        // $sprevRoi =  $suser->total_roi;
                        // $sdailyRoi = ($sroi*$suser->amount)/100;
                        $specialRoi = (10*$dailyRoi)/100;
                        $specialIns = [
                                'user_id' => $user->id,
                                'from_id' => $id->id,
                                'special_amt' => $specialRoi
                            ];
                            DB::table('special_income')->insert($specialIns);
                            $prevSpecial = $user->total_special_amt;
                            $newSpecial = $prevSpecial+$specialRoi;
                            User::where('id',$user->id)->update(['total_special_amt' => $newSpecial]);
                    }
                
            }
        }
    }
    
    public function withdrawRequest(Request $request) {
        $userId = session()->get('user_id');
        $user = User::where('id',$userId)->first();
        if ($user) {
            $availableAmt = $user->total_roi-$user->total_withdraw;
        } else {
            $availableAmt = 0;
        }
        if ($request->isMethod('post')) {
            $requestAmt = $request->request_amt;
            if ($requestAmt < 500) {
                return redirect()->back()->with('error','Minimum amount should be 500');
            }
            if ($requestAmt > $availableAmt) {
                return redirect()->back()->with('error','Insufficient balance please check your wallet amount');
            } else {
                $withdraw = new WithdrawModel;
                $withdraw->user_id = $userId;
                $withdraw->withdraw_amount = $requestAmt;
                $withdraw->save();
                return redirect()->back()->with('success','Your request has been submitted successfully');
            }
            
        }
        return view('user.withdraw-request', compact('availableAmt'));
    }
    
    public function addPayment(Request $request) {
        $userId = session()->get('user_id');
        if ($request->isMethod('post')) {
            $addPayment = new AddPaymentModel;
            $addPayment->user_id = $userId;
            $addPayment->amount = $request->amount;
            if ($addPayment->save()){
                return redirect()->back()->with('success','Your request has been submitted successfully');
            } else {
                return redirect()->back()->with('error','Something went wrong');
            }
            
        }
        return view('user.add-payment');
    }
    
    public function viewPayment(){
        $userId = session()->get('user_id');
        $users = AddPaymentModel::where('user_id',$userId)->get();
        return view('user.view-payment', compact('users'));
    }

    public function viewRoy() {
        $userId = session()->get('user_id');
        $users = RoiModel::where('user_id',$userId)->orderBy('id','desc')->get();
        return view('user.view-roy', compact('users'));
    }
    
    public function viewProfile(Request $request) {
        $userId = session()->get('user_id');
        $user = User::where('id',$userId)->first();
        if ($request->isMethod('post')) {
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            if ($user->save()) {
             return redirect()->back()->with('success','Your profile updated successfully');
            } else {
                return redirect()->back()->with('error','Something went wrong');
            }
        }
        return view('user.update-profile', compact('user'));
    }
    
    public function completeKyc(Request $request) {
        $userId = session()->get('user_id');
       // $user = User::where('id',$userId)->first();
        if ($request->isMethod('post')) {
            $user = new KycModel;
            $user->user_id = $userId;
            $user->adhar_no = $request->adhar_no;
            $user->pan_no = $request->pan_no;
            $user->account_no = $request->account_no;
            $user->ifsc_code = $request->ifsc_code;
            if ($passbook = $request->file('passbook')) {
                $passbookname = time().'_'.$passbook->getClientOriginalName();
                $passbook->move(public_path('kyc'), $passbookname);
                $user->passbook = $passbookname;
            }
            if ($adhar_back = $request->file('adhar_back')) {
                $adhar_backname = time().'_'.$adhar_back->getClientOriginalName();
                $adhar_back->move(public_path('kyc'), $adhar_backname);
                $user->adhar_back = $adhar_backname;
            }
            if ($adhar_front = $request->file('adhar_front')) {
                $adhar_frontname = time().'_'.$adhar_front->getClientOriginalName();
                $adhar_front->move(public_path('kyc'), $adhar_frontname);
                $user->adhar_front = $adhar_frontname;
            }
            if ($pan_pic = $request->file('pan_pic')) {
                $pan_picname = time().'_'.$pan_pic->getClientOriginalName();
                $pan_pic->move(public_path('kyc'), $pan_picname);
                $user->pan_pic = $pan_picname;
            }
            if ($user->save()) {
             return redirect()->back()->with('success','Kyc updated successfully');
            } else {
                return redirect()->back()->with('error','Something went wrong');
            }
        }
        return view('user.complete-kyc');
    }
    
     public function levelTeam($companyid, $level) {
        try {
             $companyid = base64_decode($companyid);
            // session()->put('referalId' , $companyid);
            // $level = decrypt($level);
            $allcompanyid = array();
            $companyid    = explode(',', $companyid);
            //return $companyid;
            $sponserdata1 = $this->fetchSposerdata($companyid);
            //return $sponserdata1;
            if($level==1){ $allcompanyid = $this->fetchUserdata($sponserdata1); }
   
            $sponserdata2 = $this->fetchSposerdata($sponserdata1);
            if($level==2){ $allcompanyid = $this->fetchUserdata($sponserdata2); }
           
            $sponserdata3 = $this->fetchSposerdata($sponserdata2);
            if($level==3){ $allcompanyid = $this->fetchUserdata($sponserdata3); }
   
            $sponserdata4 = $this->fetchSposerdata($sponserdata3);
            if($level==4){ $allcompanyid = $this->fetchUserdata($sponserdata4); }
   
            $sponserdata5 = $this->fetchSposerdata($sponserdata4);
            if($level==5){ $allcompanyid = $this->fetchUserdata($sponserdata5); }
   
            $sponserdata6 = $this->fetchSposerdata($sponserdata5);
            if($level==6){ $allcompanyid = $this->fetchUserdata($sponserdata6); }

            return view('user.view-level-team', compact('allcompanyid'));
            //return $allcompanyid;
               
        } catch (\Exception $ex) {
            return redirect()->back()->with('error','Something went wrong');
            }
       
       
    }
   
    public function fetchSposerdata($allcompanyid) {
        $code = [];
        if (!empty($allcompanyid)) {
            $user = User::where('sponsor', $allcompanyid)->get(['referal_code']);
            foreach($user as $u) {
                $code[] = $u->referal_code;
            }
        }
        
        return $code;
    }
   
    public function fetchUserdata($allcompanyid) {
        $sponser_array = array();
        if (!empty($allcompanyid)) {
            $sponser_array = User::whereIn('referal_code', $allcompanyid)->get();
        }
        
        return $sponser_array;    
    }
    
    public function directTeam() {
        $userId = session()->get('user_id');
        $user = User::where('id',$userId)->first();
        $teams = User::where('sponsor',$user->referal_code)->get();
        return view('user.view-direct-team', compact('teams'));
    }



    public function userLogout() {
        session()->forget('user_id');
        session()->flush();
        return redirect('/');
    }
    
    
    
    
    
}