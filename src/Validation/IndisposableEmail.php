<?php

namespace CristianPeter\LaravelDisposableContactGuard\Validation;

use CristianPeter\LaravelDisposableContactGuard\Facades\DisposableDomains;
use Illuminate\Validation\Validator;

class IndisposableEmail
{
    /**
     * Default error message.
     *
     * @var string
     */
    public static string $errorMessage = 'Disposable email addresses are not allowed.';

    /**
     * Validates whether an email address does not originate from a disposable email service.
     *
     * @param string $attribute
     * @param mixed $value
     * @param array $parameters
     * @param Validator $validator
     * @return bool
     */
    public function validate($attribute, $value, $parameters, $validator): bool
    {
        return DisposableDomains::isNotDisposable($value);
    }
}
