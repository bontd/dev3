<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class News extends Model {
 
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';
    public function getMenu(){
    	$menu = DB::select('select * from categories order by created desc');
    	return $menu;
    }
    public function getAll(){
    	$new_data = DB::table('news')
    			->select('*')
    			->orderBy('created','desc')
    			->limit(16)
    			->get();
		return $new_data;		
    }
    public function getOther(){
    	$others = DB::select('select * from news order by created desc limit 17,6');
    	return $others;
    }
    public function getPhoto(){
    	$photos = DB::table('news')
    			->join('categories','news.category_id','=','categories.id')
    			->where('name','Photo news')
    			->select('news.*','categories.name')
    			->limit(3)
    			->get();
    	return $photos;
    }
    public function getVideo(){
    	$videos = DB::table('news')
    			->join('categories','news.category_id','=','categories.id')
    			->where('name','Videos')
    			->select('news.*','categories.name')
    			->limit(3)
    			->get();
    	return $videos;
    }
    public function getFooball(){
    	$fooball = DB::table('news')
				->join('categories','news.category_id','=','categories.id')
				->where('name','Bóng đá')
				->select('news.*','categories.name')
                ->orderBy('created','desc')
				->limit(3)
				->get();
		return $fooball;
    }
    public function getF1(){
    	$F1 = DB::table('news')
                ->join('categories','news.category_id','=','categories.id')
                ->where('name','Photo news')
                ->select('news.*','categories.name')
                ->orderBy('created','desc')
                ->limit(3)
                ->get();
        return $F1;
    }
    public function getViewed(){
    	$r_news = DB::table('news')
                ->select('*')
                ->orderBy('viewed','desc')
                ->limit(5)
                ->get();
        return $r_news;
    }
    public function getMain(){
    	$main = DB::table('news')->select('*')->where('category_id',$id)->orderBy('created','desc')->paginate(15);
    	return $main;
    }
}