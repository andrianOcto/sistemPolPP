<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Crypt;
use Session;
//Model yang digunakan
use App\User;
use App\Role;

class AdminController extends Controller {

  public function getIndex() {

    $data['users'] = User::all();
    $data['role']  = Role::all();

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
    try
    {
      $user = new User;
      $user->username = $request->input("username");
      $user->nama = $request->input("nama");
      $user->role = $request->input("role");
      $user->password = Crypt::encrypt($request->input("password"));
      $user->save();
      return redirect("/admin")->with('successMessage', 'Data berhasil ditambahkan!');
    }
    //jika user sudah ada dalam database
    catch(\Illuminate\Database\QueryException $e)
    {
      return redirect("/admin")->with('errMessage', 'Kode yang disimpan sudah ada dalam database. </br> Harap Coba menggunakan kode yang belum ada');
    }
  }

  public function postDelete(Request $request,$username)
  {
    try
    {
      User::destroy($username);
      return redirect("/admin")->with('successMessage', 'Data berhasil dihapus!');
    }
     //jika user sudah ada dalam database
    catch(\Illuminate\Database\QueryException $e)
    {
      return redirect("/admin")->with('errMessage', 'Kode yang disimpan sudah ada dalam database. </br> Harap Coba menggunakan kode yang belum ada');
    }
  }

  public function postUpdate(Request $request)
  {
    try
    {
      $user = User::find($request->input("username"));
      $user->nama = $request->input("nama");
      $user->role = $request->input("role");
      $user->password = Crypt::encrypt($request->input("password"));
      $user->save();
      return redirect("/")->with('successMessage', 'Data berhasil diupdate!');;
    }
     //jika user sudah ada dalam database
    catch(\Illuminate\Database\QueryException $e)
    {
      return redirect("/")->with('errMessage', 'Kode yang disimpan sudah ada dalam database. </br> Harap Coba menggunakan kode yang belum ada');
    }
  }

}
