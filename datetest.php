<?php

//Just some date-time testing. This was back BEFORE Christmas 2019, and I was trying to figure out date processing in PHP.
$currentdate = new DateTime(date("Y-m-d"));
$christmas2019 = new DateTime("2019-12-25");

echo $currentdate->format("Y-m-d");
echo "<br>";
echo $christmas2019->format("Y-m-d");
echo "<br>";
echo $christmas2019->diff($currentdate)->format("Christmas is here in %m months and %d days.");

?>

