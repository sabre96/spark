<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    protected $fillable = ['$name'];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'branches_categories', 'branche_id', 'category_id')
                    ->withTimeStamps();
    }
}
