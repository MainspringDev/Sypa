<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator;

use Sypa\Generator\Factory\DateTimeFactory;
use Sypa\Model\Catalog\Download;

class DownloadHydrator {
    const REQUIRED_DATA = [
        'download_id',
        'filename',
        'mask',
        'date_added'
    ];
    private DateTimeFactory $dateTimeFactory;

    public function __construct(DateTimeFactory $dateTimeFactory) {
        $this->dateTimeFactory = $dateTimeFactory;
    }

    public function hydrate(array $data): Download {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create extension from array data. Missing index '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'download_id' => $download_id,
            'filename'    => $filename,
            'mask'        => $mask,
            'date_added'  => $date_added
        ) = $data;

        return new Download(
            $download_id,
            $filename,
            $mask,
            $this->dateTimeFactory->makeDateTimeImmutable($date_added)
        );
    }

    /**
     * @param Download $download
     * @return array<string, mixed>
     */
    public function extract(Download $download): array {
        return [
            'download_id' => $download->getDownloadId(),
            'filename'    => $download->getFilename(),
            'mask'        => $download->getMask(),
            'date_added'  => $download->getDateAdded()
        ];
    }
}
