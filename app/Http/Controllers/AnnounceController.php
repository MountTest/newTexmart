<?php

namespace App\Http\Controllers;

use Aloha\Twilio\Support\Laravel\Facade;
use App\Announce;
use App\AnnouncePhoto;
use App\Category;
use App\Notifications\UserCreated;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic;
use Twilio\Exceptions\TwilioException;

class AnnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.announce.index', [
            'announces' => auth()->user()->announces,
        ]);
    }

    public function ajax(Request $request)
    {
        $announces = Announce::all()->reverse();
        return response()->json([
            'html' => view('announce.list', [
                'announces' => $announces,
            ])->render(),
            'announces' => $announces,
            'announce_last' => $announces->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.announce.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = $request->type;
//        dd($request->all());
        if ($type == 'profile') {
            $announce = Announce::create([
                'name' => auth()->user()->name,
                'content' => $request->bid,
                'code' => '',
                'phone' => auth()->user()->phone,
                'email' => auth()->user()->email ? auth()->user()->email : ' ',
                'user_id' => auth()->id(),
                'locate' => $request->country,
                'category_id' => $request->category,
                'price' => $request->price,
                'currency' => $request->currency,
                'date' => $request->date
            ]);

            $imagesArray = [];
            if ($images = request('images')) {
                foreach ($images as $image) {
                    $fileName = 'announces/'.uniqid('announce_').'.jpg';
                    $image = ImageManagerStatic::make($image)
                        ->resize(1000, null, function ($constraint) {
                            return $constraint->aspectRatio();
                        })
                        ->stream('jpg', 40);

                    Storage::disk('local')->put('public/'.$fileName, $image);
                    $imagesArray[] = $fileName;
                    $pick = new AnnouncePhoto();
                    $pick->path = $fileName;
                    $pick->save();
                    $announce->images()->attach($pick->id);
                }
            }

//            return redirect()->route('profile.announce.index');
        return redirect()->route('newprofile');
        }
//        dd($request->all());
        $data = $request->all();
        $data['user_phone'] = str_replace('+', '', $data['code']).preg_replace('/[-\s]/', '', $data['user_phone']);
        $validated = Validator::make($data, [
            'name' => 'string',
            'phone' => 'unique:users',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated);
        }
        $pass = rand(11111111, 99999999);
//        $verification = rand(111111, 999999);
        $user = User::create([
            'role_id' => 4,
            'phone' => $data['user_phone'],
//            'email' => $data['email'],
            'name' => $data['user_name'],
            'password' => Hash::make($pass),
//            'phone_verification' => $verification,
        ]);

        $announce = Announce::create([
            'name' => $data['user_name'],
            'content' => $data['announce_description'],
            'phone' => $data['user_phone'],
            'code' => $data['code'],
            'price' => $data['price'],
            'date' => $data['date'],
            'currency' => $data['currency'],
//            'email' => $data['email'],
            'user_id' => $user->id,
        ]);

        try {
            Facade::message('+'.$data['user_phone'], "Ваши данные для авторизации в ".url('/').": \n Ваш пароль: $pass". "\n Ваш логин: ".$data['user_phone']);
        } catch (TwilioException $exception) {
            Log::alert($exception->getMessage());
        }
//        $user->notify(new UserCreated($pass, $data['phone']));

        Session::flash('status', ['status' => 'success', 'message' => 'Мы создали для вас аккаунт! Вам отправлено письмо с данными на вашу электронную почту']);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $categories = Category::where('parent_id', null)->with('announces')->has('announces')->get();
//        $announces = Announce::all();
//        dd($categories);
        return view('design.pages.announce.list', ['categories' => $categories]);
    }

    public function show(Announce $announce)
    {
        $viewed = Announce::getProductionViews($announce->id);

        if (!$viewed) {
            $announce->views = $announce->views + 1;
            $announce->save();
        }
        return view('design.pages.announce.show', [
            'announce' => $announce,
        ]);
    }

    public function new_filter(Request $request)
    {
        $params = $request->params;
        $country = $request->country;
        $cats = Category::all();
        if ($params) {
            $cats = $cats->whereIn('id', $params);
        }


        $announces = collect();
        foreach ($cats as $cat) {
            $announces = $announces->merge($cat->announces);
        }
//        dd($country);
        $announces = $announces->unique('id');
//        if ($country == null) {
//            $announces = $announces->all();
////            $products = $products->where('type', $type);
//        }

        if ($country != null && $country != 'none')
        {
            $announces = $announces->where('locate', $country);
//            dd($announces);
        }
//        dd($announces);

        return response()->json([
            'html' => view('design.pages.announce.includes.single', [
                'announces' => $announces,
            ])->render(),
            'announces' => $announces,
            'count' => count($announces),
            'filters' => $request->query->all(),
//            'products' => $products,
        ]);
    }

    public function like(Request $request) {
        $announce = Announce::find($request->id);

        if ($announce->like_users->find(Auth::id())){
            $announce->like_users()->detach(Auth::id());
            $status = false;
        }
        else {
            $announce->like_users()->attach(Auth::id());
            $status = true;
        }

        return response()->json([
            'status' => $status,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function edit(Announce $announce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announce $announce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $announce = Announce::find($request->id);

        if ($announce->images) {
            foreach ($announce->images as $image)
            {
                $announce->images()->detach($image->id);
                $image->delete();
            }
        }

        if ($announce->like_users) {
            $announce->like_users()->detach();
        }

        $announce->delete();

        return response()->json([
            'status' => 'success',
        ]);
    }
}
