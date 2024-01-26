<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $table = 'table_course';
    protected $filtable = [
        'course_univesity',
        'date_univesity',
        'deksripsi_univesity',
        'created_at',
        'updated_at'
    ];
}
