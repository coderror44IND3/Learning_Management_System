<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LessonStundets extends Model
{
    use HasFactory;
    protected $table = 'table_score';
    protected $filtable = [
        'name_score',
        'dailytasks_score',
        'presence_score',
        'uts_score',
        'uas_score',
        'table_course_id',
        'created_at',
        'updated_at'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Library::class);
    }
}
