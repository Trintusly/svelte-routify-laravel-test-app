<?php

namespace App\Models\Misc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'action',
        'value',
        'user_agent'
    ];
}
