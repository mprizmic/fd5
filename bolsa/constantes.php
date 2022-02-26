<?php

abstract class DaysOfWeek {

    const Sunday = 0;
    const Monday = 1;

    // etc. } $today = DaysOfWeek::Sunday;
}

class Season {

    public const SEASONS = ['summer', 'autumn', 'winter', 'spring'];

    private string $value;

    public function __construct(string $value) {
        if (!in_array($value, self::SEASONS)) {
            throw new InvalidArgumentException(sprintf(
                                    "Wrong season value. Awaited one from: '%s'.",
                                    implode("', '", self::SEASONS)
            ));
        }

        $this->value = $value;
    }

}

class SNSD {

    public const SNSD = ['si', 'no', 'sin datos'];

    private string $value;

    public function __construct(string $value) {

        if (!in_array($value, self::SNSD)) {
            throw new InvalidArgumentException(sprintf(
                                    "Wrong opción value. Awaited one from: '%s'.",
                                    implode("', '", self::SNSD)
            ));
        }

        $this->value = $value;
    }

    public function __toString(): string {
        return $this->value;
    }

}
