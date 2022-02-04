<?php

namespace App\Traits;

use App\Scopes\OrderByScope;

trait OrderByTrait {

    /**
     * Boot the Active Events trait for a model.
     *
     * @return void
     */
    public static function booted()
    {
        static::addGlobalScope(new OrderByScope);
    }

}