<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Sale;

use Sypa\Model\Sale\ReturnReason;

class ReturnReasonHydrator {
    const REQUIRED_DATA = [
        'return_reason_id',
        'language_id',
        'name'
    ];

    /**
     * @param array $data
     * @return ReturnReason
     * @throws \Exception
     */
    public function hydrate(array $data): ReturnReason {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create return reason from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'return_reason_id' => $return_reason_id,
            'language_id'      => $language_id,
            'name'             => $name
        ) = $data;

        return new ReturnReason($return_reason_id, $language_id, $name);
    }

    /**
     * @param ReturnReason $returnReason
     * @return array<string, mixed>
     */
    public function extract(ReturnReason $returnReason): array {
        return [
            'return_reason_id' => $returnReason->getReturnReasonId(),
            'language_id'      => $returnReason->getLanguageId(),
            'name'             => $returnReason->getName()
        ];
    }
}
