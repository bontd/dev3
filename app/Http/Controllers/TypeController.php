<?php
namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
class TypeController extends Controller {
	public function __construct(){
        
        
        session::has('admin_id');
        session::has('admin_name');
            //echo 'cos session';

    }
    public function index(){
    	if(session::has('admin_name')){
    		$types = DB::select('select * from types order by created desc');
    		return view('types.index',['types'=>$types]);
        }else{
        	return redirect()->action('AuthController@login');
        }
    }
    public function view($id){
        $type = DB::table('types')->select('*')->where('id',$id)->first();
        return view('types.view',['type'=>$type]);
    }
    public function add(){
        return view('types.add');
    }
    public function addAction(Request $request){
        $rules = [
            'name'=>'required|min:3'
        ];
        $messager =  [
            'name.required'=>trans('messager.name'),
            'name.min'=>trans('messager.nameMin')
        ];
        $Validator = Validator::make($request->all(),$rules,$messager);
        if($Validator ->fails()){
            return redirect()->back()->withInput()->withErrors($Validator->errors());
        }
        else{
            DB::table('types')->insert(['names'=>$request['name']]);
            return redirect()->action('TypeController@index');
        }

    }
    public function edit($id){
        $edit = DB::table('types')->select('*')->where('id',$id)->first();
        return view('types.edit',['edit'=>$edit]);
    }
    public function editAction(Request $request){
        $rules =['name'=>'required|min:3'];
        $messager =['name.required'=>trans('messager.name'),'name.min'=>trans('messager.nameMin')];
        $Validator = Validator::make($request->all(),$rules,$messager);
        if($Validator->fails()){
            return redirect()->back()->withInput()->withErrors($Validator->errors());
        }
        else{
            DB::table('types')->where('id',$request->id)->update(['names'=>$request['name'],]);
            return redirect()->action('TypeController@index');
        }
    	
    }
    public function delete($id){
    	DB::table('types')->where('id',$id)->delete();
        return redirect()->action('TypeController@index');
    }
}