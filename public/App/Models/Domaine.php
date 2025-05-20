<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class Domaine
{
    /**
     * @return array
     */
    public static function getAll() {
        $db = Database::getInstance();
        return $db->query("SELECT * FROM domain")->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $name
     * @param $description
     * @return void
     */
    public static function create($name, $description) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO domain (name, description) VALUES (?, ?)");
        $stmt->execute([$name, $description]);
    }

    /**
     * @param $id
     * @return void
     */
    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM domain WHERE id = ?");
        $stmt->execute([$id]);
    }

    /**
     * @param int $id
     * @return array
     */
    public static function getById(int $id): array
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM domain WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param int $id
     * @param string $name
     * @param string $description
     * @return void
     */
    public static function update(int $id, string $name, string $description): void
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE domain SET name = ?, description = ? WHERE id = ?");
        $stmt->execute([$name, $description, $id]);
    }

    /**
     * @return mixed
     */
    public function count() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT COUNT(*) as total FROM domain");
        return $stmt->fetch()['total'];
    }

    /**
     * Get all domains with additional display information
     *
     * @return array
     */
    public static function getAllWithDisplayInfo() {
        $domains = self::getAll();
        $domainsWithInfo = [];

        foreach ($domains as $domain) {
            // Add display information like image path
            $domain['image_path'] = self::getDomainImagePath($domain['name']);
            // Add URL-safe slug
            $domain['slug'] = urlencode($domain['name']);

            $domainsWithInfo[] = $domain;
        }

        return $domainsWithInfo;
    }

    /**
     * Get appropriate image path for a domain based on its name
     *
     * @param string $domainName
     * @return string
     */
    private static function getDomainImagePath(string $domainName): string {
        $basePath = "../../../../uploads/";

        switch(strtolower($domainName)) {
            case 'management':
                return $basePath . "cobit.webp";
            case 'computer science':
            case 'it development':
                return $basePath . "it.png";
            case 'big data':
                return $basePath . "Big-data-main-application-areas.png";
            case 'networking':
                return $basePath . "PhysicalNetworkDiagram.jpg";
            default:
                return $basePath . "default-domain.jpg";
        }
    }
}
