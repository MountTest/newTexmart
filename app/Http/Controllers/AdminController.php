<?php

namespace App\Http\Controllers;

use App\Announce;
use App\NewsSite;
use App\Production;
use App\Type;
use App\User;
use Carbon\Carbon;
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



//    public function rolling_users() {
//        $users = User::all();
//
////        $temps = collect();
//        foreach ($users as $user) {
////            if (strlen($user->phone) <= 5){
////                $temps->push($user);
////                $user->delete();
////            }
//            $lower = substr($user->phone,0,3);
//
//            if (stristr($lower,'996') == true) {
//                $user->locate = 'kg';
//                $user->save();
//                continue;
//            }
//            if (stristr($lower, '998') == true) {
//                $user->locate = 'uz';
//                $user->save();
//                continue;
//            }
//            if (stristr($lower, '375') == true) {
//                $user->locate = 'by';
//                $user->save();
//                continue;
//            }
//            $lower = substr($user->phone,0,2);
//            if (stristr($lower,'77') == true)
//            {
//                $user->locate = 'kz';
//                $user->save();
//                continue;
//            }
//            $lower = substr($user->phone,0,1);
//            if (stristr($lower, '7') == true)
//            {
//                $user->locate = 'ru';
//                $user->save();
//                continue;
//            }
//        }
//    }




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


    //announces
    public function getAnnounces()
    {
        $announces = Announce::where('check','!=',null)->get();

        return $announces;
    }

    public function searchAnnounces($value)
    {
        if ($value != 'empty')
            $announces = Announce::where('name', 'like', "%$value%")->where('check','!=',null)->orWhere('email', 'like', "%$value%")->where('check','!=',null)->orWhere('phone', 'like', "%$value%")->where('check','!=',null)->get();
        else {
            $announces = Announce::where('check','!=',null)->get();
        }
        return $announces;
    }

    public function updateAnnounce(Request $request)
    {
        $announce = Announce::find($request->id);
        $announce->name = $request->name;
        $announce->email = $request->email;
        $announce->phone = $request->phone;
        $announce->content = $request->desc;
        $announce->save();

        return $announce;
    }

    public function deleteAnnounces($id) {

        $announce = Announce::find($id);

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

        $announces = Announce::where('check','!=', null)->get();
        return $announces;
    }
    //products
    public function getProducts($id)
    {
        $products = collect();
        if ($id == 1) {
            $prod = Production::where('type', 'product')->where('check','!=',null)->get();
        } elseif ($id == 2) {
            $prod = Production::where('type', 'service')->where('check','!=',null)->get();
        } elseif ($id == 3) {
            $prod = Production::where('type', 'productions')->where('check','!=',null)->get();
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
                $prod = Production::where('type', 'product')->where('title', 'like', "%$value%")->where('type', 'product')->where('check','!=',null)->orWhere('phone1', 'like', "%$value%")->where('type', 'product')->where('check','!=',null)->get();
            } elseif ($id == 2) {
                $prod = Production::where('type', 'service')->where('title', 'like', "%$value%")->where('type', 'service')->where('check','!=',null)->orWhere('phone1', 'like', "%$value%")->where('type', 'service')->where('check','!=',null)->get();
            } elseif ($id == 3) {
                $prod = Production::where('type', 'productions')->where('title', 'like', "%$value%")->where('type', 'productions')->where('check','!=',null)->orWhere('phone1', 'like', "%$value%")->where('type', 'productions')->where('check','!=',null)->get();
            }
            $products = $products->merge($prod);
            $products = $products->map(function ($item) {
                return new Production($item->only(['id', 'logo', 'title', 'description', 'phone1']));
            });
        } else {
            $products = collect();
            if ($id == 1) {
                $prod = Production::where('type', 'product')->where('check','!=',null)->get();
            } elseif ($id == 2) {
                $prod = Production::where('type', 'service')->where('check','!=',null)->get();
            } elseif ($id == 3) {
                $prod = Production::where('type', 'productions')->where('check','!=',null)->get();
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

    public function deleteProducts($id, $type) {
        Production::destroy($id);
        $products = collect();
        if ($type == 1) {
            $prod = Production::where('type', 'product')->where('check','!=', null)->get();
        }
        elseif ($type == 2) {
            $prod = Production::where('type', 'service')->where('check','!=', null)->get();
        }
        elseif ($type == 3) {
            $prod = Production::where('type', 'productions')->where('check','!=', null)->get();
        }
        $products = $products->merge($prod);
        $products = $products->map(function ($item) {
            return new Production($item->only(['id', 'logo', 'title', 'description', 'phone1']));
        });

        return $products;
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

    public function getStatistic() {
//        dd(Carbon::now()->subMonths(6), Carbon::now()->subMonths(6)->firstOfMonth());
//        dd(count(User::where('created_at','>=',Carbon::now()->subMonths(6)->firstOfMonth())->get()));

        $locates = array('labels' => [
            'kg', 'ru', 'kz', 'uz', 'by', 'Другое'
        ],
            'datasets' => array([
                'label' => 'Пользователи по регионам',
                'backgroundColor' => ['#FF1500','#1e4cd6','#2AFFF2','#08B660','#2E8B57', '#868686'],
                'data' => [
                    count(User::where('locate','kg')->get()),
                    count(User::where('locate','ru')->get()),
                    count(User::where('locate','kz')->get()),
                    count(User::where('locate','uz')->get()),
                    count(User::where('locate','by')->get()),
                    count(User::where('locate', null)->get()),
                ],
            ]));

        $users = array('labels' => [
            Carbon::now()->subMonths(5)->format('F'),
            Carbon::now()->subMonths(4)->format('F'),
            Carbon::now()->subMonths(3)->format('F'),
            Carbon::now()->subMonths(2)->format('F'),
            Carbon::now()->subMonths(1)->format('F'),
            Carbon::now()->subMonths(0)->format('F')
        ],
            'datasets' => array([
                'label' => 'Пользователи',
                'backgroundColor' => '#F9DDA7',
                'data' => [
                    count(User::where('created_at','>=',Carbon::now()->subMonths(5)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(4)->firstOfMonth())->get()),
                    count(User::where('created_at','>=',Carbon::now()->subMonths(4)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(3)->firstOfMonth())->get()),
                    count(User::where('created_at','>=',Carbon::now()->subMonths(3)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(2)->firstOfMonth())->get()),
                    count(User::where('created_at','>=',Carbon::now()->subMonths(2)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(1)->firstOfMonth())->get()),
                    count(User::where('created_at','>=',Carbon::now()->subMonths(1)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(0)->firstOfMonth())->get()),
                    count(User::where('created_at','>=',Carbon::now()->subMonths(0)->firstOfMonth())->get())
                ],
            ]));

        $announces = array('labels' => [
            Carbon::now()->subMonths(5)->format('F'),
            Carbon::now()->subMonths(4)->format('F'),
            Carbon::now()->subMonths(3)->format('F'),
            Carbon::now()->subMonths(2)->format('F'),
            Carbon::now()->subMonths(1)->format('F'),
            Carbon::now()->subMonths(0)->format('F')
        ],
            'datasets' => array([
                'label' => 'Заявки',
                'backgroundColor' => '#F9DDA7',
                'data' => [
                    count(Announce::where('created_at','>=',Carbon::now()->subMonths(5)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(4)->firstOfMonth())->get()),
                    count(Announce::where('created_at','>=',Carbon::now()->subMonths(4)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(3)->firstOfMonth())->get()),
                    count(Announce::where('created_at','>=',Carbon::now()->subMonths(3)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(2)->firstOfMonth())->get()),
                    count(Announce::where('created_at','>=',Carbon::now()->subMonths(2)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(1)->firstOfMonth())->get()),
                    count(Announce::where('created_at','>=',Carbon::now()->subMonths(1)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(0)->firstOfMonth())->get()),
                    count(Announce::where('created_at','>=',Carbon::now()->subMonths(0)->firstOfMonth())->get())
                ],
            ]));

        $products = array('labels' => [
            Carbon::now()->subMonths(5)->format('F'),
            Carbon::now()->subMonths(4)->format('F'),
            Carbon::now()->subMonths(3)->format('F'),
            Carbon::now()->subMonths(2)->format('F'),
            Carbon::now()->subMonths(1)->format('F'),
            Carbon::now()->subMonths(0)->format('F')
        ],
            'datasets' => array([
                'label' => 'Товары',
                'backgroundColor' => '#F9DDA7',
                'data' => [
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(5)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(4))->where('type','product')->get()),
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(4)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(3))->where('type','product')->get()),
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(3)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(2))->where('type','product')->get()),
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(2)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(1))->where('type','product')->get()),
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(1)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(0))->where('type','product')->get()),
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(0)->firstOfMonth())->where('type','product')->get())
                ],
            ]));

        $services = array('labels' => [
            Carbon::now()->subMonths(5)->format('F'),
            Carbon::now()->subMonths(4)->format('F'),
            Carbon::now()->subMonths(3)->format('F'),
            Carbon::now()->subMonths(2)->format('F'),
            Carbon::now()->subMonths(1)->format('F'),
            Carbon::now()->subMonths(0)->format('F')
        ],
            'datasets' => array([
                'label' => 'Услуги',
                'backgroundColor' => '#F9DDA7',
                'data' => [
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(5)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(4))->where('type','service')->get()),
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(4)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(3))->where('type','service')->get()),
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(3)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(2))->where('type','service')->get()),
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(2)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(1))->where('type','service')->get()),
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(1)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(0))->where('type','service')->get()),
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(0)->firstOfMonth())->where('type','product')->get())
                ],
            ]));

        $productions = array('labels' => [
            Carbon::now()->subMonths(5)->format('F'),
            Carbon::now()->subMonths(4)->format('F'),
            Carbon::now()->subMonths(3)->format('F'),
            Carbon::now()->subMonths(2)->format('F'),
            Carbon::now()->subMonths(1)->format('F'),
            Carbon::now()->subMonths(0)->format('F')
        ],
            'datasets' => array([
                'label' => 'Производители',
                'backgroundColor' => '#F9DDA7',
                'data' => [
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(5)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(4))->where('type','productions')->get()),
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(4)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(3))->where('type','productions')->get()),
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(3)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(2))->where('type','productions')->get()),
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(2)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(1))->where('type','productions')->get()),
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(1)->firstOfMonth())->where('created_at','<=',Carbon::now()->subMonths(0))->where('type','productions')->get()),
                    count(Production::where('created_at','>=',Carbon::now()->subMonths(0)->firstOfMonth())->where('type','product')->get())
                ],
            ]));

        return [
            'users' => $users,
            'products' => $products,
            'services' => $services,
            'productions' => $productions,
            'announces' => $announces,
            'locates' => $locates,
        ];
    }




    //check Moderator

    public function getForCheck()
    {
        $products = collect();
        $prod = Production::where('type', 'product')->where('check', null)->get();
        $products = $products->merge($prod);
        $products = $products->map(function ($item) {
            return new Production($item->only(['id', 'logo', 'title', 'description', 'phone1']));
        });

        $productions = collect();
        $prod = Production::where('type', 'productions')->where('check', null)->get();
        $productions = $productions->merge($prod);
        $productions = $productions->map(function ($item) {
            return new Production($item->only(['id', 'logo', 'title', 'description', 'phone1']));
        });

        $services = collect();
        $prod = Production::where('type', 'service')->where('check', null)->get();
        $services = $services->merge($prod);
        $services = $services->map(function ($item) {
            return new Production($item->only(['id', 'logo', 'title', 'description', 'phone1']));
        });

        $announces = Announce::where('check',null)->get();

        return [
          'products' => $products,
          'services' => $services,
          'productions' => $productions,
          'announces' => $announces
        ];
    }

    public function PublishProduct(Request $request)
    {
        $product = Production::find($request->id);
        $product->title = $request->title;
        $product->description = $request->desc;
        $product->phone1 = $request->phone;
        $product->check = 1;
        $product->save();
        $product = $product->only(['id', 'logo', 'title', 'description', 'phone1']);
        return $product;
    }

    public function PublishAnnounce(Request $request)
    {
        $announce = Announce::find($request->id);
        $announce->name = $request->name;
        $announce->email = $request->email;
        $announce->phone = $request->phone;
        $announce->content = $request->desc;
        $announce->check = 1;
        $announce->save();

        return $announce;
    }

}
