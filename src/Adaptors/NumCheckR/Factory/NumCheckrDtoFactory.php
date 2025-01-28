<?php

namespace CristianPeter\LaravelDisposableContactGuard\Adaptors\NumCheckR\Factory;

use CristianPeter\LaravelDisposableContactGuard\Adaptors\NumCheckR\Dto\NumCheckrDto;

class NumCheckrDtoFactory
{
    public function createFromResponse(array $data): NumCheckrDto{
        return new NumCheckrDto(
            $data['is_valid'],
            $data['is_disposable'],
            $data['type'],
            $data['country_code'],
            $data['country_name'],
            $data['carrier'],
            $data['e164_format'],
            $data['national_format'],
            $data['international_format']
        );

    }

}
