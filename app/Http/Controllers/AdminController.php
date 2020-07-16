<?php

namespace App\Http\Controllers;

use App\Announce;
use App\NewsSite;
use App\Production;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Midnite81\GeoLocation\Services\GeoLocation;
use Tightenco\Collect\Support\Collection;

class AdminController extends Controller
{
    public function __construct(GeoLocation $geoLocation)
    {
        $this->middleware('admin');
    }

    public function admin()
    {
        return redirect()->route('admin.admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }








    //axios
    //user
    public function getUsers($check)
    {
        $check = $check == 1 ? 4 : 5;
        $users = User::where('role_id', $check)->get();


        return $users;
    }

    public function searchUsers($value)
    {
        if ($value != 'empty')
            $users = User::where('name', 'like', "%$value%")->orWhere('email', 'like', "%$value%")->orWhere('phone', 'like', "%$value%")->get();
        else {
            $users = User::all();
        }
        return $users;
    }

    public function updateUser(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        return $user;
    }


    //products
    public function getProducts($id)
    {
        $products = collect();
        if ($id == 1) {
            $prod = Production::where('type', 'product')->get();
        } elseif ($id == 2) {
            $prod = Production::where('type', 'service')->get();
        } elseif ($id == 3) {
            $prod = Production::where('type', 'productions')->get();
        }
        $products = $products->merge($prod);
        $products = $products->map(function ($item) {
            return new Production($item->only(['id', 'logo', 'title', 'description', 'phone1']));
        });
        return $products;
    }

    public function searchProducts($value, $id)
    {
        if ($value != 'empty') {
            $products = collect();
            if ($id == 1) {
                $prod = Production::where('type', 'product')->where('title', 'like', "%$value%")->where('type', 'product')->orWhere('phone1', 'like', "%$value%")->get();
            } elseif ($id == 2) {
                $prod = Production::where('type', 'service')->where('title', 'like', "%$value%")->where('type', 'service')->orWhere('phone1', 'like', "%$value%")->get();
            } elseif ($id == 3) {
                $prod = Production::where('type', 'productions')->where('title', 'like', "%$value%")->where('type', 'productions')->orWhere('phone1', 'like', "%$value%")->get();
            }
            $products = $products->merge($prod);
            $products = $products->map(function ($item) {
                return new Production($item->only(['id', 'logo', 'title', 'description', 'phone1']));
            });
        } else {
            $products = collect();
            if ($id == 1) {
                $prod = Production::where('type', 'product')->get();
            } elseif ($id == 2) {
                $prod = Production::where('type', 'service')->get();
            } elseif ($id == 3) {
                $prod = Production::where('type', 'productions')->get();
            }
            $products = $products->merge($prod);
            $products = $products->map(function ($item) {
                return new Production($item->only(['id', 'logo', 'title', 'description', 'phone1']));
            });
        }

        return $products;
    }

    public function updateProduct(Request $request)
    {
//        dd($request->desc);
        $product = Production::find($request->id);
        $product->title = $request->title;
        $product->description = $request->desc;
        $product->phone1 = $request->phone;
        $product->save();
        $product = $product->only(['id', 'logo', 'title', 'description', 'phone1']);
        return $product;
    }


    //news

    public function getNews()
    {
        $news = NewsSite::all();


        return $news;
    }

    public function getNewEdit($id)
    {
        $new = NewsSite::find($id);

        return $new;
    }

    public function searchNews($value)
    {
        if ($value != 'empty')
            $news = NewsSite::where('title', 'like', "%$value%")->get();
        else {
            $news = NewsSite::all();
        }
        return $news;
    }

    public function storeNews(Request $request)
    {
//        dd($request->all());
        if ($request->id == 'null') {
            $new = new NewsSite();
            $new->title = $request->title;
            $new->description = $request->desc;
            if ($request->preview != 'undefined') {
                $preview = $request->preview;
                $fileName = 'news/' . uniqid('news_preview_') . '.jpg';
                $image = ImageManagerStatic::make($preview);

                if (request('rotate')) {
                    $image = $image->rotate(-(request('rotate')));
                }
                $image = $image->resize(500, null, function ($constraint) {
                    return $constraint->aspectRatio();
                })
                    ->stream('jpg', 80);

                Storage::disk('local')->put('public/' . $fileName, $image);
                $new->preview = $fileName;
            }
            $new->save();
        }
        else
        {
            $new = NewsSite::find($request->id);
            $new->title = $request->title;
            $new->description = $request->desc;
            if ($request->preview != 'undefined') {
                $preview = $request->preview;
                $fileName = 'news/' . uniqid('news_preview_') . '.jpg';
                $image = ImageManagerStatic::make($preview);

                if (request('rotate')) {
                    $image = $image->rotate(-(request('rotate')));
                }
                $image = $image->resize(500, null, function ($constraint) {
                    return $constraint->aspectRatio();
                })
                    ->stream('jpg', 80);

                Storage::disk('local')->put('public/' . $fileName, $image);
                $new->preview = $fileName;
            }
            $new->save();
        }
    }

    public function deleteNews($id) {
        NewsSite::destroy($id);
        $news = NewsSite::all();

        return $news;
    }

}
