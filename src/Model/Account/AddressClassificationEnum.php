<?php

declare(strict_types=1);

namespace Sypa\Model\Account;

use MyCLabs\Enum\Enum;

class AddressClassificationEnum extends Enum {
    const COMMERCIAL = 'COMMERCIAL';
    const RESIDENTIAL = 'RESIDENTIAL';
    const UNKNOWN = 'UNKNOWN';
}
