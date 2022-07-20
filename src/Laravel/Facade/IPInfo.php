<?php

namespace Tiran133\Laravel\Facade;


use Illuminate\Support\Facades\Facade;

class IPInfo extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'ipinfodb';
    }
}
