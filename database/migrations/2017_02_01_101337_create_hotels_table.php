<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Intervention\Image\Facades\Image;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('name');
            $table->string('name_en')->nullable()->default(null);
            $table->integer('star');
            $table->integer('room_number');
            $table->string('website')->nullable()->default(null);
            $table->string('contact');
            $table->string('contact_en')->nullable()->default(null);
            $table->string('phone_number');
            $table->string('email');
            $table->text('address');
            $table->text('address_en')->nullable()->default(null);
            $table->text('introduction')->nullable()->default(null);
            $table->text('introduction_en')->nullable()->default(null);
            $table->boolean('is_child')->nullable()->default(null);
            $table->integer('is_internet')->nullable()->default(null);
            $table->string('cover_photo')->nullable()->default(null);
            $table->text('other_photos')->nullable()->default(null);
            $table->text('other_service')->nullable()->default(null);
            $table->text('other_service_en')->nullable()->default(null);
            $table->text('other_info')->nullable()->default(null);
            $table->text('other_info_en')->nullable()->default(null);
            $table->text('payment')->nullable()->default(null);
            $table->integer('co_day')->nullable()->default(null);
            $table->string('co_payment')->nullable()->default(null);
            $table->boolean('sale')->default(false);
            $table->text('location');
            $table->string('what3words')->nullable()->default(null);
            $table->string('what3words_en')->nullable()->default(null);
            $table->boolean('published')->default(false);
            $table->boolean('is_active')->default(true);
            $table->float('rating')->default(0);
            $table->integer('total_people')->nullable()->default(0);
            $table->integer('priority')->default(1);
            $table->integer('step');
            $table->string('key')->nullable()->default(null);
            $table->timestamps();
        });

        Schema::create('favorites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('hotel_id')->index();
            $table->unique(['user_id', 'hotel_id']);
            $table->timestamps();
        });

        $hotels = [
            [
                "objectId" => "2AnVllEkUT",
                "type" => "Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "asem" => 1,
                "min_rate" => 78,
                "name" => "Edelweiss Hotel",
                "updatedAt" => "2017-01-19T05:09:49.225Z",
                "status" => 0,
                "homepage" => 0,
                "createdAt" => "2016-05-05T11:21:56.570Z",
                "average_rate" => "59",
                "chain_name" => "",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.916938858716,
                    "longitude" => 106.92203521729
                ],
                "website" => "www.edelweiss.mn",
                "zipcode" => "212455",
                "phone" => "976-11312186,",
                "address" => "Chagdarjav street-20, Ulaanbaatar Mongolia",
                "city" => "Ulaanbaatar",
                "credit_card" => 0,
                "country" => "mn",
                "long_desc" => "Our experienced staffs are all professionally trained and speak in popular international languages of English and other foreign languages. It retains the personal feel of Mongolia whilst offering super service by hearts of friendly staffs.\r\nIt is a main landmark in the city center of Ulaanbaatar due to its convenient location close to the foreign embassies such as Czech Republic, Japan and South Korea, Chinggis Khaan Square, business and entertainment activities. \r\nWe may offer you delicious Mongolian and European cuisines, which prepared by our Master cooks. Our goal is to provide our guests with quick and friendly service. \r\nWe look forward to welcoming our guests from worldwide every day.",
                "section" => 7,
                "num_rooms" => 20,
                "short_desc" => "Edelweiss Hotel is 3 star hotel and it has been continuously serving business travelers and tourists since 1996.",
                "stars" => 3,
                "breakfast" => 1,
                "children" => 1,
                "parking" => 1,
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout"
                ],
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "breakfast_in_the_room"
                ],
                "others" => [
                    "all_spaces_non_smoking",
                    "heating"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry"
                ],
                "checkinend" => "00:00",
                "wifi" => 1,
                "checkout" => "09:00",
                "checkin" => "09:00",
                "cover_image" => "img/hotel/2016051005202282e57d6.jpg",
                "images" => [],
                "is_journalist" => 0
            ],
            [
                "objectId" => "2CgQ3IJmEd",
                "type" => "Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "homepage" => 1,
                "createdAt" => "2016-05-09T07:26:12.489Z",
                "status" => 0,
                "average_rate" => "123",
                "min_rate" => 84,
                "name" => "Khuvsgul Lake Hotel",
                "updatedAt" => "2017-03-10T04:16:31.030Z",
                "asem" => 1,
                "credit_card" => 0,
                "short_desc" => "Khuvsgul Lake Hotel is located in the very heart of capital city.",
                "address" => "\"City center\". Ikh Ezen Chinggis Khaan square 5, Bagatoiruu, Khoroo 8 , Sukhbaatar District, Ulaanbaatar, Mongolia",
                "zipcode" => "14200",
                "chain_name" => "",
                "long_desc" => "Welcome to Khuvsgul Lake Hotel. \r\nOur brand new opening hotel is located in the heart of the Ulaanbaatar city just steps away from the main square “Great Chinggis Khaan square”. We are perfectly centered in downtown, where you will find yourself surrounded by city’s best attractions like Parliament House, Opera House, Central Post Office, “Central Tower” Business and Shopping Mall and Banks. \r\nName from biggest and purest Lake of Mongolian “Khuvsgul Lake” Hotel which 25-storey building offer you equivalent to 3 star hotel service 5 different types 150 non-smoking comfortable rooms with wonderful panoramic views, flexible price and satisfied services can express you the new modern Mongolia. \r\nOur staff truly cares about all your accommodation needs making your visit comfortable and memorable with our warm smiles and friendly service. You are in right because hotel is within easy walking distance to the business and leisure crossroads of the city and this our superiority.\r\nA warm welcome awaits you at our hotel.\r\nKhuvsgul lake hotel is a 14km from Chinggis Khaan International Airport, 5km from International Train Station, 8km from Western distance Domestic Transportation Center, and 6km from Easter distance Domestic Transportation Center. \r\n",
                "stars" => 3,
                "section" => 7,
                "country" => "mn",
                "num_rooms" => 50,
                "phone" => "976-329177",
                "website" => "",
                "city" => "Ulaanbaatar",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.919298876098,
                    "longitude" => 106.92073971033
                ],
                "checkinend" => "15:00",
                "pets" => 0,
                "children" => 0,
                "parking" => 1,
                "others" => [
                    "all_spaces_non_smoking",
                    "non_smoking_rooms",
                    "elevator",
                    "heating"
                ],
                "checkout" => "09:00",
                "food_drink" => [
                    "restraurant",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "baggage_storage"
                ],
                "wifi" => 1,
                "breakfast" => 1,
                "checkin" => "14:00",
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "images" => [
                    "img/hotel/2750e4e.jpg",
                    "img/hotel/322a8f9.jpg",
                    "img/hotel/df085d9.jpg"
                ],
                "cover_image" => "img/hotel/f949163.jpg",
                "is_journalist" => 0
            ],
            [
                "objectId" => "6VSsxUSqRr",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "createdAt" => "2016-05-10T02:06:50.703Z",
                "asem" => 0,
                "min_rate" => 334000,
                "name" => "Баянгол зочид буудал",
                "status" => 0,
                "updatedAt" => "2017-01-10T15:46:25.646Z",
                "homepage" => 0,
                "type" => "Hotel",
                "average_rate" => "13",
                "country" => "mn",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "section" => 7,
                "website" => "www.bayangolhotel.mn",
                "num_rooms" => 211,
                "credit_card" => 0,
                "zipcode" => "14251",
                "long_desc" => "Монголын аялал жуулчлал, зочид буудал, үйлчилгээний салбарын түүхэн хөгжилд томоохон үүрэгтэй “Баянгол зочид буудал” нь 1964 онд үүсэн байгуулагдсан. Засгийн Газрын өмч хувьчлалаар 1991 онд “Баянгол зочид буудал” ХК хувийн хэвшлийн аж ахуй болон өөрчлөгдөж, анхны хувьчлагдсан зочид буудал болсон байна.\r\nБаянгол зочид буудал нь 4 одны зэрэглэлтэй, голчлон бизнес ангиллын зочид төлөөлөгчид, жуулчдыг хүлээн авч үйлчлэхийн зэрэгцээ 211 өрөөнд 360 зочин хүлээн авах боломжтой. Мөн 50-400 хүн хүлээн авах багтаамжтай лоунж, ресторан, кофе шоп ажилладаг.\r\nЗочид буудлын хэмжээнд нийт 5 ресторан үйл ажиллагаа явуулж байна:    \r\n“Баянгол ресторан”- Ази – Европ хоолны ресторан\tСуугаа 200-350 хүн, Босоо – 400 хүн\r\n“Монголын нэг өдөр” - Монгол хоолны ресторан  \tСуугаа 80 хүн,Босоо - 100 хүн\r\n\"Дээд зэрэглэлийн виноны “Wine House” ресторан\t60 хүн\r\n\"Bellagio-Вьетнам Үндэсний хоолны ресторан \t60хүн\r\n\"Касабланка –Ази, Сингапур хоолны ресторан\t100хүн\r\n                                                          МАНАЙ ҮЙЛЧИЛГЭЭНИЙ ДАВУУ ТАЛ\r\n-Буудлын бүх хэсэгт өндөр хурдны Wi-Fi интернетэд холбогдох боломжтой\r\n-Хотын төвд байршилтай, Богд Уул, Соёл амралтын хүрээлэн болон Хотын төвийг харах боломж\r\n-Улаанбаатар хотын хамгийн том автомашины зогсоолтой зочид буудал\r\n-Баянгол зочид буудал 360 хүнийг байрлуулах 211 буудлын өрөө болон 400 хүртэлх хүний хүлээн авалт зохион байгуулах ресторантай\r\n-Бүх өрөөнүүд олон улсын суваг бүхий кабелийн телевиз\r\n-Өрөөнөөсөө дэлхийн аль ч улс орон руу ярих боломжтой\r\n-Монгол, Европ, Сингапур, Вьетнам үндэсний зоог болон бусад олон төрлийн амтлаг хоол, ундааны сонголтыг санал   болгодог. \r\n-Бүх өрөө Air Condition-той\r\n-Олон улсын чанар стандартад нийцсэн өргөн сонголт бүхий Өглөөний цайны буффет\r\n-50 жилийн түүхтэй Баянгол зочид буудлын мэргэжлийн туршлагатай хамт олон танд үйлчлэх болно",
                "stars" => 4,
                "chain_name" => "",
                "phone" => "976-11312255",
                "short_desc" => "Баянгол зочид буудал нь  бизнес, соёл урлаг, худалдааны төвүүдэд ойрхон хотын төвийн А зэрэглэлийн бүсэд оршдог ",
                "city" => "Ulaanbaatar",
                "address" => "Баянгол Зочид буудал, Чингис Хааны өргөн чөлөө – 5, Улаанбаатар, Монгол Улс",
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "checkin" => "09:00",
                "checkout" => "09:00",
                "children" => 0,
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "parking" => 1,
                "checkinend" => "00:00",
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "ticket_service",
                    "tour_desk",
                    "currency_exchange",
                    "baggage_storage",
                    "lockers"
                ],
                "others" => [
                    "all_spaces_non_smoking",
                    "non_smoking_rooms",
                    "elevator",
                    "air_conditioning",
                    "heating"
                ],
                "wifi" => 1,
                "breakfast" => 1,
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "bar",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "shops" => [
                    "shops_onsite",
                    "hair_beauty_salon"
                ],
                "pets" => 0,
                "cover_image" => "img/hotel/201605092334394b6d245.jpg",
                "images" => [
                    "img/hotel/201605092334390.jpg",
                    "img/hotel/201605092334391.jpg",
                    "img/hotel/201605092334392.jpg",
                    "img/hotel/201605092334393.jpg",
                    "img/hotel/201605092334394.jpg",
                    "img/hotel/201605092334395.jpg",
                    "img/hotel/201605092334396.jpg",
                    "img/hotel/201605092334397.jpg",
                    "img/hotel/201605092334398.jpg",
                    "img/hotel/201605092334399.jpg"
                ],
                "is_journalist" => 1
            ],
            [
                "objectId" => "8dQe8e3Xns",
                "createdAt" => "2016-01-26T17:37:44.047Z",
                "name" => "Золо зочид буудал",
                "average_rate" => "92",
                "status" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "updatedAt" => "2017-01-10T15:03:34.664Z",
                "homepage" => 1,
                "type" => "Hotel",
                "website" => "www.zolostar.mn",
                "long_desc" => "Золо зочид буудал нь орчин үеийн шийдэл бүхий тавилга, олон улсын гарцтай телефон утас, кабелийн суваг, мини бар, интернет холболт, агааржуулагчаар бүрэн тоноглогдсон нийт 24 өрөөтэй. \r\nЭлэгсэг дотно харьцаатай ажилчид таныг хүлээн авч чин сэтгэлээсээ үйлчлэх болно. \r\nТа Золо зочид буудалд үйлчлүүлснээр хөнгөн шуурхай найрсаг үйлчилгээг авхаас гадна олон зочид манай зочид буудалд үйлчлүүлхийг хүсдэгийг ойлгох болно.",
                "chain_name" => "",
                "credit_card" => 0,
                "stars" => 4,
                "short_desc" => "Зочид буудлын ойролцоо цирк 0,6 км, их дэлгүүр 1 милл, жуулчдад үйлчлэх төв 0,5 милл, гандан 1миллийн зайтай байрладаг",
                "num_rooms" => 24,
                "city" => "Ulaanbaatar",
                "zipcode" => "014253",
                "country" => "mn",
                "section" => 7,
                "phone" => "+976 70111407",
                "address" => "Сүхбаатар дүүрэг, Нарны зам, 3-р хороо",
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "currency_exchange",
                    "atm_on_site",
                    "baggage_storage",
                    "safe"
                ],
                "pets" => 0,
                "checkinend" => "00:00",
                "transportation" => [
                    "airport_shuttle_surcharge",
                    "shuttle_service_charge"
                ],
                "others" => [
                    "all_spaces_non_smoking",
                    "non_smoking_rooms",
                    "elevator",
                    "heating"
                ],
                "entertainment" => [
                    "karoake"
                ],
                "wifi" => 1,
                "checkin" => "09:00",
                "children" => 0,
                "pool_spa" => [
                    "fitness_center"
                ],
                "parking" => 1,
                "breakfast" => 1,
                "checkout" => "09:00",
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "bar",
                    "packed_lunch",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "shoeshine"
                ],
                "images" => [
                    "img/hotel/618b14d0.png"
                ],
                "cover_image" => "img/hotel/57759b80.png",
                "asem" => 0,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.90825,
                    "longitude" => 106.87287569046
                ],
                "email" => "info@ihotel.mn",
                "min_rate" => 65,
                "pool" => 0,
                "fitness" => 0,
                "saun" => 0,
                "sold_out" => 0,
                "is_journalist" => 0
            ],
            [
                "objectId" => "90bC0pQE8Z",
                "name" => "Kaiser Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "updatedAt" => "2017-03-03T08:35:21.425Z",
                "average_rate" => "13",
                "homepage" => 0,
                "type" => "Hotel",
                "min_rate" => 95,
                "status" => 1,
                "createdAt" => "2016-04-27T11:02:09.118Z",
                "asem" => 1,
                "short_desc" => " Located at the central area of Ulaanbaatar, Kaiser Hotel is an 8-minute walking away from Parliament House of Mongolia ",
                "city" => "Ulaanbaatar",
                "zipcode" => "212513",
                "long_desc" => "Located at the central area of Ulaanbaatar, Kaiser Hotel is an 8-minute walking away from Parliament House of Mongolia and Sukhbaatar Square. Renovated in April 2013, it provides homely accommodation with free Wi-Fi in all areas. The hotel provides airport shuttle services at an extra charge.\r\n\r\nKaiser Hotel is 1.5 km to the Natural History Museum of Mongolia and 5 km from Ulaanbaatar Train Station. Chinggis Khaan International Airport is 15 km away.\r\n\r\nRooms at Kaiser are equipped with a TV and minibar. En suite bathrooms come with a shower and toiletries.\r\n\r\nGuests can play a game of billiards or make sightseeing and ticketing arrangements at the tour desk. Laundry services are available. Free private parking is possible on site.\r\n\r\nA variety of European and Mongolian dishes are provided at the restaurant of Kaiser. Breakfast can be enjoyed in the rooms as well. ",
                "website" => "",
                "phone" => "+976 11315424",
                "credit_card" => 0,
                "chain_name" => "",
                "country" => "mn",
                "section" => 7,
                "address" => " Peace avenue 10-2B 1st khoroo, Sukhbaatar district, Sukhbaatar,  Ulaanbaatar, Mongolia",
                "num_rooms" => 26,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.916744713677,
                    "longitude" => 106.91363990307
                ],
                "stars" => 3,
                "checkinend" => "00:00",
                "checkout" => "09:00",
                "others" => [
                    "non_smoking_rooms",
                    "heating"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "express_checkin_checkout",
                    "tour_desk",
                    "baggage_storage"
                ],
                "breakfast" => 1,
                "parking" => 1,
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "pets" => 0,
                "wifi" => 1,
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "breakfast_in_the_room"
                ],
                "children" => 0,
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "shoeshine"
                ],
                "checkin" => "09:00",
                "cover_image" => "img/hotel/8a6444f6.png",
                "images" => [
                    "img/hotel/9c22da90.png",
                    "img/hotel/226ef231.png",
                    "img/hotel/cee2d1f2.png",
                    "img/hotel/8b7e5043.png",
                    "img/hotel/3699d924.png",
                    "img/hotel/4c1e95b5.png",
                    "img/hotel/3dbdd1a6.png"
                ],
                "is_journalist" => 0
            ],
            [
                "objectId" => "CWjIspaaEA",
                "average_rate" => "63",
                "name" => "San Hotel ",
                "status" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "createdAt" => "2016-01-26T16:57:49.947Z",
                "updatedAt" => "2017-01-10T14:46:52.498Z",
                "homepage" => 0,
                "type" => "Hotel",
                "stars" => 3,
                "num_rooms" => 21,
                "credit_card" => 0,
                "city" => "Ulaanbaatar",
                "chain_name" => "",
                "long_desc" => "Just 5 minutes' stroll away from Sukhbaatar Square, San hotel is conveniently located in Ulaanbaatar. Free WiFi access is available in all areas.\r\n\r\nThe hotel is 700 m from Ulaanbaatar Opera House and National Museum of Mongolian History. Chinggis Khaan International Airport is 14 km away.\r\n\r\nDecorated in a classy style, each room is fitted with a minibar, a writing desk and a sofa. Complete with a refrigerator, the dining area also has an electric kettle. The bathroom attached is fully stocked with a hairdryer, slippers and free toiletries. You can enjoy a mountain view and a city view from the room window.\r\n\r\nLight bites can be savoured at the on-site bar. Staff at the tour desk can assist with sightseeing arrangements. Luggage storage is available at the front desk. \r\n\r\nWe speak your language!",
                "country" => "mn",
                "website" => "",
                "phone" => "+976 11320439",
                "zipcode" => "015140",
                "section" => 7,
                "address" => " San Hotel, 6th khoroo, Chingeltei, Ulaanbaatar, Chingelte",
                "short_desc" => "Just 5 minutes' stroll away from Sukhbaatar Square, San hotel is conveniently located in Ulaanbaatar. ",
                "breakfast" => 1,
                "pets" => 0,
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "baggage_storage"
                ],
                "checkout" => "10:00",
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "bar",
                    "packed_lunch",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "entertainment" => [
                    "karoake"
                ],
                "checkinend" => "23:30",
                "others" => [
                    "all_spaces_non_smoking",
                    "non_smoking_rooms",
                    "heating"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge",
                    "shuttle_service_charge"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "shoeshine"
                ],
                "wifi" => 1,
                "checkin" => "10:00",
                "parking" => 1,
                "children" => 1,
                "images" => [
                    "img/hotel/dd768fa0.png",
                    "img/hotel/7e3ad821.png",
                    "img/hotel/9c83fc62.png"
                ],
                "cover_image" => "img/hotel/eec5dac2.png",
                "asem" => 0,
                "email" => "info@ihotel.mn",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.913591,
                    "longitude" => 106.908243
                ],
                "fitness" => 0,
                "saun" => 0,
                "pool" => 0,
                "min_rate" => 45,
                "sold_out" => 0,
                "is_journalist" => 0
            ],
            [
                "objectId" => "DNFQck6Lkp",
                "asem" => 1,
                "createdAt" => "2016-05-26T05:13:36.866Z",
                "name" => "Flower Hotel ",
                "type" => "Hotel",
                "updatedAt" => "2017-04-01T06:29:03.712Z",
                "min_rate" => 134,
                "status" => 0,
                "average_rate" => "10",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "homepage" => 0,
                "city" => "Ulaanbaatar",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.924491973305,
                    "longitude" => 106.93817138672
                ],
                "zipcode" => "001334",
                "num_rooms" => 180,
                "address" => " Zaluuchuud Avenue, 18, Bayanzurkh,Ulaanbaatar, Mongolia",
                "phone" => "976-11458330",
                "short_desc" => "Chinggis Khan Statue is 1.6 km from Flower Hotel Ulaanbaatar, while National Museum of Mongolian History is 1.7 km ",
                "long_desc" => "Flower Hotel has three stars and capable of hosting 330 guests in 180 standard, semi-lux and deluxe rooms. The hotel is centrally located in the middle of poplar trees on the top of a hill yet away from the traffic noise of the city while spectacular views of Bogd Khaan Mountain Range poses to the south. The hotel is located within 20 minutes car ride from the Chinggis Khaan International Airport while the central train station is within less than ten minutes driving when traffic is less busy. The city’s main land mark of Sukhbaatar square, business and shopping centres, theatres, museums and galleries are all within 20 minutes walking distance from the hotel.\r\n\r\nOur experienced staffs are all professionally trained and speak in popular international languages of English, Japanese, Chinese and Russian.  So you can feel at home in Flower Hotel while you are being served by our friendly staff. Thus we were selected one of the best customer oriented hotels in Ulaanbaatar by the Hotel Association in Mongolia.\r\n",
                "section" => 7,
                "credit_card" => 0,
                "website" => "www.flower-hotel.mn",
                "chain_name" => "",
                "country" => "mn",
                "stars" => 3,
                "breakfast" => 1,
                "wifi" => 1,
                "checkin" => "09:00",
                "parking" => 1,
                "children" => 0,
                "checkout" => "09:00",
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry"
                ],
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "hot_tub",
                    "massage"
                ],
                "checkinend" => "00:00",
                "common_area" => [
                    "shared_lounge_tv_area"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "express_checkin_checkout",
                    "baggage_storage",
                    "lockers"
                ],
                "others" => [
                    "all_spaces_non_smoking",
                    "non_smoking_rooms",
                    "elevator",
                    "heating"
                ],
                "food_drink" => [
                    "restraurant",
                    "buffet_style_restraurant",
                    "bar",
                    "room_service"
                ],
                "shops" => [
                    "souviner_gift_shop"
                ],
                "pets" => 0,
                "entertainment" => [
                    "karoake"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "cover_image" => "img/hotel/e8538d4.jpg",
                "images" => [
                    "img/hotel/3000131.jpg",
                    "img/hotel/7179319.jpg",
                    "img/hotel/eb5be30.jpg",
                    "img/hotel/aa114e3.jpg",
                    "img/hotel/98cf450.jpg",
                    "img/hotel/8b2206d.jpg",
                    "img/hotel/eede5f9.jpg",
                    "img/hotel/b2fce26.jpg"
                ],
                "is_journalist" => 1,
                "cancelation" => 1
            ],
            [
                "objectId" => "F5TeR4VGpi",
                "createdAt" => "2016-03-14T10:14:17.060Z",
                "status" => 1,
                "type" => "Hotel",
                "name" => "UB City Hotel",
                "asem" => 1,
                "average_rate" => "34",
                "homepage" => 0,
                "min_rate" => 80,
                "updatedAt" => "2017-01-13T05:59:00.335Z",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "num_rooms" => 31,
                "stars" => 4,
                "phone" => "+976 70137788",
                "zipcode" => "212513",
                "country" => "mn",
                "credit_card" => 0,
                "website" => "",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.900218144033,
                    "longitude" => 106.90212249756
                ],
                "city" => "Ulaanbaatar",
                "chain_name" => "",
                "long_desc" => "Offering mountain views, all rooms come with a cable TV, a minibar and air conditioning. There is a kitchenette with a microwave and a refrigerator. Featuring a hairdryer, private bathrooms also come with a bathrobe and slippers.\r\n\r\nAt UB City Hotel you will find a 24-hour front desk. Other facilities offered include luggage storage. The property offers free parking.\r\n\r\nCity UB Hotel is 2.1 km from Zaisan Memorial and 2.3 km from Zanabazar Museum of Fine Arts. Chinggis Khaan International Airport is 12 km away. \r\n",
                "address" => " Chinggis avenue, second khoroo, Ulaanbaatar city, Mongolia,",
                "short_desc" => "UB City Hotel is located in Ulaanbaatar, a 4-minute drive National Stadium",
                "section" => 7,
                "checkin" => "09:00",
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center"
                ],
                "common_area" => [
                    "sun_deck",
                    "shared_kitchen"
                ],
                "checkinend" => "12:30",
                "children" => 1,
                "pool_spa" => [
                    "outdoor_pool",
                    "outdoor_pool_seasonal"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "concierge_service",
                    "currency_exchange",
                    "lockers"
                ],
                "entertainment" => [
                    "evening_entertainment",
                    "entertainment_staff"
                ],
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "buffet_style_restraurant",
                    "special_diet_meal",
                    "breakfast_in_the_room"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping"
                ],
                "pets" => 0,
                "breakfast" => 1,
                "checkout" => "09:00",
                "activities" => [
                    "ping_pong",
                    "darts",
                    "racquetball"
                ],
                "wifi" => 1,
                "transportation" => [
                    "airport_shuttle_surcharge",
                    "shuttle_service_charge"
                ],
                "parking" => 1,
                "images" => [
                    "img/hotel/6bec9800.png",
                    "img/hotel/ff840801.png",
                    "img/hotel/6b4447d2.png",
                    "img/hotel/1a8a8363.png",
                    "img/hotel/85124124.png",
                    "img/hotel/c4a7b5c5.png",
                    "img/hotel/bb8780a6.png"
                ],
                "cover_image" => "img/hotel/e6fdd626.png",
                "others" => [
                    "all_spaces_non_smoking",
                    "designated_smoking_area",
                    "elevator",
                    "air_conditioning",
                    "heating"
                ],
                "fitness" => 0,
                "saun" => 0,
                "pool" => 0,
                "sold_out" => 0,
                "is_journalist" => 0
            ],
            [
                "objectId" => "GZkZUYe4Rr",
                "asem" => 1,
                "status" => 0,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "average_rate" => "15",
                "homepage" => 0,
                "createdAt" => "2017-01-10T15:44:58.899Z",
                "min_rate" => 160,
                "updatedAt" => "2017-01-17T15:28:56.078Z",
                "name" => "Holiday Inn Ulaanbaatar",
                "type" => "Hotel",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.922122980861,
                    "longitude" => 106.90144658089
                ],
                "section" => 7,
                "country" => "mn",
                "phone" => "+97699066350",
                "credit_card" => 0,
                "website" => "ihotel.mn",
                "short_desc" => "Holiday Inn Ulaanbaatar features a restaurant and free WiFi.",
                "address" => "Sambuu Street 24, Chingeltei, 151410 Ulaanbaatar, Mongolia",
                "zipcode" => "151410",
                "stars" => 5,
                "num_rooms" => 169,
                "long_desc" => "Located 300 m from Ulaanbaatar Opera House in Ulaanbaatar, Holiday Inn Ulaanbaatar features a restaurant and free WiFi. Guests can enjoy the on-site restaurant.\r\n\r\nEach room has a flat-screen TV. Some rooms have a sitting area where you can relax.\r\n\r\nYou will find a 24-hour front desk at the property.\r\n\r\nNational Museum of Mongolian History is 1.1 km from Holiday Inn Ulaanbaatar, and Sukhbaatar Square is 1.1 km from the property. Chinggis Khaan International Airport is 12.9 km away.\r\n\r\nChingeltei is a great choice for travelers interested in shopping, food and scenery.\r\n\r\nWe speak your language! ",
                "city" => "Ulaanbaatar",
                "chain_name" => "",
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "fax_photocopying"
                ],
                "pets" => 0,
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "concierge_service",
                    "currency_exchange",
                    "atm_on_site",
                    "baggage_storage",
                    "newspapers"
                ],
                "checkin" => "12:00",
                "parking" => 1,
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "fitness_center"
                ],
                "checkout" => "11:00",
                "wifi" => 1,
                "breakfast" => 1,
                "children" => 1,
                "checkinend" => "14:00",
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "suitpress"
                ],
                "common_area" => [
                    "shared_lounge_tv_area"
                ],
                "food_drink" => [
                    "restraurant_dining_menu",
                    "buffet_style_restraurant",
                    "packed_lunch",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "others" => [
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "facilities_for_disabled_guests",
                    "elevator",
                    "air_conditioning",
                    "heating"
                ],
                "cover_image" => "img/hotel/7316499.jpg",
                "images" => [
                    "img/hotel/7096828.jpg",
                    "img/hotel/c461c6f.jpg",
                    "img/hotel/fd17775.jpg"
                ],
                "hq" => 0
            ],
            [
                "objectId" => "HCjbe1jlDz",
                "asem" => 1,
                "status" => 0,
                "createdAt" => "2017-01-10T13:46:09.961Z",
                "name" => "Corporate",
                "min_rate" => 220,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "average_rate" => "7",
                "homepage" => 0,
                "type" => "Hotel",
                "updatedAt" => "2017-01-11T03:30:24.741Z",
                "city" => "Ulaanbaatar",
                "country" => "mn",
                "website" => "ihotel.mn",
                "long_desc" => "Corporate Hotel is located 800 m from the National Amusement Park and 3 km from Ulaanbaatar Railway Station. This 4-star property offers a fitness centre, a spa and free parking. Free Wi-Fi access is provided in all hotel rooms. Hotel Corporate is 15 km from the Chinggis Khaan International Airport.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.913113348146,
                    "longitude" => 106.9140958786
                ],
                "address" => "NO. 9-2 Chinggis Avenue , Sukhbaatar, 210645 Ulaanbaatar, Mongolia",
                "zipcode" => "210645",
                "phone" => "97699066350",
                "stars" => 4,
                "short_desc" => "This 4-star property offers a fitness centre, a spa and free parking.",
                "chain_name" => "Corporate Hotel",
                "num_rooms" => 55,
                "section" => 5,
                "credit_card" => 1,
                "shops" => [
                    "shops_onsite",
                    "hair_beauty_salon"
                ],
                "checkinend" => "23:00",
                "checkout" => "12:00",
                "transportation" => [
                    "airport_shuttle_surcharge",
                    "shuttle_service_charge"
                ],
                "wifi" => 1,
                "others" => [
                    "non_smoking_rooms",
                    "elevator",
                    "soundproof_rooms",
                    "air_conditioning",
                    "heating"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "fax_photocopying"
                ],
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "fitness_center",
                    "massage"
                ],
                "parking" => 1,
                "pets" => 0,
                "children" => 1,
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "checkin" => "13:00",
                "front_desk" => [
                    "24_hour_front_desk",
                    "currency_exchange",
                    "baggage_storage",
                    "lockers",
                    "safe",
                    "newspapers"
                ],
                "breakfast" => 0,
                "cover_image" => "img/hotel/34d2b5c.jpg",
                "hq" => 0
            ],
            [
                "objectId" => "IdSnu9yQhT",
                "createdAt" => "2016-01-25T10:17:10.239Z",
                "status" => 1,
                "updatedAt" => "2016-05-30T01:56:40.223Z",
                "average_rate" => "106",
                "homepage" => 0,
                "name" => "Sant Asar Hotel",
                "type" => "Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "section" => 7,
                "website" => "",
                "stars" => 3,
                "city" => "Ulaanbaatar",
                "long_desc" => "Chinggis Khaan International Airport is 13 km away.\r\n\r\nEach soundproofed room at this hotel features a flat-screen cable satellite TV and seating area with a sofa and a work desk. Rooms include a refrigerator and a minibar. The en suite bathrooms provide free toiletries, guest robes, slippers and a hairdryer.\r\n\r\nAt Sant Asar Hotel you will find a 24-hour front desk, a terrace and a bar which features karaoke. Other facilities offered at the property include grocery deliveries, a tour desk and luggage storage. The property offers free parking.\r\n\r\nThe hotel is 800 m from Ulaanbaatar Opera House, 900 m from Memorial Museum of Victims of Political Persecution and 900 m from the Chinggis Khaan Statue. \r\n\r\nSukhbaatar is a great choice for travellers interested in nature, culture and friendly people.\r\n\r\nWe speak your language!",
                "num_rooms" => 25,
                "chain_name" => "",
                "country" => "mn",
                "zipcode" => "014251",
                "address" => " Sukhbaatar disctict, 2nd khoroo, Seoul street, Sukhbaatar",
                "short_desc" => "Offering a restaurant which serves western cuisine, Sant Asar Hotel is located in Ulaanbaatar. Free WiFi",
                "credit_card" => 0,
                "phone" => "+976 11315152",
                "wifi" => 1,
                "front_desk" => [
                    "24_hour_front_desk",
                    "currency_exchange",
                    "baggage_storage"
                ],
                "activities" => [
                    "darts"
                ],
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "packed_lunch",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "shoeshine"
                ],
                "breakfast" => 1,
                "entertainment" => [
                    "karoake"
                ],
                "others" => [
                    "all_spaces_non_smoking",
                    "non_smoking_rooms",
                    "soundproof_rooms",
                    "heating"
                ],
                "checkout" => "10:00",
                "checkin" => "10:00",
                "checkinend" => "23:00",
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "transportation" => [
                    "airport_shuttle_surcharge",
                    "shuttle_service_charge"
                ],
                "common_area" => [
                    "shared_lounge_tv_area"
                ],
                "images" => [
                    "img/hotel/f6379c20.png",
                    "img/hotel/07308f21.png",
                    "img/hotel/faba9f52.png"
                ],
                "cover_image" => "img/hotel/4cba8eb2.png",
                "asem" => 1,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.913852,
                    "longitude" => 106.908804
                ],
                "email" => "info@ihotel.mn",
                "fitness" => 0,
                "saun" => 0,
                "pool" => 0,
                "min_rate" => 69,
                "sold_out" => 0,
                "is_journalist" => 0
            ],
            [
                "objectId" => "Jv9Bt7F5gS",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "homepage" => 1,
                "min_rate" => 1000000,
                "type" => "Hotel",
                "asem" => 1,
                "updatedAt" => "2017-04-01T06:26:25.071Z",
                "average_rate" => "10",
                "name" => "The Corporate Hotel and Convention Centre",
                "createdAt" => "2017-01-10T13:23:43.217Z",
                "status" => 0,
                "stars" => 5,
                "short_desc" => "Offering an indoor pool and a spa and wellness centre",
                "zipcode" => "976",
                "address" => " Mahatma Gandhi street-39, 212513 Ulaanbaatar, Mongolia",
                "long_desc" => "Offering an indoor pool and a spa and wellness centre, The Corporate Hotel and Convention Centre is located in Ulaanbaatar. Free Wi-Fi access is available.\r\n\r\nEach room here will provide you with a TV, air conditioning and a hot tub. Featuring a shower, private bathroom also comes with a bath and a hairdryer. Extras include a minibar and a seating area.\r\n\r\nAt The Corporate Hotel and Convention Centre you will find a restaurant and a fitness centre. Others offered at the property include meeting facilities, luggage storage and an ironing service. The property offers free parking.\r\n\r\nThe Corporate Hotel and Convention Centre is a 10-minute walk from National Stadium and a 20-minute walk from National Park. Ulaanbaatar International Airport is about 40 minutes' drive away.",
                "section" => 1,
                "country" => "mn",
                "num_rooms" => 94,
                "chain_name" => "The Corporate Hotel and Convention Centre",
                "city" => "Ulaanbaatar",
                "website" => "ihotel.mn",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "credit_card" => 1,
                "phone" => "+97699066350",
                "hq" => 1,
                "hq_star" => 1,
                "cancelation" => ""
            ],
            [
                "objectId" => "KT9mMO9v30",
                "homepage" => 0,
                "type" => "Hotel",
                "createdAt" => "2017-01-10T15:14:34.430Z",
                "status" => 1,
                "min_rate" => 200,
                "updatedAt" => "2017-05-05T08:34:06.469Z",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "average_rate" => "332",
                "name" => "The Blue Sky Hotel and Tower ",
                "address" => " Peace Avenue 17,Sukhbaatar District,1st Quarter, Sukhbaatar, Ulaanbaatar, Mongolia",
                "website" => "",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.916471471276,
                    "longitude" => 106.91779196262
                ],
                "stars" => 5,
                "section" => 7,
                "zipcode" => "212513",
                "city" => "Ulaanbaatar",
                "num_rooms" => 200,
                "short_desc" => "It is a 20-minute drive from Ulaanbaatar Railway Station. National Amusement Park is a 7-minute drive away.",
                "chain_name" => "Blue Sky Tower",
                "credit_card" => 0,
                "phone" => "99066350",
                "long_desc" => "Housed in the tallest building in Ulaanbaatar, the 5-star luxurious The Blue Sky Hotel and Tower is located in the very centre of Ulaanbaatar city. It boasts an indoor pool and a wellness centre. Featuring free Wi-Fi in all areas, all upscale rooms come with European-style decoration and modern interiors. On-site parking is free.\r\n\r\nOverlooking the Sukhbaatar Square, Blue sky hotel is located next to Sukhbaatar Square. It is a 20-minute drive from Ulaanbaatar Railway Station. National Amusement Park is a 7-minute drive away.\r\n\r\nAll rooms are fitted with a flat-screen TV, a minibar and a safety deposit box. En suite bathrooms include both a bathtub and shower facilities. Free toiletries, hairdryers and slippers are also included.\r\n\r\nGuests can work out at the gym, laze in the sauna, or check emails at the business centre. Car rentals, currency exchange and laundry services are also available. Luggage storage and safety deposit box are available at the 24-hour front desk.\r\n\r\nCantonese dishes can be enjoyed at the Jade Palace, while Japanese food are offered at Zen. Other dining options include a Korean restaurant Le Seoul and Seasons All day dining Restaurant with Western speciality classic cuisines. \r\n\r\nSukhbaatar is a great choice for travelers interested in tours, history and scenery.\r\n\r\nThis is our guests' favorite part of Ulaanbaatar, according to independent reviews.\r\n\r\nThis property also has one of the top-rated locations in Ulaanbaatar! Guests are happier about it compared to other properties in the area.",
                "country" => "mn",
                "checkout" => "09:00",
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "bar",
                    "packed_lunch",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "common_area" => [
                    "shared_lounge_tv_area"
                ],
                "pets" => 0,
                "others" => [
                    "elevator",
                    "heating"
                ],
                "children" => 1,
                "wifi" => 1,
                "checkinend" => "13:00",
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "baggage_storage"
                ],
                "checkin" => "09:00",
                "breakfast" => 1,
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "parking" => 1,
                "pool_spa" => [
                    "indoor_pool",
                    "spa",
                    "sauna",
                    "fitness_center",
                    "hot_spring_bath",
                    "massage"
                ],
                "cover_image" => "img/hotel/d1805a7.jpg",
                "images" => [
                    "img/hotel/bbe7089.jpg",
                    "img/hotel/0c518b8.jpg",
                    "img/hotel/00bc872.jpg"
                ],
                "hq" => 0,
                "cancelation" => 1
            ],
            [
                "objectId" => "KewVbvwQLn",
                "homepage" => 0,
                "createdAt" => "2016-05-06T08:59:05.111Z",
                "updatedAt" => "2017-01-19T05:10:05.399Z",
                "asem" => 0,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 70600,
                "status" => 0,
                "type" => "Hotel",
                "average_rate" => "11",
                "name" => "Evergreen Hotel",
                "phone" => "976-21252140",
                "short_desc" => "Эвэргрийн зочид буудал нь орчин үеийн шийдэл бүхий тохилог 25 өрөө, ресторан, караоке, саун зэргээр үйлчилж байна. ",
                "long_desc" => "Эвэргрийн зочид буудал нь анх 2006 оны 6-р сард байгуулагдсан бөгөөд орчин үеийн шийдэл бүхий тохилог нийт 25 өрөө, Европ болон Монгол хоолны ресторан, караоке, VIP өрөө, саун зэрэг хэрэглэгчдийн тав тух хэрэгцээг хангасан тансаг орчинд цогц үйлчилгээг гэн дор үзүүлхээр хичээнэ ажилладаг.\r\n\r\n",
                "city" => "Ulaanbaatar",
                "address" => "Teeverchin street, 3rd khoroo, Ulaanbaatar, Mongolia",
                "credit_card" => 0,
                "num_rooms" => 25,
                "website" => "",
                "zipcode" => "212455",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.909956369856,
                    "longitude" => 106.89224123955
                ],
                "section" => 7,
                "country" => "mn",
                "stars" => 3,
                "chain_name" => "",
                "entertainment" => [
                    "karoake"
                ],
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping"
                ],
                "checkout" => "09:00",
                "checkin" => "09:00",
                "checkinend" => "00:00",
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "baggage_storage"
                ],
                "breakfast" => 1,
                "wifi" => 1,
                "parking" => 1,
                "pool_spa" => [
                    "sauna"
                ],
                "others" => [
                    "all_spaces_non_smoking",
                    "elevator",
                    "heating"
                ],
                "pets" => 0,
                "children" => 1,
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "cover_image" => "img/hotel/20160510230047ee04cee.jpg",
                "images" => [
                    "img/hotel/201605102300470.jpg",
                    "img/hotel/201605102300471.jpg"
                ],
                "is_journalist" => 0
            ],
            [
                "objectId" => "Lcxo33Vwch",
                "homepage" => 0,
                "name" => "Narantuul Hotel",
                "createdAt" => "2015-12-07T03:03:36.008Z",
                "updatedAt" => "2017-03-31T02:47:54.385Z",
                "type" => "Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "average_rate" => "362",
                "status" => 1,
                "chain_name" => "",
                "city" => "Ulaanbaatar",
                "country" => "mn",
                "credit_card" => 0,
                "section" => 7,
                "stars" => 3,
                "website" => "",
                "phone" => "97699206576",
                "short_desc" => "Narantuul Hotel is located in the centre of Ulaanbaatar, nearby Gandan Monastery and State Department Store. ",
                "num_rooms" => 26,
                "address" => "Peace Avenue, West cross road",
                "long_desc" => "Each room here will provide you with a TV, a balcony and a patio. There is a full kitchen with a refrigerator and kitchenware. Featuring a shower, private bathroom also comes with a bath and a bath or shower. You can enjoy mountain view and city view from the room.\r\n\r\nAt Narantuul Hotel you will find an airport shuttle, a 24-hour front desk and a bar. Other facilities offered at the property include a ticket service, a tour desk and luggage storage. The property offers free parking.\r\n\r\nThe hotel is 1 km from Ulaanbaatar Opera House, 1.5 km from National Museum of Mongolian History and 1.7 km from Chinggis Khan Statue. Chinggis Khaan International Airport is 13 km away.\r\n\r\nGuest can enjoy Mongolian and European cuisine in Slade Restaurant. \r\n\r\nWe speak your language!",
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine",
                    "suitpress"
                ],
                "food_drink" => [
                    "restraurant",
                    "buffet_style_restraurant",
                    "bar",
                    "grocery_deliveries",
                    "packed_lunch",
                    "special_diet_meal",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "checkinend" => "12:00",
                "children" => 1,
                "pool_spa" => [
                    "sauna"
                ],
                "others" => [
                    "all_spaces_non_smoking",
                    "non_smoking_rooms",
                    "facilities_for_disabled_guests",
                    "elevator",
                    "heating"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center"
                ],
                "transportation" => [
                    "airport_shuttle_free"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "concierge_service",
                    "ticket_service",
                    "tour_desk",
                    "currency_exchange",
                    "atm_on_site",
                    "baggage_storage",
                    "lockers",
                    "safe",
                    "newspapers"
                ],
                "parking" => 1,
                "checkout" => "01:00",
                "wifi" => 1,
                "breakfast" => 1,
                "pets" => 0,
                "common_area" => [
                    "terrace"
                ],
                "checkin" => "11:30",
                "cover_image" => "img/hotel/1a451544.png",
                "images" => [
                    "img/hotel/ec1920f0.png",
                    "img/hotel/739e2991.png",
                    "img/hotel/c5703322.png",
                    "img/hotel/ec40e533.png",
                    "img/hotel/b2d0c3e4.png"
                ],
                "asem" => 1,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.915605,
                    "longitude" => 106.895882
                ],
                "email" => "info@ihotel.mn",
                "rs_name" => "narantuul",
                "min_rate" => 109,
                "zipcode" => "212513",
                "fitness" => 0,
                "saun" => 0,
                "pool" => 0,
                "sold_out" => 0,
                "is_journalist" => 0
            ],
            [
                "objectId" => "LsqDSlN9xB",
                "average_rate" => "238",
                "type" => "Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "createdAt" => "2016-01-26T01:49:57.988Z",
                "status" => 0,
                "homepage" => 0,
                "updatedAt" => "2017-01-17T15:32:39.112Z",
                "name" => "Chinggis Khaan Hotel",
                "website" => "www.chinggis-hotel.com",
                "short_desc" => "A quiet location in a primary residential area. It houses an indoor swimming pool, massage and sauna service",
                "credit_card" => 0,
                "long_desc" => "Located on Tokyo Street and Beijing Street, within a 15-minute walk from the major government, business and cultural centres, the 4-star Chinggis Khaan Hotel enjoys a quiet location in a primary residential area. It houses an indoor swimming pool, massage and sauna services, a trendy nightclub, karaoke rooms and a variety of dining options. Free Wi-Fi is provided.\r\n\r\nChinggis Khaan Hotel is a 5-minute drive from the city centre. It takes 15 minutes by car to Ulaanbaatar Railway Station. Ulaanbaatar International Airport is about 30 minutes' drive away.\r\n\r\nAll spacious rooms and suites come with remote lighting controls, a minibar, a cable TV, an in-room safe, a tea/coffee maker, ironing facilities, soundproofed windows and an en suite bathroom with a bathtub. Some units feature beautiful city or river views.\r\n\r\nGuests can work out at the fitness centre, make use of the 300-square-metre function and meeting facilities or arrange their trips from the tour desk. After a day of tours, reading in the quiet library seems relaxing as well.\r\n\r\nTermuujin Restaurant on the 5th floor with lovely skyline views serves continental and authentic Mongolian cuisine. Chinese food can be enjoyed at Mr. Wang Restaurant. The \"Ti Amo\" Bistro which is located in the closet shopping mall serves light meals and snacks. \r\n\r\nWe speak your language!",
                "section" => 7,
                "num_rooms" => 176,
                "city" => "Ulaanbaatar",
                "zipcode" => "211238",
                "address" => " Tokyo Street 10, Bayanzurkh, Ulaanbaatar, Mongolia",
                "phone" => "+976 11312788",
                "stars" => 4,
                "chain_name" => "",
                "country" => "mn",
                "transportation" => [
                    "bicycle_rental",
                    "car_rentral",
                    "airport_shuttle_surcharge",
                    "shuttle_service_charge"
                ],
                "checkinend" => "23:30",
                "others" => [
                    "all_spaces_non_smoking",
                    "non_smoking_rooms",
                    "soundproof_rooms",
                    "honeymoon_suite",
                    "heating"
                ],
                "pets" => 0,
                "shops" => [
                    "souviner_gift_shop"
                ],
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "buffet_style_restraurant",
                    "bar",
                    "packed_lunch",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center"
                ],
                "wifi" => 1,
                "breakfast" => 1,
                "front_desk" => [
                    "24_hour_front_desk"
                ],
                "activities" => [
                    "horseback_riding",
                    "cycling"
                ],
                "pool_spa" => [
                    "sauna"
                ],
                "checkin" => "13:00",
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "shoeshine"
                ],
                "checkout" => "13:00",
                "entertainment" => [
                    "nightclub_dj",
                    "karoake"
                ],
                "children" => 1,
                "parking" => 1,
                "common_area" => [
                    "shared_lounge_tv_area"
                ],
                "images" => [
                    "img/hotel/e85df050.png",
                    "img/hotel/447f7d91.png",
                    "img/hotel/4d7eb002.png",
                    "img/hotel/81a85353.png",
                    "img/hotel/78a69fa4.png",
                    "img/hotel/92f76985.png",
                    "img/hotel/31c7baa6.png",
                    "img/hotel/77500887.png"
                ],
                "cover_image" => "img/hotel/f4e1a2d7.png",
                "asem" => 1,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.922089,
                    "longitude" => 106.93406
                ],
                "email" => "info@ihotel.mn",
                "fitness" => 0,
                "saun" => 0,
                "pool" => 0,
                "min_rate" => 165,
                "sold_out" => 0,
                "is_journalist" => 0
            ],
            [
                "objectId" => "MaGHICo3s0",
                "asem" => 1,
                "homepage" => 0,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "createdAt" => "2016-04-11T06:57:23.820Z",
                "updatedAt" => "2017-01-19T05:10:21.610Z",
                "status" => 0,
                "type" => "Hotel",
                "average_rate" => "14",
                "min_rate" => 134,
                "name" => "Springs Hotel",
                "section" => 7,
                "chain_name" => "",
                "city" => "Ulaanbaatar",
                "website" => "",
                "long_desc" => "We have total of 6 types of 61 rooms. Also restaurant, coffee shop, spa & massage, fitness and conference room are available at our hotel.\r\n\r\nOur special:\r\n-We have business center\r\n-Most of the rooms have nice view by the window (Sukhbaatar square and government building etc)\r\n-Free wireless internet\r\n-Individually controlled air conditioning and heating. ",
                "stars" => 4,
                "credit_card" => 0,
                "zipcode" => "210648",
                "address" => " Olympic street 2A, Sukhbaatar",
                "short_desc" => "Our hotel is located in downtown of UB, and \"Springs\" would be the place for you to stay for business and pleasure.",
                "num_rooms" => 61,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.91552949299,
                    "longitude" => 106.92134857178
                ],
                "phone" => "+976 11320738",
                "country" => "mn",
                "pets" => 0,
                "parking" => 1,
                "checkinend" => "00:00",
                "wifi" => 1,
                "others" => [
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "elevator",
                    "heating"
                ],
                "checkout" => "09:00",
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "children" => 0,
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "pool_spa" => [
                    "fitness_center",
                    "massage"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "currency_exchange",
                    "baggage_storage"
                ],
                "checkin" => "09:00",
                "food_drink" => [
                    "restraurant",
                    "buffet_style_restraurant",
                    "snack_bar",
                    "special_diet_meal",
                    "room_service"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "breakfast" => 0,
                "cover_image" => "img/hotel/176a8852.png",
                "images" => [
                    "img/hotel/42772bb0.png",
                    "img/hotel/d8045921.png",
                    "img/hotel/1d3c9ae2.png"
                ],
                "is_journalist" => 0
            ],
            [
                "objectId" => "MlVZA3qvoO",
                "createdAt" => "2016-06-24T05:24:58.623Z",
                "homepage" => 0,
                "status" => 0,
                "type" => "Hotel",
                "asem" => 1,
                "updatedAt" => "2017-01-17T15:30:23.949Z",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "average_rate" => "7",
                "min_rate" => 67,
                "name" => "Royal Mountain",
                "country" => "mn",
                "phone" => "978-77119292",
                "website" => "",
                "address" => "Khan-Uul district, 3th khoroo, Sharav Street  ",
                "short_desc" => "The Royal Mountain Hotel proudly presents a service that goes above and beyond guest expectations",
                "section" => 7,
                "long_desc" => "-Media & Entertainment: Complimentary Wi-Fi access,  Flat screen cable T, In-house movie channels, Video album,     -Stationary: Spacious executive writing desk, International direct dial (IDD) telephone, Electronic in-room safe, \r\n-Bath & Personal Care: Separate marble shower and bath, Heated bathroom floor, Fine quality cotton bed lines, thick white toweling bathrobes, Pillow menu\r\n-Refreshments: Coffee / tea-making facilities, Mini-bar\r\n-Property details details: Europe and Korean hot&Pot restaurant & Lounge, Karaoke, Fitness center, Coffee shop (Coffe Bene), Spa center, Meeting room, Mongol bank ( currency exchange)\r\n\r\n",
                "chain_name" => "",
                "zipcode" => "170420",
                "credit_card" => 1,
                "city" => "Ulaanbaatar",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.896204368677,
                    "longitude" => 106.85534477234
                ],
                "num_rooms" => 49,
                "stars" => 4,
                "food_drink" => [
                    "restraurant",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "checkin" => "09:00",
                "checkout" => "09:00",
                "pool_spa" => [
                    "spa",
                    "fitness_center"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities"
                ],
                "breakfast" => 1,
                "others" => [
                    "non_smoking_rooms",
                    "elevator",
                    "heating"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "currency_exchange",
                    "baggage_storage"
                ],
                "parking" => 1,
                "children" => 1,
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "shoeshine"
                ],
                "pets" => 0,
                "wifi" => 1,
                "checkinend" => "00:00",
                "shops" => [
                    "shops_onsite"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge",
                    "shuttle_service_charge"
                ],
                "entertainment" => [
                    "karoake"
                ],
                "cover_image" => "img/hotel/f07e4ca.jpg",
                "hq" => 0
            ],
            [
                "objectId" => "PbtIwCCjcQ",
                "asem" => 0,
                "createdAt" => "2016-04-26T09:32:03.940Z",
                "updatedAt" => "2016-06-20T09:06:39.621Z",
                "min_rate" => 80000,
                "homepage" => 0,
                "name" => "Modern Mongolia Hostel",
                "type" => "Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "average_rate" => "40",
                "status" => 1,
                "credit_card" => 0,
                "address" => "Sukhbaatar district, Chinggis Avenue 14, Elite A block 2nd floor #202, Ulaanbaatar Mongolia",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "phone" => "976 99101861",
                "section" => 7,
                "stars" => 1,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.915047711208,
                    "longitude" => 106.91490590572
                ],
                "zipcode" => "210643",
                "num_rooms" => 15,
                "short_desc" => "Modern Mongol Hostel is perfectly centrally located and Brand New Hostel.",
                "chain_name" => "",
                "long_desc" => "Perfectly centrally located directly at Chinggis Khan Avenue Modern Mongol is opened the doors t on May 2015. We are happy to host you in our 'Brand New Hostel'.\r\nModern Mongol Hostel is a relaxed, affordable and modern budget accommodation is located just next to Drama house, situated in the heart of Ulaanbaatar and less than 3 minutes walking from the Central Square, Parliament and Opera House, Central Post office, surrounding city's tourist attractions, outdoor markets, restaurants, clubs and bars all just around the hostel.\r\nCompletely brand new renovated all of our private rooms, dormitories, and common areas, are fresh, clean and modern. With a total of 34 dorm beds and 3-Double rooms,2-Twins,1-Family room , We have 2-3 bunk beds dorms, a small family room for 4 persons and a double and twin bed rooms. We offer a relaxed and safe area with social atmosphere, great access to local sights and services. Modern Mongol making it ideal for those looking to soak up some culture while in the city. The hostel is open 24 hours a day and luggage storage is provided prior to check in and after the check out time.\r\n",
                "website" => "www.hostel.mn",
                "front_desk" => [
                    "24_hour_front_desk",
                    "baggage_storage",
                    "lockers"
                ],
                "pets" => 0,
                "checkout" => "09:00",
                "parking" => 1,
                "others" => [
                    "designated_smoking_area",
                    "non_smoking_rooms"
                ],
                "children" => 0,
                "wifi" => 1,
                "checkinend" => "00:00",
                "food_drink" => [
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "checkin" => "09:00",
                "breakfast" => 1,
                "cover_image" => "img/hotel/72d5f534.png",
                "images" => [
                    "img/hotel/abe998c0.png",
                    "img/hotel/d675c031.png",
                    "img/hotel/eec9ad52.png",
                    "img/hotel/f05d9113.png",
                    "img/hotel/1b8880a4.png"
                ],
                "is_journalist" => 0
            ],
            [
                "objectId" => "PrIYApIg5O",
                "status" => 1,
                "homepage" => 0,
                "name" => "Naranbulag Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "updatedAt" => "2017-01-10T13:31:15.135Z",
                "createdAt" => "2015-12-07T03:30:41.824Z",
                "average_rate" => "244",
                "type" => "Hotel",
                "website" => "",
                "long_desc" => "It houses karaoke rooms, a business centre, a tour desk, barbecue facilities and an on-site restaurant. Additionally, free Wi-Fi is available in all areas and free airport shuttle service is provided.\r\nNaranbulag Hotel is a 10-minute walk from Central Gandan Monastery and a 15-minute drive from Bogdo Khan Temple or Zaisan Memorial. It is a 8-minute walk from Ulaanbaatar Railway Station. Chinggis Khaan International Airport is a 30-minute drive away.\r\nAll units come with a cable TV, minibar, fridge, dining area, ironing facilities and seating area. The en suite bathroom has soft bathrobes and bath or shower facilities.\r\nGuests can work out at the fitness centre, make use of the barbecue facilities or sing in the karaoke rooms. Children's playground, kid's club and babysitting services are provided as well. Meeting and banquet facilities are available upon request.\r\nThe on-site Naranbulag Restaurant serves Asian, European, Mongolian and Hotpot delicious dishes. \r\nBayangol is a great choice for travellers interested in temples, food and museums.\r\n",
                "section" => 7,
                "country" => "mn",
                "credit_card" => 0,
                "phone" => "+976 70140999",
                "address" => " Jasrai Street,4th khoroo, Near the Train station., Bayangol",
                "stars" => 3,
                "short_desc" => "Only 2 km from the centre of Ulaanbaatar, Naranbulag Hotel features accommodation with well-equipped facilities",
                "city" => "Ulaanbaatar",
                "chain_name" => "",
                "num_rooms" => 49,
                "breakfast" => 1,
                "pool_spa" => [
                    "fitness_center",
                    "solarium",
                    "massage"
                ],
                "wifi" => 1,
                "checkin" => "10:00",
                "others" => [
                    "all_spaces_non_smoking",
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "elevator",
                    "air_conditioning",
                    "heating"
                ],
                "checkout" => "00:00",
                "food_drink" => [
                    "restraurant",
                    "buffet_style_restraurant",
                    "bar",
                    "snack_bar",
                    "grocery_deliveries",
                    "special_diet_meal",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "children" => 1,
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "ticket_service",
                    "tour_desk",
                    "currency_exchange",
                    "atm_on_site",
                    "baggage_storage",
                    "safe",
                    "newspapers"
                ],
                "entertainment" => [
                    "karoake",
                    "playground"
                ],
                "pets" => 0,
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center"
                ],
                "checkinend" => "23:30",
                "parking" => 1,
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "shops" => [
                    "shops_onsite",
                    "convenience_store"
                ],
                "transportation" => [
                    "car_rentral",
                    "airport_shuttle_free"
                ],
                "common_area" => [
                    "shared_kitchen"
                ],
                "cover_image" => "img/hotel/e78b3123.png",
                "images" => [
                    "img/hotel/c2314360.png",
                    "img/hotel/9c10b951.png",
                    "img/hotel/8b8c1042.png",
                    "img/hotel/ce794ad3.png"
                ],
                "asem" => 1,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.909899,
                    "longitude" => 106.877276
                ],
                "min_rate" => 70,
                "email" => "info@ihotel.mn",
                "rs_name" => "naranbulag",
                "zipcode" => "212513",
                "fitness" => 0,
                "saun" => 0,
                "pool" => 0,
                "sold_out" => 0,
                "is_journalist" => 0
            ],
            [
                "objectId" => "SvTXmdzBbz",
                "status" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "name" => "Нарантуул зочид буудал",
                "asem" => 0,
                "min_rate" => 347000,
                "updatedAt" => "2017-01-11T03:30:41.500Z",
                "type" => "Hotel",
                "average_rate" => "7",
                "homepage" => 0,
                "createdAt" => "2016-06-07T00:11:49.316Z",
                "long_desc" => "Үйлчилгээний цэг, худалдааны төвүүдэд ойрхон байрлах 3 одтой Нарантуул зочид буудал нь гадаад дотоодын зочид төлөөлөгчдийн шаардлагыг бүрэн хангасан олон улсын стандартад нийцсэн гал тогоо, ажлын болон хүүхдийн өрөө зэргээс бүрдсэн 24 тохилог өрөө, хурлын заал,  ресторан зэргээр байнга үйлчилж байна.",
                "section" => 7,
                "short_desc" => "Гандантэгчилэн хийд, Улсын их дэлгүүр зэрэг худалдаа үйлчилгээний цэгүүдтэй ойр байрладаг.",
                "zipcode" => "212513",
                "chain_name" => "",
                "country" => "mn",
                "num_rooms" => 26,
                "address" => "Чингэлтэй дүүрэг, Энх тайвны өргөн чөлөө, Баруун дөрвөн зам",
                "stars" => 3,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.915615781791,
                    "longitude" => 106.89609289169
                ],
                "phone" => "976-11330565",
                "city" => "Ulaanbaatar",
                "website" => "www.narantuulhotel.com",
                "credit_card" => 1,
                "checkinend" => "00:00",
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "others" => [
                    "all_spaces_non_smoking",
                    "non_smoking_rooms",
                    "elevator",
                    "heating"
                ],
                "children" => 1,
                "breakfast" => 1,
                "checkout" => "09:00",
                "transportation" => [
                    "airport_shuttle_free"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "ticket_service",
                    "baggage_storage"
                ],
                "checkin" => "09:00",
                "wifi" => 1,
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "parking" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "buffet_style_restraurant",
                    "bar",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "cover_image" => "img/hotel/259c080.jpg",
                "images" => [
                    "img/hotel/d4bd91a.jpg",
                    "img/hotel/5df4b7e.jpg",
                    "img/hotel/1384d0e.jpg",
                    "img/hotel/475e765.jpg",
                    "img/hotel/2fe63ec.jpg",
                    "img/hotel/e8b8cab.jpg",
                    "img/hotel/57394c9.jpg",
                    "img/hotel/bbece8d.jpg"
                ],
                "hq" => 0
            ],
            [
                "objectId" => "Tl26FDLUoa",
                "status" => 0,
                "homepage" => 0,
                "type" => "Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "name" => "The Corporate Hotel",
                "createdAt" => "2017-01-10T15:14:41.533Z",
                "average_rate" => "13",
                "updatedAt" => "2017-01-17T15:28:44.736Z",
                "min_rate" => 220,
                "asem" => 1,
                "short_desc" => "This 4-star property offers a fitness center, a spa and free parking. Free Wi-Fi access is provided in all hotel rooms.",
                "stars" => 4,
                "long_desc" => "Corporate Hotel is located 800 m from the National Amusement Park and 3 km from Ulaanbaatar Railway Station. This 4-star property offers a fitness center, a spa and free parking. Free Wi-Fi access is provided in all hotel rooms.\r\n\r\nAir-conditioned guest rooms feature spacious interiors with modern furnishings. Each is equipped with a work desk, a personal safe and satellite television. Additional amenities include ironing equipment, a minibar and tea/coffee making facilities.",
                "city" => "Ulaanbaatar",
                "country" => "mn",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.913098965994,
                    "longitude" => 106.91399395466
                ],
                "website" => "ihotel.mn",
                "section" => 7,
                "num_rooms" => 55,
                "zipcode" => "210645",
                "address" => "NO. 9-2 Chinggis Avenue , Sukhbaatar, 210645 Ulaanbaatar, Mongolia",
                "chain_name" => "The Corporate Hotel",
                "credit_card" => 1,
                "phone" => "+97699066350",
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "fax_photocopying"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "shoeshine"
                ],
                "breakfast" => 1,
                "parking" => 1,
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "fitness_center",
                    "massage"
                ],
                "checkout" => "12:00",
                "children" => 1,
                "pets" => 0,
                "wifi" => 1,
                "others" => [
                    "hypoallergenic_room_available",
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "elevator",
                    "soundproof_rooms",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "bar",
                    "snack_bar",
                    "packed_lunch",
                    "special_diet_meal",
                    "breakfast_in_the_room"
                ],
                "checkin" => "13:00",
                "checkinend" => "23:00",
                "front_desk" => [
                    "24_hour_front_desk",
                    "baggage_storage",
                    "newspapers"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge",
                    "shuttle_service_charge"
                ],
                "shops" => [
                    "shops_onsite",
                    "hair_beauty_salon"
                ],
                "cover_image" => "img/hotel/1ab9e70.jpg",
                "images" => [
                    "img/hotel/3a8ce58.jpg",
                    "img/hotel/efb4ae5.jpg",
                    "img/hotel/826ecf6.jpg"
                ],
                "hq" => 0
            ],
            [
                "objectId" => "U4SbcJYCVl",
                "type" => "Hotel",
                "status" => 0,
                "createdAt" => "2016-06-07T08:16:58.904Z",
                "asem" => 0,
                "homepage" => 0,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "average_rate" => "5",
                "name" => "Парк зочид буудал",
                "updatedAt" => "2017-01-11T03:30:37.052Z",
                "min_rate" => 1000000,
                "country" => "mn",
                "zipcode" => "112151",
                "phone" => "976-70161690",
                "section" => 2,
                "long_desc" => "Бид орчин үеийн цогц үйлчилгээ бүхий Олон улсын зочид буудлын стандартыг хангасан бизнес ангиллын зочид буудлыг та бүхэнд танилцуулж байгаадаа таатай байна. Манай үйлчилгээнд:\r\n      Дараах ангиллын өрөөнүүд байна. Люкс өрөө - 4, хагас люкс өрөө - 4, стандарт өргөн ортой өрөө - 36, стандарт 2 ортой өрөө 8 нийт 52 өрөөнд нэг дор 100 зочин хүлээн авах боломжтой.\r\n     Өрөөнүүд эйркондишн, 32” LCD телевизор, интернет, телефон утас, мини бар, үсний сэнсээр тоноглогдсон. Сайн чанарын цагаан хэрэглэл, алчуур, халат, 1 удаагийн хэрэгсэлтэй. Люкс, хагас люкс өрөөнүүд буйдантай. Люкс өрөө бар тейк, нэмэлт зочны ариун цэврийн өрөөтэй. Зочид буудал нь 24 цагийн фронт деск үйлчилгээтэй, онлайн захиалга авах боломжтой. Хамгаалалт камерийн систем, галын дохиолол, Wi-Fi интернет, картан цоож, лифт, автомашины зогсоол, дулаан граштай. Жолоочтой автомашин түрээсийн үйлчилгээ, зочин тосох үдэх, зочны үнэт зүйлсийг хадгалах, тээш хадгалах зөөх, валют солих, бизнес төв, онгоцны болон төмөр замын билет захиалах, шинэ сонин хэвлэл зэрэг үйлчилгээ үзүүлнэ. Виза болон Мастер картаар үйлчлэх боломжтой. Манай зочид буудал нь орчин үеийн шинэлэг, тав тухтай, дээд зэрэглэлийн бизнес ангилалыг бүрэн хангасан.\r\nБид та бүхэнд дараах үйлчилгээг санал болгож байна.\r\n-ПАРК ЗОЧИД БУУДАЛ\r\n-ПАРК РЕСТОРАН\r\n-VIP ӨРӨӨНҮҮД\r\n-ТЕКИЛЛА ЛОУНЖ\r\n-ХАНКА'С КОФЕ ШОП\r\n-ХУРЛЫН ЗААЛ\r\n-УУЛЗАЛТЫН ӨРӨӨ\r\n-Нью ЖЕНЕРЭШН СПА САЛОН\r\n-СНУКЕР БИЛЛИАРД\r\n-ФИТНЕС ӨРӨӨ\r\n-БЭЛЭГ ДУРСГАЛЫН ДЭЛГҮҮР  ",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.921634070584,
                    "longitude" => 106.95370674133
                ],
                "address" => "аянзүрх дүүрэг, 4-р хороо, Лхагвасүрэнгийн гудамж-32, ПАРК Зочид Буудал",
                "credit_card" => 0,
                "stars" => 4,
                "short_desc" => "Парк зочид буудал нь орчин үеийн шийдэл бүхий 52 өрөө, ресторан, хурлын заал, кофе шоп, лоунж зэргээр үйлчилж байна.  ",
                "website" => "www.park-hotel.mn",
                "num_rooms" => 52,
                "city" => "Ulaanbaatar",
                "chain_name" => "",
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "wifi" => 1,
                "transportation" => [
                    "car_rentral",
                    "airport_shuttle_surcharge",
                    "shuttle_service_charge"
                ],
                "pets" => 0,
                "checkinend" => "00:00",
                "children" => 0,
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "valet_patking",
                    "baggage_storage",
                    "lockers"
                ],
                "others" => [
                    "elevator",
                    "heating"
                ],
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "buffet_style_restraurant",
                    "bar",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "checkout" => "09:00",
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "breakfast" => 1,
                "parking" => 1,
                "common_area" => [
                    "shared_lounge_tv_area"
                ],
                "checkin" => "09:00",
                "hq" => 0
            ],
            [
                "objectId" => "VCNzEKByHF",
                "status" => 0,
                "type" => "Hotel",
                "average_rate" => "7",
                "min_rate" => 82,
                "asem" => 1,
                "updatedAt" => "2017-01-17T15:29:34.928Z",
                "createdAt" => "2016-06-27T10:27:48.361Z",
                "name" => "Alpha Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "homepage" => 0,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.908776948143,
                    "longitude" => 106.92984580994
                ],
                "short_desc" => "\"Alpha\" luxury hotel is located in “A” zone of Ulaanbaatar city and 2km from the centre of Great Genghis Khan’s square",
                "website" => "",
                "address" => "Located in “A” zone of Ulaanbaatar city and 2km from the centre of Great Genghis Khan’s square, Mongolia",
                "chain_name" => "",
                "credit_card" => 0,
                "num_rooms" => 45,
                "stars" => 4,
                "country" => "mn",
                "zipcode" => "142080",
                "city" => "Ulaanbaatar",
                "section" => 7,
                "long_desc" => "Mongolian Trade Union’s \"Alpha\" hotel of  centre is opening its operation in June, 2016. Our dedicated friendly and qualified professional staffs are ready to welcome you as guests with a very relaxing and comfortable environment.\r\n\"Alpha\" luxury hotel is located in “A” zone of Ulaanbaatar city and 2km from the centre of Great Genghis Khan’s square. Our location is very convenient such as Chinggis Khaan International Airport is 14km, the National Amusement Park is just walking distance about 300m, and Ulaanbaatar train station is 2km about 10 minutes by taxi.Our restaurant hall has a capacity of 70-80 seats and accommodates VIP room for 10-15 people, and a coffee lounge for 40-50 seats. Our restaurant menu consists of European luxury dishes, high-end wine collection and variety of drinks for your selection, and most importantly, certified master chefs are ready to serve for you in our comfortable environment.For our hotel guests’ special needs, we comprise 5 different selections of 45 operating rooms with 99 luxury beds.Our meeting and training hall has a capacity to accommodate 100 people at a time. And facilitated with all required seminar hardware equipments such as microphones, projector, and headphones and writing board for any type of training and seminars.",
                "phone" => "976-99937619",
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "ticket_service",
                    "tour_desk",
                    "baggage_storage"
                ],
                "wifi" => 1,
                "others" => [
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "elevator",
                    "heating"
                ],
                "checkinend" => "00:00",
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "bar",
                    "packed_lunch",
                    "special_diet_meal",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "children" => 0,
                "common_area" => [
                    "shared_lounge_tv_area"
                ],
                "pool_spa" => [
                    "fitness_center"
                ],
                "checkin" => "09:00",
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "fax_photocopying"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "pets" => 0,
                "checkout" => "09:00",
                "parking" => 1,
                "breakfast" => 1,
                "cover_image" => "img/hotel/97f9dae.jpg",
                "hq" => 0,
                "images" => [
                    "img/hotel/31b0421.jpg",
                    "img/hotel/95ce34f.jpg",
                    "img/hotel/e6345a9.jpg",
                    "img/hotel/9ad22b5.jpg"
                ]
            ],
            [
                "objectId" => "aZZnxV1FeB",
                "type" => "Hotel",
                "average_rate" => "313000",
                "min_rate" => 164000,
                "createdAt" => "2016-03-11T08:15:31.351Z",
                "updatedAt" => "2017-01-10T15:24:31.824Z",
                "homepage" => 1,
                "status" => 0,
                "name" => "Хүннү зочид буудал",
                "asem" => 0,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "city" => "Ulaanbaatar",
                "phone" => "70106989, 70146989, 74106989",
                "zipcode" => "212513",
                "country" => "mn",
                "short_desc" => "Сүхбаатарын талбайгаас 1.3 км, Монголын үндэсний музейгээс 1.5 км, Чингис хаан нисэх буудлаас 16 км-ийн зайтай байрладаг",
                "website" => "www.khunnupalace.mn",
                "address" => "Сүхбаатар дүүрэг, 11-р хороо, Их тойруу-13, 100 айл ",
                "section" => 7,
                "long_desc" => "Хотын A  бүсэд байрлах Хүннү зочид буудал нь тохилог өрөө,  ресторан, караоке, бялдаржуулах төв зэргийг үйлчлүүлэгчиддээ санал болгож байна. Өрөө бүрийн үнэд өглөөний цай орсон байгаа ба өндөр хурдны интернет, минибар зэрэг багтаж байна.",
                "stars" => 3,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.930146,
                    "longitude" => 106.93085432053
                ],
                "chain_name" => "",
                "num_rooms" => 39,
                "credit_card" => 0,
                "checkout" => "09:00",
                "children" => 0,
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry"
                ],
                "wifi" => 1,
                "entertainment" => [
                    "evening_entertainment",
                    "nightclub_dj",
                    "casino"
                ],
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "buffet_style_restraurant"
                ],
                "checkinend" => "13:00",
                "others" => [
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "elevator",
                    "heating"
                ],
                "pets" => 0,
                "parking" => 1,
                "pool_spa" => [
                    "indoor_pool",
                    "indoor_pool_seasonal",
                    "indoor_pool_all_year"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout"
                ],
                "common_area" => [
                    "grounds",
                    "terrace",
                    "sun_deck"
                ],
                "checkin" => "10:30",
                "breakfast" => 2,
                "images" => [
                    "img/hotel/017f3090.png",
                    "img/hotel/1187f6f1.png",
                    "img/hotel/5fd125b2.png",
                    "img/hotel/d3676283.png"
                ],
                "cover_image" => "img/hotel/77335de3.png",
                "transportation" => [
                    "bikes_available_free",
                    "bicycle_rental",
                    "car_rentral"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center"
                ],
                "activities" => [
                    "tennis_court",
                    "pool_table",
                    "ping_pong"
                ],
                "fitness" => 0,
                "saun" => 0,
                "pool" => 0,
                "sold_out" => 0,
                "is_journalist" => 0
            ],
            [
                "objectId" => "cte44bvM78",
                "name" => "Blue Sky Hotel",
                "min_rate" => 140,
                "status" => 0,
                "type" => "Hotel",
                "average_rate" => "15",
                "updatedAt" => "2017-04-01T06:26:14.347Z",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "asem" => 1,
                "homepage" => 0,
                "createdAt" => "2017-01-10T13:04:58.338Z",
                "zipcode" => "212513",
                "city" => "Ulaanbaatar",
                "stars" => 5,
                "address" => " Peace Avenue 17,Sukhbaatar District,1st Quarter, Sukhbaatar, Ulaanbaatar, Mongolia ",
                "website" => "https://hotelbluesky.mn",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.916241371293,
                    "longitude" => 106.91848397255
                ],
                "country" => "mn",
                "phone" => "99066350",
                "chain_name" => "Blue Sky ",
                "short_desc" => "It is a 20-minute drive from Ulaanbaatar Railway Station. National Amusement Park is a 7-minute drive away.",
                "num_rooms" => 200,
                "section" => 7,
                "credit_card" => 1,
                "long_desc" => "Housed in the tallest building in Ulaanbaatar, the 5-star luxurious The Blue Sky Hotel and Tower is located in the very centre of Ulaanbaatar city. It boasts an indoor pool and a wellness centre. Featuring free Wi-Fi in all areas, all upscale rooms come with European-style decoration and modern interiors. On-site parking is free.\r\n\r\nOverlooking the Sukhbaatar Square, Blue sky hotel is located next to Sukhbaatar Square. It is a 20-minute drive from Ulaanbaatar Railway Station. National Amusement Park is a 7-minute drive away.\r\n\r\nAll rooms are fitted with a flat-screen TV, a minibar and a safety deposit box. En suite bathrooms include both a bathtub and shower facilities. Free toiletries, hairdryers and slippers are also included.\r\n\r\nGuests can work out at the gym, laze in the sauna, or check emails at the business centre. Car rentals, currency exchange and laundry services are also available. Luggage storage and safety deposit box are available at the 24-hour front desk.\r\n\r\nCantonese dishes can be enjoyed at the Jade Palace, while Japanese food are offered at Zen. Other dining options include a Korean restaurant Le Seoul and Seasons All day dining Restaurant with Western speciality classic cuisines. \r\n\r\nSukhbaatar is a great choice for travelers interested in tours, history and scenery.\r\n\r\nThis is our guests' favorite part of Ulaanbaatar, according to independent reviews.\r\n\r\nThis property also has one of the top-rated locations in Ulaanbaatar! Guests are happier about it compared to other properties in the area.",
                "parking" => 1,
                "checkout" => "09:00",
                "pets" => 0,
                "breakfast" => 1,
                "checkinend" => "00:00",
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "tour_desk",
                    "currency_exchange"
                ],
                "children" => 0,
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "others" => [
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "elevator",
                    "heating"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "pool_spa" => [
                    "sauna",
                    "fitness_center",
                    "massage"
                ],
                "checkin" => "09:00",
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "bar",
                    "snack_bar",
                    "packed_lunch",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "wifi" => 1,
                "cover_image" => "img/hotel/eadae6e.jpg",
                "images" => [
                    "img/hotel/d0d5e73.jpg"
                ],
                "hq" => 1,
                "hq_star" => 3,
                "cancelation" => 1
            ],
            [
                "objectId" => "fkoX3OapCN",
                "type" => "Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "homepage" => 1,
                "name" => "New World зочид буудал",
                "average_rate" => "10",
                "status" => 1,
                "min_rate" => 125000,
                "updatedAt" => "2016-05-30T01:56:28.887Z",
                "asem" => 0,
                "createdAt" => "2016-04-12T00:55:08.265Z",
                "short_desc" => "Анх 2011 онд шинээр ашиглалтанд орсон ба тохилог 38 өрөө, ресторан, саун&массаж, караоке зэргээр үйлчилж байна.",
                "credit_card" => 0,
                "stars" => 3,
                "chain_name" => "",
                "long_desc" => "New World зочид буудал нь 2011 онд шинээр ашиглалтанд орсон. Олон улсын кабелийн сувагтай LCD зурагт, өндөр хурдны байнгын инернэт бүхий стандартын шаардлага хангасан 38 өрөөтэй бөгөөд 70 хүн нэгэн зэрэг хүлээн авах хүчин чадалтай. \r\nБид тохилог тав тухтай ресторан, караоке болон 24 цагийн саун массаж зэргийг танд санал болгож байна.",
                "num_rooms" => 38,
                "country" => "mn",
                "website" => "",
                "section" => 7,
                "city" => "Ulaanbaatar",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.931444943498,
                    "longitude" => 106.92503929138
                ],
                "phone" => "+976 11351244",
                "address" => "Сүхбаатар дүүрэг, 100 айл, 10-р хороолол ",
                "zipcode" => "210646",
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "buffet_style_restraurant",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "shops" => [
                    "hair_beauty_salon"
                ],
                "children" => 0,
                "others" => [
                    "all_spaces_non_smoking",
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "elevator",
                    "heating"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "ticket_service",
                    "baggage_storage",
                    "lockers",
                    "newspapers"
                ],
                "checkin" => "09:00",
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "breakfast" => 1,
                "wifi" => 1,
                "entertainment" => [
                    "karoake"
                ],
                "checkout" => "09:00",
                "pets" => 0,
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "parking" => 1,
                "checkinend" => "00:00",
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "hot_tub",
                    "hot_spring_bath",
                    "massage"
                ],
                "cover_image" => "img/hotel/e603d4e4.png",
                "images" => [
                    "img/hotel/ee299600.png",
                    "img/hotel/5de01e11.png",
                    "img/hotel/6ee48ff2.png",
                    "img/hotel/25f4cfa3.png",
                    "img/hotel/b9e3cdb4.png"
                ],
                "is_journalist" => 0
            ],
            [
                "objectId" => "gIlThB46Ls",
                "createdAt" => "2016-08-18T06:58:08.234Z",
                "name" => "Наранбулаг зочид буудал",
                "type" => "Hotel",
                "asem" => 0,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "updatedAt" => "2017-01-11T03:30:32.521Z",
                "average_rate" => "14",
                "homepage" => 0,
                "min_rate" => 200000,
                "status" => 0,
                "long_desc" => "Наранбулаг зочид буудал нь олон улсын стандартыг бүрэн хангасан 49 өрөө, лоунж, караоке, фитнес, гоо сайхан, нийтийн халуун ус, саун, угаалга, хими цэвэрлэгээ болон мини маркет зэрэг үйлчилгээг хэрэглэгчиддээ санал болгож байна. \r\n Манай зочид буудал нь бизнес, соёл урлаг, худалдааны төвүүдэд ойрхон хотын төвийн А зэрэглэлийн бүсэд байрладаг бөгөөд нисэх онгоцны буудлаас 17 км, төмөр замын төв буудлаас 500 метр зайтай оршдог нь зочдын тав тухтай үйлчилгээнд нэн тааламжтай нөхцлийг бүрдүүлдэг.\r\n\r\n",
                "chain_name" => "",
                "city" => "Ulaanbaatar",
                "address" => "Монгол улс, Улаанбаатар хот, Баянгол дүүргийн 4-р хороонд, Энхтайвны өргөн чөлөө 76, 25-р эмийн сангийн автобусны буудлын замын чанх урд талд төв зам дагуу байрлаж байна., Энхтайваны Өргөн Чөлөө 76, Улаанбаатар",
                "zipcode" => "212513",
                "credit_card" => 0,
                "website" => "www.nb-hotel.com",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "stars" => 3,
                "section" => 3,
                "short_desc" => "Наранбулаг зочид буудал нь онгоцны буудлаас 17 км, төмөр замын төв буудлаас 500 метр зайтай оршдог",
                "country" => "mn",
                "num_rooms" => 49,
                "phone" => "976-70140999",
                "wifi" => 1,
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "pets" => 0,
                "entertainment" => [
                    "karoake"
                ],
                "parking" => 1,
                "common_area" => [
                    "shared_lounge_tv_area"
                ],
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "bar",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "children" => 0,
                "checkin" => "09:00",
                "pool_spa" => [
                    "sauna",
                    "fitness_center"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "currency_exchange",
                    "baggage_storage"
                ],
                "transportation" => [
                    "airport_shuttle_free"
                ],
                "checkinend" => "00:00",
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "breakfast" => 1,
                "others" => [
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "elevator",
                    "air_conditioning",
                    "heating"
                ],
                "checkout" => "09:00",
                "hq" => 0
            ],
            [
                "objectId" => "gZ63FP6fCP",
                "name" => "Сод зочид буудал",
                "type" => "Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "updatedAt" => "2017-01-10T15:17:21.759Z",
                "average_rate" => "31",
                "createdAt" => "2016-01-26T18:00:07.640Z",
                "status" => 1,
                "homepage" => 0,
                "section" => 7,
                "zipcode" => "016010",
                "address" => "БГД, 5-р хороо, 10-р хор-л, Энхтайваны өргөн чөлөө",
                "stars" => 3,
                "credit_card" => 0,
                "country" => "mn",
                "num_rooms" => 30,
                "chain_name" => "",
                "long_desc" => "Сод зочид буудал нь Чингис хааны талбайгаас 3.8км, Монголын үндэсний музейгээс 3в7 км-ийн зайтай оршдог. Замуу дагуу байрлалтай ба эмнэлэг, хүнсний дэлгүүр, саун, массаж, бариа засал гэх мэт үйлчилгээний төвүүдтэй ойр байрладаг.\r\n30 ширхэг тохилог, хямд өрөөнөөс бүрдсэн ба доороо амт чанартай хоолоор үйлчлэх ресторантай.\r\n",
                "city" => "Ulaanbaatar",
                "website" => "",
                "short_desc" => "Сод зочид буудал нь 10 р хорооллын Номин супермаркетын эсрэг талд, зам дагуу байрладаг тул олоход хялбар",
                "phone" => "+976 70175177",
                "checkout" => "09:00",
                "wifi" => 1,
                "children" => 0,
                "transportation" => [
                    "airport_shuttle_surcharge",
                    "shuttle_service_charge"
                ],
                "parking" => 1,
                "breakfast" => 0,
                "others" => [
                    "non_smoking_rooms",
                    "heating"
                ],
                "checkin" => "09:00",
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "room_service"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "shoeshine"
                ],
                "pets" => 0,
                "checkinend" => "12:00",
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "baggage_storage"
                ],
                "cover_image" => "img/hotel/e17f76a2.png",
                "images" => [
                    "img/hotel/fe34f700.png",
                    "img/hotel/62d1f0c1.png",
                    "img/hotel/d220d862.png"
                ],
                "asem" => 0,
                "email" => "info@ihotel.mn",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.913156494579,
                    "longitude" => 106.86651885509
                ],
                "min_rate" => 20,
                "common_area" => [
                    "shared_lounge_tv_area"
                ],
                "fitness" => 0,
                "saun" => 0,
                "pool" => 0,
                "sold_out" => 0,
                "is_journalist" => 0
            ],
            [
                "objectId" => "gmlVXITiCK",
                "updatedAt" => "2017-01-10T15:24:06.119Z",
                "status" => 1,
                "type" => "Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "asem" => 0,
                "createdAt" => "2016-03-11T03:41:34.557Z",
                "average_rate" => "76",
                "homepage" => 1,
                "min_rate" => 88,
                "name" => "Мика зочид буудал",
                "short_desc" => "Үнэгүй өглөөний цай, интернет зэргээр хангана.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.915075,
                    "longitude" => 106.925691
                ],
                "credit_card" => 0,
                "stars" => 3,
                "city" => "Ulaanbaatar",
                "long_desc" => "Анхны хувийн зочид буудлын барилга болох тус зочид буудал нь дээд зэрэглэлийн 3 одтой зочид буудал бөгөөд гадаад дотоодын зочид төлөөлөгчид, жуулчид, бизнесийн хvрээнийхнийг хvлээн авч vйлчилдэг ба vйл ажиллагаагаараа шалгарч \"Монголын Зочид Буудлуудын Холбооны Тэргvvлэгч\" гишvvн байгууллага болж байсан. Тус зочид буудал нь 4 төрлийн, бvрэн тохижуулсан энгийн, хоёр хүний, хагас люкс болон люкс зэрэглэлийн 18 өрөөтэй, ресторан, гарден, бизнес төв болон машины дулаан гаражтай. Улаанбаатар хотын төвд, Япон, Өмнөд Солонгос болон Чехийн элчин сайдын яамдтай зэрэгцээ оршдог ба Сvхбаатарын талбай хvрэх болон vйлчилгээний газруудтай ойрхон байрлалтай зэрэг давуу талтай. ",
                "section" => 7,
                "zipcode" => "11",
                "website" => "www.mika.mn",
                "address" => "“Сүхбаатар дүүрэг, 1-р хороо, олимпын 8, Элчин Сайдын Яамдын гудамж",
                "chain_name" => "",
                "phone" => "(976-11) 310903, 310566, 310588",
                "num_rooms" => 14,
                "country" => "mn",
                "checkout" => "13:00",
                "business_fac" => [
                    "business_center"
                ],
                "checkin" => "13:00",
                "parking" => 1,
                "wifi" => 1,
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping"
                ],
                "children" => 0,
                "checkinend" => "14:00",
                "food_drink" => [
                    "restraurant",
                    "room_service"
                ],
                "front_desk" => [
                    "24_hour_front_desk"
                ],
                "breakfast" => 1,
                "pets" => 0,
                "cover_image" => "img/hotel/3c1a27e1.png",
                "images" => [
                    "img/hotel/1c332d10.png",
                    "img/hotel/297aad21.png"
                ],
                "fitness" => 0,
                "saun" => 0,
                "pool" => 0,
                "sold_out" => 0,
                "others" => [
                    "non_smoking_rooms",
                    "elevator",
                    "heating"
                ],
                "is_journalist" => 0
            ],
            [
                "objectId" => "hpjqDvtnjq",
                "average_rate" => "13",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "homepage" => 0,
                "name" => "Grand Hill Hotel",
                "status" => 1,
                "createdAt" => "2016-04-27T10:34:25.763Z",
                "type" => "Hotel",
                "updatedAt" => "2017-05-02T05:04:44.849Z",
                "asem" => 1,
                "min_rate" => 111,
                "address" => " Damdinbazar street-52, Bayangol district, Bayangol, Ulaanbaatar, Mongolia ",
                "short_desc" => "Ulaanbaatar Opera House is 1.8 km from The Grand Hill, and National Museum of Mongolian History is 2.4 km away. ",
                "num_rooms" => 198,
                "credit_card" => 0,
                "city" => "Ulaanbaatar",
                "chain_name" => "",
                "long_desc" => "Featuring free WiFi and a restaurant, The Grand Hill offers accommodations in Ulaanbaatar. Guests can enjoy the on-site bar.\r\n\r\nSome units include a sitting area where you can relax.\r\n\r\nThere is a 24-hour front desk, a shared lounge, business center and a gift shop at the property.\r\n\r\nUlaanbaatar Opera House is 1.8 km from The Grand Hill, and National Museum of Mongolian History is 2.4 km away. Chinggis Khaan International Airport is 11.3 km from the property. \r\n\r\nBayangol is a great choice for travelers interested in excursions, temples and culture.",
                "section" => 7,
                "website" => "",
                "zipcode" => "212513",
                "stars" => 4,
                "phone" => "+976 11361697 ",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.917032335697,
                    "longitude" => 106.87143802643
                ],
                "country" => "mn",
                "children" => 0,
                "front_desk" => [
                    "24_hour_front_desk",
                    "concierge_service",
                    "currency_exchange",
                    "baggage_storage"
                ],
                "checkout" => "07:00",
                "breakfast" => 1,
                "parking" => 1,
                "entertainment" => [
                    "karoake"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "elevator",
                    "air_conditioning",
                    "heating"
                ],
                "pets" => 0,
                "checkinend" => "00:00",
                "checkin" => "07:00",
                "pool_spa" => [
                    "indoor_pool_seasonal"
                ],
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "special_diet_meal",
                    "breakfast_in_the_room"
                ],
                "wifi" => 1,
                "cover_image" => "img/hotel/9f16480.jpg",
                "images" => [
                    "img/hotel/7d35aed0.png",
                    "img/hotel/45b6f5d1.png",
                    "img/hotel/8390ff12.png",
                    "img/hotel/eb7fe993.png",
                    "img/hotel/4c9a0b44.png",
                    "img/hotel/d2a92b25.png",
                    "img/hotel/edf5fd16.png",
                    "img/hotel/cc295297.png",
                    "img/hotel/411b4ed8.png",
                    "img/hotel/26a74f39.png",
                    "img/hotel/689e22210.png",
                    "img/hotel/72a2cd611.png",
                    "img/hotel/912b9b212.png",
                    "img/hotel/7b1e90813.png",
                    "img/hotel/a4feebe14.png",
                    "img/hotel/b3210c815.png"
                ],
                "is_journalist" => 1
            ],
            [
                "objectId" => "hrGAttFT5i",
                "average_rate" => "8",
                "name" => "Decor Hotel",
                "updatedAt" => "2017-01-17T15:32:18.028Z",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "status" => 0,
                "type" => "Hotel",
                "homepage" => 0,
                "min_rate" => 50,
                "createdAt" => "2016-04-12T07:56:14.460Z",
                "asem" => 1,
                "address" => "Bayangol district, 4th khoroo, enkh taivnii urgun chuluu 93",
                "website" => "",
                "short_desc" => "Offering a restaurant, Decor Hotel is located in Ulaanbaatar. Free WiFi access is available.",
                "city" => "Ulaanbaatar",
                "long_desc" => "Each room here will provide you with a TV, air conditioning and a minibar. There is also a dining table. Featuring a shower, private bathroom also comes with a hairdryer.\r\nAt Decor Hotel you will find a 24-hour front desk and a mini-market. Other facilities offered at the property include a tour desk, luggage storage and shops (on site). The property offers free parking.\r\nThe hotel is 2.1 km from Ulaanbaatar Opera House, 2.8 km from National Museum of Mongolian History and 2.9 km from Chinggis Khan Statue. Chinggis Khaan International Airport is 12 km away. ",
                "credit_card" => 0,
                "section" => 7,
                "chain_name" => "",
                "num_rooms" => 30,
                "zipcode" => "831555",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.916008274026,
                    "longitude" => 106.88655495644
                ],
                "phone" => "+976 70129718",
                "country" => "mn",
                "stars" => 3,
                "children" => 0,
                "wifi" => 1,
                "checkinend" => "00:00",
                "parking" => 1,
                "front_desk" => [
                    "24_hour_front_desk"
                ],
                "pets" => 0,
                "breakfast" => 1,
                "checkin" => "09:00",
                "checkout" => "09:00",
                "cover_image" => "img/hotel/66077144.png",
                "images" => [
                    "img/hotel/cbc615f0.png",
                    "img/hotel/afbeee41.png",
                    "img/hotel/68c34752.png",
                    "img/hotel/62d5fd83.png",
                    "img/hotel/ae205644.png"
                ],
                "is_journalist" => 0
            ],
            [
                "objectId" => "iVVv2stEee",
                "average_rate" => "6",
                "homepage" => 0,
                "name" => "H9 Hotel Nine",
                "createdAt" => "2016-04-21T08:08:20.060Z",
                "min_rate" => 109,
                "updatedAt" => "2017-03-03T08:13:12.271Z",
                "status" => 1,
                "type" => "Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "asem" => 1,
                "city" => "Ulaanbaatar",
                "chain_name" => "",
                "section" => 7,
                "credit_card" => 0,
                "long_desc" => "Every room is equipped with a flat-screen TV. Certain rooms feature a seating area where you can relax. You will find a kettle in the room. Rooms come with a private or shared bathroom with bathrobes. For your comfort, you will find slippers and free toiletries.\r\nBike hire and car hire are available at this hotel and the area is popular for cycling.\r\nH9 Hotel Nine Ulaanbaatar is 400 m from Sukhbaatar Square. Chinggis Khaan International Airport is 14 km from the property. \r\nSukhbaatar is a great choice for travelers interested in history, nature and horseback riding.\r\nIt offesr you cozy atmosphere and comfortable rooms, fully equipped conference room for all kinds of business meetings and seminars, as well as variety of dining options including H9 restaurant and Bar, Modern Nomads and Double Shot Coffee and Cocktail.",
                "website" => "www.hotelnine.mn",
                "country" => "mn",
                "zipcode" => "212513",
                "phone" => "976-70363433",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.922209258665,
                    "longitude" => 106.92115545273
                ],
                "num_rooms" => 38,
                "address" => " Amar street 2, Sukhbaatar district, 8th khoroo, Ulaanbaatar, Mongolia, Sukhbaatar",
                "short_desc" => "H9 Hotel Nine Ulaanbaatar offers accommodation in Ulaanbaatar, only 300 m from Chinggis Khan Statue. ",
                "stars" => 3,
                "breakfast" => 1,
                "children" => 0,
                "pets" => 0,
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "wifi" => 1,
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "ticket_service",
                    "tour_desk",
                    "currency_exchange"
                ],
                "checkout" => "09:00",
                "checkin" => "09:00",
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "buffet_style_restraurant",
                    "bar",
                    "snack_bar"
                ],
                "parking" => 1,
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service"
                ],
                "others" => [
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "elevator"
                ],
                "checkinend" => "00:00",
                "transportation" => [
                    "bicycle_rental"
                ],
                "images" => [
                    "img/hotel/4f9c15b0.png",
                    "img/hotel/f21605d1.png",
                    "img/hotel/e9f20a62.png",
                    "img/hotel/56e16843.png",
                    "img/hotel/c9eb0be4.png",
                    "img/hotel/cbb9b3e5.png",
                    "img/hotel/1b4bd876.png",
                    "img/hotel/e26f1cb7.png",
                    "img/hotel/03052378.png"
                ],
                "cover_image" => "img/hotel/d8b50708.png",
                "is_journalist" => 0
            ],
            [
                "objectId" => "iobqh1OPED",
                "average_rate" => "75",
                "name" => "Platinum Hotel",
                "type" => "Hotel",
                "status" => 1,
                "updatedAt" => "2017-03-13T03:52:11.369Z",
                "homepage" => 0,
                "min_rate" => 90,
                "createdAt" => "2016-03-16T07:02:15.384Z",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "asem" => 1,
                "phone" => "+976 70128855",
                "section" => 7,
                "stars" => 4,
                "website" => "",
                "short_desc" => "Located in Ulaanbaatar city centre, Platinum Hotel features spacious and modern accommodations.",
                "address" => " Chagdarjav street-36 ，1-r khoroo, Sukhbaatar,",
                "zipcode" => "212513",
                "city" => "Ulaanbaatar",
                "country" => "mn",
                "credit_card" => 0,
                "num_rooms" => 48,
                "chain_name" => "",
                "long_desc" => "Free Wi-Fi access in rooms. There is a tour desk and a business centre in the hotel.\r\nIt is only a 5-minute walk from Hotel Platinum to Sukhbaatar Square. Chinggis Khaan International Airport is a 35-minute drive away.\r\nFitted with air conditioning and heating, rooms here offers carpeted flooring, flat-screen cable TV, iPod dock, sofa, air conditioning, heating, minibar and fridge. The en suite bathroom comes with shower facilities, bathrobes, slippers and free toiletries.\r\nAt Platinum Hotel you will find a 24-hour front desk. Ticketing service, car hire and currency exchange are available at tour desk.\r\nThe on-site restaurant SAPPHIRE serves both Mongolian food and a fine selection of authentic Western dishes. \r\nSukhbaatar is a great choice for travelers interested in nature, friendly people and culture.\r\nThis is our guests' favorite part of Ulaanbaatar, according to independent reviews.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.916681796146,
                    "longitude" => 106.92686319351
                ],
                "others" => [
                    "all_spaces_non_smoking",
                    "non_smoking_rooms",
                    "elevator",
                    "air_conditioning",
                    "heating"
                ],
                "food_drink" => [
                    "restraurant"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping"
                ],
                "pets" => 0,
                "activities" => [
                    "bowling"
                ],
                "checkinend" => "00:00",
                "parking" => 1,
                "checkout" => "09:00",
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout"
                ],
                "checkin" => "09:00",
                "wifi" => 1,
                "children" => 0,
                "breakfast" => 1,
                "cover_image" => "img/hotel/4ac8c975.png",
                "images" => [
                    "img/hotel/c6ec82b0.png",
                    "img/hotel/98a810a1.png",
                    "img/hotel/109aed52.png",
                    "img/hotel/03b40653.png",
                    "img/hotel/b01ce804.png",
                    "img/hotel/27d8a6a5.png"
                ],
                "fitness" => 0,
                "saun" => 0,
                "pool" => 0,
                "sold_out" => 0,
                "is_journalist" => 0
            ],
            [
                "objectId" => "kxZ156Losb",
                "name" => "Ramada Hotel",
                "type" => "Hotel",
                "homepage" => 0,
                "min_rate" => 170,
                "status" => 0,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "asem" => 1,
                "createdAt" => "2017-01-10T15:29:35.773Z",
                "updatedAt" => "2017-01-17T15:28:50.359Z",
                "average_rate" => "8",
                "credit_card" => 0,
                "city" => "Ulaanbaatar",
                "stars" => 4,
                "long_desc" => "Boasting a spa and wellness centre, fitness centre and gourmet cuisine across 2 stylish restaurant and bar, the 4-star Ramada Ulaanbaatar Citycenter is located in the city centre of Ulaanbaatar. Free Wi-Fi is provided in the entire property.\r\n\r\nEach guestroom is fitted with a flat-screen satellite TV, coffee machine and safety deposit box. The luxurious cotton sheets and fabric, modern interiors and warm light create an elegant atmosphere. Bathrobes and slippers are stocked in the bathrooms.\r\n\r\nGuests can relax in the sauna or hot tub, enjoy soothing massage treatment, use the facilities at the business centre, or rent a car to explore the surroundings. Staff can offer a wide range of services, including currency exchange, laundry and dry cleaning services. For anyone who fancies singing, there are karaoke rooms available.\r\n\r\nCafe JOT Restaurant serves a delicious selection of both Asian and western dishes. Alternatively, it is a good choice to spend a relaxing afternoon enjoying beverages and alcoholic drinks at Edge Bar.\r\n\r\nRamada Ulaanbaatar Citycenter is a 10-minute drive from Ulaanbaatar Railway Station. Chinggis Khaan International Airport is a 30-minute car journey away. \r\n\r\nBayangol is a great choice for travellers interested in temples, local food and excursions.\r\n\r\nWe speak your language!\r\n\r\nRamada Ulaanbaatar Citycenter has been welcoming Booking.com guests since 7 Nov 2012.\r\nHotel Rooms: 130, Hotel Chain: Ramada",
                "num_rooms" => 130,
                "website" => "www.ramadaub.mn",
                "phone" => "976-99066350",
                "country" => "mn",
                "zipcode" => "211238",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.915542076783,
                    "longitude" => 106.89241021872
                ],
                "chain_name" => "",
                "address" => " 16th Khoroo, Peace Avenue 35/2,Bayangol District, Bayangol, Ulaanbaatar, Mongolia ",
                "section" => 7,
                "short_desc" => "Boasting a spa and wellness centre, fitness centre and gourmet cuisine across 2 stylish restaurant and bar, the 4-star R",
                "entertainment" => [
                    "entertainment_staff"
                ],
                "shops" => [
                    "shops_onsite"
                ],
                "checkout" => "14:00",
                "children" => 1,
                "wifi" => 1,
                "transportation" => [
                    "airport_shuttle_free",
                    "shuttle_service_free"
                ],
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "hot_tub",
                    "fitness_center",
                    "hot_spring_bath",
                    "massage"
                ],
                "parking" => 1,
                "checkinend" => "16:30",
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "shoeshine"
                ],
                "others" => [
                    "elevator",
                    "air_conditioning",
                    "heating"
                ],
                "breakfast" => 1,
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "buffet_style_restraurant",
                    "bar",
                    "snack_bar",
                    "grocery_deliveries",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "pets" => 0,
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "ticket_service",
                    "tour_desk",
                    "currency_exchange",
                    "atm_on_site",
                    "baggage_storage",
                    "safe",
                    "newspapers"
                ],
                "common_area" => [
                    "terrace"
                ],
                "checkin" => "14:00",
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "cover_image" => "img/hotel/e5b4616.jpg",
                "images" => [
                    "img/hotel/191acf7.jpg",
                    "img/hotel/3c6269c.jpg",
                    "img/hotel/1187e17.jpg",
                    "img/hotel/68fbb00.jpg"
                ],
                "hq" => 0
            ],
            [
                "objectId" => "lMRLrUYW9c",
                "asem" => 1,
                "updatedAt" => "2017-01-11T03:30:31.251Z",
                "name" => "Shangri-La Hotel",
                "average_rate" => "5",
                "homepage" => 0,
                "status" => 0,
                "type" => "Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 1000000,
                "createdAt" => "2017-01-10T12:26:35.387Z",
                "num_rooms" => 290,
                "country" => "mn",
                "zipcode" => "212513",
                "long_desc" => "Featuring free WiFi throughout the property, Shangri-La Hotel, Ulaanbaatar is set in Ulaanbaatar, 200 m from Memorial Museum of Victims of Political Persecution. Guests can enjoy the on-site bar.\r\n\r\nEach room at this hotel is air conditioned and features a flat-screen TV with satellite TV. Certain units include a seating area where you can relax. Certain rooms feature views of the mountains or city. Rooms include a private bathroom equipped with a bath or shower. Extras include bath robes, slippers and free toiletries.\r\n\r\nThere is a 24-hour front desk at the property. Guests can enjoy a massage after a workout at the fitness centre. Currency exchange and car rental services are all provided upon request.\r\n\r\nChinggis Khan Statue is 800 m from Shangri-La Hotel, Ulaanbaatar, while National Museum of Mongolian History is 900 m away. The nearest airport is Chinggis Khaan International Airport, 14 km from the property. \r\n\r\nSukhbaatar is a great choice for travellers interested in tours, history and scenery.\r\n\r\nThis is our guests' favourite part of Ulaanbaatar, according to independent reviews.\r\n\r\nThis property also has one of the best-rated locations in Ulaanbaatar! Guests are happier about it compared to other properties in the area.\r\n\r\nThis property is also rated for the best value in Ulaanbaatar! Guests are getting more for their money when compared to other properties in this city.\r\n\r\nWe speak your language!\r\n\r\nShangri-La Hotel, Ulaanbaatar has been welcoming Booking.com guests since 11 May 2015.\r\nHotel Rooms: 290, Hotel Chain: Shangri-La Hotels & Resorts\r\n",
                "phone" => "976-99066350",
                "short_desc" => "eaturing free WiFi throughout the property, Shangri-La Hotel, Ulaanbaatar is set in Ulaanbaatar, 200 m from Memorial Mus",
                "chain_name" => "212513",
                "website" => "976-99066350",
                "city" => "Ulaanbaatar",
                "credit_card" => 1,
                "stars" => 3,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "address" => "19 Olympic Street, Sukhbaatar District-1, Sukhbaatar, Ulaanbaatar, Mongolia",
                "section" => 1,
                "hq" => 0
            ],
            [
                "objectId" => "oWEKaa7RZi",
                "updatedAt" => "2017-01-11T03:15:08.844Z",
                "average_rate" => 0,
                "status" => 0,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "asem" => 1,
                "createdAt" => "2016-06-28T01:01:04.128Z",
                "homepage" => 0,
                "min_rate" => 200,
                "name" => ".",
                "type" => "Hotel",
                "num_rooms" => 93,
                "country" => "mn",
                "website" => "",
                "chain_name" => "",
                "city" => "Ulaanbaatar",
                "address" => "Mahatma Gandhi street-39, Ulaanbaatar, Mongolia",
                "section" => 7,
                "credit_card" => 0,
                "long_desc" => "Stay in the heart of Ulaanbaatar – Show map\r\n\r\nOffering an indoor pool and a spa and wellness centre, The Corporate Hotel and Convention Centre is located in Ulaanbaatar. Free Wi-Fi access is available.\r\n\r\nEach room here will provide you with a TV, air conditioning and a hot tub. Featuring a shower, private bathroom also comes with a bath and a hairdryer. Extras include a minibar and a seating area.\r\n\r\nAt The Corporate Hotel and Convention Centre you will find a restaurant and a fitness centre. Others offered at the property include meeting facilities, luggage storage and an ironing service. The property offers free parking.\r\n\r\nThe Corporate Hotel and Convention Centre is a 10-minute walk from National Stadium and a 20-minute walk from National Park. Ulaanbaatar International Airport is about 40 minutes' drive away.\r\n\r\nThe on-site Chairman Restaurant serves authentic local food. ",
                "phone" => "976-70002040",
                "zipcode" => "212513",
                "stars" => 1,
                "short_desc" => "Offering an indoor pool and a spa and wellness centre. Each room here will provide you with a TV, air conditioning and a",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.90463437598,
                    "longitude" => 106.92041516304
                ],
                "children" => 0,
                "pets" => 0,
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "others" => [
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "elevator",
                    "air_conditioning",
                    "heating"
                ],
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "bar",
                    "packed_lunch",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "wifi" => 1,
                "checkout" => "09:00",
                "parking" => 1,
                "checkin" => "09:00",
                "checkinend" => "13:00",
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "ticket_service",
                    "tour_desk",
                    "currency_exchange",
                    "baggage_storage"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "breakfast" => 1,
                "pool_spa" => [
                    "indoor_pool_all_year",
                    "spa",
                    "sauna",
                    "fitness_center",
                    "massage"
                ],
                "cover_image" => "img/hotel/65a22c3.jpg",
                "hq" => 1,
                "hq_star" => 0
            ],
            [
                "objectId" => "okUfa3droF",
                "homepage" => 0,
                "createdAt" => "2017-01-10T15:00:36.987Z",
                "status" => 1,
                "min_rate" => 170,
                "asem" => 1,
                "average_rate" => 0,
                "updatedAt" => "2017-05-02T04:44:38.695Z",
                "name" => "The Corporate Hotel and Convention Centre",
                "type" => "Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "website" => "ihotel.mn",
                "long_desc" => "Offering an indoor pool and a spa and wellness centre, The Corporate Hotel and Convention Centre is located in Ulaanbaatar. Free Wi-Fi access is available.\r\n\r\nEach room here will provide you with a TV, air conditioning and a hot tub. Featuring a shower, private bathroom also comes with a bath and a hairdryer. Extras include a minibar and a seating area.\r\n\r\nAt The Corporate Hotel and Convention Centre you will find a restaurant and a fitness centre. Others offered at the property include meeting facilities, luggage storage and an ironing service. The property offers free parking.\r\n\r\nThe Corporate Hotel and Convention Centre is a 10-minute walk from National Stadium and a 20-minute walk from National Park. Ulaanbaatar International Airport is about 40 minutes' drive away.",
                "address" => " Mahatma Gandhi street-39, 212513 Ulaanbaatar, Mongolia",
                "chain_name" => "",
                "num_rooms" => 94,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.90370656698,
                    "longitude" => 106.9222176075
                ],
                "country" => "mn",
                "short_desc" => "Offering an indoor pool and a spa and wellness centre",
                "phone" => "+97699066350",
                "zipcode" => "212513",
                "section" => 7,
                "city" => "Ulaanbaatar",
                "credit_card" => 0,
                "stars" => 5,
                "breakfast" => 1,
                "pool_spa" => [
                    "indoor_pool_all_year",
                    "spa",
                    "sauna",
                    "fitness_center",
                    "massage"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "concierge_service",
                    "baggage_storage",
                    "lockers"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "children" => 1,
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine",
                    "suitpress"
                ],
                "checkinend" => "13:00",
                "parking" => 1,
                "wifi" => 1,
                "checkin" => "12:00",
                "checkout" => "11:00",
                "others" => [
                    "all_spaces_non_smoking",
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "elevator",
                    "soundproof_rooms",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "bar",
                    "packed_lunch",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "pets" => 0,
                "transportation" => [
                    "car_rentral",
                    "airport_shuttle_surcharge",
                    "airport_shuttle_free"
                ],
                "cover_image" => "img/hotel/3c121e4.jpg",
                "images" => [
                    "img/hotel/11db551.jpg",
                    "img/hotel/600b2a8.jpg",
                    "img/hotel/75e9c5a.jpg",
                    "img/hotel/7b58976.jpg",
                    "img/hotel/df314cd.jpg",
                    "img/hotel/1689228.jpg",
                    "img/hotel/0304d80.jpg",
                    "img/hotel/35bd3c9.jpg"
                ],
                "hq" => 1,
                "hq_star" => 4
            ],
            [
                "objectId" => "q0eyY9f5np",
                "average_rate" => "11",
                "asem" => 1,
                "type" => "Hotel",
                "createdAt" => "2016-05-26T02:32:28.230Z",
                "updatedAt" => "2017-05-05T08:36:44.761Z",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "status" => 0,
                "min_rate" => 80,
                "homepage" => 0,
                "name" => "Park Hotel",
                "long_desc" => "We are happy to introduce our modern designed business class 4 star hotel. Our mission is to fulfill needs and desire of our guests and international visitors in Ulaanbaatar.\r\nWe are offering the following services:\r\n- Comfortable 52 rooms\r\n- European cuisine restaurant \r\n- Coffee shop\r\n- Lounge Bar\r\n- VIP rooms\r\n- Conference hall\r\n- Meeting room\r\n- Fitness Center\r\n- Billiard room\r\n- Souvenir shop\r\n- Spa and Wellness center\r\n\r\nWe are confident that your business partners and friends will enjoy to be served by our hotel. ",
                "credit_card" => 0,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.921317714413,
                    "longitude" => 106.95291280746
                ],
                "phone" => "976 70161690",
                "city" => "Ulaanbaatar",
                "chain_name" => "",
                "country" => "mn",
                "num_rooms" => 52,
                "zipcode" => "112151",
                "website" => "www.park-hotel.mn",
                "stars" => 4,
                "address" => " it is a 10-minute drive from Sukhbaatar Square and Parliament of Mongolia.",
                "section" => 7,
                "short_desc" => "Park hotes is a 10-minute drive from Sukhbaatar Square and Parliament of Mongolia.",
                "checkout" => "09:00",
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "children" => 0,
                "checkinend" => "00:00",
                "common_area" => [
                    "shared_lounge_tv_area"
                ],
                "pets" => 0,
                "front_desk" => [
                    "24_hour_front_desk",
                    "express_checkin_checkout",
                    "ticket_service"
                ],
                "pool_spa" => [
                    "spa",
                    "fitness_center"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry"
                ],
                "breakfast" => 1,
                "others" => [
                    "all_spaces_non_smoking",
                    "non_smoking_rooms",
                    "elevator",
                    "heating"
                ],
                "checkin" => "09:00",
                "wifi" => 1,
                "parking" => 1,
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "cover_image" => "img/hotel/5c934d0.jpg",
                "images" => [
                    "img/hotel/e17f0d6.jpg",
                    "img/hotel/f9f513e.jpg",
                    "img/hotel/df51ecf.jpg",
                    "img/hotel/5219f7f.jpg",
                    "img/hotel/f6356aa.jpg",
                    "img/hotel/c4beebe.jpg",
                    "img/hotel/0fafc68.jpg",
                    "img/hotel/f5e87f0.jpg",
                    "img/hotel/4cb9e9a.jpg"
                ],
                "is_journalist" => 0
            ],
            [
                "objectId" => "rAoKCNUn9Y",
                "updatedAt" => "2017-01-10T14:56:10.618Z",
                "name" => "Зайсан Гейт",
                "type" => "Hotel",
                "homepage" => 1,
                "status" => 1,
                "createdAt" => "2016-01-26T17:20:11.206Z",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "average_rate" => "85",
                "long_desc" => "Зайсан гейт зочид буудал нь өндөр хурдны интернэт, хавтгай зурагт, минибар зэргээр тоноглогдсон 16 өрөө болон ресторан, лоунж зэргээр зочдод үйлчилж байна. \r\n\r\n",
                "city" => "Ulaanbaatar",
                "short_desc" => "Зайсан гейт зочид буудал нь үндсэний соёл амралтын хүрээлэнгээс 2.6 км -ийн зайд, Зайсангийн цэвэр агаарт байрладаг.",
                "country" => "mn",
                "section" => 7,
                "phone" => "+976 89013663",
                "chain_name" => "",
                "address" => "12-р Зайсангийн гудамж, 11-р хорооо",
                "credit_card" => 0,
                "zipcode" => "161517",
                "num_rooms" => 16,
                "website" => "",
                "stars" => 3,
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "bar",
                    "snack_bar",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "checkin" => "09:00",
                "front_desk" => [
                    "24_hour_front_desk"
                ],
                "checkout" => "09:00",
                "transportation" => [
                    "airport_shuttle_surcharge",
                    "shuttle_service_charge"
                ],
                "pets" => 0,
                "pool_spa" => [
                    "hot_tub"
                ],
                "checkinend" => "00:00",
                "parking" => 1,
                "children" => 1,
                "others" => [
                    "non_smoking_rooms",
                    "heating"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping"
                ],
                "breakfast" => 1,
                "wifi" => 1,
                "cover_image" => "img/hotel/297cc7a1.png",
                "images" => [
                    "img/hotel/672a8550.png",
                    "img/hotel/48849f41.png"
                ],
                "asem" => 0,
                "email" => "info@ihotel.mn",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.893107,
                    "longitude" => 106.908839
                ],
                "fitness" => 0,
                "saun" => 0,
                "pool" => 0,
                "min_rate" => 59,
                "sold_out" => 0,
                "is_journalist" => 0
            ],
            [
                "objectId" => "sgKl8yotiO",
                "average_rate" => 0,
                "updatedAt" => "2017-01-10T16:14:23.374Z",
                "status" => 0,
                "type" => "Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "asem" => 1,
                "name" => "Urgoo Hotel",
                "homepage" => 0,
                "min_rate" => 123,
                "createdAt" => "2016-03-16T09:00:29.649Z",
                "stars" => 3,
                "zipcode" => "260636",
                "phone" => "+976 7011 6044",
                "long_desc" => "Urgoo hotel features a restaurant, bar and free WiFi. Guests can enjoy the on-site restaurant.\r\nThe rooms are fitted with a flat-screen TV. Some rooms include a sitting area to relax in after a busy day. Certain rooms feature views of the garden or city. Each room includes a private bathroom.\r\nYou will find a 24-hour front desk at the property.\r\nThe hotel also provides car rental. Chinggis Khan Statue is 201 m from Urgoo hotel, and Sukhbaatar Square is 400 m from the property. The nearest airport is Chinggis Khaan International Airport, 14.5 km from the property. \r\n",
                "credit_card" => 0,
                "chain_name" => "",
                "website" => "",
                "num_rooms" => 10,
                "city" => "Ulaanbaatar",
                "short_desc" => "Located in the Chingeltei neighborhood in Ulaanbaatar, 100 m from National Museum of Mongolian History",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.919795,
                    "longitude" => 106.914911
                ],
                "country" => "mn",
                "address" => " Number 6, M100 Building, Tourist Street, Khoroo-1, Chingeltei District,",
                "section" => 7,
                "pets" => 0,
                "checkout" => "00:00",
                "parking" => 0,
                "wifi" => 0,
                "breakfast" => 0,
                "checkin" => "07:00",
                "checkinend" => "12:30",
                "children" => 0,
                "cover_image" => "img/hotel/80271fb2.png",
                "images" => [
                    "img/hotel/34e771a0.png",
                    "img/hotel/065a3fd1.png",
                    "img/hotel/795be8d2.png"
                ],
                "fitness" => 0,
                "saun" => 0,
                "pool" => 0,
                "sold_out" => 0,
                "is_journalist" => 0
            ],
            [
                "objectId" => "tFt4tyN397",
                "homepage" => 0,
                "asem" => 1,
                "type" => "Hotel",
                "name" => "Mika Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "createdAt" => "2016-04-12T05:08:05.010Z",
                "average_rate" => "15",
                "status" => 1,
                "updatedAt" => "2016-06-20T06:44:34.287Z",
                "min_rate" => 110,
                "phone" => "+976 11310903 , +976 11310578",
                "long_desc" => "Nestled in the heart of Sukhbaatar, Mika Hotel is an ideal spot from which to discover Ulaanbaatar. The hotel is not too far from the city center: just 2.2 km away, and it normally takes about 28 minutes to reach the airport. With its convenient location, the hotel offers easy access to the city's must-see destinations.\r\nMika Hotel also offers many facilities to enrich your stay in Ulaanbaatar. Guests of the hotel can enjoy on-site features like free Wi-Fi in all rooms, 24-hour front desk, luggage storage, Wi-Fi in public areas, car park.\r\nThe hotel features 14 appointed guest rooms, many of which include internet access – wireless, internet access – wireless (complimentary), non smoking rooms, heating, desk. Besides, the hotel's host of recreational offerings ensures you have plenty to do during your stay. ",
                "city" => "Ulaanbaatar",
                "stars" => 3,
                "credit_card" => 0,
                "short_desc" => "Mika Hotel is an ideal place of stay for travelers seeking charm, comfort and convenience in Ulaanbaatar.",
                "zipcode" => "14210",
                "section" => 7,
                "website" => "",
                "country" => "mn",
                "num_rooms" => 14,
                "address" => "Foreign Embassy’s Street, 1st khoroo, Sukhbaatar district, Olympic 8, Mika hotel, Ulaanbaatar, Mongolia",
                "chain_name" => "",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.915208005945,
                    "longitude" => 106.92119836807
                ],
                "shops" => [
                    "shops_onsite"
                ],
                "breakfast" => 1,
                "checkin" => "09:00",
                "cleaning" => [
                    "laundry"
                ],
                "parking" => 1,
                "children" => 1,
                "business_fac" => [
                    "business_center"
                ],
                "wifi" => 1,
                "others" => [
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "heating"
                ],
                "checkout" => "09:00",
                "checkinend" => "00:00",
                "food_drink" => [
                    "restraurant"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "baggage_storage"
                ],
                "pets" => 0,
                "cover_image" => "img/hotel/ea30bb82.png",
                "images" => [
                    "img/hotel/0f28b880.png",
                    "img/hotel/39c59a31.png",
                    "img/hotel/b8322512.png"
                ],
                "is_journalist" => 0
            ],
            [
                "objectId" => "tLaW8QkIoh",
                "average_rate" => "6",
                "createdAt" => "2017-01-10T15:20:31.185Z",
                "min_rate" => 150,
                "name" => "Puma Imperial Hotel",
                "status" => 0,
                "type" => "Hotel",
                "asem" => 1,
                "updatedAt" => "2017-05-05T08:36:39.465Z",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "homepage" => 0,
                "chain_name" => "",
                "long_desc" => "Located in the heart of Ulaanbaatar city, Puma Imperial Hotel is surrounded by National Historical Museum, Natural History Museum, Science Cultural Centre and Central Post Office. It offers several meeting rooms and accommodation and 3 dining options. Free Wi-Fi is provided.\r\n\r\nPuma Imperial Hotel is a 10-minute drive from the Railway Station. Chinggis Khaan International Airport is a 16-minute car journey away.\r\n\r\nDecorated in Russian style, each guestroom is fitted with a flat-screen TV with cable channels, a writing desk and an electric kettle. The attached bathroom has a walk-in shower and a bathtub.\r\n\r\nGuests can rent a car to explore the surroundings, or catch up with the last-minute work at the business centre. Hotel provides a 24-hour front desk and currency exchange service.",
                "address" => " University Street, Sukhbaatar, 210646 Ulaanbaatar, Mongolia",
                "country" => "mn",
                "stars" => 3,
                "num_rooms" => 27,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.921389613713,
                    "longitude" => 106.91951930523
                ],
                "phone" => "+97699066350",
                "city" => "Ulaanbaatar",
                "short_desc" => "Offers several meeting rooms and accommodation and 3 dining options. Free Wi-Fi is provided.",
                "section" => 7,
                "credit_card" => 0,
                "zipcode" => "210646",
                "website" => "Ihotel.mn",
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "food_drink" => [
                    "restraurant",
                    "special_diet_meal",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "checkin" => "12:00",
                "pets" => 0,
                "entertainment" => [
                    "baby_sitting_child_services"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "concierge_service",
                    "ticket_service",
                    "currency_exchange",
                    "baggage_storage",
                    "newspapers"
                ],
                "checkout" => "11:00",
                "others" => [
                    "non_smoking_rooms",
                    "elevator",
                    "air_conditioning",
                    "heating"
                ],
                "parking" => 2,
                "children" => 0,
                "breakfast" => 1,
                "transportation" => [
                    "car_rentral",
                    "airport_shuttle_surcharge"
                ],
                "wifi" => 1,
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry"
                ],
                "checkinend" => "14:00",
                "cover_image" => "img/hotel/8641982.jpg",
                "images" => [
                    "img/hotel/75fece9.jpg",
                    "img/hotel/ced54bc.jpg",
                    "img/hotel/9778dce.jpg",
                    "img/hotel/3a361c0.jpg",
                    "img/hotel/38debe3.jpg",
                    "img/hotel/a5089ba.jpg"
                ],
                "hq" => 0
            ],
            [
                "objectId" => "uTwM5sBjTr",
                "createdAt" => "2017-01-10T12:20:34.718Z",
                "name" => "Best Western Premier Tuushin Hotel",
                "asem" => 1,
                "type" => "Hotel",
                "updatedAt" => "2017-04-01T06:26:56.026Z",
                "homepage" => 0,
                "min_rate" => 236,
                "status" => 0,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "average_rate" => "175",
                "website" => "ihotel.mn",
                "address" => "Prime Minister Amar Street 15, Sukhbaatar, 212513 Ulaanbaatar, Mongolia",
                "short_desc" => "Centrally located in Ulaanbaatar",
                "section" => 7,
                "num_rooms" => 198,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.920203262491,
                    "longitude" => 106.92049965262
                ],
                "credit_card" => 0,
                "long_desc" => "Centrally located in Ulaanbaatar, Best Western Premier Tuushin Hotel is only a 2-minute stroll from State Government House and a 2-minute walk from Sukhbaatar Square. It features free Wi-Fi in all areas and numerous leisure options including a fitness center and mineral bath.\r\n\r\nBest Western Tuushin is a 4-minute walk from National Museum of Mongolian History and an 8-minute walk from Zanabazar Museum of Fine Arts. Chinggis Khaan International Airport is 14 km away. Chargeable shuttle service from Chinggis Khaan International Airport or Ulaanbaatar Railway Station is available with reservation.",
                "country" => "mn",
                "chain_name" => "",
                "zipcode" => "212513",
                "stars" => 5,
                "phone" => "97699066350",
                "city" => "Ulaanbaatar",
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "buffet_style_restraurant",
                    "bar",
                    "snack_bar",
                    "bbq_facilities",
                    "special_diet_meal",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "checkinend" => "14:00",
                "breakfast" => 1,
                "others" => [
                    "non_smoking_rooms",
                    "facilities_for_disabled_guests",
                    "elevator",
                    "honeymoon_suite",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "checkout" => "11:00",
                "children" => 0,
                "wifi" => 1,
                "parking" => 1,
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine",
                    "suitpress"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "entertainment" => [
                    "evening_entertainment",
                    "baby_sitting_child_services"
                ],
                "checkin" => "12:00",
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "fitness_center",
                    "hot_spring_bath",
                    "massage"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "concierge_service",
                    "ticket_service",
                    "tour_desk",
                    "currency_exchange",
                    "atm_on_site",
                    "baggage_storage"
                ],
                "transportation" => [
                    "car_rentral",
                    "airport_shuttle_surcharge",
                    "shuttle_service_charge"
                ],
                "cover_image" => "img/hotel/c556f5e.jpg",
                "images" => [
                    "img/hotel/64e977b.jpg",
                    "img/hotel/e3ef617.jpg",
                    "img/hotel/c1d0337.jpg"
                ],
                "hq" => 1,
                "hq_star" => 2,
                "cancelation" => 1
            ],
            [
                "objectId" => "vkbW6u2w1b",
                "asem" => 1,
                "name" => "Kempinski Khan Hotel ",
                "average_rate" => "13",
                "homepage" => 0,
                "type" => "Hotel",
                "createdAt" => "2017-01-10T15:45:18.086Z",
                "updatedAt" => "2017-03-23T10:14:46.815Z",
                "status" => 0,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 209,
                "long_desc" => "Kempinski Hotel Khan Palace is a 2.2 km from the Chinggis Khan Square in the city centre. The 5-star luxurious hotel features a well-equipped fitness centre, a Spa and free Wi-Fi in all areas.\r\n\r\nKempinski Hotel Khan Palace is 4.6 km from Gandan Monastery and 17.5 km from Chinggis Khaan International Airport.\r\n\r\nThe spacious rooms are fitted with modern furnishings, pleasant neutral shades and soft carpeted flooring. They also offer an air purifier, a large working desk with ergonomic chair, an individually adjustable climate controller and a pillow menu. The en suite bathrooms have washlets.",
                "zipcode" => "210646",
                "country" => "mn",
                "num_rooms" => 70,
                "chain_name" => "",
                "website" => "ihotel.mn",
                "phone" => "976-99066350; 976-90009090",
                "section" => 7,
                "short_desc" => "The 5-star luxurious hotel features a well-equipped fitness centre, a Spa and free Wi-Fi in all areas.",
                "credit_card" => 1,
                "stars" => 5,
                "address" => "East Cross Road, Peace Avenue, Bayanzurkh, 210646 Ulaanbaatar, Mongolia",
                "city" => "Ulaanbaatar",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.91984016168,
                    "longitude" => 106.94394350052
                ],
                "parking" => 1,
                "breakfast" => 1,
                "checkout" => "11:00",
                "checkinend" => "14:00",
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "fitness_center",
                    "massage"
                ],
                "wifi" => 1,
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "fax_photocopying"
                ],
                "transportation" => [
                    "car_rentral",
                    "airport_shuttle_surcharge"
                ],
                "children" => 1,
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine",
                    "suitpress"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "concierge_service",
                    "tour_desk",
                    "currency_exchange",
                    "baggage_storage",
                    "lockers",
                    "safe",
                    "newspapers"
                ],
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "buffet_style_restraurant",
                    "bar",
                    "packed_lunch",
                    "special_diet_meal",
                    "breakfast_in_the_room"
                ],
                "pets" => 0,
                "checkin" => "12:00",
                "others" => [
                    "non_smoking_rooms",
                    "facilities_for_disabled_guests",
                    "elevator",
                    "air_conditioning",
                    "heating"
                ],
                "cover_image" => "img/hotel/b41f386.jpg",
                "images" => [
                    "img/hotel/9bea6ab.jpg",
                    "img/hotel/d89dad8.jpg",
                    "img/hotel/019a55f.jpg",
                    "img/hotel/899fd8b.jpg"
                ],
                "hq" => 0
            ],
            [
                "objectId" => "vrrPDnTXdN",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "status" => 1,
                "average_rate" => "289",
                "homepage" => 0,
                "type" => "Hotel",
                "updatedAt" => "2017-03-23T10:14:11.810Z",
                "name" => "Bayangol Hotel",
                "createdAt" => "2015-12-07T00:54:43.797Z",
                "country" => "mn",
                "section" => 7,
                "address" => "Chinggis Avenue-5",
                "short_desc" => "Bayangol Hotel opens since 1964 and it has always played a significant role in the Mongolian tourism and hospitality.",
                "phone" => "(+976)-11-328869",
                "stars" => 4,
                "num_rooms" => 212,
                "website" => "www.bayangolhotel.mn",
                "chain_name" => "",
                "credit_card" => 0,
                "city" => "Ulaanbaatar",
                "long_desc" => "10 minute drive from Ulaanbaatar Railway Station.\r\nIt offers a fitness centre, an on-site restaurant and convenient guest services. Free Wi-Fi and parking is provided.\r\nAll units come with a fridge, an electric kettle, a flat-screen satellite TV, a work and ironing facilities. A hairdryer, slippers and shower facilities are provided in the en suite bathrooms.\r\nGuests can work out at the fitness centre or arrange trips from the tour desk. Currency exchange and room service are all available upon request. There is also an ATM machine on site.\r\nAn extensive selection of Western and Asian food can be enjoyed at the in-house restaurant. \r\n",
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center"
                ],
                "breakfast" => 1,
                "wifi" => 1,
                "parking" => 1,
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "ticket_service",
                    "currency_exchange"
                ],
                "checkout" => "09:00",
                "checkinend" => "12:00",
                "others" => [
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "elevator",
                    "heating"
                ],
                "common_area" => [
                    "terrace"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine",
                    "suitpress"
                ],
                "entertainment" => [
                    "baby_sitting_child_services"
                ],
                "checkin" => "09:00",
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "snack_bar",
                    "packed_lunch",
                    "room_service"
                ],
                "shops" => [
                    "shops_onsite",
                    "souviner_gift_shop"
                ],
                "pool_spa" => [
                    "fitness_center"
                ],
                "children" => 1,
                "pets" => 0,
                "images" => [
                    "img/hotel/0c2f9240.png",
                    "img/hotel/39053961.png",
                    "img/hotel/92eccb12.png",
                    "img/hotel/ea413ce3.png",
                    "img/hotel/01841df4.png"
                ],
                "cover_image" => "img/hotel/57fbccd4.png",
                "asem" => 1,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.912293559084,
                    "longitude" => 106.91395640373
                ],
                "email" => "info@ihotel.mn",
                "rs_name" => "bayangol",
                "zipcode" => "210643",
                "min_rate" => 135,
                "fitness" => 0,
                "saun" => 0,
                "pool" => 0,
                "sold_out" => 0,
                "is_journalist" => 1
            ],
            [
                "objectId" => "yMc9Ba3dqX",
                "asem" => 1,
                "status" => 1,
                "createdAt" => "2016-04-21T02:50:09.491Z",
                "type" => "Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 120,
                "average_rate" => "14",
                "homepage" => 0,
                "name" => "Premium Hotel",
                "updatedAt" => "2017-01-13T06:13:19.238Z",
                "zipcode" => "151500",
                "long_desc" => "Featuring free WiFi, a restaurant and a terrace, Premium Hotel Ulaanbaatar offers accommodations in Ulaanbaatar. Guests can enjoy the on-site bar. Free private parking is available on site.\r\n\r\nCertain units include a sitting area where you can relax.\r\n\r\nYou will find a 24-hour front desk, an ATM, hairdresser's and gift shop at the property.\r\n\r\nThe hotel also provides car rental. Ulaanbaatar Opera House is 501 m from Premium Hotel Ulaanbaatar, and National Museum of Mongolian History is 1.1 km from the property. The nearest airport is Chinggis Khaan International Airport, 14.5 km from Premium Hotel Ulaanbaatar. ",
                "num_rooms" => 71,
                "address" => "Toiruu Street, Chingeltei District-5,, Chingeltei, ",
                "credit_card" => 0,
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.924878407151,
                    "longitude" => 106.90243162215
                ],
                "website" => "www.premiumhotel.mn",
                "stars" => 4,
                "chain_name" => "",
                "phone" => "976-77168888",
                "country" => "mn",
                "section" => 7,
                "short_desc" => "Featuring free WiFi, a restaurant and a terrace, Premium Hotel Ulaanbaatar offers accommodations in Ulaanbaatar.",
                "city" => "Ulaanbaatar",
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "bar",
                    "snack_bar",
                    "grocery_deliveries",
                    "special_diet_meal",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "children" => 0,
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "concierge_service",
                    "ticket_service",
                    "tour_desk",
                    "currency_exchange",
                    "atm_on_site",
                    "baggage_storage",
                    "lockers",
                    "safe"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "entertainment" => [
                    "karoake"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "wifi" => 1,
                "pool_spa" => [
                    "fitness_center",
                    "massage"
                ],
                "pets" => 0,
                "checkinend" => "13:00",
                "checkin" => "11:30",
                "others" => [
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "elevator",
                    "air_conditioning",
                    "heating"
                ],
                "breakfast" => 1,
                "checkout" => "00:00",
                "parking" => 1,
                "transportation" => [
                    "car_rentral",
                    "airport_shuttle_surcharge",
                    "shuttle_service_charge"
                ],
                "cover_image" => "img/hotel/a6b8ba63.png",
                "images" => [
                    "img/hotel/aa1335f0.png",
                    "img/hotel/e4310851.png",
                    "img/hotel/99510932.png",
                    "img/hotel/811ad523.png"
                ],
                "is_journalist" => 1
            ],
            [
                "objectId" => "ybVDUEDC5x",
                "type" => "Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "createdAt" => "2017-01-10T15:48:42.308Z",
                "homepage" => 0,
                "asem" => 1,
                "average_rate" => "15",
                "name" => "The Continental Hotel",
                "status" => 0,
                "updatedAt" => "2017-05-05T08:36:31.740Z",
                "min_rate" => 170,
                "address" => " Olympic street, Sukhbaatar, Ulaanbaatar, Mongolia",
                "phone" => "99066350",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.912617161581,
                    "longitude" => 106.92469596863
                ],
                "website" => "http://www.ubcontinentalhotel.com/",
                "country" => "mn",
                "long_desc" => "\r\nStay in the Heart of Ulaanbaatar – Show map\r\n\r\nThe Continental Hotel is located in the very centre of Ulaanbaatar, just opposite Mongolia National Amusement Park. Free WiFi access is available.\r\n\r\nThe hotel is only a 2-minute walk from Choijin Lama Museum and a 6-minute walk from Sukhbaatar Square. It is a 15-minute drive from Ulaanbaatar Railway Station and a 30-minute drive from Chiggis Khaan International Airport.\r\n\r\nEach room here will provide you with a TV, air conditioning and a terrace. There is also a refrigerator. Featuring a shower, private bathroom also comes with a bath and a hairdryer. Extras include a hot tub, a minibar and a seating area.\r\n\r\nAt The Continental Hotel you will find a 24-hour front desk, a terrace and a bar. Other facilities offered at the property include meeting facilities, a shared lounge and luggage storage. The property offers free parking. \r\n\r\nSukhbaatar is a great choice for travelers interested in tours, history and scenery.",
                "chain_name" => "",
                "city" => "Ulaanbaatar",
                "num_rooms" => 40,
                "zipcode" => "210648",
                "short_desc" => "The Continental Hotel is located in the very centre of Ulaanbaatar, just opposite Mongolia National Amusement Park",
                "credit_card" => 0,
                "stars" => 3,
                "section" => 7,
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "concierge_service",
                    "currency_exchange",
                    "baggage_storage"
                ],
                "children" => 0,
                "checkin" => "09:00",
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "bar",
                    "snack_bar",
                    "packed_lunch",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "parking" => 1,
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "checkout" => "09:00",
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "pets" => 0,
                "wifi" => 1,
                "breakfast" => 1,
                "pool_spa" => [
                    "sauna",
                    "hot_tub",
                    "fitness_center"
                ],
                "checkinend" => "13:00",
                "others" => [
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "elevator",
                    "heating"
                ],
                "cover_image" => "img/hotel/0c75bc5.jpg",
                "images" => [
                    "img/hotel/ffa0685.jpg",
                    "img/hotel/76b0f7f.jpg",
                    "img/hotel/3b0891a.jpg"
                ],
                "hq" => 0
            ],
            [
                "objectId" => "yqsBwJ4QAI",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "createdAt" => "2017-01-10T14:28:06.512Z",
                "homepage" => 1,
                "min_rate" => 288,
                "name" => "Shangri-La Hotel",
                "type" => "Hotel",
                "average_rate" => 0,
                "status" => 1,
                "asem" => 1,
                "updatedAt" => "2017-05-02T04:33:55.314Z",
                "stars" => 5,
                "address" => "19 Olympic Street, Sukhbaatar District-1, Sukhbaatar, Ulaanbaatar, Mongolia",
                "long_desc" => "Featuring free WiFi throughout the property, Shangri-La Hotel, Ulaanbaatar is set in Ulaanbaatar, 200 m from Memorial Museum of Victims of Political Persecution. Guests can enjoy the on-site bar.\r\n\r\nEach room at this hotel is air conditioned and features a flat-screen TV with satellite TV. Certain units include a seating area where you can relax. Certain rooms feature views of the mountains or city. Rooms include a private bathroom equipped with a bath or shower. Extras include bath robes, slippers and free toiletries.\r\n\r\nThere is a 24-hour front desk at the property. Guests can enjoy a massage after a workout at the fitness centre. Currency exchange and car rental services are all provided upon request.\r\n\r\nChinggis Khan Statue is 800 m from Shangri-La Hotel, Ulaanbaatar, while National Museum of Mongolian History is 900 m away. The nearest airport is Chinggis Khaan International Airport, 14 km from the property. \r\n\r\nSukhbaatar is a great choice for travellers interested in tours, history and scenery.\r\n\r\nThis is our guests' favourite part of Ulaanbaatar, according to independent reviews.\r\n\r\nThis property also has one of the best-rated locations in Ulaanbaatar! Guests are happier about it compared to other properties in the area.\r\n\r\nThis property is also rated for the best value in Ulaanbaatar! Guests are getting more for their money when compared to other properties in this city.\r\n\r\nWe speak your language!\r\n\r\nShangri-La Hotel, Ulaanbaatar has been welcoming Booking.com guests since 11 May 2015.\r\nHotel Rooms: 290, Hotel Chain: Shangri-La Hotels & Resorts\r\n",
                "phone" => "976-99066350",
                "credit_card" => 0,
                "website" => "http://www.shangri-la.com/ulaanbaatar",
                "city" => "Ulaanbaatar",
                "chain_name" => "",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.912940762054,
                    "longitude" => 106.92022204399
                ],
                "num_rooms" => 290,
                "section" => 7,
                "zipcode" => "212513",
                "short_desc" => "Featuring free WiFi throughout the property, Shangri-La Hotel, Ulaanbaatar is set in Ulaanbaatar, 200 m from Memorial Mu",
                "country" => "mn",
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "buffet_style_restraurant",
                    "bar",
                    "snack_bar",
                    "special_diet_meal",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "wifi" => 1,
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "checkout" => "14:00",
                "activities" => [
                    "tennis_court"
                ],
                "common_area" => [
                    "terrace"
                ],
                "children" => 1,
                "entertainment" => [
                    "karoake",
                    "kids_club"
                ],
                "checkinend" => "12:00",
                "parking" => 1,
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping"
                ],
                "breakfast" => 1,
                "pets" => 0,
                "checkin" => "14:00",
                "others" => [
                    "elevator",
                    "air_conditioning",
                    "heating"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "ticket_service",
                    "tour_desk",
                    "currency_exchange",
                    "atm_on_site",
                    "baggage_storage",
                    "safe",
                    "newspapers"
                ],
                "shops" => [
                    "shops_onsite",
                    "convenience_store",
                    "souviner_gift_shop"
                ],
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "fitness_center",
                    "massage"
                ],
                "cover_image" => "img/hotel/1e4464e.jpg",
                "images" => [
                    "img/hotel/1b77cea.jpg",
                    "img/hotel/b827426.jpg",
                    "img/hotel/92c2a33.jpg",
                    "img/hotel/ddd20d5.jpg"
                ],
                "hq" => 1,
                "hq_star" => 5,
                "cancelation" => 1
            ],
            [
                "objectId" => "LGNBEg6Oqn",
                "status" => 1,
                "asem" => 1,
                "average_rate" => "14",
                "min_rate" => 220,
                "homepage" => 0,
                "type" => "Hotel",
                "createdAt" => "2017-01-20T08:07:04.432Z",
                "updatedAt" => "2017-04-01T06:27:24.205Z",
                "name" => "Chinggis Khaan Hotel",
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Tokyo Street 10, Bayanzurkh, 211238 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350",
                "stars" => 4,
                "num_rooms" => 130,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 0,
                "short_desc" => "Stay in the heart of Ulaanbaatar!",
                "long_desc" => "Located on Tokyo Street and Beijing Street, within a 15-minute walk from the major government, business and cultural centres, the 4-star Chinggis Khaan Hotel enjoys a quiet location in a primary residential area. It houses an indoor swimming pool, massage and sauna services, a trendy nightclub, karaoke rooms and a variety of dining options. Free Wi-Fi is provided.\r\n\r\nChinggis Khaan Hotel is a 5-minute drive from the city centre. It takes 15 minutes by car to Ulaanbaatar Railway Station. Ulaanbaatar International Airport is about 30 minutes' drive away.\r\n\r\nAll spacious rooms and suites come with remote lighting controls, a minibar, a cable TV, an in-room safe, a tea/coffee maker, ironing facilities, soundproofed windows and an en suite bathroom with a bathtub. Some units feature beautiful city or river views.\r\n\r\nGuests can work out at the fitness centre, make use of the 300-square-metre function and meeting facilities or arrange their trips from the tour desk. After a day of tours, reading in the quiet library seems relaxing as well.\r\n\r\nRestaurant on the 5th floor with lovely skyline views serves continental and authentic Mongolian cuisine. Chinese food can be enjoyed at Mr. Wang Restaurant. The \"Ti Amo\" Bistro which is located in the closet shopping mall serves light meals and snacks. \r\n\r\nWe speak your language!",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.919270115008,
                    "longitude" => 106.93190842867
                ],
                "zipcode" => "211238",
                "section" => 7,
                "checkin" => "07:00",
                "checkinend" => "13:00",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "activities" => [
                    "horseback_riding",
                    "cycling"
                ],
                "food_drink" => [
                    "restraurant",
                    "buffet_style_restraurant",
                    "bar",
                    "snack_bar",
                    "special_diet_meal",
                    "breakfast_in_the_room"
                ],
                "transportation" => [
                    "bicycle_rental",
                    "airport_shuttle_surcharge",
                    "shuttle_service_charge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "concierge_service",
                    "ticket_service",
                    "tour_desk",
                    "currency_exchange",
                    "atm_on_site",
                    "baggage_storage",
                    "lockers",
                    "newspapers"
                ],
                "common_area" => [
                    "terrace",
                    "shared_lounge_tv_area",
                    "library"
                ],
                "entertainment" => [
                    "nightclub_dj",
                    "karoake",
                    "baby_sitting_child_services"
                ],
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "suitpress"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "shops" => [
                    "shops_onsite",
                    "hair_beauty_salon"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "elevator",
                    "soundproof_rooms",
                    "vip_room_facilities",
                    "air_conditioning"
                ],
                "images" => [
                    "img/hotel/ca31f16.jpg",
                    "img/hotel/f4ac64a.jpg",
                    "img/hotel/4122643.jpg",
                    "img/hotel/641f9a3.jpg",
                    "img/hotel/a5bb426.jpg",
                    "img/hotel/863f4de.jpg",
                    "img/hotel/29f8a26.jpg"
                ],
                "cover_image" => "img/hotel/556f3a5.jpg",
                "cancelation" => 1
            ],
            [
                "objectId" => "DxU21QEQ4F",
                "name" => "Ulaanbaatar Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 62,
                "status" => 1,
                "homepage" => 0,
                "average_rate" => "6",
                "createdAt" => "2017-03-09T03:46:49.650Z",
                "updatedAt" => "2017-05-02T04:57:44.622Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Sukhbaatar square-14, Sukhbaatar, ",
                "phone" => "99066350",
                "stars" => 5,
                "num_rooms" => 49,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 0,
                "short_desc" => "Situated in the real heart of Ulaanbaatar, excellent location! ",
                "long_desc" => "Offering free Wi-Fi in all areas, Ulaanbaatar Hotel is 200 m from State Opera & Ballet Theatre and 300 m from Sukhbaatar Square. All rooms come with a minibar and a flat-screen TV.\r\n\r\nUlaanbaatar Hotel is 320 m from Museum of History and 3 km from Ulaanbaatar Railway Station. The hotel offers a chargeable shuttle service to the airport, 17 km away.\r\n\r\nGuests can work out at the fitness centre, rent a car to explore the surroundings, or arrange sightseeing trips at the tour desk. Currency exchange and concierge service are also available. There is a gift shop on site for last minute purchase.\r\n\r\nAll air-conditioned rooms come with a writing desk and a telephone. En suite bathrooms include free toiletries, shower facilities and slippers.\r\n\r\nThe dining options on site include Ulaanbaatar Restaurant and European and Asian food at UB Bistro. \r\n\r\nSukhbaatar is a great choice for travellers interested in tours, history and nature.\r\n\r\nThis is our guests' favourite part of Ulaanbaatar, according to independent reviews.\r\n\r\nWe speak your language!\r\n\r\n",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.918989695906,
                    "longitude" => 106.92269235849
                ],
                "zipcode" => "212513",
                "section" => 7,
                "checkin" => "07:00",
                "checkinend" => "14:00",
                "checkout" => "05:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 2,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "buffet_style_restraurant",
                    "bar",
                    "special_diet_meal",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "sauna",
                    "fitness_center"
                ],
                "transportation" => [
                    "car_rentral",
                    "airport_shuttle_surcharge",
                    "airport_shuttle_free"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "concierge_service",
                    "ticket_service",
                    "tour_desk",
                    "currency_exchange",
                    "atm_on_site",
                    "baggage_storage",
                    "newspapers"
                ],
                "entertainment" => [
                    "baby_sitting_child_services"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "shoeshine"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "shops" => [
                    "shops_onsite",
                    "souviner_gift_shop"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/724faef.jpg",
                    "img/hotel/9ecf566.jpg",
                    "img/hotel/81dda46.jpg",
                    "img/hotel/0d360a7.jpg",
                    "img/hotel/b00fb7e.jpg",
                    "img/hotel/acb9dd2.jpg",
                    "img/hotel/b2c911f.jpg",
                    "img/hotel/17a02ee.jpg",
                    "img/hotel/ec9bffa.jpg",
                    "img/hotel/33aec3c.jpg"
                ],
                "cover_image" => "img/hotel/41fbd5d.jpg"
            ],
            [
                "objectId" => "pMrBzqzgOE",
                "name" => "Khuvsgul lake Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 80,
                "status" => 1,
                "homepage" => 1,
                "average_rate" => "10",
                "createdAt" => "2017-03-09T06:21:46.424Z",
                "updatedAt" => "2017-03-13T03:45:20.133Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "8 Khoroo, Sukhbaatar District City Tower, Chinggis Khan square 5, Baga Toiruu 14200, Sukhbaatar",
                "phone" => "976-99066350",
                "stars" => 3,
                "num_rooms" => 90,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 0,
                "short_desc" => "The Sukhbaatar Square, city center is 500 m from the property.",
                "long_desc" => "Stay in the heart of Ulaanbaatar \r\n\r\nFeaturing free WiFi throughout the property, Khuvsgul Lake Hotel offers accommodation in Ulaanbaatar. Guests can enjoy the on-site restaurant. Free private parking is available on site.\r\n\r\nA TV, as well as an iPad are available. Certain units include a seating area for your convenience. Some units feature views of the mountain or city. All rooms come with a private bathroom.\r\n\r\nThere is a hairdresser's at the property.\r\n\r\nThe hotel also offers bike hire. Chinggis Khan Statue is 300 m from Khuvsgul Lake Hotel, while Sukhbaatar Square is 500 m from the property. The nearest airport is Chinggis Khaan International Airport, 14 km from Khuvsgul Lake Hotel. \r\n\r\nSukhbaatar is a great choice for travellers interested in tours, history and nature.\r\n\r\nThis is our guests' favourite part of Ulaanbaatar, according to independent reviews.\r\n\r\nWe speak your language!",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.91932044674,
                    "longitude" => 106.92083626986
                ],
                "zipcode" => "000976",
                "section" => 7,
                "checkin" => "07:00",
                "checkinend" => "14:00",
                "checkout" => "05:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "buffet_style_restraurant",
                    "bar",
                    "packed_lunch"
                ],
                "transportation" => [
                    "bicycle_rental",
                    "car_rentral",
                    "airport_shuttle_surcharge",
                    "shuttle_service_charge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "concierge_service",
                    "currency_exchange",
                    "baggage_storage",
                    "newspapers"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "shoeshine"
                ],
                "business_fac" => [
                    "business_center",
                    "fax_photocopying"
                ],
                "shops" => [
                    "hair_beauty_salon"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "air_conditioning"
                ],
                "images" => [
                    "img/hotel/8d41119.jpg",
                    "img/hotel/8677cd5.jpg",
                    "img/hotel/89e2004.jpg",
                    "img/hotel/e5d8817.jpg",
                    "img/hotel/dedb6a7.jpg",
                    "img/hotel/8ac5457.jpg"
                ],
                "cover_image" => "img/hotel/8a11446.jpg"
            ],
            [
                "objectId" => "HrQ0c0iYim",
                "name" => "Amarbayasgalant Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 1000000,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "8",
                "createdAt" => "2017-03-10T06:36:27.280Z",
                "updatedAt" => "2017-03-16T07:05:38.887Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Peace Avenue 15 A/5, Sukhbaatar district 1st khoroo, Ulaanbaatar 14210, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 3,
                "num_rooms" => 14,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "Silence, located heart of Ulaanbaatar city. 10 min walk to the Sukhbaatar Square, center of city.",
                "long_desc" => "Hotel is located about 10 minutes walk to the Sukhbaatar Square. They can store luggages while you are on a multi-day tour. ",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "142100",
                "section" => 0,
                "checkin" => "07:00",
                "checkinend" => "14:00",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 0,
                "children" => 0,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "buffet_style_restraurant",
                    "bar",
                    "grocery_deliveries",
                    "packed_lunch",
                    "special_diet_meal",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "sauna"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "concierge_service",
                    "currency_exchange",
                    "baggage_storage",
                    "newspapers"
                ],
                "others" => [
                    "adults_only",
                    "non_smoking_rooms",
                    "soundproof_rooms",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping"
                ],
                "common_area" => [
                    "shared_lounge_tv_area"
                ],
                "business_fac" => [
                    "fax_photocopying"
                ]
            ],
            [
                "objectId" => "Nf9Uc3GM0B",
                "name" => "Zaluuchuud Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 45,
                "status" => 1,
                "homepage" => 0,
                "average_rate" => "13",
                "createdAt" => "2017-03-13T09:35:49.720Z",
                "updatedAt" => "2017-03-13T10:05:14.808Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Baga toiruu 43, Sukhbaatar, 212513 Ulaanbaatar, Mongolia ",
                "phone" => "976-99066350",
                "stars" => 3,
                "num_rooms" => 35,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 0,
                "short_desc" => "Offering a restaurant and free bikes, Zaluuchuud Hotel Ulaanbaatar is located in the heart of Ulaanbaatar.",
                "long_desc" => "Each room here will provide you with a TV, a hot tub and a minibar. Complete with a refrigerator, the dining area also has an electric kettle. Featuring a bathtub, en suite bathroom also comes with a shower. Extras include a seating area. Free bottled drinking water is offered in each unit.\r\n\r\nAt Zaluuchuud Hotel Ulaanbaatar you will find a 24-hour front desk and a mini-market. Other facilities offered at the property include a shared lounge, a games room and ticketing service. Day trip in the city or surroundings can be arranged at an extra cost. All-day laundry service is provided on site.\r\n\r\nThe hotel is a 5-minute walk from Sukhbaatar Square, a 6-minute walk from Chinggis Khan Statue and a 7-minute walk from National Museum of Mongolian History. Chinggis Khaan International Airport is 25 minutes' drive away.\r\n\r\nGuests can enjoy a fine selection of European and Mongolia dishes in Restaurant Zaluuchuud. ",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.923306479598,
                    "longitude" => 106.92171469331
                ],
                "zipcode" => "212513",
                "section" => 7,
                "checkin" => "08:00",
                "checkinend" => "13:00",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 2,
                "children" => 1,
                "pets" => 0,
                "activities" => [
                    "tennis_court",
                    "pool_table",
                    "cycling"
                ],
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "buffet_style_restraurant",
                    "bar",
                    "room_service"
                ],
                "pool_spa" => [
                    "sauna"
                ],
                "transportation" => [
                    "bikes_available_free",
                    "airport_shuttle_surcharge",
                    "shuttle_service_charge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "ticket_service",
                    "currency_exchange",
                    "baggage_storage",
                    "lockers",
                    "newspapers"
                ],
                "common_area" => [
                    "shared_lounge_tv_area",
                    "game_room"
                ],
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "shops" => [
                    "shops_onsite"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "facilities_for_disabled_guests",
                    "soundproof_rooms",
                    "air_conditioning"
                ],
                "images" => [
                    "img/hotel/74b23ca.jpg",
                    "img/hotel/d23a3f5.jpg",
                    "img/hotel/393c829.jpg",
                    "img/hotel/0c4c17e.jpg",
                    "img/hotel/16cee6f.jpg",
                    "img/hotel/d8ac213.jpg"
                ],
                "cover_image" => "img/hotel/6dbe934.jpg"
            ],
            [
                "objectId" => "IapAUJbbtO",
                "name" => "Flower Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 180,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "14",
                "createdAt" => "2017-03-13T10:06:26.353Z",
                "updatedAt" => "2017-05-05T08:36:20.624Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Zaluuchuud Avenue, 18, Bayanzurkh, 001334 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350",
                "stars" => 3,
                "num_rooms" => 51,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "Situated 1.6 km from Sukhbaatar Square in Ulaanbaatar, Flower Hotel features a restaurant and free WiFi.",
                "long_desc" => "The hotel has a spa centre and hot spring bath, and guests can enjoy a meal at the restaurant. Free private parking is available on site.\r\nAll rooms are equipped with a TV with cable channels. Some rooms include a seating area where you can relax. Some units feature views of the mountains or city. The rooms are equipped with a private bathroom. For your comfort, you will find bathrobes, slippers and free toiletries.\r\nThere is a 24-hour front desk, a business centre, hairdresser's, and gift shop at the property. Currency exchange and laundry service are offered upon request.\r\nChinggis Khan Statue is 1.6 km from Flower Hotel Ulaanbaatar, while National Museum of Mongolian History is 1.7 km from the property. Chinggis Khaan International Airport is 16 km away. ",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "001334",
                "section" => 7,
                "checkin" => "13:00",
                "checkinend" => "00:00",
                "checkout" => "04:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "buffet_style_restraurant",
                    "bar",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "fitness_center",
                    "hot_spring_bath",
                    "massage"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "ticket_service",
                    "tour_desk",
                    "baggage_storage",
                    "newspapers"
                ],
                "entertainment" => [
                    "karoake"
                ],
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "shoeshine"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "shops" => [
                    "shops_onsite",
                    "hair_beauty_salon",
                    "souviner_gift_shop"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/3742ac9.jpg",
                    "img/hotel/98e8132.jpg",
                    "img/hotel/0e4238d.jpg",
                    "img/hotel/bb22a05.jpg",
                    "img/hotel/d527e57.jpg",
                    "img/hotel/1a38345.jpg",
                    "img/hotel/fef84e0.jpg",
                    "img/hotel/fac2a95.jpg",
                    "img/hotel/ec6ef41.jpg",
                    "img/hotel/8aeb7bc.jpg",
                    "img/hotel/b0260e3.jpg"
                ],
                "cover_image" => "img/hotel/42eae33.jpg",
                "cancelation" => 1
            ],
            [
                "objectId" => "BkZ0qlCeFj",
                "name" => "Holiday Inn Ulaanbaatar",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 180,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "9",
                "createdAt" => "2017-03-13T10:44:45.614Z",
                "updatedAt" => "2017-03-31T03:19:49.992Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => " Sambuu Street 24, Chingeltei, 151410 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350",
                "stars" => 5,
                "num_rooms" => 147,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "Holiday Inn Ulaanbaatar is situated in the Chingeltei district in Ulaanbaatar, 15 min walk from Chinggis Khaan Square.",
                "long_desc" => "Holiday Inn Ulaanbaatar is ideally situated in the Chingeltei district in Ulaanbaatar, 300 m from Ulaanbaatar Opera House.\r\nNational Museum of Mongolian History is 1.1 km from Holiday Inn Ulaanbaatar, while Sukhbaatar Square is 1.2 km from the property. Chinggis Khaan International Airport is less than 20 minutes' drive away and all the fascinating sights of the city are also within easy walking distance from the hotel such as the Government House,\r\nHoliday Inn Ulaanbaatar features purpose built meeting rooms and a spacious ballroom for large events. \r\n",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "151410",
                "section" => 7,
                "checkin" => "08:00",
                "checkinend" => "14:00",
                "checkout" => "04:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "buffet_style_restraurant",
                    "packed_lunch",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "fitness_center"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "concierge_service",
                    "currency_exchange",
                    "baggage_storage",
                    "newspapers"
                ],
                "entertainment" => [
                    "playground"
                ],
                "cleaning" => [
                    "ironing_service"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "fax_photocopying"
                ],
                "others" => [
                    "facilities_for_disabled_guests",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/568a82e.jpg",
                    "img/hotel/28fffed.jpg",
                    "img/hotel/ee4061d.jpg",
                    "img/hotel/ce53be0.jpg"
                ],
                "cover_image" => "img/hotel/29ec74f.jpg"
            ],
            [
                "objectId" => "RHOJrWZ1Xf",
                "name" => "The Corporate Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 160,
                "status" => 1,
                "homepage" => 0,
                "average_rate" => "14",
                "createdAt" => "2017-03-14T05:33:34.737Z",
                "updatedAt" => "2017-05-02T05:10:38.185Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "NO. 9-2 Chinggis Avenue , Sukhbaatar, 210645 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350",
                "stars" => 4,
                "num_rooms" => 13,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "This 4-star property offers a fitness center, a spa and free parking. Free Wi-Fi access is provided in all hotel rooms.",
                "long_desc" => "Corporate Hotel is located 800 m from the National Amusement Park and 3 km from Ulaanbaatar Railway Station. \r\n\r\nAir-conditioned guest rooms feature spacious interiors with modern furnishings. Each is equipped with a work desk, a personal safe and satellite television. Additional amenities include ironing equipment, a minibar and tea/coffee making facilities.\r\n\r\nGuests can pamper themselves with a massage at the spa, or unwind in the sauna room. Laundry and dry cleaning services are available. Luggage storage can be found at the 24-hour front desk.\r\n\r\nChairman Restaurant serves a selection of Mongolian dishes.\r\n\r\nHotel Corporate is 15 km from the Chinggis Khaan International Airport. \r\n\r\nSukhbaatar is a great choice for travellers interested in tours, history and nature.\r\n\r\nThis property also has one of the best-rated locations in Ulaanbaatar! Guests are happier about it compared to other properties in the area.\r\n\r\nThis property is also rated for the best value in Ulaanbaatar! Guests are getting more for their money when compared to other properties in this city.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.91413604387,
                    "longitude" => 106.91451698542
                ],
                "zipcode" => "210645",
                "section" => 7,
                "checkin" => "13:00",
                "checkinend" => "00:00",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "special_diet_meal",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "fitness_center",
                    "massage"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge",
                    "shuttle_service_charge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "baggage_storage",
                    "newspapers"
                ],
                "common_area" => [
                    "shared_kitchen",
                    "shared_lounge_tv_area"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "shoeshine"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "fax_photocopying"
                ],
                "shops" => [
                    "shops_onsite",
                    "hair_beauty_salon"
                ],
                "others" => [
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "soundproof_rooms",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/0db08a0.jpg",
                    "img/hotel/fa0563b.jpg",
                    "img/hotel/2f6c9e0.jpg",
                    "img/hotel/e05271b.jpg",
                    "img/hotel/7fd1762.jpg",
                    "img/hotel/25d0923.jpg",
                    "img/hotel/e9bdbec.jpg",
                    "img/hotel/5f0353a.jpg"
                ],
                "cover_image" => "img/hotel/c0281d7.jpg"
            ],
            [
                "objectId" => "XGg1Qkvise",
                "name" => "Kharaa Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 1,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "7",
                "createdAt" => "2017-03-14T06:19:48.643Z",
                "updatedAt" => "2017-03-17T05:28:25.918Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Chingeltei District Choimbol street 6, Chingeltei, 210644 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 1,
                "num_rooms" => 1,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "Situated in Ulaanbaatar, 700 m from Ulaanbaatar Opera House, Kharaa boasts a restaurant and free WiFi.",
                "long_desc" => "All rooms are fitted with a TV. Some units include a seating area for your convenience. Each room comes with a private bathroom.\r\n\r\nThere is a 24-hour front desk at the property.\r\n\r\nNational Museum of Mongolian History is 1.3 km from Kharaa, while Sukhbaatar Square is 1.5 km from the property. Chinggis Khaan International Airport is 13 km away. \r\n\r\nChingeltei is a great choice for travellers interested in shopping, scenery and food.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "210644",
                "section" => 6,
                "checkin" => "07:00",
                "checkinend" => "12:00",
                "checkout" => "05:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 0,
                "pets" => 0,
                "food_drink" => [
                    "restraurant"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "baggage_storage"
                ],
                "entertainment" => [
                    "karoake"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry"
                ],
                "business_fac" => [
                    "fax_photocopying"
                ],
                "others" => [
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "heating"
                ],
                "images" => [
                    "img/hotel/2e547bd.jpg",
                    "img/hotel/6ce4de1.jpg",
                    "img/hotel/f94456f.jpg",
                    "img/hotel/f69e94a.jpg"
                ],
                "cover_image" => "img/hotel/490e778.jpg"
            ],
            [
                "objectId" => "l5gijIHl97",
                "name" => "San Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 58,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "5",
                "createdAt" => "2017-03-14T06:45:06.587Z",
                "updatedAt" => "2017-05-05T08:36:09.282Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "San Hotel, 6th khoroo, Chingeltei, Ulaanbaatar, Chingeltei, 015140 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 1,
                "num_rooms" => 21,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "Just 5 min stroll away from Sukhbaatar Square, San hotel is conveniently located in Ulaanbaatar. Free WiFi access",
                "long_desc" => "The hotel is 700 m from Ulaanbaatar Opera House and National Museum of Mongolian History. Chinggis Khaan International Airport is 14 km away.\r\n\r\nDecorated in a classy style, each room is fitted with a minibar, a writing desk and a sofa. Complete with a refrigerator, the dining area also has an electric kettle. The bathroom attached is fully stocked with a hairdryer, slippers and free toiletries. You can enjoy a mountain view and a city view from the room window.\r\n\r\nLight bites can be savoured at the on-site bar. Staff at the tour desk can assist with sightseeing arrangements. Luggage storage is available at the front desk. \r\n\r\nChingeltei is a great choice for travellers interested in shopping, scenery and food.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "015140",
                "section" => 7,
                "checkin" => "07:00",
                "checkinend" => "13:00",
                "checkout" => "00:00",
                "wifi" => 0,
                "breakfast" => 1,
                "parking" => 0,
                "children" => 0,
                "pets" => 0,
                "activities" => [
                    "pool_table"
                ],
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "buffet_style_restraurant",
                    "bar",
                    "grocery_deliveries",
                    "packed_lunch",
                    "special_diet_meal",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "concierge_service",
                    "currency_exchange",
                    "baggage_storage",
                    "newspapers"
                ],
                "entertainment" => [
                    "karoake"
                ],
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping"
                ],
                "business_fac" => [
                    "business_center",
                    "fax_photocopying"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/5aa0772.jpg",
                    "img/hotel/831969c.jpg",
                    "img/hotel/1c92717.jpg",
                    "img/hotel/0614e08.jpg",
                    "img/hotel/6709fd1.jpg",
                    "img/hotel/9ac0b1a.jpg"
                ],
                "cover_image" => "img/hotel/f0ed6f2.jpg"
            ],
            [
                "objectId" => "wccTtaXjHK",
                "name" => "Zolo star Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 80,
                "status" => 1,
                "homepage" => 0,
                "average_rate" => "14",
                "createdAt" => "2017-03-14T07:23:37.196Z",
                "updatedAt" => "2017-03-14T08:17:30.475Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Narnii Road Bayangol district, 3th khoroo Ulaanbaatar, Mongolia ",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 4,
                "num_rooms" => 26,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "Zolo Hotel, located in Bayangol, Ulaanbaatar, is a popular choice for travelers. ",
                "long_desc" => "Only 9 miles away, this 4-star hotel can be easily accessed from the airport. With its convenient location, the hotel offers easy access to the city's must-see destinations.\r\nOur motto is Quality without cost. An intimate and inviting hotel that offers a variety of high quality amenities. Rooms feature air conditioning IDD telephone and color television. Restaurant serves numerous Asian dishes. Internet access is avialable in all room. You can rest in our hotel with the 3 VIP karaoke rooms and snooker billiard room. Also, we receive willingly your compliments, complaints and friendly advice on our hotel and services and solve the problems immediately. The ZoloStar Hotel's door will be open to foreign and domestic guests all the time. Our hotel is located near the down town and near the State Circous (0,6 mile), State department store (1 mile), Discovery Mongolia (0,5 mile), Gandan Tegchlin Monastry (1 mile) and gift shops. Whether your stay is for business or pleasure, the ZoloStar hotel is the best choice when you visit Ulaanbaatar.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.908627495874,
                    "longitude" => 106.89589172602
                ],
                "zipcode" => "210645",
                "section" => 7,
                "checkin" => "07:00",
                "checkinend" => "12:00",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "bar",
                    "packed_lunch",
                    "special_diet_meal",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "massage"
                ],
                "transportation" => [
                    "airport_shuttle_free"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "tour_desk",
                    "currency_exchange"
                ],
                "entertainment" => [
                    "karoake"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/8b12bf3.jpg",
                    "img/hotel/3aced8c.jpg",
                    "img/hotel/41c78f4.jpg",
                    "img/hotel/e9c7c91.jpg",
                    "img/hotel/9bfcf70.jpg",
                    "img/hotel/cbadcad.jpg",
                    "img/hotel/3e6fe8c.jpg",
                    "img/hotel/a7a1c3d.jpg",
                    "img/hotel/7abc6fe.jpg",
                    "img/hotel/312cdbd.jpg"
                ],
                "cover_image" => "img/hotel/1800452.jpg"
            ],
            [
                "objectId" => "Lep9rKBu7r",
                "name" => "Angara Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 45,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "8",
                "createdAt" => "2017-03-14T08:21:05.765Z",
                "updatedAt" => "2017-05-05T08:36:03.725Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "80 Zamchid street, 3rd Khoroo, Bayangol District, Ulaanbaatar 016051, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 3,
                "num_rooms" => 27,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "At Angara Hotel, the excellent service and superior facilities make for an unforgettable stay. ",
                "long_desc" => "Ideal for fun and relaxation, Angara Hotel is located in the Bayangol area of Ulaanbaatar. From here, guests can enjoy easy access to all that the lively city has to offer. With its convenient location, the hotel offers easy access to the city's must-see destinations.\r\n\r\nAt Angara Hotel, the excellent service and superior facilities make for an unforgettable stay. Top features of the hotel include 24-hour room service, free Wi-Fi in all rooms, 24-hour security, fireplace, taxi service.\r\n\r\nHotel accommodations have been carefully appointed to the highest degree of comfort and convenience. In some of the rooms, guests can find television LCD/plasma screen, carpeting, complimentary instant coffee, complimentary tea, humidifier. The hotel offers fantastic facilities, including sauna, massage, billiards, karaoke, to help you unwind after an action-packed day in the city. Angara Hotel is an ideal place of stay for travelers seeking charm, comfort and convenience in Ulaanbaatar.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "016051",
                "section" => 7,
                "checkin" => "07:00",
                "checkinend" => "13:30",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "activities" => [
                    "pool_table"
                ],
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "room_service"
                ],
                "pool_spa" => [
                    "sauna",
                    "massage"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "baggage_storage",
                    "newspapers"
                ],
                "entertainment" => [
                    "karoake"
                ],
                "cleaning" => [
                    "laundry"
                ],
                "others" => [
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/edf797d.jpg",
                    "img/hotel/94f576f.jpg",
                    "img/hotel/bb2eedd.jpg",
                    "img/hotel/03e554e.jpg",
                    "img/hotel/73b9115.jpg",
                    "img/hotel/d41e1a1.jpg",
                    "img/hotel/d85e8b8.jpg",
                    "img/hotel/24b6bc1.jpg",
                    "img/hotel/80cd937.jpg",
                    "img/hotel/f418237.jpg",
                    "img/hotel/06d84d2.jpg",
                    "img/hotel/c7e7516.jpg",
                    "img/hotel/5a3a234.jpg",
                    "img/hotel/fb48592.jpg",
                    "img/hotel/b61ff07.jpg"
                ],
                "cover_image" => "img/hotel/5942a12.jpg"
            ],
            [
                "objectId" => "ZPqQ2wU3mh",
                "name" => "Zaisan Gate Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 50,
                "status" => 1,
                "homepage" => 0,
                "average_rate" => "5",
                "createdAt" => "2017-03-15T02:40:26.133Z",
                "updatedAt" => "2017-03-23T10:22:32.797Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "12 Zaisan Street, Khoroo 11, 161517 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 3,
                "num_rooms" => 16,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "Zaisan Gate Hotel is set in Ulaanbaatar, 2.6 km from Mongolia National Park. Guests can enjoy the on-site restaurant.",
                "long_desc" => "Rooms include a flat-screen TV. Some rooms feature a seating area to relax in after a busy day. Enjoy a cup of tea while looking out at the mountain or river. Zaisan Gate Hotel features free WiFi .\r\n\r\nThere is a 24-hour front desk at the property.\r\n\r\nChinggis Khan Statue is 3.7 km from Zaisan Gate Hotel, while National Museum of Mongolian History is 3.8 km away. The nearest airport is Chinggis Khaan International Airport, 12 km from Zaisan Gate Hotel. ",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "161517",
                "section" => 7,
                "checkin" => "07:00",
                "checkinend" => "12:00",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "snack_bar",
                    "grocery_deliveries",
                    "packed_lunch",
                    "special_diet_meal",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "hot_tub"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "concierge_service",
                    "currency_exchange",
                    "baggage_storage",
                    "newspapers"
                ],
                "common_area" => [
                    "terrace"
                ],
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping"
                ],
                "business_fac" => [
                    "fax_photocopying"
                ],
                "others" => [
                    "adults_only",
                    "hypoallergenic_room_available",
                    "non_smoking_rooms",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/2415080.jpg",
                    "img/hotel/e72860d.jpg",
                    "img/hotel/67bf688.jpg",
                    "img/hotel/6f6a51e.jpg",
                    "img/hotel/86bda5b.jpg",
                    "img/hotel/dc1e625.jpg"
                ],
                "cover_image" => "img/hotel/a534167.jpg"
            ],
            [
                "objectId" => "mbRE0ir9Hq",
                "name" => "Alpha Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 95,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "15",
                "createdAt" => "2017-03-15T04:23:10.702Z",
                "updatedAt" => "2017-05-05T08:35:53.164Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "UNESCO Street 62, Sukhbaatar, 210648 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 4,
                "num_rooms" => 46,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "Alpha Hotel Mongolia offers accommodation in Ulaanbaatar. Guests can enjoy the on-site restaurant. ",
                "long_desc" => "The nearest airport is Chinggis Khaan International Airport, 14 km from Alpha Hotel Mongolia.\r\nNational Amusement Park is a 12-minute walk away. Mongolia National Park is 1.3 km from the property. \r\n\r\nEach room at this hotel is air conditioned and is fitted with a flat-screen TV. Certain rooms feature a seating area for your convenience. Certain units have views of the mountain or city. The rooms have a private bathroom fitted with a bath. For your comfort, you will find bathrobes and slippers.\r\n\r\nThere is a 24-hour front desk and hairdresser's at the property. The hotel also offers car hire. \r\n\r\nSukhbaatar is a great choice for travellers interested in tours, history and nature.\r\n\r\nWe speak your language!",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "210648",
                "section" => 7,
                "checkin" => "12:00",
                "checkinend" => "23:00",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "buffet_style_restraurant",
                    "bar",
                    "grocery_deliveries",
                    "breakfast_in_the_room"
                ],
                "transportation" => [
                    "car_rentral",
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "concierge_service",
                    "tour_desk",
                    "currency_exchange",
                    "atm_on_site",
                    "newspapers"
                ],
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "shops" => [
                    "shops_onsite",
                    "hair_beauty_salon"
                ],
                "others" => [
                    "hypoallergenic_room_available",
                    "designated_smoking_area",
                    "facilities_for_disabled_guests",
                    "honeymoon_suite",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/57bc788.jpg",
                    "img/hotel/495c763.jpg",
                    "img/hotel/9822f90.jpg",
                    "img/hotel/7efa3be.jpg",
                    "img/hotel/52b1c4c.jpg",
                    "img/hotel/c8c0500.jpg"
                ],
                "cover_image" => "img/hotel/a388ada.jpg"
            ],
            [
                "objectId" => "HpVQMeEaQN",
                "name" => "Ramada Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 170,
                "status" => 1,
                "homepage" => 0,
                "average_rate" => "14",
                "createdAt" => "2017-03-15T05:11:29.946Z",
                "updatedAt" => "2017-03-23T10:26:07.996Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "16th Khoroo, Peace Avenue 35/2,Bayangol District, Bayangol, 211238 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 4,
                "num_rooms" => 60,
                "website" => "www.ihotel.mn",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "The 4-star Ramada Ulaanbaatar Citycenter is located in the city centre of Ulaanbaatar. ",
                "long_desc" => "Boasting a spa and wellness centre, fitness centre and gourmet cuisine across 2 stylish restaurant and bar, the 4-star Ramada Ulaanbaatar Citycenter is located in the city centre of Ulaanbaatar. Free Wi-Fi is provided in the entire property.\r\n\r\nEach guestroom is fitted with a flat-screen satellite TV, coffee machine and safety deposit box. The luxurious cotton sheets and fabric, modern interiors and warm light create an elegant atmosphere. Bathrobes and slippers are stocked in the bathrooms.\r\n\r\nGuests can relax in the sauna or hot tub, enjoy soothing massage treatment, use the facilities at the business centre, or rent a car to explore the surroundings. Staff can offer a wide range of services, including currency exchange, laundry and dry cleaning services. For anyone who fancies singing, there are karaoke rooms available.\r\n\r\nCafe JOT Restaurant serves a delicious selection of both Asian and western dishes. Alternatively, it is a good choice to spend a relaxing afternoon enjoying beverages and alcoholic drinks at Edge Bar.\r\n\r\nRamada Ulaanbaatar Citycenter is a 10-minute drive from Ulaanbaatar Railway Station. Chinggis Khaan International Airport is a 30-minute car journey away. ",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.915663307983,
                    "longitude" => 106.89201191068
                ],
                "zipcode" => "211238",
                "section" => 7,
                "checkin" => "12:00",
                "checkinend" => "23:00",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "buffet_style_restraurant",
                    "bar",
                    "grocery_deliveries",
                    "packed_lunch",
                    "special_diet_meal",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "hot_tub",
                    "fitness_center",
                    "massage"
                ],
                "transportation" => [
                    "car_rentral",
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "concierge_service",
                    "currency_exchange",
                    "atm_on_site",
                    "baggage_storage",
                    "newspapers"
                ],
                "common_area" => [
                    "terrace",
                    "sun_deck"
                ],
                "entertainment" => [
                    "entertainment_staff",
                    "baby_sitting_child_services"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "shops" => [
                    "shops_onsite",
                    "hair_beauty_salon",
                    "souviner_gift_shop"
                ],
                "others" => [
                    "hypoallergenic_room_available",
                    "designated_smoking_area",
                    "facilities_for_disabled_guests",
                    "elevator",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/0539351.jpg",
                    "img/hotel/971ce0b.jpg",
                    "img/hotel/73dfd6d.jpg",
                    "img/hotel/3e62574.jpg",
                    "img/hotel/bdf03c9.jpg",
                    "img/hotel/e0712e4.jpg",
                    "img/hotel/52f0936.jpg",
                    "img/hotel/8da0c70.jpg",
                    "img/hotel/6835cf2.jpg",
                    "img/hotel/cb0cec4.jpg",
                    "img/hotel/9baea69.jpg"
                ],
                "cover_image" => "img/hotel/7e11af9.jpg"
            ],
            [
                "objectId" => "T4W38th1Ki",
                "name" => "Sunjin Grand Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 110,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "13",
                "createdAt" => "2017-03-15T07:00:40.991Z",
                "updatedAt" => "2017-05-05T08:35:50.423Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "13 Khoroo Enkhtaivan Street Bayanzurkh District, Bayanzurkh, 210351 Ulaanbaatar, Mongolia ",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 4,
                "num_rooms" => 110,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "The luxurious Sunjin Grand Hotel boasts a wellness centre, karaoke facilities and a hot tub. ",
                "long_desc" => "Located just beside Mongolia International University, the luxurious Sunjin Grand Hotel boasts a wellness centre, karaoke facilities and a hot tub. The 4-star upscale rooms come with a coffee machine and free wireless internet. On-site parking is free.\r\n\r\nSunjin Grand is a 15-minute drive from Ulaanbaatar Railway Station and a 30-minute drive from Ulaanbaatar Airport.\r\n\r\nAll well-decorated rooms are fitted with air conditioning, a minibar and a cosy seating area. En suite bathrooms include free toiletries, hairdryers and shower facilities.\r\n\r\nGuests can work out at the gym, enjoy a soothing massage treatment, or unwind in the sauna. Billiards, business centre and meeting rooms are also available. There is a cash machine and a gift shop on site for guests’ conveniences.\r\n\r\nMongolian and European food can be enjoyed at Pharos, while Keun Janbi has Korean dishes on its menu. Other dining options include Safari Japanese restaurant and Harry’s night club. \r\n\r\nBayanzurkh is a great choice for travellers interested in nature walks, horse riding and sightseeing.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "210351",
                "section" => 7,
                "checkin" => "13:00",
                "checkinend" => "23:00",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "activities" => [
                    "pool_table"
                ],
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "special_diet_meal",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "hot_tub",
                    "fitness_center",
                    "massage"
                ],
                "transportation" => [
                    "shuttle_service_charge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "concierge_service",
                    "currency_exchange",
                    "atm_on_site",
                    "baggage_storage",
                    "newspapers"
                ],
                "entertainment" => [
                    "nightclub_dj",
                    "karoake"
                ],
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "shoeshine"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "shops" => [
                    "shops_onsite",
                    "souviner_gift_shop"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "elevator",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/acb4759.jpg",
                    "img/hotel/9718b35.jpg",
                    "img/hotel/c02ad56.jpg",
                    "img/hotel/2e9d57b.jpg",
                    "img/hotel/5461c33.jpg",
                    "img/hotel/635cfff.jpg",
                    "img/hotel/4610922.jpg",
                    "img/hotel/b77f996.jpg",
                    "img/hotel/29c7bc5.jpg",
                    "img/hotel/9081eae.jpg",
                    "img/hotel/111ee37.jpg",
                    "img/hotel/f26d95f.jpg",
                    "img/hotel/761ea90.jpg",
                    "img/hotel/e9092b2.jpg",
                    "img/hotel/8b0b2a4.jpg",
                    "img/hotel/79fdf63.jpg"
                ],
                "cover_image" => "img/hotel/5431097.jpg"
            ],
            [
                "objectId" => "IIxT9gAdBW",
                "name" => "Bishrelt Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 120,
                "status" => 1,
                "homepage" => 0,
                "average_rate" => "10",
                "createdAt" => "2017-03-15T07:48:57.279Z",
                "updatedAt" => "2017-03-15T08:11:08.740Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Laagan Street, P.O Box 104, Chingeltei, 211238 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 4,
                "num_rooms" => 28,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "Bishrelt hotel is one of the best located luxury hotels in the heart of Ulaanbaatar city.",
                "long_desc" => "The hotel has a spa centre and hot tub, and guests can enjoy a meal at the restaurant. Free WiFi is available throughout the property and free private parking is available on site.\r\n\r\nThe hotel is 800 m from the State Government House and the Sukhbaatar Square, 14 km from Chinggis Khaan International Airport, 2 km from the railway station and the Central Monastery Gandan is 0.8 km from the property.\r\n\r\nFeaturing the elegant interior and furnishing, each room will provide you with Eco solution environmentally friendly air conditioning system, a full HD flat-screen satellite TV and high-speed wired and wireless Internet access. Complete with a minibar, the dining area has an electric kettle and rich choices of free tea and coffee amenities and private bathrooms also come with bathrobes, a hairdryer and free toiletries.\r\n\r\nYou will find a 24-hour front desk at the property. At Bishrelt Hotel guest can also enjoy snooker and karaoke, or work out at the fitness centre. Meeting and events facilities are also available.\r\n\r\nThe Embassy comes with various choices of Asian and European cuisine. Continental and English Breakfast are served every morning. \r\n\r\nThis property is also rated for the best value in Ulaanbaatar! Guests are getting more for their money when compared to other properties in this city.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "211238",
                "section" => 7,
                "checkin" => "14:00",
                "checkinend" => "16:00",
                "checkout" => "11:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "activities" => [
                    "pool_table"
                ],
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "snack_bar",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "massage"
                ],
                "transportation" => [
                    "bicycle_rental",
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "concierge_service",
                    "tour_desk",
                    "currency_exchange",
                    "atm_on_site",
                    "baggage_storage",
                    "newspapers"
                ],
                "entertainment" => [
                    "evening_entertainment",
                    "nightclub_dj",
                    "karoake"
                ],
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "shoeshine"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "shops" => [
                    "shops_onsite",
                    "hair_beauty_salon",
                    "souviner_gift_shop"
                ],
                "others" => [
                    "adults_only",
                    "non_smoking_rooms",
                    "soundproof_rooms",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/5cf9435.jpg",
                    "img/hotel/a76274c.jpg",
                    "img/hotel/eabde1e.jpg",
                    "img/hotel/799aa4f.jpg",
                    "img/hotel/37faaaf.jpg",
                    "img/hotel/0f88638.jpg",
                    "img/hotel/a26e8fe.jpg",
                    "img/hotel/9700372.jpg"
                ],
                "cover_image" => "img/hotel/bc3d20b.jpg"
            ],
            [
                "objectId" => "6SVQLUxbNH",
                "name" => "AB Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 70,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "75",
                "createdAt" => "2017-03-16T07:07:47.009Z",
                "updatedAt" => "2017-05-05T08:35:45.208Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Amarbayasgalant Hotel, Diplomat Street, Sukhbaatar, 142100 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 3,
                "num_rooms" => 14,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 0,
                "short_desc" => "Stay in the heart of Ulaanbaatar",
                "long_desc" => "Located in Ulaanbaatar, 500 m from Memorial Museum of Victims of Political Persecution, AB Hotel boasts a restaurant and free WiFi. Guests can enjoy the on-site restaurant.\r\n\r\nAll rooms come with a flat-screen TV with satellite channels. Some units feature a seating area for your convenience. You will find a kettle in the room. Rooms are fitted with a private bathroom equipped with a bath. For your comfort, you will find slippers and free toiletries.\r\n\r\nThere is a 24-hour front desk at the property. Fee-based airport shuttle service is available.\r\n\r\nChinggis Khan Statue is 900 m from AB Hotel, while National Museum of Mongolian History is 1.1 km away. The nearest airport is Chinggis Khaan International Airport, 14 km from AB Hotel. \r\n\r\nThis is our guests' favourite part of Ulaanbaatar, according to independent reviews.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "142100",
                "section" => 7,
                "checkin" => "13:00",
                "checkinend" => "12:00",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "grocery_deliveries",
                    "packed_lunch",
                    "special_diet_meal",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "sauna"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge",
                    "airport_shuttle_free"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "concierge_service",
                    "currency_exchange",
                    "baggage_storage",
                    "newspapers"
                ],
                "common_area" => [
                    "shared_lounge_tv_area"
                ],
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping"
                ],
                "business_fac" => [
                    "fax_photocopying"
                ],
                "others" => [
                    "adults_only",
                    "non_smoking_rooms",
                    "soundproof_rooms",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/ed79ad7.jpg",
                    "img/hotel/bf80640.jpg",
                    "img/hotel/18abcf1.jpg",
                    "img/hotel/835520e.jpg",
                    "img/hotel/b5a4094.jpg",
                    "img/hotel/9bb3aa8.jpg",
                    "img/hotel/24795d8.jpg",
                    "img/hotel/a3a0c59.jpg",
                    "img/hotel/38aadfe.jpg",
                    "img/hotel/d5b0fc1.jpg",
                    "img/hotel/41201d8.jpg"
                ],
                "cover_image" => "img/hotel/f5518a6.jpg"
            ],
            [
                "objectId" => "VtqeF8HOru",
                "name" => "Guide Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 65,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "5",
                "createdAt" => "2017-03-17T03:32:11.439Z",
                "updatedAt" => "2017-05-05T08:35:38.343Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "9/3, University Street, Sukhbaatar, 212513 Ulaanbaatar, Mongolia ",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 2,
                "num_rooms" => 26,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "Offering a restaurant, Guide Hotel is centrally located in Ulaanbaatar. It is only a 5-min walk from Sukhbaatar Square.",
                "long_desc" => "Free WiFi access is available in all rooms.\r\n\r\nThe hotel is a 10-minute walk from Natural History Museum. It takes 15 minutes by taxi from Ulaanbaatar Railway Station to Guide Hotel. Chinggis Khaan International Airport is a 30-minute drive away.\r\n\r\nEach room here will provide you with a flat-screen TV with cable and satellite channelsa TV and a seating area. Coming with a bathtub and shower facilities, private bathroom also includes free toiletries.\r\n\r\nAt Guide Hotel you will find a 24-hour front desk. Currency exchange and luggage storage are both possible.\r\n\r\nGuest can enjoy Mongolian and European dishes at the on-site restaurant. \r\n\r\nSukhbaatar is a great choice for travellers interested in tours, history and nature.\r\n\r\nThis property is also rated for the best value in Ulaanbaatar! Guests are getting more for their money when compared to other properties in this city.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "212513",
                "section" => 7,
                "checkin" => "07:00",
                "checkinend" => "14:00",
                "checkout" => "05:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "activities" => [
                    "pool_table"
                ],
                "food_drink" => [
                    "restraurant",
                    "special_diet_meal",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "currency_exchange",
                    "baggage_storage"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "laundry",
                    "daily_housekeeping"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "fax_photocopying"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "heating"
                ],
                "images" => [
                    "img/hotel/2866da2.jpg",
                    "img/hotel/605eb95.jpg",
                    "img/hotel/1d0414e.jpg",
                    "img/hotel/8366050.jpg",
                    "img/hotel/5f076c9.jpg",
                    "img/hotel/53afceb.jpg",
                    "img/hotel/e90513b.jpg",
                    "img/hotel/71adba0.jpg",
                    "img/hotel/61b3e04.jpg",
                    "img/hotel/47bc8a5.jpg"
                ],
                "cover_image" => "img/hotel/17b965e.jpg"
            ],
            [
                "objectId" => "SF6X33fDlr",
                "name" => "New World",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 1,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "10",
                "createdAt" => "2017-03-17T04:41:31.708Z",
                "updatedAt" => "2017-03-17T04:51:49.047Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "100 ail, Sukhbaatar District, 10th Khoroo, Sukhbaatar, 210646 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 3,
                "num_rooms" => 1,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "Featuring a spa centre with sauna and massage services, located close to Embassy of the United States Ulaanbaatar.",
                "long_desc" => "It offers simply-furnished guest rooms and a business centre with meeting and banquet facilities. Free Wi-Fi is available in all areas.\r\n\r\nNew World Hotel is a 5-minute stroll from Dashchoilin Monastery and a 5-minute drive from Sukhbaatar Square. Ulaanbaatar Bus Station is only 3 minutes' drive away. It takes approximately 20 minutes to Ulaanbaatar Railway Station and 30 minutes to Ulaanbaatar Chinggis Khaan International Airport by car.\r\n\r\nAll units come with 24-hour hot water, a minibar, a refrigerator, a flat-screen cable TV, a safety deposit box and ironing facilities. The private bathroom includes a hairdryer, shower facilities and free toiletries.\r\n\r\nThe 24-hour front desk offers car rental service and helps guests organize excursions to tourist attractions with ticketing services. After a day of tours, guests can have fun at the karaoke. Laundry and dry cleaning are all provided.\r\n\r\nThe on-site New World Restaurant serves authentic European and Asian dishes as well as a breakfast buffet. ",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "210646",
                "section" => 6,
                "checkin" => "13:00",
                "checkinend" => "23:00",
                "checkout" => "05:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "fitness_center",
                    "massage"
                ],
                "transportation" => [
                    "car_rentral",
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "ticket_service",
                    "baggage_storage",
                    "newspapers"
                ],
                "entertainment" => [
                    "karoake"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "elevator",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/cb15156.jpg",
                    "img/hotel/ada573d.jpg",
                    "img/hotel/daa408a.jpg",
                    "img/hotel/e5e41a1.jpg",
                    "img/hotel/ff7d206.jpg",
                    "img/hotel/8eac1eb.jpg",
                    "img/hotel/a1e2b8b.jpg",
                    "img/hotel/842f9a8.jpg",
                    "img/hotel/8f33a72.jpg",
                    "img/hotel/04dc4d9.jpg",
                    "img/hotel/bdc4f29.jpg"
                ],
                "cover_image" => "img/hotel/2f54bd6.jpg"
            ],
            [
                "objectId" => "iSVy1K1unu",
                "name" => "Elegance Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 89,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => 0,
                "createdAt" => "2017-03-17T05:32:37.995Z",
                "updatedAt" => "2017-03-21T04:47:56.346Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Sambuu Street, Chingeltei district, 16-3, Chingeltei, 212513 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 2,
                "num_rooms" => 35,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 0,
                "short_desc" => "Featuring free WiFi and an on-restaurant, Elegance Hotel offers accommodation in Ulaanbaatar.",
                "long_desc" => "Stay in the heart of Ulaanbaatar.\r\n\r\nEvery room is equipped with a flat-screen TV. Certain units include a seating area for your convenience. Every room has a private bathroom. Extras include slippers and free toiletries.\r\n\r\nYou will find a 24-hour front desk at the property.\r\n\r\nUlaanbaatar Opera House is 300 m from Elegance Hotel, while National Museum of Mongolian History is 400 m away. The nearest airport is Chinggis Khaan International Airport, 14 km from Elegance Hotel. \r\n\r\nChingeltei is a great choice for travellers interested in shopping, scenery and food.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.921858529506,
                    "longitude" => 106.90950661914
                ],
                "zipcode" => "212513",
                "section" => 2,
                "checkin" => "12:30",
                "checkinend" => "20:00",
                "checkout" => "04:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "special_diet_meal",
                    "breakfast_in_the_room"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "baggage_storage"
                ],
                "entertainment" => [
                    "karoake"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping"
                ],
                "others" => [
                    "adults_only",
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "elevator",
                    "honeymoon_suite",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/052d264.jpg",
                    "img/hotel/61fc656.jpg"
                ],
                "cover_image" => "img/hotel/e458b22.jpg"
            ],
            [
                "objectId" => "01HmsDwMJH",
                "name" => "UB Inn",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 1,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "7",
                "createdAt" => "2017-03-17T05:47:25.556Z",
                "updatedAt" => "2017-03-17T06:03:59.270Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Sambuu Street 35, Chingeltei district, Khoroo 5, Chingeltei, 110000 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 3,
                "num_rooms" => 1,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => " UB INN hotel & gallery features a terrace and views of the city. Guests can enjoy the on-site bar.",
                "long_desc" => "All rooms have a flat-screen TV with cable channels. You will find a kettle in the room. The rooms are fitted with a private bathroom equipped with a bath. For your comfort, you will find bathrobes and slippers. UB INN hotel & gallery features free WiFi throughout the property.\r\n\r\nThere is a 24-hour front desk, a business centre, dry cleaning services and gift shop at the property.\r\n\r\nThe hotel also offers car hire. National Museum of Mongolian History is 800 m from UB INN hotel & gallery, while Sukhbaatar Square is 900 m from the property. The nearest airport is Chinggis Khaan International Airport, 13 km from the property. ",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.921319287211,
                    "longitude" => 106.90470010042
                ],
                "zipcode" => "110000",
                "section" => 6,
                "checkin" => "14:00",
                "checkinend" => "22:00",
                "checkout" => "05:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "sauna",
                    "fitness_center",
                    "massage"
                ],
                "transportation" => [
                    "car_rentral",
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "ticket_service",
                    "tour_desk",
                    "baggage_storage"
                ],
                "common_area" => [
                    "terrace"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "laundry",
                    "daily_housekeeping"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "shops" => [
                    "souviner_gift_shop"
                ],
                "others" => [
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "facilities_for_disabled_guests",
                    "elevator",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/4d07d49.jpg",
                    "img/hotel/c812ed4.jpg",
                    "img/hotel/4c313e5.jpg",
                    "img/hotel/78049e7.jpg",
                    "img/hotel/1810625.jpg",
                    "img/hotel/455d076.jpg",
                    "img/hotel/ae8a116.jpg",
                    "img/hotel/e3df194.jpg",
                    "img/hotel/fa59e45.jpg",
                    "img/hotel/2d8ac2a.jpg",
                    "img/hotel/5779c55.jpg"
                ],
                "cover_image" => "img/hotel/35fa2df.jpg"
            ],
            [
                "objectId" => "sVGJbMV2CK",
                "name" => "Miami Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 1,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "6",
                "createdAt" => "2017-03-17T06:10:26.933Z",
                "updatedAt" => "2017-03-17T07:05:05.511Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Sukhbaatar district 4th khoroo, Lucky Center building, Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 2,
                "num_rooms" => 1,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "The Miami hotel established in 2007. It is located in downtown and a distance from airport is 25 minutes by car.",
                "long_desc" => " It is located in downtown and a distance from airport is 25 minutes of traveling by car. The hotel has the capacity to receive to 90 guests. \r\n\r\nGuest rooms also provide the following amenities internet access telephones with international call capability and cable TV  you may keep up with the world news plus a mini bar.\r\n\r\nThe \"Eltaro\" mongolian steak restaurant with a seating of 60-80 guests, located in the ground floor. We will service with delicious meals from 9 am to 12 pm. \\\r\n\r\nOur hotel and friendly staff will ensure you a pleasant and safe stay. \r\n\r\n  ",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.915082765938,
                    "longitude" => 106.90161824226
                ],
                "zipcode" => "110000",
                "section" => 6,
                "checkin" => "12:00",
                "checkinend" => "21:00",
                "checkout" => "05:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "room_service"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "currency_exchange",
                    "baggage_storage"
                ],
                "cleaning" => [
                    "laundry"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/94f7d04.jpg"
                ],
                "cover_image" => "img/hotel/9864a1f.jpg"
            ],
            [
                "objectId" => "GnwEdGgGir",
                "name" => "Seoul Hotel Ulaanbaatar",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 1,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "10",
                "createdAt" => "2017-03-21T02:06:26.243Z",
                "updatedAt" => "2017-03-21T02:45:58.238Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Chingeltei District 3th Khoroo, Peace Avenue, Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 2,
                "num_rooms" => 1,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "This city center placed hotel is near the State Department store and Ulaanbaatar department store.",
                "long_desc" => "Free high speed internet, room service and 2nd floor has the \"Nightly Strip Joint\" and restaurant. \r\nPrice is cheaper and non-smoking rooms, family rooms and Kitchenette.\r\nIn the room has refrigerator, flat screen TV and minibar. ",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.916422709939,
                    "longitude" => 106.90165311229
                ],
                "zipcode" => "210000",
                "section" => 6,
                "checkin" => "07:00",
                "checkinend" => "12:00",
                "checkout" => "05:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 0,
                "pets" => 1,
                "activities" => [
                    "pool_table"
                ],
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "room_service"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk"
                ],
                "entertainment" => [
                    "nightclub_dj",
                    "karoake"
                ],
                "cleaning" => [
                    "laundry"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "air_conditioning",
                    "heating"
                ],
                "cover_image" => "img/hotel/a0ed919.jpg"
            ],
            [
                "objectId" => "wccTtaXjHK",
                "name" => "Zolo star Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 80,
                "status" => 1,
                "homepage" => 0,
                "average_rate" => "14",
                "createdAt" => "2017-03-14T07:23:37.196Z",
                "updatedAt" => "2017-03-14T08:17:30.475Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Narnii Road Bayangol district, 3th khoroo Ulaanbaatar, Mongolia ",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 4,
                "num_rooms" => 26,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "Zolo Hotel, located in Bayangol, Ulaanbaatar, is a popular choice for travelers. ",
                "long_desc" => "Only 9 miles away, this 4-star hotel can be easily accessed from the airport. With its convenient location, the hotel offers easy access to the city's must-see destinations.\r\nOur motto is Quality without cost. An intimate and inviting hotel that offers a variety of high quality amenities. Rooms feature air conditioning IDD telephone and color television. Restaurant serves numerous Asian dishes. Internet access is avialable in all room. You can rest in our hotel with the 3 VIP karaoke rooms and snooker billiard room. Also, we receive willingly your compliments, complaints and friendly advice on our hotel and services and solve the problems immediately. The ZoloStar Hotel's door will be open to foreign and domestic guests all the time. Our hotel is located near the down town and near the State Circous (0,6 mile), State department store (1 mile), Discovery Mongolia (0,5 mile), Gandan Tegchlin Monastry (1 mile) and gift shops. Whether your stay is for business or pleasure, the ZoloStar hotel is the best choice when you visit Ulaanbaatar.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.908627495874,
                    "longitude" => 106.89589172602
                ],
                "zipcode" => "210645",
                "section" => 7,
                "checkin" => "07:00",
                "checkinend" => "12:00",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "restraurant_dining_menu",
                    "bar",
                    "packed_lunch",
                    "special_diet_meal",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "massage"
                ],
                "transportation" => [
                    "airport_shuttle_free"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "tour_desk",
                    "currency_exchange"
                ],
                "entertainment" => [
                    "karoake"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/8b12bf3.jpg",
                    "img/hotel/3aced8c.jpg",
                    "img/hotel/41c78f4.jpg",
                    "img/hotel/e9c7c91.jpg",
                    "img/hotel/9bfcf70.jpg",
                    "img/hotel/cbadcad.jpg",
                    "img/hotel/3e6fe8c.jpg",
                    "img/hotel/a7a1c3d.jpg",
                    "img/hotel/7abc6fe.jpg",
                    "img/hotel/312cdbd.jpg"
                ],
                "cover_image" => "img/hotel/1800452.jpg"
            ],
            [
                "objectId" => "Lep9rKBu7r",
                "name" => "Angara Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 45,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "8",
                "createdAt" => "2017-03-14T08:21:05.765Z",
                "updatedAt" => "2017-05-05T08:36:03.725Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "80 Zamchid street, 3rd Khoroo, Bayangol District, Ulaanbaatar 016051, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 3,
                "num_rooms" => 27,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "At Angara Hotel, the excellent service and superior facilities make for an unforgettable stay. ",
                "long_desc" => "Ideal for fun and relaxation, Angara Hotel is located in the Bayangol area of Ulaanbaatar. From here, guests can enjoy easy access to all that the lively city has to offer. With its convenient location, the hotel offers easy access to the city's must-see destinations.\r\n\r\nAt Angara Hotel, the excellent service and superior facilities make for an unforgettable stay. Top features of the hotel include 24-hour room service, free Wi-Fi in all rooms, 24-hour security, fireplace, taxi service.\r\n\r\nHotel accommodations have been carefully appointed to the highest degree of comfort and convenience. In some of the rooms, guests can find television LCD/plasma screen, carpeting, complimentary instant coffee, complimentary tea, humidifier. The hotel offers fantastic facilities, including sauna, massage, billiards, karaoke, to help you unwind after an action-packed day in the city. Angara Hotel is an ideal place of stay for travelers seeking charm, comfort and convenience in Ulaanbaatar.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "016051",
                "section" => 7,
                "checkin" => "07:00",
                "checkinend" => "13:30",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "activities" => [
                    "pool_table"
                ],
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "room_service"
                ],
                "pool_spa" => [
                    "sauna",
                    "massage"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "baggage_storage",
                    "newspapers"
                ],
                "entertainment" => [
                    "karoake"
                ],
                "cleaning" => [
                    "laundry"
                ],
                "others" => [
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/edf797d.jpg",
                    "img/hotel/94f576f.jpg",
                    "img/hotel/bb2eedd.jpg",
                    "img/hotel/03e554e.jpg",
                    "img/hotel/73b9115.jpg",
                    "img/hotel/d41e1a1.jpg",
                    "img/hotel/d85e8b8.jpg",
                    "img/hotel/24b6bc1.jpg",
                    "img/hotel/80cd937.jpg",
                    "img/hotel/f418237.jpg",
                    "img/hotel/06d84d2.jpg",
                    "img/hotel/c7e7516.jpg",
                    "img/hotel/5a3a234.jpg",
                    "img/hotel/fb48592.jpg",
                    "img/hotel/b61ff07.jpg"
                ],
                "cover_image" => "img/hotel/5942a12.jpg"
            ],
            [
                "objectId" => "ZPqQ2wU3mh",
                "name" => "Zaisan Gate Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 50,
                "status" => 1,
                "homepage" => 0,
                "average_rate" => "5",
                "createdAt" => "2017-03-15T02:40:26.133Z",
                "updatedAt" => "2017-03-23T10:22:32.797Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "12 Zaisan Street, Khoroo 11, 161517 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 3,
                "num_rooms" => 16,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "Zaisan Gate Hotel is set in Ulaanbaatar, 2.6 km from Mongolia National Park. Guests can enjoy the on-site restaurant.",
                "long_desc" => "Rooms include a flat-screen TV. Some rooms feature a seating area to relax in after a busy day. Enjoy a cup of tea while looking out at the mountain or river. Zaisan Gate Hotel features free WiFi .\r\n\r\nThere is a 24-hour front desk at the property.\r\n\r\nChinggis Khan Statue is 3.7 km from Zaisan Gate Hotel, while National Museum of Mongolian History is 3.8 km away. The nearest airport is Chinggis Khaan International Airport, 12 km from Zaisan Gate Hotel. ",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "161517",
                "section" => 7,
                "checkin" => "07:00",
                "checkinend" => "12:00",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "snack_bar",
                    "grocery_deliveries",
                    "packed_lunch",
                    "special_diet_meal",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "hot_tub"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "concierge_service",
                    "currency_exchange",
                    "baggage_storage",
                    "newspapers"
                ],
                "common_area" => [
                    "terrace"
                ],
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping"
                ],
                "business_fac" => [
                    "fax_photocopying"
                ],
                "others" => [
                    "adults_only",
                    "hypoallergenic_room_available",
                    "non_smoking_rooms",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/2415080.jpg",
                    "img/hotel/e72860d.jpg",
                    "img/hotel/67bf688.jpg",
                    "img/hotel/6f6a51e.jpg",
                    "img/hotel/86bda5b.jpg",
                    "img/hotel/dc1e625.jpg"
                ],
                "cover_image" => "img/hotel/a534167.jpg"
            ],
            [
                "objectId" => "mbRE0ir9Hq",
                "name" => "Alpha Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 95,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "15",
                "createdAt" => "2017-03-15T04:23:10.702Z",
                "updatedAt" => "2017-05-05T08:35:53.164Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "UNESCO Street 62, Sukhbaatar, 210648 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 4,
                "num_rooms" => 46,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "Alpha Hotel Mongolia offers accommodation in Ulaanbaatar. Guests can enjoy the on-site restaurant. ",
                "long_desc" => "The nearest airport is Chinggis Khaan International Airport, 14 km from Alpha Hotel Mongolia.\r\nNational Amusement Park is a 12-minute walk away. Mongolia National Park is 1.3 km from the property. \r\n\r\nEach room at this hotel is air conditioned and is fitted with a flat-screen TV. Certain rooms feature a seating area for your convenience. Certain units have views of the mountain or city. The rooms have a private bathroom fitted with a bath. For your comfort, you will find bathrobes and slippers.\r\n\r\nThere is a 24-hour front desk and hairdresser's at the property. The hotel also offers car hire. \r\n\r\nSukhbaatar is a great choice for travellers interested in tours, history and nature.\r\n\r\nWe speak your language!",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "210648",
                "section" => 7,
                "checkin" => "12:00",
                "checkinend" => "23:00",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "buffet_style_restraurant",
                    "bar",
                    "grocery_deliveries",
                    "breakfast_in_the_room"
                ],
                "transportation" => [
                    "car_rentral",
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "concierge_service",
                    "tour_desk",
                    "currency_exchange",
                    "atm_on_site",
                    "newspapers"
                ],
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping",
                    "shoeshine"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "shops" => [
                    "shops_onsite",
                    "hair_beauty_salon"
                ],
                "others" => [
                    "hypoallergenic_room_available",
                    "designated_smoking_area",
                    "facilities_for_disabled_guests",
                    "honeymoon_suite",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/57bc788.jpg",
                    "img/hotel/495c763.jpg",
                    "img/hotel/9822f90.jpg",
                    "img/hotel/7efa3be.jpg",
                    "img/hotel/52b1c4c.jpg",
                    "img/hotel/c8c0500.jpg"
                ],
                "cover_image" => "img/hotel/a388ada.jpg"
            ],
            [
                "objectId" => "HpVQMeEaQN",
                "name" => "Ramada Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 170,
                "status" => 1,
                "homepage" => 0,
                "average_rate" => "14",
                "createdAt" => "2017-03-15T05:11:29.946Z",
                "updatedAt" => "2017-03-23T10:26:07.996Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "16th Khoroo, Peace Avenue 35/2,Bayangol District, Bayangol, 211238 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 4,
                "num_rooms" => 60,
                "website" => "www.ihotel.mn",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "The 4-star Ramada Ulaanbaatar Citycenter is located in the city centre of Ulaanbaatar. ",
                "long_desc" => "Boasting a spa and wellness centre, fitness centre and gourmet cuisine across 2 stylish restaurant and bar, the 4-star Ramada Ulaanbaatar Citycenter is located in the city centre of Ulaanbaatar. Free Wi-Fi is provided in the entire property.\r\n\r\nEach guestroom is fitted with a flat-screen satellite TV, coffee machine and safety deposit box. The luxurious cotton sheets and fabric, modern interiors and warm light create an elegant atmosphere. Bathrobes and slippers are stocked in the bathrooms.\r\n\r\nGuests can relax in the sauna or hot tub, enjoy soothing massage treatment, use the facilities at the business centre, or rent a car to explore the surroundings. Staff can offer a wide range of services, including currency exchange, laundry and dry cleaning services. For anyone who fancies singing, there are karaoke rooms available.\r\n\r\nCafe JOT Restaurant serves a delicious selection of both Asian and western dishes. Alternatively, it is a good choice to spend a relaxing afternoon enjoying beverages and alcoholic drinks at Edge Bar.\r\n\r\nRamada Ulaanbaatar Citycenter is a 10-minute drive from Ulaanbaatar Railway Station. Chinggis Khaan International Airport is a 30-minute car journey away. ",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.915663307983,
                    "longitude" => 106.89201191068
                ],
                "zipcode" => "211238",
                "section" => 7,
                "checkin" => "12:00",
                "checkinend" => "23:00",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "buffet_style_restraurant",
                    "bar",
                    "grocery_deliveries",
                    "packed_lunch",
                    "special_diet_meal",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "hot_tub",
                    "fitness_center",
                    "massage"
                ],
                "transportation" => [
                    "car_rentral",
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "concierge_service",
                    "currency_exchange",
                    "atm_on_site",
                    "baggage_storage",
                    "newspapers"
                ],
                "common_area" => [
                    "terrace",
                    "sun_deck"
                ],
                "entertainment" => [
                    "entertainment_staff",
                    "baby_sitting_child_services"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "shops" => [
                    "shops_onsite",
                    "hair_beauty_salon",
                    "souviner_gift_shop"
                ],
                "others" => [
                    "hypoallergenic_room_available",
                    "designated_smoking_area",
                    "facilities_for_disabled_guests",
                    "elevator",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/0539351.jpg",
                    "img/hotel/971ce0b.jpg",
                    "img/hotel/73dfd6d.jpg",
                    "img/hotel/3e62574.jpg",
                    "img/hotel/bdf03c9.jpg",
                    "img/hotel/e0712e4.jpg",
                    "img/hotel/52f0936.jpg",
                    "img/hotel/8da0c70.jpg",
                    "img/hotel/6835cf2.jpg",
                    "img/hotel/cb0cec4.jpg",
                    "img/hotel/9baea69.jpg"
                ],
                "cover_image" => "img/hotel/7e11af9.jpg"
            ],
            [
                "objectId" => "T4W38th1Ki",
                "name" => "Sunjin Grand Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 110,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "13",
                "createdAt" => "2017-03-15T07:00:40.991Z",
                "updatedAt" => "2017-05-05T08:35:50.423Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "13 Khoroo Enkhtaivan Street Bayanzurkh District, Bayanzurkh, 210351 Ulaanbaatar, Mongolia ",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 4,
                "num_rooms" => 110,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "The luxurious Sunjin Grand Hotel boasts a wellness centre, karaoke facilities and a hot tub. ",
                "long_desc" => "Located just beside Mongolia International University, the luxurious Sunjin Grand Hotel boasts a wellness centre, karaoke facilities and a hot tub. The 4-star upscale rooms come with a coffee machine and free wireless internet. On-site parking is free.\r\n\r\nSunjin Grand is a 15-minute drive from Ulaanbaatar Railway Station and a 30-minute drive from Ulaanbaatar Airport.\r\n\r\nAll well-decorated rooms are fitted with air conditioning, a minibar and a cosy seating area. En suite bathrooms include free toiletries, hairdryers and shower facilities.\r\n\r\nGuests can work out at the gym, enjoy a soothing massage treatment, or unwind in the sauna. Billiards, business centre and meeting rooms are also available. There is a cash machine and a gift shop on site for guests’ conveniences.\r\n\r\nMongolian and European food can be enjoyed at Pharos, while Keun Janbi has Korean dishes on its menu. Other dining options include Safari Japanese restaurant and Harry’s night club. \r\n\r\nBayanzurkh is a great choice for travellers interested in nature walks, horse riding and sightseeing.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "210351",
                "section" => 7,
                "checkin" => "13:00",
                "checkinend" => "23:00",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "activities" => [
                    "pool_table"
                ],
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "special_diet_meal",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "hot_tub",
                    "fitness_center",
                    "massage"
                ],
                "transportation" => [
                    "shuttle_service_charge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "concierge_service",
                    "currency_exchange",
                    "atm_on_site",
                    "baggage_storage",
                    "newspapers"
                ],
                "entertainment" => [
                    "nightclub_dj",
                    "karoake"
                ],
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "shoeshine"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "shops" => [
                    "shops_onsite",
                    "souviner_gift_shop"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "elevator",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/acb4759.jpg",
                    "img/hotel/9718b35.jpg",
                    "img/hotel/c02ad56.jpg",
                    "img/hotel/2e9d57b.jpg",
                    "img/hotel/5461c33.jpg",
                    "img/hotel/635cfff.jpg",
                    "img/hotel/4610922.jpg",
                    "img/hotel/b77f996.jpg",
                    "img/hotel/29c7bc5.jpg",
                    "img/hotel/9081eae.jpg",
                    "img/hotel/111ee37.jpg",
                    "img/hotel/f26d95f.jpg",
                    "img/hotel/761ea90.jpg",
                    "img/hotel/e9092b2.jpg",
                    "img/hotel/8b0b2a4.jpg",
                    "img/hotel/79fdf63.jpg"
                ],
                "cover_image" => "img/hotel/5431097.jpg"
            ],
            [
                "objectId" => "IIxT9gAdBW",
                "name" => "Bishrelt Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 120,
                "status" => 1,
                "homepage" => 0,
                "average_rate" => "10",
                "createdAt" => "2017-03-15T07:48:57.279Z",
                "updatedAt" => "2017-03-15T08:11:08.740Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Laagan Street, P.O Box 104, Chingeltei, 211238 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 4,
                "num_rooms" => 28,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "Bishrelt hotel is one of the best located luxury hotels in the heart of Ulaanbaatar city.",
                "long_desc" => "The hotel has a spa centre and hot tub, and guests can enjoy a meal at the restaurant. Free WiFi is available throughout the property and free private parking is available on site.\r\n\r\nThe hotel is 800 m from the State Government House and the Sukhbaatar Square, 14 km from Chinggis Khaan International Airport, 2 km from the railway station and the Central Monastery Gandan is 0.8 km from the property.\r\n\r\nFeaturing the elegant interior and furnishing, each room will provide you with Eco solution environmentally friendly air conditioning system, a full HD flat-screen satellite TV and high-speed wired and wireless Internet access. Complete with a minibar, the dining area has an electric kettle and rich choices of free tea and coffee amenities and private bathrooms also come with bathrobes, a hairdryer and free toiletries.\r\n\r\nYou will find a 24-hour front desk at the property. At Bishrelt Hotel guest can also enjoy snooker and karaoke, or work out at the fitness centre. Meeting and events facilities are also available.\r\n\r\nThe Embassy comes with various choices of Asian and European cuisine. Continental and English Breakfast are served every morning. \r\n\r\nThis property is also rated for the best value in Ulaanbaatar! Guests are getting more for their money when compared to other properties in this city.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "211238",
                "section" => 7,
                "checkin" => "14:00",
                "checkinend" => "16:00",
                "checkout" => "11:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "activities" => [
                    "pool_table"
                ],
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "snack_bar",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "massage"
                ],
                "transportation" => [
                    "bicycle_rental",
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "concierge_service",
                    "tour_desk",
                    "currency_exchange",
                    "atm_on_site",
                    "baggage_storage",
                    "newspapers"
                ],
                "entertainment" => [
                    "evening_entertainment",
                    "nightclub_dj",
                    "karoake"
                ],
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "shoeshine"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "shops" => [
                    "shops_onsite",
                    "hair_beauty_salon",
                    "souviner_gift_shop"
                ],
                "others" => [
                    "adults_only",
                    "non_smoking_rooms",
                    "soundproof_rooms",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/5cf9435.jpg",
                    "img/hotel/a76274c.jpg",
                    "img/hotel/eabde1e.jpg",
                    "img/hotel/799aa4f.jpg",
                    "img/hotel/37faaaf.jpg",
                    "img/hotel/0f88638.jpg",
                    "img/hotel/a26e8fe.jpg",
                    "img/hotel/9700372.jpg"
                ],
                "cover_image" => "img/hotel/bc3d20b.jpg"
            ],
            [
                "objectId" => "6SVQLUxbNH",
                "name" => "AB Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 70,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "75",
                "createdAt" => "2017-03-16T07:07:47.009Z",
                "updatedAt" => "2017-05-05T08:35:45.208Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Amarbayasgalant Hotel, Diplomat Street, Sukhbaatar, 142100 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 3,
                "num_rooms" => 14,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 0,
                "short_desc" => "Stay in the heart of Ulaanbaatar",
                "long_desc" => "Located in Ulaanbaatar, 500 m from Memorial Museum of Victims of Political Persecution, AB Hotel boasts a restaurant and free WiFi. Guests can enjoy the on-site restaurant.\r\n\r\nAll rooms come with a flat-screen TV with satellite channels. Some units feature a seating area for your convenience. You will find a kettle in the room. Rooms are fitted with a private bathroom equipped with a bath. For your comfort, you will find slippers and free toiletries.\r\n\r\nThere is a 24-hour front desk at the property. Fee-based airport shuttle service is available.\r\n\r\nChinggis Khan Statue is 900 m from AB Hotel, while National Museum of Mongolian History is 1.1 km away. The nearest airport is Chinggis Khaan International Airport, 14 km from AB Hotel. \r\n\r\nThis is our guests' favourite part of Ulaanbaatar, according to independent reviews.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "142100",
                "section" => 7,
                "checkin" => "13:00",
                "checkinend" => "12:00",
                "checkout" => "00:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "grocery_deliveries",
                    "packed_lunch",
                    "special_diet_meal",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "sauna"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge",
                    "airport_shuttle_free"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "concierge_service",
                    "currency_exchange",
                    "baggage_storage",
                    "newspapers"
                ],
                "common_area" => [
                    "shared_lounge_tv_area"
                ],
                "cleaning" => [
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping"
                ],
                "business_fac" => [
                    "fax_photocopying"
                ],
                "others" => [
                    "adults_only",
                    "non_smoking_rooms",
                    "soundproof_rooms",
                    "vip_room_facilities",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/ed79ad7.jpg",
                    "img/hotel/bf80640.jpg",
                    "img/hotel/18abcf1.jpg",
                    "img/hotel/835520e.jpg",
                    "img/hotel/b5a4094.jpg",
                    "img/hotel/9bb3aa8.jpg",
                    "img/hotel/24795d8.jpg",
                    "img/hotel/a3a0c59.jpg",
                    "img/hotel/38aadfe.jpg",
                    "img/hotel/d5b0fc1.jpg",
                    "img/hotel/41201d8.jpg"
                ],
                "cover_image" => "img/hotel/f5518a6.jpg"
            ],
            [
                "objectId" => "VtqeF8HOru",
                "name" => "Guide Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 65,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "5",
                "createdAt" => "2017-03-17T03:32:11.439Z",
                "updatedAt" => "2017-05-05T08:35:38.343Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "9/3, University Street, Sukhbaatar, 212513 Ulaanbaatar, Mongolia ",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 2,
                "num_rooms" => 26,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "Offering a restaurant, Guide Hotel is centrally located in Ulaanbaatar. It is only a 5-min walk from Sukhbaatar Square.",
                "long_desc" => "Free WiFi access is available in all rooms.\r\n\r\nThe hotel is a 10-minute walk from Natural History Museum. It takes 15 minutes by taxi from Ulaanbaatar Railway Station to Guide Hotel. Chinggis Khaan International Airport is a 30-minute drive away.\r\n\r\nEach room here will provide you with a flat-screen TV with cable and satellite channelsa TV and a seating area. Coming with a bathtub and shower facilities, private bathroom also includes free toiletries.\r\n\r\nAt Guide Hotel you will find a 24-hour front desk. Currency exchange and luggage storage are both possible.\r\n\r\nGuest can enjoy Mongolian and European dishes at the on-site restaurant. \r\n\r\nSukhbaatar is a great choice for travellers interested in tours, history and nature.\r\n\r\nThis property is also rated for the best value in Ulaanbaatar! Guests are getting more for their money when compared to other properties in this city.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "212513",
                "section" => 7,
                "checkin" => "07:00",
                "checkinend" => "14:00",
                "checkout" => "05:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "activities" => [
                    "pool_table"
                ],
                "food_drink" => [
                    "restraurant",
                    "special_diet_meal",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "currency_exchange",
                    "baggage_storage"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "laundry",
                    "daily_housekeeping"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "fax_photocopying"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "heating"
                ],
                "images" => [
                    "img/hotel/2866da2.jpg",
                    "img/hotel/605eb95.jpg",
                    "img/hotel/1d0414e.jpg",
                    "img/hotel/8366050.jpg",
                    "img/hotel/5f076c9.jpg",
                    "img/hotel/53afceb.jpg",
                    "img/hotel/e90513b.jpg",
                    "img/hotel/71adba0.jpg",
                    "img/hotel/61b3e04.jpg",
                    "img/hotel/47bc8a5.jpg"
                ],
                "cover_image" => "img/hotel/17b965e.jpg"
            ],
            [
                "objectId" => "SF6X33fDlr",
                "name" => "New World",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 1,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "10",
                "createdAt" => "2017-03-17T04:41:31.708Z",
                "updatedAt" => "2017-03-17T04:51:49.047Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "100 ail, Sukhbaatar District, 10th Khoroo, Sukhbaatar, 210646 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 3,
                "num_rooms" => 1,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "Featuring a spa centre with sauna and massage services, located close to Embassy of the United States Ulaanbaatar.",
                "long_desc" => "It offers simply-furnished guest rooms and a business centre with meeting and banquet facilities. Free Wi-Fi is available in all areas.\r\n\r\nNew World Hotel is a 5-minute stroll from Dashchoilin Monastery and a 5-minute drive from Sukhbaatar Square. Ulaanbaatar Bus Station is only 3 minutes' drive away. It takes approximately 20 minutes to Ulaanbaatar Railway Station and 30 minutes to Ulaanbaatar Chinggis Khaan International Airport by car.\r\n\r\nAll units come with 24-hour hot water, a minibar, a refrigerator, a flat-screen cable TV, a safety deposit box and ironing facilities. The private bathroom includes a hairdryer, shower facilities and free toiletries.\r\n\r\nThe 24-hour front desk offers car rental service and helps guests organize excursions to tourist attractions with ticketing services. After a day of tours, guests can have fun at the karaoke. Laundry and dry cleaning are all provided.\r\n\r\nThe on-site New World Restaurant serves authentic European and Asian dishes as well as a breakfast buffet. ",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 0,
                    "longitude" => 0
                ],
                "zipcode" => "210646",
                "section" => 6,
                "checkin" => "13:00",
                "checkinend" => "23:00",
                "checkout" => "05:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "room_service",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "spa",
                    "sauna",
                    "fitness_center",
                    "massage"
                ],
                "transportation" => [
                    "car_rentral",
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "ticket_service",
                    "baggage_storage",
                    "newspapers"
                ],
                "entertainment" => [
                    "karoake"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "elevator",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/cb15156.jpg",
                    "img/hotel/ada573d.jpg",
                    "img/hotel/daa408a.jpg",
                    "img/hotel/e5e41a1.jpg",
                    "img/hotel/ff7d206.jpg",
                    "img/hotel/8eac1eb.jpg",
                    "img/hotel/a1e2b8b.jpg",
                    "img/hotel/842f9a8.jpg",
                    "img/hotel/8f33a72.jpg",
                    "img/hotel/04dc4d9.jpg",
                    "img/hotel/bdc4f29.jpg"
                ],
                "cover_image" => "img/hotel/2f54bd6.jpg"
            ],
            [
                "objectId" => "iSVy1K1unu",
                "name" => "Elegance Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 89,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => 0,
                "createdAt" => "2017-03-17T05:32:37.995Z",
                "updatedAt" => "2017-03-21T04:47:56.346Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Sambuu Street, Chingeltei district, 16-3, Chingeltei, 212513 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 2,
                "num_rooms" => 35,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 0,
                "short_desc" => "Featuring free WiFi and an on-restaurant, Elegance Hotel offers accommodation in Ulaanbaatar.",
                "long_desc" => "Stay in the heart of Ulaanbaatar.\r\n\r\nEvery room is equipped with a flat-screen TV. Certain units include a seating area for your convenience. Every room has a private bathroom. Extras include slippers and free toiletries.\r\n\r\nYou will find a 24-hour front desk at the property.\r\n\r\nUlaanbaatar Opera House is 300 m from Elegance Hotel, while National Museum of Mongolian History is 400 m away. The nearest airport is Chinggis Khaan International Airport, 14 km from Elegance Hotel. \r\n\r\nChingeltei is a great choice for travellers interested in shopping, scenery and food.",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.921858529506,
                    "longitude" => 106.90950661914
                ],
                "zipcode" => "212513",
                "section" => 2,
                "checkin" => "12:30",
                "checkinend" => "20:00",
                "checkout" => "04:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "special_diet_meal",
                    "breakfast_in_the_room"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "privavte_checkin_checkout",
                    "express_checkin_checkout",
                    "baggage_storage"
                ],
                "entertainment" => [
                    "karoake"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "ironing_service",
                    "laundry",
                    "daily_housekeeping"
                ],
                "others" => [
                    "adults_only",
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "elevator",
                    "honeymoon_suite",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/052d264.jpg",
                    "img/hotel/61fc656.jpg"
                ],
                "cover_image" => "img/hotel/e458b22.jpg"
            ],
            [
                "objectId" => "01HmsDwMJH",
                "name" => "UB Inn",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 1,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "7",
                "createdAt" => "2017-03-17T05:47:25.556Z",
                "updatedAt" => "2017-03-17T06:03:59.270Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Sambuu Street 35, Chingeltei district, Khoroo 5, Chingeltei, 110000 Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 3,
                "num_rooms" => 1,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => " UB INN hotel & gallery features a terrace and views of the city. Guests can enjoy the on-site bar.",
                "long_desc" => "All rooms have a flat-screen TV with cable channels. You will find a kettle in the room. The rooms are fitted with a private bathroom equipped with a bath. For your comfort, you will find bathrobes and slippers. UB INN hotel & gallery features free WiFi throughout the property.\r\n\r\nThere is a 24-hour front desk, a business centre, dry cleaning services and gift shop at the property.\r\n\r\nThe hotel also offers car hire. National Museum of Mongolian History is 800 m from UB INN hotel & gallery, while Sukhbaatar Square is 900 m from the property. The nearest airport is Chinggis Khaan International Airport, 13 km from the property. ",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.921319287211,
                    "longitude" => 106.90470010042
                ],
                "zipcode" => "110000",
                "section" => 6,
                "checkin" => "14:00",
                "checkinend" => "22:00",
                "checkout" => "05:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "breakfast_in_the_room"
                ],
                "pool_spa" => [
                    "sauna",
                    "fitness_center",
                    "massage"
                ],
                "transportation" => [
                    "car_rentral",
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "ticket_service",
                    "tour_desk",
                    "baggage_storage"
                ],
                "common_area" => [
                    "terrace"
                ],
                "cleaning" => [
                    "dry_cleaning",
                    "laundry",
                    "daily_housekeeping"
                ],
                "business_fac" => [
                    "meeting_banquet_facilities",
                    "business_center",
                    "fax_photocopying"
                ],
                "shops" => [
                    "souviner_gift_shop"
                ],
                "others" => [
                    "designated_smoking_area",
                    "non_smoking_rooms",
                    "facilities_for_disabled_guests",
                    "elevator",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/4d07d49.jpg",
                    "img/hotel/c812ed4.jpg",
                    "img/hotel/4c313e5.jpg",
                    "img/hotel/78049e7.jpg",
                    "img/hotel/1810625.jpg",
                    "img/hotel/455d076.jpg",
                    "img/hotel/ae8a116.jpg",
                    "img/hotel/e3df194.jpg",
                    "img/hotel/fa59e45.jpg",
                    "img/hotel/2d8ac2a.jpg",
                    "img/hotel/5779c55.jpg"
                ],
                "cover_image" => "img/hotel/35fa2df.jpg"
            ],
            [
                "objectId" => "sVGJbMV2CK",
                "name" => "Miami Hotel",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 1,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "6",
                "createdAt" => "2017-03-17T06:10:26.933Z",
                "updatedAt" => "2017-03-17T07:05:05.511Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Sukhbaatar district 4th khoroo, Lucky Center building, Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 2,
                "num_rooms" => 1,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "The Miami hotel established in 2007. It is located in downtown and a distance from airport is 25 minutes by car.",
                "long_desc" => " It is located in downtown and a distance from airport is 25 minutes of traveling by car. The hotel has the capacity to receive to 90 guests. \r\n\r\nGuest rooms also provide the following amenities internet access telephones with international call capability and cable TV  you may keep up with the world news plus a mini bar.\r\n\r\nThe \"Eltaro\" mongolian steak restaurant with a seating of 60-80 guests, located in the ground floor. We will service with delicious meals from 9 am to 12 pm. \\\r\n\r\nOur hotel and friendly staff will ensure you a pleasant and safe stay. \r\n\r\n  ",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.915082765938,
                    "longitude" => 106.90161824226
                ],
                "zipcode" => "110000",
                "section" => 6,
                "checkin" => "12:00",
                "checkinend" => "21:00",
                "checkout" => "05:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 1,
                "pets" => 0,
                "food_drink" => [
                    "restraurant",
                    "room_service"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk",
                    "currency_exchange",
                    "baggage_storage"
                ],
                "cleaning" => [
                    "laundry"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "air_conditioning",
                    "heating"
                ],
                "images" => [
                    "img/hotel/94f7d04.jpg"
                ],
                "cover_image" => "img/hotel/9864a1f.jpg"
            ],
            [
                "objectId" => "GnwEdGgGir",
                "name" => "Seoul Hotel Ulaanbaatar",
                "type" => "Hotel",
                "asem" => 1,
                "user" => [
                    "__type" => "Pointer",
                    "className" => "_User",
                    "objectId" => "FX2O44WA15"
                ],
                "min_rate" => 1,
                "status" => 0,
                "homepage" => 0,
                "average_rate" => "10",
                "createdAt" => "2017-03-21T02:06:26.243Z",
                "updatedAt" => "2017-03-21T02:45:58.238Z",
                "country" => "mn",
                "city" => "Ulaanbaatar",
                "address" => "Chingeltei District 3th Khoroo, Peace Avenue, Ulaanbaatar, Mongolia",
                "phone" => "976-99066350; 976-90009090",
                "stars" => 2,
                "num_rooms" => 1,
                "website" => "",
                "chain_name" => "",
                "credit_card" => 1,
                "short_desc" => "This city center placed hotel is near the State Department store and Ulaanbaatar department store.",
                "long_desc" => "Free high speed internet, room service and 2nd floor has the \"Nightly Strip Joint\" and restaurant. \r\nPrice is cheaper and non-smoking rooms, family rooms and Kitchenette.\r\nIn the room has refrigerator, flat screen TV and minibar. ",
                "geolocation" => [
                    "__type" => "GeoPoint",
                    "latitude" => 47.916422709939,
                    "longitude" => 106.90165311229
                ],
                "zipcode" => "210000",
                "section" => 6,
                "checkin" => "07:00",
                "checkinend" => "12:00",
                "checkout" => "05:00",
                "wifi" => 1,
                "breakfast" => 1,
                "parking" => 1,
                "children" => 0,
                "pets" => 1,
                "activities" => [
                    "pool_table"
                ],
                "food_drink" => [
                    "restraurant",
                    "bar",
                    "room_service"
                ],
                "transportation" => [
                    "airport_shuttle_surcharge"
                ],
                "front_desk" => [
                    "24_hour_front_desk"
                ],
                "entertainment" => [
                    "nightclub_dj",
                    "karoake"
                ],
                "cleaning" => [
                    "laundry"
                ],
                "others" => [
                    "non_smoking_rooms",
                    "air_conditioning",
                    "heating"
                ],
                "cover_image" => "img/hotel/a0ed919.jpg"
            ]
        ];
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
        Schema::dropIfExists('favorites');
    }
}
