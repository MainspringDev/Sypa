<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Localization;

use Sypa\Generator\Factory\DateTimeFactory;
use Sypa\Model\Localization\Translation;

class TranslationHydrator {
    const REQUIRED_DATA = [
        'translation_id',
        'store_id',
        'language_id',
        'route',
        'key',
        'value',
        'date_added'
    ];
    private DateTimeFactory $dateTimeFactory;

    public function __construct(DateTimeFactory $dateTimeFactory) {
        $this->dateTimeFactory = $dateTimeFactory;
    }

    /**
     * @param array $data
     * @return Translation
     * @throws \Exception
     */
    public function hydrate(array $data): Translation {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create Translation from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'translation_id' => $translation_id,
            'store_id'       => $store_id,
            'language_id'    => $language_id,
            'route'          => $route,
            'key'            => $key,
            'value'          => $value,
            'date_added'     => $date_added
        ) = $data;

        return new Translation(
            $translation_id,
            $store_id,
            $language_id,
            $route,
            $key,
            $value,
            $this->dateTimeFactory->makeDateTimeImmutable($date_added)
        );
    }

    /**
     * @param Translation $translation
     * @return array<string, mixed>
     */
    public function extract(Translation $translation): array {
        return [
            'translation_id' => $translation->getTranslationId(),
            'store_id'       => $translation->getStoreId(),
            'language_id'    => $translation->getLanguageId(),
            'route'          => $translation->getRoute(),
            'key'            => $translation->getKey(),
            'value'          => $translation->getValue(),
            'date_added'     => $translation->getDateAdded()
        ];
    }
}
