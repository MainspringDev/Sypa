<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class Download {
    private int $download_id;
    /**
     * @var mixed
     */
    private $resource;
    private \DateTimeImmutable $date_added;
}
