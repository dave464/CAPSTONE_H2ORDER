<?php
      $RG_Lat=14.074705500310888;
      $RG_Lon=120.63372163623407;
         $json = "https://nominatim.openstreetmap.org/reverse?format=json&lat=".$RG_Lat."&lon=".$RG_Lon."&zoom=28&addressdetails=1"; 
      $ch = curl_init($json);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:59.0) Gecko/20100101 Firefox/59.0");
      $jsonfile = curl_exec($ch);
      curl_close($ch);
      $RG_array = json_decode($jsonfile,true);
      echo $RG_array['display_name'];
?>

