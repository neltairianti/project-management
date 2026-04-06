<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'project_id',
        'user_id'
    ];

    public function project()
    {
        return $this->belongsTo(User::class);
    }
}
