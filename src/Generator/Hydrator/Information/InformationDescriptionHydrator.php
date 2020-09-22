<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Information;

use Sypa\Model\Information\InformationDescription;

class InformationDescriptionHydrator {
    const REQUIRED_DATA = [
        'information_id',
        'language_id',
        'title',
        'description',
        'meta_title',
        'meta_description',
        'meta_keyword'
    ];

    /**
     * @param array $data
     * @return InformationDescription
     * @throws \Exception
     */
    public function hydrate(array $data): InformationDescription {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create InformationDescription from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'information_id'   => $information_id,
            'language_id'      => $language_id,
            'title'            => $title,
            'description'      => $description,
            'meta_title'       => $meta_title,
            'meta_description' => $meta_description,
            'meta_keyword'     => $meta_keyword
        ) = $data;

        return new InformationDescription(
            $information_id,
            $language_id,
            $title,
            $description,
            $meta_title,
            $meta_description,
            $meta_keyword
        );
    }

    /**
     * @param InformationDescription $informationDescription
     * @return array<string, mixed>
     */
    public function extract(InformationDescription $informationDescription): array {
        return [
            'information_id'   => $informationDescription->getInformationId(),
            'language_id'      => $informationDescription->getLanguageId(),
            'title'            => $informationDescription->getTitle(),
            'description'      => $informationDescription->getDescription(),
            'meta_title'       => $informationDescription->getMetaTitle(),
            'meta_description' => $informationDescription->getMetaDescription(),
            'meta_keyword'     => $informationDescription->getMetaKeyword()
        ];
    }
}
