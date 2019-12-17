<?php

namespace OpenCart\Catalog\Controller\Startup;

use OpenCart\System\Engine\Action;
use OpenCart\System\Engine\Controller;
use OpenCart\System\Library\Cart\User;

class ControllerStartupMaintenance extends Controller {
    public function index() {
        if ($this->config->get('config_maintenance')) {
            // Route
            if (isset($this->request->get['route']) && $this->request->get['route'] != 'startup/router') {
                $route = $this->request->get['route'];
            } else {
                $route = $this->config->get('action_default');
            }

            $ignore = array(
                'common/language/language',
                'common/currency/currency'
            );

            // Show site if logged in as admin
            $this->user = new User($this->registry);

            if ((substr($route, 0, 17) != 'extension/payment' && substr($route, 0, 3) != 'api') && !in_array($route, $ignore) && !$this->user->isLogged()) {
                return new Action('common/maintenance');
            }
        }
    }
}
