<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'body'
    ];
    
    public function user() {

        return $this->belongsTo(User::class);
        
    }
}
