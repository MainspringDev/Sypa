<?php

namespace Sypa\Generator\Hydrator;

use Sypa\Model\Extension;
use Sypa\Exception\MalformedResourceException;

class ExtensionHydrator {
    const REQUIRED_DATA = [
        'extension_id',
        'type',
        'code'
    ];

    /**
     * @param array $data
     * @return Extension
     * @throws MalformedResourceException
     */
    public function hydrate(array $data): Extension {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create extension from array data. Missing index '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'extension_id' => $extension_id,
            'type'         => $type,
            'code'         => $code
        ) = $data;

        try {
            return new Extension($extension_id, $type, $code);
        } catch (\Exception $e) {
            throw new MalformedResourceException("Resource 'extension' is malformed.", 0, $e);
        }
    }

    /**
     * @param Extension $extension
     * @return array<string, mixed>
     */
    public function extract(Extension $extension): array {
        return [
            'extension_id' => $extension->getExtensionId(),
            'type'         => $extension->getType(),
            'code'         => $extension->getCode()
        ];
    }
}
