<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;


class Home extends BaseController
{
    public function index(): string
    {
        $usersModel = new UsersModel();
        
        $data['users'] = $usersModel->findAll();

        return view('view', $data);

    }


    public function addUser()
    {
        $countriesModel = new CountryModel();
        $countries = $countriesModel->findAll();
        return view('adduser', ['countries' => $countries]);
    }


    public function addUsers()
    {
        $usersModel = new UsersModel();

        $username = $this->request->getPost('userName');
        $age = $this->request->getPost('age');
        $country = $this->request->getPost('country');
        $state = $this->request->getPost('state');
        $city = $this->request->getPost('city');


        $image = $this->request->getFile('image');
        $newName = $image->getRandomName();

        if ($image->isValid() && !$image->hasMoved()) {

            $image->move(ROOTPATH . 'public/uploads', $newName);
            

            $userData = [
                'userName' => $username,
                'age' => $age,
                'country' => $country,
                'state' => $state,
                'city' => $city,
                'image' => $newName 
            ];


            $usersModel->insert($userData);

            return redirect()->to('/');
        } else {
            return "Invalid file upload.";
        }
    }



    public function editUser($id)
    {
        $usersModel = new UsersModel();

        $user = $usersModel->find($id);

        $data['user'] = $user;

        // print_r($data); die();

        return view('edituser', $data);
    }


    public function updateUserData($id)
    {
        $usersModel = new UsersModel();

        $username = $this->request->getPost('userName');
        $age = $this->request->getPost('age');
        $country = $this->request->getPost('country');
        $image = $this->request->getFile('image');

        if ($image && $image->isValid()) {
            $newName = $image->getRandomName();

            $image->move(ROOTPATH . 'public/uploads', $newName);
        } else {
            $newName = null;
        }

        $userData = [
            'username' => $username,
            'age' => $age,
            'country' => $country
        ];

        if ($newName !== null) {
            $userData['image'] = $newName; 
        }

        if ($usersModel->update($id, $userData)) {
            return redirect()->to('/');
        } else {
            log_message('error', 'Failed to update user with ID: ' . $id);

            return redirect()->to('/editUser/' . $id);
        }
        // } else {
        //     return "Invalid file upload.";
        // }
    }
    

    public function getStates($id)
    {
        $statesModel = new StateModel();
        $states = $statesModel->where('countryId', $id)->findAll();
        return $this->response->setJSON($states);
    }
    

    public function getCities($id)
    {
        $citiesModel = new CityModel();
        $cities = $citiesModel->where('stateId', $id)->findAll();
        return $this->response->setJSON($cities);
    }
    

}


   