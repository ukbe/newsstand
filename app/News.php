<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    protected $fillable = [
        'title', 'summary', 'publish', 'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return "/news/{$this->id}";
    }

    public function imageUrl()
    {
        return starts_with($this->image, 'http://') ? $this->image : Storage::url($this->image);
    }

}
