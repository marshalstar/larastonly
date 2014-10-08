<?php

use \LaravelBook\Ardent\Ardent;

class AlternativeQuestion extends Ardent
{

    protected $table = 'alternative_question';
    protected $guarded = ['id'];
    public $timestamps = false;

    public static $rules = [];

    public function alternative()
    {
        return $this->belongsTo('Alternative');
    }

    public function question()
    {
        return $this->belongsTo('Question');
    }

} 