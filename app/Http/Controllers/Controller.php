<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public $admin_prefix = "zpanel";
	public $pathBack  = "back.";
	public $pathFront = "front.";
	public $web_title = "ZPANEL LARAVEL 5.2";
	public $admin_keywords = "Admin Keywords";
	public $admin_description = "Admin Description";
	
	public function __construct()
	{
		View::share('admin_prefix', $this->admin_prefix);
	}	
	
}
