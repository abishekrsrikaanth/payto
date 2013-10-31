<?php

namespace Abishekrsrikaanth\Payto\Facades;

use Illuminate\Support\Facades\Facade;

class Payto extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "payto";
    }

}
