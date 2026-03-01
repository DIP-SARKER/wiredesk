<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'user_id',
        'assigned_to',
        'subject',
        'priority',
        'category',
        'description',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
    public function messages()
    {
        return $this->hasMany(TicketMessage::class);
    }

    public function notes()
    {
        return $this->hasMany(TicketNote::class);
    }

}
