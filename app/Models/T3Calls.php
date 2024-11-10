<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T3Calls extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 't3_calls';

    protected $guarded = ['id'];
}
