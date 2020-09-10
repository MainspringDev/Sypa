<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Catalog;

use Sypa\Generator\Factory\DateTimeFactory;
use Sypa\Model\Catalog\Upload;

class UploadHydrator {
    const REQUIRED_DATA = [
        'upload_id',
        'name',
        'filename',
        'code',
        'date_added'
    ];
    private DateTimeFactory $dateTimeFactory;

    /**
     * @param DateTimeFactory $dateTimeFactory
     */
    public function __construct(DateTimeFactory $dateTimeFactory) {
        $this->dateTimeFactory = $dateTimeFactory;
    }

    /**
     * @param array $data
     * @return Upload
     * @throws \Exception
     */
    public function hydrate(array $data): Upload {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create upload from array data. Missing index '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'upload_id'  => $upload_id,
            'name'       => $name,
            'filename'   => $filename,
            'code'       => $code,
            'date_added' => $date_added
        ) = $data;

        return new Upload(
            $upload_id,
            $name,
            $filename,
            $code,
            $this->dateTimeFactory->makeDateTimeImmutable($date_added)
        );
    }

    /**
     * @param Upload $upload
     * @return array<string, mixed>
     */
    public function extract(Upload $upload): array {
        return [
            'upload_id'  => $upload->getUploadId(),
            'name'       => $upload->getName(),
            'filename'   => $upload->getFilename(),
            'code'       => $upload->getCode(),
            'date_added' => $upload->getDateAdded()
        ];
    }
}
