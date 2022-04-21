<?php

declare(strict_types=1);

namespace App\Faker\Provider\en_KE;

class Address extends \Faker\Provider\en_US\Address
{
    protected static $cityFormats = [
        '{{cityName}}'
    ];

    /**
     * @link https://en.wikipedia.org/wiki/List_of_cities_and_towns_in_Kenya_by_population
     */
    protected static $cityName = [
        "Nairobi",
        "Mombasa",
        "Kisumu",
        "Nakuru",
        "Ruiru",
        "Eldoret",
        "Kikuyu",      "Thika",      "Meru", 	"Kangundo-Tala",     "Malindi",     "Naivasha",     "Kitui",     "Machakos",     "Mlolongo",     "Athi River (Mavoko)",     "Karuri",     "Nyeri",     "Kilifi",     "Garissa",     "Vihiga",     "Wote",     "Mumias",     "Bomet",     "Molo",     "Ngong",     "Kitale",     "Litein",     "Limuru",     "Kericho",     "Kimilili",     "Awasi",     "Kakamega",     "Kapsabet",     "Mariakani",     "Kiambu",     "Mandera",     "Nyamira",     "Mwingi",    "Kisii",     "Wajir",     "Rongo",     "Bungoma",     "Ahero",     "Nandi Hills",     "Makuyu",     "Kapenguria",     "Taveta",     "Narok",     "Ol Kalou",     "Kakuma",     "Webuye",     "Malaba", "Mbita Point",     "Ukunda",     "Wundanyi",     "Busia",     "Runyenjes",     "Migori",     "Malava",     "Suneka",     "Embu",     "Ogembo",  "Homa Bay",     "Lodwar",     "Kitengela",     "Ukwala",     "Keroka",     "Matuu",     "Oyugis",     "Nyahururu",     "Kipkelion",     "Luanda",     "Nanyuki",     "Maua",     "Mtwapa",     "Isiolo",     "Eldama Ravine",     "Voi",    "Siaya",    "Nyansiongo",     "Londiani",    "Iten/Tambach",    "Chuka",    "Malakisi",    "Juja",    "Ongata Rongai",    "Bondo",     "Moyale",     "Maralal",     "Gilgil", "Nambale",
        "Tabaka",
        "Muhoroni",
        "Kerugoya", "Kutus",
        "Ugunja",
        "Yala",
        "Rumuruti",     "Burnt Forest",
        "Maragua",
        "Kendu Bay ",
        "Ruai",
        "Kamulu",
    ];

    /**
     * @link https://en.wikipedia.org/wiki/Counties_of_Kenya
     */
    protected static $counties = [
        'Mombasa',
        'Kwale',
        'Kilifi',
        'Tana River',
        'Lamu',
        'Taita-Taveta',
        'Garissa',
        ' Wajir',
        'Mandera',
        'Marsabit',
        'Isiolo',
        'Meru',
        'Tharaka-Nithi',
        'Embu',
        'Kitui',
        'Machakos',
        'Makueni',
        'Nyandarua',
        'Nyeri',
        'Kirinyaga',
        'Murang\'a',
        'Kiambu',
        'Turkana',
        'West Pokot',
        'Samburu',
        'Trans Nzoia',
        'Uasin Gishu',
        'Elgeyo-Marakwet',
        'Nandi',
        'Baringo',
        'Laikipia',
        'Nakuru',
        'Narok',
        'Kajiado',
        'Kericho',
        'Bomet',
        'Kakamega',
        'Vihiga',
        'Bungoma',
        'Busia',
        'Siaya',
        'Kisumu',
        'Homa Bay',
        'Migori',
        'Kisii',
        'Nyamira',
        'Nairobi County',
    ];

    protected static $postcode = ['#', "##", "###", "####", "#####"];

    protected static $region = ['Central', 'Eastern', 'North Eastern', 'Western', 'Coastal', 'Rift Valley'];

    /**
     * @example 'Kangundo'
     */
    public static function cityName()
    {
        return static::randomElement(static::$cityName);
    }

    /**
     * @example 'Kisumu'
     */
    public static function county()
    {
        return static::randomElement(static::$counties);
    }

    /**
     * @example 'Eastern'
     */
    public static function region()
    {
        return static::randomElement(static::$region);
    }
}
