<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Information;

use Sypa\Generator\Factory\DateTimeFactory;
use Sypa\Model\Information\Gdpr;

class GdprHydrator {
    const REQUIRED_DATA = [
        'gdpr_id',
        'store_id',
        'language_id',
        'code',
        'email',
        'action',
        'status',
        'date_added'
    ];
    private DateTimeFactory $dateTimeFactory;

    public function __construct(DateTimeFactory $dateTimeFactory) {
        $this->dateTimeFactory = $dateTimeFactory;
    }

    /**
     * @param array $data
     * @return Gdpr
     * @throws \Exception
     */
    public function hydrate(array $data): Gdpr {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create Gdpr from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'gdpr_id'     => $gdpr_id,
            'store_id'    => $store_id,
            'language_id' => $language_id,
            'code'        => $code,
            'email'       => $email,
            'action'      => $action,
            'status'      => $status,
            'date_added'  => $date_added
        ) = $data;

        return new Gdpr(
            $gdpr_id,
            $store_id,
            $language_id,
            $code,
            $email,
            $action,
            $status,
            $this->dateTimeFactory->makeDateTimeImmutable($date_added)
        );
    }

    /**
     * @param Gdpr $gdpr
     * @return array<string, mixed>
     */
    public function extract(Gdpr $gdpr): array {
        return [
            'gdpr_id'     => $gdpr->getGdprId(),
            'store_id'    => $gdpr->getStoreId(),
            'language_id' => $gdpr->getLanguageId(),
            'code'        => $gdpr->getCode(),
            'email'       => $gdpr->getEmail(),
            'action'      => $gdpr->getAction(),
            'status'      => $gdpr->isStatus(),
            'date_added'  => $gdpr->getDateAdded()
        ];
    }
}
