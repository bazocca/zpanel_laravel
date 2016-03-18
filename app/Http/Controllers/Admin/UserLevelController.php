<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Request;
use Auth;
use Session;

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
		$sort = "id";
		$direction = "desc";
		if (isset($_GET['sort'])){
			$sort = $_GET['sort'];
		}
		if (isset($_GET['direction'])){
			$direction = $_GET['direction'];
		}
		
		$query = UserLevel::where('status','>',0)
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
				'direction' => $direction
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
		$input["status"] = 1;
		$input["id_created"] = ;
		
        $validation = Validator::make($input, UserLevel::$rules);

        if ($validation->passes())
        {
            UserLevel::create($input);
            return redirect('/'.$this->admin_prefix.'/user-level');
        }

        return redirect('/'.$this->admin_prefix.'/user-level/create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
