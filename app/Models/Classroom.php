<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classroom extends Model
{
    use HasFactory;
    protected $table = 'table_classroom';
    protected $filtable = [
        'offline_class',
        'online_class',
        'date_class',
        'date_end',
        'clock_start',
        'clock_end',
        'table_teachers_id',
        'table_students_id',
        'table_course_id',
        'created_at',
        'updated_at',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Teachers::class);
        return $this->belongsTo(Library::class);
        return $this->belongsTo(Students::class);
    }
}
