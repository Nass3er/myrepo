<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $dates=['deleted_at'];
    protected $fillable=[
        'projName',
        'projMainPhoto',
        'projFileZip'
    ];

    /**
     * Get all of the projectCode for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function   projectCode()
    {
        return $this->hasMany(Code::class);
    }


    /**
     * Get all of the comments for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectImgDesign()
    {
        return $this->hasMany( ProjectImageDesign::class);
    }
}
