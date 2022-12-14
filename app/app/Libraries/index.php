<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\User;
function splitName()
{
    $countryList = [
        "Afghanistan",
        "Albania",
        "Algeria",
        "American Samoa",
        "Andorra",
        "Angola",
        "Anguilla",
        "Antarctica",
        "Antigua and Barbuda",
        "Argentina",
        "Armenia",
        "Aruba",
        "Australia",
        "Austria",
        "Azerbaijan",
        "Bahamas (the)",
        "Bahrain",
        "Bangladesh",
        "Barbados",
        "Belarus",
        "Belgium",
        "Belize",
        "Benin",
        "Bermuda",
        "Bhutan",
        "Bolivia (Plurinational State of)",
        "Bonaire, Sint Eustatius and Saba",
        "Bosnia and Herzegovina",
        "Botswana",
        "Bouvet Island",
        "Brazil",
        "British Indian Ocean Territory (the)",
        "Brunei Darussalam",
        "Bulgaria",
        "Burkina Faso",
        "Burundi",
        "Cabo Verde",
        "Cambodia",
        "Cameroon",
        "Canada",
        "Cayman Islands (the)",
        "Central African Republic (the)",
        "Chad",
        "Chile",
        "China",
        "Christmas Island",
        "Cocos (Keeling) Islands (the)",
        "Colombia",
        "Comoros (the)",
        "Congo (the Democratic Republic of the)",
        "Congo (the)",
        "Cook Islands (the)",
        "Costa Rica",
        "Croatia",
        "Cuba",
        "Curaçao",
        "Cyprus",
        "Czechia",
        "Côte d'Ivoire",
        "Denmark",
        "Djibouti",
        "Dominica",
        "Dominican Republic (the)",
        "Ecuador",
        "Egypt",
        "El Salvador",
        "Equatorial Guinea",
        "Eritrea",
        "Estonia",
        "Eswatini",
        "Ethiopia",
        "Falkland Islands (the) [Malvinas]",
        "Faroe Islands (the)",
        "Fiji",
        "Finland",
        "France",
        "French Guiana",
        "French Polynesia",
        "French Southern Territories (the)",
        "Gabon",
        "Gambia (the)",
        "Georgia",
        "Germany",
        "Ghana",
        "Gibraltar",
        "Greece",
        "Greenland",
        "Grenada",
        "Guadeloupe",
        "Guam",
        "Guatemala",
        "Guernsey",
        "Guinea",
        "Guinea-Bissau",
        "Guyana",
        "Haiti",
        "Heard Island and McDonald Islands",
        "Holy See (the)",
        "Honduras",
        "Hong Kong",
        "Hungary",
        "Iceland",
        "India",
        "Indonesia",
        "Iran (Islamic Republic of)",
        "Iraq",
        "Ireland",
        "Isle of Man",
        "Israel",
        "Italy",
        "Jamaica",
        "Japan",
        "Jersey",
        "Jordan",
        "Kazakhstan",
        "Kenya",
        "Kiribati",
        "Korea (the Democratic People's Republic of)",
        "Korea (the Republic of)",
        "Kuwait",
        "Kyrgyzstan",
        "Lao People's Democratic Republic (the)",
        "Latvia",
        "Lebanon",
        "Lesotho",
        "Liberia",
        "Libya",
        "Liechtenstein",
        "Lithuania",
        "Luxembourg",
        "Macao",
        "Madagascar",
        "Malawi",
        "Malaysia",
        "Maldives",
        "Mali",
        "Malta",
        "Marshall Islands (the)",
        "Martinique",
        "Mauritania",
        "Mauritius",
        "Mayotte",
        "Mexico",
        "Micronesia (Federated States of)",
        "Moldova (the Republic of)",
        "Monaco",
        "Mongolia",
        "Montenegro",
        "Montserrat",
        "Morocco",
        "Mozambique",
        "Myanmar",
        "Namibia",
        "Nauru",
        "Nepal",
        "Netherlands (the)",
        "New Caledonia",
        "New Zealand",
        "Nicaragua",
        "Niger (the)",
        "Nigeria",
        "Niue",
        "Norfolk Island",
        "Northern Mariana Islands (the)",
        "Norway",
        "Oman",
        "Pakistan",
        "Palau",
        "Palestine, State of",
        "Panama",
        "Papua New Guinea",
        "Paraguay",
        "Peru",
        "Philippines (the)",
        "Pitcairn",
        "Poland",
        "Portugal",
        "Puerto Rico",
        "Qatar",
        "Republic of North Macedonia",
        "Romania",
        "Russian Federation (the)",
        "Rwanda",
        "Réunion",
        "Saint Barthélemy",
        "Saint Helena, Ascension and Tristan da Cunha",
        "Saint Kitts and Nevis",
        "Saint Lucia",
        "Saint Martin (French part)",
        "Saint Pierre and Miquelon",
        "Saint Vincent and the Grenadines",
        "Samoa",
        "San Marino",
        "Sao Tome and Principe",
        "Saudi Arabia",
        "Senegal",
        "Serbia",
        "Seychelles",
        "Sierra Leone",
        "Singapore",
        "Sint Maarten (Dutch part)",
        "Slovakia",
        "Slovenia",
        "Solomon Islands",
        "Somalia",
        "South Africa",
        "South Georgia and the South Sandwich Islands",
        "South Sudan",
        "Spain",
        "Sri Lanka",
        "Sudan (the)",
        "Suriname",
        "Svalbard and Jan Mayen",
        "Sweden",
        "Switzerland",
        "Syrian Arab Republic",
        "Taiwan",
        "Tajikistan",
        "Tanzania, United Republic of",
        "Thailand",
        "Timor-Leste",
        "Togo",
        "Tokelau",
        "Tonga",
        "Trinidad and Tobago",
        "Tunisia",
        "Turkey",
        "Turkmenistan",
        "Turks and Caicos Islands (the)",
        "Tuvalu",
        "Uganda",
        "Ukraine",
        "United Arab Emirates (the)",
        "United Kingdom of Great Britain and Northern Ireland (the)",
        "United States Minor Outlying Islands (the)",
        "United States of America (the)",
        "Uruguay",
        "Uzbekistan",
        "Vanuatu",
        "Venezuela (Bolivarian Republic of)",
        "Viet Nam",
        "Virgin Islands (British)",
        "Virgin Islands (U.S.)",
        "Wallis and Futuna",
        "Western Sahara",
        "Yemen",
        "Zambia",
        "Zimbabwe",
        "Åland Islands"
    ];
    $data = [
        "countries"         =>  $countryList,
    ];
    return $data;
}

function runRawQuery($query)
{
    return DB::select($query);
}

function authanticateUser($email)
{
    return DB::table("users")->where("email", $email)->first();
}

function getLimitedData($table, $limit)
{
    return DB::table($table)->limit($limit)->get();
}

function getPages($table, $pages)
{
    return DB::table($table)->paginate($pages);
}

function getDataFromThreeTables($table1, $table2, $table3, $foreignKey1, $foreignKey2, $id2, $id3, $ex1, $ex2 = 0, $ex3 = 0, $ex4 = 0)
{

    if ($ex4 == 0) {
        return DB::table($table1)->leftJoin($table2, $foreignKey1, $id2)
            ->leftJoin($table3, $foreignKey2, $id3)
            ->select($ex1, $ex2, $ex3)->get();
    }

    if ($ex3 == 0) {
        return DB::table($table1)->leftJoin($table2, $foreignKey1, $id2)
            ->leftJoin($table3, $foreignKey2, $id3)
            ->select($ex1, $ex2)->get();
    }

    if ($ex2 == 0) {
        return DB::table($table1)->leftJoin($table2, $foreignKey1, $id2)
            ->leftJoin($table3, $foreignKey2, $id3)
            ->select($ex1)->get();
    }

    return DB::table($table1)->leftJoin($table2, $foreignKey1, $id2)
        ->leftJoin($table3, $foreignKey2, $id3)
        ->select($ex1, $ex2, $ex3, $ex4)->get();
}

/**
 * getAllData function returns collection of array of given table
 *
 * @param  table Name of table
 * @return Array Mutiple Data
 */
function getAllData($table)
{
    return DB::table($table)->get();
}

/**
 * saveRecord function inserts the data you're giving and returns boolean(True / False)
 *
 * @param  Array This is array of data which you're inserting
 * @return Boolean True / False
 */
function insertRecord($table, $array)
{
    return DB::table($table)->insert($array);
}

/**
 * insertGetId function returns id of record which you're inserting right now
 *
 * @param  Array This is array of data which you're inserting
 * @return ID Of newly inserted data
 */
function insertGetId($table, $array)
{
    return DB::table($table)->insertGetId($array);
}

/**
 * getRow function returns single record from table if your given id is matched
 *
 * @param  column This is column name, this will be used in where clause
 * @return Object Single row
 */
function getRow($table, $column, $val)
{
    return DB::table($table)->where($column, $val)->first();
}

/**
 * updateRecord function updates single row in table and returns boolean(True / False)
 *
 * @param  column This is column name, this will be used in where clause
 * @return Booloan True / False
 */
function updateRecord($table, $column, $val, $array)
{
    return DB::table($table)->where($column, $val)->update($array);
}


function pluckForeignId($table, $id, $column)
{
    return DB::table($table)->where('id', $id)->pluck($column)->first();
}
/**
 * deleteRecord function deletes single row from table and returns boolean(True / False)
 *
 * @param  column This is column name, this will be used in where clause
 * @return Booloan True / False
 */
function deleteRecord($table, $column, $val)
{
    return DB::table($table)->where($column, $val)->delete();
}

/**
 * deleteMultipleRecord function deletes multiple rows from table and returns boolean(True / False)
 *
 * @param  column This is column name, this will be used in where clause
 * @return Booloan True / False
 */
function deleteMultipleRecord($table, $column, $array)
{
    return DB::table($table)->whereIn($column, $array)->delete();
}

/**
 * encryptId function encrypts given value and returns Encrypted Value
 *
 * @param  val Plain Text
 * @return value Encrypted Value
 */
function encryptId($val)
{
    return Crypt::encrypt($val);
}

/**
 * decryptId function dencrypts given value and returns plain text
 *
 * @param  val Encrypted Value
 * @return value Dencrypted / Plain Text
 */
function decryptId($val)
{
    return Crypt::decrypt($val);
}

/**
 * hashEncryptPassword function encrypts password and returns hashed value
 *
 * @param  password Plain Text
 * @return HashedValue Encrypted
 */
function hashEncryptPassword($password)
{
    return Hash::make($password);
}

/**
 * hashEncryptCheckPassword function checks encrypted password and return boolean
 *
 * @param  plainText Entered Password
 * @return Boolean
 */
function hashEncryptCheckPassword($plainText, $hashedText)
{
    return Hash::check($plainText, $hashedText);
}

function logoutUser($key)
{
    session()->forget($key);
}

/**
 * postValue function posts value from POST request
 *
 * @param  val request
 * @return requestOfPost
 */
function postValue($val = NULL)
{
    if ($val == NULL) {
        return $_POST;
    }
    return $_POST[$val];
}

/**
 * getValue function gets value from GET request
 *
 * @param  val request
 * @return requestOfGet
 */
function getValue($val = NULL)
{
    if ($val == NULL) {
        return $_GET;
    }
    return $_GET[$val];
}


/**
 * uploadFile function uploads file and returns name of file
 *
 * @param  file variable
 * @return imageName
 */
function uploadFile($file, $folder)
{

    $name = NULL;
    if ($file != NULL) {
        $name = rand() . "." . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $name);
    }

    // $data = [
    //     'name'  =>  $name,
    //     'url'   =>  asset($folder,$name)
    // ];
    return $name;
}

// function generateImageUrl($file, $folder)
// {
//     $name = NULL;
//     if ($file != NULL) {
//         $name = rand() . "." . $file->getClientOriginalExtension();
//         $file->move(public_path($folder), $name);
//     }
//     return $name;
// }



function UpdateUploadedFile($file, $existingFile, $folder)
{
    $name = NULL;
    if ($file != NULL) {
        if ($existingFile != NULL) {
            unlink(public_path($folder . "/" . $existingFile));
        }
        $name = rand() . "." . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $name);
    } else {
        $name = $existingFile;
    }
    return $name;
}


function deleteImage($folder, $file)
{
    return unlink(public_path($folder . "/" . $file));
}
/**
 * uploadMultipleFiles function uploads multiple files and returns json format of files which can be decoded and will return an assossiative array
 *
 * @param  files array
 * @return Json Json contain multiple uploaded files names
 */
function uploadMultipleFiles($files, $folder)
{
    $name = NULL;
    $arr = [];
    if ($files != NULL) {
        foreach ($files as $file) {
            $name = rand() . "_" . $file->getClientOriginalExtension();
            $file->move(public_path($folder), $name);
            array_push($arr, $name);
        }
    }
    return json_encode($arr);
}

function fetchImage($folder, $image)
{
    return asset($folder . '/' . $image);
}

function clearCache()
{
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
}

function runCommand($call)
{
    return Artisan::call($call);
}

function callRoute($method, $url, $controller, $class, $routeName = NULL)
{
    if ($routeName == NULL) {
        return Route::$method($url, 'App\Http\Controllers\"' . $controller . '"@' . $class);
    } else {
        return Route::$method($url, 'App\Http\Controllers\"' . $controller . '"@' . $class)->name($routeName);
    }
}


/**
 * sendEmail sends email notification to given email
 *
 * @param  toEmail Email will be sent to this email
 * @return subject Subject / Body of email
 * @return emailTemplate Design of your email. How you email will be look like when sent to others
 * @return data This is an array consist of data of $emailTemplate
 */
function sendEmail($toEmail, $subject, $emailTemplate, $data)
{
    $status = 0;
    $arr = [
        'to'        =>  $toEmail,
        'subject'   =>  $subject
    ];

    $sendMail = Mail::send($emailTemplate, $data, function ($message)  use ($arr) {
        $message->to($arr['to']);
        $message->subject($arr['subject']);
    });

    if ($sendMail) {
        $status = 200;
    }

    return $status;
}

function PayPalApi()
{
    return '<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>';
}

function dashboard()
{
    return url('/dashboard');
}

function notifications(){
    return auth()->user()->unreadNotifications;
}

function timeDiff($date){
    return $date->diffInMinutes(Carbon::now());
}

function approvalRequests()
{
    return User::where('approved',0)->latest()->get();
}
