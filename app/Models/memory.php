<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    use HasFactory;
    protected $fillable = [
      'title',
      'text',
      'img_path',
      'user_id',
      'date_id'
    ];
}
