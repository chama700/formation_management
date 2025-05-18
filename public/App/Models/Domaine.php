<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class Domaine
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
     * @param $filter_id
     * @param $filter_name
     * @return array
     */
    public function filterDomaines($filter_id, $filter_name) {
        $query = "SELECT * FROM domain WHERE 1=1";

        if ($filter_id) {
            $query .= " AND id LIKE :filter_id";
        }
        if ($filter_name) {
            $query .= " AND name LIKE :filter_name";
        }
        $stmt = $this->db->prepare($query);

        if ($filter_id) {
            $stmt->bindValue(':filter_id', '%' . $filter_id . '%');
        }
        if ($filter_name) {
            $stmt->bindValue(':filter_name', '%' . $filter_name . '%');
        }
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function all() {
        $stmt = $this->db->query("SELECT * FROM domain");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM domain WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $name
     * @param $description
     * @return bool
     */
    public function create($name, $description) {
        $stmt = $this->db->prepare("INSERT INTO domain (name, description) VALUES (?, ?)");
        return $stmt->execute([$name, $description]);
    }

    /**
     * @param $id
     * @param $name
     * @param $description
     * @return bool
     */
    public function update($id, $name, $description) {
        $stmt = $this->db->prepare("UPDATE domain SET name = ?, description = ? WHERE id = ?");
        return $stmt->execute([$name, $description, $id]);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM domain WHERE id = ?");
        return $stmt->execute([$id]);
    }

    /**
     * @return mixed
     */
    public function count() {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM domain");
        return $stmt->fetch()['total'];
    }
}
