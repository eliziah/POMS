<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weekly extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 'weekly_reports';

    protected $guarded = ['id'];
}
