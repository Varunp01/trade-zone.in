<?php



namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WithdrawModel;
use App\Models\AddPaymentModel;
use App\Models\LevelIncomeModel;
use App\Models\KycModel;
use Session;
use Hash;
use DB;

class AdminController extends Controller

{

    public function __construct(){
        // $this->middleware('admin');
    }
    public function index() {
        return view('backend.index_admin');
    }

    public function viewUser() {
        $users = User::orderBy('id','desc')->where('status','1')->get();
        return view('admin.view-user', compact('users'));
    }
    
     public function viewUserInactive() {
        $users = User::orderBy('id','desc')->where('status','0')->get();
        return view('admin.view-user-inactive', compact('users'));
    }

    public function activeInactive($id, $status) {
        $postad = User::findOrFail($id);
        if ($status == '1') {
            $newStatus = 0;
        } else {
            $newStatus = 1;
        }
        $activeDate = date('Y-m-d');
        $expireDate = date('Y-m-d',strtotime($activeDate.'+36 months'));
        // if ($postad->amount >= 5000 && $postad->amount <= 100000) {
        //     $expireDate = date('Y-m-d',strtotime($activeDate.'+25 months'));
        //     $roi = 0.4;
        // } elseif($postad->amount >= 100001 && $postad->amount <= 1500000) {
        //     $expireDate = date('Y-m-d',strtotime($activeDate.'+20 months'));
        //     $roi = 0.5;
        // } else {
        //     $expireDate = date('Y-m-d',strtotime($activeDate.'+20 months'));
        //     $roi = 0.75;
        // }
        if ($postad->user_type == 'fix_deposit') {
            $expireDate = date('Y-m-d',strtotime($activeDate.'+25 months'));
        }
        
        $postad->status = $newStatus;
       // $postad->daily_roi = $roi;
       if ($postad->activation_date == NULL || $postad->activation_date == '') {
            $postad->activation_date = $activeDate;
            $postad->expiration_date = $expireDate;
            $postad->update();
       }
        
        if ($postad->user_type == 'vip_investor') {
            return redirect()->back()->with('success','Status Updated Successfully');
            die;
        }
        if ($postad->update()) {
            if ($newStatus == 1 && $postad->release_income == 0) {
                User::where('id', $id)->update(['release_income' => 1]);
                $result1 = $this->releaseLevelIncomes($postad->referal_code,$postad->amount,$id);
            }
            
            return redirect()->back()->with('success','Status Updated Successfully');
        } else {
            return redirect()->back()->with('error','Something Went Wrong');
        }
    }
    
    public function viewwithdrawRequest($status) {
        $withdraws = WithdrawModel::where('status',$status)->get();
        return view('admin.view-withdraw-request',compact('status','withdraws'));
    }
    
    public function approveCancel($id, $status) {
        $withdraw = WithdrawModel::find($id);
        if ($status == 'approve') {
            $user = User::where('id',$withdraw->user_id)->first();
            $prevWithdraw = $user->total_withdraw;
            $updateWithdraw = $prevWithdraw+$withdraw->withdraw_amount;
            WithdrawModel::where('id', $id)->update(['status' => '1']);
            User::where('id', $withdraw->user_id)->update(['total_withdraw' => $updateWithdraw]);
            return redirect()->back()->with('success','Withdraw Approved Successfully');
        } else {
            WithdrawModel::where('id', $id)->update(['status' => '2']);
            return redirect()->back()->with('success','Withdraw Cancel Successfully');
        }
    }
    
    public function viewPaymentRequest($status) {
        $payments = AddPaymentModel::where('status',$status)->get();
        return view('admin.view-payment-request',compact('status','payments'));
    }
    
    public function approveCancelPayment($id, $status) {
        $payment = AddPaymentModel::find($id);
        if ($status == 'approve') {
            $user = User::where('id',$payment->user_id)->first();
            $prevpayment = $user->amount;
            $updatepayment = $prevpayment+$payment->amount;
            if ($updatepayment >= 5000 && $updatepayment <= 100000) {
            $roi = 0.4;
            } elseif($updatepayment >= 100001 && $updatepayment <= 1500000) {
                $roi = 0.5;
            } else {
                $roi = 0.75;
            }
            AddPaymentModel::where('id', $id)->update(['status' => '1']);
            User::where('id', $payment->user_id)->update(['amount' => $updatepayment,'daily_roi' => $roi,'status' => '1']);
            return redirect()->back()->with('success','Payment Request Approved Successfully');
        } else {
            AddPaymentModel::where('id', $id)->update(['status' => '2']);
            return redirect()->back()->with('success','Payment Request Cancel Successfully');
        }
    }
    
    public function viewUserDetail($id) {
        $user = User::where('id', $id)->first();
        $refcount = User::where('sponsor',$user->referal_code)->count();
        $kyc = KycModel::where('user_id', $id)->first();
        return view('admin.view-detail',compact('user','refcount', 'kyc'));
    }

    public function releaseLevelIncomes($referalCode,$invesAmt,$roiid) {
        // level 1 & find sponsor must be active & find commission amount
        $sponsor1 = '';
        $user = User::where(['referal_code' => $referalCode, 'status' => '1'])->first();
        if ($user) {
            $sponsor1 = $user->sponsor;
            $commissionRate = 5;
            $commission = round(($invesAmt*$commissionRate)/100);
            // if ($invesAmt <= 1500000) {
            //     $commissionRate = 8;
            //     $commission = round(($invesAmt*$commissionRate)/100);
            // } elseif ($invesAmt >= 1500001 && $invesAmt <= 3000000) {
            //     $commissionRate = 9;
            //     $commission = round(($invesAmt*$commissionRate)/100);
            // } elseif ($invesAmt >= 3000001 && $invesAmt <= 6000000) {
            //     $commissionRate = 10;
            //     $commission = round(($invesAmt*$commissionRate)/100);
            // } elseif ($invesAmt >= 6000001 && $invesAmt <= 10000000) {
            //     $commissionRate = 12;
            //     $commission = round(($invesAmt*$commissionRate)/100);
            // }
            $result3 = $this->insertLevelIncomes($sponsor1,$commission,$level = 1,$referalCode,$invesAmt,$roiid);
        }
         // level 2 & find sponsor must be active and complete 1 direct & find commission amount
        //  $sponsor2 = '';
        //  if($sponsor1!=''){
        //      $sponsor2 = $this->incomeForLevel($sponsor1,$minimundirect=1,$level=2,$referalCode,$invesAmt,$roiid);
        //  }
        //   // level 3 & find sponsor must be active and complete 2 direct & find commission amount
        // $sponser3 = '';
        // if($sponsor2!=''){
        //     $sponser3 = $this->incomeForLevel($sponsor2,$minimundirect=2,$level=3,$referalCode,$invesAmt,$roiid);
        // }
        // // level 4 & find sponsor must be active and complete 2 direct & find commission amount
        // $sponser4 = '';
        // if($sponser3!=''){
        //     $sponser4 = $this->incomeForLevel($sponser3,$minimundirect=2,$level=4,$referalCode,$invesAmt,$roiid);
        // }

        // // level 5 & find sponsor must be active and complete 3 direct & find commission amount
        // $sponser5 = '';
        // if($sponser4!=''){
        //     $sponser5 = $this->incomeForLevel($sponser4,$minimundirect=3,$level=5,$referalCode,$invesAmt,$roiid);
        // }
   
    }

    public function insertLevelIncomes($sponsor,$commission,$level,$referalCode,$investamount,$roiid) {
        // before insert check for active user only
        $user = User::where(['referal_code' => $sponsor, 'status' => '1'])->first();
        if ($user) {
            $logtime = date("Y-m-d H:i:s");
            $insData = array('referal_code'=>$sponsor, 'user_id' =>$user->id, 'amount'=>$commission, 'level'=>$level, 'fromreferal_code'=>$referalCode, 'investamount'=>$investamount, 'logtime'=>$logtime, 'insert_is_user'=>$roiid);
            LevelIncomeModel::insert($insData);
             // insert a transaction
            // update wallet in line 397 purchase controller
            // $levelWallet = LevelWalletModel::where('referal_code', $sponsor)->first();
            // if ($levelWallet) {
               
                $oldamt = $user->total_level_amt;
                $newamt = $oldamt+$commission;
                User::where('referal_code', $sponsor)->update(['total_level_amt' => $newamt]);
            }
        }
    

    public function incomeForLevel($sponsor,$minimundirect,$level,$referalCode,$investamount,$roiid) {
        $sponsor1 = '';
        $user = User::where(['referal_code' => $sponsor, 'status' => '1'])->first();
        if ($user) {
            $sponsor1   = $user->sponsor;
             // also check direct from this referal_code
            //  $directsponsor = 0;
            //  $datasponsor = User::where(['sponsor' => $sponsor1, 'status' => '1'])->get();
            //  if ($datasponsor) {
            //     $directsponsor = count($datasponsor);
            //     if ($directsponsor >= $minimundirect) {
            //         $commissionRate = CommissionRateModel::where(['level' => $level, 'status' => '1'])->first();
            if ($level == 2) {
                $commissionRate = 2;
                $commission = round(($investamount*$commissionRate)/100);
            } elseif($level == 3) {
                $commissionRate = 1;
                $commission = round(($investamount*$commissionRate)/100);
            } elseif($level == 4) {
                $commissionRate = 0.5;
                $commission = round(($investamount*$commissionRate)/100);
            } elseif($level == 5) {
                $commissionRate = 0.5;
                $commission = round(($investamount*$commissionRate)/100);
            }
                
                $result3 = $this->insertLevelIncomes($sponsor1,$commission,$level,$referalCode,$investamount,$roiid);
                // }
            // }
        }
        return $sponsor1;
    }

    public function changePassword(Request $request) {
        if ($request->password == $request->con_password) {
            $pass = Hash::make($request->password);
            User::where('id',$request->hidden_id_pass)->update(['password' => $pass]);
            return redirect()->back()->with('success','Password changed successfully');
        } else {
            return redirect()->back()->with('error','Password and confirm poassword do not match');
        }
    }

    public function updateRoi(Request $request) {
        User::where('id',$request->hidden_id_roi)->update(['monthly_roi' => $request->roi, 'first_level' => $request->first_roi]);
        return redirect()->back()->with('success','Roi Updated Successfully');
    }

    public function addInvestor(Request $request) {
        if ($request->isMethod('post')) {
            $request->validate([
                'password' => 'required',
                'email' => 'required|unique:users',
                'confirm_password' => 'required|same:password',
            ]);
            if ($request->referral_code) {
                $sponsor = User::where('referal_code',$request->referral_code)->first();
                if ($sponsor) {
                    $user = new User;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = Hash::make($request->password);
                    $user->phone = $request->phone;
                    $user->monthly_roi = $request->monthly_roi;
                    $user->user_type = 'vip_investor';
                    // $user->aadharno = $request->aadharno;
                    $user->amount = $request->amount;
                    $user->sponsor = $request->referral_code;
                    //$user->plan = $request->plan;
                    if ($user->save()) {
                        $randomletter = strtoupper(substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 3));
                        $referalCode = 'RYG'.(99+$user->id).$randomletter;
                        $userPass = " User Name: "."RYG".(99+$user->id)." Password: ".$request->password;
                         $update = User::where('id', $user->id)->update(['referal_code' => $referalCode,'user_name' => "RYG".(99+$user->id)]);
                         if ($update) {
                            return redirect()->back()->with('success','You are registered successfully. Your Referal Code is '.$referalCode.$userPass);
                         } else {
                            return redirect()->back()->with('error','Something went wrong');
                         }
                    } else {
                        return redirect()->back()->with('error','Something went wrong');
                    }
            } else {
                 return redirect()->back()->with('error','You entered invalid referal code please check');
            }
            
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->monthly_roi = $request->monthly_roi;
            $user->user_type = 'vip_investor';
            // $user->aadharno = $request->aadharno;
            $user->amount = $request->amount;
            $user->sponsor = $request->referral_code;
           // $user->plan = $request->plan;
            if ($user->save()) {
                $randomletter = strtoupper(substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 3));
                $referalCode = 'RYG'.(99+$user->id).$randomletter;
                $userPass = " User Name: "."RYG".(99+$user->id)." Password: ".$request->password;
                 $update = User::where('id', $user->id)->update(['referal_code' => $referalCode,'user_name' => "RYG".(99+$user->id)]);
                 if ($update) {
                    return redirect()->back()->with('success','You are registered successfully. Your Referal Code is '.$referalCode.$userPass);
                 } else {
                    return redirect()->back()->with('error','Something went wrong');
                 }
            } else {
                return redirect()->back()->with('error','Something went wrong');
            }
        }
        }
        return view('admin.add-investor');
    }

    public function viewInvestor() {
        $users = User::orderBy('id','desc')->where('user_type','vip_investor')->get();
        return view('admin.view-investor', compact('users'));
    }

    public function addInvestorFix(Request $request) {
        if ($request->isMethod('post')) {
            $request->validate([
                'password' => 'required',
                'email' => 'required|unique:users',
                'confirm_password' => 'required|same:password',
            ]);
            if ($request->referral_code) {
                $sponsor = User::where('referal_code',$request->referral_code)->first();
                if ($sponsor) {
                    $user = new User;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = Hash::make($request->password);
                    $user->phone = $request->phone;
                    $user->monthly_roi = $request->monthly_roi;
                    $user->user_type = 'fix_deposit';
                    // $user->aadharno = $request->aadharno;
                    $user->amount = $request->amount;
                    $user->sponsor = $request->referral_code;
                    //$user->plan = $request->plan;
                    if ($user->save()) {
                        $randomletter = strtoupper(substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 3));
                        $referalCode = 'RYG'.(99+$user->id).$randomletter;
                        $userPass = " User Name: "."RYG".(99+$user->id)." Password: ".$request->password;
                         $update = User::where('id', $user->id)->update(['referal_code' => $referalCode,'user_name' => "RYG".(99+$user->id)]);
                         if ($update) {
                            return redirect()->back()->with('success','You are registered successfully. Your Referal Code is '.$referalCode.$userPass);
                         } else {
                            return redirect()->back()->with('error','Something went wrong');
                         }
                    } else {
                        return redirect()->back()->with('error','Something went wrong');
                    }
            } else {
                 return redirect()->back()->with('error','You entered invalid referal code please check');
            }
            
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->monthly_roi = $request->monthly_roi;
            $user->user_type = 'fix_deposit';
            // $user->aadharno = $request->aadharno;
            $user->amount = $request->amount;
            $user->sponsor = $request->referral_code;
           // $user->plan = $request->plan;
            if ($user->save()) {
                $randomletter = strtoupper(substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 3));
                $referalCode = 'RYG'.(99+$user->id).$randomletter;
                $userPass = " User Name: "."RYG".(99+$user->id)." Password: ".$request->password;
                 $update = User::where('id', $user->id)->update(['referal_code' => $referalCode,'user_name' => "RYG".(99+$user->id)]);
                 if ($update) {
                    return redirect()->back()->with('success','You are registered successfully. Your Referal Code is '.$referalCode.$userPass);
                 } else {
                    return redirect()->back()->with('error','Something went wrong');
                 }
            } else {
                return redirect()->back()->with('error','Something went wrong');
            }
        }
        }
        return view('admin.add-investor-fix');
    }

    public function viewInvestorFix() {
        $users = User::orderBy('id','desc')->where('user_type','fix_deposit')->get();
        return view('admin.view-investor', compact('users'));
    }

    public function addMdgroup(Request $request) {
        return view('admin.add-mdgroup');
    }

    public function viewMdGroup() {

    }

    public function logout() {
        session()->forget('getuid');
        session()->flush();
        return redirect('/admin');
    }






    

}
