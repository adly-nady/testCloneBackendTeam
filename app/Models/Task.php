<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table="tasks";
    protected $fillable=['id','assign_department', 'assign_from', 'assign_user', 'assign_status', 'title', 'description', 'attachment', 'start_time', 'end_time', 'deleted_at', 'created_at', 'updated_at'];
}
