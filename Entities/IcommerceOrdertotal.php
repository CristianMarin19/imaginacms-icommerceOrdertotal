<?php

namespace Modules\Icommerceordertotal\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class IcommerceOrdertotal extends Model
{
    use Translatable;

    protected $table = 'icommerceordertotal__icommerceordertotals';
    public $translatedAttributes = [];
    protected $fillable = [];
}
