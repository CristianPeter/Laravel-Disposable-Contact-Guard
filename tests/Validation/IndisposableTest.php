<?php

namespace CristianPeter\LaravelDisposableContactGuard\Tests\Validation;

use PHPUnit\Framework\Attributes\Test;
use CristianPeter\LaravelDisposableContactGuard\Tests\TestCase;
use CristianPeter\LaravelDisposableContactGuard\Validation\Indisposable;

class IndisposableTest extends TestCase
{
    #[Test]
    public function it_should_pass_for_indisposable_emails()
    {
        $validator = new Indisposable;
        $email = 'example@gmail.com';

        $this->assertTrue($validator->validate(null, $email, null, null));
    }

    #[Test]
    public function it_should_fail_for_disposable_emails()
    {
        $validator = new Indisposable;
        $email = 'example@yopmail.com';

        $this->assertFalse($validator->validate(null, $email, null, null));
    }

    #[Test]
    public function it_is_usable_through_the_validator()
    {
        $passingValidation = $this->app['validator']->make(['email' => 'example@gmail.com'], ['email' => 'indisposable']);
        $failingValidation = $this->app['validator']->make(['email' => 'example@yopmail.com'], ['email' => 'indisposable']);

        $this->assertTrue($passingValidation->passes());
        $this->assertTrue($failingValidation->fails());
    }
}
