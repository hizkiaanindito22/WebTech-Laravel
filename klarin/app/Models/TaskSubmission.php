<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskSubmission extends Model
{
protected $fillable = ['task_id', 'mahasiswa_id', 'is_completed'];    
}
