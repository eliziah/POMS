<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CRBudget extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 'cr_budget';

    protected $guarded = ['id'];
}
