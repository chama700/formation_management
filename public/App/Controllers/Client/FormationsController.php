<?php

namespace App\Controllers\Client;

use App\Core\BaseControllerFrontend;

class FormationsController extends BaseControllerFrontend
{
    public function index() {
        $this->view('client/formations/index', [
            'title' => 'FormExpert - Formations',
        ]);
    }
}
