<?php

namespace OpenCart\Catalog\Model\Setting;

use OpenCart\System\Engine\Model;

class ModelSettingEvent extends Model {
    function getEvents() {
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "event` WHERE `trigger` LIKE 'catalog/%' AND `status` = '1' ORDER BY `sort_order` ASC");

        return $query->rows;
    }
}
