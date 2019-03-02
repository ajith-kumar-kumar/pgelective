<?php 
require '../db_config.php';

date_default_timezone_set("Asia/Kolkata");

$res=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM session"));
$f=strtotime($res['fromdate']);
$t=strtotime($res['todate']);
$diff = abs( $t-$f);
$days = floor(($diff)/ (60*60*24));
 echo $days.'<br>';
	
	$i=0;
	while($i<=$days)
	{
	 $b = strtotime("+$i day",$f);
$nda[$i]=date("Y-m-d", $b);
echo $nda[$i];

// if ($t<strtotime($nda) && $f>=strtotime($nda)) {

//  header("Location: login.php");
// }
// else
// {
//   header("Location: default.php");
// }

$i++;
	}
	echo count($nda);	
	for($i=0;$i<count($nda);$i++)
	{
		
		// echo $nda[$i];
	if($res['todate']<=strtotime($nda[$i]) && strtotime($nda[$i])>=date("Y-m-d"))
	{
		// echo $res['todate'].'<br>';
  header("Location: login.php");
// echo $nda[$i].'<br>';
// 		echo "true".'<br>';
	}
	else

	{
// echo $nda[$i].'<br>';
// 		echo $res['todate'];
// 		echo "false";
   header("Location: default.php");

	}
}
// echo $res['fromdate'];
  

 // echo date('Y-m-d');
// echo date('Y-m-d',strtotime("+$a+3 days"));
 // echo "ajith".$res['todate'] == date('Y-m-d',strtotime("+$a+1 days"));
// echo $res['todate'] == date('Y-m-d',strtotime("+$a+1 days"));
//if ($res['fromdate']==date('Y-m-d') && $res['todate'] < date('Y-m-d',strtotime("+1 day"))){


// for ($i=0; $i <= $days; $i++){

//   $b = date('Y-m-d',strtotime("+$i days"));

// echo $b;
// 						}

// echo $b;


?>