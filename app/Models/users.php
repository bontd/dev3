<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class Users extends Model {
	protected $table = 'users';
	public function getlogin(Request $request){
		$email = $request->get('email');
		$password = $request->get('password');
		$b_check = DB::table('users')
				->select('id','name','email','password','status','type')
				->where('email',$email)
				->where('password',md5($password))
				->where('status',1)
				// thêm
				->first();
		return $b_check;
	}

}