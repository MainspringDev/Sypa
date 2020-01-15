<?php

declare(strict_types=1);

namespace Sypa\Model;

class Download {
    /**
     * @var int
     */
    private int $download_id;
    /**
     * @var mixed
     */
    private $resource;
    /**
     * @var \DateTimeImmutable
     */
    private \DateTimeImmutable $date_added;
}
