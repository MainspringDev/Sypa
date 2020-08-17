<?php

namespace Sypa\Generator\Factory;

class DateTimeFactory {
    /**
     * @param \DateTimeInterface|string|int $dateTime
     * @return \DateTime
     * @throws \Exception
     */
    public function makeDateTime($dateTime): \DateTime {
        if ($dateTime instanceof \DateTimeInterface) {
            return new \DateTime($dateTime->format('c'));
        }

        if (is_string($dateTime) === true) {
            return new \DateTime($dateTime);
        }

        if (is_int($dateTime) === true) {
            return new \DateTime('@' . strval($dateTime));
        }

        throw new \Exception(sprintf(
            "Invalid parameter type. Valid types are \\DateTimeInterface, string, or int. Received %s.",
            gettype($dateTime)
        ));
    }

    /**
     * @param \DateTimeInterface|string|int $dateTime
     * @return \DateTimeImmutable
     * @throws \Exception
     */
    public function makeDateTimeImmutable($dateTime): \DateTimeImmutable {
        if ($dateTime instanceof \DateTimeInterface) {
            return new \DateTimeImmutable($dateTime->format('c'));
        }

        if (is_string($dateTime) === true) {
            return new \DateTimeImmutable($dateTime);
        }

        if (is_int($dateTime) === true) {
            return new \DateTimeImmutable('@' . strval($dateTime));
        }

        throw new \Exception(sprintf(
            "Invalid parameter type. Valid types are \\DateTimeInterface, string, or int. Received %s.",
            gettype($dateTime)
        ));
    }
}
