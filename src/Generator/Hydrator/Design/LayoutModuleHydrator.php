<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Design;

use Sypa\Model\Design\LayoutModule;

class LayoutModuleHydrator {
    const REQUIRED_DATA = [
        'layout_module_id',
        'layout_id',
        'code',
        'position',
        'sort_order'
    ];

    /**
     * @param array $data
     * @return LayoutModule
     * @throws \Exception
     */
    public function hydrate(array $data): LayoutModule {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create layout module from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'layout_module_id' => $layout_module_id,
            'layout_id'        => $layout_id,
            'code'             => $code,
            'position'         => $position,
            'sort_order'       => $sort_order
        ) = $data;

        return new LayoutModule($layout_module_id, $layout_id, $code, $position, $sort_order);
    }

    /**
     * @param LayoutModule $layoutModule
     * @return array<string, mixed>
     */
    public function extract(LayoutModule $layoutModule): array {
        return [
            'layout_module_id' => $layoutModule->getLayoutModuleId(),
            'layout_id'        => $layoutModule->getLayoutId(),
            'code'             => $layoutModule->getCode(),
            'position'         => $layoutModule->getPosition(),
            'sort_order'       => $layoutModule->getSortOrder()
        ];
    }
}
