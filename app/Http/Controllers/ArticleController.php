<?php 
namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
 
class ArticleController extends Controller {
 
    public function __construct(){
        
        
        session::has('admin_id');
        session::has('admin_name');
            //echo 'cos session';
        
    }
	public function index(){
    
        if(session::has('admin_name')){
            //echo 'có session';
            $articles = DB::table('articles')
            ->join('users','articles.user_id','=','users.id')
            ->select('articles.*', 'users.name')
            ->get();
            //echo $articles;
            return view('articles.index', ['articles' => $articles]);
        }
        else{
            //echo 'khong có session';
            return redirect()->action('AuthController@login');
        }
	}
    public function testpost(){

    	return view('articles.postForm');
    }
    public function store(Request $request){
        $session = session::get('admin_id');
        $rules = [
            'name'=>'required|min:5',
            'author'=>'required|min:2',
            'myFile'=>'required|file',
            'content'=>'required'
        ];
        $mess = [
            'name.required'=>trans('mess.name'),
            'name.min'=>trans('mess.nameMin'),
            'author.min'=>trans('mess.author'),
            'content.required'=>trans('mess.content')
        ];
        $validator = Validator::make($request->all(),$rules,$mess);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        else{
            if($request->hasFile('myFile')){
                $file = $request->file('myFile');
                $fileName = $file->getClientOriginalName('myFile');
                $file ->move('./public/image',$fileName);
                DB::table('articles')->insert([
                    'title' =>$request->name,
                    'author' =>$request->author,
                    'file'=>$fileName,
                    'content'=>$request->content,
                    'user_id'=>$session
                    ]);
                return redirect()->action('ArticleController@index');
            }else{
                echo "Chua co file";
            }
        }
    }
    public function edit($id){
    	// if($_POST){
        //     echo '<pre>';
        // print_r($id);die('cccccccccc');
     //    }
    	$edit = DB::select('select * from articles where id='.$id);
    	return view('articles.edit',['edit' => $edit]);
    }
    public function update(Request $request){
        //var_dump($id);die;
        //var_dump($request->all());die;
        //$session = sesssion::get('admin_id');
        $rules = [
            'name' =>'required|min:5',
            'author' => 'required',
            'myFile'=>'required'
            //'content'=>'request'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator ->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        else{
            if($request->hasFile('myFile')){
                $file = $request->file('myFile');
                $fileName = $file->getClientOriginalName('myFile');
                $file ->move('./public/image',$fileName);
            DB::table('articles')
            ->where('id',$request->id)
            ->update([
            'title'=>$request->name, 
            'author'=>$request->author, 
            'file'=>$fileName,
            'content'=>$request->content
            //'user_id'=>$session,
            //'content'=>$request
            ]);
        return redirect()->action('ArticleController@index');
            
            }
            else{
                //echo 'Chưa có file Ảnh';
                return redirect()->back();
            }
        }
        
    }
    public function destroy(){
    	
    	$o_response = new \stdclass();
        $i_id = Input::get('id');
        $i_id = (int)$i_id;
        $b_update = DB::table('articles')->where('id',$i_id)->delete();
        
        if($b_update){
            $o_response->delete = 'ok';
        }
        else{
            $o_response->delete = 'error';
        }
        
        //if()
        // DB::table('users')->where('id',$id)->update(['status'=>1]);
        // return redirect()->action('AuthController@index');
        // }
        // public function closed($id){
        // //if()
        // DB::table('users')->where('id',$id)->update(['status'=>0]);
        // return redirect()->action('AuthController@index');
        //echo 'cal xong';
        echo json_encode($o_response);
    }
    public function postFile(Request $request){
        if($request->hasFile('myFile')){
            $file = $request->file('myFile');
            
            if($fileName = $file->getClientOriginalExtension('myFile') == 'jpg' ){
                $fileName = $file->getClientOriginalName('myFile');
                $file ->move('./public/image',$fileName);
                DB::table('articles')->insert([
                    'file' => $fileName
                    ]);
            }
            else{
                echo "Không được phép upload file";
            }
            
            //echo $fileName;
        }
        else{
            echo "chua co file";
        }
    }
    public function view($id){
        //echo 'view';
        $views = DB::table('articles')->select('*')->where('id',$id)->first();
            // table('articles')
            // ->join('users','articles.user_id','=','users.id')
            // ->select('articles.*', 'users.name')
            // ->where('id',$id)->first();
        // echo '<pre>';
        // print_r($view);die;
        return view('articles.view',['views'=>$views]);
    }
    public function Hoc($data){
        echo 'day la: '.$data;
    }
    public function GetURL(Request $request){
        echo $request->path();
    }
    public function search(Request $request){
        echo $request->all();
        //echo 'adad';
    }
	
}