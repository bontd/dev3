<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Crypt;
use App\Http\Requests;

class NewsController extends Controller
{
	public function __construct(){
		
	}
    public function index(){
    	$news = DB::select('select * from news order by id desc limit 16');
    	$shift = array_shift($news);
    	//print_r($shift);die;
    	
    	$other = DB::select('select * from news order by created desc limit 5');
    	//print_r($other);die;
    	$photo = DB::table('news')
    			->join('categories','news.category_id','=','categories.id')
    			->where('name','Photo news')
    			->select('news.*','categories.name')
    			->limit(3)
    			->get();
    	$video = DB::table('news')
    			->join('categories','news.category_id','=','categories.id')
    			->where('name','Videos')
    			->select('news.*','categories.name')
    			->limit(3)
    			->get();
		$fooball = DB::table('news')
				->join('categories','news.category_id','=','categories.id')
				->where('name','Bóng đá')
				->select('news.*','categories.name')
				->limit(3)
				->get();
		$fooballs = array_shift($fooball);
		$menu = DB::select('select * from categories order by created desc');
    		return view('news.index',['news'=>$news, 'shift'=>$shift,'other'=>$other,'photo'=>$photo,'video'=>$video,'fooball'=>$fooball,'fooballs'=>$fooballs,'menu'=>$menu]);
    }
    public function view($id){
    	$id = Crypt::decrypt($id);
    	//var_dump($id);die;
    	$menu = DB::select('select * from categories order by created desc');
    	$views = DB::select('select * from news where id='.$id);

    	//print_r($views);die;
    	return view('news.detail',['views'=>$views,'menu'=>$menu]);
    }
    public function category($id){
        $id = Crypt::decrypt($id);
    	$menu = DB::select('select * from categories order by created desc');
    	$main = DB::table('news')->select('*')->where('category_id',$id)->paginate(15);
    	//print_r($main);die;
    	return view('news.category',['main'=>$main,'menu'=>$menu]);
    }
}
