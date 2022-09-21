<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
class ProjectImageDesign extends Model
{

    use HasFactory;
    protected $dates=['deleted_at'];
    protected $fillable=[
        'project_id',
        'designPhotos',
    ];

    /**
     * Get the user that owns the ProjectImageDesign
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function  imgDesignProject()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
