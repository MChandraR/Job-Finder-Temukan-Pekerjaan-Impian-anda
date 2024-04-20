<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Job extends BaseController
{
    public function index()
    {
        //
    }

    public function findjob(...$param):string{
        return $_GET["key"];
    }

    public function postJob(){
        $db      = \Config\Database::connect();
        $builder = $db->table('jobs');
        $result = $builder->select("SUBSTR(job_id,2) AS job_id")->orderBy("job_id","DESC")->get(1)->getResult()[0];
        $new_id = "0000000000".((int)$result->job_id + 1);
        $new_id = "U".substr($new_id, -9, strlen($new_id));

        $jobName = $this->request->getPost("jobName");
        $jobDesc = $this->request->getPost("jobDesc");
        $jobStart = $this->request->getPost("jobStart");
        $jobEnd = $this->request->getPost("jobEnd");
        $jobType = $this->request->getPost("jobType");


        if($jobName=="" || $jobDesc == "" || $jobStart == "" || $jobEnd=="" || $jobType == ""){
            return $this->response->setJson([
                "status" => "gagal",
                "message" => "Data tidak valid ( data tidak boleh kosong ) !",
                "data" => [
                    "name" => $jobName,
                    "desc" => $jobDesc,
                    "type" => $jobType,
                    "start" => $jobStart,
                    "end" => $jobEnd,
                ]
            ]);
        }

        if(session('user_id')!=null){
            $post = model('Jobs')->insert([
                "job_id" => $new_id,
                "job_name" => $jobName ,
                "employer_id" => session()->get("user_id"),
                "job_type_id" => $jobType,
                "description" => $jobDesc,
                "begin" => $jobStart,
                "end" => $jobEnd
            ]);
            return $this->response->setJson([
                "status" => "sukses",
                "message" => "berhasil memposting job !"
            ]);
        }

        return $this->response->setJson([
            "status" => "gagal",
            "message" => "Harap login terlebi dahulu !"
        ]);

        
    }

    public function pengajuan():string{
        return view("pengajuan");
    }
}
