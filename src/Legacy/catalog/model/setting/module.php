<?php

namespace OpenCart\Catalog\Model\Setting;

use OpenCart\System\Engine\Model;

class ModelSettingModule extends Model {
    public function getModule($module_id) {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "module WHERE module_id = '" . (int)$module_id . "'");

        if ($query->row) {
            return json_decode($query->row['setting'], true);
        }
            return array();

    }
}
