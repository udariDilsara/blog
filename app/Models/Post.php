<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_title',
        'post_body',
        
    ];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

}
