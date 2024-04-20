<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function landing():string{
        return view('landing');
    }

    public function findjob():string{
        $db      = \Config\Database::connect();
        $builder = $db->table('jobs');
        $builderType = $db->table('job_type');
        $session =session();

        if($session->get("user_id")!=null){
            $data["url"] = "Logout";
        }else{
            $data["url"] = "Login";
        }
        $session->close();

        if(isset($_GET["sort"])){
            if($_GET["sort"]=="asc"||$_GET["sort"]=="desc") $builder=$builder->join("job_type","job_type.type_id = jobs.job_type_id", "left" )->orderBy("jobs.job_name", strtoupper($_GET["sort"]));
            else $builder =$builder->join("job_type","job_type.type_id = jobs.job_type_id", "left" );
        }else{
            $builder =$builder->join("job_type","job_type.type_id = jobs.job_type_id", "left" )->orderBy("job_id","DESC");
        }

        if(isset($_GET["available"])&&$_GET["available"]=="true" ){
            $builder->where("status","open");
        }
        $data["jobs"] = $builder->get()->getResult();
        $typeData = $builderType->get();
        if($typeData = $typeData->getResult()){
            $data["job_type"] = $typeData;
        }else{
            $data["job_type"] = [];
        }
        return view('jobs', $data);
    }
}
