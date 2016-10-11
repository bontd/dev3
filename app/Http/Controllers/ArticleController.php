<?php 
namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
 
use Illuminate\Http\Request;
 
class ArticleController extends Controller {
 

	public function index(){
		$users = DB::select('select * from users order by id desc');

    return view('articles.index', ['users' => $users]);
	}
	public function add(){
		$a ="abc";
		return view('articles.add',['add' =>$a]);
	}

	
}