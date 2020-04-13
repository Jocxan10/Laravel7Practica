<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'config';

    protected $guarded = [];

    public static function allowRegistrations($value)
    {
        $config = Config::first();
        $config->update(['allow_registrations' => $value]);

        return $config;
    }

}


