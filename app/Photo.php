<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    
    protected $directory = '/images/';

    protected $fillable = ['file'];



    //public accessor to return the images path onto the image being requested.
    public function getFileAttribute($file){
    	return $this->directory . $file;
    }



}


