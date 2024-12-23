<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 'sponsors';

    protected $guarded = ['id'];
}
