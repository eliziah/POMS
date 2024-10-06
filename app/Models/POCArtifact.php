<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POCArtifact extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 'poc_artifacts';

    protected $guarded = ['id'];
}
