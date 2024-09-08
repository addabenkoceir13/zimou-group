<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    protected $softCascade = ['AttributeValue', 'attributeProduct'];


    public function AttributeValue(): HasMany
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function attributeProduct()
    {
        return $this->hasMany(ProductAttribute::class);
    }
}
