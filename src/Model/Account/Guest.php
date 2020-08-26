<?php

declare(strict_types=1);

namespace Sypa\Model\Account;

class Guest extends Customer {
    public function __construct(
        int $customer_id = 0,
        int $customer_group_id = 0,
        string $language = 'en_US',
        string $first_name = '',
        string $last_name = '',
        string $email = '',
        string $telephone = '',
        string $mobile = '',
        string $fax = '',
        string $password = '',
        bool $newsletter = false,
        string $ip = '',
        bool $active = true,
        bool $approved = true
    ) {
        parent::__construct(
            $customer_id,
            $customer_group_id,
            $language,
            $first_name,
            $last_name,
            $email,
            $telephone,
            $mobile,
            $fax,
            $password,
            $newsletter,
            $ip,
            $active,
            $approved
        );
    }
}
