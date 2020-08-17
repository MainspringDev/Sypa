<?php

declare(strict_types=1);

namespace Sypa\Model;

class CustomerSearch {
    private int $customer_search_id;
    private int $store_id;
    private int $language_id;
    private int $customer_id;
    private string $keyword;
    private int $category_id;
    private bool $sub_category;
    private bool $description;
    private int $products;
    private string $ip;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $customer_search_id,
        int $store_id,
        int $language_id,
        int $customer_id,
        string $keyword,
        int $category_id,
        bool $sub_category,
        bool $description,
        int $products,
        string $ip,
        \DateTimeImmutable $date_added
    ) {
        $this->customer_search_id = $customer_search_id;
        $this->store_id = $store_id;
        $this->language_id = $language_id;
        $this->customer_id = $customer_id;
        $this->keyword = $keyword;
        $this->category_id = $category_id;
        $this->sub_category = $sub_category;
        $this->description = $description;
        $this->products = $products;
        $this->ip = $ip;
        $this->date_added = $date_added;
    }

    public function getCustomerSearchId(): int {
        return $this->customer_search_id;
    }

    public function getStoreId(): int {
        return $this->store_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }

    public function getKeyword(): string {
        return $this->keyword;
    }

    public function getCategoryId(): int {
        return $this->category_id;
    }

    public function isSubCategory(): bool {
        return $this->sub_category;
    }

    public function isDescription(): bool {
        return $this->description;
    }

    public function getProducts(): int {
        return $this->products;
    }

    public function getIp(): string {
        return $this->ip;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
