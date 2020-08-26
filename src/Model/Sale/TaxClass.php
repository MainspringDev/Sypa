<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class TaxClass {
    private int $tax_class_id;
    private string $title;
    private string $description;
    private \DateTimeImmutable $date_added;
    private \DateTimeImmutable $date_modified;

    public function __construct(
        int $tax_class_id,
        string $title,
        string $description,
        \DateTimeImmutable $date_added,
        \DateTimeImmutable $date_modified
    ) {
        $this->tax_class_id = $tax_class_id;
        $this->title = $title;
        $this->description = $description;
        $this->date_added = $date_added;
        $this->date_modified = $date_modified;
    }

    public function getTaxClassId(): int {
        return $this->tax_class_id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }
}
