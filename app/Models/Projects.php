<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Project extends Model
{
    protected $table = 'projects';

    public $timestamps = false;

    public $fillable = ['title', 'content', 'start_at', 'close_at', 'income', 'outcome', 'finish', 'user_id'];

    protected $casts = [
        'finish' => 'boolean',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
