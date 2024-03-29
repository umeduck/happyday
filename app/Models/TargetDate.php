<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetDate extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'target_date',
      'target_date_type',
      'user_id'
    ];
}
