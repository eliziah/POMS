<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POC extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 'pocs';

    protected $guarded = ['id'];
}
