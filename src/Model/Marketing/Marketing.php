<?php

declare(strict_types=1);

namespace Sypa\Model\Marketing;

class Marketing {
    private int $marketing_id;
    private string $name;
    private string $description;
    private string $code;
    private int $clicks;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $marketing_id,
        string $name,
        string $description,
        string $code,
        int $clicks,
        \DateTimeImmutable $date_added
    ) {
        $this->marketing_id = $marketing_id;
        $this->name = $name;
        $this->description = $description;
        $this->code = $code;
        $this->clicks = $clicks;
        $this->date_added = $date_added;
    }

    public function getMarketingId(): int {
        return $this->marketing_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getClicks(): int {
        return $this->clicks;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
