<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Auth, Request, Session;

class UserController extends Controller
{
    public function getLogin(){
		return view($this->pathBack.'user.login')->with(
			[
				'title' => 'Login | '.$this->web_title,
				'keywords' => $this->admin_keywords,
				'description' => $this->admin_description
			]
		);
	}
	
    public function postLogin(){
		$input = Request::all();
		if (Auth::attempt(['username' => $input["username"], 'password' => $input["password"], 'status' => 1])) {
			
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
	
	public function logout(){
		Auth::logout();
	}
	
}
