<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Laracasts\Presenter\PresentableTrait;

class Post extends Model
{
	use PresentableTrait;

	protected $presenter = 'App\Presenters\PostPresenter';

	protected $fillable = [
		'title', 'slug', 'published_at', 'content', 'excerpt'
	];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
