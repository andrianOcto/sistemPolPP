<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Crypt;
use Session;
//Model yang digunakan
use App\User;

class AdminController extends Controller {

  public function getIndex() {

    $data['users'] = User::all();

    if(Session::get("role","default")=="master")
                return view('/admin/home')->with($data);
            else
                return redirect('/');
    
  }


  public function getLogout(Request $request)
  {
    $request->session()->flush();
    return redirect("/");
  }

  public function postRegister(Request $request)
  {
    $user = new User;
    $user->username = $request->input("username");
    $user->nama = $request->input("nama");
    $user->role = $request->input("role");
    $user->password = Crypt::encrypt($request->input("password"));
    $user->save();
    return redirect("/");
  }

  public function postDelete(Request $request,$username)
  {
    User::destroy($username);
    return redirect("/");
  }

  public function postUpdate(Request $request)
  {
    $user = User::find($request->input("username"));
    $user->nama = $request->input("nama");
    $user->role = $request->input("role");
    $user->password = Crypt::encrypt($request->input("password"));
    $user->save();
    return redirect("/");
  }

}
