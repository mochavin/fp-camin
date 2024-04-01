<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'tasklist_name',
    'tasklist_description',
  ];

  public function task()
  {
    return $this->hasMany(Task::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
