<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_category_id');
            $table->string('name');
            $table->string('name_en');
            $table->timestamps();
        });
        Schema::create('hotel_hotel_service', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->index();
            $table->integer('hotel_service_id')->index();
            $table->unique(['hotel_id', 'hotel_service_id']);
            $table->timestamps();
        });

        $array = [["Afghanistan","Åland Islands","Albania","Algeria","American Samoa","Andorra","Angola","Anguilla","Antarctica","Antigua and Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia, Plurinational State of","Bonaire, Sint Eustatius and Saba","Bosnia and Herzegovina","Botswana","Bouvet Island","Brazil","British Indian Ocean Territory","Brunei Darussalam","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central African Republic","Chad","Chile","China","Christmas Island","Cocos (Keeling) Islands","Colombia","Comoros","Congo","Congo, the Democratic Republic of the","Cook Islands","Costa Rica","Côte d'Ivoire","Croatia","Cuba","Curaçao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","English","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands (Malvinas)","Faroe Islands","Fiji","Finland","France","French Guiana","French Polynesia","French Southern Territories","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guadeloupe","Guam","Guatemala","Guernsey","Guinea","Guinea-Bissau","Guyana","Haiti","Heard Island and McDonald Islands","Holy See (Vatican City State)","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran, Islamic Republic of","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Korea, Democratic People's Republic of","Korea, Republic of","Kuwait","Kyrgyzstan","Lao People's Democratic Republic","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macao","Macedonia, the former Yugoslav Republic of","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Martinique","Mauritania","Mauritius","Mayotte","Mexico","Micronesia, Federated States of","Moldova, Republic of","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauru","Nepal","Netherlands","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","Niue","Norfolk Island","Northern Mariana Islands","Norway","Oman","Pakistan","Palau","Palestinian Territory, Occupied","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Pitcairn","Poland","Portugal","Puerto Rico","Qatar","Réunion","Romania","Russian Federation","Rwanda","Saint Barthélemy","Saint Helena, Ascension and Tristan da Cunha","Saint Kitts and Nevis","Saint Lucia","Saint Martin (French part)","Saint Pierre and Miquelon","Saint Vincent and the Grenadines","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Sint Maarten (Dutch part)","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Georgia and the South Sandwich Islands","South Sudan","Spain","Sri Lanka","Sudan","Suriname","Svalbard and Jan Mayen","Swaziland","Sweden","Switzerland","Syrian Arab Republic","Taiwan, Province of China","Tajikistan","Tanzania, United Republic of","Thailand","Timor-Leste","Togo","Tokelau","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan","Turks and Caicos Islands","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","United States Minor Outlying Islands","Uruguay","Uzbekistan","Vanuatu","Venezuela, Bolivarian Republic of","Viet Nam","Virgin Islands, British","Virgin Islands, U.S.","Wallis and Futuna","Western Sahara","Yemen","Zambia","Zimbabwe"],["Бялдаржуулах төв","Бильярд","Ширээний теннис"," Дартс"," Ханын теннис"," Боулинг"," Гольф","Явган аялах"," Дугуй унах"," Морь унах"," Бусад"],["Оройн үзвэр үйлчилгээ","Шөнийн клуб","Казино","Караоке","Хүүхдийн клуб","Хүүхдийн тоглоомын талбай","Хүүхэд асрагч","Халаалт","Агааржуулагч","Тамхигүй орчин","Тусгаарласан тамхины орчин","Тамхи татахыг хориглосон өрөө","Хөгжлийн бэрхшээлтэй зочидод зориулсан үйлчилгээ","Цахилгаан шат","Дуу тусгаарлагчтай өрөө","Хуримын багц","Люкс өрөөний үйлчилгээ"],["Баар","Буфет","Өглөөний цай (үнэгүй)","Өглөөний цай (төлбөртэй)","Савалгаатай өдрийн хоол","Амттаны автомат машин","Уух зүйлсийн автомат машин","Онцгой орцтой хоолны цэс","Өрөөний үйлчилгээ","Өрөөндөө авдаг өглөөний цай"],["Тээвэрлэлт cонгох","Машин түрээс","Ундаг дугуй түрээс","Онгоцноос тосох үйлчилгээ (нэмэлт төлбөртэй)","Онгоцноос тосох үйлчилгээ (үнэгүй)","Тосох үйлчилгээ (үнэгүй)","Тосох үйлчилгээ (төлбөртэй)","Бусад"],["Цэцэрлэгт хүрээлэн","Нийтийн гал тогоо","Нийтийн лоунж","Тоглоомын өрөө","Номын сан","Бунхан, онгон шүтээний газар","Бусад"],["Хими цэвэрлэгээ","Индүүдэх үйлчилгээ","Угаалга","Өдөр тутмын цэвэрлэгээ","Гутал тослох үйлчилгээ"],["Усан сан","Иллэг","Сувилал ба эрүүл мэндийн төв","Саун","Халуун ванн","Фитнесс төв"],["24 цагийн үйлчилгээ","Билет захиалга","Валют солих","ATM/бэлэн мөнгөний машин","Ачаа, тээш хадгалалт"],["Хурлын өрөө","Бизнес төв","Факс/канон"],["Мини маркет","Үсчин/гоо сайхны салон","Бэлэг дурсгалын дэлгүүр"]];

        foreach ($array as $key => $arraySet) {
            foreach ($arraySet as $item) {
                $service = new \App\HotelService;
                $service->service_category_id = $key + 1;
                $service->name = $item;
                $service->name_en = $item;
                $service->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_services');
        Schema::dropIfExists('hotel_hotel_service');
    }
}
