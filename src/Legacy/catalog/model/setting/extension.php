<?php

namespace OpenCart\Catalog\Model\Setting;

use OpenCart\System\Engine\Model;

class ModelSettingExtension extends Model {
    public function getExtensions($type) {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "extension WHERE `type` = '" . $this->db->escape($type) . "'");

        return $query->rows;
    }
}
