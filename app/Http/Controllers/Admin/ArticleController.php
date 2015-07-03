<?php namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticlesFormRequest;
use Carbon\Carbon;
use File;
use Illuminate\Support\Str;
use Image;
use Input;
use View;
use Vinkla\Hashids\HashidsManager;

class ArticleController extends Controller {

	/**
	 * constructor.
	 *
	 * @param  void
	 *
	 * @return void
	 */
	public function __construct(HashidsManager $hashids) {

		$this->hashids = $hashids;
		// You must have admin access to proceed
		$this->middleware('sentry.admin');
	}

	/**
	 * List all the articles in desc order of creation.
	 *
	 * @param  void
	 *
	 * @return View
	 */
	public function index() {

		$articles = Article::orderBy('created_at', 'DESC')->get();

		foreach ($articles as $article) {
			$article->id = $this->hashids->connection('article')->encode($article->id);

		}

		return View::make('Admin.articles.index', array('articles' => $articles));
	}

	/**
	 * Create an event.
	 *
	 * @param  void
	 *
	 * @return View
	 */
	public function create() {
		return View::make('Admin.articles.create');
	}

	/**
	 * save event to database.
	 *
	 * @param  none
	 *
	 * @return Redirect
	 */
	public function store(ArticlesFormRequest $request) {

		$article = new Article(array(
			'title' => Input::get('article-title'),
			'excerpt' => Input::get('excerpt'),
			'keywords' => Input::get('keywords'),
			'details' => Input::get('details'),
			'date' => Carbon::createFromFormat('m/d/Y', Input::get('publish-date')),
		));

		$article->save();

		$article_id = $this->hashids->connection('article')->encode($article->id);

		return redirect()->route('articles.show', array($article_id))->with('success', 'Article added');
	}

	/**
	 * Show the event.
	 *
	 * @param  string $hash
	 *
	 * @return View
	 */
	public function show($hash) {
		$id = $this->hashids->connection('article')->decode($hash)[0];

		$article = Article::find($id);

		$article->id = $this->hashids->connection('article')->encode($article->id);

		return View::make('Admin.articles.show', ['article' => $article]);

	}

	/**
	 * Edit a event.
	 *
	 * @param  string $hash
	 *
	 * @return View
	 */
	public function edit($hash) {

		$id = $this->hashids->connection('article')->decode($hash)[0];

		$article = Article::find($id);

		$article->id = $this->hashids->connection('article')->encode($article->id);

		return View::make('Admin.articles.edit', ['article' => $article]);
	}

	/**
	 * Update the event.
	 *
	 * @param  string $hash
	 *
	 * @return Redirect
	 */
	public function update(ArticlesFormRequest $request, $hash) {

		$id = $this->hashids->connection('article')->decode($hash)[0];
		$article = Article::find($id);

		$article->title = Input::get('article-title');
		$article->excerpt = Input::get('excerpt');
		$article->keywords = Input::get('keywords');
		$article->details = Input::get('details');
		$article->save();

		return redirect()->route('articles.show', array($hash))->with('success', 'Article updated');

	}

	/**
	 * Remove the event.
	 *
	 * @param  string $hash
	 *
	 * @return Redirect
	 */
	public function destroy($hash) {
		// Decode the hashid
		$id = $this->hashids->connection('article')->decode($hash)[0];
		$article = Article::find($id);

		$article->delete();
		return redirect()->route('articles.list', array($hash))->with('success', 'Event removed');

	}

	/**
	 * resize and generate thumb of uploaded image
	 *
	 * @param  void
	 *
	 * @return array
	 **/
	private function handleImages() {

		$upload_to_dir = public_path() . '/images/articles/';
		$files_save_name = Str::slug(Input::get('article-title')) . '-' . time();

		$cover_photo = Input::file('article-cover-photo');
		$file_ext = $cover_photo->getClientOriginalExtension();

		$save_file_name = $files_save_name . '.' . $file_ext;

		$save_file_name_thumb = $files_save_name . '_thumb.' . $file_ext;

		$cover_photo->move($upload_to_dir, $save_file_name);

		$rez_image = Image::make($upload_to_dir . $save_file_name);
		$rez_image->resize(1280, null, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		});
		$rez_image->save();

		$thumb_img = Image::make($upload_to_dir . $save_file_name);

		$thumb_img->resize(450, 290, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		});
		$thumb_img->save($upload_to_dir . $save_file_name_thumb);

		return array(
			'filename' => $save_file_name,
			'thumb' => $save_file_name_thumb,
		);

	}

}
