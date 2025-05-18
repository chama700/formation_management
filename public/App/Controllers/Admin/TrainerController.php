<?php
declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\BaseController;
use App\Models\Trainer;

class TrainerController extends BaseController
{
    /**
     * @var Trainer
     */
    private Trainer $trainerModel;

    /**
     *
     */
    public function __construct()
    {
        $this->trainerModel = new Trainer();
    }

    /**
     * @return void
     */
    public function index()
    {
        // Récupération des filtres depuis la requête GET
        $filter_id = $_GET['filter_id'] ?? '';
        $filter_name = $_GET['filter_name'] ?? '';
        // Appliquer les filtres dans la méthode du modèle
        $trainers = $this->trainerModel->filterTrainers($filter_id, $filter_name);

        $this->view('admin/trainers/index', [
            'trainers' => $trainers
        ]);
    }

    /**
     * @return void
     */
    public function create()
    {
        $this->view('admin/trainers/create');
    }

    /**
     * @return void
     */
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'description' => $_POST['description'],
            ];
            // Gestion de l'image uploadée
            if (!empty($_FILES['photo']['name'])) {
                $uploadDir = __DIR__ . '/../../../public/uploads/trainers/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0775, true);
                }

                $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $filename = uniqid() . '_' . basename($_FILES['photo']['name']);
                $uploadPath = $uploadDir . $filename;

                if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadPath)) {
                    $data['photo'] = '/uploads/trainers/' . $filename;
                } else {
                    die("Erreur lors de l'upload de la photo.");
                }
            } else {
                $data['photo'] = ''; // ou une valeur par défaut
            }

            $trainerModel = new Trainer();
            $trainerModel->create($data);
        }
        header("Location: /admin/trainers");
        exit;
    }

    /**
     * @param $id
     * @return void
     */
    public function update($id)
    {
        $trainerModel = new Trainer();

        [$firstName, $lastName] = explode(' ', $_POST['name'] . ' ', 2);

        $data = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'description' => $_POST['description'] ?? '',
        ];

        // Traitement de l'upload de la photo
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $photoTmpPath = $_FILES['photo']['tmp_name'];
            $photoName = basename($_FILES['photo']['name']);
            $destination = '../uploads/trainers/' . uniqid() . '_' . $photoName;
            move_uploaded_file($photoTmpPath, $_SERVER['DOCUMENT_ROOT'] . $destination);
            $data['photo'] = $destination;
        } else {
            // Facultatif : conserver l’ancienne photo si aucun fichier uploadé
            $trainer = $trainerModel->find($id);
            $data['photo'] = $trainer['photo'] ?? '';
        }

        $trainerModel->update($id, $data);

        header("Location: /admin/trainers");
        exit;
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id)
    {
        $trainerModel = new Trainer();
        $trainerModel->delete($id);

        header("Location: /admin/trainers");
        exit;
    }
}
