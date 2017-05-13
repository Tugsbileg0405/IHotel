<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Information;
use App\Page;
use App\Post;
use App\PostCategory;
use App\Question;
use App\Hotel;
use App\Option;
use App\Term;
use App\Team;
use App\Feedback;
use App\Room;
use App\User;
use App\PostComment;
use Image;
use Carbon\Carbon;

class AppController extends Controller
{
    /**
     * Display a home page.
     *
     */
    public function home()
    {
        $comments = Comment::get();
        $informations = Information::get();
        $firstPost = Post::where('post_category_id', '1')
            ->orderby('created_at', 'desc')
            ->first();
        $secondPost = Post::where('post_category_id', '2')
            ->orderby('created_at', 'desc')
            ->first();
        $hotel = Hotel::where('sale', true)
            ->where('published', true)
            ->orderby('priority', 'asc')
            ->first();

        $room = '';
        if ($hotel) {
            $room = $hotel->rooms()->orderby('price', 'asc')
                ->first();
        }
        
        return view('index', [
            'comments' => $comments,
            'informations' => $informations,
            'firstPost' => $firstPost,
            'secondPost' => $secondPost,
            'hotel' => $hotel,
            'room' => $room,
        ]);
    }

    /**
     * Show a single blog post.
     *
     */
    public function showPost($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $post->views = $post->views + 1;
        $post->save();
        $categories = PostCategory::get();
        $mostPosts = Post::orderby('views', 'desc')
            ->limit(5)
            ->get();
        $comments = $post->comments()
            ->orderby('created_at', 'desc')
            ->get();
        $s_roNum = $request->session()->get('roomnumber');
        $p_Num = $request->session()->get('peoplenumber');
        $startDate = $request->session()->get('startDate');
        $endDate = $request->session()->get('endDate');
        $place = $request->session()->get('place');
        return view('post', [
            'post' => $post,
            'categories' => $categories,
            'mostPosts' => $mostPosts,
            'roomnumber' => $s_roNum,
            'peoplenumber' => $p_Num,
            'startdate' => $startDate,
            'enddate' => $endDate,
            'place' => $place,
            'comments' => $comments,
        ]);
    }

    /**
     * Show all blog posts.
     *
     */
    public function showPosts(Request $request)
    {
        $posts = Post::orderby('created_at', 'desc')
            ->paginate(10);
        $categories = PostCategory::get();
        $s_roNum = $request->session()->get('roomnumber');
        $p_Num = $request->session()->get('peoplenumber');
        $startDate = $request->session()->get('startDate');
        $endDate = $request->session()->get('endDate');
        $place = $request->session()->get('place');
        $mostPosts = Post::orderby('views', 'desc')
            ->limit(5)
            ->get();

        return view('posts', [
            'posts' => $posts,
            'categories' => $categories,
            'mostPosts' => $mostPosts,
            'roomnumber' => $s_roNum,
            'peoplenumber' => $p_Num,
            'startdate' => $startDate,
            'enddate' => $endDate,
            'place' => $place,
        ]);
    }

    public function showUserPosts(Request $request, $id)
    {
        $user = User::findorfail($id);
        $posts = $user->posts()
            ->orderby('created_at', 'desc')
            ->paginate(10);
        $categories = PostCategory::get();
        $s_roNum = $request->session()->get('roomnumber');
        $p_Num = $request->session()->get('peoplenumber');
        $startDate = $request->session()->get('startDate');
        $endDate = $request->session()->get('endDate');
        $place = $request->session()->get('place');
        $mostPosts = Post::orderby('views', 'desc')
            ->limit(5)
            ->get();

        return view('posts', [
            'posts' => $posts,
            'categories' => $categories,
            'mostPosts' => $mostPosts,
            'roomnumber' => $s_roNum,
            'peoplenumber' => $p_Num,
            'startdate' => $startDate,
            'enddate' => $endDate,
            'place' => $place,
        ]);
    }

    /**
     * Show category blog posts.
     *
     */
    public function showCategory($id, Request $request)
    {
        $category = PostCategory::findOrFail($id);
        $posts = $category->posts()
            ->orderby('created_at', 'desc')
            ->paginate(10);
        $categories = PostCategory::get();
        $s_roNum = $request->session()->get('roomnumber');
        $p_Num = $request->session()->get('peoplenumber');
        $startDate = $request->session()->get('startDate');
        $endDate = $request->session()->get('endDate');
        $place = $request->session()->get('place');
        $mostPosts = Post::orderby('views', 'desc')
            ->limit(5)
            ->get();

        return view('category', [
            'category' => $category,
            'posts' => $posts,
            'categories' => $categories,
            'mostPosts' => $mostPosts,
            'roomnumber' => $s_roNum,
            'peoplenumber' => $p_Num,
            'startdate' => $startDate,
            'enddate' => $endDate,
            'place' => $place,
        ]);
    }

    public function storeComment(Request $request, $id)
    {
        $comment = new PostComment;
        $comment->user_id = \Auth::user()->id;
        $comment->post_id = $id;
        $comment->content = $request->get('content');
        $comment->save();

        return response()->view('partials.comment', [
            'comment' => $comment,
        ], 200);
    }

    /**
     * Display a FAQ.
     *
     */
    public function showQuestions()
    {
        $questions = Question::get();

        return view('question', [
            'questions' => $questions,
        ]);
    }

    /**
     * Display a 'Bidnii tuhai' page.
     *
     */
    public function showAbout()
    {
        $options = Option::get();
        $teams = Team::get();

        return view('about', [
            'options' => $options,
            'teams' => $teams,
        ]);
    }

    /**
     * Display a 'Uilchilgeenii nohtsol' page.
     *
     */
    public function showTerms()
    {
        $terms = Term::get();
        $latest = Term::orderby('updated_at', 'desc')
            ->first();

        return view('terms', [
            'terms' => $terms,
            'latest' => $latest,
        ]);
    }

    /**
     * Display a 'Holboo barih' page.
     *
     */
    public function showContact()
    {
        $options = Option::get();

        return view('contact', [
            'options' => $options,
        ]);
    }

    /**
     * Store 'Husel ilgeeh' form of 'Holboo barih' page.
     *
     */
    public function storeFeedback(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'name' => 'required',
            'content' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        $feedback = new Feedback;
        $feedback->email = $request->get('email');
        $feedback->name = $request->get('name');
        $feedback->content = $request->get('content');
        $feedback->save();

        return response()->json([
            'success' => true,
        ], 200);
    }

    public function aspac(Request $request)
    {
        \Session::put('locale', 'en');
        \App::setLocale('en');
        
        $startDate = Carbon::parse('2017-06-08')->format('m/d/Y');
        $endDate = Carbon::parse('2017-06-12')->format('m/d/Y');
        $s_roNum = 1;
        $p_Num = 1;
        $place = $request->session()->get('place');
        $request->session()->put('roomnumber', $s_roNum);
        $request->session()->put('startDate', $startDate);
        $request->session()->put('endDate', $endDate);
        $request->session()->put('peoplenumber', $p_Num);
        $request->session()->put('place', $place);
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
}
