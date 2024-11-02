<?php

namespace Kiner\PhilippineAddressFormatter\Exceptions;

use Exception;

class InvalidAddressComponentException extends Exception
{
    /**
     * Construct the exception with a specific message.
     *
     * @param string $component
     */
    public function __construct(string $component)
    {
        $message = "The address component '{$component}' is invalid or missing.";
        parent::__construct($message);
    }
}
