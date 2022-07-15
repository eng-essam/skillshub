<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Skill extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function name($Lang = null)
    {
        $Lang = $Lang ?? App::getLocale();
        return json_decode($this->name)->$Lang;
    }

    public function getStudensCount()
    {
        $StudensNum = 0;
        foreach ($this->exams as $exam) {
            $StudensNum += $exam->users()->count();
        }
        return $StudensNum;
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
