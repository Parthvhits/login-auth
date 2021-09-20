<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;
//use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

class usercontroller extends Controller
{
    public function index(Request $request){
        $validated = $request->validate([
            'uname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'contactno' => 'required|integer|unique:users',
            'gender'=> 'required|in:male,female'
        ],
        [ 
            'password.required' => 'Please enter a Password',
            'password.min' => 'Please enter at least 8 characters',
            'email.required' => 'Please enter an Email',
            'email.unique' => 'The email has already been taken',
            'contactno.required' => 'Please enter a Contact No',
            'contactno.unique' => 'The Contact No has already been taken',
            'contactno.min' => 'Please enter at least 10 characters'
        ]
        );
        $input = $request->all();
        $users = new User;
        
        $users->name = $input['uname'];
        $users->email = $input['email'];
        $users->password = Hash::make($input['password'] );
        $users->gender = $input['gender'];
        $users->contactno = $input['contactno'];
        $users->save();
        return redirect('login');
    }
    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'pwd' => 'required',
        ],
        [ 
            'pwd.required' => 'Please enter a Password',
            'email.required' => 'Please enter an Email'
        ]
        );
        $input = $request->all();
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['pwd']))) {
            return view('list');
        }else {
            return redirect()->back();
        }
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
    public function checkemail(Request $request)
    {
        $email = $request->email;
        $data = User::where('email', $email)->first();
        if($data)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
    public function checkcontact(Request $request)
    {
        $cno = $request->cno;
        $data = User::where('contactno', $cno)->first();
        if($data)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
    public function list(){
        $users = User::all();
        $this->data['allContent'] = $users;
        return view('list',$this->data);
    }
    public function updateDetail($id){
        $users = User::where('id',$id)->first();
        $this->data['allContent'] = $users;
        return view('updatedetail',$this->data);
    }
    public function store(Request $request){
        //return $request->all();
        //exit();
        $validated = $request->validate([
            'uname' => 'required',
            'email' => 'required|email',
            'contactno' => 'required|integer',
            'gender'=> 'required|in:male,female'
        ],
        [ 
            'email.required' => 'Please enter an Email',
            'email.unique' => 'The email has already been taken',
            'contactno.required' => 'Please enter a Contact No',
            'contactno.unique' => 'The Contact No has already been taken',
            'contactno.min' => 'Please enter at least 10 characters'
        ]
        );
        $input = $request->all();
        $id = $input['userid'];
        $users = User::find($id);
        $users->name = $input['uname'];
        $users->email = $input['email'];
        $users->gender = $input['gender'];
        $users->contactno = $input['contactno'];
        $users->save();
        return redirect('list');
    }
    public function deleteData($id){
        $auth = Auth::user()->email;
        return $auth;
        exit();
        //$delete = User::where('id', $id)->update(['deleted_by' => $id, 'deleted_at' => date('Y-m-d H:i:s')]);
        return redirect('list');
    }
}