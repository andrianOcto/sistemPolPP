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

class RoleController extends Controller {

  public function getIndex() {

    $data['users'] = Role::all();

    if(Session::get("role","default")=="master")
                return view('/admin/role')->with($data);
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
      $user = new Role;
      $user->description = $request->input("role");
      $user->save();
      return redirect("/admin/role")->with('successMessage', 'Data berhasil ditambahkan!');
    }
    //jika user sudah ada dalam database
    catch(\Illuminate\Database\QueryException $e)
    {
      return redirect("/admin/role")->with('errMessage', 'Kode yang disimpan sudah ada dalam database. </br> Harap Coba menggunakan kode yang belum ada');
    }
  }

  public function postDelete(Request $request,$username)
  {
    try
    {
      Role::destroy($username);
      return redirect("/admin/role")->with('successMessage', 'Data berhasil dihapus!');
    }
    //jika user sudah ada dalam database
    catch(\Illuminate\Database\QueryException $e)
    {
      return redirect("/admin/role")->with('errMessage', 'Kode yang disimpan sudah ada dalam database. </br> Harap Coba menggunakan kode yang belum ada');
    }
  }

  public function postUpdate(Request $request)
  {
    try
    {
      $user = Role::find($request->input("id"));
      $user->description = $request->input("role");
      $user->save();
      return redirect("/admin/role")->with('successMessage', 'Data berhasil diupdate!');;
    }
    //jika user sudah ada dalam database
    catch(\Illuminate\Database\QueryException $e)
    {
      return redirect("/admin/role")->with('errMessage', 'Kode yang disimpan sudah ada dalam database. </br> Harap Coba menggunakan kode yang belum ada');
    }
  }

}
