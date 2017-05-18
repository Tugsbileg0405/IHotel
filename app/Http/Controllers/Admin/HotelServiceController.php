<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HotelService;
use App\HotelServiceCategory;
use Image;

class HotelServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $category = HotelServiceCategory::findOrFail($id);
        $services = $category->services()
            ->orderby('created_at', 'desc')
            ->paginate(20);

        return view('admin.hotelservice.table', [
            'category' => $category,
            'services' => $services,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $category = HotelServiceCategory::findOrFail($id);

        return view('admin.hotelservice.create', [
            'category' => $category,
            'icons' => $this->icons,
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
        $service = new HotelService;
        $service->service_category_id = $request->get('category');
        $service->name = $request->get('name');
        $service->name_en = $request->get('name_en');
        if ($request->has('icon')) {
            $service->icon = $request->get('icon');
        }
        else {
            $service->icon = 'setting';
        }
        $service->save();

        return redirect('profile/hotelservice/'.$service->service_category_id);
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
        $service = HotelService::findOrFail($id);

        return view('admin.hotelservice.update', [
            'service' => $service,
            'icons' => $this->icons,
        ]);
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
        $service = HotelService::findOrFail($id);
        $service->name = $request->get('name');
        $service->name_en = $request->get('name_en');
        $service->icon = $request->get('icon');
        $service->save();

        return redirect('profile/hotelservice/'.$service->service_category_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = HotelService::findOrFail($id);
        $service->hotels()->detach();
        $service->delete();

        return redirect('profile/hotelservice/'.$service->service_category_id);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $services = \App\HotelService::where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->view('admin.hotelservice.search', [
            'services' => $services,
        ], 200);
    }


    public $icons = ["add to calendar","alarm outline","alarm mute outline","alarm mute","alarm","at","browser","bug","calendar outline","calendar","checked calendar","cloud","code","comment outline","comment","comments outline","comments","copyright","creative commons","dashboard","delete calendar","external square","external","eyedropper","feed","find","hand pointer","hashtag","heartbeat","history","home","hourglass empty","hourglass end","hourglass full","hourglass half","hourglass start","idea","image","inbox","industry","lab","mail outline","mail square","mail","mouse pointer","options","paint brush","payment","percent","privacy","protect","registered","remove from calendar","search","setting","settings","shop","shopping bag","shopping basket","signal","sitemap","tag","tags","tasks","terminal","text telephone","ticket","trademark","trophy","wifi","add to cart","add user","adjust","archive","ban","bookmark","call","call square","clone","cloud download","cloud upload","talk","talk outline","compress","configure","download","edit","erase","exchange","expand","external share","filter","hide","in cart","lock","mail forward","object group","object ungroup","pin","print","random","recycle","refresh","remove bookmark","remove user","repeat","reply all","reply","retweet","send","send outline","share alternate","share alternate square","share","share square","sign in","sign out","theme","translate","undo","unhide","unlock alternate","unlock","upload","wait","wizard","write","write square","announcement","birthday:","help circle","help","info circle","info","warning circle","warning","warning sign","child","doctor","handicap","spy","student","user","users","female","gay","genderless","heterosexual","intergender","lesbian","male","man","neuter","non binary transgender","other gender horizontal","other gender","other gender vertical","transgender","woman","block layout","crop","grid layout","list layout","maximize","resize horizontal","resize vertical","zoom","zoom out","anchor","bar","bomb","book","bullseye","calculator","cocktail","diamond","fax","fire extinguisher","fire","flag checkered","flag","flag outline","gift","hand lizard","hand peace","hand paper","hand rock","hand scissors","hand spock","law","leaf","legal","lemon","life ring","lightning","magnet","money","moon","plane","puzzle","road","rocket","shipping","soccer","sticky note","sticky note outline","suitcase","sun","travel","treatment","umbrella","world","asterisk","certificate","circle","circle notched","circle thin","crosshairs","cube","cubes","ellipsis horizontal","ellipsis vertical","spinner","square","square outline","add circle","add square","check circle","check circle outline","check square","checkmark box","checkmark","minus circle","minus","minus square","minus square outline","move","plus","plus square outline","radio","remove circle","remove circle outline","remove","selected radio","toggle off","toggle on","area chart","bar chart","camera retro","film","line chart","newspaper","photo","pie chart","sound","angle double down","angle double left","angle double right","angle double up","angle down","angle left","angle right","angle up","arrow circle down","arrow circle left","arrow circle outline down","arrow circle outline left","arrow circle outline right","arrow circle outline up","arrow circle right","arrow circle up","arrow down","arrow left","arrow right","arrow up","caret down","caret left","caret right","caret up","chevron circle down","chevron circle left","chevron circle right","chevron circle up","chevron down","chevron left","chevron right","chevron up","long arrow down","long arrow left","long arrow right","long arrow up","pointing down","pointing left","pointing right","pointing up","toggle down","toggle left","toggle right","toggle up","tablet","battery empty","battery low","battery medium","battery high","battery full","disk outline","game","keyboard","laptop","plug","power","file audio outline","file code outline","file excel outline","file","file image outline","file outline","file pdf outline","file powerpoint outline","file text","file text outline","file video outline","file word outline","folder","folder open","folder open outline","folder outline","level down","level up","trash","trash outline","barcode","bluetooth alternative","bluetooth","css3","database","fork","html5","openid","qrcode","rss","rss square","server","usb","empty heart","empty star","frown","heart","meh","smile","star half empty","star half","star","thumbs down","thumbs outline down","thumbs outline up","thumbs up","backward","closed captioning","eject","fast backward","fast forward","forward","music","mute","pause circle","pause circle outline","pause","play","record","step backward","step forward","stop circle","stop circle outline","stop","unmute","video play","video play outline","volume down","volume off","volume up","bicycle","building","building outline","bus","car","coffee","compass","emergency","first aid","food","h","hospital","hotel","location arrow","map","map outline","map pin","map signs","marker","military","motorcycle","paw","ship","space shuttle","spoon","street view","subway","taxi","train","television","tree","university","columns","sort alphabet ascending","sort alphabet descending","sort ascending","sort content ascending","sort content descending","sort descending","sort","sort numeric ascending","sort numeric descending","table","align center","align justify","align left","align right","attach","bold","content","copy","cut","font","header","indent","italic","linkify","list","ordered list","outdent","paragraph","paste","save","strikethrough","subscript","superscript","text cursor","text height","text width","underline","unlinkify","unordered list","bitcoin","dollar","euro","lira","pound","ruble","rupee","shekel","won","yen","american express","credit card alternative","diners club","discover","google wallet","japan credit bureau","mastercard","paypal card","paypal","stripe","visa","asl interpreting","assistive listening systems","audio description","blind","braille","deafness","low vision","sign language","universal access","volume control phone"];
}
