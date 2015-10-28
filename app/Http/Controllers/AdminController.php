<?php namespace App\Http\Controllers;

use Gate;

class AdminController extends Controller {
    public function index()
    {   
        if (Gate::denies('admin-content')) {
            return redirect('/');
        }
        
        return view('admin');
    }
}

