<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Information;

use Sypa\Model\Information\InformationAggregate;

class InformationAggregateHydrator {
    private InformationHydrator $informationHydrator;
    private InformationDescriptionHydrator $informationDescriptionHydrator;
    private InformationToLayoutHydrator $informationToLayoutHydrator;
    private InformationToStoreHydrator $informationToStoreHydrator;

    public function __construct(
        InformationHydrator $informationHydrator,
        InformationDescriptionHydrator $informationDescriptionHydrator,
        InformationToLayoutHydrator $informationToLayoutHydrator,
        InformationToStoreHydrator $informationToStoreHydrator
    ) {
        $this->informationHydrator = $informationHydrator;
        $this->informationDescriptionHydrator = $informationDescriptionHydrator;
        $this->informationToLayoutHydrator = $informationToLayoutHydrator;
        $this->informationToStoreHydrator = $informationToStoreHydrator;
    }

    public function hydrate(array $data): InformationAggregate {
        $information = $this->informationHydrator->hydrate($data);
        $informationDescription = $this->informationDescriptionHydrator->hydrate($data);
        $informationToLayout = $this->informationToLayoutHydrator->hydrate($data);
        $informationToStore = $this->informationToStoreHydrator->hydrate($data);

        return new InformationAggregate($information, $informationDescription, $informationToLayout, $informationToStore);
    }

    public function extract(InformationAggregate $informationAggregate): array {
        return [
            'information'             => $this->informationHydrator->extract($informationAggregate->getInformation()),
            'information_description' => $this->informationDescriptionHydrator->extract($informationAggregate->getInformationDescription()),
            'information_to_layout'   => $this->informationToLayoutHydrator->extract($informationAggregate->getInformationToLayout()),
            'information_to_store'    => $this->informationToStoreHydrator->extract($informationAggregate->getInformationToStore())
        ];
    }
}
