<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\El\QueryBuilder;
use Illuminate\Http\Request;

class PostController extends Controller {
    public $tableClass;

    public function __construct() {
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $attributes = request()->query();
        $query = Post::query()->where('published', 1);
        $query = QueryBuilder::build($query, $attributes);
        $posts = $query;
        return view('user.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('user.posts.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $messages = [
            'title.max' => 'The :attribute must be exactly :max !!.',
        ];
        $validated = $request->validate( [
            'title' => ['required','max:5'],
            'content' => ['required'],
        ],[],[
            'content' => 'Тело поста',
            'title'=> 'заголовок'
        ]);

        return redirect()->back()->withInput()->with('status','Сохранено');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) {
        return view('user.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
