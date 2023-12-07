<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;

    protected $fillable = ['name', 'slug', 'description', 'image', 'meta_title', 'meta_description', 'meta_keywords', 'parent_id'];
    // protected $guarded = [];

    public function getNameWithLevelAttribute()
    {
        return str_repeat('/----', $this->depth) . ' ' . $this->name;
    }
}
