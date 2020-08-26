<?php

declare(strict_types=1);

namespace Sypa\Model\Account;

use MyCLabs\Enum\Enum;

class AddressValidationEnum extends Enum {
    const VALID = 'VALID';
    const INSUFFICIENT = 'INSUFFICIENT';
    const INVALID = 'INVALID';
    const UNKNOWN = 'UNKNOWN';
}
