<?php

declare(strict_types=1);

namespace OpenCart\Catalog\Model\Account;

use OpenCart\System\Library\Config;

class AffiliateRepository {
    /**
     * @var \PDO
     */
    private $db;
    /**
     * @var Config
     */
    private $config;

    public function __construct(\PDO $db, Config $config) {
        $this->db = $db;
        $this->config = $config;
    }

    /**
     * @param int $customer_id
     * @param array $data
     */
    public function addAffiliate(int $customer_id, array $data) {
        $statement = $this->db->prepare("
            INSERT INTO 
                customer_affiliate
            SET 
                customer_id = :customer_id, 
                company = :company, 
                website = :website, 
                tracking = :tracking, 
                commission = :commission, 
                tax = :tax, 
                payment = :payment, 
                cheque = :cheque,
                paypal = :paypal, 
                bank_name = :bank_name,
                bank_branch_number = :bank_branch_number, 
                bank_swift_code = :bank_swift_code, 
                bank_account_name = :bank_account_name, 
                bank_account_number = :bank_account_number, 
                custom_field = :custom_field, 
                status = :status
        ");

        $statement->execute([
            'customer_id'         => $customer_id,
            'company'             => $data['company'],
            'website'             => $data['website'],
            'tracking'            => token(10),
            'commission'          => (float)$this->config->get('config_affiliate_commission'),
            'tax'                 => $data['tax'],
            'payment'             => $data['payment'],
            'cheque'              => $data['cheque'],
            'paypal'              => $data['paypal'],
            'bank_name'           => $data['bank_name'],
            'bank_branch_number'  => $data['bank_branch_number'],
            'bank_swift_code'     => $data['bank_swift_code'],
            'bank_account_name'   => $data['bank_account_name'],
            'bank_account_number' => $data['bank_account_number'],
            'custom_field'        => isset($data['custom_field']['affiliate']) ? json_encode($data['custom_field']['affiliate']) : '',
            'status'              => (int)!$this->config->get('config_affiliate_approval')
        ]);

        if ($this->config->get('config_affiliate_approval')) {
            $this->db->query("INSERT INTO `" . DB_PREFIX . "customer_approval` SET customer_id = '" . (int)$customer_id . "', type = 'affiliate', date_added = NOW()");
        }
    }

    public function editAffiliate(int $customer_id, array $data) {
        $this->db->query("UPDATE " . DB_PREFIX . "customer_affiliate SET `company` = '" . $this->db->escape((string)$data['company']) . "', `website` = '" . $this->db->escape((string)$data['website']) . "', `commission` = '" . (float)$this->config->get('config_affiliate_commission') . "', `tax` = '" . $this->db->escape((string)$data['tax']) . "', `payment` = '" . $this->db->escape((string)$data['payment']) . "', `cheque` = '" . $this->db->escape((string)$data['cheque']) . "', `paypal` = '" . $this->db->escape((string)$data['paypal']) . "', `bank_name` = '" . $this->db->escape((string)$data['bank_name']) . "', `bank_branch_number` = '" . $this->db->escape((string)$data['bank_branch_number']) . "', `bank_swift_code` = '" . $this->db->escape((string)$data['bank_swift_code']) . "', `bank_account_name` = '" . $this->db->escape((string)$data['bank_account_name']) . "', `bank_account_number` = '" . $this->db->escape((string)$data['bank_account_number']) . "', custom_field = '" . $this->db->escape(isset($data['custom_field']['affiliate']) ? json_encode($data['custom_field']['affiliate']) : '') . "' WHERE `customer_id` = '" . (int)$customer_id . "'");
    }

    public function getAffiliate(int $customer_id) {
        $statement = $this->db->prepare("
            SELECT 
                * 
            FROM 
                customer_affiliate
            WHERE 
                customer_id = :customer_id
        ");

        $statement->execute(['customer_id' => $customer_id]);

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getAffiliateByTracking(string $code) {
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_affiliate` WHERE `tracking` = '" . $this->db->escape($code) . "'");

        return $query->row;
    }

    public function addAffiliateReport(int $customer_id, string $ip, string $country = '') {
        $this->db->query("INSERT INTO `" . DB_PREFIX . "customer_affiliate_report` SET customer_id = '" . (int)$customer_id . "', store_id = '" . (int)$this->config->get('config_store_id') . "', ip = '" . $this->db->escape($ip) . "', country = '" . $this->db->escape($country) . "', date_added = NOW()");
    }
}
