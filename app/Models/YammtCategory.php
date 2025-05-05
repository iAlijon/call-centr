<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YammtCategory extends Model
{
    protected $guarded = [];

    public function question()
    {
        return $this->hasOne(Question::class);
    }
}
