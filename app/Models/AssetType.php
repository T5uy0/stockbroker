<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetType extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'code', 'description'];

    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class);
    }
}
