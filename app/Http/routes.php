<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\User;
use Illuminate\Http\Request;
use Validator;

Route::get('/', ['as'=>'home', 'uses' => 'HomeController@index']);

Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin', ['as'=>'admin', 'uses' => 'AdminController@index']);
    Route::get('/admin/users', ['as'=>'admin-users', 'uses' => 'AdminController@users']);
    Route::get('/admin/users/add', ['as'=>'admin-users-add', 'uses' => 'AdminController@useradd']);
    Route::post('/admin/users/addcreate', 'AdminController@useraddcreate');
    Route::post('/admin/users/edit', function(Request $request){
        $data = [
            'result' => 'ok',
            'errors' => []
        ];
        
        $user = User::find($request->id);
        if (!$user) {
            $data['result'] = 'error';
            $data['errors'][] = 'Пользователь не найден';
            return response()->json($data);
        }
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'login' => 'required|max:255|unique:users,login,' . $request->id,
            'role' => 'required|numeric|min:1|max:2'
        ]);
        
        if ($validator->fails()) {
            $data['result'] = 'error';
            $data['errors'] = $validator->errors()->all();
            return response()->json($data);
        }
        
        $user->login = $request->login;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->save();
        return response()->json($data);
    });
    
    Route::post('/admin/users/editpass', function(Request $request){
        $data = [
            'result' => 'ok',
            'errors' => []
        ];
        
        $user = User::find($request->id);
        if (!$user) {
            $data['result'] = 'error';
            $data['errors'][] = 'Пользователь не найден';
            return response()->json($data);
        }
        
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6'
        ]);
        
        if ($validator->fails()) {
            $data['result'] = 'error';
            $data['errors'] = $validator->errors()->all();
            return response()->json($data);
        }
        
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json($data);
    });
    
    Route::post('/admin/users/del', function(Request $request){
        $data = [
            'result' => 'ok',
            'errors' => []
        ];
        
        $user = User::find($request->id);
        if (!$user) {
            $data['result'] = 'error';
            $data['errors'][] = 'Пользователь не найден';
            return response()->json($data);
        }
        
        $user->delete();
        return response()->json($data);
    });
});


Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
