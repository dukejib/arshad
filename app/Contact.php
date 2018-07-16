<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = ['username','email','number','reason','comment','read'];


    /** Methods */

    public static function allTotal()
    {
        return count(Contact::all());
    }

    public static function feedbackTotal()
    {
        return count(Contact::where('reason','Feedback')->where('read',0)->get());
    }

    public static function queryTotal()
    {
        return count(Contact::where('reason','General Query')->where('read',0)->get());
    }

    public static function complainTotal()
    {
        return count(Contact::where('reason','Complain')->where('read',0)->get());
    }

    public static function jobTotal()
    {
        return count(Contact::where('reason','Job')->where('read',0)->get());
    }
}
