<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    use HasFactory;
    protected $table = 'table_money_students';
    protected $filtable = [
        'name',
        'class_students',
        'money_students',
        'date',
        'clock',
        'status_students',
        'created_at',
        'updated_at'
    ];
}
