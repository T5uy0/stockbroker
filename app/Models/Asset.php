<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','name','type','currency',
        'quantity','purchase_unit_price','fees_total','meta',
    ];

    protected $casts = [
        'quantity' => 'decimal:8',
        'purchase_unit_price' => 'decimal:8',
        'fees_total' => 'decimal:8',
        'meta' => 'array',
    ];

    // Prix net unitaire après frais
    public function getNetUnitPriceAttribute(): float
    {
        $q = (float)$this->quantity;
        if ($q <= 0) return (float)$this->purchase_unit_price;
        return ( (float)$this->purchase_unit_price * $q + (float)$this->fees_total ) / $q;
    }

    // Valeur totale au coût d’acquisition (net)
    public function getAcquisitionCostAttribute(): float
    {
        return $this->net_unit_price * (float)$this->quantity;
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function AssetType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AssetType::class);
    }

    public function company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
