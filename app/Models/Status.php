<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function reports()
{
    return $this->hasMany(\App\Models\Report::class);
}
}
