<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator;

use Sypa\Model\Report\Statistics;

class StatisticsHydrator {
    const REQUIRED_DATA = [
        'statistics_id',
        'code',
        'value'
    ];

    /**
     * @param array $data
     * @return Statistics
     * @throws \Exception
     */
    public function hydrate(array $data): Statistics {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create statistics from array data. Missing index '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'statistics_id' => $statistics_id,
            'code'          => $code,
            'value'         => $value
        ) = $data;

        return new Statistics($statistics_id, $code, $value);
    }

    /**
     * @param Statistics $statistics
     * @return array<string, mixed>
     */
    public function extract(Statistics $statistics): array {
        return [
            'statistics_id' => $statistics->getStatisticsId(),
            'code'          => $statistics->getCode(),
            'value'         => $statistics->getValue()
        ];
    }
}
