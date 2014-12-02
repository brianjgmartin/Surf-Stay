 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 101 Template</title>

   
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../bootstrap-3.2.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-3.2.0-dist/css/weather-icons.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-3.2.0-dist/css/myStyle.css">
    <script type="text/javascript" src="../bootstrap-3.2.0-dist/silviomoreto-bootstrap-select-83d5a1b/dist/js/bootstrap-select.js"></script>
    <script type="text/javascript" src="../bootstrap-3.2.0-dist/js/jquery-2.1.1.min.js"></script>

 
  <?php include './api.php';?>
 <style>
  small    {color:#339933};
  h3       {color:#3C94CF}
</style>
    <script type="text/javascript">
        $(document).ready(function(){ 
        $("#myTab li:eq(1) a").tab('show');
        });
    </script>

</head>

<body class="jumbotron">
    <div>
    <h1 style="color:#3D5C5C" align="center"> Surf & Stay</h1>
    <p style="color:#3D5C5C" align="center"z> View latest Surf Conditions and Local Accomodation</p>
</div>
    <div class="bs-example">
       
            <ul class="nav nav-tabs navbar-collapse" id="myTab">
                <li>     
                    <form name="api.php"  method="POST">
     
                        <select type="hidden"onchange="submit()" name="location" class="selectpicker show-tick form-control" >
                            <li class="dropdown" >
                                <!-- In this selection menu I must hard code a value to a location
                                as the magicseaweed api works using a numerical value which represents a location -->
                                 <option>Choose Beach Break</option>
                                 <option value="685">Achill</option>
                                 <option value="3701">Ballybunion</option>
                                 <option value="1283">Banna Beach</option>
                                 <option value="50">Bundoran</option>
                                 <option value="986">Carrownisky</option>
                                 <option value="1231">Clogherhead</option>
                                 <option value="1500">Easky Left</option>
                                 <option value="1501">Easky Right</option>
                                 <option value="829">Enniscrone</option>
                                 <option value="1227">Garretstown</option>
                                 <option value="3717">Inchodoney</option>
                                 <option value="52">Lahinch</option>
                                 <option value="1505">Mullaghmore</option>
                                 <option value="51">Strandhill</option>
                                 <option value="55">Tramore</option>
                        </select>
                    </form>
                </li>
            <li>
                <a data-toggle="tab" name="location" value="10"href="#dropdown2"><?= $locationdata?></a></li>
          
        </ul>
      
            <div id="dropdown2" class="tab-pane fade" >

                <!-- Start of Surf data table -->

                    <div  class="col-md-6">
  <h3 style="color:#3D5C5C" align="center">Surf Conditions</h3>
    <table class="table table-bordered">
      
        <thead>
            <tr style="background-color:#D1E0E0">
                <th><? echo $today?></th>
                <th>Rating<i class="<?= $f?>"></i></th>
                <th>Surf</th>
                <th>Swell</th>
                <th>Wind Speed</th>
                <th>Weather</th>
            </tr>
        </thead>
        

        <tr class="active">

            <!-- 1 The first Value in the table row is Converting from a timestamp representation to Actual 
            Human readable Time of Day -->

            <td><strong><?= $actualtime0?></strong></td>

            <!-- 2 The Second Row Named Rating is using magicseaweeds own algorithm for providing a rating.
            Magicseaweed provide a numerical rating for both solid and faded rating.
            I assign a star to each number provided. (ie) rating of 4 gets 4 stars
            There are 2 seperate arrays one for solid rating and another for faded 
            The arrays are then combined  -->
            <td>
            <?php 

                    for ( $i = 0; $i < $data[0]['solidRating']; $i++) {
                        (array_push($sRating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />'));
                         echo $sRating[$i];
                    }
                    for ( $i = 0; $i < $data[0]['fadedRating']; $i++) {
                        array_push($fRating, '<img src="http://cdnimages.magicseaweed.com/star_empty.png" />');
                        echo $fRating[$i];
                }?>
            </td>
            <!-- 3 Surf Conditions. Here I am supplying a range from the minimun predicted wave height to the maximum -->
            <td><strong><?= number_format((int)($data[0]['swell']['absMinBreakingHeight']));?> - <?= number_format((int)($data[0]['swell']['absMaxBreakingHeight']));?></strong> <small><?= $data[1]['swell']['unit']?></small></td>            
            <!-- 4 The swell includes the period between each wave in seconds. 
            A higher period allows waves to form for sweet rides dude!
            The arrow is indicating swell direction. This result is rounded up to the nearest 5
            as there is only a css image supplied for every 5 degrees. -->
            <td><?= $data[1]['swell']['components']['combined']['period'];?><small> s </small> <i class="msw-swa-<?= 5 * round($data[1]['swell']['components']['combined']['direction']/5);?>"></i></td>
           <!--  5 Wind speed. Here the code is returning wind speed, direction and wind unit (ie)  mph
            The wind direction is similar to the swell direction. It must be rounded up to 5 degree segments -->
            <td><strong><?= $data[0]['wind']['speed']?> </strong><small><?= $data[0]['wind']['unit']?></smalll>  <i class="msw-ssa-<?= 5 * round($data[0]['wind']['direction']/5);?>"></i></td>
            <!-- 6 Weather. This is returning the temperature and an image of weather conditions 
            The image maps to a numercial value returned by the api
            The Temperature must be converted to celcius as it is returning a farenheit value?
            Not sure id this is beacuase this app is sitting on a data center in the US as 
            it returns a celcius value locally on  my Laptop with the same code! -->
            <td><?= number_format((int)$celsius=5/9*($data[0]['condition']['temperature']-32));?><small>c</small> <img src="<?= $w1?>"></td>
        </tr>

        <tr>
            <td><strong><?= $actualtime1?></strong></td>
            <td>
                <?php 
                    for ( $i = 0; $i < $data[1]['solidRating']; $i++) {
                        (array_push($sRating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />'));
                         echo $sRating[$i];
                    }
                    for ( $i = 0; $i < $data[1]['fadedRating']; $i++) {
                        array_push($fRating, '<img src="http://cdnimages.magicseaweed.com/star_empty.png" />');
                        echo $fRating[$i];
                }?>
            </td>
            <td><strong><?= number_format((int)($data[1]['swell']['absMinBreakingHeight']));?> - <?= number_format((int)($data[1]['swell']['absMaxBreakingHeight']));?></strong> <small><?= $data[2]['swell']['unit']?></small></td>            
            <td><?= $data[1]['swell']['components']['combined']['period'];?><small> s </small> <i class="msw-swa-<?= 5 * round($data[1]['swell']['components']['combined']['direction']/5);?>"></i></td>
            <td><strong><?= $data[1]['wind']['speed']?> </strong><small><?= $data[0]['wind']['unit']?></smalll>  <i class="msw-ssa-<?= 5 * round($data[1]['wind']['direction']/5);?>"></i></td>        
            <td><?= $data[1]['condition']['temperature']?><small>c</small> <img src="<?= $w2?>"></td>
        </tr>

        <tr class="active">
            <td><strong><?= $actualtime2?></strong></td>
            <td><?php
                    for ( $i = 0; $i < $data[2]['solidRating']; $i++) {
                        (array_push($sRating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />'));
                         echo $sRating[$i];
                    }
                    for ( $i = 0; $i < $data[2]['fadedRating']; $i++) {
                        array_push($fRating, '<img src="http://cdnimages.magicseaweed.com/star_empty.png" />');
                        echo $fRating[$i];
                }?></td>
            <td><strong><?= number_format((int)($data[2]['swell']['absMinBreakingHeight']));?> - <?= number_format((int)($data[2]['swell']['absMaxBreakingHeight']));?></strong> <small><?= $data[3]['swell']['unit']?></small></td>            
            <td><?= $data[2]['swell']['components']['combined']['period'];?> <small> s </small> <i class="msw-swa-<?= 5 * round($data[2]['swell']['components']['combined']['direction']/5);?>"></i></td>
            <td><strong><?= $data[2]['wind']['speed']?></strong><small><?= $data[0]['wind']['unit']?></smalll>  <i class="msw-ssa-<?= 5 * round($data[2]['wind']['direction']/5);?>"></i></td>  
            <td><?= $data[2]['condition']['temperature']?><small>c</small> <img src="<?= $w3?>"></td>
        </tr>
      
        <tr>
            <td><strong><?= $actualtime3?></strong></td>
            <td><?php
                    for ( $i = 0; $i < $data[3]['solidRating']; $i++) {
                        (array_push($sRating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />'));
                         echo $sRating[$i];
                    }
                    for ( $i = 0; $i < $data[3]['fadedRating']; $i++) {
                        array_push($fRating, '<img src="http://cdnimages.magicseaweed.com/star_empty.png" />');
                        echo $fRating[$i];
                }?></td>
            <td><strong><?= number_format((int)($data[3]['swell']['absMinBreakingHeight']));?> - <?= number_format((int)($data[3]['swell']['absMaxBreakingHeight']));?></strong> <small><?= $data[4]['swell']['unit']?></small></td>            
            <td><?= $data[3]['swell']['components']['combined']['period'];?> <small> s </small> <i class="msw-swa-<?= 5 * round($data[3]['swell']['components']['combined']['direction']/5);?>"></i></td>
            <td><strong><?= $data[3]['wind']['speed']?> </strong><small><?= $data[0]['wind']['unit']?></smalll>  <i class="msw-ssa-<?= 5 * round($data[3]['wind']['direction']/5);?>"></i></td> 
            <td><?= $data[3]['condition']['temperature']?><small>c</small> <img src="<?= $w5?>"></td>
        </tr>

        <tr class="active">
            <td><strong><?= $actualtime4?></strong></td>
            <td><?php
                    for ( $i = 0; $i < $data[4]['solidRating']; $i++) {
                        (array_push($sRating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />'));
                         echo $sRating[$i];
                    }
                    for ( $i = 0; $i < $data[4]['fadedRating']; $i++) {
                        array_push($fRating, '<img src="http://cdnimages.magicseaweed.com/star_empty.png" />');
                        echo $fRating[$i];
                }?></td>
            <td><strong><?= number_format((int)($data[4]['swell']['absMinBreakingHeight']));?> - <?= number_format((int)($data[4]['swell']['absMaxBreakingHeight']));?></strong> <small><?= $data[4]['swell']['unit']?></small></td>
            <td><?= $data[4]['swell']['components']['combined']['period'];?><small> s </small> <i class="msw-swa-<?= 5 * round($data[4]['swell']['components']['combined']['direction']/5);?>"></i></td>
            <td><strong><?= $data[4]['wind']['speed']?> </strong><small><?= $data[4]['wind']['unit']?></smalll>  <i class="msw-ssa-<?= 5 * round($data[4]['wind']['direction']/5);?>"></i></td>      
            <td><?= $data[4]['condition']['temperature']?><small>c</small> <img src="<?= $w5?>"></td>
        </tr>

        <tr>
            <td><strong><?= $actualtime5?></strong></td>
            <td><?php
                    for ( $i = 0; $i < $data[5]['solidRating']; $i++) {
                        (array_push($sRating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />'));
                         echo $sRating[$i];
                    }
                    for ( $i = 0; $i < $data[5]['fadedRating']; $i++) {
                        array_push($fRating, '<img src="http://cdnimages.magicseaweed.com/star_empty.png" />');
                        echo $fRating[$i];
                }?>
            </td>
            <td><strong><?= number_format((int)($data[5]['swell']['absMinBreakingHeight']));?> - <?= number_format((int)($data[5]['swell']['absMaxBreakingHeight']));?></strong> <small><?= $data[4]['swell']['unit']?></small></td>            
            <td><?= $data[5]['swell']['components']['combined']['period'];?><small> s </small> <i class="msw-swa-<?= 5 * round($data[5]['swell']['components']['combined']['direction']/5);?>"></i></td>
            <td><strong><?= $data[5]['wind']['speed']?> </strong><small><?= $data[5]['wind']['unit']?></smalll>  <i class="msw-ssa-<?= 5 * round($data[5]['wind']['direction']/5);?>"></i></td>        
            <td><?= $data[5]['condition']['temperature']?><small>c</small> <img src="<?= $w6?>" align="center"></td>
         </tr>

        <tr class="active">
            <td><strong><?= $actualtime6?></strong></td>
            <td><?php
                    for ( $i = 0; $i < $data[6]['solidRating']; $i++) {
                        (array_push($sRating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />'));
                         echo $sRating[$i];
                    }
                    for ( $i = 0; $i < $data[6]['fadedRating']; $i++) {
                        array_push($fRating, '<img src="http://cdnimages.magicseaweed.com/star_empty.png" />');
                        echo $fRating[$i];
                }?>
            </td>
            <td><strong><?= number_format((int)($data[6]['swell']['absMinBreakingHeight']));?> - <?= number_format((int)($data[6]['swell']['absMaxBreakingHeight']));?></strong> <small><?= $data[4]['swell']['unit']?></small></td>            
            <td><?= $data[6]['swell']['components']['combined']['period'];?><small> s </small> <i class="msw-swa-<?= 5 * round($data[6]['swell']['components']['combined']['direction']/5);?>"></i></td>
            <td><strong><?= $data[6]['wind']['speed']?> </strong><small><?= $data[6]['wind']['unit']?></smalll>  <i class="msw-ssa-<?= 5 * round($data[6]['wind']['direction']/5);?>"></i></td>        
            <td><?= $data[6]['condition']['temperature']?><small>c</small> <img src="<?= $w7?>"></td>
        </tr>
      
        <tr>
            <td><strong><?= $actualtime7?></strong></td>
            <td><?php
                    for ( $i = 0; $i < $data[7]['solidRating']; $i++) {
                        (array_push($sRating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />'));
                         echo $sRating[$i];
                    }
                    for ( $i = 0; $i < $data[7]['fadedRating']; $i++) {
                        array_push($fRating, '<img src="http://cdnimages.magicseaweed.com/star_empty.png" />');
                        echo $fRating[$i];
                }?>
            </td>
            <td><strong><?= number_format((int)($data[7]['swell']['absMinBreakingHeight']));?> - <?= number_format((int)($data[7]['swell']['absMaxBreakingHeight']));?></strong> <small><?= $data[7]['swell']['unit']?></small></td>            
            <td><?= $data[7]['swell']['components']['combined']['period'];?><small> s </small> <i class="msw-swa-<?= 5 * round($data[7]['swell']['components']['combined']['direction']/5);?>"></i></td>
            <td><strong><?= $data[7]['wind']['speed']?> </strong><small><?= $data[0]['wind']['unit']?></smalll>  <i class="msw-ssa-<?= 5 * round($data[7]['wind']['direction']/5);?>"></i></td>        
            <td><?= $data[7]['condition']['temperature']?><small>c</small> <img src="<?= $w8?>"></td>
     
        </tr>
    </table>
                <!-- End oF table -->

        </div>
     <div  class="col-md-6">
                <!-- Start of Hotel Table -->
    <table class="table table-bordered">
      <h3 style="color:#3D5C5C" align="center">Local Hotels</h3>
        <thead>
            <tr style="background-color:#D1E0E0">
                <th>Hotel</th>
                <th>Adrress</th>
                <th>Distance </th>
                <th> Price </th>
                <th>Rating</th>
            </tr>
        </thead>
            <tr>
                <!-- 1 The first Field supplied is the name of the accomadation which is also a URL
                to the triadvors site  -->
                <td><a href="<?= $v0?>"><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][0]['name']?></a></td>
                <!-- 2 The second field is the address and city -->
                <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][0]['address1']?>,<?= $data1['HotelListResponse']['HotelList']['HotelSummary'][0]['city']?></td>
               <!--  3 this column represents the distance the accomodation is located 
                away from the beach which is rounded to on decimal place in km -->
                <td><?= number_format((float)($data1['HotelListResponse']['HotelList']['HotelSummary'][0]['proximityDistance']), 1, '.', '');?> <small>km</small></td>                
                <!-- 4 This is the price of the accomodation as supplied by ean api  -->
                <td><small>€</small> <?= number_format((int)$data1['HotelListResponse']['HotelList']['HotelSummary'][0]['lowRate'])?></td>
                <!-- 5 This is the rating of the accomadtion which is supplied as a numerical value
                The below code adds a image of a star to an array for each number supplied by the rating -->
                <td><?php 

                     for ( $i = 0; $i < $data1['HotelListResponse']['HotelList']['HotelSummary'][0]['tripAdvisorRating']; $i++) {
                        array_push($tripAdvisor_rating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />');
                        $r= $tripAdvisor_rating[$i];
                        echo $r;
                    }?>
                </td>
            </tr>

            <tr class="active">
                <td><a href="<?= $v1?>"><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][1]['name']?></a></td>
                <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][1]['address1']?>,<?= $data1['HotelListResponse']['HotelList']['HotelSummary'][1]['city']?></td>
                <td><?= number_format((float)($data1['HotelListResponse']['HotelList']['HotelSummary'][1]['proximityDistance']), 1, '.', '');?> <small>km</small></td>
                <td><small>€</small> <?= number_format((int)$data1['HotelListResponse']['HotelList']['HotelSummary'][1]['lowRate'])?></td>
                <td><?php 

                     for ( $i = 0; $i < $data1['HotelListResponse']['HotelList']['HotelSummary'][1]['tripAdvisorRating']; $i++) {
                        array_push($tripAdvisor_rating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />');
                        $r= $tripAdvisor_rating[$i];
                        echo $r;
                      }?>
                </td>
            </tr>

            <tr>
                <td><a href="<?= $v2?>"><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][2]['name']?></a></td>
                <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][2]['address1']?>,<?= $data1['HotelListResponse']['HotelList']['HotelSummary'][2]['city']?></td>
                <td><?= number_format((float)($data1['HotelListResponse']['HotelList']['HotelSummary'][2]['proximityDistance']), 1, '.', '');?> <small>km</small></td>                
                <td><small>€</small> <?= number_format((int)$data1['HotelListResponse']['HotelList']['HotelSummary'][2]['lowRate'])?> </td>
                <td><?php 

                     for ( $i = 0; $i < $data1['HotelListResponse']['HotelList']['HotelSummary'][2]['tripAdvisorRating']; $i++) {
                        array_push($tripAdvisor_rating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />');
                        $r= $tripAdvisor_rating[$i];
                        echo $r;
                     }?>
                </td>
            </tr>
             
            <tr class="active">
                <td><a href="<?= $v3?>"><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][3]['name']?></a></td>
                <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][3]['address1']?>,<?= $data1['HotelListResponse']['HotelList']['HotelSummary'][3]['city']?></td>
                <td><?= number_format((float)($data1['HotelListResponse']['HotelList']['HotelSummary'][3]['proximityDistance']), 1, '.', '');?> <small>km</small></td>                
                <td><small>€</small> <?= number_format((int)$data1['HotelListResponse']['HotelList']['HotelSummary'][3]['lowRate'])?> </td>
                <td><?php 

                     for ( $i = 0; $i < $data1['HotelListResponse']['HotelList']['HotelSummary'][3]['tripAdvisorRating']; $i++) {
                        array_push($tripAdvisor_rating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />');
                        $r= $tripAdvisor_rating[$i];
                        echo $r;
                      }?>
                </td>
            </tr>
                   
            <tr>
                <td><a href="<?= $v4?>"><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][4]['name']?></a></td>
                <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][4]['address1']?>,<?= $data1['HotelListResponse']['HotelList']['HotelSummary'][4]['city']?></td>
                <td><?= number_format((float)($data1['HotelListResponse']['HotelList']['HotelSummary'][4]['proximityDistance']), 1, '.', '');?> <small>km</small></td>                
                <td><small>€</small><?= number_format((int)$data1['HotelListResponse']['HotelList']['HotelSummary'][4]['lowRate'])?> </td>
                <td><?php 

                     for ( $i = 0; $i < $data1['HotelListResponse']['HotelList']['HotelSummary'][4]['tripAdvisorRating']; $i++) {
                        array_push($tripAdvisor_rating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />');
                        $r= $tripAdvisor_rating[$i];
                        echo $r;
                    }?>
                </td>
            </tr>

      
      </table>
    </div>
    </div>

        <script src="../bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
  </body>
</html>