<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['$name'];
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
    public function branches()
    {
        return $this->belongsToMany(Branches::class, 'branches_categories', 'category_id', 'branche_id')
                    ->withTimeStamps();
    }
}
