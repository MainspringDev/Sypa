<?php

declare(strict_types=1);

namespace Sypa\Model;

class Order {
    private int $order_id;
    private int $invoice_number;
    private string $invoice_prefix;
    private int $store_id;
    private string $store_name;
    private string $store_url;
    private int $customer_id;
    private int $customer_group_id;
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $telephone;
    private string $fax;
    private string $custom_field;
    private string $payment_first_name;
    private string $payment_last_name;
    private string $payment_organization;
    private string $payment_street_1;
    private string $payment_street_2;
    private string $payment_city;
    private string $payment_postcode;
    private string $payment_country;
    private string $payment_country_code;
    private string $payment_zone;
    private int $payment_zone_id;
    private string $payment_address_format;
    private string $payment_custom_field;
    private string $payment_method;
    private string $payment_code;
    private string $shipping_first_name;
    private string $shipping_last_name;
    private string $shipping_organization;
    private string $shipping_street_1;
    private string $shipping_street_2;
    private string $shipping_city;
    private string $shipping_postcode;
    private string $shipping_country;
    private string $shipping_country_code;
    private string $shipping_zone;
    private int $shipping_zone_id;
    private string $shipping_address_format;
    private string $shipping_custom_field;
    private string $shipping_method;
    private string $shipping_code;
    private string $comment;
    private float $total;
    private int $order_status_id;
    private int $affiliate_id;
    private float $commission;
    private int $marketing_id;
    private string $tracking;
    private int $language_id;
    private int $currency_id;
    private string $currency_code;
    private float $currency_value;
    private string $ip;
    private string $forwarded_ip;
    private string $user_agent;
    private string $accept_language;
    private \DateTimeImmutable $date_added;
    private \DateTimeImmutable $date_modified;
    private string $tax_id;
    private int $reward;

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
        \DateTimeImmutable $date_added,
        \DateTimeImmutable $date_modified,
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

    public function getOrderId(): int {
        return $this->order_id;
    }

    public function getInvoiceNumber(): int {
        return $this->invoice_number;
    }

    public function getInvoicePrefix(): string {
        return $this->invoice_prefix;
    }

    public function getStoreId(): int {
        return $this->store_id;
    }

    public function getStoreName(): string {
        return $this->store_name;
    }

    public function getStoreUrl(): string {
        return $this->store_url;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }

    public function getCustomerGroupId(): int {
        return $this->customer_group_id;
    }

    public function getFirstName(): string {
        return $this->first_name;
    }

    public function getLastName(): string {
        return $this->last_name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getTelephone(): string {
        return $this->telephone;
    }

    public function getFax(): string {
        return $this->fax;
    }

    public function getCustomField(): string {
        return $this->custom_field;
    }

    public function getPaymentFirstName(): string {
        return $this->payment_first_name;
    }

    public function getPaymentLastName(): string {
        return $this->payment_last_name;
    }

    public function getPaymentOrganization(): string {
        return $this->payment_organization;
    }

    public function getPaymentStreet1(): string {
        return $this->payment_street_1;
    }

    public function getPaymentStreet2(): string {
        return $this->payment_street_2;
    }

    public function getPaymentCity(): string {
        return $this->payment_city;
    }

    public function getPaymentPostcode(): string {
        return $this->payment_postcode;
    }

    public function getPaymentCountry(): string {
        return $this->payment_country;
    }

    public function getPaymentCountryCode(): string {
        return $this->payment_country_code;
    }

    public function getPaymentZone(): string {
        return $this->payment_zone;
    }

    public function getPaymentZoneId(): int {
        return $this->payment_zone_id;
    }

    public function getPaymentAddressFormat(): string {
        return $this->payment_address_format;
    }

    public function getPaymentCustomField(): string {
        return $this->payment_custom_field;
    }

    public function getPaymentMethod(): string {
        return $this->payment_method;
    }

    public function getPaymentCode(): string {
        return $this->payment_code;
    }

    public function getShippingFirstName(): string {
        return $this->shipping_first_name;
    }

    public function getShippingLastName(): string {
        return $this->shipping_last_name;
    }

    public function getShippingOrganization(): string {
        return $this->shipping_organization;
    }

    public function getShippingStreet1(): string {
        return $this->shipping_street_1;
    }

    public function getShippingStreet2(): string {
        return $this->shipping_street_2;
    }

    public function getShippingCity(): string {
        return $this->shipping_city;
    }

    public function getShippingPostcode(): string {
        return $this->shipping_postcode;
    }

    public function getShippingCountry(): string {
        return $this->shipping_country;
    }

    public function getShippingCountryCode(): string {
        return $this->shipping_country_code;
    }

    public function getShippingZone(): string {
        return $this->shipping_zone;
    }

    public function getShippingZoneId(): int {
        return $this->shipping_zone_id;
    }

    public function getShippingAddressFormat(): string {
        return $this->shipping_address_format;
    }

    public function getShippingCustomField(): string {
        return $this->shipping_custom_field;
    }

    public function getShippingMethod(): string {
        return $this->shipping_method;
    }

    public function getShippingCode(): string {
        return $this->shipping_code;
    }

    public function getComment(): string {
        return $this->comment;
    }

    public function getTotal(): float {
        return $this->total;
    }

    public function getOrderStatusId(): int {
        return $this->order_status_id;
    }

    public function getAffiliateId(): int {
        return $this->affiliate_id;
    }

    public function getCommission(): float {
        return $this->commission;
    }

    public function getMarketingId(): int {
        return $this->marketing_id;
    }

    public function getTracking(): string {
        return $this->tracking;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getCurrencyId(): int {
        return $this->currency_id;
    }

    public function getCurrencyCode(): string {
        return $this->currency_code;
    }

    public function getCurrencyValue(): float {
        return $this->currency_value;
    }

    public function getIp(): string {
        return $this->ip;
    }

    public function getForwardedIp(): string {
        return $this->forwarded_ip;
    }

    public function getUserAgent(): string {
        return $this->user_agent;
    }

    public function getAcceptLanguage(): string {
        return $this->accept_language;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }

    public function getTaxId(): string {
        return $this->tax_id;
    }

    public function getReward(): int {
        return $this->reward;
    }
}
