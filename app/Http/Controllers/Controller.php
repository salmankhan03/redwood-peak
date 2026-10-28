<?php

namespace App\Http\Controllers;

use InvalidArgumentException;
use Throwable;

abstract class Controller
{
    /**
     * Message that is safe to return to the client for an exception.
     * The full exception is always written to the log; the real text is only
     * returned in debug mode or for deliberate validation-style errors.
     */
    protected function errorMessage(Throwable $e): string
    {
        report($e);

        if (config('app.debug') || $e instanceof InvalidArgumentException) {
            return $e->getMessage();
        }

        return 'Something went wrong. Please try again later.';
    }
}
