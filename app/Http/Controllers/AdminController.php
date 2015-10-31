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

    public function useradd() {
        return view('admin.users.add');
    }
    

    public function useraddcreate(Request $request) {
        /*
         * @tode
         * заменить на $this->validate()
         * при ошибке он сам сделает редирект
         */
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'login' => 'required|max:255|unique:users|regex:/^[a-zA-Z0-9]+$/',
            'password' => 'required|min:6',
            'role' => 'required|numeric|min:1|max:2'
        ]);

        if ($validator->fails()) {
            return redirect('/admin/users/add')
                ->withInput()
                ->withErrors($validator);
        }

        // добавить пользователя
        $user = new User();
        $user->name = $request->name;
        $user->login = $request->login;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();
        
        return view('admin.users.add', ['create' => true]);
    }

}
