<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CRSchedule extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 'cr_sched';

    protected $guarded = ['id'];
}
