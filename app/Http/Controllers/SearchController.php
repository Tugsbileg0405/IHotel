<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use Illuminate\Support\Collection;
use DB;
use App\Room;
use App\Close;
use Carbon\Carbon;
use Swap;
use App\Option;
use App\Pickup;

class SearchController extends Controller
{
    // =========================================================================
    //  - Get all value of search result
    //  - Save values in session
    // =========================================================================
    public function index(Request $request)
    {
        $roomnumber = $request->roomnumber;
        $startDate = $request->startdate;
        $endDate = $request->enddate;
        $peoplenumber = $request->peoplenumber;
        $place = $request->place;
        $request->session()->put('roomnumber', $roomnumber);
        $request->session()->put('startDate', $startDate);
        $request->session()->put('endDate', $endDate);
        $request->session()->put('peoplenumber', $peoplenumber);
        $request->session()->put('place', $place);
        
        return 'success';
    }

    // =========================================================================
    // - Get values of search from session
    // - Show results and values of search in blade
    // =========================================================================

    public function searched(Request $request)
    {
        if (!$request->session()->get('roomnumber') || !$request->session()->get('endDate') || !$request->session()->get('startDate') || !$request->session()->get('peoplenumber')) {
            $request->session()->put('roomnumber', 2);
            $request->session()->put('peoplenumber', 1);
            $request->session()->put('startDate', Carbon::now()->format('m/d/Y'));
            $request->session()->put('endDate', Carbon::tomorrow()->format('m/d/Y'));
        }
        $s_roNum = $request->session()->get('roomnumber');
        $p_Num = $request->session()->get('peoplenumber');
        $startDate = $request->session()->get('startDate');
        $endDate = $request->session()->get('endDate');
        $place = $request->session()->get('place');
        $hotels = Hotel::with('rooms')->get();
        $hotel_id = $request->session()->get('hotel_id');
        $rate = Option::find(7)->value;
        $maxprice = Room::max('price');
        $active_rooms = Room::whereHas('hotel', function ($query) {
                    $query->where('published', true)
                          ->where('is_active', true);
        })->with('sales')->get();

        $minprice = $active_rooms->min('price');
        foreach ($active_rooms as $rooms) {
            foreach ($rooms->sales as $sale) {
                if ((strtotime($startDate) >= strtotime($sale->startdate)) && (strtotime($startDate) <= strtotime($sale->enddate))) {
                    if ($sale->price < $minprice) {
                        $minprice = $sale->price;
                    }
                }
            }
        }
        
        if ($maxprice == null) {
            $maxprice = 100000;
        }

        if ($minprice == null) {
            $maxprice = 0;
        }

        $count =  collect($hotels)->count();
        return view('search', [
            'roomnumber' => $s_roNum,
            'peoplenumber' => $p_Num,
            'startdate' => $startDate,
            'enddate' => $endDate,
            'place' => $place,
            'count' => $count/10,
            'hotel_id' => $hotel_id,
            'maxprice' => $maxprice,
            'minprice' => $minprice,
            'hotels' => $hotels,
            'rate' => $rate,
        ]);
    }

    // =========================================================================
    //  - Find information of hotel from database
    //  - Show result of hotel and results of search in blade
    // =========================================================================

    public function hotelInfo($id, Request $request)
    {
        $hotel = \App\Hotel::with('rooms')->with('services')->findOrFail($id);

        $grouped = $hotel->services->groupBy('service_category_id');

        $services = [];  
        foreach ($grouped as $key => $item) {
            $category = \App\HotelServiceCategory::findOrFail($key);
            if (\App::isLocale('mn')) {
                $services[$category->name] = $item;
            }
            elseif (\App::isLocale('en')) {
                $services[$category->name_en] = $item;
            }
        }

        if (!$request->session()->get('roomnumber') || !$request->session()->get('endDate') || !$request->session()->get('startDate') || !$request->session()->get('peoplenumber')) {
            $request->session()->put('roomnumber', 2);
            $request->session()->put('peoplenumber', 1);
            $request->session()->put('startDate', Carbon::now()->format('m/d/Y'));
            $request->session()->put('endDate', Carbon::tomorrow()->format('m/d/Y'));
        }
        $request->session()->put('hotel_id', $id);
        $roomnumber = $request->session()->get('roomnumber');
        $startDate = $request->session()->get('startDate');
        $endDate = $request->session()->get('endDate');
        $place = $request->session()->get('place');
        $peoplenumber = $request->session()->get('peoplenumber');
        $rooms = $hotel->rooms;
        $rate = Option::find(7)->value;
        $pickups = Pickup::all();
        $minprice = $rooms->min('price');
        $minprice_saled = 0;
        foreach ($rooms as $room) {
            $saled_room = [];
            foreach ($room->closes as $close) {
                if (strtotime($startDate) >= strtotime($close->startdate)) {
                    if ((strtotime($startDate) - strtotime($close->startdate)) <= (strtotime($close->enddate) - strtotime($close->startdate))) {
                        $room->number = $room->number - $close->number;
                    }
                } else {
                    if ((strtotime($endDate) - strtotime($startDate)) >= (strtotime($close->startdate) - strtotime($startDate))) {
                        $room->number = $room->number - $close->number;
                    }
                }
            }
            foreach ($room->sales as $sale) {
                if ((strtotime($startDate) >= strtotime($sale->startdate)) && (strtotime($startDate) <= strtotime($sale->enddate))) {
                    $saled_room[] = $sale;
                    $room->saled_room = $saled_room;
                    $room->price = $sale->price;
                    if ($sale->price < $minprice) {
                        $minprice_saled = $sale->price;
                    }
                }
            }
        }

        return view('hotel', [
            'hotel' => $hotel,
            'roomnumber' => $roomnumber,
            'peoplenumber' => $peoplenumber,
            'startdate' => $startDate,
            'place' => $place,
            'rooms' => $rooms,
            'enddate' => $endDate,
            'rate' => $rate,
            'pickups' => $pickups,
            'services' => $services,
        ]);
    }

    // =========================================================================
    // search function
    // =========================================================================

    public function check(Request $request)
    {
        $rate = Option::find(7)->value;
        $roomnumber = $request->session()->get('roomnumber');
        $startDate = $request->session()->get('startDate');
        $endDate = $request->session()->get('endDate');
        $peoplenumber = $request->session()->get('peoplenumber');
        $place = $request->session()->get('place');
        $page = $request->page;
        if ($page == null) {
            $page = 1;
        }
        
        $filter = $request->filterstar;
        $filterprice1 = $request->filterprice1;
        $filterprice2 = $request->filterprice2;
        $rating1 = $request->rating1;
        $rating2 = $request->rating2;
        $totalpeople = $peoplenumber * $roomnumber;

        if (\App::isLocale('mn')) {
            $collection = Hotel::where('published', true)
                ->where('is_active', true)
                ->where('country', $place)
                ->where('room_number', '>=', $roomnumber)
                ->where('total_people', '>=', $totalpeople)
                ->with(['rooms.sales' => function ($query) use ($startDate, $endDate) {
                    $query->where('startdate', '<=', Carbon::parse($startDate)->format('Y-m-d H:i:s'))
                            ->where('enddate', '>=', Carbon::parse($endDate)->format('Y-m-d H:i:s'));
                }])
                ->orderBy('priority', 'asc')
                ->with('rates')
                ->get();

            if ($filter !== null && $filterprice1 == null && $filterprice2 == null && $rating1 == null && $rating2 == null) {
                $collection = Hotel::where('published', true)
                    ->where('is_active', true)
                    ->where('country', $place)
                    ->where('room_number', '>=', $roomnumber)
                    ->where('total_people', '>=', $totalpeople)
                    ->where('star', $filter)
                    ->with(['rooms.sales' => function ($query) use ($startDate, $endDate) {
                        $query->where('startdate', '<=', Carbon::parse($startDate)->format('Y-m-d H:i:s'))
                            ->where('enddate', '>=', Carbon::parse($endDate)->format('Y-m-d H:i:s'));
                    }])
                    ->orderBy('priority', 'asc')
                    ->with('rates')
                    ->get();
            }

            if ($filterprice1 !== null && $filterprice2 !== null && $rating1 == null && $rating2 == null && $filter == null) {
                $collection = Hotel::where('published', true)
                    ->where('is_active', true)
                    ->where('country', $place)
                    ->where('room_number', '>=', $roomnumber)
                    ->where('total_people', '>=', $totalpeople)
                    ->whereHas('rooms', function ($query) use ($filterprice1, $filterprice2, $totalpeople) {
                        $query->whereBetween('price', [$filterprice1,$filterprice2]);
                    })
                    ->with(['rooms.sales' => function ($query) use ($startDate, $endDate) {
                        $query->where('startdate', '<=', Carbon::parse($startDate)->format('Y-m-d H:i:s'))
                            ->where('enddate', '>=', Carbon::parse($endDate)->format('Y-m-d H:i:s'));
                    }])
                    ->orderBy('priority', 'asc')
                    ->with('rates')
                    ->get();
            }

            if ($rating1 !== null && $rating2 !== null && $filterprice1 == null && $filterprice2 == null && $filter == null) {
                $collection = Hotel::where('published', true)
                    ->where('is_active', true)
                    ->where('country', $place)
                    ->where('room_number', '>=', $roomnumber)
                    ->whereBetween('rating', [ $rating1 , $rating2])
                    ->where('total_people', '>=', $totalpeople)
                    ->with(['rooms.sales' => function ($query) use ($startDate, $endDate) {
                        $query->where('startdate', '<=', Carbon::parse($startDate)->format('Y-m-d H:i:s'))
                            ->where('enddate', '>=', Carbon::parse($endDate)->format('Y-m-d H:i:s'));
                    }])
                    ->orderBy('priority', 'asc')
                    ->with('rates')
                    ->get();
            }

            if ($filterprice1 !== null && $filterprice2 !== null && $rating1 !== null && $rating2 !== null && $filter == null) {
                $collection = Hotel::where('published', true)
                    ->where('is_active', true)
                    ->where('country', $place)
                    ->where('room_number', '>=', $roomnumber)
                    ->whereBetween('rating', [ $rating1 , $rating2])
                    ->where('total_people', '>=', $totalpeople)
                    ->whereHas('rooms', function ($query) use ($filterprice1, $filterprice2, $totalpeople) {
                        $query->whereBetween('price', [$filterprice1,$filterprice2]);
                    })
                    ->with(['rooms.sales' => function ($query) use ($startDate, $endDate) {
                        $query->where('startdate', '<=', Carbon::parse($startDate)->format('Y-m-d H:i:s'))
                            ->where('enddate', '>=', Carbon::parse($endDate)->format('Y-m-d H:i:s'));
                    }])
                    ->orderBy('priority', 'asc')
                    ->with('rates')
                    ->get();
            }

            if ($rating1 !== null && $rating2 !== null && $filter !== null && $filterprice1 == null && $filterprice2 == null) {
                $collection = Hotel::where('published', true)
                    ->where('is_active', true)
                    ->where('country', $place)
                    ->where('room_number', '>=', $roomnumber)
                    ->where('total_people', '>=', $totalpeople)
                    ->whereBetween('rating', [$rating1 , $rating2])
                    ->where('star', $filter)
                    ->with(['rooms.sales' => function ($query) use ($startDate, $endDate) {
                        $query->where('startdate', '<=', Carbon::parse($startDate)->format('Y-m-d H:i:s'))
                            ->where('enddate', '>=', Carbon::parse($endDate)->format('Y-m-d H:i:s'));
                    }])
                    ->orderBy('priority', 'asc')
                    ->with('rates')
                    ->get();
            }

            if ($filterprice1 !== null && $filterprice2 !== null && $filter !== null && $rating2 == null && $rating1 == null) {
                $collection = Hotel::where('published', true)
                    ->where('is_active', true)
                    ->where('country', $place)
                    ->where('total_people', '>=', $totalpeople)
                    ->where('room_number', '>=', $roomnumber)
                    ->where('star', $filter)
                    ->whereHas('rooms', function ($query) use ($filterprice1, $filterprice2, $totalpeople) {
                        $query->whereBetween('price', [$filterprice1,$filterprice2]);
                    })
                    ->with(['rooms.sales' => function ($query) use ($startDate, $endDate) {
                        $query->where('startdate', '<=', Carbon::parse($startDate)->format('Y-m-d H:i:s'))
                            ->where('enddate', '>=', Carbon::parse($endDate)->format('Y-m-d H:i:s'));
                    }])
                    ->orderBy('priority', 'asc')
                    ->with('rates')
                    ->get();
            }

            if ($filterprice1 !== null && $filterprice2 !== null && $rating1 !== null && $rating2 !== null && $filter !== null) {
                $collection = Hotel::where('published', true)
                    ->where('is_active', true)
                    ->where('country', $place)
                    ->where('room_number', '>=', $roomnumber)
                    ->whereBetween('rating', [ $rating1 , $rating2])
                    ->where('total_people', '>=', $totalpeople)
                    ->whereHas('rooms', function ($query) use ($filterprice1, $filterprice2, $totalpeople) {
                        $query->whereBetween('price', [$filterprice1,$filterprice2]);
                    })
                    ->where('star', $filter)
                    ->with(['rooms.sales' => function ($query) use ($startDate, $endDate) {
                        $query->where('startdate', '<=', Carbon::parse($startDate)->format('Y-m-d H:i:s'))
                            ->where('enddate', '>=', Carbon::parse($endDate)->format('Y-m-d H:i:s'));
                    }])
                    ->orderBy('priority', 'asc')
                    ->with('rates')
                    ->get();
            }
        }


        if (\App::isLocale('en')) {
            $collection = Hotel::where('name_en', '!=', null)
                ->where('published', true)
                ->where('is_active', true)
                ->where('country', $place)
                ->where('room_number', '>=', $roomnumber)
                ->where('total_people', '>=', $totalpeople)
                ->with(['rooms.sales' => function ($query) use ($startDate, $endDate) {
                        $query->where('startdate', '<=', Carbon::parse($startDate)->format('Y-m-d H:i:s'))
                            ->where('enddate', '>=', Carbon::parse($endDate)->format('Y-m-d H:i:s'));
                }])
                ->orderBy('priority', 'asc')
                ->with('rates')
                ->get();

            if ($filter !== null && $filterprice1 == null && $filterprice2 == null && $rating1 == null && $rating2 == null) {
                $collection = Hotel::where('name_en', '!=', null)
                    ->where('published', true)
                    ->where('is_active', true)
                    ->where('country', $place)
                    ->where('room_number', '>=', $roomnumber)
                    ->where('total_people', '>=', $totalpeople)
                    ->where('star', $filter)
                    ->with(['rooms.sales' => function ($query) use ($startDate, $endDate) {
                        $query->where('startdate', '<=', Carbon::parse($startDate)->format('Y-m-d H:i:s'))
                            ->where('enddate', '>=', Carbon::parse($endDate)->format('Y-m-d H:i:s'));
                    }])
                    ->orderBy('priority', 'asc')
                    ->with('rates')
                    ->get();
            }

            if ($filterprice1 !== null && $filterprice2 !== null && $rating1 == null && $rating2 == null && $filter == null) {
                $filterprice1 = $filterprice1 * $rate;
                $filterprice2 = $filterprice2 * $rate;
                $collection = Hotel::where('name_en', '!=', null)
                    ->where('published', true)
                    ->where('is_active', true)
                    ->where('country', $place)
                    ->where('room_number', '>=', $roomnumber)
                    ->where('total_people', '>=', $totalpeople)
                    ->whereHas('rooms', function ($query) use ($filterprice1, $filterprice2, $totalpeople) {
                        $query->whereBetween('price', [$filterprice1,$filterprice2]);
                    })
                    ->with(['rooms.sales' => function ($query) use ($startDate, $endDate) {
                        $query->where('startdate', '<=', Carbon::parse($startDate)->format('Y-m-d H:i:s'))
                            ->where('enddate', '>=', Carbon::parse($endDate)->format('Y-m-d H:i:s'));
                    }])
                    ->orderBy('priority', 'asc')
                    ->with('rates')
                    ->get();
            }

            if ($rating1 !== null && $rating2 !== null && $filterprice1 == null && $filterprice2 == null && $filter == null) {
                $collection = Hotel::where('name_en', '!=', null)
                    ->where('published', true)
                    ->where('is_active', true)
                    ->where('country', $place)
                    ->where('room_number', '>=', $roomnumber)
                    ->whereBetween('rating', [ $rating1 , $rating2])
                    ->where('total_people', '>=', $totalpeople)
                    ->with(['rooms.sales' => function ($query) use ($startDate, $endDate) {
                        $query->where('startdate', '<=', Carbon::parse($startDate)->format('Y-m-d H:i:s'))
                            ->where('enddate', '>=', Carbon::parse($endDate)->format('Y-m-d H:i:s'));
                    }])
                    ->orderBy('priority', 'asc')
                    ->with('rates')
                    ->get();
            }

            if ($filterprice1 !== null && $filterprice2 !== null && $rating1 !== null && $rating2 !== null && $filter == null) {
                $filterprice1 = $filterprice1 * $rate;
                $filterprice2 = $filterprice2 * $rate;
                $collection = Hotel::where('name_en', '!=', null)
                    ->where('published', true)
                    ->where('is_active', true)
                    ->where('country', $place)
                    ->where('room_number', '>=', $roomnumber)
                    ->whereBetween('rating', [ $rating1 , $rating2])
                    ->where('total_people', '>=', $totalpeople)
                    ->whereHas('rooms', function ($query) use ($filterprice1, $filterprice2, $totalpeople) {
                        $query->whereBetween('price', [$filterprice1,$filterprice2]);
                    })
                    ->with(['rooms.sales' => function ($query) use ($startDate, $endDate) {
                        $query->where('startdate', '<=', Carbon::parse($startDate)->format('Y-m-d H:i:s'))
                            ->where('enddate', '>=', Carbon::parse($endDate)->format('Y-m-d H:i:s'));
                    }])
                    ->orderBy('priority', 'asc')
                    ->with('rates')
                    ->get();
            }

            if ($rating1 !== null && $rating2 !== null && $filter !== null && $filterprice1 == null && $filterprice2 == null) {
                $collection = Hotel::where('name_en', '!=', null)
                    ->where('published', true)
                    ->where('is_active', true)
                    ->where('country', $place)
                    ->where('room_number', '>=', $roomnumber)
                    ->where('total_people', '>=', $totalpeople)
                    ->whereBetween('rating', [ $rating1 , $rating2])
                    ->where('star', $filter)
                    ->with(['rooms.sales' => function ($query) use ($startDate, $endDate) {
                        $query->where('startdate', '<=', Carbon::parse($startDate)->format('Y-m-d H:i:s'))
                            ->where('enddate', '>=', Carbon::parse($endDate)->format('Y-m-d H:i:s'));
                    }])
                    ->orderBy('priority', 'asc')
                    ->with('rates')
                    ->get();
            }

            if ($filterprice1 !== null && $filterprice2 !== null && $rating1 !== null && $rating2 !== null && $filter !== null) {
                $filterprice1 = $filterprice1 * $rate;
                $filterprice2 = $filterprice2 * $rate;
                $collection = Hotel::where('name_en', '!=', null)
                    ->where('published', true)
                    ->where('is_active', true)
                    ->where('country', $place)
                    ->where('room_number', '>=', $roomnumber)
                    ->whereBetween('rating', [ $rating1 , $rating2])
                    ->where('star', $filter)
                    ->where('total_people', '>=', $totalpeople)
                    ->whereHas('rooms', function ($query) use ($filterprice1, $filterprice2, $totalpeople) {
                        $query->whereBetween('price', [$filterprice1,$filterprice2]);
                    })
                    ->with(['rooms.sales' => function ($query) use ($startDate, $endDate) {
                        $query->where('startdate', '<=', Carbon::parse($startDate)->format('Y-m-d H:i:s'))
                            ->where('enddate', '>=', Carbon::parse($endDate)->format('Y-m-d H:i:s'));
                    }])
                    ->orderBy('priority', 'asc')
                    ->with('rates')
                    ->get();
            }

            if ($filterprice1 !== null && $filterprice2 !== null && $filter !== null && $rating1 == null && $rating2 == null) {
                $filterprice1 = $filterprice1 * $rate;
                $filterprice2 = $filterprice2 * $rate;
                $collection = Hotel::where('name_en', '!=', null)
                    ->where('published', true)
                    ->where('is_active', true)
                    ->where('country', $place)
                    ->where('room_number', '>=', $roomnumber)
                    ->where('star', $filter)
                    ->where('total_people', '>=', $totalpeople)
                    ->whereHas('rooms', function ($query) use ($filterprice1, $filterprice2, $totalpeople) {
                        $query->whereBetween('price', [$filterprice1,$filterprice2]);
                    })
                    ->with(['rooms.sales' => function ($query) use ($startDate, $endDate) {
                        $query->where('startdate', '<=', Carbon::parse($startDate)->format('Y-m-d H:i:s'))
                            ->where('enddate', '>=', Carbon::parse($endDate)->format('Y-m-d H:i:s'));
                    }])
                    ->orderBy('priority', 'asc')
                    ->with('rates')
                    ->get();
            }
        }

        
        $allresultlenth = $collection->count();
        $paged_hotels = $collection->forPage($page, 10);

        $favorites = [];
        if ($request->user()) {
            $favorites = $request->user()->favorites()->pluck('hotel_id')->toArray();
        }

        return response()->json(array('success' => true, 'data' => $paged_hotels, 'result' => $allresultlenth,'favorites' => $favorites, 'allhotels' => $collection));
    }

    public function likeHotel(Request $request)
    {
        if ($request->user()) {
            $hotel_id = $request->get('hotel_id');
            $favorites = $request->user()->favorites()->pluck('hotel_id')->toArray();
            
            if (collect($favorites)->contains($hotel_id)) {
                $request->user()->favorites()->detach($hotel_id);
                $favorited = false;
            } else {
                $request->user()->favorites()->attach($hotel_id);
                $favorited = true;
            }
            return response()->json(array('favorited' => $favorited));
        }
    }
}
