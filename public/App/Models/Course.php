<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class Course
{
    /**
     * @var PDO
     */
    private PDO $db;

    /**
     *
     */
    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * @return array
     */
    public function all() {
        $stmt = $this->db->query("SELECT courses.*, subjects.name AS subject_name FROM courses JOIN subjects ON courses.subject_id = subjects.id");
        return $stmt->fetchAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM courses WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /**
     * @param $data
     * @return bool
     */
    public function create($data) {
        $sql = "INSERT INTO courses (name, content, description, audience, duration, testIncluded, testContent, logo, subject_id)
                VALUES (:name, :content, :description, :audience, :duration, :testIncluded, :testContent, :logo, :subject_id)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id, $data) {
        $data['id'] = $id;
        $sql = "UPDATE courses SET name = :name, content = :content, description = :description, audience = :audience, duration = :duration, 
                testIncluded = :testIncluded, testContent = :testContent, logo = :logo, subject_id = :subject_id WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM courses WHERE id = ?");
        return $stmt->execute([$id]);
    }

    /**
     * @return mixed
     */
    public function count() {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM courses");
        return $stmt->fetch()['total'];
    }
}
