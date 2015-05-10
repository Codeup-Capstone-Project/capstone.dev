<?php

	use Carbon\Carbon;


	class BaseModel extends Eloquent
	{
		protected $table;

		// Accessor that automatically formats dates for all posts created_at date
		// displays '24 minutes ago, 2 days ago, etc.'
		// public function getCreatedAtAttribute($value)
		// {
		//     $utc = Carbon::createFromFormat($this->getDateFormat(), $value);
		//     return $utc->setTimezone('America/Chicago')->diffForHumans();
		// }
	
		// Accessor that automatically formats dates for all posts updated_at date
		// displays '24 minutes ago, 2 days ago, etc.'
		public function getUpdatedAtAttribute($value)
		{
		    $utc = Carbon::createFromFormat($this->getDateFormat(), $value);
		    return $utc->setTimezone('America/Chicago')->diffForHumans();
		}
	}