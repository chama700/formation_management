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
     *
     */
    public function __construct() {
        $this->model = new Course();
        $this->subjectModel = new Subject();
    }

    /**
     * @return void
     */
    public function index() {
        $courses = $this->model->all();
        $this->view('admin/courses/index', ['courses' => $courses]);
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

        if (!empty($_FILES['logo']['name'])) {
            $filename = uniqid() . '_' . $_FILES['logo']['name'];
            $destination = __DIR__ . '/../../../uploads/courses/' . $filename;
            if (move_uploaded_file($_FILES['logo']['tmp_name'], $destination)) {
                $data['logo'] = '/uploads/courses/' . $filename;
            } else {
                die("Erreur lors de l'upload du logo.");
            }
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

        if (!empty($_FILES['logo']['name'])) {
            $filename = uniqid() . '_' . $_FILES['logo']['name'];
            $destination = __DIR__ . '/../../../uploads/courses/' . $filename;
            if (move_uploaded_file($_FILES['logo']['tmp_name'], $destination)) {
                $data['logo'] = '/uploads/courses/' . $filename;
            }
        }

        $this->model->update($id, $data);
        header('Location: /admin/courses');
        exit;
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: /admin/courses');
        exit;
    }
}
