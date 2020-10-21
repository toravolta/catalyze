<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::with('user')->paginate(10);

        return view('article.index', ['articles' => $article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:150'],
            'content' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect('article/create')
                ->withErrors($validator)
                ->withInput();
        }

        $url = null;
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {

                //second validation if image is exist
                $validator = Validator::make($request->all(), [
                    'image' => 'image|mimes:jpeg,png,jpg|max:3072',
                ]);

                if ($validator->fails()) {
                    return redirect('article/create')
                        ->withErrors($validator)
                        ->withInput();
                }

                $imageName = time() . '.' . $request->image->extension();

                $request->image->storeAs('/public', $imageName);
                $url = Storage::url($imageName);
            }
        }

        // Create slug from title
        $slug = Str::slug($request->title, '-');

        Article::create([
            'title' => $request->title,
            'image' => $url,
            'content' => $request->content,
            'topic' => $request->topic,
            'slug' => $slug,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('article.index')
            ->with('success', 'Article successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::with('user')->find($id);

        return view('article.view', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('article.edit', compact('article'));
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
        // dd($request->all(), $id);
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:150'],
            'content' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect('article/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $article = Article::find($id);
        $url = $article->image;
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {

                //second validation if image is exist
                $validator = Validator::make($request->all(), [
                    'image' => 'image|mimes:jpeg,png,jpg|max:3072',
                ]);

                if ($validator->fails()) {
                    return redirect('article/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
                }

                $imageName = time() . '.' . $request->image->extension();

                $request->image->storeAs('/public', $imageName);
                $url = Storage::url($imageName);

                //delete previous image if exist
                if ($article->image) {
                    $getName = explode("/", $article->image);
                    Storage::disk('public')->delete($getName[2]);
                }
            }
        }

        $article->title = $request->title;
        $article->image = $url;
        $article->content = $request->content;
        $article->topic = $request->topic;
        $article->slug = Str::slug($request->title, '-');
        $article->user_id = Auth::id();
        $article->save();

        return redirect()->route('article.index')
            ->with('success', 'Article successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $article = Article::find($request->id);

        //delete previous image if exist
        if ($article->image) {
            $getName = explode("/", $article->image);
            Storage::disk('public')->delete($getName[2]);
        }

        $article = Article::destroy($request->id);

        if ($article) {
            return redirect()->route('article.index')
                ->with('success', 'Article successfully deleted');
        }

        return redirect()->route('article.index')
            ->with('error', 'Failed to delete article');
    }
}
