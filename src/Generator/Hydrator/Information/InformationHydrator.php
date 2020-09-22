<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Information;

use Sypa\Generator\Factory\DateTimeFactory;
use Sypa\Model\Information\Information;

class InformationHydrator {
    const REQUIRED_DATA = [
        'information_id',
        'bottom',
        'sort_order',
        'status'
    ];
    private DateTimeFactory $dateTimeFactory;

    public function __construct(DateTimeFactory $dateTimeFactory) {
        $this->dateTimeFactory = $dateTimeFactory;
    }

    /**
     * @param array $data
     * @return Information
     * @throws \Exception
     */
    public function hydrate(array $data): Information {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create Information from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'information_id' => $information_id,
            'bottom'         => $bottom,
            'sort_order'     => $sort_order,
            'status'         => $status,
            'date_added'     => $date_added,
            'date_modified'  => $date_modified,
            'display'        => $display
        ) = $data;

        return new Information(
            $information_id,
            $bottom,
            $sort_order,
            $status,
            $this->dateTimeFactory->makeDateTimeImmutable($date_added),
            $this->dateTimeFactory->makeDateTimeImmutable($date_modified),
            $display
        );
    }

    /**
     * @param Information $information
     * @return array<string, mixed>
     */
    public function extract(Information $information): array {
        return [
            'information_id' => $information->getInformationId(),
            'bottom'         => $information->getBottom(),
            'sort_order'     => $information->getSortOrder(),
            'status'         => $information->isStatus(),
            'date_added'     => $information->getDateAdded(),
            'date_modified'  => $information->getDateModified(),
            'display'        => $information->isDisplay()
        ];
    }
}
