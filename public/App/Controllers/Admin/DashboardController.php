<?php

namespace App\Controllers\Admin;

use App\Core\BaseController;
use App\Models\City;
use App\Models\Country;

class DashboardController extends BaseController
{
    public function index()
    {
        $countryCount = (new Country())->count(); // ajoute une méthode count() dans le modèle
        $cityCount = (new City())->count();
//        $trainerCount = (new Trainer())->count();
//        $disciplineCount = (new Discipline())->count();
//        $subjectCount = (new Subject())->count();
//        $formationCount = (new Formation())->count();

        $entityCounts = [
            'Countries' => $countryCount,
            'Cities' => $cityCount,
//            'Formateurs' => $trainerCount,
//            'Disciplines' => $disciplineCount,
//            'Sujets' => $subjectCount,
//            'Formations' => $formationCount
        ];

        $this->view('admin/dashboard/index', [
            'entityCounts' => $entityCounts
        ]);
    }
}