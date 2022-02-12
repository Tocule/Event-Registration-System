<?php

session_start();

?>

<?php

$department_name=$_SESSION['Department_Name'];

$con=pg_connect("host=127.0.0.1 port=5432 dbname=postgres user=ajay password=Hamilton");


$Username=$_POST['n1'];
$Password=$_POST['n2'];

$result=pg_query("Select * from Coordinator");


while($row=pg_fetch_row($result))
{
	if(($Username==$row[1])&&($Password==$row[2])&&($department_name==$row[3]))
	{
		$flag=1;
		break;
	}
	else
	{
		$flag=0;
	}
}


if($flag==1)
{	
	echo "<fieldset>";
	echo "<center><h1>You are logged in</h1><center>";
	//echo "<br>";
	echo "<a href=\"Create_new_event.php\"><button class = \"button button1\">Create a new event</button></a>";
	echo "<br>";
	echo "<a href=\"Details_of_existing_event.php\"><button class = \"button button2\">Details of existing event</button></a>";
	echo "</fieldset>";

}
else
{
	echo "<center><h1>Invalid Credentials</h1><center>";
}

?>

<html>
        <head>
                <style>
              .button
                      {
                        border:none;
                        color:white;
                        padding:15px 32px;
                        text-align:center;
                        text-decoration:none;
                        display:inline-block;
                        font-size:16px;
                        margin:4px 2px;
                        cursor:pointer;
                      }

                      .button1 {background-color: navy;}
                      .button2 {background-color: aqua;}
             </style>
            </head>

</html>
