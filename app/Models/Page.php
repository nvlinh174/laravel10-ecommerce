<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    // protected $fillable = ['title'];
    protected $guarded = [];

    public function setMetaKeywordsAttribute($value)
    {
        $arrValue = json_decode($value, true);
        $valueCoumn = array_column($arrValue, 'value');
        $value = implode(', ', $valueCoumn);
        $this->attributes['meta_keywords'] = $value;
    }
}
