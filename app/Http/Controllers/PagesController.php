<?php 
namespace App\Http\Controllers;
 
use App\Http\Requests;
use App\Http\Controllers\Controller;
 
use Illuminate\Http\Request;
 
class PagesController extends Controller {
 
	public function abouttime(){
		// $name = "my name is bon";
		// $age = "22";
		// return view("pages.abouttime") ->with(['name'=>$name,'age'=>$age ]);

		$name = 'My name is 4';
		$age = '22';
		$data = [];
		$data['name'] = $name;
		$data['age'] = $age;
		return view("pages.abouttime",$data);
	}
	public function contact(){
    return view('pages.contact');
	}
	public function about(){
    return view('pages.about');
	}
 
}