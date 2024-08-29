<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class FrontController extends Controller
{
    
    public function contact() {
        return view('frontend.contact');
    }

    public function termCondition() {
        return view('frontend.term-and-condition');
    }

    public function register(Request $request) {
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
                    // $user->address = $request->address;
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
            // $user->address = $request->address;
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
        return view('frontend.registration');
    }

    public function login(Request $request) {
        if ($request->isMethod('post')) {
            $user = User::where('email',$request->email)->orWhere('phone',$request->email)->orWhere('user_name',$request->email)->first();
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    session()->put('user_id',$user->id);
                    session()->put('referal_code', $user->referal_code);
                    return redirect()->route('user.dashboard');
                } else {
                    return redirect()->back()->with('error','Invalid email or password');
                }
            } else {
                return redirect()->back()->with('error','Email does not exist');
            }
        }
        return view('frontend.log-in');
    }

    



}
