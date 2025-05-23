<?php
declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\BaseController;
use App\Models\Course;
use App\Models\Subject;


class CourseController extends BaseController
{
    /**
     * @var Course
     */
    private Course $model;

    /**
     * @var Subject
     */
    private Subject $subjectModel;

    /**
     * construct method
     */
    public function __construct() {
        $this->model = new Course();
        $this->subjectModel = new Subject();
    }

    /**
     * @return void
     */
    public function index() {
        $filters = [
            'id' => $_GET['filter_id'] ?? '',
            'name' => $_GET['filter_name'] ?? '',
            'content' => $_GET['filter_content'] ?? '',
            'description' => $_GET['filter_description'] ?? '',
            'audience' => $_GET['filter_audience'] ?? '',
            'duration' => $_GET['filter_duration'] ?? '',
            'testIncluded' => $_GET['filter_testIncluded'] ?? '',
            'testContent' => $_GET['filter_testContent'] ?? '',
            'subject_id' => $_GET['filter_subject_id'] ?? '',
        ];

        $subjects = $this->subjectModel->all(); // pour liste déroulante dans le filtre

        $courses = $this->model->filterCourses($filters);
        $this->view('admin/courses/index', ['courses' => $courses, 'subjects' => $subjects]);
    }


    /**
     * @return void
     */
    public function create() {
        $subjects = $this->subjectModel->all(); // pour la liste déroulante
        $this->view('admin/courses/create', ['subjects' => $subjects]);
    }

    /**
     * @return void
     */
    public function store() {
        $data = [
            'name' => $_POST['name'],
            'content' => $_POST['content'],
            'description' => $_POST['description'],
            'audience' => $_POST['audience'],
            'duration' => $_POST['duration'],
            'testIncluded' => $_POST['testIncluded'],
            'testContent' => $_POST['testContent'],
            'logo' => '',
            'subject_id' => $_POST['subject_id']
        ];

        // Chemin d'upload
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/courses/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }

        if (!empty($_FILES['logo']['name'])) {
            $filename = uniqid() . '_' . basename($_FILES['logo']['name']);
            $uploadPath = $uploadDir . $filename;

            if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadPath)) {
                $data['logo'] = '/uploads/courses/' . $filename; // Chemin web
            } else {
                die("Erreur lors de l'upload de la logo.");
            }
        } else {
            $data['logo'] = ''; // ou une valeur par défaut
        }
        $this->model->create($data);
        header('Location: /admin/courses');
        exit;
    }

    /**
     * @param $id
     * @return void
     */
    public function edit($id) {
        $course = $this->model->find($id);
        $subjects = $this->subjectModel->all();
        $this->view('admin/courses/edit', ['course' => $course, 'subjects' => $subjects]);
    }

    /**
     * @param $id
     * @return void
     */
    public function update($id) {
        $data = [
            'name' => $_POST['name'],
            'content' => $_POST['content'],
            'description' => $_POST['description'],
            'audience' => $_POST['audience'],
            'duration' => $_POST['duration'],
            'testIncluded' => $_POST['testIncluded'],
            'testContent' => $_POST['testContent'],
            'logo' => $_POST['old_logo'], // fallback si pas de nouveau logo
            'subject_id' => $_POST['subject_id']
        ];

        // Chemin d'upload
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/courses/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }

        if (!empty($_FILES['logo']['name'])) {
            $filename = uniqid() . '_' . basename($_FILES['logo']['name']);
            $uploadPath = $uploadDir . $filename;

            if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadPath)) {
                $data['logo'] = '/uploads/courses/' . $filename;
            } else {
                die("Erreur lors de la mise à jour de la photo.");
            }
        } else {
            $trainer = $this->model->find($id);
            $data['logo'] = $trainer['photo'] ?? '';
        }

        $this->model->update($id, $data);
        header('Location: /admin/courses');
        exit;
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id) {
        $this->model->delete($id);
        header('Location: /admin/courses');
        exit;
    }
}
