<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait;

    protected $fillable = [
        'user_id',
        'name',
        'reference',
        'buying_price',
        'selling_price',
        'image',
        'description',
    ];

    protected $softCascade = ['productattribute', 'productreference'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function productattribute(): HasMany
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function productreference(): HasMany
    {
        return $this->hasMany(ProductRefer::class);
    }
}
