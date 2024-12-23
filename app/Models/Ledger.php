<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 'project_ledger';

    protected $guarded = ['id'];
}
