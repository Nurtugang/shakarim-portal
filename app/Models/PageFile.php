<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageFile extends Model
{
    protected $fillable = [ 
        'title_kk',
        'title_ru',
        'title_en',
        'page_id',
        'description_kk',
        'description_ru',
        'description_en',
        'files_kk',
        'files_ru',
        'files_en',
        'thumbnail',
        'position'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    protected $casts = [
        'files_kk' => 'array',
        'files_ru' => 'array',
        'files_en' => 'array',
    ];
    public function getFormattedDate()
    {
        return $this->created_at?$this->created_at->locale(app()->getLocale(),'kk')->translatedFormat('d F Y'):'';
    }

    public function getFile(){
        return '/storage/'.$this->{'file_'.app()->getLocale()};
    }

    public function getFiles(){
        $files = [];
  
          foreach($this->{'files_'.app()->getLocale()} as $file){
            $files[] = (string)'/storage/'.$file;
          }
 
        return $files;
    }

    public function getThumbnail(){
        if($this->thumbnail)
        {
            return '/storage/'.$this->thumbnail;
        } 
        return null;
    }


}
