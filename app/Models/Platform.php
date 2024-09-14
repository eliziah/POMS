<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 'platforms';

    protected $guarded = ['id'];
}
