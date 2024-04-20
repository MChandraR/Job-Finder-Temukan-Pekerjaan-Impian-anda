<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pengajuan extends BaseController
{
    public function index()
    {
        $db      = \Config\Database::connect();
        $session =session();
        $builderType = $db->table('job_type');
        
        $typeData = $builderType->get();
        if($typeData = $typeData->getResult()){
            $data["job_type"] = $typeData;
        }else{
            $data["job_type"] = [];
        }

        if($session->get("user_id")!=null){
            $data["url"] = "Logout";
        }else{
            $data["url"] = "Login";
        }
        $session->close();
        
        return view("pengajuan",$data);
    }

    
    public function getMyApply(){
        $db      = \Config\Database::connect();
        $builder = $db->table('jobs');
        return response()->setJson([
            "message" =>  "apply"
        ]);
    }

    public function deletePostingan(){
        $db      = \Config\Database::connect();
        $builder = $db->table('jobs');
        $res = $builder->where("job_id",$this->request->getPost("job_id"))->delete();
        return response()->setJson([
            "status" => "sukses",
            "message" => "berhasil menghapus data !"
        ]);
    }

    public function getPengajuan(){
        $db      = \Config\Database::connect();
        $builder = $db->table('job_appeal');
        $data["data"] = $builder->where("job_id",$this->request->getPost("job_id"))->get()->getResult();
        return response()->setJson($data);
    }

    public function getMyPost(){
        $db      = \Config\Database::connect();
        $builder = $db->table('jobs');
        $session = session();   


        $data = $builder->where("employer_id", $session->get("user_id"))->orderBy("job_id","DESC")->join("job_type","jobs.job_type_id = job_type.type_id")->get()->getResult();
        return response()->setJson([
            "data" =>  $data,
            "user_id" =>  $session->get("user_id")
        ]);
    }
}
