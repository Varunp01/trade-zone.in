<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\backend\TblAdmin;
use App\Models\backend\CreateUser;

class CustomloginController extends Controller
{

    public function index(Request $request){
        if($request->session()->get('privetkey')=='admincmd'){
          return redirect('admin/dashboard')  ;
        }
        return view('backend.login');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            $username=$data['val-username'];
            $password=md5($data['val-password']);
            $login=TblAdmin::where(['username'=>$username,'password'=>$password])->first();
            if($login){
                $permission = explode(',',$login->permission);
                Session::put('permission',$permission);
                // Session::put('privetkey','admincmd');
                Session::put('getuid',$login->id);
                return redirect('admin/dashboard');
            }else{
                return redirect()->back()->with('error','Email and password do not match.');
            }
        }
    }

    // for crm controller
    public function indexCms(Request $request){
        if($request->session()->get('privetkey')=='telecaller'){
          return redirect('crm/telecaller/dashboard');
        }
        if($request->session()->get('privetkey')=='manager'){
          return redirect('crm/manager/dashboard');
        }
        if($request->session()->get('privetkey')=='technician'){
          return redirect('crm/technician/dashboard');
        }
        return view('crm.login');
    }

    public function loginCms(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            $username=$data['val-username'];
            $password=md5($data['val-password']);
            // $login=CreateUser::where(['email'=>$username,'password'=>$password])->first();
            $login=CreateUser::where(['email'=>$username])->orWhere(['contact'=>$username])->first();
            if($login){
                if($login->password==$password){
                    Session::put('privetkey',$login->role);
                    Session::put('getuid',$login->id);
                    Session::put('getuname',$login->name);
                    $url="crm/".$login->role."/dashboard";
                    return redirect($url);
                }else{
                    return redirect()->back()->with('error','Email and password do not match.');
                }
            }else{
                return redirect()->back()->with('error','Email and password do not match.');
            }
        }
    }


}
