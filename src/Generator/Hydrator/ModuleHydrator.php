<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator;

use Sypa\Model\Setting\Module;

class ModuleHydrator {
    const REQUIRED_DATA = [
        'module_id',
        'name',
        'code',
        'setting'
    ];

    /**
     * @param array $data
     * @return Module
     * @throws \Exception
     */
    public function hydrate(array $data): Module {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create module from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'module_id' => $module_id,
            'name'      => $name,
            'code'      => $code,
            'setting'   => $setting
        ) = $data;

        return new Module($module_id, $name, $code, $setting);
    }

    /**
     * @param Module $module
     * @return array<string, mixed>
     */
    public function extract(Module $module): array {
        return [
            'module_id' => $module->getModuleId(),
            'name'      => $module->getName(),
            'code'      => $module->getCode(),
            'setting'   => $module->getSetting()
        ];
    }
}
