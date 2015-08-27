<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//lib yang digunakan
use Log;
use Session;
use Crypt;

//Model yang digunakan
use App\User;

class LoginController extends Controller {


  public function getLogin()
  {
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
    return view('login')->with($data);
  }

  public function postLogin(Request $request)
  {
    $username = User::where("username",$request->input("username"));
    $password = "";
    $role     = "";
    
    //jika username ditemukan 
    if($username->count() == 1)
    {
        foreach ($username->get() as $users) {
            $password =  $users->password;
            $role     =  $users->role;
            $user     =  $users->username;
        }

        $decryptPass = Crypt::decrypt($password);
        //cek password apakah sesuai
        if( $decryptPass == $request->input("password"))
        {
            //set session
            Session::put('user', $users->username);  
            Session::put('name',$users->nama);
            Session::put('role', $role);    
            return redirect("/");
        }
        return back()->withInput();
    }
    else
    {
        return back()->withInput();
    }
    
  }
}
