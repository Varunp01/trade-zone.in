<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\CreateUser;
class CreateuserController extends Controller
{
    //
    public function __construct(){
        $this->middleware('admin');
    }
    public function viewUser(Request $request){
       
        $users=CreateUser::all();
        return view('backend.create-user',compact('users'));
    }
    public function addUser(Request $request){
        if($request->isMethod('post')){
            $check=CreateUser::where('name',$request->name)->get();
            $count=count($check);
            $adduser=new CreateUser;
            $adduser->name=$request->name;
            $adduser->email=$request->email;
            $adduser->contact=$request->contact;
            $adduser->password=md5($request->password);
            $adduser->role=$request->type;
            if($adduser->save()){
                return redirect()->back()->with('success','User added successfully.');
            }else{
                return redirect()->back()->with('error','Something went wrong .');
            } 
             
        }else{
            return redirect()->back()->with('error','Something went wrong .');
        }      
    }
    public function showModalUser($id){
     $user = CreateUser::find($id);return view('backend.del-user', compact('user'));
    }
    public function deleteUser(Request $request,$id){
        if($request->isMethod('post')){
            $user = CreateUser::find($id);            
            if($user->delete()){
                return redirect()->back()->with('success','User deleted successfully.');
            }else{
                return redirect()->back()->with('error','Something went wrong .');
            }  
        }else{
            return redirect()->back()->with('error','Something went wrong .');
        } 
    }

}
