<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Users extends BaseController
{
    public function index()
    {
        $this->load->model('users');
        $query = $this->users->getEntries();
        return $query;

    }
}
