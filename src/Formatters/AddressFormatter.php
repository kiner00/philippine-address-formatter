<?php

namespace Kiner\PhilippineAddressFormatter\Formatters;

use Kiner\PhilippineAddressFormatter\Exceptions\InvalidAddressComponentException;

class AddressFormatter
{
    public static function format(array $addressComponents): string
    {
        $requiredComponents = ['street', 'barangay', 'city', 'province', 'zip'];

        foreach ($requiredComponents as $component) {
            if (empty($addressComponents[$component])) {
                throw new InvalidAddressComponentException($component);
            }
        }

        $formatted = "{$addressComponents['street']}, {$addressComponents['barangay']}, ";
        $formatted .= "{$addressComponents['city']}, {$addressComponents['province']} ";
        $formatted .= "{$addressComponents['zip']}";

        return $formatted;
    }
}
