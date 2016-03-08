<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Auth, Request, Session;

class DashboardController extends Controller
{
    public function index(){
		return view($this->pathBack.'dashboard')->with(
			[
				'title' => 'Dashboard | '.$this->web_title,
				'keywords' => $this->admin_keywords,
				'description' => $this->admin_description
			]
		);
	}
}
