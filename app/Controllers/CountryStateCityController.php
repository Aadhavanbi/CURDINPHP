<?php

namespace App\Controllers;

use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;


class CountryStateCityController extends BaseController
{

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
    





    public function findCountry($id) {
        $countryModel = new CountryModel();
        $country = $countryModel->find($id);
        if ($country) {
            return $this->response->setJSON($country);
        } else {
            // Handle error if country is not found
            return $this->response->setStatusCode(404)->setBody('Country not found');
        }
    }
    
    

    public function findState($id)
    {
        $statesModel = new StateModel();
        $states = $statesModel->where('id', $id)->findOne();
        return $this->response->setJSON($states);
    }
    

    public function findCity($id)
    {
        $citiesModel = new CityModel();
        $cities = $citiesModel->where('id', $id)->findOne();
        return $this->response->setJSON($cities);
    }
    



}


   