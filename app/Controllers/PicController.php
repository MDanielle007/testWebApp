<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;

class PicController extends ResourceController
{
    public function index()
    {
        echo 'Hello';
    }

    public function upload(){
        try {
            $file = $this->request->getFile('file');

            if ($file->isValid() && !$file->hasMoved())
            {
                $newName = $file->getRandomName();
                $file->move('./uploads', $newName);

                // Handle the uploaded file, save to the database, etc.

                return $this->response->setJSON(['message' => 'File uploaded successfully']);
            }
            else
            {
                return $this->response->setStatusCode(400)->setJSON(['error' => $file->getErrorString()]);
            }
        } catch (\Throwable $th) {
            return $this->respond(["message" => "Error: " . $th->getMessage()],);
        }
    }

    
}
