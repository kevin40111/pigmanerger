<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Project extends Model
{
    protected $table = 'projects';

    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class);
    }
}
