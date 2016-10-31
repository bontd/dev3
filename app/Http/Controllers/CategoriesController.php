<?php
namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
class CategoriesController extends Controller {
	public function __construct(){
        
        
        session::has('admin_id');
        session::has('admin_name');
            //echo 'cos session';

    }
    public function index(){
    	if(session::has('admin_name')){
    		$categories = DB::select('select * from categories order by created desc');
    		return view('categories.index',['categories'=>$categories]);
        }else{
        	return redirect()->action('AuthController@login');
        }
    }
    public function view($id){
        $category = DB::table('categories')
            ->select('*')
            ->where('id',$id)
            ->first();
        return view('categories.view',['category'=>$category]);
    }
    public function add(){
        return view('categories.add');
    }
    public function addAction(Request $request){
            $rules=[
            'name' =>'required|min:3',
            ];
            $messager = [
            'name.required'=>trans('messager.name'),
            'name.min'=>trans('messager.nameMin'),
            ];
            $validator = Validator::make($request->all(),$rules,$messager);
            if($validator ->fails()){
                return redirect()->back()->withInput()->withErrors($validator->errors());
            }
            else{
                //echo '<i class="fa-spinner fa-pulse fa-3x fa-fw"></i>';
                DB::table('categories')->insert([
                    'name'=>$request['name'],
                    ]);
                return redirect()->action('CategoriesController@index');
            }
    }
    public function edit($id){
        $edit = DB::table('categories')
            ->select('*')
            ->where('id',$id)
            ->first();
        return view('categories.edit',['edit'=>$edit]);

    }
    public function update(Request $request){
        $rules = [
            'name'=>'required'
        ];
        $messager = [
            'name.required'=>trans('messager.name'),
        ];
        $validator = Validator::make($request->all(),$rules,$messager);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        else{
            DB::table('categories')->where('id',$request->id)->update(
                ['name'=>$request['name'],]
                )
            ;
            return redirect()->action('CategoriesController@index');
        }
    	
    }
    public function delete($id){
        DB::table('categories')
        ->where('id',$id)
        ->delete();
        return redirect()->action('CategoriesController@index');
    }
}