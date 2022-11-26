<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AssignmentController extends Controller
{
    public function dashboard(){
        $data = Crud::get();
        // return $data;
        return view('dashboard', compact('data'));
    }

    public function addDept(){
        return view('add-dept');
    }

    public function saveDept(Request $request){
        // validating the form
        $request->validate([
            'name' => 'required',
            'deptname' => 'required',
            'number' => 'required',
            'phone' => 'required',
        ]);

        // dd($request->all());

        $name = $request->name;
        $deptname = $request->deptname;
        $number = $request->number;
        $phone = $request->phone;

        $dept = new Crud();
        $dept->name = $name;
        $dept->deptname = $deptname;
        $dept->number = $number;
        $dept->phone = $phone;

        $dept->save();

        return redirect('/dashboard')->with('success', 'New Department added Successfully');
    }

    public function editDept($id){
        $data = Crud::where('id', '=', $id)->first();

        return view('edit-dept', compact('data'));
    }

    public function updateDept(Request $request){
        // validating the form
        $request->validate([
            'name' => 'required',
            'deptname' => 'required',
            'number' => 'required',
            'phone' => 'required',
        ]);

        // dd($request->all());

        $id = $request->id;
        $name = $request->name;
        $deptname = $request->deptname;
        $number = $request->number;
        $phone = $request->phone;

        Crud::where('id', '=', $id)->update([
            'name' => $name,
            'deptname' => $deptname,
            'number' => $number,
            'phone' => $phone
        ]);

        return redirect('/dashboard')->with('success', 'Updated Successfully');
    }

    public function deleteDept($id){
        Crud::where('id', '=', $id)->delete();

        return redirect('/dashboard')->with('success', 'Deleted Successfully');

    }


    public function register(){
        return view('register');
    }

    public function login(){
        return view('login');
    }

    public function saveUser(Request $request){
        // validating the form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // dd($request->all());

        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);

        $assign = new User();
        $assign->name = $name;
        $assign->email = $email;
        $assign->password = $password;

        $assign->save();

        return redirect('/login')->with('success', 'Registered Successfully');
    }

    public function userLogin(Request $request){
        // validating the form
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // dd($request->all());

      if(Auth::attempt($request->only('email', 'password'))){
        return redirect('/dashboard');
        }else{
            return back()->with('fail', 'Incorrect email or password');
        }
    }

    public function logout(){
        auth()->logout();

        return redirect('/login');
    }
}
