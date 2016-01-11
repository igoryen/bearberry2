<?php
$servername = "localhost";
$username   = "homestead";
$password   = "secret";
$dbname     = "homestead";

define("SMALL", 'style="font-size:small;"');
define("GRAY",  'style="background-color:lightgray;"');

# ================================
$week = 1550;
$weeknext = $week+1;

$did = 1; # did = Day ID, the part of the Week List which is for one day

$uid1 = 1; # uid = User ID: 1 (Igor)
$uid2 = 2; # uid = User ID: 2 (Jenica)
$uid3 = 3; # uid = User ID: 3 (Daniel)
$uid4 = 4; # uid = User ID: 4(Joy)


$longspace = "";
for($i = 0; $i < 15; $i++) {
  $longspace .= "&nbsp;";
  $i++;
}
$shortspace = "";
for($i = 0; $i < 10; $i++) {
  $shortspace .= "&nbsp;";
  $i++;
}
$card_note_above = "Remember to do a good warm-up before the workout.";
$card_note_below = "To make a comment put a number in 'C' column and write your comment overleaf.";

# ================================
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

#=========================================================

#=====================================================
$bag = [];

#---------------------------
# user ID => list ID
$users = [
  1 => 8,
  2 => 9,
  3 => 6,
  4 => 4
];

#====================================================================

foreach($users as $uid=>$lid){

          $query = "SELECT first_name FROM bearberry.user WHERE id = %s";
          $sql = sprintf($query, $conn->real_escape_string($uid));
          #echo $sql;
          $result = $conn->query($sql); // <---<<
          # echo " " . $result . " ";
          //var_dump($result);
          //echo $result->num_rows;
          //print_r($result->fetch_assoc());
          // echo "var_dump: " . var_dump($result->fetch_assoc());
          $row = $result->fetch_assoc();
          #echo "User name: " . $row["first_name"] . "<--";
          if ($result->num_rows > 0) {
            #echo "Tada!";
            while($row = $result->fetch_assoc()){
              array_push($bag, '<div class="card left">'); // open a card

              array_push($bag, '<div class="header">');
              array_push($bag, '<div class="user_name">'. $row["first_name"] . '</div> > ');
              array_push($bag, '<div class="list_number">List '.$lid.'</div> > ');
              array_push($bag, '<div class="week_number">Week '.$week.'</div> > ');
              array_push($bag, '<div class="day_number">Day '.$did.'</div>');
              array_push($bag, '</div>');
            }
          }
          // else {
          //   echo "oops!";
          //   var_dump($result->num_rows);
          // }


        #--------------------------------------------------------------------


        $query    = file_get_contents("b.sql");
        #echo "debug: query = " . $query;
        $sql = sprintf($query, 
          $conn->real_escape_string($uid), 
          $conn->real_escape_string($lid), 
          $conn->real_escape_string($did)
          );
        # echo $sql;
        $result = $conn->query($sql);
        //var_dump($result);


        array_push($bag, '<div class="note">'. $card_note_above.'</div>');
        array_push($bag, '<table class="table">');
        array_push($bag, '<tr class="heading">');
        //array_push($bag, "<tr ".GRAY."><td>muscles</td><td>Exe</td><td>Exe name</td><td>week</td><td>weight</td><td>".$week."</td><td>".$weeknext."</td></tr>");
        array_push($bag, '<th class="muscle">Muscle</th>');
        array_push($bag, '<th class="exe_id">ID</th>');
        array_push($bag, '<th class="exe_name">Exercise</th>');
        array_push($bag, '<th class="week_num">Week</th>');
        array_push($bag, '<th class="weight">Wt</th>');
        array_push($bag, '<th class="week">'.$week.'</th>');
        array_push($bag, '<th class="week">C</th>');
        array_push($bag, '<th class="week">'.$weeknext.'</th>');
        array_push($bag, '<th class="week">C</th>');
        array_push($bag, '</tr>');
        if ($result->num_rows > 0) {

          // output data of each row
          while ($row = $result->fetch_assoc()) {
            array_push($bag, '<tr class="row">');
            array_push($bag, '<td class="muscle">'.$row["main"].'</td>');
            array_push($bag, '<td class="exe_id aligned">'.$row["eid"].'</td>');
            array_push($bag, '<td class="exe_name">'.$row["name"].'</td>');
            array_push($bag, '<td class="week_num aligned">'.$row["week"].'</td>');
            array_push($bag, '<td class="weight aligned">'.$row["weight"].'</td>');
            array_push($bag, '<td class="current_week aligned">'.$longspace.'</td>');
            array_push($bag, '<td class="comment">'.$shortspace.'</td>');
            array_push($bag, '<td class="current_week aligned">'.$longspace.'</td>');
            array_push($bag, '<td class="comment">'.$shortspace.'</td>');
            array_push($bag, "</tr>");

          }
        }
        else {
          echo "0 results";
        }

        array_push($bag, "</table>");
        array_push($bag, '<div class="note">'. $card_note_below.'</div>');
        array_push($bag, '</div>'); // close a card
}

?>


<html>
  <head>
    <title>Bearberry</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="less.min.js"></script>
    <link href="main.less" rel="stylessheet/less" type="text/css" />
    <link href="main.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
      //var x = getElementById


      // $(document).ready(function(){
      //   $(".header").click(function(){
      //     $("table").toggle();
      //   });
      // });
    </script>
  </head>
  <body>
<!--    <a href="/">Index</a> :: 
    <a href="igor.php">Igor</a> :: <a href="jenica.php">Jenica</a> :: 
    <a href="daniel.php">Daniel</a> :: <a href="joy.php">Joy</a> :: 
    <hr>-->