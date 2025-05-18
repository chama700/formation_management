<?php
namespace App\Controllers\Admin;

use App\Core\BaseController;
use App\Models\Country;

class CountryController extends BaseController {
    private $model;

    public function __construct() {
        $this->model = new Country();
    }

    public function index() {
        // Récupération des filtres depuis la requête GET
        $filter_id = isset($_GET['filter_id']) ? $_GET['filter_id'] : '';
        $filter_name = isset($_GET['filter_name']) ? $_GET['filter_name'] : '';
        // Appliquer les filtres dans la méthode du modèle
        $countries = $this->model->filterCountries($filter_id, $filter_name);

        // Passer les résultats à la vue
        $this->view('admin/country/index', ['countries' => $countries]);
    }

    public function create() {
        $this->view('admin/country/create');
    }

    public function store() {
        $this->model->create($_POST['name']);
        header('Location: /admin/country/index');
    }

    public function edit($id) {
        $country = $this->model->find($id);
        $this->view('admin/country/edit', ['country' => $country]);
    }

    public function update($id) {
        $this->model->update($id, $_POST['name']);
        header('Location: /admin/country/index');
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: /admin/country/index');
    }
}
