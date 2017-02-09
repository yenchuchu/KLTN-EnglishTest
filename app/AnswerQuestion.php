<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AnswerQuestion extends Model
{
    use Notifiable;

    protected $table = 'answer_questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'point','content_json',
    ];

    public function answer_question_details()
    {
        return $this->hasMany(AnswerQuestionDetail::class, 'id', 'answer_question_id');
    }

    public function skills() {
        return $this->hasMany(Skill::class, 'id', 'skill_id' );
    }

    public function levels() {
        return $this->hasMany(Level::class, 'id', 'level_id');
    }
}
