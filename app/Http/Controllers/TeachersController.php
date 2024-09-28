<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\User;
use Hash;
use DB;
use Auth;

class TeachersController extends Controller
{

    public function loginpage(Request $request){
        return view('login');
    }

    public function loginpass(Request $request) {

        $credentials = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);
        // dd($credentials );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('showstudents')
                ->withSuccess('You have successfully logged in!');
        }
        return back()->withErrors([
            'username' => 'Your provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function register(Request $request){
        return view('Register');
    }
    public function addTeachers(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|',
            'password' => 'required|string|min:6',
            'email' => 'required|email|max:255',
            'address1' => 'required|string|max:255',
        ]);
        $user = new User();
        $user->name=$request->name;
        $user->username=$request->username;
        $user->password=Hash::make($request->password);
        $user->email=$request->email;
        $user->address=$request->address1;
        $user->save();
        return redirect('/')->with('success', 'Tearchers details saved successfully!');

}

public function showstudents(Request $request) {
    $studentdetails = Student::select('name', 'marks', 'subject','id')->get();
    // dd( $studentdetails );
    return view('Student', compact('studentdetails'));
}

public function updatestudets(Request $request){
    // dd($request->all());
    $id=$request->userIdFromModal;
    $name=$request->name;
    $marks=$request->marks;
    $subject=$request->subject;
    student::where('id',$id)->update(['name'=>$name, 'marks'=>$marks,'subject'=>$subject]);
}
public function delete(Request $request){
    $id=$request->student_id;
    student::where('id',$id)->delete();
}

public function students(Request $request){
    return view('Addstudents');
}

public function addstudentsdetails(Request $request){
    DB::table('students')->insert([
        'name'=>$request->name,
        'marks'=>$request->marks,
        'subject'=>$request->subject,
    ]);
    return  redirect('/showstudents');
}
}
