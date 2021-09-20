<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Quiz extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title', 
        'description', 
        'status', 
        'started_at', 
        'finished_at'
    ];

    protected $date = ['started_at', 'finished_at'];

    public function getStartedAtAttribute($date)
    {
        return $date ? Carbon::parse($date):null;
    }

    public function getFinishedAtAttribute($date)
    {
        return $date ? Carbon::parse($date):null;
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
