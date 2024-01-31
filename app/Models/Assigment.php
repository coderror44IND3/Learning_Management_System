<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assigment extends Model
{
    use HasFactory;
    protected $table = 'table_assigments';
    protected $filtable = ([
        'datetime_assigments',
        'files_assigments',
        'table_students_id',
        'created_at',
        'updated_at'
    ]);
    public function post(): BelongsTo
    {
        return $this->belongsTo(Students::class);
    }
}
