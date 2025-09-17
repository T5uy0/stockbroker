<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'location', 'website_url'];

    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class);
    }
}
