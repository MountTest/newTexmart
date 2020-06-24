<?php

namespace App\Http\Controllers;

use App\NewsSite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class NewsSiteController extends Controller
{
    //
    public function index() {
        $news = NewsSite::all();

        return view('profile.news.index',['news' => $news]);
    }

    public function create() {
        return view('profile.news.create');
    }

    public function edit($id) {
        $new = NewsSite::find($id);

        return view('profile.news.create', ['new' => $new]);
    }

    public function store(Request $request) {

        $new = NewsSite::create($request->all());

        if ($preview = request('preview')) {
            $fileName = 'news/'.uniqid('news_preview_').'.jpg';
            $image = ImageManagerStatic::make($preview);

            if (request('rotate')) {
                $image = $image->rotate(-(request('rotate')));
            }
            $image = $image->resize(500, null, function ($constraint) {
                return $constraint->aspectRatio();
            })
                ->stream('jpg', 80);

            Storage::disk('local')->put('public/'.$fileName, $image);
            $new->preview = $fileName;
        }

        $new->save();

        return redirect()->route('newprofile');
    }

    public function update(Request $request) {
//        dd($request->all());

        $new = NewsSite::find($request->new);
        $new->title = $request->title;
        $new->description = $request->description;

        if ($preview = request('preview')) {
            $fileName = 'news/'.uniqid('news_preview_').'.jpg';
            $image = ImageManagerStatic::make($preview);

            if (request('rotate')) {
                $image = $image->rotate(-(request('rotate')));
            }
            $image = $image->resize(500, null, function ($constraint) {
                return $constraint->aspectRatio();
            })
                ->stream('jpg', 80);

            Storage::disk('local')->put('public/'.$fileName, $image);
            $new->preview = $fileName;
        }

        $new->update();

        return redirect()->route('newprofile');
    }

    public function delete(Request $request) {
        $new = NewsSite::find($request->id);
        $new->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function show($id) {
        $new = NewsSite::find($id);

        return view('design.pages.news.show',['new' => $new]);
    }

    public function list()
    {
        $news = NewsSite::all();

        return view('design.pages.news.list',['news' => $news]);
    }
}
