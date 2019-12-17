<?php

namespace OpenCart\Catalog\Model\Catalog;

use OpenCart\System\Engine\Model;

class ManufacturerRepository {
    /**
     * @var \PDO
     */
    private $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function getManufacturer(int $manufacturer_id) {
        $statement = $this->db->prepare("
            SELECT 
                * 
            FROM 
                manufacturer m 
            LEFT JOIN 
                manufacturer_to_store m2s ON (m.manufacturer_id = m2s.manufacturer_id) 
            WHERE 
                m.manufacturer_id = :manufacturer_id 
                AND m2s.store_id = :store_id
        ");

        $statement->execute([
            'manufacturer_id' => $manufacturer_id,
            'store_id'        => (int)$this->config->get('config_store_id')
        ]);

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getManufacturers(array $data = []) {
        if ($data) {
            $sql = "
                SELECT 
                    * 
                FROM 
                    manufacturer m 
                LEFT JOIN 
                    manufacturer_to_store m2s ON (m.manufacturer_id = m2s.manufacturer_id) 
                WHERE 
                    m2s.store_id = :store_id
            ";

            $sort_data = array(
                'name',
                'sort_order'
            );

            if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
                $sql .= " ORDER BY " . $data['sort'];
            } else {
                $sql .= " ORDER BY name";
            }

            if (isset($data['order']) && ($data['order'] == 'DESC')) {
                $sql .= " DESC";
            } else {
                $sql .= " ASC";
            }

            if (isset($data['start']) || isset($data['limit'])) {
                if ($data['start'] < 0) {
                    $data['start'] = 0;
                }

                if ($data['limit'] < 1) {
                    $data['limit'] = 20;
                }

                $sql .= " LIMIT :start,:limit";
            }

            $statement = $this->db->prepare($sql);

            $statement->bindParam('start', $data['start'], \PDO::PARAM_INT);
            $statement->bindParam('limit', $data['limit'], \PDO::PARAM_INT);

            $statement->execute([
                'store_id' => (int)$this->config->get('config_store_id'),
            ]);

            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        }

        $manufacturer_data = $this->cache->get('manufacturer.' . (int)$this->config->get('config_store_id'));

        if (!$manufacturer_data) {
            $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "manufacturer m LEFT JOIN " . DB_PREFIX . "manufacturer_to_store m2s ON (m.manufacturer_id = m2s.manufacturer_id) WHERE m2s.store_id = '" . (int)$this->config->get('config_store_id') . "' ORDER BY name");

            $manufacturer_data = $query->rows;

            $this->cache->set('manufacturer.' . (int)$this->config->get('config_store_id'), $manufacturer_data);
        }

        return $manufacturer_data;
    }
}
