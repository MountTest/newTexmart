<?php

namespace App\Http\Controllers;

use Aloha\Twilio\Support\Laravel\Facade;
use App\Announce;
use App\Category;
use App\Http\Requests\UpdateUserPassword;
use App\NewsSite;
use App\Production;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function children($item)
    {
        if (count($item->childs)) {
            $subs = [];
            foreach ($item->childs->only(['id', 'title']) as $child) {
                if (count($child->childs)) {
                    $this->children($child);
                }
                $subs[] = $child->only(['id', 'title']);
            }
            return $item->only(['id', 'title']);
        }
        return $item->only(['id', 'title']);
    }

    public function getCategories()
    {
        $categories = Category::where('parent_id', null)->get(['id', 'title']);

        $categories = $categories->each(function ($item) {
            $this->children($item);
        });

        return response()->json($categories);
    }

    public function index()
    {
        return $this->dashboard();
    }

    public function dashboard()
    {
        $productions = Production::where('user_id', auth()->user()->id)->get();
//        $categories = Category::where('parent_id', null)->get(['id', 'title']);
//        $types = Type::all();
//        $productionCats = collect();
//        $productCats = collect();
//        $serviceCats = collect();
//        foreach ($types as $type) {
//            if ($type->title == 'Производство') {
//                $productionCats = $productionCats->merge($type->categories);
//            }
//            if ($type->title == 'Услуги') {
//                $serviceCats = $serviceCats->merge($type->categories);
//            }
//            if ($type->title == 'Товары') {
//                $productCats = $productCats->merge($type->categories);
//            }
//        }

        $announces = collect();
        if (auth()->user()->role_id == 5) {
            $announces = Announce::all()->sortByDesc('id');
        }

        if (auth()->user()->role_id == 4) {
            $announces = Production::all()->sortByDesc('id');
        }

        $user = auth()->user();
        return view('profile.profile', [
            'user' => $user,
            'productions' => $productions,
            'announces' => $announces->paginate(5),
//            'productionCats' => $productionCats->sortBy('order'),
//            'productCats' => $productCats->sortBy('order'),
//            'serviceCats' => $serviceCats->sortBy('order'),
        ]);
    }

    public function newprofile() {
        $productions = Production::where('user_id', auth()->user()->id)->get();
//        $categories = Category::where('parent_id', null)->get(['id', 'title']);
//        $types = Type::all();
//        $productionCats = collect();
//        $productCats = collect();
//        $serviceCats = collect();
//        foreach ($types as $type) {
//            if ($type->title == 'Производство') {
//                $productionCats = $productionCats->merge($type->categories);
//            }
//            if ($type->title == 'Услуги') {
//                $serviceCats = $serviceCats->merge($type->categories);
//            }
//            if ($type->title == 'Товары') {
//                $productCats = $productCats->merge($type->categories);
//            }
//        }

        $announces = collect();
        if (auth()->user()->role_id == 5) {
            $announces = Announce::all()->sortByDesc('id');
        }

        if (auth()->user()->role_id == 4) {
            $announces = Production::all()->sortByDesc('id');
        }

        $user = auth()->user();
        return view('profile.dashboard', [
            'user' => $user,
            'productions' => $productions,
            'announces' => $announces->paginate(5),
//            'productionCats' => $productionCats->sortBy('order'),
//            'productCats' => $productCats->sortBy('order'),
//            'serviceCats' => $serviceCats->sortBy('order'),
        ]);
    }

    public function edit(Request $request, User $user)
    {
        $user->name = $request->name;
        if ($request->avatar) {
            $fileName = 'users/'.uniqid('user_').'.jpg';

            $file = ImageManagerStatic::make($request->avatar);
            if ($request->width && $request->height) {

                $top = $request->top;
                $left = $request->left;
                $width = $request->width;
                $height = $request->height;

                $file = $file->crop((int)$width, (int)$height, (int)$left, (int)$top);
            }

            $file = $file->stream('jpg', 40);
            Storage::disk('local')->put('public/'.$fileName, $file);
            $user->avatar = $fileName;
        }

        $user->save();

        return redirect()->back();
    }

    public function settings(Request $request)
    {
        return view('profile.settings', [
            'user' => $request->user(),
        ]);
    }

    public function favorites(Request $request)
    {
        $productions = $request->user()->favorite(Production::class)->where('type', 'productions');
        $products = $request->user()->favorite(Production::class)->where('type', 'product');
        $services = $request->user()->favorite(Production::class)->where('type', 'service');

        return view('profile.favorites', [
            'productions' => $productions,
            'products' => $products,
            'services' => $services,
        ]);
    }

    public function productions(Request $request)
    {
        return view('user-production.profile-tabs.announce', [
            'user' => $request->user(),
            'productions' => $request->user()->productions,
        ]);
    }

    public function productionCreate(Request $request)
    {
        $types = Type::all();
        $productionCats = collect();
        foreach ($types as $type) {
            if ($type->title == 'Производство') {
                $productionCats = $productionCats->merge($type->categories);
            }
        }

        return view('user-production.form-tabs.production-create', [
            'productionCats' => $productionCats,
            'user' => $request->user(),
        ]);
    }

    public function productCreate(Request $request)
    {
        $types = Type::all();
        $productCats = collect();
        foreach ($types as $type) {
            if ($type->title == 'Товары') {
                $productCats = $productCats->merge($type->categories);
            }
        }

        return view('user-production.form-tabs.product-create', [
            'productCats' => $productCats,
            'user' => $request->user(),
        ]);
    }

    public function serviceCreate(Request $request)
    {
        $types = Type::all();
        $serviceCats = collect();
        foreach ($types as $type) {
            if ($type->title == 'Услуги') {
                $serviceCats = $serviceCats->merge($type->categories);
            }
        }

        return view('user-production.form-tabs.service-create', [
            'serviceCats' => $serviceCats,
            'user' => $request->user(),
        ]);
    }

    public function editPassword(UpdateUserPassword $request, User $user)
    {
        $validated = $request->validated();

        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect()->back();
    }

    public function registerPhone(Request $request)
    {
        $data = $request->toArray();
        $data['phone'] = str_replace('+', '', $data['code']).preg_replace('/[ -]/', '', $data['phone']);
        $validator = Validator::make($data, [
            'code' => 'required|string',
            'phone' => 'required|string|unique:users',
        ]);
        $user = auth()->user();
        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user->phone_verification = rand(111111, 999999);
            $user->phone = $data['phone'];
            $user->save();
            Facade::message('+'.$data['phone'], 'Ваш активационный код для сайта texmart.kg: '.$user->phone_verification.'');
//            auth()->user()->phone = $data['phone'];
//            auth()->user()->save();
        }

        return redirect()->route('homepage');
    }

    public function reRegisterPhone(Request $request)
    {
        $user = auth()->user();

        $user->phone = '';
        $user->save();
        $data = $request->toArray();
        $data['phone'] = str_replace('+', '', $data['code']).preg_replace('/[ -]/', '', $data['phone']);
        $validator = Validator::make($data, [
            'code' => 'required|string',
            'phone' => 'required|string|unique:users',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user->phone_verification = rand(111111, 999999);
            $user->phone = $data['phone'];
            $user->save();
            Facade::message('+'.$data['phone'], 'Ваш активационный код для сайта texmart.kg: '.$user->phone_verification.'');
//            auth()->user()->phone = $data['phone'];
//            auth()->user()->save();
        }

        return redirect()->route('homepage');
    }

    public function codeVerification(Request $request)
    {
        $data = $request->toArray();
        $validator = Validator::make($data, [
            'code_verification' => 'required|string',
        ]);

        $user = auth()->user();

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($user->phone_verification == $data['code_verification']) {
                $user->phone_verification = null;
                $user->save();

                Session::flash('status', ['status' => 'success', 'message' => 'Ваш аккаунт успешно активирован']);
            } else {
                Session::flash('status', ['status' => 'fail', 'message' => 'Ваш аккаунт не активирован']);
            }

            return redirect()->route('homepage');
        }
    }

    public function switch(Request $request) {
        $type = $request->type;
        if ($type == 1) {
            $productions = Production::where('user_id', auth()->user()->id)->get();

            $announces = collect();
            if (auth()->user()->role_id == 5) {
                $announces = Announce::all()->sortByDesc('id');
            }

            if (auth()->user()->role_id == 4) {
                $announces = Production::all()->sortByDesc('id');
            }

            $user = auth()->user();

            $view = view('profile.profile', [
                'user' => $user,
                'productions' => $productions,
                'announces' => $announces,
            ])->render();
        }
        else if ($type == 2) {
//            dd(auth()->user()->announces);
            $view = view('profile.announce.index', [
                'announces' => auth()->user()->announces,
            ])->render();
        }
        else if ($type == 3 || $type == 4 || $type == 5) {
            $requestType = $request->child;

            $types = Type::all();
            $productCats = collect();
            foreach ($types as $type) {
                if ($requestType == 'productions' && $type->title == 'Производство') {
                    $productCats = $productCats->merge($type->categories);
                }
                if ($requestType == 'service' && $type->title == 'Услуги') {
                    $productCats = $productCats->merge($type->categories);
                }
                if ($requestType == 'product' && $type->title == 'Товары') {
                    $productCats = $productCats->merge($type->categories);
                }
            }
//            dd($productCats);
            $view = view('profile.productions.create', [
                'productCats' => $productCats,
                'type' => $requestType,
            ])->render();
        }
        else if ($type == 6) {
            $productions = \auth()->user()->productions->where('type', 'productions');
            $products = \auth()->user()->productions->where('type', 'product');
            $services = \auth()->user()->productions->where('type', 'service');

            $view = view('profile.productions.index', [
                'productions' => $productions,
                'products' => $products,
                'services' => $services,
            ])->render();
//            return view('profile.productions.index', [
//            'type' => $type,
//                'productions' => $productions,
//                'products' => $products,
//                'services' => $services,
//            ]);
        }
        else if ($type == 7) {
            $productions = $request->user()->favorite(Production::class)->where('type', 'productions');
            $products = $request->user()->favorite(Production::class)->where('type', 'product');
            $services = $request->user()->favorite(Production::class)->where('type', 'service');


            $view = view('profile.favorites', [
                'productions' => $productions,
                'products' => $products,
                'services' => $services,
            ])->render();
//            return view('profile.favorites', [
//                'productions' => $productions,
//                'products' => $products,
//                'services' => $services,
//            ]);
        }
        else if ($type == 8) {
            $view = view('profile.settings', [
                'user' => Auth::id(),
            ])->render();
//            return view('profile.settings', [
//                'user' => $request->user(),
//            ]);
        }
        else if ($type == 9) {
            $view = view('profile.news.index', [
                'news' => NewsSite::all(),
            ])->render();
        }
//        dd($view);

        return response()->json([
            'view' => $view,
        ]);
    }

    public function phone_check(Request $request) {

        $phone = str_replace('+', '', $request->code).preg_replace('/[-\s]/', '', $request->phone);
        $user = User::where('phone',$phone)->first();
        $check = $user ? true : false;
        $length = 0;

        if ($request->code == '+996' || $request->code == '+998' || $request->code == '+375')
        {
            $length = strlen(preg_replace('/[-\s]/', '', $request->phone)) == 9 ? true : false;
        }
        if ($request->code == '+7')
        {
            $length = strlen(preg_replace('/[-\s]/', '', $request->phone)->phone) == 10 ? true : false;
        }

        $check = ($length == true ? false : true);
//        dd(strlen($request->phone));

        return response()->json([
           'check' => $check,
        ]);
    }
}
