<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Board extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'person_id' => 'required',
        'title' => 'required',
        'message' => 'required'
    );

    public function getData(){
        return "{$this->id}: {$this->title} ( {$this->person->name} )";
    }

    public function person():BelongsTo{
        return $this->belongsTo(related: Person::class);
    }
}
