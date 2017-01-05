<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Crypt;
use App\Http\Requests;
use App\Models\News;

class NewsController extends Controller
{
	public function __construct(){
		//$menu = DB::table('categories')->select('*')->orderBy('created','desc')->get();
	}
    public function index(){
        $news = new News();
        $v_data = $news->getAll();
        $shift = array_shift($v_data);
        //dd($shift);
        //dd($v_data);
    	$other = $news->getOther();
    	$photo = $news->getPhoto();
    	$video = $news->getVideo();
		$fooball = $news->getFooball();
        $F1 = $news->getF1();
        $r_news = $news->getViewed();
        //dd($news);
		$fooballs = array_shift($fooball);
        $f1_other = array_shift($F1);
		$menu = $news->getMenu();
    	return view('news.index',['news'=>$v_data, 'shift'=>$shift,'other'=>$other,'photo'=>$photo,'video'=>$video,'fooball'=>$fooball,'fooballs'=>$fooballs,'menu'=>$menu,'F1'=>$F1,'f1_other'=>$f1_other,'r_news'=>$r_news]);
    }
    public function view($id){
    	$id = Crypt::decrypt($id);
        $news = new News();
    	//var_dump($id);die;
    	$menu = $news->getMenu();
    	$views = DB::table('news')->select('*')->where('id',$id)->first();
        DB::update('update news set viewed = viewed +1 where id='.$id);
        $r_news = $news->getViewed();
    	return view('news.detail',['views'=>$views,'menu'=>$menu,'r_news'=>$r_news]);
    }
    public function category($id){
        $id = Crypt::decrypt($id);
        $news = new News();
    	$menu = $news->getMenu();
        $category = DB::table('categories')->select('*')->where('id',$id)->first();
    	$main = DB::table('news')->select('*')->where('category_id',$id)->orderBy('created','desc')->paginate(15);
        $r_news = $news->getViewed();
    	return view('news.category',['main'=>$main,'menu'=>$menu,'category'=>$category,'r_news'=>$r_news]);
    }
}
