<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator;

use Sypa\Model\Localization\Language;

class LanguageHydrator {
    const REQUIRED_DATA = [
        'language_id',
        'name',
        'code',
        'locale',
        'image',
        'sort_order',
        'status'
    ];

    /**
     * @param array $data
     * @return Language
     * @throws \Exception
     */
    public function hydrate(array $data): Language {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create language from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'language_id' => $language_id,
            'name'        => $name,
            'code'        => $code,
            'locale'      => $locale,
            'image'       => $image,
            'sort_order'  => $sort_order,
            'status'      => $status,
        ) = $data;

        return new Language(
            $language_id,
            $name,
            $code,
            $locale,
            $image,
            $sort_order,
            $status
        );
    }

    /**
     * @param Language $language
     * @return array<string, mixed>
     */
    public function extract(Language $language): array {
        return [
            'language_id' => $language->getLanguageId(),
            'name'        => $language->getName(),
            'code'        => $language->getCode(),
            'locale'      => $language->getLocale(),
            'image'       => $language->getImage(),
            'sort_order'  => $language->getSortOrder(),
            'status'      => $language->getSortOrder()
        ];
    }
}
