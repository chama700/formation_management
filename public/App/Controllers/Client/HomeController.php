<?php

namespace App\Controllers\Client;

use App\Core\BaseControllerFrontend;

class HomeController extends BaseControllerFrontend
{
    public function index() {
        $this->view('client/home/index', [
            'title' => 'FormExpert - Home',
        ]);
    }
}
