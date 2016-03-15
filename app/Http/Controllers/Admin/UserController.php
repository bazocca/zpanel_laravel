<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Auth;
use Request;
use Session;

class UserController extends Controller
{
    public function getLoginAdmin(){
		if(auth()->guard('admin')->check()){
            return redirect('/zpanel/dashboard');
        }
		return view($this->pathBack.'user.login')->with(
			[
				'title' => 'Login | '.$this->web_title,
				'keywords' => $this->admin_keywords,
				'description' => $this->admin_description
			]
		);
	}
	
    public function postLoginAdmin(){
		if(auth()->guard('admin')->check()){
            return redirect('/zpanel/dashboard');
        }
		$input = Request::all();
		$auth = auth()->guard('admin');
        $credentials = [
            'username' =>  $input["username"],
            'password' =>  $input["password"],
			'status' => 1
        ];
		if ($auth->attempt($credentials)) {
			return redirect('/zpanel/dashboard');
		} else {
			return redirect('/zpanel')->with('auth-error', 'Username or password is incorrect');
		}
		return view($this->pathBack.'user.login')->with(
			[
				'title' => 'Login | '.$this->web_title,
				'keywords' => $this->admin_keywords,
				'description' => $this->admin_description
			]
		);
	}
	
	public function logoutAdmin(){
		Auth::guard('admin')->logout();
		return redirect('/zpanel');
	}	
	
}
