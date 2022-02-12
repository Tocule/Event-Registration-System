<?php

session_start();

if(isset($_POST['n1']))
{
        $_SESSION['Department_Name']='Bits and Bytes';
}
if(isset($_POST['n2']))
{
        $_SESSION['Department_Name']='Chimera';
}
if(isset($_POST['n3']))
{
        $_SESSION['Department_Name']='Helix';
}
if(isset($_POST['n4']))
{
         $_SESSION['Department_Name']='Psy';
}

?>


<html>
        <head>
                <title>Category Selection</title>
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

                      .button1 {background-color: Purple;}
                      .button2 {background-color: fuchsia;}
             </style>
            </head>
            <center>
                <body>
                        <fieldset>
                                <h1>You are</h1>
                                <a href="Participant_info.php"><button class="button button1">Participant</button></a></br>
                                <a href="Organizer_Login.html"><button class="button button2">Organizer</button></a>
                        </fieldset>
		</body>
        </html>
