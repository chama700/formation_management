<?php

namespace App\Controllers;

use App\Models\Country;
use App\Core\BaseControllerFrontend;
class HomeController extends BaseControllerFrontend
{
    public function index() {
        $countryModel = new Country();
        $countries = $countryModel->all();

        $this->view('home/index', [
            'title' => 'FormExpert - Home',
        ]);
    }
}
