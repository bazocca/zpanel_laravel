<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Request;
use Validator;
use DB;
use Auth;
use Session;
use Redirect;

use App\Models\UserLevel;

class UserLevelController extends Controller
{
	public $title = "Master User Level";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$search = "";
		if (isset($_GET["search"])){
			$search =  $_GET["search"];
		}
		
		$sort = "id";
		$direction = "desc";
		if (isset($_GET['sort'])){
			$sort = $_GET['sort'];
		}
		if (isset($_GET['direction'])){
			$direction = $_GET['direction'];
		}
		$query = UserLevel::whereRaw('status > 0 AND (level_name LIKE "%'.$search.'%")')
					->select('id', 'level_name', 'updated_at', 'status')
					->orderBy($sort, $direction)
					->paginate(2);
		return view($this->pathBack.'user_level.index')->with(
			[
				'title' => $this->title.' | '.$this->web_title,
				'keywords' => $this->admin_keywords,
				'description' => $this->admin_description,
				'content' => $query,
				'sort' => $sort,
				'direction' => $direction,
				'search' => $search
			]
		);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view($this->pathBack.'user_level.create')->with(
			[
				'title' => $this->title.' | Create | '.$this->web_title,
				'keywords' => $this->admin_keywords,
				'description' => $this->admin_description
			]
		);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
		$input = Request::all();
		$table_id = DB::table('user_levels')
                ->orderBy('id', 'desc')
				->take(1)
				->value('id');
		if (empty($table_id)){
			$table_id = 1;
		} else {
			$table_id++;
		}
		$input["id"] = $table_id;
		$input["status"] = 1;
		$input["id_created"] = auth()->guard('admin')->user()->id;
		$input["id_modified"] = auth()->guard('admin')->user()->id;
        $validation = Validator::make($input, UserLevel::$rules, UserLevel::$messages);
        if ($validation->passes())
        {
            UserLevel::create($input);
            return redirect('/'.$this->admin_prefix.'/user-level')->with('alert-success', 'Data has been saved');
        }
        return redirect('/'.$this->admin_prefix.'/user-level/create')
            ->withInput()
            ->withErrors($validation);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$query = UserLevel::find($id);
		return view($this->pathBack.'user_level.show')->with(
			[
				'title' => $this->title.' | View | '.$this->web_title,
				'keywords' => $this->admin_keywords,
				'description' => $this->admin_description,
				'content' => $query
			]
		);
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$query = UserLevel::find($id);
		return view($this->pathBack.'user_level.edit')->with(
			[
				'title' => $this->title.' | Update | '.$this->web_title,
				'keywords' => $this->admin_keywords,
				'description' => $this->admin_description,
				'content' => $query
			]
		);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
		$input = Request::all();
		$input["id_modified"] = auth()->guard('admin')->user()->id;
        $validation = Validator::make($input, UserLevel::$rules, UserLevel::$messages);
        if ($validation->passes())
        {
			$query = UserLevel::find($id);
            $query->update($input);			
            return redirect('/'.$this->admin_prefix.'/user-level')->with('alert-success', 'Data has been saved');
        }
		
		return Redirect::route($this->admin_prefix.'.user-level.edit', $id)
				->withInput()
				->withErrors($validation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$input["id_modified"] = auth()->guard('admin')->user()->id;
		$input["status"] = 0;
		$query = UserLevel::find($id);
		$query->update($input);			
		return redirect('/'.$this->admin_prefix.'/user-level')->with('alert-success', 'Data has been deleted');
    }
}
