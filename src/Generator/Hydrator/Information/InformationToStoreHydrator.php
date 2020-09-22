<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Information;

use Sypa\Model\Information\InformationToStore;

class InformationToStoreHydrator {
    const REQUIRED_DATA = [
        'information_id',
        'store_id'
    ];

    /**
     * @param array $data
     * @return InformationToStore
     * @throws \Exception
     */
    public function hydrate(array $data): InformationToStore {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create InformationToStore from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'information_id' => $information_id,
            'store_id'       => $store_id
        ) = $data;

        return new InformationToStore(
            $information_id,
            $store_id
        );
    }

    /**
     * @param InformationToStore $informationToStore
     * @return array<string, mixed>
     */
    public function extract(InformationToStore $informationToStore): array {
        return [
            'information_id' => $informationToStore->getInformationId(),
            'store_id'       => $informationToStore->getStoreId()
        ];
    }
}
