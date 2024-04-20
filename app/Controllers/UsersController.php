<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Users;


class UsersController extends BaseController
{
    public function index()
    {
      
        $users = model('Users');
        $query['data'] = $users->findAll();
        return view('users', $query);

    }

    public function login(){
        if(session()->get("user_id")!=null) return redirect("home");
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function signIn(){
        $session = session();
        $data = [];
        $username =  $this->request->getPost("username");
        $password =  $this->request->getPost("password");
        $result = model('Users')->where('username',$username)->where('password',$password)->findAll() ;
        if(count($result) > 0){
            $data["status"] = "sukses";
            $data["message"] = "Berhasil login !";
            $session->set(
                "user_id" ,$result[0]["user_id"]
            );
            $session->close();
            $data["data"] = $result ;
        }else{
            $data["status"] = "gagal";
            $data["message"] = "Username atau password salah !";
            $data["data"] = null;
        }
        
        return $this->response->setJson($data);
    }

    public function signUp(){
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $data = [];
        $username =  $this->request->getPost("username");
        $password =  $this->request->getPost("password");
        $email =  $this->request->getPost("email");
        if($username == "" || $password == "" || $email == ""){
            $data["status"] = "gagal";
            $data["message"] = "Error : Data tidak valid ( tidak boleh kosong ) !";
            $data["data"] = "hehe";
            return $this->response->setJson($data);
        }
        $user_id = $builder->select("SUBSTR(user_id,2) AS user_id")->orderBy("user_id","DESC")->get(1)->getResult()[0];
        $new_id = "0000000000".(1 + (int)$user_id->user_id);
        model('Users')->insert([
            "user_id" => "U".substr($new_id, -9,strlen($new_id)),
            "username" => $username,
            "password" => $password,
            "email" => $email,
            "role" => "user"
        ]);
        $data["data"] = "hehe";
        $data["status"] = "sukses";
        $data["user_id"] = $user_id;
        $data["new_id"] = "U".substr($new_id, -9,strlen($new_id));
        $data["message"] = "Berhasil menambahkan user !";
        return $this->response->setJson($data);
    }

    public function logout(){
        session()->remove("user_id");
        return redirect()->back();
    }
}
