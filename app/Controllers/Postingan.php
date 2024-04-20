<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Postingan extends BaseController
{
    public function index()
    {
        
    }

    public function updatePostingan(){
        $db      = \Config\Database::connect();
        $builder = $db->table('jobs');
        $res = $builder->where("job_id",$this->request->getPost("job_id"))->update([
            "job_name" => $this->request->getPost("job_name"),
            "job_type_id" => $this->request->getPost("job_type_id"),
            "description" => $this->request->getPost("description"),
            "begin" => $this->request->getPost("begin"),
            "end" => $this->request->getPost("end"),
            "status" => $this->request->getPost("status")
        ]);
    }
}
