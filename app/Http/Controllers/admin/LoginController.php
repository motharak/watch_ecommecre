<?php

namespace App\Http\Controllers\admin;



use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller{
    public function index(){
    return view("admin/admin_login");
    }
    public function loginAction(Request $request)
    {
        $username = $request->input("email");
        $password = $request->input("password");
        $userModel = new UserModel();
        $userPic = new UserModel();
        $proPic = $userPic->getPic($username);
        $loginUser = $userModel->getUserLogin($username, $password);

        if (!empty($loginUser)) {
            //set session
            
            session_start();
            $value = $loginUser->email;
            $request->session()->put('username', $value);
            $request->session()->put('picture', $proPic);
            return redirect('admin/dashboard');
        } else {
            return redirect('/admin/login')
            ->withErrors(['loginError' => 'Invalid login credentials']);
        }
    }
    
    public function logoutAction(){
        session_start();
        Session::forget('username');
        Session::forget('picture');
        return redirect('admin/login');
    }
}
?>