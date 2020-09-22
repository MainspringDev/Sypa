<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Design;

use Sypa\Model\Design\Theme;

class ThemeHydrator {
    const REQUIRED_DATA = [
        'theme_id',
        'store_id',
        'theme',
        'route',
        'code',
        'date_added'
    ];

    /**
     * @param array $data
     * @return Theme
     * @throws \Exception
     */
    public function hydrate(array $data): Theme {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create Theme from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'theme_id'   => $theme_id,
            'store_id'   => $store_id,
            'theme'      => $theme,
            'route'      => $route,
            'code'       => $code,
            'date_added' => $date_added,

        ) = $data;

        return new Theme(
            $theme_id,
            $store_id,
            $theme,
            $route,
            $code,
            $date_added
        );
    }

    /**
     * @param Theme $theme
     * @return array<string, mixed>
     */
    public function extract(Theme $theme): array {
        return [
            'theme_id'   => $theme->getThemeId(),
            'store_id'   => $theme->getStoreId(),
            'theme'      => $theme->getTheme(),
            'route'      => $theme->getRoute(),
            'code'       => $theme->getCode(),
            'date_added' => $theme->getDateAdded(),

        ];
    }
}
