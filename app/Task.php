<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';

    protected $fillable = ['title', 'description', 'state_id', 'removed_at', 'finished_at'];

    public function state() {
        return $this->belongsTo(State::class);
    }



}
