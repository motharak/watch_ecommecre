<?php

namespace App\Http\Controllers\admin;
use App\Models\UserModel;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller{
    private $userObj;
    public function __construct()
    {
        $this->userObj = new UserModel();
    }

    public function index()
    {
        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }
        $userObj = $this->userObj->getUser();
        return view("admin.users.index", ['user' => $userObj]);
    }
    public function add()
    {
        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }
        $userModels = new UserModel();
        $user = $userModels->getUser();
        return view('admin.users.add', ['user' => $user]);
    }
    public function addAction(Request $request)
        {
            session_start();
            if (empty(session('username'))) {
                return redirect('/admin/login');
            }
            $txtName = $request->input('name');
            $txtRole = $request->input('role');
            $txtAddress = $request->input('address');
            $txtPhone = $request->input('phone');
            $txtEmail = $request->input('email');
            $txtPassword = $request->input('password');
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $data = [
                'name' => $txtName,
                'role' => $txtRole,
                'address' => $txtAddress,
                'phone' => $txtPhone,
                'email' => $txtEmail,
                'password' => $txtPassword,
                'Picture' => $fileName,
            ];
            $productModel = new UserModel();
            $productModel->addUser($data);
            return redirect('/admin/users');
        }
    public function edit($id){

        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }

        $user = $this->userObj->findUserById($id);
        return view('admin.users.edit', ['user'=> $user]);
    }
    public function updateAction(Request $request){

        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }

        $id = $request->input('hiddenId');
        $txtName = $request->input('name');
        $txtRole = $request->input('role');
        $txtAddress = $request->input('address');
        $txtPhone = $request->input('phone');
        $txtEmail = $request->input('email');
        $txtPassword = $request->input('password');
        $data = [
            'ID' => $id,
            'name' => $txtName,
            'role' => $txtRole,
            'address' => $txtAddress,
            'phone' => $txtPhone,
            'email' => $txtEmail,
            'password' => $txtPassword,
        ];
        if (!empty($file)) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $data['Picture'] = $fileName;
        }
        $updateUser = new UserModel();
        $updateUser->update($id,$data);
        return redirect('/admin/users');
    }
    public function delete($id, $picture)
    {
        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }
        
        $userModel = new UserModel();
        $userModel->deleteUser($id);
        @unlink(public_path('uploads/' . $picture));
        return redirect('/admin/users');
    }
}
?>