<?php

namespace App\Http\Controllers;
use app\Models\User;
use Illuminate\Http\Request;
use Hash;
use Session;

class AdminController extends Controller
{
    public function index(){
        $data = User::all();
        //return $data;
        return view('dashboard/user')->with('data',$data);
    }
      public function user(){
        $data = User::all();
        //return $data;
        return view('dashboard/user')->with('data',$data);
    }
    public function createUser(Request $req){
        $validated = $req->validate([
        'name' => 'required',
        'password' =>'required',
        ]);
        $username = $req['name'];
        $password = $req['password'];
         $user = User::updateOrCreate(
                    ['id' => $req['id']],
                    [
                    'username'=>$username,
                    'password'=>Hash::make($password),                   
                  ]); 
         
        if($user==TRUE){
             Session::flash('message', 'Inserted Successfully'); 
             Session::flash('alert-success', 'success');
             return redirect(route('user'));
        }
        else{
             Session::flash('message', 'Failed to Insert'); 
             Session::flash('alert-success', 'success');
             return redirect(route('user'));
        }
    }
    public function userdelete(Request $req){
        $id = $req['id'];
        $user = User::find($id)->delete();
    }
}
