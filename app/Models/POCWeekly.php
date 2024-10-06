<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POCWeekly extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 'poc_weekly_reports';

    protected $guarded = ['id'];
}
