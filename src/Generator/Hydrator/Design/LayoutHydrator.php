<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Design;

use Sypa\Model\Design\Layout;

class LayoutHydrator {
    const REQUIRED_DATA = [
        'layout_id',
        'name'
    ];

    /**
     * @param array $data
     * @return Layout
     * @throws \Exception
     */
    public function hydrate(array $data): Layout {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create layout from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'layout_id' => $layout_id,
            'name'      => $name
            ) = $data;

        return new Layout($layout_id, $name);
    }

    /**
     * @param Layout $layout
     * @return array<string, mixed>
     */
    public function extract(Layout $layout): array {
        return [
            'layout_id' => $layout->getLayoutId(),
            'name'      => $layout->getName()
        ];
    }
}
