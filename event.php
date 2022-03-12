<?php
    include('db.php');
    // $details= $_POST['eventdetails'];
    $details=$_POST['eventdetails'];
    $date1=$_POST['date'];
    $month1="9";
    $year1=$_POST['year'];
    $date2=$year1."-";
    $date3=$month1."-";
    $date4=$date2.$date3;
    $date5=$date4.$date1;

    $reg= "insert into calendar(event_date,event_details) values('$date5','$details')";
	$num=mysqli_query($con , $reg);


    if($num == 1){
       header('location:calendar.php');
    }else{
        echo "email already taken";
        
    }
?>