<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth:admin');
	}
	public function index()
	{
		$products=User::paginate(15);
		return view('admin.users.list',['products'=>$products]);
	}
	public function add()
	{
		return view('admin.users.add_edit',['edit'=>FALSE]);
	}
	public function save(Request $request)
	{
		$request->validate([
			'name'=>'required',
			'email'=>'required|unique:users,email',
			'password'=>'required',
			'status'=>'required'
		]);
		$product = new User;
		$product->name=$request->name;
		$product->email=$request->email;
		$product->email_verified_at = date('Y-m-d H:i:s');
		$product->password=Hash::make($request->password);
		$product->status=$request->status;
		$product->save();
		$request->session()->flash('success','User Added Successfully!');
		return redirect()->route('admin.users.list');
	}
	public function edit($id)
	{
		$product=User::where('id','=',$id)->first();
		return view('admin.users.add_edit',['product'=>$product,'edit'=>TRUE]);
	}
	public function update(Request $request, $id)
	{
		$request->validate([
			'name'=>'required',
			'email'=>'required',
			'status'=>'required'
		]);
		$product=User::find($id);
		$product->name=$request->name;
		$product->email=$request->email;
		if($request->password!=''){
			$product->password=Hash::make($request->password);
		}
		$product->status=$request->status;
		$product->save();
		$request->session()->flash('success','User Updated Successfully!');
		return redirect()->route('admin.users.list');
	}
	public function delete(Request $request, $id)
	{
		User::where(['id'=>$id])->delete();
		$request->session()->flash('success','User Deleted Successfully!');
		return redirect()->route('admin.users.list');
	}
}
