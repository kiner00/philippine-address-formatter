# Philippine Address Formatter for Laravel

A simple Laravel package for formatting addresses specific to the Philippines. This package ensures that all required address components are present and formats them in a consistent way.

## Installation

You can install the package via Composer:

```bash
composer require kiner/philippine-address-formatter
```

```bash
'providers' => [
    // Other service providers...
    Kiner\PhilippineAddressFormatter\PhilippineAddressFormatterServiceProvider::class,
],
```

## Usage

Basic Example
Here's how you can use the AddressFormatter to format an address:

```bash
use Kiner\PhilippineAddressFormatter\Formatters\AddressFormatter;
use Kiner\PhilippineAddressFormatter\Exceptions\InvalidAddressComponentException;

try {
    $address = [
        'street' => '123 Rizal Street',
        'barangay' => 'Barangay 1',
        'city' => 'Quezon City',
        'province' => 'Metro Manila',
        'zip' => '1100'
    ];

    $formattedAddress = AddressFormatter::format($address);
    echo $formattedAddress; // Outputs: "123 Rizal Street, Barangay 1, Quezon City, Metro Manila 1100"
} catch (InvalidAddressComponentException $e) {
    echo $e->getMessage(); // Outputs the error message if a component is missing or invalid
}
```

# Using in a Laravel Controller

```bash
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kiner\PhilippineAddressFormatter\Formatters\AddressFormatter;
use Kiner\PhilippineAddressFormatter\Exceptions\InvalidAddressComponentException;

class AddressController extends Controller
{
    public function formatAddress(Request $request)
    {
        try {
            $address = [
                'street' => $request->input('street'),
                'barangay' => $request->input('barangay'),
                'city' => $request->input('city'),
                'province' => $request->input('province'),
                'zip' => $request->input('zip')
            ];

            $formattedAddress = AddressFormatter::format($address);

            return response()->json([
                'success' => true,
                'formatted_address' => $formattedAddress
            ]);
        } catch (InvalidAddressComponentException $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
```

# Blade Template Example

```bash
$formattedAddress = AddressFormatter::format($address);
return view('your-view', compact('formattedAddress'));
```

In your Blade template:

```bash
<p>Formatted Address: {{ $formattedAddress }}</p>
```

## Handling Exceptions

The package throws `InvalidAddressComponentException` if a required address component is missing or invalid. You can catch and handle this exception as shown in the examples above.

# Testing

To run the tests, use the following command:

```bash
./vendor/bin/phpunit
```

# Requirements

PHP 8.0 or higher
Laravel 9.x or 10.x

# Contributing

Feel free to open issues or submit pull requests for improvements and bug fixes. Contributions are welcome!

# License

This package is open-sourced software licensed under the MIT license.

# Author

Developed by Kiner. Feel free to contact me at kinermercurio@gmail.com for any questions or collaboration.

# Support

If you find this package helpful, consider giving it a star on GitHub to show your support!

# Future Improvements

Add support for additional address formats.
Provide integration with popular validation libraries.
Extend to cover address parsing features.
