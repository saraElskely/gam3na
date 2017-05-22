<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Report extends Model
{
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    use Notifiable;
    protected $fillable = [
        'report_content','user_id'
    ];
}
