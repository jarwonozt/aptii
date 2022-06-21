<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Exception;
use Image;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use RobertSeghedi\News\Models\Article;
use RobertSeghedi\News\Models\Category;
use RobertSeghedi\News\Models\News;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.article.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->image);
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->extension();

        $destinationPath = public_path('/storage/articles/thumbnail');
        $img = Image::make($image->path());
        $img->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);

        try {
            $article = News::post($request->title, $request->slug, $request->content, $request->category, $request->status,  $input['imagename']);
            if($article){
                Alert::success('Success', 'Article post successuflly');
                return redirect()->route('articles.index');
            }
        } catch (Exception $error) {
            dd($error->getMessage());
            // Alert::error('Fail', $error->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
