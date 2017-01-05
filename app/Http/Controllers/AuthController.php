<?php 
namespace App\Http\Controllers;
use App\Http\Requests;
use DB;
use Mail;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
use Illuminate\Support\Facades\Input;
use App\Models\Users;
 
class AuthController extends Controller {
	public function __construct(){
        
        //echo session::get('admin_id');
        // echo session::get('admin_name');
        if(session::has('admin_name')){
            //echo 'cos session';
        }
        else{
            //echo 'khong cos session';
        }
    }
	public function index(){
		if(session::has('admin_name')){
            //echo 'có session';
            $status = session::get('admin_status');
            $user = DB::select('select * from users order by id desc');
            return view('admin.index', ['user' => $user], ['status'=>$status]);
        }
        else{
            //echo 'khong có session';
            return redirect()->action('AuthController@login');
        }
	}
	public function viewlogin(){
		if(session::get('admin_id')){
			return redirect()->action('AuthController@index');
		}
		else{
			return view('admin.login');
		}
	}
	public function login(Request $request){
		//$user = new Users();
		$rules = [
			'email' => 'required',
			'password' => 'required'
		];
		$Validator = Validator::make($request ->all(),$rules);
		if($Validator->fails()){
			return redirect()->back()->withInput()->withErrors($Validator->errors());
		}
		else{
			// $email = $request->email;
			// $password = $request->password;
			// chuyển thành
			$email = $request->get('email');
			$password = $request->get('password');
			// chuyển query ra ngoài cho dễ nhìn
			
			$b_check = DB::table('users')
				->select('id','name','email','password','status','type')
				->where('email',$email)
				->where('password',md5($password))
				->where('status',1)
				// thêm
				->first();

				// echo '<pre>';
				// print_r($b_check);die;			
			if($b_check)
			{
				session::put('login',TRUE);
				session::put('admin_id',$b_check->id);
				session::put('admin_name',$b_check->name);
				session::put('admin_status',$b_check->type);
				//echo "abc";
				return redirect()->action('AuthController@index');
			}
			else{
				return view('/admin/login',['error'=>'đăng nhập sai email, password hoặc chưa kích hoạt']);
			}
		}
	}
	public function logout(){
		session::forget('admin_id');
		session::forget('admin_name');
		return redirect('admin/login');
	}
	public function adduser(){
		return view('admin.register');
	}
	public function register(Request $request){
		//if(session::has('admin_name')){
			$a_data_mail = $request->all();
			$rules=[
			'name' =>'required|min:3',
			'email'=>'required',
			'password'=>'required|min:6'
			];
			$messager = [
			'name.required'=>trans('messager.name'),
			'name.min'=>trans('messager.nameMin'),
			'email.required'=>trans('messager.email'),
			'email.min'=>trans('messager.emailMin'),
			'password.required'=>trans('messager.password'),
			'password.min'=>trans('messager.passwordMin')
			];
			$validator = Validator::make($a_data_mail,$rules,$messager);
			if($validator ->fails()){
				return redirect()->back()->withInput()->withErrors($validator->errors());
			}
			else{
				echo '<i class="fa-spinner fa-pulse fa-3x fa-fw"></i>';
				DB::table('users')->insert([
	            	'name'=>$a_data_mail['name'],
	            	'email'=>$a_data_mail['email'],
	            	'password'=>md5($a_data_mail['password']),
	            	'type'=>$a_data_mail['types']
	            	]);

				//echo $a_data_mail['email'];
				Mail::send('admin.mailtest',['a_data_mail'=>$a_data_mail], function ($message) use ($a_data_mail) {               

	                $info=array(
	                    'title'     =>'thank !',
	                    'emailfrom' =>config('mail.from.address'),
	                    'emailto'   =>$a_data_mail['email'],
	                    );
	                $message->from($info['emailfrom'],$info['title'])->subject("Bạn đã đăng ký thành công !");

	                $message->to($info['emailto']);
	            });
	            
	            
	            return redirect()->action('AuthController@index');
			}
		//}
	}
	public function destroy($id){
    	
    	DB::table('users')->where('id',$id)->delete();
    	return redirect()->action('AuthController@index');
    }
	public function edit($id){
		
			$edits = DB::table('users')
				->select('*')
				->where('id',$id)
				->first();
    		return view('admin.edit',['edits' => $edits]);

		// //echo $request->id;
		// return view('admin.edit');
	}
	public function update(Request $request){
		$edit_data_mail = $request->all();
		$rules = [
            'name' =>'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'modified' => 'required|date'
        ];
        $messager = [
			'name.required'=>trans('messager.name'),
			'name.min'=>trans('messager.nameMin'),
			'email.required'=>trans('messager.email'),
			'email.min'=>trans('messager.emailMin'),
			'password.required'=>trans('messager.password'),
			'password.min'=>trans('messager.passwordMin')
			];
        $validator = Validator::make($edit_data_mail,$rules,$messager);
        
        if($validator ->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        else{
			DB::table('users')
        	->where('id',$edit_data_mail['id'])
        	->update([
            'name'=>$edit_data_mail['name'],
            'email'=>$edit_data_mail['email'],
            'password'=>md5($edit_data_mail['password']),
            'type'=>$edit_data_mail['types'],
            'updated_at'=>$edit_data_mail['modified']
            ]);
            Mail::send('admin.mailedit',['edit_data_mail'=>$edit_data_mail], function ($message) use ($edit_data_mail) {            

	                $info=array(
	                    'title'     =>'thank !',
	                    'emailfrom' =>config('mail.from.address'),
	                    'emailto'   =>$edit_data_mail['email'],
	                    );
	                $message->from($info['emailfrom'],$info['title'])->subject("Bạn đã sửa thành công !");

	                $message->to($info['emailto']);
	            });
			return redirect()->action('AuthController@index');
		}
		
	}
	public function active(){
		$o_response = new \stdclass();
		$i_id = Input::get('id');
		$i_status = Input::get('status');
		$i_status = $i_status==1?0:1;		

		$i_id = (int)$i_id;
		//$i_status = (int)$i_status;

		$b_update = DB::table('users')->where('id',$i_id)->update(['status'=>$i_status]);
		
		if($b_update){
			$o_response->status = 'ok';
		}
		else{
			$o_response->status = 'error';
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
	public function view($id){
		$views = DB::table('users')
				->select('*')
				->where('id',$id)->first();
		// echo '<pre>';
		// print_r($view);die;
		return view('admin.view',['views'=>$views]);
	}
}