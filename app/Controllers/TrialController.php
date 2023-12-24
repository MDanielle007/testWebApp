<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;

class TrialController extends ResourceController
{
    public function isConnected()
    {
        return $this->respond('Your backend is connected to the frontend');
    }
}
?>