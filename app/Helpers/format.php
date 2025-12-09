<?php

function normalizeCitizen(?string $value): ?string
{
    if ($value === null) {
        return null;
    }

    // Clear white space
    $value = preg_replace('/\s+/', '', $value);

    // Check 12 letter, start 0
    if (preg_match('/^0\d{11}$/', $value)) {
        return $value; // valid
    }

    return null; // invalid
}