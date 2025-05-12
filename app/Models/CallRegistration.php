<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallRegistration extends Model
{
    protected $guarded = [];
    public function theme()
    {
        return $this->belongsTo(CallThemes::class);
    }
}
