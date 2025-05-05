<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\YammtCategory;

class Question extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(YammtCategory::class);
    }
}
