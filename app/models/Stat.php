<?php


	class Stat extends BaseModel
	{
		protected $table = 'stats';

		public static $rules = [
			'title'      => 'required|max:100',
    		'body'       => 'required|max:10000'
		];


		// Mutator that stores all post titles as a sluggified version of themselves in the 'slug' column
		// This will create a duplicate of each post's title, connected by hyphens
		// for use as a url appendage to direct link to each post (i.e. "This Blog Title" will also be stored as "this-blog-title")
		public function setSlugAttribute($value)
		{
		    $this->attributes['slug'] = Str::slug($value);
		}

		public function user()
		{
			// connects each stat to its user
			return $this->belongsTo('User');
		}

		public function puzzle()
		{
			// connects each stat to its puzzle
			return $this->belongsTo('Puzzle');
		}

	}


