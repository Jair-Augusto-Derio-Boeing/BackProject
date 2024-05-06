<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtask extends Model
{
    use HasFactory;

    protected $table = 'subtasks';
    protected $fillable = [
        'titleSubtask',
        'descriptionSubtask',
        'statusSubtask',
        'id_task',
    ];
    public function tasks(){
        return $this->belongsTo(Task::class);
    }
}
