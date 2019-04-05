<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class PagePresenter extends Presenter{

	public function paddedTitle(){
		$padding = str_repeat('-', $this->depth * 5);
		return $padding . $this->title;
	}

}