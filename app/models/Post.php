<?php


	class Post extends BaseModel
	{
		protected $table = 'posts';

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
			// connects each post to its user
			// the first parameter is the User class, the second is the foreign-key, and the third is the local key that the foreign key references on the posts table
			// second and third parameters are only needed if not using primary key "id" in the users table
			return $this->belongsTo('User', 'user_id', 'user_id');
		}

	}


