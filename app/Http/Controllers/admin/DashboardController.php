<?php

namespace App\Http\Controllers\admin;



use App\Http\Controllers\Controller;


class DashboardController extends Controller{
    public function index(){
        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }
    return view("admin/dashboard");
    }
}
?>