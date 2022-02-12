<?php

session_start();

$department_name=$_SESSION['Department_Name'];

?>

<?php

$con=pg_connect("host=127.0.0.1 port=5432 dbname=postgres user=ajay password=Hamilton");

$result=pg_query("Select * from event where department_name='$department_name';");

echo "<h3>The details of all existing events in your department</h3>";

echo "<table border=\"1px solid black\">";
echo "<tr>";
echo "<th>Event Name</th><th>Date</th><th>Start Time</th><th>End Time</th><th>No of Participants</th><th>Department Name</th>";
echo "</tr>";

while($row=pg_fetch_row($result))
{
	echo "<tr>";
	echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td>";
	echo "</tr>";
}
echo "</table>";
?>

<html>
	<body>
		<h3>See the details of participants of particular event</h3>
		<form action="Details_of_existing_event.php" method="POST">
		<fieldset>
		Enter Event Name: <input type="text" name="n1"><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="s">Submit</button>
		</fieldset>
		</form>
	</body>
</html>

<?php

$con=pg_connect("host=127.0.0.1 port=5432 dbname=postgres user=ajay password=Hamilton");

$flag1=0;
if(isset($_POST['s']))
{
	$EventName=$_POST['n1'];
	$result=pg_query("Select * from event where department_name='$department_name';");

                       while($row=pg_fetch_row($result))
                       {
                                if($_POST['n1']==$row[0])
                                {
					$flag1=1;
					break;
				}
				
                        }
                        if($flag1==0)
                        {
				echo "<h3>Event does not exist</h3>";
			}
			else
			{
				$result=pg_query("Select * from participant where event_name='$EventName' and department_name='$department_name';");
				echo "<table border=\"1px solid black\">";
				echo "<tr>";
				echo "<th>Participant Email</th><th>Participant Name</th><th>Particpant Age</th>";
				echo "</tr>";
				while($row=pg_fetch_row($result))
				{
					echo "<tr>";
					echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>";
					echo "</td>";
				}
				echo "</table>";
			}
}

?>
		

