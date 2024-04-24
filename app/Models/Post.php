<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// ...

class Post extends Model
{

    protected $fillable = ['title', 'body', 'user_id', 'image'];
    protected $table = 'posts';
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    // add image upload 

    use HasFactory;
}
