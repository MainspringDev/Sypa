<?php

declare(strict_types=1);

namespace Sypa\Model;

class Download {
    private int $download_id;
    /**
     * @var mixed
     */
    private $resource;
    private \DateTimeImmutable $date_added;
}
