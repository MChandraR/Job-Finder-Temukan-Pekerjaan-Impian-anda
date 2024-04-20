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

    public function addPengajuan(){
        $session =session();
        $db      = \Config\Database::connect();
        $builder = $db->table('job_appeal');
        $job_id =  $this->request->getPost("job_id");
        $name =  $this->request->getPost("nama");
        $phone =  $this->request->getPost("phone");
        $email =  $this->request->getPost("email");
        $description =  $this->request->getPost("description");

        if($session->get("user_id")==null){
            return response()->setJson([
                "status" => "gagal",
                "message" => "Harap login terlebih dahulu !"
            ]);
        }else{
            $applicant_id = $session->get("user_id");
        }

        if($name == "" || $phone == "" || $email == "" || $description == ""){
            return response()->setJson([
                "status" => "gagal",
                "message" => "Data tidak boleh kosong !"
            ]);
        }

        $res = $builder->select("SUBSTR(appeal_id,2) AS appeal_id")->orderBy("appeal_id","DESC")->get(1)->getResult();
        if(count($res) > 0){
            $newID = "0000000000".((int)$res[0]->appeal_id + 1);
            $newID = "A".substr($newID, -9,strlen($newID));
        }else{
            $newID = "A000000001";
        }
        $data["data"] = $builder->insert([
            "appeal_id" => $newID,
            "job_id" => $job_id,
            "name" => $name,
            "applicant_id" => $applicant_id,
            "phone" => $phone,
            "email" => $email,
            "description" => $description
        ]);
        $data["new_id"] = $newID;
        $data["status"] = "sukses";
        $data["message"] = "Berhasil mengajukan permohonan !";
        
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
