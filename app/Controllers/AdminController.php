<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use App\Models\LivestockModel;

class AdminController extends ResourceController
{
    private $livestocks;

    public function __construct() {
        $this->livestocks = new LivestockModel();
    }

    public function importCsvToDb()
    {
        try {
            $input = $this->validate([
                'file' => 'uploaded[file]|ext_in[file,csv],'
            ]);
            if (!$input) {
                $data['validation'] = $this->validator;
                return view('index', $data); 
            }else{
                if($file = $this->request->getFile('file')) {
                if ($file->isValid() && ! $file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move('../public/csvfile', $newName);
                    $file = fopen("../public/csvfile/".$newName,"r");
                    $i = 0;
                    $numberOfFields = 7;
                    $csvArr = array();
                    
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        if($i > 0){ 
                            $csvArr[$i]['Livestock_Type'] = trim($filedata[0]);
                            $csvArr[$i]['Breed'] = trim($filedata[1]);
                            $csvArr[$i]['Age'] = trim($filedata[2]);
                            $csvArr[$i]['Sex'] = trim($filedata[3]);
                            $csvArr[$i]['Date_Of_Birth'] = trim($filedata[4]);
                            $csvArr[$i]['Health_Status'] = trim($filedata[5]);
                            $csvArr[$i]['Record_Status'] = trim($filedata[6]);
                        }
                        $i++;
                    }
                    fclose($file);
                    $count = 0;
                    foreach($csvArr as $livestockData){
                        $this->livestocks->save($livestockData);
                        $count++;
                    }
    
                    return $this->respond(['message'=>$count.' rows successfully added.',$csvArr]);
                }
                else{
                    return $this->respond(['message'=>' CSV file coud not be imported.']);
                }
                }else{
                    return $this->respond(['message'=>' CSV file coud not be imported.']);
                }
            }
        } catch (\Throwable $th) {
            return $this->respond(['message'=>'error: '.$th->getMessage()]);
        }     
    }
}
