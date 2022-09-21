<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='blogs';
    protected $dates=['deleted_at'];

    protected $fillable=[
        'title','content','photo','slug'
    ];

    /**
     * Get all of the comments for the Blog
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
