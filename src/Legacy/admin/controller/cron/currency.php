<?php

namespace OpenCart\Admin\Controller\Cron;

use OpenCart\System\Engine\Controller;

class ControllerCronCurrency extends Controller {
    public function index($cron_id, $code, $cycle, $date_added, $date_modified) {
        $this->load->controller('extension/currency/' . $this->config->get('config_currency_engine') . '/currency', $this->config->get('config_currency'));
    }
}
