<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;
    protected $dates=['deleted_at'];
    protected $table='codes';
    protected $fillable=[
        'project_id',
        'codeTitle',
        'sourceCode',
    ];

    /**
     * Get the user that owns the Code
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function  codeProject()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

}
