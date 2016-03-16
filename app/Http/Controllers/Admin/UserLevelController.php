<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Auth;
use Request;
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
					->orderBy($sort, $direction)
					->paginate(1);
		
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
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
