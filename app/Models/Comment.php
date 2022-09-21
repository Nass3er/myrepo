<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates=['deleted_at'];

    protected $fillable=[
        'user_id','blog_id','parent_id','description','user_name','user_email'
    ];


    /**
     * Get the user that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }


    /**
     * Get all of the comments for the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
