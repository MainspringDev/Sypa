<?php

declare(strict_types=1);

namespace Sypa\Model;

class Download {
    /**
     * @var int
     */
    private $download_id;
    /**
     * @var mixed
     */
    private $resource;
    /**
     * @var \DateTimeImmutable
     */
    private $date_added;
}
