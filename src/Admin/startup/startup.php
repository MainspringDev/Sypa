<?php

/*
 * This class has been modified from the original source code for compatibility with the new framework.
 */

namespace OpenCart\Admin\Controller\Startup;

use OpenCart\System\Engine\Controller;
use OpenCart\System\Library\Cart\Cart;
use OpenCart\System\Library\Cart\Currency;
use OpenCart\System\Library\Cart\Customer;
use OpenCart\System\Library\Cart\Length;
use OpenCart\System\Library\Cart\Tax;
use OpenCart\System\Library\Cart\Weight;
use OpenCart\System\Library\Encryption;
use OpenCart\System\Library\Language;

class ControllerStartupStartup extends Controller {
    public function index() {
        // Settings
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "setting WHERE store_id = '0'");

        foreach ($query->rows as $setting) {
            if (!$setting['serialized']) {
                $this->config->set($setting['key'], $setting['value']);
            } else {
                $this->config->set($setting['key'], json_decode($setting['value'], true));
            }
        }

        // Set time zone
        if ($this->config->get('config_timezone')) {
            date_default_timezone_set($this->config->get('config_timezone'));

            // Sync PHP and DB time zones.
            $this->db->query("SET time_zone = '" . $this->db->escape(date('P')) . "'");
        }

        // Session
        if (isset($this->request->cookie[$this->config->get('session_name')])) {
            $session_id = $this->request->cookie[$this->config->get('session_name')];
        } else {
            $session_id = '';
        }

        $this->session->start($session_id);

        setcookie($this->config->get('session_name'), $this->session->getId(), (ini_get('session.cookie_lifetime') ? (time() + ini_get('session.cookie_lifetime')) : 0), ini_get('session.cookie_path'), ini_get('session.cookie_domain'), ini_get('session.cookie_secure'), ini_get('session.cookie_httponly'));

        // Response output compression level
        if ($this->config->get('config_compression')) {
            $this->response->setCompression($this->config->get('config_compression'));
        }

        // Language
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "language` WHERE code = '" . $this->db->escape($this->config->get('config_admin_language')) . "'");

        if ($query->num_rows) {
            $this->config->set('config_language_id', $query->row['language_id']);
        }

        // Language
        $language = new Language($this->config->get('config_admin_language'));
        $language->load($this->config->get('config_admin_language'));
        $this->registry->set('language', $language);

        // Customer
        $this->registry->set('customer', new Customer($this->registry));

        // Currency
        $this->registry->set('currency', new Currency($this->registry));

        // Tax
        $this->registry->set('tax', new Tax($this->registry));

        if ($this->config->get('config_tax_default') == 'shipping') {
            $this->tax->setShippingAddress($this->config->get('config_country_id'), $this->config->get('config_zone_id'));
        }

        if ($this->config->get('config_tax_default') == 'payment') {
            $this->tax->setPaymentAddress($this->config->get('config_country_id'), $this->config->get('config_zone_id'));
        }

        $this->tax->setStoreAddress($this->config->get('config_country_id'), $this->config->get('config_zone_id'));

        // Weight
        $this->registry->set('weight', new Weight($this->registry));

        // Length
        $this->registry->set('length', new Length($this->registry));

        // Cart
        $this->registry->set('cart', new Cart($this->registry));

        // Encryption
        $this->registry->set('encryption', new Encryption());
    }
}
