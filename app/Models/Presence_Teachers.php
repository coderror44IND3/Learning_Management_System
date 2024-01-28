<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Presence_Teachers extends Model
{
    use HasFactory;

    protected $table = 'table_presence_teachers';
    protected $filtable = [
        'date_presence',
        'clock_presence',
        'status_presence',
        'table_teachers_id',
        'table_classroom_id',
        'created_at',
        'updated_at'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
        return $this->belongsTo(Teachers::class);
    }

}
