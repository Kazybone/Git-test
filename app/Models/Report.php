<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'number',
        'description',
        'status_id'
    ];

    protected $dates = ['deleted_at'];

    public function status()
{
    return $this->belongsTo(\App\Models\Status::class);
}

public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}
}