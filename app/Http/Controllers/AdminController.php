<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class AdminController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        return view('admin.index');
    }

    public function addop() {
        return view('admin.addop');
    }
    
    public function addopcreate(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:12|unique:users',
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
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        
        return view('admin.addop', ['create' => true]);
    }

}
