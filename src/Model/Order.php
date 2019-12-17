<?php

declare(strict_types=1);

namespace Sypa\Model;

class Order {
    /**
     * @var int
     */
    private $order_id;
    /**
     * @var int
     */
    private $invoice_number;
    /**
     * @var string
     */
    private $invoice_prefix;
    /**
     * @var int
     */
    private $store_id;
    /**
     * @var string
     */
    private $store_name;
    /**
     * @var string
     */
    private $store_url;
    /**
     * @var int
     */
    private $customer_id;
    /**
     * @var int
     */
    private $customer_group_id;
    /**
     * @var string
     */
    private $first_name;
    /**
     * @var string
     */
    private $last_name;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $telephone;
    /**
     * @var string
     */
    private $fax;
    /**
     * @var string
     */
    private $custom_field;
    /**
     * @var string
     */
    private $payment_first_name;
    /**
     * @var string
     */
    private $payment_last_name;
    /**
     * @var string
     */
    private $payment_organization;
    /**
     * @var string
     */
    private $payment_street_1;
    /**
     * @var string
     */
    private $payment_street_2;
    /**
     * @var string
     */
    private $payment_city;
    /**
     * @var string
     */
    private $payment_postcode;
    /**
     * @var string
     */
    private $payment_country;
    /**
     * @var string
     */
    private $payment_country_code;
    /**
     * @var string
     */
    private $payment_zone;
    /**
     * @var int
     */
    private $payment_zone_id;
    /**
     * @var string
     */
    private $payment_address_format;
    /**
     * @var string
     */
    private $payment_custom_field;
    /**
     * @var string
     */
    private $payment_method;
    /**
     * @var string
     */
    private $payment_code;
    /**
     * @var string
     */
    private $shipping_first_name;
    /**
     * @var string
     */
    private $shipping_last_name;
    /**
     * @var string
     */
    private $shipping_organization;
    /**
     * @var string
     */
    private $shipping_street_1;
    /**
     * @var string
     */
    private $shipping_street_2;
    /**
     * @var string
     */
    private $shipping_city;
    /**
     * @var string
     */
    private $shipping_postcode;
    /**
     * @var string
     */
    private $shipping_country;
    /**
     * @var string
     */
    private $shipping_country_code;
    /**
     * @var string
     */
    private $shipping_zone;
    /**
     * @var int
     */
    private $shipping_zone_id;
    /**
     * @var string
     */
    private $shipping_address_format;
    /**
     * @var string
     */
    private $shipping_custom_field;
    /**
     * @var string
     */
    private $shipping_method;
    /**
     * @var string
     */
    private $shipping_code;
    /**
     * @var string
     */
    private $comment;
    /**
     * @var float
     */
    private $total;
    /**
     * @var int
     */
    private $order_status_id;
    /**
     * @var int
     */
    private $affiliate_id;
    /**
     * @var float
     */
    private $commission;
    /**
     * @var int
     */
    private $marketing_id;
    /**
     * @var string
     */
    private $tracking;
    /**
     * @var int
     */
    private $language_id;
    /**
     * @var int
     */
    private $currency_id;
    /**
     * @var string
     */
    private $currency_code;
    /**
     * @var float
     */
    private $currency_value;
    /**
     * @var string
     */
    private $ip;
    /**
     * @var string
     */
    private $forwarded_ip;
    /**
     * @var string
     */
    private $user_agent;
    /**
     * @var string
     */
    private $accept_language;
    /**
     * @var \DateTimeInterface
     */
    private $date_added;
    /**
     * @var \DateTimeInterface
     */
    private $date_modified;
    /**
     * @var string
     */
    private $tax_id;
    /**
     * @var int
     */
    private $reward;

    /**
     * @param int $order_id
     * @param int $invoice_number
     * @param string $invoice_prefix
     * @param int $store_id
     * @param string $store_name
     * @param string $store_url
     * @param int $customer_id
     * @param int $customer_group_id
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param string $telephone
     * @param string $fax
     * @param string $custom_field
     * @param string $payment_first_name
     * @param string $payment_last_name
     * @param string $payment_organization
     * @param string $payment_street_1
     * @param string $payment_street_2
     * @param string $payment_city
     * @param string $payment_postcode
     * @param string $payment_country
     * @param string $payment_country_code
     * @param string $payment_zone
     * @param int $payment_zone_id
     * @param string $payment_address_format
     * @param string $payment_custom_field
     * @param string $payment_method
     * @param string $payment_code
     * @param string $shipping_first_name
     * @param string $shipping_last_name
     * @param string $shipping_organization
     * @param string $shipping_street_1
     * @param string $shipping_street_2
     * @param string $shipping_city
     * @param string $shipping_postcode
     * @param string $shipping_country
     * @param string $shipping_country_code
     * @param string $shipping_zone
     * @param int $shipping_zone_id
     * @param string $shipping_address_format
     * @param string $shipping_custom_field
     * @param string $shipping_method
     * @param string $shipping_code
     * @param string $comment
     * @param float $total
     * @param int $order_status_id
     * @param int $affiliate_id
     * @param float $commission
     * @param int $marketing_id
     * @param string $tracking
     * @param int $language_id
     * @param int $currency_id
     * @param string $currency_code
     * @param float $currency_value
     * @param string $ip
     * @param string $forwarded_ip
     * @param string $user_agent
     * @param string $accept_language
     * @param \DateTimeInterface $date_added
     * @param \DateTimeInterface $date_modified
     * @param string $tax_id
     * @param int $reward
     */
    public function __construct(
        int $order_id,
        int $invoice_number,
        string $invoice_prefix,
        int $store_id,
        string $store_name,
        string $store_url,
        int $customer_id,
        int $customer_group_id,
        string $first_name,
        string $last_name,
        string $email,
        string $telephone,
        string $fax,
        string $custom_field,
        string $payment_first_name,
        string $payment_last_name,
        string $payment_organization,
        string $payment_street_1,
        string $payment_street_2,
        string $payment_city,
        string $payment_postcode,
        string $payment_country,
        string $payment_country_code,
        string $payment_zone,
        int $payment_zone_id,
        string $payment_address_format,
        string $payment_custom_field,
        string $payment_method,
        string $payment_code,
        string $shipping_first_name,
        string $shipping_last_name,
        string $shipping_organization,
        string $shipping_street_1,
        string $shipping_street_2,
        string $shipping_city,
        string $shipping_postcode,
        string $shipping_country,
        string $shipping_country_code,
        string $shipping_zone,
        int $shipping_zone_id,
        string $shipping_address_format,
        string $shipping_custom_field,
        string $shipping_method,
        string $shipping_code,
        string $comment,
        float $total,
        int $order_status_id,
        int $affiliate_id,
        float $commission,
        int $marketing_id,
        string $tracking,
        int $language_id,
        int $currency_id,
        string $currency_code,
        float $currency_value,
        string $ip,
        string $forwarded_ip,
        string $user_agent,
        string $accept_language,
        \DateTimeInterface $date_added,
        \DateTimeInterface $date_modified,
        string $tax_id,
        int $reward
    ) {
        $this->order_id = $order_id;
        $this->invoice_number = $invoice_number;
        $this->invoice_prefix = $invoice_prefix;
        $this->store_id = $store_id;
        $this->store_name = $store_name;
        $this->store_url = $store_url;
        $this->customer_id = $customer_id;
        $this->customer_group_id = $customer_group_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->fax = $fax;
        $this->custom_field = $custom_field;
        $this->payment_first_name = $payment_first_name;
        $this->payment_last_name = $payment_last_name;
        $this->payment_organization = $payment_organization;
        $this->payment_street_1 = $payment_street_1;
        $this->payment_street_2 = $payment_street_2;
        $this->payment_city = $payment_city;
        $this->payment_postcode = $payment_postcode;
        $this->payment_country = $payment_country;
        $this->payment_country_code = $payment_country_code;
        $this->payment_zone = $payment_zone;
        $this->payment_zone_id = $payment_zone_id;
        $this->payment_address_format = $payment_address_format;
        $this->payment_custom_field = $payment_custom_field;
        $this->payment_method = $payment_method;
        $this->payment_code = $payment_code;
        $this->shipping_first_name = $shipping_first_name;
        $this->shipping_last_name = $shipping_last_name;
        $this->shipping_organization = $shipping_organization;
        $this->shipping_street_1 = $shipping_street_1;
        $this->shipping_street_2 = $shipping_street_2;
        $this->shipping_city = $shipping_city;
        $this->shipping_postcode = $shipping_postcode;
        $this->shipping_country = $shipping_country;
        $this->shipping_country_code = $shipping_country_code;
        $this->shipping_zone = $shipping_zone;
        $this->shipping_zone_id = $shipping_zone_id;
        $this->shipping_address_format = $shipping_address_format;
        $this->shipping_custom_field = $shipping_custom_field;
        $this->shipping_method = $shipping_method;
        $this->shipping_code = $shipping_code;
        $this->comment = $comment;
        $this->total = $total;
        $this->order_status_id = $order_status_id;
        $this->affiliate_id = $affiliate_id;
        $this->commission = $commission;
        $this->marketing_id = $marketing_id;
        $this->tracking = $tracking;
        $this->language_id = $language_id;
        $this->currency_id = $currency_id;
        $this->currency_code = $currency_code;
        $this->currency_value = $currency_value;
        $this->ip = $ip;
        $this->forwarded_ip = $forwarded_ip;
        $this->user_agent = $user_agent;
        $this->accept_language = $accept_language;
        $this->date_added = $date_added;
        $this->date_modified = $date_modified;
        $this->tax_id = $tax_id;
        $this->reward = $reward;
    }

    /**
     * @return int
     */
    public function getOrderId(): int {
        return $this->order_id;
    }

    /**
     * @return int
     */
    public function getInvoiceNumber(): int {
        return $this->invoice_number;
    }

    /**
     * @return string
     */
    public function getInvoicePrefix(): string {
        return $this->invoice_prefix;
    }

    /**
     * @return int
     */
    public function getStoreId(): int {
        return $this->store_id;
    }

    /**
     * @return string
     */
    public function getStoreName(): string {
        return $this->store_name;
    }

    /**
     * @return string
     */
    public function getStoreUrl(): string {
        return $this->store_url;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int {
        return $this->customer_id;
    }

    /**
     * @return int
     */
    public function getCustomerGroupId(): int {
        return $this->customer_group_id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string {
        return $this->last_name;
    }

    /**
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getTelephone(): string {
        return $this->telephone;
    }

    /**
     * @return string
     */
    public function getFax(): string {
        return $this->fax;
    }

    /**
     * @return string
     */
    public function getCustomField(): string {
        return $this->custom_field;
    }

    /**
     * @return string
     */
    public function getPaymentFirstName(): string {
        return $this->payment_first_name;
    }

    /**
     * @return string
     */
    public function getPaymentLastName(): string {
        return $this->payment_last_name;
    }

    /**
     * @return string
     */
    public function getPaymentOrganization(): string {
        return $this->payment_organization;
    }

    /**
     * @return string
     */
    public function getPaymentStreet1(): string {
        return $this->payment_street_1;
    }

    /**
     * @return string
     */
    public function getPaymentStreet2(): string {
        return $this->payment_street_2;
    }

    /**
     * @return string
     */
    public function getPaymentCity(): string {
        return $this->payment_city;
    }

    /**
     * @return string
     */
    public function getPaymentPostcode(): string {
        return $this->payment_postcode;
    }

    /**
     * @return string
     */
    public function getPaymentCountry(): string {
        return $this->payment_country;
    }

    /**
     * @return string
     */
    public function getPaymentCountryCode(): string {
        return $this->payment_country_code;
    }

    /**
     * @return string
     */
    public function getPaymentZone(): string {
        return $this->payment_zone;
    }

    /**
     * @return int
     */
    public function getPaymentZoneId(): int {
        return $this->payment_zone_id;
    }

    /**
     * @return string
     */
    public function getPaymentAddressFormat(): string {
        return $this->payment_address_format;
    }

    /**
     * @return string
     */
    public function getPaymentCustomField(): string {
        return $this->payment_custom_field;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string {
        return $this->payment_method;
    }

    /**
     * @return string
     */
    public function getPaymentCode(): string {
        return $this->payment_code;
    }

    /**
     * @return string
     */
    public function getShippingFirstName(): string {
        return $this->shipping_first_name;
    }

    /**
     * @return string
     */
    public function getShippingLastName(): string {
        return $this->shipping_last_name;
    }

    /**
     * @return string
     */
    public function getShippingOrganization(): string {
        return $this->shipping_organization;
    }

    /**
     * @return string
     */
    public function getShippingStreet1(): string {
        return $this->shipping_street_1;
    }

    /**
     * @return string
     */
    public function getShippingStreet2(): string {
        return $this->shipping_street_2;
    }

    /**
     * @return string
     */
    public function getShippingCity(): string {
        return $this->shipping_city;
    }

    /**
     * @return string
     */
    public function getShippingPostcode(): string {
        return $this->shipping_postcode;
    }

    /**
     * @return string
     */
    public function getShippingCountry(): string {
        return $this->shipping_country;
    }

    /**
     * @return string
     */
    public function getShippingCountryCode(): string {
        return $this->shipping_country_code;
    }

    /**
     * @return string
     */
    public function getShippingZone(): string {
        return $this->shipping_zone;
    }

    /**
     * @return int
     */
    public function getShippingZoneId(): int {
        return $this->shipping_zone_id;
    }

    /**
     * @return string
     */
    public function getShippingAddressFormat(): string {
        return $this->shipping_address_format;
    }

    /**
     * @return string
     */
    public function getShippingCustomField(): string {
        return $this->shipping_custom_field;
    }

    /**
     * @return string
     */
    public function getShippingMethod(): string {
        return $this->shipping_method;
    }

    /**
     * @return string
     */
    public function getShippingCode(): string {
        return $this->shipping_code;
    }

    /**
     * @return string
     */
    public function getComment(): string {
        return $this->comment;
    }

    /**
     * @return float
     */
    public function getTotal(): float {
        return $this->total;
    }

    /**
     * @return int
     */
    public function getOrderStatusId(): int {
        return $this->order_status_id;
    }

    /**
     * @return int
     */
    public function getAffiliateId(): int {
        return $this->affiliate_id;
    }

    /**
     * @return float
     */
    public function getCommission(): float {
        return $this->commission;
    }

    /**
     * @return int
     */
    public function getMarketingId(): int {
        return $this->marketing_id;
    }

    /**
     * @return string
     */
    public function getTracking(): string {
        return $this->tracking;
    }

    /**
     * @return int
     */
    public function getLanguageId(): int {
        return $this->language_id;
    }

    /**
     * @return int
     */
    public function getCurrencyId(): int {
        return $this->currency_id;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(): string {
        return $this->currency_code;
    }

    /**
     * @return float
     */
    public function getCurrencyValue(): float {
        return $this->currency_value;
    }

    /**
     * @return string
     */
    public function getIp(): string {
        return $this->ip;
    }

    /**
     * @return string
     */
    public function getForwardedIp(): string {
        return $this->forwarded_ip;
    }

    /**
     * @return string
     */
    public function getUserAgent(): string {
        return $this->user_agent;
    }

    /**
     * @return string
     */
    public function getAcceptLanguage(): string {
        return $this->accept_language;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateAdded(): \DateTimeInterface {
        return $this->date_added;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateModified(): \DateTimeInterface {
        return $this->date_modified;
    }

    /**
     * @return string
     */
    public function getTaxId(): string {
        return $this->tax_id;
    }

    /**
     * @return int
     */
    public function getReward(): int {
        return $this->reward;
    }
}
