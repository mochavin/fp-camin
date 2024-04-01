<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  use HasFactory;
  protected $fillable = [
    'task_name',
    'task_status',
  ];
  public function taskList()
  {
    return $this->belongsTo(TaskList::class);
  }
}
