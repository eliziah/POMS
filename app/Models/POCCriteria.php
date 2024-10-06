<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POCCriteria extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 'poc_criteria';

    protected $guarded = ['id'];
}
