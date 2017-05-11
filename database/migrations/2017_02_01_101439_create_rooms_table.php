<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id');
            $table->integer('room_category_id');
            $table->string('name');
            $table->integer('number');
            $table->integer('bed_number');
            $table->integer('people_number');
            $table->integer('price');
            $table->integer('price_op')->nullable()->default(null);
            $table->integer('total_people')->nullable()->default(null);
            $table->integer('size')->nullable()->default(null);
            $table->text('introduction')->nullable()->default(null);
            $table->text('introduction_en')->nullable()->default(null);
            $table->text('photos')->nullable()->default(null);
            $table->string('key')->nullable()->default(null);
            $table->timestamps();
        });

        $rooms = [
            [
                "objectId" => "08n9Vygi67",
                "room_type" => "Twin",
                "adult_occupancy" => 2,
                "createdAt" => "2016-01-26T15:31:24.716Z",
                "updatedAt" => "2016-04-15T03:34:50.106Z",
                "images" => [
                    "img/room/20160126103124e851b2e.png",
                    "img/room/201604142334490.png"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "IdSnu9yQhT"
                ],
                "child_occupancy" => 1,
                "num_beds" => 2,
                "short_desc" => "Offering free WiFi, this soundproofed room features a flat-screen cable satellite ",
                "bed_size" => "Twin",
                "roomt_size" => "25",
                "num_of_guest" => 2,
                "night_price" => 79,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_rooms" => 10,
                "night_price2" => 79
            ],
            [
                "objectId" => "0bBehFtRXC",
                "night_price2" => 667000,
                "createdAt" => "2016-05-10T03:24:33.068Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "6VSsxUSqRr"
                ],
                "short_desc" => "King size бүхий хосын өргөн ортой",
                "images" => [
                    "img/room/201605092324320.jpg"
                ],
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "updatedAt" => "2016-05-10T03:24:33.068Z",
                "num_beds" => 1,
                "bed_size" => "King",
                "adult_occupancy" => 2,
                "num_rooms" => 10,
                "num_of_guest" => 2,
                "roomt_size" => "55",
                "child_occupancy" => 1,
                "room_type" => "Deluxe Double",
                "night_price" => 548000
            ],
            [
                "objectId" => "0k65LDhOGX",
                "short_desc" => "This double room features a sofa, cable TV and air conditioning.\r\n",
                "adult_occupancy" => 2,
                "child_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "bed_size" => "Full",
                "images" => [
                    "img/room/20160425080939be4b718.png"
                ],
                "night_price" => 80,
                "num_rooms" => 2,
                "updatedAt" => "2017-01-10T15:35:26.669Z",
                "createdAt" => "2016-04-25T12:09:40.288Z",
                "num_beds" => 1,
                "night_price2" => 90,
                "roomt_size" => "35",
                "num_of_guest" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "F5TeR4VGpi"
                ],
                "room_type" => "Superior apartment"
            ],
            [
                "objectId" => "0t6n3Jrtp6",
                "adult_occupancy" => 2,
                "createdAt" => "2016-06-07T01:54:00.310Z",
                "updatedAt" => "2016-06-07T01:54:00.310Z",
                "facilities" => [
                    "tv",
                    "bar",
                    "kitchen"
                ],
                "roomt_size" => "80",
                "images" => [
                    "img/room/661d10f.jpg"
                ],
                "room_type" => "Бүтэн люкс өрөө",
                "night_price" => 398000,
                "num_beds" => 1,
                "child_occupancy" => 1,
                "night_price2" => 454000,
                "num_of_guest" => 2,
                "num_rooms" => 3,
                "bed_size" => "King",
                "short_desc" => "Үнэгүй өглөөний цай, өндөр хурдны интернет, хосын өргөн ор"
            ],
            [
                "objectId" => "1pskfC26St",
                "child_occupancy" => 1,
                "roomt_size" => "18",
                "num_rooms" => 24,
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_beds" => 2,
                "night_price2" => 161,
                "room_type" => "Standard Twin",
                "updatedAt" => "2016-06-28T08:23:26.973Z",
                "short_desc" => " This room features one double bed, mini bar, flat screen TV, and provides free WIFI",
                "night_price" => 134,
                "createdAt" => "2016-04-11T07:51:24.811Z",
                "adult_occupancy" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "MaGHICo3s0"
                ],
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "images" => [
                    "img/room/201604110358230.png"
                ]
            ],
            [
                "objectId" => "2ibNmHitiW",
                "adult_occupancy" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "updatedAt" => "2016-03-19T16:35:15.829Z",
                "images" => [
                    "img/room/2016031623434383b4842.png",
                    "img/room/20160316234343f7d6d98.png"
                ],
                "num_beds" => 1,
                "bed_size" => "King",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "aZZnxV1FeB"
                ],
                "room_type" => "Deluxe Double",
                "num_of_guest" => 2,
                "child_occupancy" => 1,
                "roomt_size" => "40",
                "short_desc" => "Өндөр хурдны интернэт, амрах өрөө, 2 хүний нэг том өрөө",
                "night_price2" => 245000,
                "night_price" => 245000,
                "createdAt" => "2016-03-17T03:43:43.753Z",
                "num_rooms" => 6
            ],
            [
                "objectId" => "2lOp7o04dG",
                "night_price2" => 135,
                "images" => [
                    "img/room/2016042100082479fe0d1.png"
                ],
                "adult_occupancy" => 2,
                "createdAt" => "2016-04-21T04:08:24.572Z",
                "roomt_size" => "32",
                "child_occupancy" => 1,
                "bed_size" => "Queen",
                "short_desc" => "This room features 1 king bed",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "yMc9Ba3dqX"
                ],
                "num_of_guest" => 2,
                "updatedAt" => "2016-04-21T04:08:24.572Z",
                "num_beds" => 1,
                "room_type" => "King guest room",
                "num_rooms" => 5,
                "night_price" => 120,
                "facilities" => [
                    "tv",
                    "bar"
                ]
            ],
            [
                "objectId" => "37Y21EqbUF",
                "num_rooms" => 2,
                "roomt_size" => "66",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Lcxo33Vwch"
                ],
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price2" => 209,
                "createdAt" => "2016-03-15T03:30:18.226Z",
                "num_beds" => 1,
                "night_price" => 209,
                "updatedAt" => "2017-01-10T13:08:11.343Z",
                "images" => [
                    "img/room/201604200254520.png"
                ],
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "adult_occupancy" => 1,
                "room_type" => "Deluxe Single",
                "short_desc" => "This twin/double room has a balcony, bathrobe and private entrance.",
                "child_occupancy" => 1
            ],
            [
                "objectId" => "3QXmebzjuZ",
                "night_price" => 165,
                "room_type" => "Semi-lux",
                "night_price2" => 187,
                "num_beds" => 1,
                "num_of_guest" => 2,
                "images" => [
                    "img/room/201604110419033902239.png"
                ],
                "updatedAt" => "2016-06-28T08:22:22.516Z",
                "roomt_size" => "40",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_rooms" => 3,
                "child_occupancy" => 1,
                "bed_size" => "Queen",
                "adult_occupancy" => 2,
                "short_desc" => "This room features 1 large bed, mini bar, flat screen TV and it provides free WIFI",
                "createdAt" => "2016-04-11T08:19:03.514Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "MaGHICo3s0"
                ]
            ],
            [
                "objectId" => "3w1ZFHEgdg",
                "images" => [
                    "img/room/2016042100174644475be.png"
                ],
                "room_type" => "Deluxe Single",
                "adult_occupancy" => 2,
                "num_beds" => 1,
                "child_occupancy" => 1,
                "updatedAt" => "2016-04-21T04:17:46.388Z",
                "bed_size" => "King",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "yMc9Ba3dqX"
                ],
                "night_price" => 417,
                "night_price2" => 417,
                "createdAt" => "2016-04-21T04:17:46.388Z",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "short_desc" => "This double room features a sofa, kitchenette and microwave.",
                "num_of_guest" => 2,
                "roomt_size" => "98",
                "num_rooms" => 2
            ],
            [
                "objectId" => "458SX1Gnd3",
                "night_price2" => 234,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "MaGHICo3s0"
                ],
                "short_desc" => "This room features 3 single beds, mini bar, flat screen TV, and it provides free WIFI",
                "adult_occupancy" => 3,
                "images" => [
                    "img/room/20160411040344f758d38.png"
                ],
                "bed_size" => "Twin",
                "num_beds" => 3,
                "num_of_guest" => 3,
                "updatedAt" => "2016-06-28T08:22:50.117Z",
                "num_rooms" => 2,
                "createdAt" => "2016-04-11T08:03:44.367Z",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "roomt_size" => "28",
                "night_price" => 134,
                "child_occupancy" => 1,
                "room_type" => "Standard triple"
            ],
            [
                "objectId" => "4DfNM98rz6",
                "short_desc" => "2 хүний өргөн ор, душтай угаалгын өрөө, мини бар, зурагт болон интернеттэй ",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "fkoX3OapCN"
                ],
                "updatedAt" => "2016-04-12T02:23:03.997Z",
                "num_of_guest" => 2,
                "room_type" => "Double Room",
                "adult_occupancy" => 2,
                "createdAt" => "2016-04-12T01:24:25.051Z",
                "child_occupancy" => 1,
                "bed_size" => "Queen",
                "night_price2" => 125000,
                "num_beds" => 1,
                "night_price" => 125000,
                "images" => [
                    "img/room/20160411212424a540c90.png"
                ],
                "num_rooms" => 10,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "roomt_size" => "26"
            ],
            [
                "objectId" => "4pYNL359QX",
                "num_beds" => 1,
                "child_occupancy" => 1,
                "images" => [
                    "img/room/20160427063048ef7ac11.png"
                ],
                "createdAt" => "2016-04-27T10:30:49.102Z",
                "num_rooms" => 22,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_of_guest" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "iobqh1OPED"
                ],
                "bed_size" => "King",
                "short_desc" => "Spacious room features 1 queen-size bed, flat-screen cable TV, iPod dock, sofa, air conditioning, heating, ",
                "adult_occupancy" => 2,
                "roomt_size" => "35",
                "room_type" => "Deluxe room",
                "night_price2" => 135,
                "night_price" => 120,
                "updatedAt" => "2017-03-13T03:52:09.657Z"
            ],
            [
                "objectId" => "4vcO4gOwgE",
                "night_price" => 99,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "adult_occupancy" => 2,
                "roomt_size" => "35",
                "images" => [
                    "img/room/201601261035262773707.png",
                    "img/room/201604142336270.png"
                ],
                "child_occupancy" => 1,
                "updatedAt" => "2016-04-15T03:36:27.830Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "IdSnu9yQhT"
                ],
                "bed_size" => "King",
                "short_desc" => "Offering free WiFi, this soundproofed room features a flat-screen cable satellite ",
                "createdAt" => "2016-01-26T15:35:26.391Z",
                "num_rooms" => 2,
                "num_of_guest" => 2,
                "room_type" => "Deluxe Double",
                "num_beds" => 1,
                "night_price2" => 99
            ],
            [
                "objectId" => "5sSLoDqEZS",
                "short_desc" => "Suite features a living room and 2 bedrooms. It has a minibar, a cable TV",
                "roomt_size" => "29",
                "child_occupancy" => 1,
                "room_type" => "Standard Twin ",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "LsqDSlN9xB"
                ],
                "night_price" => 165,
                "num_beds" => 2,
                "createdAt" => "2016-01-26T16:16:43.327Z",
                "images" => [
                    "img/room/201601261116439e4e62d.png",
                    "img/room/201604200624450.png"
                ],
                "updatedAt" => "2017-01-10T13:38:40.833Z",
                "adult_occupancy" => 2,
                "num_of_guest" => 2,
                "bed_size" => "Twin",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_rooms" => 45,
                "night_price2" => 185
            ],
            [
                "objectId" => "6AzDuokIte",
                "num_beds" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "gmlVXITiCK"
                ],
                "child_occupancy" => 1,
                "bed_size" => "Twin",
                "adult_occupancy" => 2,
                "createdAt" => "2016-03-11T07:49:06.808Z",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_of_guest" => 2,
                "room_type" => "Twin",
                "roomt_size" => "33",
                "images" => [
                    "img/room/20160311024906ba82060.png",
                    "img/room/20160311024906daf2fd7.png",
                    "img/room/20160311024906613874d.png",
                    "img/room/201603110446181.png"
                ],
                "updatedAt" => "2017-01-10T15:21:54.219Z",
                "num_rooms" => 5,
                "night_price" => 98,
                "short_desc" => "Өглөөний цай өрөөний үнэд батсан.\r\n0-12 насны хүүхэд үнэгүй орох боломжтой.",
                "night_price2" => 98
            ],
            [
                "objectId" => "6JvtOIkRdM",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "MlVZA3qvoO"
                ],
                "roomt_size" => "45",
                "num_of_guest" => 2,
                "images" => [
                    "img/room/0629dae.jpg"
                ],
                "adult_occupancy" => 2,
                "num_beds" => 1,
                "bed_size" => "King",
                "room_type" => "Suite King",
                "createdAt" => "2016-06-27T10:14:06.135Z",
                "updatedAt" => "2016-06-27T10:14:06.135Z",
                "num_rooms" => 3,
                "short_desc" => "Free Wifi, breakfast",
                "night_price2" => 128,
                "night_price" => 117,
                "child_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar"
                ]
            ],
            [
                "objectId" => "6i7XyxBzxI",
                "updatedAt" => "2016-06-27T10:13:07.385Z",
                "num_beds" => 2,
                "images" => [
                    "img/room/2e9cf00.jpg"
                ],
                "night_price2" => 128,
                "short_desc" => "Free Wifi, breakfast",
                "room_type" => "Suite Twin",
                "num_of_guest" => 2,
                "num_rooms" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "MlVZA3qvoO"
                ],
                "night_price" => 117,
                "createdAt" => "2016-06-27T10:13:07.385Z",
                "adult_occupancy" => 2,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "child_occupancy" => 1,
                "bed_size" => "Twin",
                "roomt_size" => "45"
            ],
            [
                "objectId" => "6jVBjfZtxT",
                "child_occupancy" => 1,
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "night_price" => 100,
                "short_desc" => "Bedroom /with double bed/ - bed size 2,0*1,95. Iron and Ironing board are available upon request.",
                "num_rooms" => 10,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "2AnVllEkUT"
                ],
                "createdAt" => "2016-05-05T11:52:52.747Z",
                "updatedAt" => "2016-05-16T10:47:25.776Z",
                "roomt_size" => "45",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "bed_size" => "Queen",
                "num_of_guest" => 2,
                "night_price2" => 122,
                "room_type" => "Semi-Deluxe",
                "images" => [
                    "img/room/201605160647250.jpg"
                ]
            ],
            [
                "objectId" => "707iniTwSA",
                "bed_size" => "Queen",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub",
                    "kitchen"
                ],
                "updatedAt" => "2017-01-10T13:31:15.032Z",
                "short_desc" => "This room features living room, kitchen, and provides free WIFI",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "90",
                "child_occupancy" => 1,
                "num_of_guest" => 2,
                "night_price2" => 200,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "PrIYApIg5O"
                ],
                "images" => [
                    "img/room/201604110447150597e9a.png"
                ],
                "room_type" => "Family suite",
                "night_price" => 200,
                "createdAt" => "2016-04-11T08:47:15.688Z",
                "num_rooms" => 5
            ],
            [
                "objectId" => "76Uve3pQsg",
                "bed_size" => "King",
                "room_type" => "Deluxe Double",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "ybVDUEDC5x"
                ],
                "updatedAt" => "2017-03-13T03:30:29.734Z",
                "night_price2" => 290,
                "num_of_guest" => 2,
                "num_rooms" => 5,
                "createdAt" => "2017-01-10T16:05:24.219Z",
                "num_beds" => 1,
                "roomt_size" => "40",
                "facilities" => [],
                "images" => [
                    "img/room/5a5ec4d.jpg"
                ],
                "adult_occupancy" => 2,
                "child_occupancy" => 1,
                "night_price" => 290,
                "short_desc" => "This double room has a washing machine, cable TV and seating area."
            ],
            [
                "objectId" => "7Is6nwPSCe",
                "updatedAt" => "2016-05-26T06:46:57.789Z",
                "room_type" => "Standard",
                "createdAt" => "2016-05-26T06:46:57.789Z",
                "num_beds" => 2,
                "night_price2" => 156,
                "short_desc" => "View, Mountain view, City view, TV, Telephone, Cable Channels, ",
                "child_occupancy" => 1,
                "roomt_size" => "36",
                "night_price" => 134,
                "images" => [
                    "img/room/157ddbd.jpg"
                ],
                "num_rooms" => 32,
                "num_of_guest" => 2,
                "adult_occupancy" => 2,
                "bed_size" => "Twin",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "DNFQck6Lkp"
                ]
            ],
            [
                "objectId" => "7yrGXYOHLk",
                "adult_occupancy" => 2,
                "images" => [
                    "img/room/201512070511440c71cc0.png"
                ],
                "roomt_size" => "38.5",
                "num_of_guest" => 2,
                "child_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "LYkfWI2A45"
                ],
                "updatedAt" => "2016-03-19T16:37:28.475Z",
                "short_desc" => "40m² Sky Superior King gives just the right amount of serenity for a relaxing stay. ",
                "createdAt" => "2015-12-07T04:11:45.283Z",
                "bed_size" => "King",
                "num_rooms" => 54,
                "room_type" => "Deluxe Room",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 100,
                "num_beds" => 1
            ],
            [
                "objectId" => "8h5jnnUHRh",
                "createdAt" => "2015-12-07T02:32:25.378Z",
                "num_of_guest" => 2,
                "child_occupancy" => 1,
                "num_rooms" => 0,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub",
                    "kitchen",
                    "wash"
                ],
                "bed_size" => "Twin",
                "night_price" => 140,
                "updatedAt" => "2017-03-03T08:06:07.913Z",
                "room_type" => "Standard Twin",
                "num_beds" => 2,
                "short_desc" => "This twin room has an electric kettle, air conditioning and satellite TV.",
                "roomt_size" => "30",
                "images" => [
                    "img/room/201604150451020.png"
                ],
                "adult_occupancy" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "vrrPDnTXdN"
                ],
                "night_price2" => 140
            ],
            [
                "objectId" => "9J3e2fVUPt",
                "night_price2" => 179,
                "num_of_guest" => 3,
                "night_price" => 179,
                "createdAt" => "2016-03-15T06:38:02.890Z",
                "bed_size" => "Twin",
                "num_rooms" => 3,
                "roomt_size" => "43",
                "short_desc" => "This triple room has a balcony, electric kettle and seating area.",
                "updatedAt" => "2017-01-10T13:12:43.699Z",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_beds" => 3,
                "child_occupancy" => 1,
                "images" => [
                    "img/room/201604200225550.png"
                ],
                "room_type" => "Standard triple",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Lcxo33Vwch"
                ],
                "adult_occupancy" => 3
            ],
            [
                "objectId" => "A9nPsopwDC",
                "night_price" => 165,
                "room_type" => "Standard King",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "roomt_size" => "29",
                "short_desc" => "Suite features a living room and a bedroom. It has a minibar, a cable TV, an in-room safe, ironing facilities ",
                "num_rooms" => 55,
                "bed_size" => "King",
                "adult_occupancy" => 2,
                "child_occupancy" => 1,
                "createdAt" => "2016-01-26T16:10:51.246Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "LsqDSlN9xB"
                ],
                "images" => [
                    "img/room/201604200621540.png"
                ],
                "num_of_guest" => 2,
                "updatedAt" => "2017-01-10T13:41:34.448Z",
                "num_beds" => 1,
                "night_price2" => 185
            ],
            [
                "objectId" => "ArJfy8NCob",
                "updatedAt" => "2016-06-22T09:52:29.597Z",
                "bed_size" => "Full",
                "short_desc" => "Free WiFi, breakfast, government house view. ",
                "room_type" => "Business Room",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "adult_occupancy" => 2,
                "images" => [
                    "img/room/0bf9654.jpg"
                ],
                "child_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "2CgQ3IJmEd"
                ],
                "num_rooms" => 6,
                "num_beds" => 1,
                "night_price2" => 209,
                "roomt_size" => "25",
                "num_of_guest" => 2,
                "createdAt" => "2016-05-09T08:23:06.267Z",
                "night_price" => 179
            ],
            [
                "objectId" => "BYsph0d6Vb",
                "bed_size" => "Twin",
                "num_beds" => 1,
                "createdAt" => "2016-03-15T06:42:02.751Z",
                "roomt_size" => "76",
                "night_price2" => 159,
                "updatedAt" => "2017-01-10T13:13:49.655Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Lcxo33Vwch"
                ],
                "images" => [
                    "img/room/201604200318510.png"
                ],
                "room_type" => "Suite single",
                "short_desc" => "This room is a deluxe triple room which has own kitchen, and seating area.",
                "child_occupancy" => 1,
                "adult_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_rooms" => 2,
                "num_of_guest" => 1,
                "night_price" => 159
            ],
            [
                "objectId" => "Blge5vAKoU",
                "room_type" => "Family room",
                "bed_size" => "Full",
                "num_rooms" => 2,
                "num_beds" => 1,
                "updatedAt" => "2016-06-20T09:06:39.512Z",
                "short_desc" => "This room features one double bed and one bunk bed for 2 persons.",
                "num_of_guest" => 4,
                "createdAt" => "2016-04-26T09:50:51.723Z",
                "roomt_size" => "85",
                "images" => [
                    "img/room/201604260550511a48920.png"
                ],
                "child_occupancy" => 1,
                "night_price2" => 80000,
                "night_price" => 80000,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "PbtIwCCjcQ"
                ],
                "adult_occupancy" => 4,
                "facilities" => []
            ],
            [
                "objectId" => "BnpxX2msg0",
                "child_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "SvTXmdzBbz"
                ],
                "short_desc" => "Үнэгүй өглөөний цай, өндөр хурдны интернет",
                "updatedAt" => "2016-06-07T06:04:49.549Z",
                "num_rooms" => 4,
                "num_of_guest" => 3,
                "images" => [
                    "img/room/83c615a.jpg"
                ],
                "night_price" => 500000,
                "createdAt" => "2016-06-07T06:04:49.549Z",
                "adult_occupancy" => 3,
                "night_price2" => 500000,
                "room_type" => "Suite Triple",
                "bed_size" => "Twin",
                "facilities" => [
                    "bar",
                    "bathtub"
                ],
                "roomt_size" => "85",
                "num_beds" => 3
            ],
            [
                "objectId" => "CID3ruO8Q1",
                "images" => [
                    "img/room/523ea4a.jpg"
                ],
                "night_price" => 80,
                "short_desc" => "Room comes with a balcony overlooking the city and the mountain",
                "night_price2" => 103,
                "num_rooms" => 24,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "q0eyY9f5np"
                ],
                "num_beds" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "room_type" => "Standard Twin",
                "adult_occupancy" => 2,
                "roomt_size" => "17",
                "child_occupancy" => 1,
                "num_of_guest" => 2,
                "bed_size" => "Twin",
                "createdAt" => "2016-05-26T04:47:12.814Z",
                "updatedAt" => "2016-05-26T04:47:12.814Z"
            ],
            [
                "objectId" => "DGB96O9yFa",
                "night_price2" => 209,
                "bed_size" => "King",
                "roomt_size" => "40",
                "num_beds" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "images" => [
                    "img/room/6cdfac4.jpg",
                    "img/room/74ffcf2.jpg",
                    "img/room/ea4565c.jpg",
                    "img/room/0fea628.jpg"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "vkbW6u2w1b"
                ],
                "short_desc" => "Offering city views, the room comes with a minibar, air purifier with humidifier and 40-inch flat-screen TV. \r\n\r\nEn suite ",
                "child_occupancy" => 1,
                "num_rooms" => 61,
                "createdAt" => "2017-01-10T16:00:01.118Z",
                "night_price" => 209,
                "updatedAt" => "2017-03-15T04:56:33.680Z",
                "num_of_guest" => 2,
                "adult_occupancy" => 2,
                "room_type" => "Deluxe Double"
            ],
            [
                "objectId" => "E16KaIj1Qu",
                "facilities" => [
                    "bar",
                    "bathtub"
                ],
                "createdAt" => "2016-04-12T06:31:38.577Z",
                "images" => [
                    "img/room/20160412023136f10c4e9.png"
                ],
                "num_rooms" => 6,
                "updatedAt" => "2016-06-20T06:44:05.171Z",
                "night_price" => 110,
                "room_type" => "Standard Single",
                "num_beds" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "tFt4tyN397"
                ],
                "roomt_size" => "22",
                "child_occupancy" => 1,
                "short_desc" => "This room features 1 single bed, seating area, WiFi",
                "num_of_guest" => 1,
                "adult_occupancy" => 1,
                "bed_size" => "Twin",
                "night_price2" => 130
            ],
            [
                "objectId" => "F4kPdMk6r2",
                "num_beds" => 1,
                "roomt_size" => "45",
                "adult_occupancy" => 2,
                "bed_size" => "King",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "KewVbvwQLn"
                ],
                "num_rooms" => 2,
                "room_type" => "Deluxe Double",
                "night_price2" => 88300,
                "createdAt" => "2016-05-09T01:49:37.665Z",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "child_occupancy" => 1,
                "short_desc" => "Хосын өргөн ортой бүтэн люкс өрөө.",
                "updatedAt" => "2016-05-09T01:49:37.665Z",
                "num_of_guest" => 2,
                "images" => [
                    "img/room/201605082149370.jpg"
                ],
                "night_price" => 88300
            ],
            [
                "objectId" => "FIISOA0KH1",
                "num_of_guest" => 2,
                "images" => [
                    "img/room/201604200633200.png"
                ],
                "short_desc" => "Room comes with 2 single beds, a minibar, a cable TV, an in-room safe, ironing facilities ",
                "child_occupancy" => 1,
                "adult_occupancy" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "createdAt" => "2016-01-26T15:55:16.999Z",
                "updatedAt" => "2017-01-10T13:40:34.346Z",
                "bed_size" => "Twin",
                "night_price" => 200,
                "num_rooms" => 10,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "LsqDSlN9xB"
                ],
                "roomt_size" => "29",
                "room_type" => "Executive twin ",
                "num_beds" => 2,
                "night_price2" => 227
            ],
            [
                "objectId" => "FV0Gc0Hwjh",
                "adult_occupancy" => 2,
                "roomt_size" => "45",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "short_desc" => "High speed  WiFi, Served free breakfasts every morning with a different picking",
                "images" => [
                    "img/room/88c5c08.jpg"
                ],
                "child_occupancy" => 1,
                "room_type" => "Standard Twin",
                "num_rooms" => 26,
                "night_price" => 106,
                "bed_size" => "Twin",
                "num_beds" => 2,
                "num_of_guest" => 2,
                "night_price2" => 106,
                "updatedAt" => "2016-06-28T00:42:26.269Z",
                "createdAt" => "2016-06-28T00:42:26.269Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "VCNzEKByHF"
                ]
            ],
            [
                "objectId" => "FVMexX8u7w",
                "updatedAt" => "2016-04-25T12:13:03.179Z",
                "roomt_size" => "52",
                "num_beds" => 1,
                "num_of_guest" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "F5TeR4VGpi"
                ],
                "images" => [
                    "img/room/20160425081302dab7025.png"
                ],
                "night_price2" => 165,
                "num_rooms" => 2,
                "short_desc" => "This twin room features a bathrobe, dining area and tumble dryer .",
                "room_type" => "Deluxe suite",
                "bed_size" => "King",
                "child_occupancy" => 1,
                "night_price" => 150,
                "adult_occupancy" => 2,
                "createdAt" => "2016-04-25T12:13:03.179Z"
            ],
            [
                "objectId" => "FjchO4xH9t",
                "num_rooms" => 5,
                "short_desc" => "This double room features a balcony, seating area and patio.",
                "adult_occupancy" => 2,
                "night_price2" => 159,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Lcxo33Vwch"
                ],
                "bed_size" => "Full",
                "createdAt" => "2016-03-15T03:37:25.789Z",
                "num_beds" => 1,
                "room_type" => "Standard Double",
                "updatedAt" => "2017-01-10T13:08:55.503Z",
                "child_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "images" => [
                    "img/room/201604200218000.png"
                ],
                "night_price" => 159,
                "num_of_guest" => 2,
                "roomt_size" => "42"
            ],
            [
                "objectId" => "Fmbx2XKkXn",
                "bed_size" => "Twin",
                "num_beds" => 3,
                "short_desc" => "Larger twin-sharing room features a flat-screen TV, minibar and an en suite bathroom with a shower or bathtub.",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "90bC0pQE8Z"
                ],
                "num_rooms" => 3,
                "adult_occupancy" => 3,
                "num_of_guest" => 3,
                "night_price" => 167,
                "child_occupancy" => 1,
                "images" => [
                    "img/room/2016042707224072f6e5c.png"
                ],
                "night_price2" => 167,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "roomt_size" => "25",
                "createdAt" => "2016-04-27T11:22:40.296Z",
                "room_type" => "Standard triple",
                "updatedAt" => "2017-03-03T08:35:20.728Z"
            ],
            [
                "objectId" => "FrlNaq04Ib",
                "num_rooms" => 10,
                "facilities" => [
                    "bar"
                ],
                "updatedAt" => "2016-04-21T04:13:26.965Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "yMc9Ba3dqX"
                ],
                "child_occupancy" => 1,
                "createdAt" => "2016-04-21T04:13:26.965Z",
                "short_desc" => "This room features 2 large beds",
                "night_price2" => 145,
                "room_type" => "Deluxe Twin ",
                "images" => [
                    "img/room/20160421001326d76368d.png"
                ],
                "adult_occupancy" => 2,
                "bed_size" => "Full",
                "num_of_guest" => 2,
                "night_price" => 130,
                "num_beds" => 2,
                "roomt_size" => "46"
            ],
            [
                "objectId" => "FuPPt2Sp2g",
                "adult_occupancy" => 2,
                "child_occupancy" => 1,
                "bed_size" => "King",
                "night_price2" => 612000,
                "night_price" => 612000,
                "createdAt" => "2016-03-17T03:47:30.573Z",
                "num_beds" => 1,
                "short_desc" => "This suite has a balcony, minibar and executive lounge access.",
                "num_of_guest" => 2,
                "images" => [
                    "img/room/20160316234729d72b275.png",
                    "img/room/2016031623472992f9ab7.png",
                    "img/room/20160316234730e778ea1.png",
                    "img/room/20160316234730a360639.png",
                    "img/room/201603162347307ca008d.png"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "aZZnxV1FeB"
                ],
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_rooms" => 1,
                "roomt_size" => "50",
                "updatedAt" => "2016-03-19T16:34:55.655Z",
                "room_type" => "Executive Suite"
            ],
            [
                "objectId" => "GF0A32q1VY",
                "bed_size" => "Twin",
                "images" => [
                    "img/room/201605082203080.jpg"
                ],
                "short_desc" => "2 тусдаа ортой бүтэн люкс өрөө. ",
                "room_type" => "Deluxe Twin",
                "updatedAt" => "2016-05-16T03:30:29.388Z",
                "num_beds" => 3,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "num_rooms" => 7,
                "num_of_guest" => 2,
                "night_price2" => 94200,
                "roomt_size" => "45",
                "adult_occupancy" => 2,
                "createdAt" => "2016-05-09T02:03:09.143Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "KewVbvwQLn"
                ],
                "night_price" => 94200,
                "child_occupancy" => 1
            ],
            [
                "objectId" => "GQ5lpKhgAc",
                "night_price2" => 246,
                "updatedAt" => "2016-06-28T00:45:38.698Z",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "short_desc" => "High speed  WiFi, Served free breakfasts every morning with a different picking",
                "images" => [
                    "img/room/ce927e5.jpg"
                ],
                "num_rooms" => 1,
                "room_type" => "Business Junior Suite",
                "num_of_guest" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "VCNzEKByHF"
                ],
                "bed_size" => "Twin",
                "roomt_size" => "45",
                "createdAt" => "2016-06-28T00:45:38.698Z",
                "adult_occupancy" => 2,
                "night_price" => 246,
                "child_occupancy" => 1,
                "num_beds" => 2
            ],
            [
                "objectId" => "H5djrukTrX",
                "child_occupancy" => 1,
                "createdAt" => "2015-12-07T02:39:10.272Z",
                "bed_size" => "Twin",
                "images" => [
                    "img/room/997cbb7.jpg",
                    "img/room/74516d1.jpg"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "vrrPDnTXdN"
                ],
                "num_of_guest" => 2,
                "roomt_size" => "30",
                "updatedAt" => "2017-03-23T10:12:57.248Z",
                "num_beds" => 2,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub",
                    "kitchen",
                    "wash"
                ],
                "night_price" => 135,
                "num_rooms" => 5,
                "adult_occupancy" => 2,
                "room_type" => "Superior Double",
                "short_desc" => "This twin room features an electric kettle, satellite TV and air conditioning.",
                "night_price2" => 170
            ],
            [
                "objectId" => "HA5JJjz8zU",
                "child_occupancy" => 1,
                "createdAt" => "2016-04-12T06:44:43.682Z",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "roomt_size" => "25",
                "short_desc" => "This room features 2 single beds, WiFi, TV, and seating area. ",
                "images" => [
                    "img/room/201604130544190.png"
                ],
                "night_price" => 120,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "tFt4tyN397"
                ],
                "night_price2" => 140,
                "updatedAt" => "2016-06-20T06:43:28.447Z",
                "num_rooms" => 5,
                "room_type" => "Standard twin",
                "num_of_guest" => 2,
                "bed_size" => "Twin",
                "num_beds" => 2,
                "adult_occupancy" => 2
            ],
            [
                "objectId" => "HJaL4Yb0gV",
                "roomt_size" => "32",
                "child_occupancy" => 1,
                "images" => [
                    "img/room/2016012612322191bd327.png",
                    "img/room/201601261232213316f4c.png"
                ],
                "createdAt" => "2016-01-26T17:32:21.633Z",
                "short_desc" => "This twin room features a hot tub, satellite TV and electric kettle.",
                "bed_size" => "Full",
                "adult_occupancy" => 2,
                "num_of_guest" => 2,
                "night_price" => 90,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "rAoKCNUn9Y"
                ],
                "num_beds" => 2,
                "updatedAt" => "2017-01-10T14:54:19.413Z",
                "room_type" => "Superior Twin",
                "num_rooms" => 1,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price2" => 90
            ],
            [
                "objectId" => "HdkzpF1PQE",
                "updatedAt" => "2016-04-21T04:11:14.996Z",
                "num_of_guest" => 2,
                "num_beds" => 1,
                "child_occupancy" => 1,
                "num_rooms" => 10,
                "roomt_size" => "46",
                "night_price2" => 145,
                "images" => [
                    "img/room/20160421001114b35af60.png"
                ],
                "short_desc" => "This room features on king bed for two guests",
                "adult_occupancy" => 2,
                "room_type" => "Deluxe King room",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "createdAt" => "2016-04-21T04:11:14.996Z",
                "bed_size" => "King",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "yMc9Ba3dqX"
                ],
                "night_price" => 130
            ],
            [
                "objectId" => "INNuqKLQPw",
                "room_type" => "Standard Twin",
                "bed_size" => "Twin",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_of_guest" => 2,
                "num_rooms" => 5,
                "roomt_size" => "42",
                "images" => [
                    "img/room/201604200219500.png"
                ],
                "short_desc" => "This double room features a balcony, seating area and patio.",
                "updatedAt" => "2017-01-10T13:09:31.964Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Lcxo33Vwch"
                ],
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "child_occupancy" => 1,
                "night_price2" => 159,
                "night_price" => 159,
                "createdAt" => "2016-03-15T03:40:59.399Z"
            ],
            [
                "objectId" => "JCpgmn3nza",
                "child_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "6VSsxUSqRr"
                ],
                "num_of_guest" => 2,
                "createdAt" => "2016-05-10T03:08:21.679Z",
                "roomt_size" => "50",
                "bed_size" => "Twin",
                "night_price" => 416000,
                "images" => [
                    "img/room/201605092308210.jpg"
                ],
                "room_type" => "Business Suite",
                "night_price2" => 520000,
                "updatedAt" => "2016-05-10T03:08:21.679Z",
                "num_rooms" => 10,
                "short_desc" => "Ажил хэрэгч зочдын шаардлагад нийцэх ба өрөөндөө зөөврийн компьютертэй байхын зэрэгцээ Бизнес лоунжанд үйлчлүүлэх эрхтэй",
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "adult_occupancy" => 2,
                "num_beds" => 2
            ],
            [
                "objectId" => "JiufmC1VMH",
                "short_desc" => "This room features 1 large bed, mini bar, bathtub, flat screen TV, and provides free WIFI.",
                "room_type" => "Business room",
                "num_of_guest" => 2,
                "num_rooms" => 7,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "MaGHICo3s0"
                ],
                "night_price2" => 234,
                "createdAt" => "2016-04-11T08:29:41.630Z",
                "adult_occupancy" => 2,
                "roomt_size" => "40",
                "images" => [
                    "img/room/20160411042941b24410a.png"
                ],
                "child_occupancy" => 1,
                "num_beds" => 1,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "updatedAt" => "2016-06-28T08:21:16.914Z",
                "bed_size" => "Queen",
                "night_price" => 200
            ],
            [
                "objectId" => "Jiwk8TOXWM",
                "night_price2" => 170,
                "num_beds" => 1,
                "roomt_size" => "35",
                "createdAt" => "2016-05-26T04:50:41.125Z",
                "num_rooms" => 4,
                "updatedAt" => "2016-05-26T04:50:41.125Z",
                "images" => [
                    "img/room/d483026.jpg"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "q0eyY9f5np"
                ],
                "room_type" => "Deluxe ",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "bed_size" => "King",
                "short_desc" => "A balcony, the room features a kitchenette with a microwave and a refrigerator, a safety deposit box, 2 bathroom",
                "night_price" => 137,
                "num_of_guest" => 2,
                "adult_occupancy" => 2,
                "child_occupancy" => 1
            ],
            [
                "objectId" => "Jn4vlMSj0m",
                "child_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "GZkZUYe4Rr"
                ],
                "createdAt" => "2017-01-10T16:02:09.920Z",
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "bed_size" => "Twin",
                "updatedAt" => "2017-01-11T04:58:45.399Z",
                "roomt_size" => "37",
                "num_of_guest" => 2,
                "num_rooms" => 33,
                "adult_occupancy" => 2,
                "night_price2" => 180,
                "night_price" => 180,
                "images" => [
                    "img/room/1f7d0b5.jpg",
                    "img/room/3259d33.jpg",
                    "img/room/ab57e84.jpg"
                ],
                "num_beds" => 2,
                "room_type" => "Twin room ",
                "short_desc" => "Breakfast included in price"
            ],
            [
                "objectId" => "JxrBedybW8",
                "roomt_size" => "30",
                "room_type" => "Superior Twin",
                "child_occupancy" => 1,
                "createdAt" => "2015-12-07T02:41:18.216Z",
                "bed_size" => "Twin",
                "num_beds" => 2,
                "updatedAt" => "2017-03-13T03:41:17.510Z",
                "night_price" => 135,
                "short_desc" => "This double room features a seating area, electric kettle and satellite TV.",
                "num_rooms" => 5,
                "num_of_guest" => 2,
                "adult_occupancy" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "vrrPDnTXdN"
                ],
                "images" => [
                    "img/room/23965e1.jpg",
                    "img/room/ddfc86d.jpg"
                ],
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price2" => 190
            ],
            [
                "objectId" => "KbDWzut84I",
                "updatedAt" => "2016-06-27T10:05:31.480Z",
                "roomt_size" => "45",
                "num_beds" => 2,
                "night_price" => 89,
                "num_rooms" => 6,
                "night_price2" => 100,
                "bed_size" => "Twin",
                "createdAt" => "2016-06-27T10:05:31.480Z",
                "child_occupancy" => 1,
                "room_type" => "Superior Twin",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "MlVZA3qvoO"
                ],
                "adult_occupancy" => 2,
                "images" => [
                    "img/room/f13d68c.jpg"
                ],
                "num_of_guest" => 2,
                "short_desc" => "Free Wifi, breakfast",
                "facilities" => [
                    "tv",
                    "bar"
                ]
            ],
            [
                "objectId" => "LLXBlH31Xh",
                "adult_occupancy" => 2,
                "updatedAt" => "2016-03-19T16:36:27.813Z",
                "images" => [
                    "img/room/2016012611451335876ae.png",
                    "img/room/2016012611451321bb413.png"
                ],
                "num_rooms" => 4,
                "roomt_size" => "36",
                "short_desc" => "This twin room has a balcony, electric kettle and minibar.",
                "bed_size" => "Twin",
                "night_price" => 140,
                "createdAt" => "2016-01-26T16:45:13.468Z",
                "num_beds" => 1,
                "room_type" => "Deluxe Twin",
                "child_occupancy" => 1,
                "num_of_guest" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "FD6SVf6qP6"
                ],
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ]
            ],
            [
                "objectId" => "LT5frTuY6i",
                "bed_size" => "King",
                "num_rooms" => 9,
                "room_type" => "Deluxe King",
                "child_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "num_beds" => 1,
                "updatedAt" => "2016-06-27T10:09:07.155Z",
                "roomt_size" => "45",
                "num_of_guest" => 2,
                "createdAt" => "2016-06-27T10:09:07.155Z",
                "short_desc" => "Free Wifi, breakfast",
                "night_price" => 100,
                "adult_occupancy" => 2,
                "images" => [
                    "img/room/3b8f513.jpg"
                ],
                "night_price2" => 112,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "MlVZA3qvoO"
                ]
            ],
            [
                "objectId" => "LpBqtCCEnh",
                "num_rooms" => 9,
                "images" => [
                    "img/room/2016012611421583d342c.png"
                ],
                "room_type" => "Twin",
                "num_beds" => 2,
                "num_of_guest" => 2,
                "child_occupancy" => 1,
                "night_price" => 100,
                "short_desc" => "This twin room features a balcony, minibar and electric kettle.\r\n",
                "createdAt" => "2016-01-26T16:42:15.548Z",
                "bed_size" => "Twin",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "FD6SVf6qP6"
                ],
                "updatedAt" => "2016-03-19T16:36:28.595Z",
                "adult_occupancy" => 2,
                "roomt_size" => "30"
            ],
            [
                "objectId" => "M4Ko524ntZ",
                "roomt_size" => "48",
                "child_occupancy" => 1,
                "night_price" => 180,
                "num_beds" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "adult_occupancy" => 2,
                "bed_size" => "Twin",
                "images" => [
                    "img/room/201601261153433ee45c9.png",
                    "img/room/2016012611534300d9b0d.png",
                    "img/room/2016012611534310a1e9d.png"
                ],
                "updatedAt" => "2016-03-19T16:36:26.035Z",
                "short_desc" => "This twin room features a balcony, executive lounge access and sofa.",
                "room_type" => "Junior Suite",
                "createdAt" => "2016-01-26T16:53:43.770Z",
                "num_of_guest" => 2,
                "num_rooms" => 3,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "FD6SVf6qP6"
                ]
            ],
            [
                "objectId" => "MEeD3f7E5c",
                "createdAt" => "2016-01-27T01:56:43.292Z",
                "roomt_size" => "30",
                "short_desc" => "2 хүний өргөн ор, орчин үеийн шийдэл бүхий тохижилт, суух талбай, душтай угаалгын өрөө, минибар, кабел & интернэт",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "bed_size" => "Queen",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "gZ63FP6fCP"
                ],
                "num_rooms" => 3,
                "images" => [
                    "img/room/2016012620564303d5510.png",
                    "img/room/201603170053590.png",
                    "img/room/201603170053591.png",
                    "img/room/201603170053592.png"
                ],
                "num_beds" => 1,
                "room_type" => "Deluxe Double",
                "adult_occupancy" => 2,
                "night_price" => 50,
                "updatedAt" => "2017-01-10T15:14:59.201Z",
                "child_occupancy" => 1,
                "num_of_guest" => 2,
                "night_price2" => 50
            ],
            [
                "objectId" => "MFAmY7U48R",
                "num_rooms" => 2,
                "child_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "90bC0pQE8Z"
                ],
                "adult_occupancy" => 2,
                "updatedAt" => "2016-04-27T11:19:13.666Z",
                "num_of_guest" => 2,
                "night_price2" => 112,
                "roomt_size" => "18",
                "num_beds" => 1,
                "short_desc" => "Twin-sharing room comes with a work desk, minibar and an en suite bathroom with a shower or bathtub.",
                "bed_size" => "Queen",
                "createdAt" => "2016-04-27T11:19:13.666Z",
                "images" => [
                    "img/room/201604270719139d0abde.png"
                ],
                "room_type" => "Standard double or twin",
                "night_price" => 112,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ]
            ],
            [
                "objectId" => "Mco82wv03Z",
                "createdAt" => "2016-06-27T10:04:17.446Z",
                "images" => [
                    "img/room/a780727.jpg"
                ],
                "child_occupancy" => 1,
                "num_beds" => 1,
                "night_price2" => 78,
                "updatedAt" => "2016-06-27T10:04:17.446Z",
                "adult_occupancy" => 2,
                "room_type" => "Standard King",
                "roomt_size" => "45",
                "num_of_guest" => 2,
                "short_desc" => "Free Breakfast, WiFi",
                "night_price" => 67,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "MlVZA3qvoO"
                ],
                "num_rooms" => 4,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "bed_size" => "King"
            ],
            [
                "objectId" => "MpL3KXk3WL",
                "roomt_size" => "24",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "2CgQ3IJmEd"
                ],
                "num_of_guest" => 2,
                "night_price" => 124,
                "night_price2" => 154,
                "child_occupancy" => 1,
                "adult_occupancy" => 2,
                "num_beds" => 2,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "createdAt" => "2016-05-10T08:14:59.999Z",
                "short_desc" => "Free WiFi, breakfast",
                "updatedAt" => "2016-06-22T09:14:01.974Z",
                "bed_size" => "Twin",
                "room_type" => "Standard twin room with sunrise view",
                "images" => [
                    "img/room/0af6a38.jpg"
                ],
                "num_rooms" => 10
            ],
            [
                "objectId" => "MqTWdkFXvE",
                "night_price" => 130,
                "roomt_size" => "32",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "rAoKCNUn9Y"
                ],
                "createdAt" => "2016-01-26T17:34:03.370Z",
                "num_beds" => 2,
                "num_of_guest" => 2,
                "child_occupancy" => 1,
                "updatedAt" => "2017-01-10T14:53:51.153Z",
                "adult_occupancy" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "images" => [
                    "img/room/201601261234038439354.png",
                    "img/room/201601261234034d9adc5.png",
                    "img/room/20160126123403a0e19a5.png",
                    "img/room/2016012612340340a57da.png"
                ],
                "room_type" => "Deluxe Double Room",
                "bed_size" => "Full",
                "num_rooms" => 1,
                "short_desc" => "This double room features a electric kettle, hot tub and satellite TV.",
                "night_price2" => 130
            ],
            [
                "objectId" => "NoS96HcMJo",
                "num_rooms" => 10,
                "num_beds" => 2,
                "images" => [
                    "img/room/20160420071645336b295.png"
                ],
                "createdAt" => "2016-04-20T11:16:45.420Z",
                "child_occupancy" => 1,
                "bed_size" => "Twin",
                "night_price" => 270,
                "night_price2" => 270,
                "adult_occupancy" => 2,
                "room_type" => "Two bedroom suite",
                "updatedAt" => "2016-06-28T06:11:52.518Z",
                "num_of_guest" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "LsqDSlN9xB"
                ],
                "short_desc" => "Suite features a living room and 2 bedrooms.",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "roomt_size" => "45"
            ],
            [
                "objectId" => "NxVic99s40",
                "bed_size" => "Queen",
                "short_desc" => "This double room has a TV, a sofa and a minibar. \r\n",
                "room_type" => "Deluxe Double",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "roomt_size" => "32",
                "images" => [
                    "img/room/20160126121237e8646e0.png",
                    "img/room/20160126121237534fd1c.png"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "CWjIspaaEA"
                ],
                "updatedAt" => "2017-01-10T14:45:02.792Z",
                "child_occupancy" => 1,
                "night_price" => 58,
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "num_rooms" => 9,
                "num_of_guest" => 2,
                "createdAt" => "2016-01-26T17:12:38.008Z",
                "night_price2" => 58
            ],
            [
                "objectId" => "OLpZRRdxhb",
                "createdAt" => "2016-04-21T04:15:40.087Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "yMc9Ba3dqX"
                ],
                "child_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "num_of_guest" => 2,
                "adult_occupancy" => 2,
                "short_desc" => "This suite features a sofa, dining area and seating area.",
                "night_price" => 335,
                "images" => [
                    "img/room/20160421001539e5702ba.png"
                ],
                "night_price2" => 335,
                "roomt_size" => "65",
                "num_beds" => 1,
                "room_type" => "Executive suite",
                "num_rooms" => 2,
                "bed_size" => "King",
                "updatedAt" => "2016-04-21T04:15:40.087Z"
            ],
            [
                "objectId" => "OzR1XTBju3",
                "num_beds" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "room_type" => "King Room",
                "short_desc" => "Breakfast included",
                "child_occupancy" => 1,
                "num_rooms" => 80,
                "roomt_size" => "45",
                "num_of_guest" => 2,
                "night_price2" => 170,
                "updatedAt" => "2017-01-10T15:53:01.587Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "kxZ156Losb"
                ],
                "createdAt" => "2017-01-10T15:53:01.587Z",
                "adult_occupancy" => 2,
                "night_price" => 170,
                "bed_size" => "Full",
                "images" => [
                    "img/room/e538c9c.jpg",
                    "img/room/bd4fa5c.jpg",
                    "img/room/aef9b0c.jpg",
                    "img/room/bd87c7c.jpg"
                ]
            ],
            [
                "objectId" => "PRPIeUJZod",
                "night_price" => 107,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "images" => [
                    "img/room/20151207054257c653a0b.png"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "4gCEB6CwfD"
                ],
                "num_of_guest" => 2,
                "bed_size" => "Queen",
                "roomt_size" => "38",
                "adult_occupancy" => 2,
                "child_occupancy" => 1,
                "createdAt" => "2015-12-07T04:42:57.789Z",
                "room_type" => "Deluxe Room",
                "num_beds" => 1,
                "num_rooms" => 10,
                "short_desc" => "This twin room has a hot tub, minibar and washing machine.",
                "updatedAt" => "2016-03-19T16:36:48.588Z"
            ],
            [
                "objectId" => "Pc93R4Y4Qb",
                "room_type" => "Deluxe Single or double",
                "adult_occupancy" => 2,
                "createdAt" => "2016-04-27T11:23:47.259Z",
                "roomt_size" => "20",
                "child_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "90bC0pQE8Z"
                ],
                "bed_size" => "Queen",
                "num_of_guest" => 2,
                "images" => [
                    "img/room/2016042707234651ac31f.png"
                ],
                "num_rooms" => 5,
                "night_price2" => 134,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "night_price" => 134,
                "num_beds" => 1,
                "short_desc" => "Larger twin-sharing room features a flat-screen TV, minibar and an en suite bathroom with a shower or bathtub.",
                "updatedAt" => "2017-03-03T08:33:03.290Z"
            ],
            [
                "objectId" => "PfT1PAtNwe",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Lcxo33Vwch"
                ],
                "createdAt" => "2016-04-20T06:41:35.701Z",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub",
                    "kitchen"
                ],
                "num_beds" => 2,
                "num_of_guest" => 2,
                "room_type" => "Suite twin",
                "bed_size" => "Full",
                "child_occupancy" => 1,
                "night_price" => 209,
                "adult_occupancy" => 2,
                "images" => [
                    "img/room/2016042002413501c778e.png"
                ],
                "roomt_size" => "76",
                "short_desc" => "This suite features 2 full beds with separate living room.",
                "updatedAt" => "2017-01-10T13:14:23.632Z",
                "night_price2" => 209,
                "num_rooms" => 1
            ],
            [
                "objectId" => "QLuwzA4OEy",
                "num_beds" => 1,
                "night_price" => 80,
                "adult_occupancy" => 2,
                "bed_size" => "Queen",
                "images" => [
                    "img/room/201601261135116b982ad.png",
                    "img/room/20160126113511b3a6d64.png"
                ],
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "room_type" => "Double Room",
                "createdAt" => "2016-01-26T16:35:11.390Z",
                "short_desc" => "This double room features a satellite TV, executive lounge access and seating area.",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "FD6SVf6qP6"
                ],
                "updatedAt" => "2016-03-19T16:36:29.299Z",
                "child_occupancy" => 1,
                "num_of_guest" => 2,
                "num_rooms" => 10,
                "roomt_size" => "24"
            ],
            [
                "objectId" => "QOErSqtPSC",
                "short_desc" => "This elegant room features an electric kettle, a desk and a private bathroom with towels.",
                "num_beds" => 1,
                "roomt_size" => "20",
                "child_occupancy" => 1,
                "adult_occupancy" => 2,
                "images" => [
                    "img/room/20160421044702bcf37a9.png"
                ],
                "createdAt" => "2016-04-21T08:47:02.210Z",
                "bed_size" => "Twin",
                "room_type" => "Standard Twin",
                "num_rooms" => 18,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "iVVv2stEee"
                ],
                "night_price2" => 142,
                "night_price" => 109,
                "updatedAt" => "2017-03-03T08:11:12.902Z",
                "num_of_guest" => 2,
                "facilities" => [
                    "tv",
                    "bar"
                ]
            ],
            [
                "objectId" => "QVZXeKBIQk",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "KewVbvwQLn"
                ],
                "images" => [
                    "img/room/201605060548107f7b171.png"
                ],
                "num_beds" => 1,
                "roomt_size" => "30",
                "child_occupancy" => 1,
                "night_price" => 70600,
                "night_price2" => 70600,
                "adult_occupancy" => 1,
                "room_type" => "Standard single ",
                "short_desc" => "Үнэгүй өглөөний цай, өрөөний үйлчилгээ",
                "num_rooms" => 3,
                "facilities" => [
                    "bar"
                ],
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "createdAt" => "2016-05-06T09:48:11.400Z",
                "updatedAt" => "2016-05-06T09:48:11.400Z"
            ],
            [
                "objectId" => "Qk6HSxEWkH",
                "bed_size" => "Twin",
                "createdAt" => "2016-03-11T07:35:36.603Z",
                "child_occupancy" => 1,
                "adult_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "gmlVXITiCK"
                ],
                "short_desc" => "Өглөөний цай өрөөний үнэд багтсан. 0-12 насны хүүхэд үнэгүй орох боломжтой",
                "night_price" => 88,
                "num_rooms" => 7,
                "roomt_size" => "22",
                "num_of_guest" => 1,
                "updatedAt" => "2017-01-10T15:20:54.415Z",
                "num_beds" => 1,
                "room_type" => "Single Room",
                "images" => [
                    "img/room/2016031102353688d4a8f.png",
                    "img/room/20160311023536a8119b5.png",
                    "img/room/20160311023536be4bfb3.png",
                    "img/room/20160311023536587d00d.png",
                    "img/room/201603110445510.png",
                    "img/room/201603110445511.png"
                ],
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price2" => 88
            ],
            [
                "objectId" => "R6O8BG3eyz",
                "images" => [
                    "img/room/d7291da.jpg"
                ],
                "num_of_guest" => 2,
                "room_type" => "Deluxe Double",
                "updatedAt" => "2017-01-10T15:38:07.204Z",
                "bed_size" => "Queen",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Tl26FDLUoa"
                ],
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "num_beds" => 1,
                "night_price" => 760,
                "roomt_size" => "45",
                "num_rooms" => 1,
                "night_price2" => 760,
                "child_occupancy" => 1,
                "createdAt" => "2017-01-10T15:38:07.204Z",
                "short_desc" => "Room features a dining area, and is equipped with a work desk, a personal safe and satellite television. Other amenities",
                "adult_occupancy" => 2
            ],
            [
                "objectId" => "RgQ8D97NaS",
                "updatedAt" => "2017-01-10T15:23:26.782Z",
                "createdAt" => "2016-03-11T07:52:07.839Z",
                "short_desc" => "Breakfast included in price.\r\n0-12 years old children free.\r\n",
                "num_of_guest" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "adult_occupancy" => 2,
                "bed_size" => "Queen",
                "num_beds" => 1,
                "child_occupancy" => 1,
                "roomt_size" => "33",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "gmlVXITiCK"
                ],
                "night_price" => 158,
                "room_type" => "Deluxe Room",
                "images" => [
                    "img/room/201603110252078226e5c.png",
                    "img/room/2016031102520737d6ca7.png",
                    "img/room/201603110252079b533b2.png",
                    "img/room/20160311025207abd96de.png",
                    "img/room/20160311025207df3e44f.png",
                    "img/room/201603110252078b48d6a.png"
                ],
                "num_rooms" => 18,
                "night_price2" => 158
            ],
            [
                "objectId" => "SH0Owm8DHC",
                "roomt_size" => "18",
                "bed_size" => "Twin",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "images" => [
                    "img/room/54819b3.jpg"
                ],
                "num_of_guest" => 1,
                "num_rooms" => 4,
                "night_price2" => 84,
                "child_occupancy" => 1,
                "adult_occupancy" => 1,
                "num_beds" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "2CgQ3IJmEd"
                ],
                "short_desc" => "Free WiFi, breakfast,",
                "createdAt" => "2016-05-09T08:51:20.469Z",
                "night_price" => 84,
                "room_type" => "Economy single room",
                "updatedAt" => "2016-06-22T09:56:15.501Z"
            ],
            [
                "objectId" => "Sy4LT0ktab",
                "short_desc" => "Үнэгүй өглөөний цай, өндөр хурдны интернет, хосын өргөн ор",
                "bed_size" => "King",
                "createdAt" => "2016-06-07T01:53:40.107Z",
                "facilities" => [
                    "tv",
                    "bar",
                    "kitchen"
                ],
                "num_of_guest" => 2,
                "num_beds" => 1,
                "night_price" => 398000,
                "updatedAt" => "2016-06-07T01:53:40.107Z",
                "images" => [
                    "img/room/40e439b.jpg"
                ],
                "room_type" => "Бүтэн люкс өрөө",
                "num_rooms" => 3,
                "child_occupancy" => 1,
                "roomt_size" => "80",
                "adult_occupancy" => 2,
                "night_price2" => 454000
            ],
            [
                "objectId" => "TaiG7AOOdC",
                "night_price" => 144,
                "num_beds" => 2,
                "short_desc" => "Free WiFi, breakfast,",
                "adult_occupancy" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "2CgQ3IJmEd"
                ],
                "num_of_guest" => 2,
                "child_occupancy" => 1,
                "num_rooms" => 11,
                "night_price2" => 174,
                "room_type" => "Standard twin room with panorama view",
                "images" => [
                    "img/room/8ef4926.jpg"
                ],
                "updatedAt" => "2016-06-22T09:49:31.719Z",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "bed_size" => "Twin",
                "createdAt" => "2016-05-09T08:37:22.562Z",
                "roomt_size" => "24"
            ],
            [
                "objectId" => "TwwAl81aRG",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_beds" => 1,
                "child_occupancy" => 1,
                "createdAt" => "2015-12-07T03:28:59.756Z",
                "night_price" => 151,
                "adult_occupancy" => 2,
                "num_rooms" => 290,
                "updatedAt" => "2016-03-19T16:37:31.657Z",
                "bed_size" => "King",
                "short_desc" => "This double room has a bathrobe, satellite TV and air conditioning.",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "SY19nYPlJn"
                ],
                "num_of_guest" => 2,
                "roomt_size" => "42",
                "images" => [
                    "img/room/201512070433170.png"
                ],
                "room_type" => "Deluxe Room"
            ],
            [
                "objectId" => "UrQoBRxsqh",
                "createdAt" => "2016-04-20T10:53:45.142Z",
                "num_rooms" => 10,
                "room_type" => "Executive one bedroom suite",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "LsqDSlN9xB"
                ],
                "images" => [
                    "img/room/20160420065344e8c6c91.png"
                ],
                "night_price" => 300,
                "updatedAt" => "2016-06-28T08:15:44.407Z",
                "adult_occupancy" => 2,
                "bed_size" => "Queen",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "short_desc" => "Suite features a living room and a bedroom. It has a minibar, a cable TV, an in-room safe",
                "num_of_guest" => 2,
                "roomt_size" => "45",
                "child_occupancy" => 1,
                "night_price2" => 300,
                "num_beds" => 1
            ],
            [
                "objectId" => "VOy5gAgYOR",
                "short_desc" => "This twin room has a bathrobe, dining area and seating area.",
                "images" => [
                    "img/room/20160126210106600b7e5.png",
                    "img/room/201603170057010.png",
                    "img/room/201603170057011.png"
                ],
                "num_rooms" => 3,
                "night_price" => 25,
                "num_of_guest" => 2,
                "room_type" => "Twin",
                "createdAt" => "2016-01-27T02:01:06.147Z",
                "child_occupancy" => 1,
                "bed_size" => "Twin",
                "roomt_size" => "40",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "gZ63FP6fCP"
                ],
                "adult_occupancy" => 2,
                "num_beds" => 2,
                "updatedAt" => "2017-01-10T15:17:21.664Z",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price2" => 25
            ],
            [
                "objectId" => "VVQ1QX5gkG",
                "updatedAt" => "2017-01-10T16:06:00.734Z",
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "bed_size" => "Full",
                "images" => [
                    "img/room/cc6e800.jpg"
                ],
                "room_type" => "Double room",
                "night_price" => 160,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "GZkZUYe4Rr"
                ],
                "adult_occupancy" => 2,
                "num_of_guest" => 2,
                "num_beds" => 1,
                "num_rooms" => 109,
                "createdAt" => "2017-01-10T16:06:00.734Z",
                "child_occupancy" => 1,
                "night_price2" => 160,
                "short_desc" => "Breakfast included in price",
                "roomt_size" => "31"
            ],
            [
                "objectId" => "VkcOjQ6xdU",
                "short_desc" => "Үнэгүй өглөөний цай, өндөр хурдны интернет",
                "num_rooms" => 1,
                "num_beds" => 1,
                "updatedAt" => "2016-06-07T05:59:42.963Z",
                "num_of_guest" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "SvTXmdzBbz"
                ],
                "child_occupancy" => 1,
                "createdAt" => "2016-06-07T05:59:42.963Z",
                "images" => [
                    "img/room/fc3e042.jpg"
                ],
                "bed_size" => "Full",
                "adult_occupancy" => 1,
                "roomt_size" => "50",
                "night_price" => 455000,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "night_price2" => 455000,
                "room_type" => "Deluxe Single"
            ],
            [
                "objectId" => "W92bBKupUY",
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "room_type" => "Twin Room",
                "num_beds" => 2,
                "createdAt" => "2017-01-10T14:40:07.735Z",
                "num_of_guest" => 2,
                "images" => [
                    "img/room/f30c5c1.jpg",
                ],
                "roomt_size" => "32",
                "adult_occupancy" => 2,
                "num_rooms" => 23,
                "updatedAt" => "2017-01-10T14:40:07.735Z",
                "night_price2" => 236,
                "night_price" => 236,
                "short_desc" => "Located on the floor between 9 and 20, this room features a city view. It is fitted with bathrobes, a cable TV and a sea",
                "bed_size" => "Twin",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "uTwM5sBjTr"
                ]
            ],
            [
                "objectId" => "W9vx9TPhep",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "night_price" => 175,
                "room_type" => "Standard Twin",
                "num_rooms" => 15,
                "roomt_size" => "36",
                "createdAt" => "2017-01-10T16:02:44.583Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "ybVDUEDC5x"
                ],
                "child_occupancy" => 1,
                "updatedAt" => "2017-03-13T03:32:54.188Z",
                "images" => [
                    "img/room/f0532db.jpg"
                ],
                "night_price2" => 175,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "adult_occupancy" => 2,
                "short_desc" => "This twin room features air conditioning, satellite TV and seating area.",
                "num_beds" => 2
            ],
            [
                "objectId" => "WRkK3MxVM0",
                "night_price2" => 143000,
                "room_type" => "Twin",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "roomt_size" => "26",
                "num_rooms" => 10,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "fkoX3OapCN"
                ],
                "adult_occupancy" => 2,
                "createdAt" => "2016-04-12T01:27:14.607Z",
                "updatedAt" => "2016-04-12T02:23:36.358Z",
                "night_price" => 143000,
                "num_beds" => 2,
                "images" => [
                    "img/room/20160411212714a9994d1.png"
                ],
                "child_occupancy" => 1,
                "bed_size" => "Twin",
                "short_desc" => "2 тусдаа ор, суух талбай, мини бар, душтай угаалгын өрөө болон интернэттэй",
                "num_of_guest" => 2
            ],
            [
                "objectId" => "WkaIgzV7Qq",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "night_price2" => 142,
                "createdAt" => "2016-04-21T08:36:36.659Z",
                "child_occupancy" => 1,
                "images" => [
                    "img/room/2016042104363679fd376.png"
                ],
                "bed_size" => "Full",
                "room_type" => "Standard Double",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "iVVv2stEee"
                ],
                "short_desc" => "This double room has a satellite TV, tea/coffee maker and view.",
                "night_price" => 109,
                "adult_occupancy" => 2,
                "num_beds" => 1,
                "num_rooms" => 14,
                "updatedAt" => "2017-03-03T08:12:58.987Z",
                "roomt_size" => "18",
                "num_of_guest" => 2
            ],
            [
                "objectId" => "WnyrNZ6kao",
                "num_of_guest" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "rAoKCNUn9Y"
                ],
                "short_desc" => "This double room features a view, electric kettle and cable TV.",
                "num_rooms" => 8,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "room_type" => "Standard Double",
                "images" => [
                    "img/room/20160126122823a7c08fc.png",
                    "img/room/201601261228231126ece.png"
                ],
                "adult_occupancy" => 2,
                "child_occupancy" => 1,
                "updatedAt" => "2017-01-10T14:55:54.149Z",
                "num_beds" => 1,
                "roomt_size" => "17",
                "bed_size" => "Queen",
                "night_price" => 59,
                "createdAt" => "2016-01-26T17:28:23.285Z",
                "night_price2" => 59
            ],
            [
                "objectId" => "WwlkeOTlWn",
                "createdAt" => "2017-01-10T13:30:52.070Z",
                "roomt_size" => "40",
                "night_price2" => 140,
                "short_desc" => "Private bathroom",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "num_rooms" => 72,
                "adult_occupancy" => 2,
                "night_price" => 140,
                "updatedAt" => "2017-01-10T13:30:52.070Z",
                "bed_size" => "Twin",
                "child_occupancy" => 1,
                "num_of_guest" => 2,
                "room_type" => "Deluxe Twin",
                "images" => [
                    "img/room/6726a43.jpg"
                ],
                "num_beds" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "cte44bvM78"
                ]
            ],
            [
                "objectId" => "X2Xw2KAG65",
                "images" => [
                    "img/room/20160420025642623e129.png"
                ],
                "roomt_size" => "88",
                "num_rooms" => 1,
                "num_beds" => 1,
                "facilities" => [
                    "tv",
                    "bar",
                    "kitchen"
                ],
                "createdAt" => "2016-04-20T06:56:42.405Z",
                "child_occupancy" => 1,
                "night_price2" => 239,
                "adult_occupancy" => 2,
                "night_price" => 239,
                "bed_size" => "Twin",
                "updatedAt" => "2017-01-10T13:15:56.493Z",
                "room_type" => "Deluxe Double",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Lcxo33Vwch"
                ],
                "num_of_guest" => 2,
                "short_desc" => "This room features kitchen, queen bed with separate living room."
            ],
            [
                "objectId" => "XCir2WT7Me",
                "num_of_guest" => 2,
                "child_occupancy" => 1,
                "adult_occupancy" => 2,
                "createdAt" => "2015-12-07T04:59:04.662Z",
                "bed_size" => "Twin",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "room_type" => "Deluxe Twin",
                "updatedAt" => "2016-03-19T16:36:41.566Z",
                "num_rooms" => 30,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "4jjtjZKs8B"
                ],
                "night_price" => 180,
                "roomt_size" => "33",
                "images" => [
                    "img/room/201512070559048e0d17a.png"
                ],
                "num_beds" => 1,
                "short_desc" => "1"
            ],
            [
                "objectId" => "XI5G7coNXE",
                "night_price" => 367000,
                "num_beds" => 1,
                "num_rooms" => 2,
                "images" => [
                    "img/room/2016031623454564f8119.png",
                    "img/room/201603162345452fc9a2a.png",
                    "img/room/2016031623454697cf993.png"
                ],
                "roomt_size" => "40",
                "short_desc" => "This double room features a bathrobe, sofa and cable TV.",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "createdAt" => "2016-03-17T03:45:46.164Z",
                "room_type" => "Presidential Suite",
                "night_price2" => 367000,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "aZZnxV1FeB"
                ],
                "child_occupancy" => 1,
                "bed_size" => "King",
                "num_of_guest" => 2,
                "updatedAt" => "2016-03-19T16:35:02.776Z",
                "adult_occupancy" => 2
            ],
            [
                "objectId" => "XRfaVh1XtH",
                "num_rooms" => 221,
                "num_of_guest" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "NTxVnbh8t4"
                ],
                "images" => [
                    "img/room/20151207051904bbe84e6.png"
                ],
                "createdAt" => "2015-12-07T04:19:05.234Z",
                "adult_occupancy" => 2,
                "short_desc" => "1",
                "room_type" => "Deluxe Double",
                "updatedAt" => "2016-03-19T16:37:27.377Z",
                "night_price" => 180,
                "num_beds" => 1,
                "bed_size" => "King",
                "child_occupancy" => 1,
                "roomt_size" => "32",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ]
            ],
            [
                "objectId" => "XTniltaJE8",
                "createdAt" => "2016-04-27T11:17:55.215Z",
                "night_price2" => 95,
                "room_type" => "Standard Single",
                "roomt_size" => "18",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "90bC0pQE8Z"
                ],
                "num_beds" => 1,
                "num_rooms" => 1,
                "updatedAt" => "2017-03-03T08:25:32.937Z",
                "bed_size" => "Twin",
                "facilities" => [
                    "bar",
                    "bathtub"
                ],
                "images" => [
                    "img/room/201604270717545635030.png"
                ],
                "night_price" => 95,
                "num_of_guest" => 2,
                "child_occupancy" => 1,
                "short_desc" => "Room comes with a work desk, minibar and an en suite bathroom with a shower or bathtub.",
                "adult_occupancy" => 2
            ],
            [
                "objectId" => "YCNyeuw3GR",
                "updatedAt" => "2017-01-10T14:53:22.553Z",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_rooms" => 3,
                "num_of_guest" => 2,
                "roomt_size" => "32",
                "night_price" => 79,
                "createdAt" => "2016-01-26T17:31:17.827Z",
                "bed_size" => "Queen",
                "adult_occupancy" => 2,
                "short_desc" => "This double room features a satellite TV, hot tub and electric kettle.",
                "child_occupancy" => 1,
                "num_beds" => 1,
                "images" => [
                    "img/room/201601261231179e90df8.png",
                    "img/room/2016012612311751b7a06.png",
                    "img/room/20160126123117df33a2b.png"
                ],
                "room_type" => "Superior Double",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "rAoKCNUn9Y"
                ],
                "night_price2" => 79
            ],
            [
                "objectId" => "YFh9UZtvIC",
                "short_desc" => "Өндөр хурдны интернэт, суух талбай, 1 хүний 2 ор",
                "num_rooms" => 9,
                "child_occupancy" => 1,
                "night_price" => 204000,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "aZZnxV1FeB"
                ],
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "images" => [
                    "img/room/20160313003409bf23919.png",
                    "img/room/20160313003409b875f74.png",
                    "img/room/201603130034093244f13.png",
                    "img/room/201603130034091b7866c.png"
                ],
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "roomt_size" => "30",
                "room_type" => "Twin",
                "updatedAt" => "2016-03-19T16:36:08.754Z",
                "night_price2" => 204000,
                "createdAt" => "2016-03-13T05:34:10.114Z"
            ],
            [
                "objectId" => "YQ5UZnXLCV",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "hpjqDvtnjq"
                ],
                "images" => [
                    "img/room/201604280609200.png",
                    "img/room/201604280609201.png"
                ],
                "bed_size" => "King",
                "updatedAt" => "2016-04-28T10:09:20.784Z",
                "roomt_size" => "74",
                "night_price" => 167,
                "room_type" => "Executive suite",
                "adult_occupancy" => 2,
                "num_rooms" => 10,
                "num_of_guest" => 2,
                "child_occupancy" => 1,
                "night_price2" => 188,
                "short_desc" => "This suite has a sofa, kitchen and seating area.",
                "num_beds" => 1,
                "facilities" => [
                    "tv",
                    "bar",
                    "kitchen"
                ],
                "createdAt" => "2016-04-27T11:00:04.614Z"
            ],
            [
                "objectId" => "Yodr9X9sN6",
                "num_of_guest" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_beds" => 1,
                "updatedAt" => "2016-03-19T16:36:38.765Z",
                "short_desc" => "This single room has a balcony.",
                "room_type" => "Deluxe Room",
                "num_rooms" => 2,
                "night_price" => 160,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "SoTQkoViOy"
                ],
                "adult_occupancy" => 2,
                "images" => [
                    "img/room/201512070635463962fae.png"
                ],
                "child_occupancy" => 1,
                "createdAt" => "2015-12-07T05:35:47.134Z",
                "roomt_size" => "45",
                "bed_size" => "Queen"
            ],
            [
                "objectId" => "YuX8plSXF1",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Qax7VvTQji"
                ],
                "num_of_guest" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "createdAt" => "2015-12-07T06:21:28.334Z",
                "bed_size" => "Twin",
                "room_type" => "Deluxe Twin",
                "updatedAt" => "2016-03-19T16:36:38.350Z",
                "images" => [
                    "img/room/20151207072127db0ddc8.png"
                ],
                "night_price" => 55,
                "adult_occupancy" => 2,
                "num_rooms" => 3,
                "short_desc" => "Larger twin-sharing room features a flat-screen TV, minibar and an en suite bathroom with a shower or bathtub",
                "roomt_size" => "20",
                "num_beds" => 2,
                "child_occupancy" => 1
            ],
            [
                "objectId" => "YuonvOnshO",
                "night_price" => 67,
                "createdAt" => "2016-06-27T10:01:39.397Z",
                "night_price2" => 78,
                "bed_size" => "King",
                "child_occupancy" => 1,
                "short_desc" => "Free Wifi, breakfast",
                "images" => [
                    "img/room/57149ea.jpg"
                ],
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "updatedAt" => "2016-06-27T10:01:39.397Z",
                "roomt_size" => "45",
                "adult_occupancy" => 2,
                "num_of_guest" => 2,
                "num_rooms" => 4,
                "room_type" => "Standard king",
                "num_beds" => 1
            ],
            [
                "objectId" => "Z5WyjvyzOP",
                "adult_occupancy" => 2,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "num_of_guest" => 2,
                "room_type" => "Standard Twin ",
                "bed_size" => "Twin",
                "roomt_size" => "30",
                "night_price" => 334000,
                "night_price2" => 430000,
                "createdAt" => "2016-05-10T03:30:30.302Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "6VSsxUSqRr"
                ],
                "images" => [
                    "img/room/201605092330300.jpg"
                ],
                "num_beds" => 2,
                "short_desc" => "2 тусдаа ортой энгийн өрөө.",
                "num_rooms" => 10,
                "updatedAt" => "2016-05-10T03:30:30.302Z"
            ],
            [
                "objectId" => "ZDhdZd9zQf",
                "updatedAt" => "2016-06-07T01:53:46.521Z",
                "bed_size" => "King",
                "images" => [
                    "img/room/2727192.jpg"
                ],
                "night_price2" => 454000,
                "facilities" => [
                    "tv",
                    "bar",
                    "kitchen"
                ],
                "room_type" => "Бүтэн люкс өрөө",
                "num_rooms" => 3,
                "createdAt" => "2016-06-07T01:53:46.521Z",
                "short_desc" => "Үнэгүй өглөөний цай, өндөр хурдны интернет, хосын өргөн ор",
                "night_price" => 398000,
                "roomt_size" => "80",
                "num_beds" => 1,
                "num_of_guest" => 2,
                "child_occupancy" => 1,
                "adult_occupancy" => 2
            ],
            [
                "objectId" => "Zy22VndAYG",
                "night_price2" => 174,
                "num_beds" => 1,
                "short_desc" => "Free breakfast, WiFi",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "2CgQ3IJmEd"
                ],
                "adult_occupancy" => 2,
                "room_type" => "Standard double with panorama view",
                "updatedAt" => "2016-06-22T09:12:56.394Z",
                "num_of_guest" => 2,
                "images" => [
                    "img/room/91a1616.jpg"
                ],
                "createdAt" => "2016-05-13T11:03:57.114Z",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "child_occupancy" => 1,
                "bed_size" => "Queen",
                "num_rooms" => 4,
                "night_price" => 144,
                "roomt_size" => "24"
            ],
            [
                "objectId" => "b2ojntYiuc",
                "night_price" => 200,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "LsqDSlN9xB"
                ],
                "roomt_size" => "29",
                "updatedAt" => "2017-01-10T13:40:58.370Z",
                "short_desc" => "Offering city views and river views, room comes with 2 single beds, a minibar",
                "bed_size" => "King",
                "num_of_guest" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "adult_occupancy" => 2,
                "room_type" => "Executive king",
                "createdAt" => "2016-01-26T16:04:13.389Z",
                "images" => [
                    "img/room/20160126110413a0566c7.png",
                    "img/room/201604200634500.png"
                ],
                "num_rooms" => 10,
                "num_beds" => 1,
                "child_occupancy" => 1,
                "night_price2" => 227
            ],
            [
                "objectId" => "bDlMVnxiu0",
                "night_price2" => 140,
                "room_type" => "Deluxe Single",
                "bed_size" => "Full",
                "num_beds" => 1,
                "child_occupancy" => 1,
                "createdAt" => "2017-01-10T13:42:54.996Z",
                "images" => [
                    "img/room/d1fcf6c.jpg"
                ],
                "roomt_size" => "40",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "cte44bvM78"
                ],
                "short_desc" => "This type room has a double bed",
                "night_price" => 140,
                "num_of_guest" => 2,
                "adult_occupancy" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "updatedAt" => "2017-01-10T13:42:54.996Z",
                "num_rooms" => 54
            ],
            [
                "objectId" => "bf03SvEJtJ",
                "createdAt" => "2016-04-20T11:04:40.670Z",
                "adult_occupancy" => 2,
                "room_type" => "Presidential Suite",
                "num_rooms" => 10,
                "bed_size" => "King",
                "night_price2" => 600,
                "short_desc" => "Offering city views and river views, spacious suite features a minibar, a cable TV, an in-room safe",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "LsqDSlN9xB"
                ],
                "roomt_size" => "45",
                "num_of_guest" => 2,
                "updatedAt" => "2016-06-28T06:12:21.848Z",
                "num_beds" => 1,
                "images" => [
                    "img/room/20160420070440920647c.png"
                ],
                "child_occupancy" => 1,
                "night_price" => 600
            ],
            [
                "objectId" => "c2whbdgsCb",
                "images" => [
                    "img/room/2016012620535543ae70e.png",
                    "img/room/201603170052230.png",
                    "img/room/201603170052231.png"
                ],
                "bed_size" => "Full",
                "roomt_size" => "30",
                "updatedAt" => "2017-01-10T15:14:02.868Z",
                "createdAt" => "2016-01-27T01:53:55.705Z",
                "num_beds" => 2,
                "short_desc" => "2 өргөн ор, суух талбай, душтай угаалгын өрөө, олон сувгийн кабел, интернэт",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "gZ63FP6fCP"
                ],
                "num_rooms" => 1,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "night_price" => 55,
                "adult_occupancy" => 2,
                "room_type" => "Deluxe Twin",
                "child_occupancy" => 1,
                "num_of_guest" => 2,
                "night_price2" => 55
            ],
            [
                "objectId" => "cGqDvnMEiR",
                "roomt_size" => "28",
                "child_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "hpjqDvtnjq"
                ],
                "adult_occupancy" => 2,
                "num_beds" => 2,
                "updatedAt" => "2016-04-27T10:53:26.306Z",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "num_rooms" => 10,
                "num_of_guest" => 2,
                "createdAt" => "2016-04-27T10:53:26.306Z",
                "room_type" => "Standard Twin",
                "night_price2" => 139,
                "images" => [
                    "img/room/201604270653269ada7a9.png"
                ],
                "short_desc" => "This room features 2 single beds.",
                "night_price" => 118,
                "bed_size" => "Twin"
            ],
            [
                "objectId" => "cQoIQ5Dy8B",
                "room_type" => "Deluxe Twin",
                "updatedAt" => "2017-01-10T14:45:54.490Z",
                "night_price" => 71,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "adult_occupancy" => 2,
                "num_of_guest" => 2,
                "roomt_size" => "36",
                "createdAt" => "2016-01-26T17:16:04.752Z",
                "short_desc" => "Slippers, a hairdryer and free toiletries are provided in the bathroom.",
                "images" => [
                    "img/room/2016012612160434d2bdb.png",
                    "img/room/20160126121604745bda0.png"
                ],
                "num_beds" => 2,
                "bed_size" => "Twin",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "CWjIspaaEA"
                ],
                "num_rooms" => 8,
                "child_occupancy" => 1,
                "night_price2" => 71
            ],
            [
                "objectId" => "ce5qUWKizm",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "8dQe8e3Xns"
                ],
                "child_occupancy" => 1,
                "bed_size" => "Twin",
                "images" => [
                    "img/room/ce560b0.jpg"
                ],
                "room_type" => "Superior Twin",
                "num_rooms" => 4,
                "createdAt" => "2017-01-10T15:03:08.833Z",
                "roomt_size" => "35",
                "updatedAt" => "2017-01-10T15:03:08.833Z",
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "short_desc" => "Room has 2 single beds.",
                "adult_occupancy" => 2,
                "night_price" => 97,
                "num_beds" => 2,
                "num_of_guest" => 2,
                "night_price2" => 97
            ],
            [
                "objectId" => "cnT7QfhQf2",
                "images" => [
                    "img/room/201604200233100.png"
                ],
                "night_price" => 209,
                "short_desc" => "This double room has a balcony, executive lounge access and dining area.",
                "adult_occupancy" => 2,
                "updatedAt" => "2017-01-10T13:11:35.384Z",
                "bed_size" => "King",
                "night_price2" => 209,
                "createdAt" => "2016-03-15T06:34:04.442Z",
                "room_type" => "Suite double ",
                "num_beds" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Lcxo33Vwch"
                ],
                "num_rooms" => 2,
                "roomt_size" => "80",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_of_guest" => 2,
                "child_occupancy" => 1
            ],
            [
                "objectId" => "d9hoDbQW46",
                "num_beds" => 2,
                "createdAt" => "2016-05-10T03:27:54.884Z",
                "night_price" => 548000,
                "images" => [
                    "img/room/201605092327540.jpg"
                ],
                "night_price2" => 667000,
                "adult_occupancy" => 2,
                "updatedAt" => "2016-05-10T03:27:54.884Z",
                "short_desc" => "2 тусдаа ортой люкс өрөө",
                "room_type" => "Deluxe Twin",
                "roomt_size" => "55",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "child_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "6VSsxUSqRr"
                ],
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "num_rooms" => 10
            ],
            [
                "objectId" => "ddPxMJsXBf",
                "createdAt" => "2016-06-07T05:23:45.722Z",
                "short_desc" => "Үнэгүй өглөөний цай, өндөр хурдны интернет ",
                "adult_occupancy" => 2,
                "updatedAt" => "2016-06-07T05:50:11.141Z",
                "child_occupancy" => 1,
                "roomt_size" => "80",
                "num_rooms" => 5,
                "num_beds" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "SvTXmdzBbz"
                ],
                "night_price2" => 455000,
                "images" => [
                    "img/room/0427fab.jpg"
                ],
                "room_type" => "Suite Twin",
                "num_of_guest" => 2,
                "night_price" => 455000,
                "bed_size" => "Twin",
                "facilities" => [
                    "tv",
                    "bar"
                ]
            ],
            [
                "objectId" => "dfdSvPIY0a",
                "roomt_size" => "45",
                "num_of_guest" => 2,
                "createdAt" => "2016-06-27T10:06:48.756Z",
                "images" => [
                    "img/room/3e59250.jpg"
                ],
                "bed_size" => "King",
                "night_price2" => 100,
                "child_occupancy" => 1,
                "num_rooms" => 3,
                "num_beds" => 1,
                "night_price" => 89,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "updatedAt" => "2016-06-27T10:06:48.756Z",
                "adult_occupancy" => 2,
                "short_desc" => "Free Wifi, breakfast",
                "room_type" => "Superior King",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "MlVZA3qvoO"
                ]
            ],
            [
                "objectId" => "eKA5LkEzfd",
                "num_rooms" => 18,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price2" => 220,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "HCjbe1jlDz"
                ],
                "room_type" => "King Room",
                "updatedAt" => "2017-01-10T14:30:12.214Z",
                "night_price" => 220,
                "adult_occupancy" => 2,
                "createdAt" => "2017-01-10T14:30:12.214Z",
                "num_beds" => 1,
                "images" => [
                    "img/room/77e4797.jpg"
                ],
                "short_desc" => "This double room features a bathrobe, seating area and air conditioning.",
                "child_occupancy" => 1,
                "roomt_size" => "35",
                "num_of_guest" => 2,
                "bed_size" => "King"
            ],
            [
                "objectId" => "eUOshXugoR",
                "num_beds" => 2,
                "updatedAt" => "2017-03-13T03:51:08.659Z",
                "images" => [
                    "img/room/20160427062700c6615ad.png"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "iobqh1OPED"
                ],
                "night_price" => 92,
                "num_of_guest" => 2,
                "short_desc" => "Spacious room features 2 single beds, flat-screen cable TV, iPod dock, sofa, air conditioning, heating",
                "roomt_size" => "90",
                "num_rooms" => 0,
                "room_type" => "Big Standard twin",
                "createdAt" => "2016-04-27T10:27:00.589Z",
                "bed_size" => "Twin",
                "night_price2" => 120,
                "adult_occupancy" => 2,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ]
            ],
            [
                "objectId" => "eaOyBRla3I",
                "updatedAt" => "2016-05-05T11:44:19.567Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "2AnVllEkUT"
                ],
                "num_beds" => 1,
                "num_rooms" => 10,
                "night_price2" => 100,
                "short_desc" => "Standard room /with double bed/- bed size 2,0*1,95. Standard room /with twin bed/- bed size 1,0*1,95. ",
                "roomt_size" => "35",
                "adult_occupancy" => 2,
                "bed_size" => "Full",
                "child_occupancy" => 1,
                "images" => [],
                "night_price" => 78,
                "room_type" => "Standard",
                "createdAt" => "2016-05-05T11:43:20.498Z",
                "facilities" => [
                    "bar",
                    "bathtub"
                ],
                "num_of_guest" => 2
            ],
            [
                "objectId" => "enRG7xLTQj",
                "createdAt" => "2017-01-10T16:09:17.338Z",
                "room_type" => "Queen room",
                "num_rooms" => 25,
                "images" => [
                    "img/room/a086854.jpg"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "GZkZUYe4Rr"
                ],
                "num_beds" => 1,
                "night_price" => 200,
                "night_price2" => 200,
                "short_desc" => "Breakfast included in price",
                "num_of_guest" => 2,
                "roomt_size" => "27",
                "updatedAt" => "2017-01-11T04:57:21.631Z",
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "adult_occupancy" => 2,
                "bed_size" => "Queen"
            ],
            [
                "objectId" => "eojkCds2FH",
                "roomt_size" => "60",
                "num_of_guest" => 2,
                "short_desc" => "This twin/double room has a view, minibar and seating area.",
                "room_type" => "Deluxe Double",
                "num_rooms" => 3,
                "createdAt" => "2016-01-26T17:55:15.803Z",
                "num_beds" => 1,
                "night_price" => 130,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "adult_occupancy" => 2,
                "bed_size" => "King",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "8dQe8e3Xns"
                ],
                "child_occupancy" => 1,
                "updatedAt" => "2017-01-10T15:00:32.998Z",
                "images" => [
                    "img/room/20160126125515b56b3a8.png",
                    "img/room/201601261255153c9e2fb.png",
                    "img/room/201601261255157c4c105.png",
                    "img/room/20160126125515a53596f.png"
                ],
                "night_price2" => 130
            ],
            [
                "objectId" => "euxOK4I9ge",
                "short_desc" => "This room features 1 single bed, bathtub, mini bar and provides free toiletries. ",
                "room_type" => "Standard single",
                "night_price2" => 161,
                "night_price" => 134,
                "bed_size" => "Full",
                "child_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "images" => [
                    "img/room/20160411034556041caf6.png"
                ],
                "createdAt" => "2016-04-11T07:45:56.560Z",
                "num_rooms" => 16,
                "num_beds" => 1,
                "updatedAt" => "2016-06-28T08:23:49.426Z",
                "num_of_guest" => 2,
                "adult_occupancy" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "MaGHICo3s0"
                ],
                "roomt_size" => "28"
            ],
            [
                "objectId" => "f6ySFYSnSu",
                "num_of_guest" => 2,
                "bed_size" => "King",
                "room_type" => "Standard king",
                "short_desc" => "Free Wifi, breakfast",
                "adult_occupancy" => 2,
                "images" => [
                    "img/room/095fc68.jpg"
                ],
                "createdAt" => "2016-06-27T09:59:13.596Z",
                "num_beds" => 1,
                "roomt_size" => "45",
                "night_price2" => 78,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "night_price" => 67,
                "num_rooms" => 4,
                "updatedAt" => "2016-06-27T09:59:13.596Z",
                "child_occupancy" => 1
            ],
            [
                "objectId" => "fA9g9PYtKW",
                "num_of_guest" => 2,
                "short_desc" => " This room includes living room, two bathrooms, and kitchenette",
                "createdAt" => "2016-04-11T08:31:53.206Z",
                "updatedAt" => "2016-06-28T08:20:45.986Z",
                "night_price" => 233,
                "child_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "MaGHICo3s0"
                ],
                "night_price2" => 278,
                "num_beds" => 1,
                "roomt_size" => "45",
                "room_type" => "Deluxe Room",
                "bed_size" => "King",
                "images" => [
                    "img/room/20160411043153cfd3337.png"
                ],
                "adult_occupancy" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_rooms" => 6
            ],
            [
                "objectId" => "fm3qEos2Uv",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "FD6SVf6qP6"
                ],
                "night_price" => 180,
                "adult_occupancy" => 2,
                "num_of_guest" => 2,
                "num_rooms" => 2,
                "short_desc" => "This twin room features a balcony, executive lounge access and sofa.",
                "bed_size" => "Full",
                "updatedAt" => "2016-03-19T16:36:25.342Z",
                "roomt_size" => "40",
                "num_beds" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "child_occupancy" => 1,
                "createdAt" => "2016-01-26T16:55:32.000Z",
                "room_type" => "Presidential Suite",
                "images" => [
                    "img/room/201601261155328938389.png",
                    "img/room/20160126115532c68c772.png"
                ]
            ],
            [
                "objectId" => "fna5z2A2ed",
                "num_beds" => 1,
                "num_rooms" => 4,
                "createdAt" => "2017-01-10T16:01:53.564Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "vkbW6u2w1b"
                ],
                "roomt_size" => "67",
                "short_desc" => "Offering city views, the room comes with a minibar, air purifier with humidifier and 40-inch flat-screen TV. ",
                "room_type" => "Junior Suite",
                "updatedAt" => "2017-03-15T05:00:42.688Z",
                "night_price2" => 333,
                "bed_size" => "Full",
                "num_of_guest" => 1,
                "adult_occupancy" => 1,
                "night_price" => 333,
                "images" => [
                    "img/room/1b024b1.jpg",
                    "img/room/fd7b3d9.jpg",
                    "img/room/8edf542.jpg",
                    "img/room/e641726.jpg"
                ],
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ]
            ],
            [
                "objectId" => "frUqQJyBKj",
                "bed_size" => "Twin",
                "images" => [
                    "img/room/cbcd689.jpg"
                ],
                "short_desc" => "Үнэгүй өглөөний цай, өндөр хурдны интернет",
                "createdAt" => "2016-06-07T05:38:17.704Z",
                "night_price" => 347000,
                "roomt_size" => "35",
                "night_price2" => 347000,
                "num_of_guest" => 1,
                "updatedAt" => "2016-06-07T05:51:31.955Z",
                "num_rooms" => 5,
                "child_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "SvTXmdzBbz"
                ],
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "room_type" => "Suite Single",
                "num_beds" => 1,
                "adult_occupancy" => 1
            ],
            [
                "objectId" => "fsPpnb849G",
                "updatedAt" => "2017-03-13T03:50:27.256Z",
                "images" => [
                    "img/room/2016042706253459b7171.png"
                ],
                "night_price" => 90,
                "adult_occupancy" => 2,
                "createdAt" => "2016-04-27T10:25:34.612Z",
                "num_of_guest" => 2,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "child_occupancy" => 1,
                "short_desc" => "Room features 2 single beds, flat-screen cable TV, iPod dock, sofa, air conditioning, heating, minibar, fridge ",
                "room_type" => "Standard Twin",
                "bed_size" => "Twin",
                "num_beds" => 2,
                "num_rooms" => 28,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "iobqh1OPED"
                ],
                "roomt_size" => "35",
                "night_price2" => 100
            ],
            [
                "objectId" => "g298bCNqw4",
                "room_type" => "Standard Double",
                "num_of_guest" => 2,
                "night_price2" => 82,
                "num_beds" => 1,
                "night_price" => 82,
                "short_desc" => "High speed  WiFi, Served free breakfasts every morning with a different picking",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "VCNzEKByHF"
                ],
                "child_occupancy" => 1,
                "updatedAt" => "2016-06-28T00:36:45.376Z",
                "createdAt" => "2016-06-28T00:36:45.376Z",
                "num_rooms" => 10,
                "adult_occupancy" => 2,
                "bed_size" => "Queen",
                "images" => [
                    "img/room/e640fb4.jpg"
                ],
                "roomt_size" => "45",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ]
            ],
            [
                "objectId" => "g70dyFgrhG",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "room_type" => "Deluxe Twin",
                "adult_occupancy" => 2,
                "images" => [
                    "img/room/1b31533.jpg"
                ],
                "num_rooms" => 6,
                "bed_size" => "Twin",
                "createdAt" => "2016-06-27T10:12:01.726Z",
                "night_price2" => 112,
                "num_beds" => 2,
                "updatedAt" => "2016-06-27T10:12:01.726Z",
                "roomt_size" => "45",
                "num_of_guest" => 2,
                "child_occupancy" => 1,
                "short_desc" => "Free Wifi, breakfast",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "MlVZA3qvoO"
                ],
                "night_price" => 100
            ],
            [
                "objectId" => "g9ZRRxMYYl",
                "short_desc" => "This double room features air conditioning, a sitting area and electric kettle.",
                "adult_occupancy" => 2,
                "images" => [
                    "img/room/201605180052100.jpg"
                ],
                "roomt_size" => "55",
                "room_type" => "Business suite",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "vrrPDnTXdN"
                ],
                "num_rooms" => 0,
                "bed_size" => "Full",
                "child_occupancy" => 1,
                "updatedAt" => "2017-03-23T10:13:33.519Z",
                "createdAt" => "2016-04-20T05:24:53.260Z",
                "num_beds" => 1,
                "night_price" => 243,
                "num_of_guest" => 2,
                "night_price2" => 311
            ],
            [
                "objectId" => "gJEnyIW70K",
                "createdAt" => "2016-04-27T10:58:36.340Z",
                "night_price2" => 160,
                "facilities" => [
                    "tv",
                    "bar",
                    "kitchen"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "hpjqDvtnjq"
                ],
                "images" => [
                    "img/room/201604280615390.png"
                ],
                "num_rooms" => 10,
                "updatedAt" => "2016-04-28T10:15:40.022Z",
                "adult_occupancy" => 2,
                "bed_size" => "Queen",
                "room_type" => "Junior suite",
                "num_beds" => 1,
                "num_of_guest" => 2,
                "short_desc" => "This suite features a dining area, seating area and kitchen.",
                "roomt_size" => "40",
                "night_price" => 139,
                "child_occupancy" => 1
            ],
            [
                "objectId" => "gTvMLkqjoZ",
                "num_rooms" => 5,
                "images" => [
                    "img/room/201601261256559554363.png"
                ],
                "night_price" => 65,
                "createdAt" => "2016-01-26T17:56:55.064Z",
                "num_of_guest" => 2,
                "short_desc" => "This twin room features a soundproofing, electric kettle and sofa.",
                "updatedAt" => "2017-01-10T14:58:06.374Z",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_beds" => 2,
                "child_occupancy" => 1,
                "bed_size" => "Twin",
                "room_type" => "Standard Double ",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "8dQe8e3Xns"
                ],
                "adult_occupancy" => 2,
                "roomt_size" => "45",
                "night_price2" => 65
            ],
            [
                "objectId" => "guvTxGwLfM",
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "adult_occupancy" => 1,
                "night_price" => 600,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "vkbW6u2w1b"
                ],
                "createdAt" => "2017-01-10T16:04:46.823Z",
                "short_desc" => "Offering city views, the suite is consisted of 2 separate rooms. It comes with a minibar, ironing facilities and 2 flat-",
                "night_price2" => 600,
                "bed_size" => "King",
                "num_beds" => 1,
                "updatedAt" => "2017-03-15T05:03:49.502Z",
                "roomt_size" => "84",
                "num_of_guest" => 1,
                "num_rooms" => 4,
                "child_occupancy" => 1,
                "images" => [
                    "img/room/16820ca.jpg",
                    "img/room/fea7e59.jpg",
                    "img/room/34a6224.jpg",
                    "img/room/2ede209.jpg",
                    "img/room/e0987ae.jpg"
                ],
                "room_type" => "Executive Suite"
            ],
            [
                "objectId" => "h1f0KB9wYx",
                "num_beds" => 1,
                "roomt_size" => "85",
                "num_of_guest" => 2,
                "night_price" => 615,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "vrrPDnTXdN"
                ],
                "images" => [
                    "img/room/20151207034505e130109.png",
                    "img/room/201604120441040.png"
                ],
                "short_desc" => "This suite features an electric kettle, air conditioning and seating area.",
                "createdAt" => "2015-12-07T02:45:06.302Z",
                "room_type" => "Executive Suite",
                "adult_occupancy" => 2,
                "child_occupancy" => 1,
                "num_rooms" => 0,
                "updatedAt" => "2017-03-23T10:14:11.100Z",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "bed_size" => "King",
                "night_price2" => 691
            ],
            [
                "objectId" => "hCa1zeaGlH",
                "short_desc" => "Room comes with a balcony overlooking the city and the mountain",
                "child_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 80,
                "images" => [
                    "img/room/e924daf.jpg"
                ],
                "num_of_guest" => 2,
                "createdAt" => "2016-05-26T04:45:55.563Z",
                "roomt_size" => "17",
                "adult_occupancy" => 2,
                "bed_size" => "Full",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "q0eyY9f5np"
                ],
                "num_rooms" => 20,
                "num_beds" => 1,
                "night_price2" => 103,
                "updatedAt" => "2016-05-26T04:45:55.563Z",
                "room_type" => "Standard Double"
            ],
            [
                "objectId" => "hKHcNzFMRa",
                "createdAt" => "2017-01-10T13:13:33.221Z",
                "roomt_size" => "32",
                "facilities" => [
                    "air",
                    "tv"
                ],
                "num_beds" => 1,
                "night_price2" => 289,
                "short_desc" => "Located on the floors between 9 and 19, this double room has a cable TV and bathrobe. Guests can enjoy an overlooking vi",
                "num_of_guest" => 2,
                "child_occupancy" => 1,
                "bed_size" => "Queen",
                "updatedAt" => "2017-01-10T13:13:33.221Z",
                "room_type" => "Deluxe Double",
                "night_price" => 289,
                "num_rooms" => 26,
                "adult_occupancy" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "uTwM5sBjTr"
                ],
                "images" => [
                    "img/room/1d5a791.jpg",
                ]
            ],
            [
                "objectId" => "hfTdi50Pjw",
                "num_beds" => 1,
                "roomt_size" => "25",
                "adult_occupancy" => 2,
                "child_occupancy" => 1,
                "short_desc" => "Spacious room comes with a balcony with views over the mountains and the city,",
                "room_type" => "Superior Double",
                "bed_size" => "Queen",
                "num_rooms" => 4,
                "updatedAt" => "2016-05-26T04:48:39.109Z",
                "images" => [
                    "img/room/b446280.jpg"
                ],
                "night_price" => 103,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price2" => 130,
                "createdAt" => "2016-05-26T04:48:39.109Z",
                "num_of_guest" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "q0eyY9f5np"
                ]
            ],
            [
                "objectId" => "hqOxjgZ1c6",
                "bed_size" => "King",
                "short_desc" => "65 суваг бүхий кабелийн телевиз, дэлхийн аль ч улс орон руу ярих холбооны бүрэн системтэй",
                "num_rooms" => 10,
                "adult_occupancy" => 2,
                "images" => [
                    "img/room/201605092322160.jpg"
                ],
                "room_type" => "Executive Suite",
                "night_price" => 1200000,
                "num_beds" => 1,
                "roomt_size" => "85",
                "num_of_guest" => 2,
                "createdAt" => "2016-05-10T03:22:16.502Z",
                "child_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "6VSsxUSqRr"
                ],
                "night_price2" => 1348000,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "updatedAt" => "2016-05-10T03:22:16.502Z"
            ],
            [
                "objectId" => "i9rblTpv81",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "night_price2" => 215,
                "adult_occupancy" => 2,
                "bed_size" => "King",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "cte44bvM78"
                ],
                "createdAt" => "2017-01-10T13:40:32.515Z",
                "night_price" => 215,
                "num_of_guest" => 2,
                "roomt_size" => "40",
                "child_occupancy" => 1,
                "updatedAt" => "2017-01-10T13:40:32.515Z",
                "room_type" => "Deluxe King",
                "num_rooms" => 74,
                "images" => [
                    "img/room/71014ce.jpg"
                ],
                "num_beds" => 1,
                "short_desc" => "This type room has a deluxe king bed"
            ],
            [
                "objectId" => "iPUwAapgwA",
                "images" => [
                    "img/room/201601261029560.png",
                    "img/room/201604142334160.png"
                ],
                "roomt_size" => "25",
                "night_price" => 69,
                "updatedAt" => "2016-04-15T03:34:16.278Z",
                "adult_occupancy" => 2,
                "child_occupancy" => 1,
                "num_of_guest" => 2,
                "bed_size" => "Full",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "createdAt" => "2016-01-26T15:09:28.308Z",
                "num_rooms" => 10,
                "num_beds" => 1,
                "short_desc" => "Offering free WiFi, this soundproofed room features a flat-screen cable satellite TV and seating area",
                "room_type" => "Double Room",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "IdSnu9yQhT"
                ],
                "night_price2" => 69
            ],
            [
                "objectId" => "iTl50ZC9oI",
                "updatedAt" => "2017-01-10T15:34:04.822Z",
                "adult_occupancy" => 2,
                "short_desc" => "Room is equipped with a work desk, a personal safe and satellite television.",
                "createdAt" => "2017-01-10T15:34:04.822Z",
                "bed_size" => "Twin",
                "child_occupancy" => 1,
                "roomt_size" => "33",
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "images" => [
                    "img/room/6e2be49.jpg"
                ],
                "room_type" => "Twin room",
                "num_rooms" => 22,
                "num_of_guest" => 2,
                "num_beds" => 1,
                "night_price2" => 220,
                "night_price" => 220,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Tl26FDLUoa"
                ]
            ],
            [
                "objectId" => "iV9j4NCESu",
                "night_price" => 120,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "F5TeR4VGpi"
                ],
                "room_type" => "Deluxe apartment",
                "createdAt" => "2016-04-25T12:11:31.884Z",
                "child_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar",
                    "kitchen"
                ],
                "short_desc" => "This double room features kitchenware, dining area and bathrobe.",
                "num_beds" => 1,
                "num_rooms" => 7,
                "images" => [
                    "img/room/20160425081131a0d4817.png"
                ],
                "roomt_size" => "44",
                "bed_size" => "King",
                "adult_occupancy" => 2,
                "updatedAt" => "2017-01-10T15:36:32.277Z",
                "num_of_guest" => 2,
                "night_price2" => 130
            ],
            [
                "objectId" => "jIS2kirlcn",
                "num_beds" => 1,
                "room_type" => "Connected Room",
                "num_rooms" => 10,
                "bed_size" => "Full",
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "num_of_guest" => 4,
                "images" => [
                    "img/room/201605092302520.jpg"
                ],
                "short_desc" => "Нийт 4 хүн орох боломжтой.",
                "adult_occupancy" => 4,
                "night_price" => 488000,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "6VSsxUSqRr"
                ],
                "child_occupancy" => 1,
                "createdAt" => "2016-05-10T03:02:52.290Z",
                "night_price2" => 607000,
                "roomt_size" => "45",
                "updatedAt" => "2016-05-10T03:02:52.290Z"
            ],
            [
                "objectId" => "jUpFSRnIpk",
                "num_of_guest" => 3,
                "roomt_size" => "45",
                "bed_size" => "King",
                "num_rooms" => 50,
                "updatedAt" => "2016-03-19T16:37:26.423Z",
                "short_desc" => "123",
                "adult_occupancy" => 3,
                "child_occupancy" => 1,
                "num_beds" => 1,
                "night_price" => 180,
                "room_type" => "Deluxe Room",
                "images" => [
                    "img/room/201512070542568c88349.png"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "cqq9cs36Ql"
                ],
                "createdAt" => "2015-12-07T04:42:56.745Z",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ]
            ],
            [
                "objectId" => "jVObeB5dLJ",
                "updatedAt" => "2016-06-28T00:43:27.006Z",
                "images" => [
                    "img/room/28cf047.jpg"
                ],
                "bed_size" => "Twin",
                "short_desc" => "High speed  WiFi, Served free breakfasts every morning with a different picking",
                "createdAt" => "2016-06-28T00:43:27.006Z",
                "adult_occupancy" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 173,
                "night_price2" => 205,
                "num_beds" => 2,
                "child_occupancy" => 1,
                "num_of_guest" => 2,
                "roomt_size" => "45",
                "num_rooms" => 7,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "VCNzEKByHF"
                ],
                "room_type" => "Semi-Deluxe "
            ],
            [
                "objectId" => "jixZWvcwV7",
                "roomt_size" => "34",
                "bed_size" => "Queen",
                "images" => [],
                "num_rooms" => 3,
                "short_desc" => "This room features one queen bed, mini bar, seating area, flat screen TV, and WiFi",
                "child_occupancy" => 1,
                "num_of_guest" => 2,
                "night_price2" => 160,
                "night_price" => 140,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "tFt4tyN397"
                ],
                "adult_occupancy" => 2,
                "num_beds" => 1,
                "room_type" => "Deluxe Double",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "createdAt" => "2016-04-12T06:48:44.368Z",
                "updatedAt" => "2016-06-20T06:42:55.821Z"
            ],
            [
                "objectId" => "k22IT24CrD",
                "short_desc" => "2 хүний өргөн ор, суух талбай, мини бар, зурагт, интернэт",
                "images" => [
                    "img/room/20160126205846cdbb49b.png",
                    "img/room/201603170055380.png",
                    "img/room/201603170055381.png",
                    "img/room/201603170055382.png"
                ],
                "num_rooms" => 3,
                "updatedAt" => "2017-01-10T15:11:47.284Z",
                "num_beds" => 1,
                "room_type" => "Double Room",
                "createdAt" => "2016-01-27T01:58:46.647Z",
                "night_price" => 25,
                "bed_size" => "Queen",
                "child_occupancy" => 1,
                "adult_occupancy" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "gZ63FP6fCP"
                ],
                "roomt_size" => "35",
                "num_of_guest" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price2" => 25
            ],
            [
                "objectId" => "kkPZpVgSpR",
                "bed_size" => "King",
                "num_rooms" => 6,
                "num_beds" => 1,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "createdAt" => "2016-03-16T06:27:27.406Z",
                "num_of_guest" => 2,
                "updatedAt" => "2016-04-20T10:04:50.158Z",
                "short_desc" => "This family room features a minibar and work desk.",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "PrIYApIg5O"
                ],
                "night_price2" => 280,
                "roomt_size" => "110",
                "adult_occupancy" => 2,
                "child_occupancy" => 1,
                "images" => [
                    "img/room/201604200604490.png"
                ],
                "night_price" => 180,
                "room_type" => "Deluxe room"
            ],
            [
                "objectId" => "knzQ8nuyR3",
                "num_of_guest" => 2,
                "roomt_size" => "45",
                "room_type" => "Standard king",
                "adult_occupancy" => 2,
                "createdAt" => "2016-06-27T10:01:26.475Z",
                "num_beds" => 1,
                "night_price2" => 78,
                "child_occupancy" => 1,
                "night_price" => 67,
                "images" => [
                    "img/room/88a4ab3.jpg"
                ],
                "short_desc" => "Free Wifi, breakfast",
                "updatedAt" => "2016-06-27T10:01:26.475Z",
                "num_rooms" => 4,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "bed_size" => "King"
            ],
            [
                "objectId" => "lBTv1qdCRB",
                "num_of_guest" => 2,
                "short_desc" => "Хосын өргөн ор, өндөр хурдны интернет, өглөөний цай",
                "createdAt" => "2016-08-18T08:08:18.478Z",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "20",
                "room_type" => "Standard Double",
                "night_price" => 200000,
                "facilities" => [],
                "night_price2" => 200000,
                "images" => [
                    "img/room/dabbeee.jpg"
                ],
                "num_rooms" => 10,
                "bed_size" => "Queen",
                "updatedAt" => "2016-08-18T08:08:37.471Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "gIlThB46Ls"
                ],
                "child_occupancy" => 1
            ],
            [
                "objectId" => "lDSwy1Oijd",
                "night_price2" => 164000,
                "night_price" => 164000,
                "num_of_guest" => 2,
                "num_beds" => 1,
                "roomt_size" => "24",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "room_type" => "Double Room",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "aZZnxV1FeB"
                ],
                "bed_size" => "Full",
                "createdAt" => "2016-03-12T09:52:06.483Z",
                "updatedAt" => "2016-03-19T16:36:09.381Z",
                "images" => [
                    "img/room/2016031210515143a87a8.png",
                    "img/room/201603130029580.png",
                    "img/room/201603130029581.png"
                ],
                "num_rooms" => 10,
                "short_desc" => "Өндөр хурдны интернэт, суух талбай, 2 хүний том ор ",
                "adult_occupancy" => 2,
                "child_occupancy" => 1
            ],
            [
                "objectId" => "lHuMYn4vYo",
                "night_price" => 120,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "createdAt" => "2016-03-16T06:16:31.175Z",
                "short_desc" => "This twin room features bathrobes and seating area.\r\n",
                "num_rooms" => 9,
                "child_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "PrIYApIg5O"
                ],
                "num_of_guest" => 2,
                "num_beds" => 2,
                "room_type" => "Executive Double",
                "adult_occupancy" => 2,
                "roomt_size" => "20",
                "images" => [
                    "img/room/201604200428580.png"
                ],
                "night_price2" => 120,
                "bed_size" => "Twin",
                "updatedAt" => "2017-01-10T13:29:46.866Z"
            ],
            [
                "objectId" => "lQrPg0SVaD",
                "adult_occupancy" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "PrIYApIg5O"
                ],
                "short_desc" => "This double room features a dining area, minibar and cable TV.",
                "bed_size" => "Queen",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 120,
                "num_beds" => 1,
                "num_of_guest" => 2,
                "createdAt" => "2016-03-16T06:23:35.315Z",
                "num_rooms" => 6,
                "night_price2" => 120,
                "roomt_size" => "45",
                "updatedAt" => "2017-01-10T13:30:39.516Z",
                "images" => [
                    "img/room/201604200430260.png"
                ],
                "child_occupancy" => 1,
                "room_type" => "Superior twin"
            ],
            [
                "objectId" => "lTCYnsTEQk",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "bed_size" => "Twin",
                "images" => [
                    "img/room/aa2ce93.jpg"
                ],
                "short_desc" => "Free Wifi, breakfast",
                "num_beds" => 2,
                "createdAt" => "2016-06-27T10:18:46.615Z",
                "night_price2" => 145,
                "num_of_guest" => 2,
                "night_price" => 134,
                "adult_occupancy" => 2,
                "child_occupancy" => 1,
                "num_rooms" => 2,
                "roomt_size" => "45",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "MlVZA3qvoO"
                ],
                "updatedAt" => "2016-06-27T10:18:46.615Z",
                "room_type" => "Royal Apartment"
            ],
            [
                "objectId" => "lpSTsVlNt4",
                "bed_size" => "Twin",
                "num_beds" => 2,
                "child_occupancy" => 1,
                "night_price" => 154,
                "num_of_guest" => 2,
                "num_rooms" => 8,
                "adult_occupancy" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "2CgQ3IJmEd"
                ],
                "short_desc" => "Free WiFi, breakfast",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "room_type" => "Superior twin room",
                "night_price2" => 184,
                "updatedAt" => "2016-06-22T09:51:17.587Z",
                "images" => [
                    "img/room/94587ba.jpg"
                ],
                "roomt_size" => "35",
                "createdAt" => "2016-05-09T08:30:42.929Z"
            ],
            [
                "objectId" => "mYIrRpiCyI",
                "num_beds" => 2,
                "num_of_guest" => 2,
                "adult_occupancy" => 2,
                "night_price2" => 88300,
                "short_desc" => "2 тусдаа ортой хагас люкс өрөө. ",
                "bed_size" => "Twin",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "child_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "KewVbvwQLn"
                ],
                "room_type" => "Semi-Deluxe Twin",
                "updatedAt" => "2016-05-09T01:33:56.248Z",
                "night_price" => 88300,
                "roomt_size" => "45",
                "num_rooms" => 3,
                "images" => [
                    "img/room/201605082133560.jpg"
                ],
                "createdAt" => "2016-05-09T01:33:56.248Z"
            ],
            [
                "objectId" => "md9k5yqm0q",
                "short_desc" => "This twin room features a electric kettle, minibar and satellite TV.",
                "roomt_size" => "21",
                "bed_size" => "Twin",
                "num_beds" => 2,
                "night_price" => 69,
                "child_occupancy" => 1,
                "images" => [
                    "img/room/201601261229475b33a75.png",
                    "img/room/201601261229475255004.png"
                ],
                "updatedAt" => "2017-01-10T14:55:08.241Z",
                "createdAt" => "2016-01-26T17:29:48.127Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "rAoKCNUn9Y"
                ],
                "num_rooms" => 3,
                "adult_occupancy" => 2,
                "num_of_guest" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "room_type" => "Standard Twin",
                "night_price2" => 69
            ],
            [
                "objectId" => "mfkNRQcadC",
                "images" => [
                    "img/room/2015120706055629009da.png"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "KUppBufikY"
                ],
                "roomt_size" => "39",
                "child_occupancy" => 1,
                "short_desc" => "Suite features a separate living room.",
                "num_of_guest" => 2,
                "adult_occupancy" => 2,
                "num_beds" => 1,
                "night_price" => 172,
                "num_rooms" => 2,
                "room_type" => "Suite",
                "bed_size" => "Twin",
                "updatedAt" => "2016-03-19T16:36:39.274Z",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "createdAt" => "2015-12-07T05:05:56.569Z"
            ],
            [
                "objectId" => "neax1bUCp3",
                "num_rooms" => 4,
                "bed_size" => "Full",
                "adult_occupancy" => 2,
                "num_beds" => 1,
                "short_desc" => "This double room has a clothes rack, ironing facilities and cable TV.",
                "num_of_guest" => 2,
                "updatedAt" => "2017-01-10T13:27:16.877Z",
                "createdAt" => "2015-12-07T03:57:12.714Z",
                "images" => [
                    "img/room/201604200426180.png"
                ],
                "night_price" => 100,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "PrIYApIg5O"
                ],
                "child_occupancy" => 1,
                "roomt_size" => "30",
                "room_type" => "Standard twin",
                "room_rs_type" => "St/D",
                "night_price2" => 100
            ],
            [
                "objectId" => "o7KcPQ1dlY",
                "createdAt" => "2016-05-09T01:31:04.571Z",
                "room_type" => "Semi-Deluxe Room",
                "updatedAt" => "2016-05-09T01:31:04.571Z",
                "short_desc" => "2 хүний нэг өргөн ортой хасаг люкс өрөө.",
                "night_price2" => 82400,
                "adult_occupancy" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "KewVbvwQLn"
                ],
                "images" => [
                    "img/room/201605082131040.jpg"
                ],
                "roomt_size" => "45",
                "child_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 82400,
                "bed_size" => "Queen",
                "num_of_guest" => 2,
                "num_beds" => 1,
                "num_rooms" => 3
            ],
            [
                "objectId" => "oKvijC4uUD",
                "updatedAt" => "2017-01-10T15:06:19.254Z",
                "num_rooms" => 10,
                "adult_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "gZ63FP6fCP"
                ],
                "num_beds" => 1,
                "bed_size" => "Twin",
                "roomt_size" => "20",
                "room_type" => "Single Room",
                "images" => [],
                "short_desc" => "Best rooms for single tourist.",
                "num_of_guest" => 1,
                "child_occupancy" => 1,
                "night_price" => 20,
                "createdAt" => "2016-01-27T01:49:45.678Z",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "night_price2" => 20
            ],
            [
                "objectId" => "ol8OthFqu9",
                "night_price2" => 80,
                "night_price" => 80,
                "roomt_size" => "36",
                "short_desc" => "This twin room has air conditioning, minibar and dishwasher.",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "createdAt" => "2016-04-25T12:06:25.277Z",
                "child_occupancy" => 1,
                "adult_occupancy" => 2,
                "room_type" => "Superior room",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_beds" => 2,
                "num_rooms" => 19,
                "updatedAt" => "2017-01-10T15:29:41.837Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "F5TeR4VGpi"
                ],
                "images" => [
                    "img/room/20160425080625e393358.png"
                ]
            ],
            [
                "objectId" => "p9OiXQatCd",
                "roomt_size" => "30",
                "createdAt" => "2016-04-13T09:42:24.258Z",
                "num_rooms" => 10,
                "images" => [
                    "img/room/20160413054224bb4b91c.png"
                ],
                "bed_size" => "Twin",
                "child_occupancy" => 1,
                "num_beds" => 1,
                "updatedAt" => "2016-04-13T09:42:24.258Z",
                "night_price" => 50,
                "night_price2" => 60,
                "room_type" => "Single Room",
                "num_of_guest" => 1,
                "short_desc" => "sold out",
                "adult_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "hrGAttFT5i"
                ]
            ],
            [
                "objectId" => "pBWIEW4zTC",
                "images" => [
                    "img/room/201604280612300.png"
                ],
                "num_beds" => 1,
                "createdAt" => "2016-04-27T10:50:55.200Z",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "night_price" => 111,
                "roomt_size" => "25",
                "num_of_guest" => 2,
                "short_desc" => "This room features one double bed, towels, Linens\r\nFree WiFi is available in all rooms.",
                "adult_occupancy" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "hpjqDvtnjq"
                ],
                "updatedAt" => "2016-04-28T10:12:31.079Z",
                "child_occupancy" => 1,
                "bed_size" => "Queen",
                "night_price2" => 133,
                "num_rooms" => 10,
                "room_type" => "Superior Double"
            ],
            [
                "objectId" => "pEujS6ZRTi",
                "bed_size" => "Queen",
                "room_type" => "Deluxe Double",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "updatedAt" => "2016-03-19T16:36:26.934Z",
                "adult_occupancy" => 2,
                "roomt_size" => "36",
                "createdAt" => "2016-01-26T16:46:21.159Z",
                "short_desc" => "This twin room has a balcony, electric kettle and minibar.",
                "night_price" => 120,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "FD6SVf6qP6"
                ],
                "num_rooms" => 6,
                "child_occupancy" => 1,
                "images" => [
                    "img/room/201601261146217041c0d.png",
                    "img/room/2016012611462164e3479.png"
                ],
                "num_beds" => 1,
                "num_of_guest" => 2
            ],
            [
                "objectId" => "pds3HoTFh3",
                "night_price" => 167,
                "num_of_guest" => 2,
                "night_price2" => 212,
                "images" => [
                    "img/room/6749986.jpg"
                ],
                "num_rooms" => 4,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "bed_size" => "King",
                "adult_occupancy" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "DNFQck6Lkp"
                ],
                "num_beds" => 1,
                "createdAt" => "2016-05-26T06:29:44.015Z",
                "room_type" => "Suite",
                "short_desc" => "View, Mountain view, City view, TV, Telephone, Cable Channels, ",
                "updatedAt" => "2016-07-12T10:33:07.882Z",
                "child_occupancy" => 1,
                "roomt_size" => "62"
            ],
            [
                "objectId" => "qDrc6dwZl6",
                "room_type" => "Deluxe Junior Suite",
                "createdAt" => "2016-06-28T00:44:40.584Z",
                "roomt_size" => "45",
                "night_price" => 205,
                "bed_size" => "Twin",
                "updatedAt" => "2016-06-28T00:44:40.584Z",
                "night_price2" => 205,
                "adult_occupancy" => 2,
                "num_rooms" => 1,
                "num_of_guest" => 2,
                "num_beds" => 2,
                "child_occupancy" => 1,
                "images" => [
                    "img/room/b3e7a63.jpg",
                    "img/room/677c7c8.jpg"
                ],
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "short_desc" => "High speed  WiFi, Served free breakfasts every morning with a different picking",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "VCNzEKByHF"
                ]
            ],
            [
                "objectId" => "qcxPGHgU4D",
                "short_desc" => "This single room has a minibar, a sofa and a TV with cable and satellite channels. A private bathroom is included",
                "roomt_size" => "28",
                "bed_size" => "Twin",
                "child_occupancy" => 1,
                "night_price" => 45,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "images" => [
                    "img/room/201601261209584b726fa.png"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "CWjIspaaEA"
                ],
                "num_of_guest" => 1,
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "room_type" => "Single Room",
                "updatedAt" => "2017-01-10T14:44:28.978Z",
                "num_rooms" => 4,
                "createdAt" => "2016-01-26T17:09:58.535Z",
                "night_price2" => 45
            ],
            [
                "objectId" => "qe73lm1JNd",
                "child_occupancy" => 1,
                "createdAt" => "2016-04-11T08:22:32.859Z",
                "num_rooms" => 3,
                "night_price" => 165,
                "num_of_guest" => 2,
                "night_price2" => 211,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "MaGHICo3s0"
                ],
                "images" => [
                    "img/room/20160411042232494bd62.png"
                ],
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "bed_size" => "King",
                "adult_occupancy" => 2,
                "num_beds" => 1,
                "updatedAt" => "2016-06-28T08:21:56.043Z",
                "room_type" => "Family",
                "roomt_size" => "40",
                "short_desc" => "The room has classically decorated furniture and offers with king sized bed"
            ],
            [
                "objectId" => "qmNpaRMR5D",
                "num_of_guest" => 2,
                "createdAt" => "2016-03-14T05:14:55.202Z",
                "bed_size" => "Full",
                "night_price2" => 286000,
                "num_rooms" => 4,
                "room_type" => "Deluxe Twin",
                "images" => [
                    "img/room/2016031401144830398b5.png",
                    "img/room/201603162339440.png"
                ],
                "adult_occupancy" => 2,
                "night_price" => 286000,
                "roomt_size" => "40",
                "child_occupancy" => 1,
                "num_beds" => 2,
                "updatedAt" => "2016-03-19T16:36:08.047Z",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "short_desc" => "2",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "aZZnxV1FeB"
                ]
            ],
            [
                "objectId" => "qp6kIxzqmO",
                "room_type" => "President suite",
                "num_rooms" => 1,
                "num_of_guest" => 2,
                "night_price2" => 400,
                "child_occupancy" => 1,
                "roomt_size" => "100",
                "facilities" => [
                    "bar",
                    "bathtub",
                    "kitchen"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "PrIYApIg5O"
                ],
                "adult_occupancy" => 2,
                "createdAt" => "2016-04-20T08:35:33.761Z",
                "night_price" => 400,
                "num_beds" => 1,
                "updatedAt" => "2017-01-10T13:26:12.304Z",
                "short_desc" => "This room has kitchen, separate living room",
                "images" => [
                    "img/room/20160420043533e921aaa.png"
                ],
                "bed_size" => "Twin"
            ],
            [
                "objectId" => "qr8VesVyhh",
                "num_beds" => 1,
                "updatedAt" => "2016-03-19T16:37:27.978Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "LYkfWI2A45"
                ],
                "images" => [
                    "img/room/201512070511493b42eee.png"
                ],
                "short_desc" => "40m² Sky Superior King gives just the right amount of serenity for a relaxing stay. ",
                "room_type" => "Deluxe Room",
                "num_of_guest" => 2,
                "roomt_size" => "38.5",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "adult_occupancy" => 2,
                "createdAt" => "2015-12-07T04:11:49.292Z",
                "num_rooms" => 54,
                "child_occupancy" => 1,
                "night_price" => 100,
                "bed_size" => "King"
            ],
            [
                "objectId" => "rArrFKsc5D",
                "num_beds" => 1,
                "short_desc" => "Free breakfast, WiFi",
                "roomt_size" => "24",
                "updatedAt" => "2016-06-22T09:10:44.409Z",
                "bed_size" => "Queen",
                "images" => [
                    "img/room/04e3c2c.jpg"
                ],
                "room_type" => "Standard double with government view",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "night_price" => 124,
                "night_price2" => 154,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "2CgQ3IJmEd"
                ],
                "child_occupancy" => 1,
                "num_of_guest" => 2,
                "adult_occupancy" => 2,
                "num_rooms" => 4,
                "createdAt" => "2016-05-13T11:32:15.499Z"
            ],
            [
                "objectId" => "rD6Ec1uwCf",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "8dQe8e3Xns"
                ],
                "bed_size" => "Full",
                "adult_occupancy" => 2,
                "night_price" => 130,
                "num_beds" => 2,
                "images" => [
                    "img/room/20160126125312d19a385.png",
                    "img/room/20160126125313a009914.png",
                    "img/room/201601261253139cef7e9.png",
                    "img/room/20160126125313200fd15.png"
                ],
                "roomt_size" => "50",
                "updatedAt" => "2017-01-10T15:01:15.051Z",
                "child_occupancy" => 1,
                "room_type" => "Deluxe Twin",
                "createdAt" => "2016-01-26T17:53:13.213Z",
                "num_of_guest" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_rooms" => 3,
                "short_desc" => "This twin room features a seating area, sofa and view",
                "night_price2" => 130
            ],
            [
                "objectId" => "rm3jSTrjjs",
                "night_price2" => 190,
                "short_desc" => "This suite has an electric kettle, soundproofing and sofa.",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "adult_occupancy" => 2,
                "roomt_size" => "34",
                "room_type" => "Suite",
                "bed_size" => "Queen",
                "num_of_guest" => 2,
                "num_rooms" => 2,
                "num_beds" => 1,
                "updatedAt" => "2016-04-21T08:49:32.207Z",
                "child_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "iVVv2stEee"
                ],
                "night_price" => 190,
                "createdAt" => "2016-04-21T08:49:32.207Z",
                "images" => [
                    "img/room/20160421044932696ff67.png"
                ]
            ],
            [
                "objectId" => "rnOlGjJxDE",
                "adult_occupancy" => 2,
                "images" => [
                    "img/room/c7f0078.jpg",
                    "img/room/61f06fd.jpg",
                    "img/room/3b446d1.jpg"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "tLaW8QkIoh"
                ],
                "updatedAt" => "2017-03-13T03:47:58.382Z",
                "child_occupancy" => 1,
                "num_of_guest" => 2,
                "short_desc" => "This double room features a seating area, satellite TV and sofa.",
                "createdAt" => "2017-01-10T15:38:24.780Z",
                "num_rooms" => 33,
                "night_price2" => 150,
                "bed_size" => "Full",
                "night_price" => 150,
                "roomt_size" => "27",
                "room_type" => "standard double",
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_beds" => 1
            ],
            [
                "objectId" => "s0CNLyB925",
                "num_beds" => 2,
                "num_rooms" => 10,
                "updatedAt" => "2017-01-10T14:59:51.412Z",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 75,
                "bed_size" => "Twin",
                "roomt_size" => "22",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "8dQe8e3Xns"
                ],
                "child_occupancy" => 1,
                "num_of_guest" => 2,
                "adult_occupancy" => 2,
                "createdAt" => "2016-01-26T17:49:29.411Z",
                "images" => [
                    "img/room/20160126124929b3cd209.png",
                    "img/room/201601261249297804c63.png"
                ],
                "room_type" => "Standard Twin",
                "short_desc" => "This double room features a minibar, view and sofa.",
                "night_price2" => 75
            ],
            [
                "objectId" => "s9BIEFxodv",
                "night_price2" => 170,
                "updatedAt" => "2017-03-13T03:28:29.123Z",
                "num_beds" => 1,
                "num_rooms" => 5,
                "bed_size" => "Full",
                "num_of_guest" => 2,
                "adult_occupancy" => 2,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "images" => [
                    "img/room/3597a46.jpg"
                ],
                "roomt_size" => "36",
                "night_price" => 170,
                "room_type" => "Standard Double",
                "short_desc" => "This twin room features air conditioning, satellite TV and seating area.",
                "createdAt" => "2017-01-10T16:00:56.348Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "ybVDUEDC5x"
                ],
                "child_occupancy" => 1
            ],
            [
                "objectId" => "sOUyZZQWeS",
                "updatedAt" => "2016-04-21T08:51:07.650Z",
                "short_desc" => "This room features a tea/coffee maker, minibar and an electric kettle.",
                "createdAt" => "2016-04-21T08:51:07.650Z",
                "bed_size" => "Queen",
                "night_price2" => 274,
                "child_occupancy" => 1,
                "night_price" => 274,
                "num_of_guest" => 2,
                "num_rooms" => 4,
                "num_beds" => 1,
                "room_type" => "Business suite",
                "images" => [
                    "img/room/201604210451071e417ea.png"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "iVVv2stEee"
                ],
                "roomt_size" => "34",
                "adult_occupancy" => 2,
                "facilities" => [
                    "tv",
                    "bar"
                ]
            ],
            [
                "objectId" => "siC9VaeTjF",
                "updatedAt" => "2016-06-07T05:48:52.222Z",
                "roomt_size" => "80",
                "child_occupancy" => 1,
                "short_desc" => "Үнэгүй өглөөний цай, өндөр хурдны интернет, хосын өргөн ор",
                "num_of_guest" => 2,
                "num_beds" => 1,
                "facilities" => [
                    "tv",
                    "bar",
                    "kitchen"
                ],
                "num_rooms" => 5,
                "createdAt" => "2016-06-07T01:57:32.206Z",
                "bed_size" => "King",
                "adult_occupancy" => 2,
                "night_price2" => 518300,
                "room_type" => "Deluxe Double",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "SvTXmdzBbz"
                ],
                "images" => [
                    "img/room/9c8039a.jpg"
                ],
                "night_price" => 518300
            ],
            [
                "objectId" => "sqgPwnv4ys",
                "num_rooms" => 0,
                "bed_size" => "Full",
                "room_type" => "Standard Double",
                "roomt_size" => "30",
                "createdAt" => "2015-12-07T02:07:35.990Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "vrrPDnTXdN"
                ],
                "child_occupancy" => 1,
                "num_of_guest" => 2,
                "night_price" => 140,
                "images" => [
                    "img/room/201604120426380.png"
                ],
                "short_desc" => "This double room features a sitting area, air conditioning and satellite TV.",
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub",
                    "kitchen",
                    "wash"
                ],
                "num_beds" => 1,
                "updatedAt" => "2017-03-03T08:06:52.312Z",
                "adult_occupancy" => 2,
                "night_price2" => 140
            ],
            [
                "objectId" => "ssCIxRClGS",
                "roomt_size" => "56",
                "num_rooms" => 4,
                "updatedAt" => "2017-01-10T13:39:16.689Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "LsqDSlN9xB"
                ],
                "num_of_guest" => 2,
                "short_desc" => "Offering city views and river views, spacious suite features a minibar, a cable ",
                "night_price" => 215,
                "num_beds" => 1,
                "bed_size" => "Full",
                "images" => [
                    "img/room/201604200630550.png"
                ],
                "adult_occupancy" => 2,
                "room_type" => "One-bedroom suite",
                "createdAt" => "2016-01-26T16:13:32.781Z",
                "child_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price2" => 215
            ],
            [
                "objectId" => "tVyN9pCPQR",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "room_type" => "Standard Twin",
                "bed_size" => "Twin",
                "createdAt" => "2016-05-06T09:52:28.470Z",
                "images" => [
                    "img/room/20160506055227fd97a13.png"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "KewVbvwQLn"
                ],
                "night_price" => 76500,
                "num_of_guest" => 2,
                "roomt_size" => "40",
                "short_desc" => "Үнэгүй өглөөний цай, өрөөний үйлчилгээтэй. 1 хүний нарийн 2 ортой",
                "num_rooms" => 3,
                "child_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "night_price2" => 76500,
                "updatedAt" => "2016-05-06T09:52:28.470Z"
            ],
            [
                "objectId" => "tZaI6tzf5j",
                "child_occupancy" => 1,
                "updatedAt" => "2016-05-06T09:50:01.519Z",
                "night_price" => 70600,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "KewVbvwQLn"
                ],
                "room_type" => "Standard Double",
                "createdAt" => "2016-05-06T09:50:01.519Z",
                "short_desc" => "Үнэгүй өглөөний цай, өрөөний үйлчилгээтэй. 2 хүний өргөн 1 том ортой",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "num_beds" => 1,
                "bed_size" => "Full",
                "num_rooms" => 3,
                "roomt_size" => "35",
                "adult_occupancy" => 2,
                "images" => [
                    "img/room/20160506055000c56e050.png"
                ],
                "num_of_guest" => 2,
                "night_price2" => 70600
            ],
            [
                "objectId" => "tcVtUPhku0",
                "room_type" => "Double",
                "short_desc" => "Room is equipped with a work desk, a personal safe and satellite television.",
                "night_price2" => 220,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Tl26FDLUoa"
                ],
                "night_price" => 220,
                "roomt_size" => "33",
                "num_beds" => 1,
                "num_rooms" => 18,
                "num_of_guest" => 2,
                "images" => [
                    "img/room/2810b66.jpg"
                ],
                "updatedAt" => "2017-01-10T15:32:29.981Z",
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "createdAt" => "2017-01-10T15:32:29.981Z",
                "bed_size" => "Full",
                "child_occupancy" => 1,
                "adult_occupancy" => 2
            ],
            [
                "objectId" => "uAFpbuS62U",
                "roomt_size" => "45",
                "adult_occupancy" => 2,
                "bed_size" => "Twin",
                "child_occupancy" => 1,
                "night_price2" => 112,
                "updatedAt" => "2016-06-27T10:17:40.596Z",
                "createdAt" => "2016-06-27T10:17:40.596Z",
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "images" => [
                    "img/room/f75baec.jpg"
                ],
                "num_beds" => 2,
                "num_of_guest" => 2,
                "room_type" => "Business Apartment",
                "num_rooms" => 3,
                "short_desc" => "Free Wifi, breakfast",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "MlVZA3qvoO"
                ],
                "night_price" => 100
            ],
            [
                "objectId" => "vRTpOj6S5A",
                "night_price" => 175,
                "updatedAt" => "2016-04-25T12:15:24.701Z",
                "bed_size" => "Twin",
                "night_price2" => 190,
                "child_occupancy" => 1,
                "images" => [
                    "img/room/2016042508152472af6db.png",
                    "img/room/20160425081524dfe7b64.png"
                ],
                "adult_occupancy" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "F5TeR4VGpi"
                ],
                "num_of_guest" => 2,
                "short_desc" => "This double room has a cable TV, air conditioning and barbecue.",
                "facilities" => [
                    "tv",
                    "bar",
                    "kitchen"
                ],
                "room_type" => "Presidential suite",
                "roomt_size" => "82",
                "num_rooms" => 1,
                "createdAt" => "2016-04-25T12:15:24.701Z",
                "num_beds" => 1
            ],
            [
                "objectId" => "vm99Q7buWG",
                "createdAt" => "2016-04-12T06:15:31.669Z",
                "num_beds" => 1,
                "images" => [
                    "img/room/2016041202152940c1697.png"
                ],
                "short_desc" => "This room features one single bed, seating area, minibar, WIFI, and flat screen TV",
                "roomt_size" => "22",
                "updatedAt" => "2016-04-12T06:15:31.669Z",
                "night_price" => 60,
                "num_rooms" => 6,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "night_price2" => 60,
                "adult_occupancy" => 1,
                "num_of_guest" => 1,
                "bed_size" => "Twin",
                "child_occupancy" => 1,
                "room_type" => "Single Room"
            ],
            [
                "objectId" => "wBgcg2CxUs",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "LsqDSlN9xB"
                ],
                "adult_occupancy" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "child_occupancy" => 1,
                "night_price2" => 300,
                "updatedAt" => "2016-06-28T06:12:54.009Z",
                "night_price" => 300,
                "images" => [
                    "img/room/201604200702395be5e33.png"
                ],
                "room_type" => "Executive two bedroom suite",
                "num_of_guest" => 2,
                "bed_size" => "Full",
                "num_beds" => 2,
                "num_rooms" => 10,
                "createdAt" => "2016-04-20T11:02:40.131Z",
                "roomt_size" => "45",
                "short_desc" => "Offering city views and mountain views, suite features a living room and 2 bedrooms."
            ],
            [
                "objectId" => "wJQK59Nzkn",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "fkoX3OapCN"
                ],
                "night_price2" => 164000,
                "images" => [
                    "img/room/201604112132320d12a36.png"
                ],
                "num_of_guest" => 2,
                "bed_size" => "King",
                "num_beds" => 1,
                "night_price" => 164000,
                "room_type" => "Deluxe Double",
                "updatedAt" => "2016-04-12T02:24:20.951Z",
                "num_rooms" => 10,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "short_desc" => "2 хүний өргөн ор, суух талбай, өндөр хурдны интернэт, олон сувгийн кабел бүхий LCD TV, душтай угаалнын өрөө",
                "child_occupancy" => 1,
                "adult_occupancy" => 2,
                "createdAt" => "2016-04-12T01:32:32.562Z",
                "roomt_size" => "40"
            ],
            [
                "objectId" => "wvDXVmEAgx",
                "bed_size" => "Twin",
                "short_desc" => "This single room features a balcony, sofa and tumble dryer .",
                "room_type" => "Standard Single",
                "createdAt" => "2015-12-07T03:28:15.463Z",
                "images" => [
                    "img/room/201604200216070.png"
                ],
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Lcxo33Vwch"
                ],
                "night_price" => 109,
                "num_beds" => 1,
                "child_occupancy" => 1,
                "num_of_guest" => 1,
                "num_rooms" => 8,
                "adult_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "updatedAt" => "2017-03-31T02:47:53.691Z",
                "roomt_size" => "31",
                "night_price2" => 109
            ],
            [
                "objectId" => "wzZTBpNkDG",
                "updatedAt" => "2016-05-10T03:33:08.710Z",
                "num_beds" => 1,
                "roomt_size" => "30",
                "night_price2" => 430000,
                "num_of_guest" => 2,
                "bed_size" => "Full",
                "room_type" => "Standard Double",
                "images" => [
                    "img/room/201605092333080.jpg"
                ],
                "num_rooms" => 10,
                "createdAt" => "2016-05-10T03:33:08.710Z",
                "short_desc" => "Хосын өргөн ортой энгийн өрөө",
                "adult_occupancy" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "6VSsxUSqRr"
                ],
                "child_occupancy" => 1,
                "night_price" => 334000,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ]
            ],
            [
                "objectId" => "wztE0i3B5S",
                "images" => [
                    "img/room/201604270724442b1f8be.png"
                ],
                "bed_size" => "Full",
                "num_beds" => 2,
                "num_rooms" => 10,
                "createdAt" => "2016-04-27T11:24:44.426Z",
                "updatedAt" => "2017-03-03T08:33:57.533Z",
                "adult_occupancy" => 2,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "90bC0pQE8Z"
                ],
                "night_price" => 134,
                "short_desc" => "Larger twin-sharing room features a flat-screen TV, minibar and an en suite bathroom with a shower or bathtub.",
                "room_type" => "Deluxe twin",
                "night_price2" => 134,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "roomt_size" => "25",
                "child_occupancy" => 1,
                "num_of_guest" => 2
            ],
            [
                "objectId" => "xKZX3VKSzI",
                "night_price" => 60,
                "num_of_guest" => 1,
                "createdAt" => "2016-04-12T06:15:52.370Z",
                "adult_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "bed_size" => "Twin",
                "updatedAt" => "2016-04-12T06:15:52.370Z",
                "images" => [
                    "img/room/201604120215507b6795f.png"
                ],
                "night_price2" => 60,
                "num_beds" => 1,
                "num_rooms" => 6,
                "child_occupancy" => 1,
                "room_type" => "Single Room",
                "short_desc" => "This room features one single bed, seating area, minibar, WIFI, and flat screen TV",
                "roomt_size" => "22"
            ],
            [
                "objectId" => "xKcBQ1z2LA",
                "num_rooms" => 30,
                "child_occupancy" => 1,
                "updatedAt" => "2017-01-10T13:22:21.870Z",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "PrIYApIg5O"
                ],
                "room_type" => "Single Room",
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "roomt_size" => "20",
                "night_price" => 70,
                "adult_occupancy" => 1,
                "num_beds" => 1,
                "createdAt" => "2015-12-07T03:54:51.585Z",
                "short_desc" => "This single room features a seating area and cable TV.",
                "images" => [
                    "img/room/201604200600390.png"
                ],
                "room_rs_type" => "St/S",
                "night_price2" => 70
            ],
            [
                "objectId" => "xVBGCjubSz",
                "short_desc" => "Үнэгүй өглөөний цай, өндөр хурдны интернет",
                "images" => [
                    "img/room/80d39fd.jpg"
                ],
                "num_of_guest" => 2,
                "num_rooms" => 5,
                "createdAt" => "2016-06-07T05:56:48.861Z",
                "child_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "SvTXmdzBbz"
                ],
                "roomt_size" => "42",
                "room_type" => "Suite Double",
                "adult_occupancy" => 2,
                "night_price" => 455000,
                "num_beds" => 1,
                "night_price2" => 455000,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "updatedAt" => "2016-06-07T05:56:48.861Z",
                "bed_size" => "Queen"
            ],
            [
                "objectId" => "xvvqknZ4kB",
                "roomt_size" => "35",
                "adult_occupancy" => 2,
                "bed_size" => "Twin",
                "num_rooms" => 10,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "yMc9Ba3dqX"
                ],
                "updatedAt" => "2016-04-21T04:06:08.959Z",
                "num_of_guest" => 2,
                "num_beds" => 2,
                "night_price2" => 135,
                "createdAt" => "2016-04-21T04:06:08.959Z",
                "short_desc" => "This room features two single beds",
                "images" => [
                    "img/room/2016042100061779157f5.png"
                ],
                "facilities" => [
                    "bar"
                ],
                "room_type" => "Twin guest room",
                "night_price" => 120,
                "child_occupancy" => 1
            ],
            [
                "objectId" => "yCMAYEEDqo",
                "createdAt" => "2015-12-07T05:05:47.174Z",
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "num_beds" => 1,
                "images" => [
                    "img/room/20151207060546a30ae7f.png"
                ],
                "night_price" => 100,
                "roomt_size" => "40",
                "short_desc" => " All room rates include breakfast and 11% government tax.\r\nThe contract rates are available upon request.\r\nHigh ",
                "updatedAt" => "2016-03-19T16:36:40.573Z",
                "adult_occupancy" => 2,
                "num_rooms" => 5,
                "num_of_guest" => 2,
                "bed_size" => "Queen",
                "child_occupancy" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "8aMS32Kn0h"
                ],
                "room_type" => "Deluxe Room"
            ],
            [
                "objectId" => "zAxggshCB3",
                "night_price" => 89,
                "child_occupancy" => 1,
                "updatedAt" => "2016-04-15T03:35:43.774Z",
                "adult_occupancy" => 2,
                "bed_size" => "Queen",
                "createdAt" => "2016-01-26T15:33:44.980Z",
                "num_beds" => 1,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "IdSnu9yQhT"
                ],
                "short_desc" => " It includes a refrigerator and a minibar. The en suite bathroom provides guest robes, slippers and a hairdryer.",
                "num_of_guest" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "images" => [
                    "img/room/201601261033446acaeb8.png",
                    "img/room/201604142335430.png"
                ],
                "roomt_size" => "35",
                "num_rooms" => 2,
                "room_type" => "Deluxe Room",
                "night_price2" => 89
            ],
            [
                "objectId" => "zSbf4cmgNq",
                "num_beds" => 1,
                "short_desc" => "Free Wifi, breakfast",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "MlVZA3qvoO"
                ],
                "night_price" => 84,
                "createdAt" => "2016-06-27T10:16:37.928Z",
                "num_of_guest" => 2,
                "night_price2" => 95,
                "bed_size" => "King",
                "room_type" => "Apartment",
                "roomt_size" => "45",
                "num_rooms" => 8,
                "adult_occupancy" => 2,
                "updatedAt" => "2016-06-27T10:16:37.928Z",
                "images" => [
                    "img/room/5ba88fd.jpg"
                ],
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "child_occupancy" => 1
            ],
            [
                "objectId" => "zToHSBPnAD",
                "num_rooms" => 28,
                "num_of_guest" => 2,
                "night_price2" => 189,
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "DNFQck6Lkp"
                ],
                "updatedAt" => "2016-07-12T10:32:25.088Z",
                "child_occupancy" => 1,
                "num_beds" => 2,
                "bed_size" => "Full",
                "roomt_size" => "46",
                "short_desc" => "Guest staying in the twin rooms are entitled to access to Japanese sauna in the hotel free of charge\r\n",
                "night_price" => 156,
                "adult_occupancy" => 2,
                "facilities" => [
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "createdAt" => "2016-05-26T06:50:08.666Z",
                "images" => [
                    "img/room/faac383.jpg"
                ],
                "room_type" => "Semi-Deluxe"
            ],
            [
                "objectId" => "VRno90DXHM",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "yqsBwJ4QAI"
                ],
                "room_type" => "Executive King Suite ",
                "short_desc" => "This spacious suite has a separate bedroom and living room, equipped with a flat-screen satellite television and a coffe",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "84",
                "bed_size" => "King",
                "num_of_guest" => 2,
                "num_rooms" => 0,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 1166,
                "night_price2" => 1166,
                "images" => [
                    "img/room/322b858.jpg",
                    "img/room/8099c41.jpg",
                    "img/room/7fb1e9b.jpg",
                    "img/room/e76174e.jpg",
                    "img/room/371fd11.jpg",
                    "img/room/27d5454.jpg"
                ],
                "createdAt" => "2017-02-15T08:55:30.775Z",
                "updatedAt" => "2017-03-03T08:16:58.491Z"
            ],
            [
                "objectId" => "pHHUS0tQzU",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "yqsBwJ4QAI"
                ],
                "room_type" => "Horizon Deluxe Room",
                "short_desc" => "Offering magnificent views of the Nayramdal Park or Great Chinggis Khaan Square, this room is equipped with a flat-scree",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "64",
                "bed_size" => "King",
                "num_of_guest" => 2,
                "num_rooms" => 0,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 346,
                "night_price2" => 381,
                "images" => [
                    "img/room/519de17.jpg",
                    "img/room/cfab44d.jpg",
                    "img/room/1f28bd5.jpg"
                ],
                "createdAt" => "2017-02-15T08:57:42.777Z",
                "updatedAt" => "2017-03-03T08:17:40.671Z"
            ],
            [
                "objectId" => "UAi6LGA7o5",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "yqsBwJ4QAI"
                ],
                "room_type" => "Deluxe Twin room",
                "short_desc" => "Offering magnificent views of the Nayramdal Park or Great Chinggis Khaan Square, this room is equipped with a flat-scree",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "42",
                "bed_size" => "Queen",
                "num_of_guest" => 2,
                "num_rooms" => 0,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 288,
                "night_price2" => 323,
                "images" => [
                    "img/room/275daca.jpg",
                    "img/room/ecf72e0.jpg"
                ],
                "createdAt" => "2017-02-15T08:58:47.040Z",
                "updatedAt" => "2017-03-03T08:15:59.793Z"
            ],
            [
                "objectId" => "pqu1GuBBs3",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "yqsBwJ4QAI"
                ],
                "room_type" => "Deluxe Double room",
                "short_desc" => "Offering magnificent views of the Nayramdal Park or Great Chinggis Khaan Square, this room is equipped with a flat-scree",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "42",
                "bed_size" => "King",
                "num_of_guest" => 2,
                "num_rooms" => 0,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 288,
                "night_price2" => 323,
                "images" => [
                    "img/room/8807862.jpg",
                    "img/room/c0c6a11.jpg",
                    "img/room/412ed80.jpg"
                ],
                "createdAt" => "2017-02-15T08:59:53.127Z",
                "updatedAt" => "2017-03-03T08:18:31.948Z"
            ],
            [
                "objectId" => "GPr6Cp38Vg",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "KT9mMO9v30"
                ],
                "room_type" => "Blue Sky Suite",
                "short_desc" => "Offering lovely views of both Chinggis Square and the city, this suite features exquisite design and offers free breakfa",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "79",
                "bed_size" => "King",
                "num_of_guest" => 2,
                "num_rooms" => 8,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 400,
                "night_price2" => 400,
                "images" => [
                    "img/room/b967185.jpg",
                    "img/room/0817292.jpg",
                    "img/room/fa8092d.jpg"
                ],
                "createdAt" => "2017-02-15T09:32:43.364Z",
                "updatedAt" => "2017-05-05T05:00:47.786Z"
            ],
            [
                "objectId" => "uYldAnKbmM",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "KT9mMO9v30"
                ],
                "room_type" => "Panaroma Suite",
                "short_desc" => "Offering vibrant urban views, suite features stylish joint bedroom and living room. It comes with a minibar, a seating a",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "60",
                "bed_size" => "King",
                "num_of_guest" => 2,
                "num_rooms" => 3,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 370,
                "night_price2" => 370,
                "images" => [
                    "img/room/0e28861.jpg",
                    "img/room/e0f3b2e.jpg",
                    "img/room/5f4a225.jpg"
                ],
                "createdAt" => "2017-02-15T09:36:29.557Z",
                "updatedAt" => "2017-05-05T08:33:12.510Z"
            ],
            [
                "objectId" => "KkeyYdEjZN",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "KT9mMO9v30"
                ],
                "room_type" => "Executive Suite",
                "short_desc" => "Offering lovely views from large bay windows, suite features free breakfast, minibar, seating area with sofa and en suit",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "58",
                "bed_size" => "King",
                "num_of_guest" => 2,
                "num_rooms" => 7,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 320,
                "night_price2" => 320,
                "images" => [
                    "img/room/2e00e55.jpg",
                    "img/room/93f69c8.jpg",
                    "img/room/8223435.jpg"
                ],
                "createdAt" => "2017-02-15T11:24:50.810Z",
                "updatedAt" => "2017-05-05T08:32:38.190Z"
            ],
            [
                "objectId" => "AGxTLplKwc",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "KT9mMO9v30"
                ],
                "room_type" => "Deluxe Suite",
                "short_desc" => "Offering vibrant urban views, suite features stylish joint bedroom and living room. It comes with a minibar, a seating a",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "60",
                "bed_size" => "King",
                "num_of_guest" => 2,
                "num_rooms" => 14,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 298,
                "night_price2" => 298,
                "images" => [
                    "img/room/970257e.jpg",
                    "img/room/0a555d2.jpg",
                    "img/room/d00fcaf.jpg"
                ],
                "createdAt" => "2017-02-15T11:30:18.882Z",
                "updatedAt" => "2017-05-05T08:31:34.934Z"
            ],
            [
                "objectId" => "Jq6G9KNg1M",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "KT9mMO9v30"
                ],
                "room_type" => "Executive Corner King",
                "short_desc" => "Offering views of the full city skyline of Ulaanbaatar, room features wooden furniture, a minibar and fitness facilities",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "46",
                "bed_size" => "King",
                "num_of_guest" => 2,
                "num_rooms" => 16,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 260,
                "night_price2" => 260,
                "images" => [
                    "img/room/4a573aa.jpg",
                    "img/room/cabe0b3.jpg",
                    "img/room/84b9667.jpg"
                ],
                "createdAt" => "2017-02-15T11:33:22.203Z",
                "updatedAt" => "2017-05-05T08:30:00.471Z"
            ],
            [
                "objectId" => "G3blqRuFnS",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "KT9mMO9v30"
                ],
                "room_type" => "Executive Twin",
                "short_desc" => "Offering wooden furniture, this room provides free breakfast and fitness facilities. The en suite bathroom has a bathtub",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "44",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 8,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 250,
                "night_price2" => 250,
                "images" => [
                    "img/room/b2fba6a.jpg",
                    "img/room/092203e.jpg",
                    "img/room/80a54c2.jpg"
                ],
                "createdAt" => "2017-02-15T11:37:26.372Z",
                "updatedAt" => "2017-05-05T08:30:52.967Z"
            ],
            [
                "objectId" => "WhxxyHmuod",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "KT9mMO9v30"
                ],
                "room_type" => "Executive King",
                "short_desc" => "Offering wooden furniture, this room provides free breakfast and fitness facilities. The en suite bathroom has a bathtub",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "44",
                "bed_size" => "King",
                "num_of_guest" => 2,
                "num_rooms" => 15,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 225,
                "night_price2" => 225,
                "images" => [
                    "img/room/52c87e5.jpg",
                    "img/room/bf0b447.jpg",
                    "img/room/f5af65e.jpg"
                ],
                "createdAt" => "2017-02-15T11:39:40.594Z",
                "updatedAt" => "2017-05-05T05:58:49.241Z"
            ],
            [
                "objectId" => "APReQAOJGb",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "KT9mMO9v30"
                ],
                "room_type" => "Deluxe Twin",
                "short_desc" => "This twin room has a seating area, minibar and satellite TV.",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "40",
                "bed_size" => "Full",
                "num_of_guest" => 2,
                "num_rooms" => 6,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 225,
                "night_price2" => 225,
                "images" => [
                    "img/room/8e3c42d.jpg",
                    "img/room/357a6a1.jpg"
                ],
                "createdAt" => "2017-02-15T11:43:45.549Z",
                "updatedAt" => "2017-05-05T08:28:53.236Z"
            ],
            [
                "objectId" => "5WJwsDR9Xj",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "DxU21QEQ4F"
                ],
                "room_type" => "Standart twin ",
                "short_desc" => "Room is 24 square metres and comes with a writing desk, a minibar and a flat-screen TV with cable channels.",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "24",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 2,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 100,
                "night_price2" => 100,
                "images" => [
                    "img/room/0f4bf22.jpg",
                    "img/room/acae021.jpg",
                    "img/room/82ac050.jpg"
                ],
                "createdAt" => "2017-03-09T04:51:32.635Z",
                "updatedAt" => "2017-03-23T10:05:41.415Z"
            ],
            [
                "objectId" => "jmnCfHJ5AR",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "DxU21QEQ4F"
                ],
                "room_type" => "Standart Single",
                "short_desc" => "Room is 16 square metres and comes with a single bed, a writing desk, a minibar and a flat-screen TV with cable channels",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "16",
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "num_rooms" => 6,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 62,
                "night_price2" => 0,
                "images" => [
                    "img/room/ce375ed.jpg",
                    "img/room/cd5d634.jpg",
                    "img/room/631ae7d.jpg"
                ],
                "createdAt" => "2017-03-09T05:03:07.429Z",
                "updatedAt" => "2017-03-13T03:26:50.635Z"
            ],
            [
                "objectId" => "7x1pBo0SrB",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "DxU21QEQ4F"
                ],
                "room_type" => "Superior twin",
                "short_desc" => "Room is 35 square metres and comes with a writing desk, a minibar and a flat-screen TV with cable channels. ",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "35",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 9,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 140,
                "night_price2" => 140,
                "images" => [
                    "img/room/4b72577.jpg",
                    "img/room/f78d412.jpg",
                    "img/room/8d7b83a.jpg",
                    "img/room/304c4d0.jpg"
                ],
                "createdAt" => "2017-03-09T05:09:44.477Z",
                "updatedAt" => "2017-03-23T10:16:09.747Z"
            ],
            [
                "objectId" => "Zd7v0f1sA3",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "DxU21QEQ4F"
                ],
                "room_type" => "Deluxe Double",
                "short_desc" => "Room is 45 square metres and comes with a writing desk, a minibar and a flat-screen TV with cable channels. ",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "45",
                "bed_size" => "King",
                "num_of_guest" => 2,
                "num_rooms" => 2,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 170,
                "night_price2" => 170,
                "images" => [
                    "img/room/93bb026.jpg",
                    "img/room/8bdd7d3.jpg",
                    "img/room/f74901e.jpg",
                    "img/room/acc3695.jpg",
                    "img/room/c15554e.jpg"
                ],
                "createdAt" => "2017-03-09T05:14:59.961Z",
                "updatedAt" => "2017-03-23T10:07:05.833Z"
            ],
            [
                "objectId" => "c9WKDF9CY8",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "DxU21QEQ4F"
                ],
                "room_type" => "Superior Single",
                "short_desc" => "Room is 35 square metres and comes with a writing desk, a minibar and a flat-screen TV with cable channels. Features a s",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "35",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 10,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 120,
                "night_price2" => 120,
                "images" => [
                    "img/room/eadc8c9.jpg",
                    "img/room/9c23e62.jpg",
                    "img/room/7fba564.jpg",
                    "img/room/bb0d290.jpg"
                ],
                "createdAt" => "2017-03-09T05:21:05.245Z",
                "updatedAt" => "2017-03-23T10:06:13.586Z"
            ],
            [
                "objectId" => "Ia12JzDrx1",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "pMrBzqzgOE"
                ],
                "room_type" => "Economy",
                "short_desc" => "Desk, Carpeted, Clothes rack, Shower, Hairdryer, Toilet, Bathroom, Toilet paper, Telephone,free WiFi",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "22",
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "num_rooms" => 10,
                "child_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "night_price" => 80,
                "night_price2" => 0,
                "images" => [
                    "img/room/b0ab5b1.jpg"
                ],
                "createdAt" => "2017-03-09T07:14:10.120Z",
                "updatedAt" => "2017-03-13T03:42:29.472Z"
            ],
            [
                "objectId" => "0oa4IVXiBe",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "pMrBzqzgOE"
                ],
                "room_type" => "Standard Double",
                "short_desc" => "Mountain view, Landmark view, City view, Desk, Seating Area, Carpeted, Sofa, Clothes rack, Sofa bed, Tea/Coffee Maker, ",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "24",
                "bed_size" => "Full",
                "num_of_guest" => 2,
                "num_rooms" => 11,
                "child_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "night_price" => 140,
                "night_price2" => 160,
                "images" => [
                    "img/room/0c0d2c2.jpg",
                    "img/room/3258eaa.jpg",
                    "img/room/02477fc.jpg",
                    "img/room/28b81ca.jpg"
                ],
                "createdAt" => "2017-03-09T07:19:05.383Z",
                "updatedAt" => "2017-03-13T03:43:12.025Z"
            ],
            [
                "objectId" => "aT0tWA54Mb",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "pMrBzqzgOE"
                ],
                "room_type" => "Standart Twin ",
                "short_desc" => "Desk, Seating Area, Carpeted, Sofa, Clothes rack, Sofa bed, Shower, Hairdryer, Toilet, Bathroom, Toilet paper, ",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "24",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 35,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 140,
                "night_price2" => 160,
                "images" => [
                    "img/room/0650e74.jpg",
                    "img/room/0c42183.jpg"
                ],
                "createdAt" => "2017-03-09T07:30:22.251Z",
                "updatedAt" => "2017-03-13T03:44:08.135Z"
            ],
            [
                "objectId" => "5GEClGi6Pl",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "pMrBzqzgOE"
                ],
                "room_type" => "Superior",
                "short_desc" => "This twin room features a tea/coffee maker, seating area and sofa.",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "35",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 19,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 145,
                "night_price2" => 170,
                "images" => [
                    "img/room/ba7a456.jpg",
                    "img/room/cd246c5.jpg",
                    "img/room/c325c08.jpg",
                    "img/room/1705174.jpg",
                    "img/room/45c731b.jpg",
                    "img/room/0ab033a.jpg",
                    "img/room/90eb78d.jpg",
                    "img/room/7a1438f.jpg"
                ],
                "createdAt" => "2017-03-09T07:40:38.836Z",
                "updatedAt" => "2017-03-13T03:44:40.780Z"
            ],
            [
                "objectId" => "4Bm8BVwfDz",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "pMrBzqzgOE"
                ],
                "room_type" => "Business double",
                "short_desc" => "This double room has a minibar, seating area and sofa.",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "35",
                "bed_size" => "Full",
                "num_of_guest" => 2,
                "num_rooms" => 15,
                "child_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "night_price" => 170,
                "night_price2" => 195,
                "images" => [
                    "img/room/a2c1b2d.jpg",
                    "img/room/2a93bea.jpg",
                    "img/room/e97c96c.jpg",
                    "img/room/520194e.jpg",
                    "img/room/778f150.jpg"
                ],
                "createdAt" => "2017-03-09T08:04:08.048Z",
                "updatedAt" => "2017-03-13T03:45:19.447Z"
            ],
            [
                "objectId" => "yMKDAa7GaP",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "LGNBEg6Oqn"
                ],
                "room_type" => "Single room",
                "short_desc" => "Room comes with a minibar, a cable TV, an in-room safe, ironing facilities and an en suite bathroom.",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "29",
                "bed_size" => "King",
                "num_of_guest" => 2,
                "num_rooms" => 55,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 220,
                "night_price2" => 220,
                "images" => [
                    "img/room/1f8a023.jpg",
                    "img/room/c2998c4.jpg"
                ],
                "createdAt" => "2017-03-13T08:47:23.522Z",
                "updatedAt" => "2017-03-13T08:47:23.522Z"
            ],
            [
                "objectId" => "kcQJwv4LXX",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "LGNBEg6Oqn"
                ],
                "room_type" => "Standart Twin",
                "short_desc" => "Room comes with 2 single beds, a minibar, a cable TV, an in-room safe, ironing facilities and an en suite bathroom.",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "29",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 45,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 220,
                "night_price2" => 220,
                "images" => [
                    "img/room/c062e34.jpg",
                    "img/room/5be5aca.jpg",
                    "img/room/41d4bb6.jpg",
                    "img/room/72b0bc9.jpg"
                ],
                "createdAt" => "2017-03-13T08:51:08.946Z",
                "updatedAt" => "2017-03-13T08:51:08.946Z"
            ],
            [
                "objectId" => "ENsvEOTqdR",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "LGNBEg6Oqn"
                ],
                "room_type" => "Deluxe Single",
                "short_desc" => "Offering city views and river views, suite features a living room and a bedroom. It has a minibar, a cable TV etc..",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "35",
                "bed_size" => "Full",
                "num_of_guest" => 2,
                "num_rooms" => 30,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 320,
                "night_price2" => 320,
                "images" => [
                    "img/room/20016b1.jpg",
                    "img/room/af12dfd.jpg",
                    "img/room/dee4ffe.jpg",
                    "img/room/240a1a4.jpg"
                ],
                "createdAt" => "2017-03-13T08:57:34.120Z",
                "updatedAt" => "2017-03-13T08:57:34.120Z"
            ],
            [
                "objectId" => "6kDjP8rG1A",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Nf9Uc3GM0B"
                ],
                "room_type" => "Standart Single",
                "short_desc" => "This single room has a bathrobe, tea/coffee maker and tile/marble flooring.",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "20",
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "num_rooms" => 10,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 45,
                "night_price2" => 0,
                "images" => [
                    "img/room/a2aa0c4.jpg",
                    "img/room/aa2c1c8.jpg",
                    "img/room/59a1a6d.jpg",
                    "img/room/ed9ef84.jpg",
                    "img/room/47370a6.jpg"
                ],
                "createdAt" => "2017-03-13T09:56:36.104Z",
                "updatedAt" => "2017-03-13T09:56:36.104Z"
            ],
            [
                "objectId" => "u0TYuEAyQB",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Nf9Uc3GM0B"
                ],
                "room_type" => "Standart Twin",
                "short_desc" => "This twin room has a sofa, electric kettle and tea/coffee maker.",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "20",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 16,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 80,
                "night_price2" => 80,
                "images" => [
                    "img/room/1d9af71.jpg",
                    "img/room/039fa76.jpg",
                    "img/room/b6a8e35.jpg",
                    "img/room/bac169b.jpg"
                ],
                "createdAt" => "2017-03-13T10:00:38.262Z",
                "updatedAt" => "2017-03-13T10:00:38.262Z"
            ],
            [
                "objectId" => "WGrqAqGTDe",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Nf9Uc3GM0B"
                ],
                "room_type" => "Standart Triple",
                "short_desc" => "This triple room has a seating area, sofa and bathrobe.",
                "num_beds" => 3,
                "adult_occupancy" => 3,
                "roomt_size" => "25",
                "bed_size" => "Twin",
                "num_of_guest" => 3,
                "num_rooms" => 9,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bathtub"
                ],
                "night_price" => 90,
                "night_price2" => 90,
                "images" => [
                    "img/room/2a60766.jpg",
                    "img/room/2d7a61d.jpg",
                    "img/room/36ae443.jpg",
                    "img/room/5bacfb5.jpg"
                ],
                "createdAt" => "2017-03-13T10:03:34.582Z",
                "updatedAt" => "2017-03-13T10:03:34.582Z"
            ],
            [
                "objectId" => "SucUUILRop",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "IapAUJbbtO"
                ],
                "room_type" => "Deluxe Twin",
                "short_desc" => "This twin room has a tea/coffee maker, a sofa and a cable TV",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "46",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 44,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 180,
                "night_price2" => 180,
                "images" => [
                    "img/room/523cb05.jpg",
                    "img/room/2a42aa8.jpg",
                    "img/room/5858e32.jpg",
                    "img/room/a9004e5.jpg",
                    "img/room/ac6e07c.jpg"
                ],
                "createdAt" => "2017-03-13T10:22:55.897Z",
                "updatedAt" => "2017-03-13T10:22:55.897Z"
            ],
            [
                "objectId" => "7c1RzL7Lry",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "IapAUJbbtO"
                ],
                "room_type" => "Suite",
                "short_desc" => "This suite features a minibar, soundproofing and views.",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "62",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 7,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 190,
                "night_price2" => 190,
                "images" => [
                    "img/room/28aac68.jpg",
                    "img/room/3bf72bc.jpg",
                    "img/room/25c53f6.jpg",
                    "img/room/e395386.jpg",
                    "img/room/90e7478.jpg"
                ],
                "createdAt" => "2017-03-13T10:26:17.120Z",
                "updatedAt" => "2017-03-13T10:26:17.120Z"
            ],
            [
                "objectId" => "dXLJDXCm8F",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "BkZ0qlCeFj"
                ],
                "room_type" => "Single Room",
                "short_desc" => "1 large double bed.",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "27",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 109,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 180,
                "night_price2" => 180,
                "images" => [
                    "img/room/30350a7.jpg",
                    "img/room/5e151d6.jpg",
                    "img/room/0cc46ca.jpg",
                    "img/room/abcc96d.jpg",
                    "img/room/5976894.jpg",
                    "img/room/2a4d084.jpg",
                    "img/room/26a657f.jpg"
                ],
                "createdAt" => "2017-03-13T11:03:29.286Z",
                "updatedAt" => "2017-03-13T11:03:29.286Z"
            ],
            [
                "objectId" => "QHoJ1CaON9",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "BkZ0qlCeFj"
                ],
                "room_type" => "Twin",
                "short_desc" => "2 single beds,Safety Deposit Box, Iron, Desk, Ironing Facilities, Seating Area, Heating, Carpeted, Hairdryer, Toilet",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "27",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 13,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 200,
                "night_price2" => 200,
                "images" => [
                    "img/room/26b4831.jpg",
                    "img/room/665139b.jpg",
                    "img/room/d7fcc8e.jpg",
                    "img/room/a56637c.jpg"
                ],
                "createdAt" => "2017-03-13T11:08:01.437Z",
                "updatedAt" => "2017-03-13T11:08:01.437Z"
            ],
            [
                "objectId" => "simcFOUaic",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "BkZ0qlCeFj"
                ],
                "room_type" => "Deluxe Room",
                "short_desc" => "1 large double bed.Safety Deposit Box, Iron, Desk, Ironing Facilities, Seating Area, Heating, Carpeted",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "30",
                "bed_size" => "Queen",
                "num_of_guest" => 2,
                "num_rooms" => 25,
                "child_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "night_price" => 222,
                "night_price2" => 222,
                "images" => [
                    "img/room/05f2bde.jpg",
                    "img/room/6f4d8fa.jpg",
                    "img/room/99b1470.jpg",
                    "img/room/0aa7ebb.jpg"
                ],
                "createdAt" => "2017-03-13T11:11:47.709Z",
                "updatedAt" => "2017-03-13T11:11:47.709Z"
            ],
            [
                "objectId" => "h8Wz7kcGbu",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "RHOJrWZ1Xf"
                ],
                "room_type" => "Standart Double",
                "short_desc" => "Room is equipped with a work desk, a personal safe and satellite television.",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "33",
                "bed_size" => "Full",
                "num_of_guest" => 2,
                "num_rooms" => 2,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 160,
                "night_price2" => 180,
                "images" => [
                    "img/room/b83b2de.jpg",
                    "img/room/43621ae.jpg",
                    "img/room/974cf98.jpg",
                    "img/room/ad5ad28.jpg"
                ],
                "createdAt" => "2017-03-14T06:05:19.231Z",
                "updatedAt" => "2017-03-14T06:05:19.231Z"
            ],
            [
                "objectId" => "dpmyVYlGSv",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "RHOJrWZ1Xf"
                ],
                "room_type" => "Standard Twin",
                "short_desc" => "This double room features a bathrobe, seating area and air conditioning.",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "35",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 4,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 170,
                "night_price2" => 200,
                "images" => [
                    "img/room/a008475.jpg",
                    "img/room/d0c2f7c.jpg",
                    "img/room/6327e01.jpg"
                ],
                "createdAt" => "2017-03-14T06:08:42.669Z",
                "updatedAt" => "2017-03-14T06:08:42.669Z"
            ],
            [
                "objectId" => "0Kg0edYWWt",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "RHOJrWZ1Xf"
                ],
                "room_type" => "Apartment Double",
                "short_desc" => "Apartment features a full kitchen with a microwave and a fridge. Comes with laundry facilities, and work disk.",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "35",
                "bed_size" => "Queen",
                "num_of_guest" => 2,
                "num_rooms" => 7,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "kitchen"
                ],
                "night_price" => 190,
                "night_price2" => 230,
                "images" => [
                    "img/room/732a3cd.jpg",
                    "img/room/536ebff.jpg",
                    "img/room/10ef3bc.jpg"
                ],
                "createdAt" => "2017-03-14T06:14:28.931Z",
                "updatedAt" => "2017-03-14T06:14:28.931Z"
            ],
            [
                "objectId" => "Q5lHPzqHuK",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "l5gijIHl97"
                ],
                "room_type" => "Single",
                "short_desc" => "This single room has a minibar, a sofa and a TV with cable and satellite channels.A private bathroom is included as well",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "32",
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "num_rooms" => 13,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 58,
                "night_price2" => 58,
                "images" => [
                    "img/room/51d5d8b.jpg",
                    "img/room/d81ce5b.jpg",
                    "img/room/a613a28.jpg",
                    "img/room/af4863d.jpg"
                ],
                "createdAt" => "2017-03-14T07:08:57.852Z",
                "updatedAt" => "2017-03-14T07:08:57.852Z"
            ],
            [
                "objectId" => "anmsADjdDG",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "l5gijIHl97"
                ],
                "room_type" => "Twin room",
                "short_desc" => "This twin room has a minibar, a sofa and a refrigerator. Slippers, a hairdryer and free toiletries",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "32",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 8,
                "child_occupancy" => 1,
                "facilities" => [
                    "tv",
                    "bar"
                ],
                "night_price" => 71,
                "night_price2" => 71,
                "images" => [
                    "img/room/eb9564f.jpg",
                    "img/room/69c337c.jpg",
                    "img/room/71e6997.jpg",
                    "img/room/a8572f4.jpg",
                    "img/room/901539b.jpg"
                ],
                "createdAt" => "2017-03-14T07:12:36.035Z",
                "updatedAt" => "2017-03-14T07:12:36.035Z"
            ],
            [
                "objectId" => "7qGtVtpCW0",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "wccTtaXjHK"
                ],
                "room_type" => "Standart Double",
                "short_desc" => "This 35m2 sized room is city view, one double bed and private bathroom.",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "35",
                "bed_size" => "Full",
                "num_of_guest" => 2,
                "num_rooms" => 5,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 80,
                "night_price2" => 80,
                "createdAt" => "2017-03-14T08:01:58.628Z",
                "updatedAt" => "2017-03-14T08:01:58.628Z"
            ],
            [
                "objectId" => "Fk9lXxN6pw",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "wccTtaXjHK"
                ],
                "room_type" => "Standart Twin ",
                "short_desc" => "This 35m2 sized room has city view,in room safe box, desk and seating area",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "35",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 10,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 85,
                "night_price2" => 85,
                "images" => [
                    "img/room/5e9b73c.jpg",
                    "img/room/4fa295a.jpg",
                    "img/room/79d9c76.jpg"
                ],
                "createdAt" => "2017-03-14T08:07:08.267Z",
                "updatedAt" => "2017-03-14T08:07:08.267Z"
            ],
            [
                "objectId" => "e8tbLwCBfV",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "wccTtaXjHK"
                ],
                "room_type" => "Superior Twin",
                "short_desc" => "This 45m2 square room has soundproofing, separate shower and tub, In-room safe box.",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "45",
                "bed_size" => "Full",
                "num_of_guest" => 2,
                "num_rooms" => 11,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 100,
                "night_price2" => 100,
                "images" => [
                    "img/room/85835f3.jpg",
                    "img/room/7a116be.jpg",
                    "img/room/1b4711d.jpg",
                    "img/room/b10ad3c.jpg",
                    "img/room/f056911.jpg",
                    "img/room/ad47961.jpg",
                    "img/room/75e853d.jpg",
                    "img/room/224afef.jpg",
                    "img/room/8d3ae9b.jpg"
                ],
                "createdAt" => "2017-03-14T08:15:22.554Z",
                "updatedAt" => "2017-03-14T08:15:22.554Z"
            ],
            [
                "objectId" => "2ClJx9p6YG",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Lep9rKBu7r"
                ],
                "room_type" => "Single room",
                "short_desc" => "This 30 m2 room has one single bedroom, desk, flat screen TB and air condition. ",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "30",
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "num_rooms" => 12,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 45,
                "night_price2" => 45,
                "images" => [
                    "img/room/65a7b1a.jpg",
                    "img/room/5092259.jpg"
                ],
                "createdAt" => "2017-03-14T08:43:50.462Z",
                "updatedAt" => "2017-03-14T08:43:50.462Z"
            ],
            [
                "objectId" => "HX9FvY7AHx",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Lep9rKBu7r"
                ],
                "room_type" => "Twin Room",
                "short_desc" => "This 35 m2 room has two single bed, desk, flat screen TV and air condition. ",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "35",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 12,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 55,
                "night_price2" => 55,
                "images" => [
                    "img/room/4e5c096.jpg",
                    "img/room/3e960d3.jpg",
                    "img/room/d158289.jpg"
                ],
                "createdAt" => "2017-03-14T08:48:06.256Z",
                "updatedAt" => "2017-03-14T08:48:06.256Z"
            ],
            [
                "objectId" => "r3RprzFYVb",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "Lep9rKBu7r"
                ],
                "room_type" => "Deluxe ",
                "short_desc" => "This 35 m2 room has , desk, flat screen TV and air condition. ",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "35",
                "bed_size" => "Queen",
                "num_of_guest" => 2,
                "num_rooms" => 3,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 70,
                "night_price2" => 70,
                "images" => [
                    "img/room/437b2a9.jpg",
                    "img/room/fc8bd47.jpg",
                    "img/room/b5a43e4.jpg",
                    "img/room/e40fe26.jpg",
                    "img/room/ca4318b.jpg"
                ],
                "createdAt" => "2017-03-14T08:59:57.559Z",
                "updatedAt" => "2017-03-14T08:59:57.559Z"
            ],
            [
                "objectId" => "nCHzpDrShL",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "okUfa3droF"
                ],
                "room_type" => "Executive Deluxe Suite C",
                "short_desc" => ".These Executive Deluxe suites are definitely for people looking for true relaxation and comfort.",
                "num_beds" => 3,
                "adult_occupancy" => 4,
                "roomt_size" => "136",
                "bed_size" => "Queen",
                "num_of_guest" => 4,
                "num_rooms" => 1,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 500,
                "night_price2" => 500,
                "images" => [
                    "img/room/b89925c.jpg",
                    "img/room/c34c66e.jpg",
                    "img/room/1c040cc.jpg"
                ],
                "createdAt" => "2017-03-15T02:29:12.855Z",
                "updatedAt" => "2017-03-15T02:34:13.799Z"
            ],
            [
                "objectId" => "67rAdzExip",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "okUfa3droF"
                ],
                "room_type" => "Executive Deluxe Suite B",
                "short_desc" => "Distinguished by comfort, our luxurious one-of-a kind Executive Deluxe suites have been elegantly and stylishly decorate",
                "num_beds" => 3,
                "adult_occupancy" => 6,
                "roomt_size" => "186",
                "bed_size" => "Queen",
                "num_of_guest" => 6,
                "num_rooms" => 1,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub",
                    "kitchen"
                ],
                "night_price" => 750,
                "night_price2" => 750,
                "images" => [
                    "img/room/daf529a.jpg",
                    "img/room/e599a79.jpg",
                    "img/room/d9b8854.jpg"
                ],
                "createdAt" => "2017-03-15T02:41:09.279Z",
                "updatedAt" => "2017-03-15T02:41:09.279Z"
            ],
            [
                "objectId" => "8VpuQ0wqSD",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "okUfa3droF"
                ],
                "room_type" => "Executive Deluxe suite A",
                "short_desc" => "Stylish decor with living room, dining for eight, guest bath, kitchen, meeting and work area with two bedrooms.",
                "num_beds" => 4,
                "adult_occupancy" => 6,
                "roomt_size" => "194",
                "bed_size" => "Queen",
                "num_of_guest" => 6,
                "num_rooms" => 1,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub",
                    "kitchen"
                ],
                "night_price" => 1000,
                "night_price2" => 1000,
                "images" => [
                    "img/room/49c1b4b.jpg",
                    "img/room/50a7dbe.jpg",
                    "img/room/227008f.jpg",
                    "img/room/3cd7784.jpg"
                ],
                "createdAt" => "2017-03-15T02:47:47.386Z",
                "updatedAt" => "2017-03-15T02:47:47.386Z"
            ],
            [
                "objectId" => "X8ADmE14ud",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "okUfa3droF"
                ],
                "room_type" => "Standard twin",
                "short_desc" => "This twin room features air conditioning, minibar and hot tub.\r\n\r\n",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "35",
                "bed_size" => "King",
                "num_of_guest" => 2,
                "num_rooms" => 18,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 170,
                "night_price2" => 220,
                "images" => [
                    "img/room/df2df76.jpg",
                    "img/room/b17ea73.jpg"
                ],
                "createdAt" => "2017-03-15T02:50:22.672Z",
                "updatedAt" => "2017-03-15T02:51:08.428Z"
            ],
            [
                "objectId" => "7u0hG6yNZS",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "okUfa3droF"
                ],
                "room_type" => "Standard king ",
                "short_desc" => "This double room features a seating area, satellite TV and sofa.\r\n\r\n",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "30",
                "bed_size" => "King",
                "num_of_guest" => 2,
                "num_rooms" => 63,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub"
                ],
                "night_price" => 170,
                "night_price2" => 200,
                "images" => [
                    "img/room/f0b0e08.jpg",
                    "img/room/b8a5f22.jpg"
                ],
                "createdAt" => "2017-03-15T02:52:54.276Z",
                "updatedAt" => "2017-03-15T02:53:32.533Z"
            ],
            [
                "objectId" => "4bD67Qh7AJ",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "okUfa3droF"
                ],
                "room_type" => "Deluxe Single",
                "short_desc" => "This apartment has a seating area, kitchenette and hot tub.",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "35",
                "bed_size" => "King",
                "num_of_guest" => 2,
                "num_rooms" => 8,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "bathtub",
                    "kitchen"
                ],
                "night_price" => 190,
                "night_price2" => 260,
                "images" => [
                    "img/room/58f28a1.jpg",
                    "img/room/7168a05.jpg",
                    "img/room/f3e41f0.jpg"
                ],
                "createdAt" => "2017-03-15T02:54:54.311Z",
                "updatedAt" => "2017-03-15T02:54:54.311Z"
            ],
            [
                "objectId" => "CR6QuBWNN4",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "ZPqQ2wU3mh"
                ],
                "room_type" => "Standart Double",
                "short_desc" => "This double room features a electric kettle, cable TV, Mountain and Landmark view, Hot Tub, Desk, Refrigerator, minibar ",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "20",
                "bed_size" => "Full",
                "num_of_guest" => 2,
                "num_rooms" => 10,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 50,
                "night_price2" => 50,
                "images" => [
                    "img/room/e5544cf.jpg",
                    "img/room/9fd2842.jpg",
                    "img/room/1062469.jpg",
                    "img/room/f5ceb25.jpg"
                ],
                "createdAt" => "2017-03-15T03:00:17.542Z",
                "updatedAt" => "2017-03-23T10:21:06.923Z"
            ],
            [
                "objectId" => "JZHQwJobsh",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "ZPqQ2wU3mh"
                ],
                "room_type" => "Standard Twin",
                "short_desc" => "Mountain and Landmark view, Hot Tub, Desk, Clothes rack, Shower, Slippers, Minibar, Refrigerator, Electric kettle",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "20",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 5,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 60,
                "night_price2" => 60,
                "images" => [
                    "img/room/cc829dd.jpg",
                    "img/room/8ce5c30.jpg",
                    "img/room/8bb5b19.jpg",
                    "img/room/3292695.jpg"
                ],
                "createdAt" => "2017-03-15T03:04:26.534Z",
                "updatedAt" => "2017-03-23T10:21:45.088Z"
            ],
            [
                "objectId" => "mW7d8S3sHY",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "ZPqQ2wU3mh"
                ],
                "room_type" => "Deluxe Double",
                "short_desc" => "Mountain,Landmark and Riverview, Hot Tub, Desk,Seating Area, Extra Long Beds, Heating, Sofa, Hairdryer,Refrigerator",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "25",
                "bed_size" => "Full",
                "num_of_guest" => 1,
                "num_rooms" => 1,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 60,
                "night_price2" => 60,
                "images" => [
                    "img/room/beb2588.jpg",
                    "img/room/a0b3102.jpg",
                    "img/room/c309a47.jpg",
                    "img/room/6a57562.jpg",
                    "img/room/4405d23.jpg"
                ],
                "createdAt" => "2017-03-15T03:09:04.336Z",
                "updatedAt" => "2017-03-23T10:22:32.076Z"
            ],
            [
                "objectId" => "TiqeDo6RdC",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "mbRE0ir9Hq"
                ],
                "room_type" => "Single Room",
                "short_desc" => "This single room has an one single bed, satellite TV, minibar and air conditioning.",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "35",
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "num_rooms" => 10,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 95,
                "night_price2" => 95,
                "images" => [
                    "img/room/9ad0215.jpg"
                ],
                "createdAt" => "2017-03-15T04:35:17.381Z",
                "updatedAt" => "2017-03-15T04:35:17.381Z"
            ],
            [
                "objectId" => "NUAWRszpTH",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "mbRE0ir9Hq"
                ],
                "room_type" => "Twin Room",
                "short_desc" => "This twin room features a bathrobe, flat-screen TV and air conditioning.",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "35",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 26,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 135,
                "night_price2" => 135,
                "images" => [
                    "img/room/952a9ae.jpg",
                    "img/room/497f3d7.jpg",
                    "img/room/81451cc.jpg"
                ],
                "createdAt" => "2017-03-15T04:38:01.007Z",
                "updatedAt" => "2017-03-15T04:38:01.007Z"
            ],
            [
                "objectId" => "BtJkjf2kpN",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "mbRE0ir9Hq"
                ],
                "room_type" => "Deluxe Double",
                "short_desc" => "This double room features a cable TV, bathrobe and minibar.",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "40",
                "bed_size" => "Full",
                "num_of_guest" => 2,
                "num_rooms" => 10,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 240,
                "night_price2" => 240,
                "images" => [
                    "img/room/38f09b6.jpg",
                    "img/room/f60b285.jpg",
                    "img/room/a77a208.jpg"
                ],
                "createdAt" => "2017-03-15T04:41:37.801Z",
                "updatedAt" => "2017-03-15T04:41:37.801Z"
            ],
            [
                "objectId" => "MhDWEG2dEr",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "vkbW6u2w1b"
                ],
                "room_type" => "Presidential Suite",
                "short_desc" => "With luxurious furnishings and decoration, the spacious suite is consisted of 2 separate rooms. ",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "110",
                "bed_size" => "King",
                "num_of_guest" => 1,
                "num_rooms" => 1,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 1250,
                "night_price2" => 1250,
                "images" => [
                    "img/room/99c76db.jpg",
                    "img/room/8b3bc9f.jpg",
                    "img/room/62546ad.jpg"
                ],
                "createdAt" => "2017-03-15T05:09:32.210Z",
                "updatedAt" => "2017-03-15T05:09:32.210Z"
            ],
            [
                "objectId" => "QKAoGlvhxp",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "HpVQMeEaQN"
                ],
                "room_type" => "Single Room",
                "short_desc" => "1 extra-large double bed.Free WiFi is available in all rooms.",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "40",
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "num_rooms" => 50,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 170,
                "night_price2" => 170,
                "images" => [
                    "img/room/9fe1c76.jpg",
                    "img/room/a96566d.jpg",
                    "img/room/41687af.jpg",
                    "img/room/2699c6e.jpg"
                ],
                "createdAt" => "2017-03-15T06:53:00.554Z",
                "updatedAt" => "2017-03-23T10:24:55.123Z"
            ],
            [
                "objectId" => "W8s073ObMv",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "HpVQMeEaQN"
                ],
                "room_type" => "Twin Room",
                "short_desc" => " 2 single beds. Free WiFi is available in all rooms.",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "40",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 10,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 170,
                "night_price2" => 170,
                "images" => [
                    "img/room/06443a8.jpg",
                    "img/room/42f4ac3.jpg",
                    "img/room/80236c2.jpg",
                    "img/room/117b295.jpg"
                ],
                "createdAt" => "2017-03-15T06:55:26.377Z",
                "updatedAt" => "2017-03-23T10:26:07.284Z"
            ],
            [
                "objectId" => "OF0EsKjQjh",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "T4W38th1Ki"
                ],
                "room_type" => "Single Room",
                "short_desc" => "Room comes with a coffee machine, a minibar and free toiletries.",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "39",
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "num_rooms" => 25,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 110,
                "night_price2" => 110,
                "images" => [
                    "img/room/5ded081.jpg",
                    "img/room/54d9002.jpg",
                    "img/room/61446e2.jpg"
                ],
                "createdAt" => "2017-03-15T07:24:00.000Z",
                "updatedAt" => "2017-03-15T07:25:13.025Z"
            ],
            [
                "objectId" => "EOM87BWfkN",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "T4W38th1Ki"
                ],
                "room_type" => "Twin Room",
                "short_desc" => "Room comes with a coffee machine, a minibar and free toiletries.",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "36",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 25,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 110,
                "night_price2" => 130,
                "images" => [
                    "img/room/9d83b5f.jpg",
                    "img/room/45a6231.jpg",
                    "img/room/4cf2b3c.jpg"
                ],
                "createdAt" => "2017-03-15T07:31:08.360Z",
                "updatedAt" => "2017-03-15T07:31:57.740Z"
            ],
            [
                "objectId" => "aVMo7pcHtJ",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "T4W38th1Ki"
                ],
                "room_type" => "Deluxe Room",
                "short_desc" => "2 double beds. Spacious room comes with a coffee machine, a minibar and free toiletries. ",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "59",
                "bed_size" => "Full",
                "num_of_guest" => 1,
                "num_rooms" => 60,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 150,
                "night_price2" => 180,
                "images" => [
                    "img/room/6702855.jpg",
                    "img/room/36b557a.jpg",
                    "img/room/8afbbad.jpg",
                    "img/room/55ce249.jpg"
                ],
                "createdAt" => "2017-03-15T07:35:06.972Z",
                "updatedAt" => "2017-03-15T07:35:06.972Z"
            ],
            [
                "objectId" => "EXB1H2kpY7",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "IIxT9gAdBW"
                ],
                "room_type" => "Single Room",
                "short_desc" => "1 extra-large double bed. This double room features a satellite TV, minibar and air conditioning.",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "28",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 8,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 120,
                "night_price2" => 120,
                "images" => [
                    "img/room/94eefc1.jpg",
                    "img/room/f71cf4f.jpg",
                    "img/room/1e8d474.jpg",
                    "img/room/769b4df.jpg"
                ],
                "createdAt" => "2017-03-15T08:04:49.926Z",
                "updatedAt" => "2017-03-15T08:04:49.926Z"
            ],
            [
                "objectId" => "APQfRMwjXa",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "IIxT9gAdBW"
                ],
                "room_type" => "Twin Room",
                "short_desc" => "2 large double beds. This twin room features air conditioning, minibar and tumble dryer.",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "30",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 16,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 130,
                "night_price2" => 130,
                "images" => [
                    "img/room/d4360b9.jpg",
                    "img/room/e3b2a8b.jpg",
                    "img/room/d3d3998.jpg"
                ],
                "createdAt" => "2017-03-15T08:07:12.071Z",
                "updatedAt" => "2017-03-15T08:07:12.071Z"
            ],
            [
                "objectId" => "sqsCchRtep",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "IIxT9gAdBW"
                ],
                "room_type" => "Deluxe Room",
                "short_desc" => "The 40m² Deluxe Suite is meticulously designed to make guests feel instantly comfortable in unfamiliar space. ",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "40",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 4,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 200,
                "night_price2" => 200,
                "images" => [
                    "img/room/92d0a8c.jpg",
                    "img/room/35cc405.jpg",
                    "img/room/d544c56.jpg",
                    "img/room/16fe958.jpg",
                    "img/room/c4e9476.jpg"
                ],
                "createdAt" => "2017-03-15T08:09:35.454Z",
                "updatedAt" => "2017-03-15T08:09:35.454Z"
            ],
            [
                "objectId" => "xA304sSkqX",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "6SVQLUxbNH"
                ],
                "room_type" => "Single Room",
                "short_desc" => "23m2 sized room has one single bed, air condition and flat screen TV. ",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "23",
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "num_rooms" => 3,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 70,
                "night_price2" => 70,
                "images" => [
                    "img/room/0819cd8.jpg",
                    "img/room/6a314e4.jpg"
                ],
                "createdAt" => "2017-03-16T07:21:10.236Z",
                "updatedAt" => "2017-03-21T01:31:43.129Z"
            ],
            [
                "objectId" => "jgZuTEpDT8",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "6SVQLUxbNH"
                ],
                "room_type" => "Twin Room",
                "short_desc" => "This room has two single bed.",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "23",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 7,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 80,
                "night_price2" => 80,
                "images" => [
                    "img/room/a3acf6e.jpg",
                    "img/room/84011fb.jpg",
                    "img/room/9b863e5.jpg",
                    "img/room/7ff0cc8.jpg"
                ],
                "createdAt" => "2017-03-16T07:28:33.250Z",
                "updatedAt" => "2017-03-21T01:32:34.551Z"
            ],
            [
                "objectId" => "lRngpMacvr",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "6SVQLUxbNH"
                ],
                "room_type" => "Deluxe Room",
                "short_desc" => "Deluxe room with an one double bed, air condition and flat screein TV.",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "47",
                "bed_size" => "Full",
                "num_of_guest" => 2,
                "num_rooms" => 4,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 100,
                "night_price2" => 100,
                "images" => [
                    "img/room/560c39d.jpg",
                    "img/room/67dcdc3.jpg",
                    "img/room/eb60647.jpg",
                    "img/room/3fbeb9e.jpg"
                ],
                "createdAt" => "2017-03-17T03:29:04.305Z",
                "updatedAt" => "2017-03-21T01:34:10.171Z"
            ],
            [
                "objectId" => "xmsxaJLHpG",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "VtqeF8HOru"
                ],
                "room_type" => "Single Room",
                "short_desc" => "This features carpeted flooring, 1 single bed, a flat-screen TV with cable and satellite channels, and seating area.",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "25",
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "num_rooms" => 3,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 65,
                "night_price2" => 0,
                "images" => [
                    "img/room/9cc6177.jpg",
                    "img/room/09b8f7e.jpg",
                    "img/room/4c0913e.jpg",
                    "img/room/ae47a9d.jpg",
                    "img/room/e122f92.jpg"
                ],
                "createdAt" => "2017-03-17T03:42:45.184Z",
                "updatedAt" => "2017-03-17T03:42:45.184Z"
            ],
            [
                "objectId" => "iQaNFWsSJq",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "VtqeF8HOru"
                ],
                "room_type" => "Twin Room ",
                "short_desc" => "This features carpeted flooring, 2 single beds, a flat-screen TV with cable and satellite channels, and seating area.",
                "num_beds" => 2,
                "adult_occupancy" => 2,
                "roomt_size" => "25",
                "bed_size" => "Twin",
                "num_of_guest" => 2,
                "num_rooms" => 18,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bathtub"
                ],
                "night_price" => 65,
                "night_price2" => 65,
                "images" => [
                    "img/room/b0d17bb.jpg",
                    "img/room/51bb235.jpg",
                    "img/room/29972cb.jpg",
                    "img/room/a646d23.jpg"
                ],
                "createdAt" => "2017-03-17T03:45:05.329Z",
                "updatedAt" => "2017-03-17T03:45:05.329Z"
            ],
            [
                "objectId" => "aOVag00DnF",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "VtqeF8HOru"
                ],
                "room_type" => "Deluxe Room",
                "short_desc" => "This room features carpeted flooring, a flat-screen TV with cable and satellite channels and seating area",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "30",
                "bed_size" => "Full",
                "num_of_guest" => 1,
                "num_rooms" => 5,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 100,
                "night_price2" => 100,
                "images" => [
                    "img/room/1bc5a19.jpg",
                    "img/room/d932fbb.jpg",
                    "img/room/b23b189.jpg",
                    "img/room/5d759df.jpg"
                ],
                "createdAt" => "2017-03-17T03:48:50.466Z",
                "updatedAt" => "2017-03-17T03:48:50.466Z"
            ],
            [
                "objectId" => "6Qk2arkZwH",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "SF6X33fDlr"
                ],
                "room_type" => "Deluxe Single",
                "short_desc" => "This single room ",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "25",
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "num_rooms" => 1,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 1,
                "night_price2" => 1,
                "images" => [
                    "img/room/41ee8b9.jpg"
                ],
                "createdAt" => "2017-03-17T04:50:06.135Z",
                "updatedAt" => "2017-03-17T04:50:06.135Z"
            ],
            [
                "objectId" => "zhQZCQNyMv",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "XGg1Qkvise"
                ],
                "room_type" => "Deluxe Single",
                "short_desc" => "One single bed",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "25",
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "num_rooms" => 1,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 1,
                "night_price2" => 1,
                "images" => [
                    "img/room/ab30d52.jpg",
                    "img/room/aa266e3.jpg"
                ],
                "createdAt" => "2017-03-17T05:20:07.061Z",
                "updatedAt" => "2017-03-17T05:20:07.061Z"
            ],
            [
                "objectId" => "LbhGo1vV7e",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "01HmsDwMJH"
                ],
                "room_type" => "Standart Single",
                "short_desc" => "This single room has a bathrobe, air conditioning and microwave.",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "20",
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "num_rooms" => 1,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 1,
                "night_price2" => 1,
                "images" => [
                    "img/room/03fde55.jpg"
                ],
                "createdAt" => "2017-03-17T06:01:37.927Z",
                "updatedAt" => "2017-03-17T06:01:37.927Z"
            ],
            [
                "objectId" => "ynTd6qDLDS",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "sVGJbMV2CK"
                ],
                "room_type" => "Deluxe Single",
                "short_desc" => "Deluxe single room",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "20",
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "num_rooms" => 1,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv"
                ],
                "night_price" => 1,
                "night_price2" => 1,
                "images" => [
                    "img/room/43064d7.jpg",
                    "img/room/0a1ba7d.jpg"
                ],
                "createdAt" => "2017-03-17T06:51:18.391Z",
                "updatedAt" => "2017-03-17T07:05:04.830Z"
            ],
            [
                "objectId" => "ipbBSUSIXA",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "GnwEdGgGir"
                ],
                "room_type" => "Deluxe Single",
                "short_desc" => "In the room refrigerator, minibar and seating area ",
                "num_beds" => 1,
                "adult_occupancy" => 1,
                "roomt_size" => "20",
                "bed_size" => "Twin",
                "num_of_guest" => 1,
                "num_rooms" => 1,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar"
                ],
                "night_price" => 1,
                "night_price2" => 1,
                "images" => [
                    "img/room/c949dfb.jpg"
                ],
                "createdAt" => "2017-03-21T02:45:07.737Z",
                "updatedAt" => "2017-03-21T02:45:07.737Z"
            ],
            [
                "objectId" => "D3HS7VWDKB",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "iSVy1K1unu"
                ],
                "room_type" => "Deluxe Double",
                "short_desc" => "This twin/double room features a balcony, seating area and dining area.",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "50",
                "bed_size" => "King",
                "num_of_guest" => 2,
                "num_rooms" => 4,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bar",
                    "patio"
                ],
                "night_price" => 89,
                "night_price2" => 89,
                "images" => [
                    "img/room/61c3dd5.jpg",
                    "img/room/5034a87.jpg"
                ],
                "createdAt" => "2017-03-21T04:42:14.044Z",
                "updatedAt" => "2017-03-21T04:42:14.044Z"
            ],
            [
                "objectId" => "Y1BGFswCrg",
                "hotel" => [
                    "__type" => "Pointer",
                    "className" => "hotel",
                    "objectId" => "KT9mMO9v30"
                ],
                "room_type" => "Deluxe king",
                "short_desc" => "This double room has an electric kettle, minibar, and air conditioning.",
                "num_beds" => 1,
                "adult_occupancy" => 2,
                "roomt_size" => "40",
                "bed_size" => "King",
                "num_of_guest" => 2,
                "num_rooms" => 30,
                "child_occupancy" => 1,
                "facilities" => [
                    "air",
                    "tv",
                    "bathtub"
                ],
                "night_price" => 200,
                "night_price2" => 200,
                "images" => [
                    "img/room/f93a022.jpg",
                    "img/room/839ec38.jpg"
                ],
                "createdAt" => "2017-05-05T05:04:46.696Z",
                "updatedAt" => "2017-05-05T05:04:46.696Z"
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
        Schema::dropIfExists('rooms');
    }
}
