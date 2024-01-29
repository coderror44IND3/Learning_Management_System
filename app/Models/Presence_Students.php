<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Presence_Students extends Model
{
    use HasFactory;
    protected $table = 'table_presence_students';
    protected $filtable = ([
        'date_presence',
        'clock_presence',
        'status_presence',
        'table_students_id',
        'table_classroom_id',
        'created_at',
        'updated_at'
    ]);

    public function post(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
        return $this->belongsTo(Students::class);
    }
}
