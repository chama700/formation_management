<?php
declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Domaine;
use App\Core\BaseController;
class DomainesController extends BaseController
{

    /**
     * @return void
     */
    public function index() {
        $domaines = Domaine::getAll();
        $this->view('admin/domaines/index', ['domaines' => $domaines]);
    }
    public function store()
    {
        $domaines = new Domaine();
        $domaines->create($_POST['name'], $_POST['description']);
        header("Location: /admin/domaines");
        exit;
    }

    /**
     * @return void
     */
    public function create()
    {
        $this->view('admin/domaines/create');
    }

    /**
     * @param $id
     * @return void
     */
    public function supprimer($id) {
        Domaine::delete($id);
        header('Location: /admin/domaines');
    }
}