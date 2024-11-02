<?php

namespace Kiner\PhilippineAddressFormatter\Tests;

use Kiner\PhilippineAddressFormatter\Exceptions\InvalidAddressComponentException;
use PHPUnit\Framework\TestCase;
use Kiner\PhilippineAddressFormatter\Formatters\AddressFormatter;

class AddressFormatterTest extends TestCase
{
    public function testFormatAddressSuccessfully()
    {
        $address = [
            'street' => '123 Rizal Street',
            'barangay' => 'Barangay 1',
            'city' => 'Quezon City',
            'province' => 'Metro Manila',
            'zip' => '1100'
        ];

        $this->assertEquals(
            '123 Rizal Street, Barangay 1, Quezon City, Metro Manila 1100',
            AddressFormatter::format($address)
        );
    }

    public function testFormatAddressThrowsExceptionForMissingComponent()
    {
        $this->expectException(InvalidAddressComponentException::class);
        $this->expectExceptionMessage("The address component 'street' is invalid or missing.");

        $address = [
            'barangay' => 'Barangay 1',
            'city' => 'Quezon City',
            'province' => 'Metro Manila',
            'zip' => '1100'
        ];

        AddressFormatter::format($address);
    }

    public function testFormatAddressThrowsExceptionForAnotherMissingComponent()
    {
        $this->expectException(InvalidAddressComponentException::class);
        $this->expectExceptionMessage("The address component 'zip' is invalid or missing.");

        $address = [
            'street' => '123 Rizal Street',
            'barangay' => 'Barangay 1',
            'city' => 'Quezon City',
            'province' => 'Metro Manila'
            // 'zip' is missing
        ];

        AddressFormatter::format($address);
    }
}
