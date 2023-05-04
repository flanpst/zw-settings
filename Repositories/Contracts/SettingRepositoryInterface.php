<?php

namespace Modules\Settings\Repositories\Contracts;

use Modules\Settings\Repositories\Contracts\RepositoryInterface;

interface SettingRepositoryInterface extends RepositoryInterface
{
    public function store(array $request);
}