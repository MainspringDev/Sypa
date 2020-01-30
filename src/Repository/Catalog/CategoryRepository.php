<?php

declare(strict_types=1);

namespace OpenCart\Catalog\Model\Catalog;

class CategoryRepository {
    /**
     * @var \PDO
     */
    private \PDO $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function getCategory(int $category_id): array {
        $statement = $this->db->prepare("
            SELECT
                DISTINCT *
            FROM
                category c
            LEFT JOIN
                category_description cd ON (c.category_id = cd.category_id)
            LEFT JOIN
                category_to_store c2s ON (c.category_id = c2s.category_id)
            WHERE
                c.category_id = :category_id
                AND cd.language_id = :language_id
                AND c2s.store_id = :store_id
                AND c.status = '1'
        ");

        $statement->execute([
            'category_id' => $category_id,
            'language_id' => (int)$this->config->get('config_language_id'),
            'store_id'    => (int)$this->config->get('config_store_id')
        ]);

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getCategories(int $parent_id = 0): array {
        $statement = $this->db->prepare("
            SELECT
                *
            FROM
                category c
            LEFT JOIN
                category_description cd ON (c.category_id = cd.category_id)
            LEFT JOIN
                category_to_store c2s ON (c.category_id = c2s.category_id)
            WHERE
                c.parent_id = :parent_id
                AND cd.language_id = :language_id
                AND c2s.store_id = :store_id
                AND c.status = '1'
            ORDER BY
                c.sort_order,
                cd.name
        ");

        $statement->execute([
            'parent_id'   => $parent_id,
            'language_id' => (int)$this->config->get('config_language_id'),
            'store_id'    => (int)$this->config->get('config_store_id')
        ]);

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getCategoryFilters(int $category_id): array {
        $implode = array();

        $statement = $this->db->prepare("
            SELECT
                filter_id
            FROM
                category_filter
            WHERE
                category_id = :category_id
        ");

        $statement->execute([
            'category_id' => $category_id
        ]);

        foreach ($statement->fetchAll(\PDO::FETCH_ASSOC) as $result) {
            $implode[] = (int)$result['filter_id'];
        }

        $filter_group_data = array();

        if ($implode) {
            $filter_group_query = $this->db->prepare("
                SELECT
                    DISTINCT f.filter_group_id,
                    fgd.name,
                    fg.sort_order
                FROM
                    filter f
                LEFT JOIN
                    filter_group fg ON (f.filter_group_id = fg.filter_group_id)
                LEFT JOIN
                    filter_group_description fgd ON (fg.filter_group_id = fgd.filter_group_id)
                WHERE
                    f.filter_id IN (" . implode(',', $implode) . ")
                    AND fgd.language_id = '" . (int)$this->config->get('config_language_id') . "'
                GROUP BY
                    f.filter_group_id
                ORDER BY
                    fg.sort_order,
                    fgd.name
            ");

            foreach ($filter_group_query->rows as $filter_group) {
                $filter_data = array();

                $filter_query = $this->db->query("SELECT DISTINCT f.filter_id, fd.name FROM " . DB_PREFIX . "filter f LEFT JOIN " . DB_PREFIX . "filter_description fd ON (f.filter_id = fd.filter_id) WHERE f.filter_id IN (" . implode(',', $implode) . ") AND f.filter_group_id = '" . (int)$filter_group['filter_group_id'] . "' AND fd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY f.sort_order, LCASE(fd.name)");

                foreach ($filter_query->rows as $filter) {
                    $filter_data[] = array(
                        'filter_id' => $filter['filter_id'],
                        'name'      => $filter['name']
                    );
                }

                if ($filter_data) {
                    $filter_group_data[] = array(
                        'filter_group_id' => $filter_group['filter_group_id'],
                        'name'            => $filter_group['name'],
                        'filter'          => $filter_data
                    );
                }
            }
        }

        return $filter_group_data;
    }

    public function getCategoryLayoutId(int $category_id): int {
        $statement = $this->db->prepare("
            SELECT
                *
            FROM
                category_to_layout
            WHERE
                category_id = :category_id
                AND store_id = :store_id
        ");

        $statement->execute([
            'category_id' => $category_id,
            'store_id'    => (int)$this->config->get('config_store_id')
        ]);

        return $statement->fetch(\PDO::FETCH_ASSOC)['layout_id'] ?? 0;
    }

    public function getTotalCategoriesByCategoryId(int $parent_id = 0): int {
        $statement = $this->db->prepare("
            SELECT
                COUNT(*) AS total
            FROM
                category c
            LEFT JOIN
                category_to_store c2s ON (c.category_id = c2s.category_id)
            WHERE
                c.parent_id = :parent_id
                AND c2s.store_id = :store_id
                AND c.status = '1'
        ");

        $statement->execute([
            'parent_id' => $parent_id,
            'store_id'  => (int)$this->config->get('config_store_id')
        ]);

        return $statement->fetch(\PDO::FETCH_ASSOC)['total'];
    }
}
