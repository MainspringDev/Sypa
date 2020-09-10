<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Account;

use Sypa\Generator\Factory\DateTimeFactory;
use Sypa\Model\Account\Customer;

class CustomerHydrator {
    const REQUIRED_DATA = [
        'customer_id',
        'customer_group_id',
        'store_id', // @todo remove?
        'language_id',
        'first_name', // @todo rename
        'last_name', // @todo rename
        'email',
        'telephone',
        'fax',
        'password',
        'salt', // @todo remove?
        'cart', // @todo remove?
        'wishlist', // @todo remove?
        'newsletter',
        'address_id',
        'custom_field',
        'ip',
        'status',
        'safe',
        'token', // @todo remove?
        'code', // @todo remove?
        'date_added'
    ];
    private DateTimeFactory $dateTimeFactory;

    public function __construct(DateTimeFactory $dateTimeFactory) {
        $this->dateTimeFactory = $dateTimeFactory;
    }

    /**
     * @param array $data
     * @return Customer
     * @throws \Exception
     */
    public function hydrate(array $data): Customer {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create Customer from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'customer_id'       => $customer_id,
            'customer_group_id' => $customer_group_id,
            'store_id'          => $store_id,
            'language_id'       => $language_id,
            'first_name'        => $first_name,
            'last_name'         => $last_name,
            'email'             => $email,
            'telephone'         => $telephone,
            'fax'               => $fax,
            'password'          => $password,
            'salt'              => $salt,
            'cart'              => $cart,
            'wishlist'          => $wishlist,
            'newsletter'        => $newsletter,
            'address_id'        => $address_id,
            'custom_field'      => $custom_field,
            'ip'                => $ip,
            'status'            => $status,
            'safe'              => $safe,
            'token'             => $token,
            'code'              => $code,
            'date_added'        => $date_added
        ) = $data;

        return new Customer(
            $customer_id,
            $customer_group_id,
            $store_id,
            $language_id,
            $first_name,
            $last_name,
            $email,
            $telephone,
            $fax,
            $password,
            $salt,
            $cart,
            $wishlist,
            $newsletter,
            $address_id,
            $custom_field,
            $ip,
            $status,
            $safe,
            $token,
            $code,
            $this->dateTimeFactory->makeDateTimeImmutable($date_added)
        );
    }

    /**
     * @param Customer $customer
     * @return array<string, mixed>
     */
    public function extract(Customer $customer): array {
        return [
            'customer_id'       => $customer->getCustomerId(),
            'customer_group_id' => $customer->getCustomerGroupId(),
            'store_id'          => $customer->getStoreId(),
            'language_id'       => $customer->getLanguageId(),
            'first_name'        => $customer->getFirstName(),
            'last_name'         => $customer->getLastName(),
            'email'             => $customer->getEmail(),
            'telephone'         => $customer->getTelephone(),
            'fax'               => $customer->getFax(),
            'password'          => $customer->getPassword(),
            'salt'              => $customer->getSalt(),
            'cart'              => $customer->getCart(),
            'wishlist'          => $customer->getwishlist(),
            'newsletter'        => $customer->isNewsletter(),
            'address_id'        => $customer->getAddressId(),
            'custom_field'      => $customer->getCustomField(),
            'ip'                => $customer->getIp(),
            'status'            => $customer->isStatus(),
            'safe'              => $customer->isSafe(),
            'token'             => $customer->getToken(),
            'code'              => $customer->getCode(),
            'date_added'        => $customer->getDateAdded()
        ];
    }
}
