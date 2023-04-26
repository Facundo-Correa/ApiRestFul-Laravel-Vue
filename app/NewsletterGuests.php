<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsletterGuests extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'email',
        'newsletter_mail'
    ];
}
