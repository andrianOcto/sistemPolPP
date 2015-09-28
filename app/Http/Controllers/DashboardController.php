<?php namespace App\Http\Controllers;

use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

//Lib yang digunakan
use Crypt;
//model
use App\User;
class DashboardController extends Controller {

    public function getIndex() {
    $data['tasks'] = [
        [
            'name' => 'Design New Dashboard',
            'progress' => '87',
            'color' => 'danger'
        ],
        [
            'name' => 'Create Home Page',
            'progress' => '76',
            'color' => 'warning'
        ],
        [
            'name' => 'Some Other Task',
            'progress' => '32',
            'color' => 'success'
        ],
        [
            'name' => 'Start Building Website',
            'progress' => '56',
            'color' => 'info'
        ],
        [
            'name' => 'Develop an Awesome Algorithm',
            'progress' => '10',
            'color' => 'success'
        ]
    ];
    if(Session::get("role","default")=="master")
                return redirect("/admin");
            else
                
    return view('nganu')->with($data);
  }


  public function getLogout(Request $request)
  {
    $request->session()->flush();
    return redirect("/");
  }

  public function getPassword(Request $request)
  {
    try
    {
        $message    = "success change password";
        $status     = "success";
        $User       = User::where("username",Session::get("user",-999))->get();
        $cryptPass  = "";
        foreach ($User as $data) {
            $cryptPass = $data->password;
        }

        if($request->input("old") != Crypt::decrypt($cryptPass))
        {
            $message    = "Old Password tidak sesuai";
            $status     = "fail";
        }
        else
        {
            if($request->input("new")!=$request->input("confirm"))
            {
                $message    = "Password tidak sama dengan re-type";
                $status     = "fail";
            }
            else
            {
                $user = User::find(Session::get("user",-999));
                $user->password     = Crypt::encrypt($request->input("new"));
                $user->save();
            }
        }
        return response()->json(['status'=>$status,'message' => $message]);
        
    }
    catch(Exception $e)
    {
        return response()->json(['status'=>'fail','message' => 'Old Password Tidak Sesuai']);
    }
  }
}