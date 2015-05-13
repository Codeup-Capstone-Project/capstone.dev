<?php

class GameController extends BaseController {

	public function __construct()
		{
			// $this->beforeFilter('auth', ['except' => ['index', 'show']]);
			// parent::__construct();
		}

	public function showGame($id = 1)
	{
		return View::make('game')->with(['id'=>$id]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		//needs to show game level choices

		// Get all posts that match the search (if there is one) and create pagination links based off them.
		$query = Post::with('user');

		if (Input::has('search')) {
			$search = Input::get('search');

			$query->where('title', 'like', "%$search%")
				  ->orWhere('body', 'like', "%$search%");
		}

		$posts = $query->orderBy('created_at', 'desc')->paginate(4);
		
		return View::make('posts.index')->with(['posts' => $posts]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$processedInput = self::getOldPostData();
		$data = [
				'method'		=>'create',
				'processedInput'=> $processedInput
		];
		return View::make('posts.edit')->with($data);
	}


	/**
	 * Store a newly created resource in storage.
	 * (Inserts a new record in the database)
	 * @return Response
	 */
	public function store()
	{
		 // create the validator
	    $validator = Validator::make(Input::all(), Post::$rules);

	    // attempt validation
	    if ($validator->fails()) {
	    	// Log the error with all the user's input
	    	Log::info(Input::all());

	    	// temporary error message that will load on redirected page.
	    	Session::flash('errorFlash', 'Post creation failed, please see errors below.');
	        // validation failed, redirect to the post create page with validation errors and old inputs
	    	return Redirect::to('posts/create#form')->withInput()->withErrors($validator);

	    } else {

	        // validation succeeded, create and save the post
			$post = new Post;
			$post->user_id = Auth::user()->user_id;
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			$post->slug = Input::get('title');	// will connect individual words in the title with hyphens for use as a url appendage
			$post->save();

			// temporary success message that will load on redirected page.
			Session::flash('successFlash', 'New post was created successfully!');
			return Redirect::action('PostsController@index');
		}
	}
	protected static function getOldPostData($id=null)
	{
			$postData =  [];
			$post = Post::find($id);

			// If $id does not exist, $post will be empty, so we must be creating a new post
			// Check for old input and make it stick if it exists
			if(empty($post)){
				$postData["title"] = ( empty(Input::old('title')) ? null : Input::old('title') );
				$postData["body"]  = ( empty(Input::old('body')) ? null : Input::old('body') );
			}
			// If $post exists, we must be editing.
			// Check for old input and make it stick if it exists
			elseif (!empty(Input::old())) {
				$postData['title'] = Input::old('title');
				$postData['body']  = Input::old('body');
			// If we're editing and there's no new input, generate data from database
			} else {
				$postData["title"] = $post->title;
				$postData["body"]  = $post->body;
			}
			return $postData;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($idOrSlug)
	{
		try{
			// If passed parameter is an $id
			$post = Post::find($idOrSlug);

			// If passed parameter was not an $id, it should be a $slug
			// otherwise fail and throw exception
			if(!$post){
				$post = Post::where('slug', '=', $idOrSlug)->firstOrFail();
			}
			
			return View::make('posts.show')->with(['post' => $post]);

		} catch (Exception $e) {

			Log::error($e);
			App::abort(404);
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$processedInput = self::getOldPostData($id);

		$data = [
				'method'		 =>'edit',
				'processedInput' => $processedInput,
				'id' 			 => $id
		];
		return View::make('posts.edit')->with($data);
		// return Redirect::back()->withInput();
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// create the validator
	    $validator = Validator::make(Input::all(), Post::$rules);

	    // attempt validation
	    if ($validator->fails()) {
	    	// temporary error message that will load on redirected page.
	    	Session::flash('errorFlash', 'Update failed, please see errors below.');
	        // validation failed, redirect to the post edit page with validation errors and old inputs
	    	return Redirect::to("posts/$id/edit#form")->withInput()->withErrors($validator);

	    } else {

	        // validation succeeded, identify the post and update it
			$update = Post::findOrFail($id);
			$update->title = Input::get('title');
			$update->body = Input::get('body');
			$update->slug = Input::get('title');	// will connect individual words in the title with hyphens for use as a url appendage
			$update->save();

			// temporary success message that will load on redirected page.
			Session::flash('successFlash', 'Update was successful!');
			return View::make("posts.show")->with(['post' => $update]);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::findOrFail($id);
		$post->delete();

		Session::flash('successFlash', 'Post successfully deleted.');

		return Redirect::action('PostsController@index');
	}


}
