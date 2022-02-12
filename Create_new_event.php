<?php

session_start();

$department_name=$_SESSION['Department_Name'];

?>


<html>
	<head>
		<title>Create_New_Event</title>
		<style>
		label
		{
			width:100px;
			display:inline-block;
			margin:4px;

		
		}
		form
		{
			background:silver;
		}
		</style>
	</head>

		<body>
			<form action="Create_new_event.php" method="POST">
			<fieldset>
			<label>EventName:</label>
			<input type="text" name="n1" placeholder="Event name must be unique"><br>
			<label>Date:</label>
		        <input type="date" name="n2"><br>
			<label>StartTime:</label>
		        <input type="time" name="n3"><br>
			<label>EndTime:</label>
		        <input type="time" name="n4"><br>
			<label>Participants:</label>
			<input type="text" placeholder="Maximum participants allowed" name="n5"><br>
			<label></label>
			<button name="s">Submit</button>
			</fieldset>
			</form>
		</body>
	
</html>

<?php

$con=pg_connect("host=127.0.0.1 port=5432 dbname=postgres user=ajay password=Hamilton");

$flag1=1;
$flag2=1;
$flag3=1;
$flag4=1;
$flag5=1;


	if(isset($_POST['s']))
	{
		if(empty($_POST['n1']))
		{
			$flag1=0;
		}
		if(empty($_POST['n2']))
                {
                        $flag2=0;
                }
		if(empty($_POST['n3']))
                {
                        $flag3=0;
                }
		if(empty($_POST['n4']))
                {
                        $flag4=0;
                }
		if(empty($_POST['n5']))
                {
                        $flag5=0;
		}

		if($flag1==0 || $flag2==0 || $flag3==0 || $flag4==0 || $flag5==0)
		{
			echo "<h3>Please enter all the required fields</h3>";
		}
		else
		{
			$result=pg_query("Select * from event where department_name='$department_name';");

			while($row=pg_fetch_row($result))
			{
				if($_POST['n1']==$row[0])
				{
					$flag1=0;
					break;
				}
			}
			if($flag1==0)
			{
				echo "<h3>Event with this name already exists in this department</h3>";
			}
			else
			{	
				$date1=strtotime($_POST['n2']);
				$date2=strtotime(date("Y/m/d"));
				
				if($date1<$date2)
				{
					echo "<h3>You have entered invalid date</h3>";
				}
				else
				{
					if($_POST['n3']>=$_POST['n4'])
					{
						echo "<h3>StartTime cannot be after or equal to EndTime</h3>";
					}
					else
					{
						$EventName=$_POST['n1'];
						$date1=$_POST['n2'];
						$StartTime=$_POST['n3'];
						$EndTime=$_POST['n4'];
						$Max=$_POST['n5'];
						$query="insert into event (event_name,Day,start_time,end_time,no_of_participants,department_name) values ('$EventName','$date1','$StartTime','$EndTime',$Max,'$department_name')";
						pg_query($query);
						echo "<h3>The Event has been successfully created</h3>";
					}
				}
			}
		


		}
	}



?>

