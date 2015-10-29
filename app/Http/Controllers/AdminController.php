<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class AdminController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        //return view('admin.index');
        return redirect('/admin/users');
    }
    
    public function users() {
        $users = User::all(['id', 'name', 'login', 'role']);
        return view('admin.users', ['users' => $users]);
    }

    public function addop() {
        return view('admin.addop');
    }
    
    public function addopcreate(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'login' => 'required|max:255|unique:users',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return redirect('/admin/addop')
                ->withInput()
                ->withErrors($validator);
        }

        // добавить пользователя
        $user = new User();
        $user->name = $request->name;
        $user->login = $request->login;
        $user->password = bcrypt($request->password);
        $user->save();
        
        return view('admin.addop', ['create' => true]);
    }

}
