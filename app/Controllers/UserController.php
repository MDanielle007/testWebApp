<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use App\Models\DAPersonnelsModel;
use App\Models\FarmerProfilesModel;
use App\Models\UserAccountModel;

class UserController extends ResourceController
{
    private $daPersonnels;
    private $userAccounts;
    private $farmerProfiles;


    public function index()
    {
        //
    }

    public function __construct() {
        $this->userAccounts = new UserAccountModel();
        $this->farmerProfiles = new FarmerProfilesModel();
        $this->daPersonnels = new DAPersonnelsModel();
    }
    
    public function getUserAccounts(){
        $data = $this->userAccounts->select('User_ID, Firstname, Lastname,User_Role,User_Status,Image')->findAll();
        return $this->respond($data,200);
    }

    public function register()
    {
        $json = $this->request->getJSON();
        // Get the input data using the request object
        $data = [
            'Username' => $json->Username,
            'Password' => $json->Password,
            'Email' => $json->Email,
            'Firstname' => $json->Firstname,
            'Middlename' => $json->Middlename,
            'Lastname' => $json->Lastname,
            'Date_Of_Birth' => $json->Date_Of_Birth,
            'Gender' => $json->Gender,
            'Civil_Status' => $json->Civil_Status,
            'Sitio' => $json->Sitio,
            'Barangay' => $json->Barangay,
            'City' => $json->City,
            'Province' => $json->Province,
            'Phone_Number' => $json->Phone_Number,
        ];

        $userAccounts = new UserAccountModel();

        $result = $userAccounts->save($data);

        return $this->respond($result,200);

        // $username = $this->request->getVar('Username');
        // $password = $this->request->getVar('Password');

        // // Define validation rules
        // $rules = [
        //     'Username' => 'required|min_length[4]|max_length[50]',
        //     'Password' => 'required|min_length[6]|max_length[255]',
        //     'Email' => 'required|min_length[6]|max_length[100]|valid_email|is_unique[users.email]',
        //     'Firstname' => 'required|min_length[2]|max_length[50]',
        //     'Middlename' => 'max_length[50]',
        //     'Lastname' => 'required|min_length[2]|max_length[50]',
        //     'Date_Of_Birth' => 'required|valid_date',
        //     'Gender' => 'required|in_list[Male,Female,Other]',
        //     'Civil_Status' => 'required|in_list[Single,Married,Widowed,Divorced]',
        //     'Sitio' => 'max_length[100]',
        //     'Barangay' => 'required|min_length[2]|max_length[100]',
        //     'City' => 'required|min_length[2]|max_length[100]',
        //     'Province' => 'required|min_length[2]|max_length[100]',
        //     'Phone_Number' => 'required|min_length[10]|max_length[11]'
        // ];
        
        
        // // Perform validation
        // if ($this->validate($rules)) {
        //     // Validation passed, you can now process and save the user data to your database
        //     // Return a success response or perform further actions
        //     // For example, you can call a model method to insert the user data into the database
        //     // and then return a success response
        //         return $this->respond("Registration successful", 200);
        // } else {
        //     // Validation failed, return error messages
        //     // You can access validation errors using $this->validator->getErrors()
        //     $errors = $this->validator->getErrors();
        //     return $this->respond($errors, 400);
        // }
    }
}
