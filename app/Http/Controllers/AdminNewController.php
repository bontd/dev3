<?php
namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
class AdminNewController extends Controller {
	public function __construct(){
        
        
        session::has('admin_id');
        session::has('admin_name');
            //echo 'cos session';

    }
    public function index(){
    	if(session::has('admin_name')){
    		$news = DB::table('news')
            ->join('categories','news.category_id','=','categories.id')
            ->join('types','news.type_id','=','types.id')
            ->select('news.*','categories.name','types.names')->orderBy('created','desc')->get();
    		return view('newadmin.index',['news'=>$news]);
        }else{
        	return redirect()->action('AuthController@login');
        }
    }
    public function view($id){
        $view = DB::select('select * from news where id='.$id);
                // echo "<prev>";
                // print_r($detail);die;
        return view('newadmin.view',['view'=>$view]);
    }
    public function add(){
        $category = DB::select('select * from categories');
        $type = DB::select('select * from types');
        return view('newadmin.add',['category'=>$category,'type'=>$type]);
    }
    public function addaction(Request $request){
        $session = session::get('admin_name');
        $rules = [
            'title'=>'required|min:5',
            'description'=>'required|min:2',
            'myFile'=>'required|file',
            'content'=>'required'
        ];
        $mess = [
            'title.required'=>trans('mess.title'),
            'content.required'=>trans('mess.content'),
            'description.required'=>trans('mess.description')
        ];
        $validator = Validator::make($request->all(),$rules,$mess);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        else{
            if($request->hasFile('myFile')){
                $file = $request->file('myFile');
                $fileName = $file->getClientOriginalName('myFile');
                $file ->move('./public/image',$fileName);
                DB::table('news')->insert([
                    'category_id'=>$request->category,
                    'type_id'=>$request->type,
                    'title' =>$request->title,
                    'description' =>$request->description,
                    'content'=>$request->content,
                    'image'=>$fileName,
                    'author'=>$session
                    ]);
                return redirect()->action('AdminNewController@index');
            }
        }
    }
    public function edit($id){
        //print_r($id);die;
        $category = DB::select('select * from categories');
        $type = DB::select('select * from types');
        $news = DB::table('news')->select('*')->where('id',$id)->first();
        // echo '<pre>';
        // print_r($news);die;
        return view('newadmin.edit',['news'=>$news,'category'=>$category,'type'=>$type]);
    }
    public function update(Request $request){
    	$session = session::get('admin_name');
        $rules = [
            'title'=>'required|min:5',
            'description'=>'required|min:2',
            'myFile'=>'required|file',
            'content'=>'required'
        ];
        $mess = [
            'title.required'=>trans('mess.title'),
            'content.required'=>trans('mess.content'),
            'description.required'=>trans('mess.description')
        ];
        $validator = Validator::make($request->all(),$rules,$mess);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        else{
            if($request->hasFile('myFile')){
                $file = $request->file('myFile');
                $fileName = $file->getClientOriginalName('myFile');
                $file ->move('./public/image',$fileName);
                DB::table('news')->where('id',$request->id)->update([
                    'category_id'=>$request->category,
                    'type_id'=>$request->type,
                    'title' =>$request->title,
                    'description' =>$request->description,
                    'content'=>$request->content,
                    'image'=>$fileName,
                    'author'=>$session
                    ]);
                return redirect()->action('AdminNewController@index');
            }
        }
    }
    public function delete($id){
    	DB::table('news')->where('id',$id)->delete();
        return redirect()->action('AdminNewController@index');
    }
}