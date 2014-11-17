
<html>
<body>

<?php 

$today = date("M/D/Y");
// echo $today;
$weekday = date('l - F j', strtotime($today));
$achill= 685;
$ballybunion = 3701;
$bundoran = 50;
$dublin = 694;


   // $json1=file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=bundoran&key=AIzaSyCBa9HNzhKXsXl8EEHeEdZKACW9Cz6_0d8");
   // $data2 = json_decode($json1, true);
   // echo var_dump($data2);
 

// echo $data2['results'][0]['geometry']['location']['lat'];

 

 // Access the magicseaweed Api to get surf Data

if (isset($_POST['location'])){
  $json=file_get_contents("http://magicseaweed.com/api/Jp5AaQj52uwZoSD0YJXP0bdIthSvtV54/forecast/?spot_id={$_POST['location']}&timestamp");




 $data = json_decode($json, true);
 // echo $data[0]["timestamp"] . " sskkjkjhiubbiuhkjb,mhiun";
 // echo  var_dump($data);
 // echo "hhhhhhh" . 5 * round($data[0]['swell']['components']['combined']['direction'])/5;
 // echo "hhhhhhh" . number_format((int)($data[0]['swell']['components']['combined']['direction']));
// echo $data[0]['condition']['temperature'];
    $timestamp0 = $data[0]['timestamp']  ;
    $actualtime0= date(" g a",$timestamp0); 
    $timestamp1 = $data[1]['timestamp']  ;
    $actualtime1= date("g a",$timestamp1); 
    $timestamp2 = $data[2]['timestamp']  ;
    $actualtime2= date("g a",$timestamp2); 
    $timestamp3 = $data[3]['timestamp']  ;
    $actualtime3= date("g a",$timestamp3);
    $timestamp4 = $data[4]['timestamp']  ;
    $actualtime4= date(" g a",$timestamp4); 
    $timestamp5= $data[5]['timestamp']  ;
    $actualtime5= date("g a",$timestamp5); 
    $timestamp6 = $data[6]['timestamp']  ;
    $actualtime6= date("g a",$timestamp6); 
    $timestamp7 = $data[7]['timestamp']  ;
    $actualtime7= date("g a",$timestamp7);  
$f="wi-night-snow:before ";



   $w1= "http://cdnimages.magicseaweed.com/30x30/".$data[0]['condition']['weather'].".png";
   $w2= "http://cdnimages.magicseaweed.com/30x30/".$data[1]['condition']['weather'].".png";
   $w3= "http://cdnimages.magicseaweed.com/30x30/".$data[2]['condition']['weather'].".png";
   $w4= "http://cdnimages.magicseaweed.com/30x30/".$data[3]['condition']['weather'].".png";
   $w5= "http://cdnimages.magicseaweed.com/30x30/".$data[4]['condition']['weather'].".png";
   $w6= "http://cdnimages.magicseaweed.com/30x30/".$data[5]['condition']['weather'].".png";
   $w7= "http://cdnimages.magicseaweed.com/30x30/".$data[6]['condition']['weather'].".png";
   $w8= "http://cdnimages.magicseaweed.com/30x30/".$data[7]['condition']['weather'].".png";

     
if($_POST['location'] == '685'){
  $val = "Achill";
  $json1 = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$val}&key=AIzaSyCBa9HNzhKXsXl8EEHeEdZKACW9Cz6_0d8");
  $data2 = json_decode($json1, true);
  $latitude = $data2['results'][0]['geometry']['location']['lat'];
  $longitude = $data2['results'][0]['geometry']['location']['lng'];
}

elseif($_POST['location'] == '3701'){
  $val = "Ballybunion";
  $json1 = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$val}&key=AIzaSyCBa9HNzhKXsXl8EEHeEdZKACW9Cz6_0d8");
  $data2 = json_decode($json1, true);
  $latitude = $data2['results'][0]['geometry']['location']['lat'];
  $longitude = $data2['results'][0]['geometry']['location']['lng'];
}

elseif($_POST['location'] == '50'){
  $val = "Bundoran";
  $json1 = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$val}&key=AIzaSyCBa9HNzhKXsXl8EEHeEdZKACW9Cz6_0d8");
  $data2 = json_decode($json1, true);
  $latitude = $data2['results'][0]['geometry']['location']['lat'];
  $longitude = $data2['results'][0]['geometry']['location']['lng'];
}

elseif($_POST['location'] == '1500'){
  $val= "Easky";
  $json1 = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$val}&key=AIzaSyCBa9HNzhKXsXl8EEHeEdZKACW9Cz6_0d8");
  $data2 = json_decode($json1, true);
  $latitude = $data2['results'][0]['geometry']['location']['lat'];
  $longitude = $data2['results'][0]['geometry']['location']['lng'];
}
elseif($_POST['location'] == '1501'){
  $val= "Easky";
  $json1 = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$val}&key=AIzaSyCBa9HNzhKXsXl8EEHeEdZKACW9Cz6_0d8");
  $data2 = json_decode($json1, true);
  $latitude = $data2['results'][0]['geometry']['location']['lat'];
  $longitude = $data2['results'][0]['geometry']['location']['lng'];
}
elseif($_POST['location'] == '986'){
  $val= "Carrownisky";
  $json1 = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$val}&key=AIzaSyCBa9HNzhKXsXl8EEHeEdZKACW9Cz6_0d8");
  $data2 = json_decode($json1, true);
  $latitude = $data2['results'][0]['geometry']['location']['lat'];
  $longitude = $data2['results'][0]['geometry']['location']['lng'];
}
elseif($_POST['location'] == '1283'){
  $val= " Banna Beach ";
  $json1 = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$val}&key=AIzaSyCBa9HNzhKXsXl8EEHeEdZKACW9Cz6_0d8");
  $data2 = json_decode($json1, true);
  $latitude = $data2['results'][0]['geometry']['location']['lat'];
  $longitude = $data2['results'][0]['geometry']['location']['lng'];
}
elseif($_POST['location'] == '829'){
  $val= "Enniscrone";
  $json1 = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$val}&key=AIzaSyCBa9HNzhKXsXl8EEHeEdZKACW9Cz6_0d8");
  $data2 = json_decode($json1, true);
  $latitude = $data2['results'][0]['geometry']['location']['lat'];
  $longitude = $data2['results'][0]['geometry']['location']['lng'];
}
elseif($_POST['location'] == '1227'){
  $val= "Garretstown";
  $json1 = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$val}&key=AIzaSyCBa9HNzhKXsXl8EEHeEdZKACW9Cz6_0d8");
  $data2 = json_decode($json1, true);
  $latitude = $data2['results'][0]['geometry']['location']['lat'];
  $longitude = $data2['results'][0]['geometry']['location']['lng'];
}
elseif($_POST['location'] == '3717'){
  $val= "Inchodoney";
  $json1 = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$val}&key=AIzaSyCBa9HNzhKXsXl8EEHeEdZKACW9Cz6_0d8");
  $data2 = json_decode($json1, true);
  $latitude = $data2['results'][0]['geometry']['location']['lat'];
  $longitude = $data2['results'][0]['geometry']['location']['lng'];
}
elseif($_POST['location'] == '52'){
  $val= "Lahinch";
  $json1 = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$val}&key=AIzaSyCBa9HNzhKXsXl8EEHeEdZKACW9Cz6_0d8");
  $data2 = json_decode($json1, true);
  $latitude = $data2['results'][0]['geometry']['location']['lat'];
  $longitude = $data2['results'][0]['geometry']['location']['lng'];
}
elseif($_POST['location'] == '1505'){
  $val= "Mullaghmore";
  $json1 = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$val}&key=AIzaSyCBa9HNzhKXsXl8EEHeEdZKACW9Cz6_0d8");
  $data2 = json_decode($json1, true);
  $latitude = $data2['results'][0]['geometry']['location']['lat'];
  $longitude = $data2['results'][0]['geometry']['location']['lng'];
}
elseif($_POST['location'] == '51'){
  $val= "Strandhill";
  $json1 = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$val}&key=AIzaSyCBa9HNzhKXsXl8EEHeEdZKACW9Cz6_0d8");
  $data2 = json_decode($json1, true);
  $latitude = $data2['results'][0]['geometry']['location']['lat'];
  $longitude = $data2['results'][0]['geometry']['location']['lng'];
}
elseif($_POST['location'] == '55'){
  $val= "Tramore";
  $json1 = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$val}&key=AIzaSyCBa9HNzhKXsXl8EEHeEdZKACW9Cz6_0d8");
  $data2 = json_decode($json1, true);
  $latitude = $data2['results'][0]['geometry']['location']['lat'];
  $longitude = $data2['results'][0]['geometry']['location']['lng'];
}
elseif($_POST['location'] == '694'){
  $val= "Dublin";
  $json1 = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$val}&key=AIzaSyCBa9HNzhKXsXl8EEHeEdZKACW9Cz6_0d8");
  $data2 = json_decode($json1, true);
  $latitude = $data2['results'][0]['geometry']['location']['lat'];
  $longitude = $data2['results'][0]['geometry']['location']['lng'];
}
else{
  $val= "ClogherHead";
  $json1 = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$val}&key=AIzaSyCBa9HNzhKXsXl8EEHeEdZKACW9Cz6_0d8");
  $data2 = json_decode($json1, true);
  $latitude = $data2['results'][0]['geometry']['location']['lat'];
  $longitude = $data2['results'][0]['geometry']['location']['lng'];
}
$locationdata ="$val Surf Conditions";


 }



$url = "https://api.eancdn.com/ean-services/rs/hotel/v3/list?cid=55505&minorRev=99&apiKey=me3pheakz8v4s4da9u7g48jc&locale=en_US$useGeoCoder=true&_type=json&&currencyCode=EURO&latitude=$latitude&longitude=$longitude&Island&searchRadius=20&sort=PROXIMITY&PRICE&propertyCategory=5&arrivalDate=31/10/2014";
    $resulti = file_get_contents($url);
    //echo $result;
    // $data1 = json_encode($result, true);
    // var_dump($data1);
    if (!is_array($data->HotelListResponse->HotelList->HotelSummary))
        // A simple cast using (array) won't work here - it would convert the HotelSummary object itself rather than wrapping it inside of an array.
        $data->HotelListResponse->HotelList->HotelSummary = array($data->HotelListResponse->HotelList->HotelSummary);
     // echo  $data->HotelListResponse;



    // $url = "https://api.eancdn.com/ean-services/rs/hotel/v3/list?cid=55505&minorRev=99&apiKey=me3pheakz8v4s4da9u7g48jc&locale=en_US&_type=json&&currencyCode=EURO&city=Dublin&Island&countryCode=IE&numberOfResults=2";
    // $result = file_get_contents($url);


    $data1 = json_decode($resulti, true);
     // echo var_dump($data1);
       $v=$data1['HotelListResponse']['HotelList']['HotelSummary'][0]['lowRate'];
   // echo $v;
 $var =number_format((float)($data1['HotelListResponse']['HotelList']['HotelSummary'][0]['proximityDistance']), 1, '.', '');
 // echo "KK" . $var;
      $v0=$data1['HotelListResponse']['HotelList']['HotelSummary'][0]['deepLink'];
      $v1=$data1['HotelListResponse']['HotelList']['HotelSummary'][1]['deepLink'];
      $v2=$data1['HotelListResponse']['HotelList']['HotelSummary'][2]['deepLink'];
      $v3=$data1['HotelListResponse']['HotelList']['HotelSummary'][3]['deepLink'];
?>
</body>
</head>