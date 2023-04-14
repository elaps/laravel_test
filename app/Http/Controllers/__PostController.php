<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $post = (object)[
            'title' => 'Lorem ipsum dolor sit amet',
            'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cum excepturi in. Aut esse harum laboriosam nemo
                                numquam quasi soluta voluptatem. Beatae cumque dolor ea, impedit incidunt nostrum quod vel.
                            </p>
                            <p>Alias asperiores, consequatur deleniti ex explicabo facilis fuga fugiat id laboriosam, minima obcaecati repudiandae
                                ullam? Culpa est inventore iste laudantium, minima officiis quam quod recusandae rem sed. Illum, ipsam itaque!
                            </p>
                            <p>Assumenda cum deleniti dolorem illo necessitatibus praesentium quae, quas totam voluptates. Accusamus aut commodi
                                id laudantium natus nihil odit quia unde ut voluptatum. Aliquam facilis iusto modi, non reiciendis sed.
                            </p>
                            <p>Adipisci amet animi cum cupiditate dignissimos dolore doloremque ducimus eius enim eos id illum, itaque iure iusto
                                libero non omnis optio porro praesentium provident quaerat quidem repellendus totam, voluptatem voluptates?
                            </p>
                            <p>Ab aliquam autem consequatur dolores earum possimus reprehenderit. Ad aperiam at deserunt doloremque doloribus,
                                eius eum nesciunt nulla officia perspiciatis quas quibusdam rem, rerum sint soluta tempore temporibus, ullam veniam?
                            </p>'
        ];
        $posts = array_fill(0, 20, $post);

        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {

        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
