<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Information;

use Sypa\Model\Information\InformationToLayout;

class InformationToLayoutHydrator {
    const REQUIRED_DATA = [
        'information_id',
        'store_id',
        'layout_id'
    ];

    /**
     * @param array $data
     * @return InformationToLayout
     * @throws \Exception
     */
    public function hydrate(array $data): InformationToLayout {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create InformationToLayout from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'information_id' => $information_id,
            'store_id'       => $store_id,
            'layout_id'      => $layout_id
        ) = $data;

        return new InformationToLayout(
            $information_id,
            $store_id,
            $layout_id
        );
    }

    /**
     * @param InformationToLayout $informationToLayout
     * @return array<string, mixed>
     */
    public function extract(InformationToLayout $informationToLayout): array {
        return [
            'information_id' => $informationToLayout->getInformationId(),
            'store_id'       => $informationToLayout->getStoreId(),
            'layout_id'      => $informationToLayout->getLayoutId()
        ];
    }
}
