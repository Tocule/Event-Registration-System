<?php

session_start();
$department_name=$_SESSION['Department_Name'];

$con=pg_connect("host=127.0.0.1 port=5432 dbname=postgres user=ajay password=Hamilton");

$result=pg_query("Select * from event where department_name='$department_name';");

echo "<h2>List of events of $department_name<h2>";

echo "<form action=\"Participant_info.php\" method=\"POST\">";
echo "<table border=\"1 px solid black\">";
echo "<tr>";
echo "<th>Event Name</th><th>Date</th><th>StartTime</th><th>EndTime</th>";
echo "</tr>";

while($row=pg_fetch_row($result))
{
	echo "<tr>";
	echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>";
	echo "</tr>";
}


echo "</table><br>";
echo "<fieldset>";
echo "<legend>Enter your details</legend>";
echo "Email:<input type=\"text\" name=\"participant_email\"><br>";
echo "Name:<input type=\"text\" name=\"participant_name\"><br>";
echo "Age:&nbsp;&nbsp;&nbsp;<input type=\"number\" name=\"participant_age\"><br>";
echo "Event:<input type=\"text\" name=\"event_name\"><br>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name=\"n1\">Enroll</button>";
echo "</fieldset>";
echo "</form>";

$Email=$_POST['participant_email'];
$Name=$_POST['participant_name'];
$Age=$_POST['participant_age'];
$Event=$_POST['event_name'];

$flag=0;
$flag1=0;
$flag2=0;
$flag3=0;



$result1=pg_query("Select * from event where department_name='$department_name';");


if(isset($_POST['n1']))
{
	
while($row=pg_fetch_row($result1))
{	
	if($row[0]==$Event)
	{
		$flag=1;
		$result1=pg_query("Select count(*) from participant where department_name='$department_name' and event_name='$Event';");
                $row=pg_fetch_row($result1);
		echo $row[0];
		$r1=(int)$row[0];
		$result2=pg_query("Select * from event where department_name='$department_name' and event_name='$Event';");
                $row=pg_fetch_row($result2);
		echo $row[4];
		$r2=(int)$row[4];
		if($r1>$r2)
		{
			$flag=0;
			echo "<h4>Sorry the no of Participants are full</h4>";
		}
	}
}
	if($flag==1)
	{	
		if(preg_match("/^([a-z0-9\.-]+)@([a-z0-9\.-]+)\.([a-z]{2,3})$/",$Email))
		{
			$flag1=1;

			
			if(preg_match("/^([a-zA-z ]+)$/",$Name))
			{
				$flag2=1;

				if((preg_match("/^([0-9]{2})$/",$Age)) && $Age>0)
				{
					$flag3=1;
					pg_query("insert into participant values ('$Email','$Name',$Age,'$Event','$department_name');");
					echo "<h2>You have been enrolled successfully</h2>";
				}
			}
		}
	
	}	
			if($flag1==0 && $flag==1)
                        {
                                echo "<h4>Invalid Email</h4>";
                        }
                        if($flag2==0 && $flag1==1)
                        {
                                echo "<h4>Invalid Name</h4>";
                        }
                        if($flag3==0 && $flag2==1)
                        {
                                echo "<h4>Invalid Age</h4>";
			}
			if($flag==0)
                        {
                                echo "<h4>Event Name does not exist</h4>";
                        }

		
}

?>


	
