<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'isbn',
        'book_title',
        'publisher_name',
        'photo_id',

    ];




    public function photo(){


        return $this->hasOne('App\Models\Photo','id','photo_id');


    }

}

