<html>
<head>
<title>AWS Quiz</title>
 <meta charset="UTF-8">
 <style>
      .antwort{
		  color: #f9f9f9;
	  }
	  .frage{
		  color: blue;
	  }
	  
	  .userantwort{
		  width: 120px;
	  }
 
 </style>
 <script>
    function auswertung()
	{
		var hiddenfeld = document.getElementById("richtigeAntwort");
		var compareValue = hiddenfeld.value;
		var selectedValue = "clicks";
		 alert(selectedValue.toString()+" wird verglichen mit "+ compareValue);
	}
     function changeFunc() {
    //var selectBox = document.getElementById("selectBox");
    //var selectedValue = selectBox.options[selectBox.selectedIndex].value;
	
	var options = document.getElementById('selectBox').selectedOptions;
    var selectedValue = Array.from(options).map(({ value }) => value);
	
	var hiddenfeld = document.getElementById("richtigeAntwort");
	var compareValue = hiddenfeld.value;
    alert(selectedValue.toString()+" wird verglichen mit "+ compareValue);
		if( selectedValue.toString()  == compareValue )
		{
			alert("richtig");
		}
		else
		{
			alert("falsche");
		}
	}
 </script>
</head>
<body>
<?php 
  error_reporting(-1);
  $thema =  $_POST["thema"];

$dbhost = 'cc-training-database-1.c4vhtk9yfmbv.eu-central-1.rds.amazonaws.com';
$dbport = '3306';
$dbname = 'awspractitionerexam';
$charset = 'utf8' ;

$dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset={$charset}";
$username = 'tildeler';
$password = 'xRraWAEFARSWgg4o66dZ';

# $pdo = new PDO($dsn, $username, $password);
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = new mysqli($dbhost, $username, $password, $dbname, $dbport);
$link->set_charset('utf8');

$query = "SELECT * FROM tests WHERE thema = '".$thema."'"; 
$result = $link->query($query);
$arrayFragen = $result->fetch_all(MYSQLI_ASSOC);

$found = sizeof($arrayFragen);
if ($found > 0)
{
	$anzFragen = $_POST["anz"];
	echo "<br>gestellt werden $anzFragen aus einem Katalog von ";
	echo  $found;
	echo " Aufgaben zum Thema $thema<br>";
	for($i=1; $i<=$anzFragen; $i++)
	{   
       
		$row = $arrayFragen[random_int(1,sizeof($arrayFragen)-1)];
		# print_r($row);
		echo "<br><div class='frage'>";
		printf("%s (%s)", $row["fragenr"], $row["fragetext"]);
		echo "<br>";
		for($zeile = 'a'; $zeile <= 'f'; $zeile++)
		{
			if(!is_null($row["antwort_".$zeile]))
			{	#echo "in Zeile ".__LINE__." lautet die Variable der Schleife $zeile";
                $ingross = strtoupper($zeile);		
			    echo"<input type='checkbox' name='antwort_$zeile' value='$ingross'/>";
				echo $row["antwort_".$zeile]."<br>";			
			}
		}
		
		$zumVergleich = $row['richtigeAntwort'];
		#echo "Richtige Antwort ist $zumVergleich"; #$row['richtigeAntwort']";
		echo "<input type='hidden' id='richtigeAntwort' value = '$zumVergleich' />";		
		
		echo "<br><button type='button' onclick='javascript:auswertung();'>Auswertung</button>";
		echo "</div><br>";
		
		echo "<div id='$i' class='antwort'>";
		
		
		printf("Richtige Antwort: %s ", $richtigeAntwort);
		echo "<br>";
		printf("Erlärung: %s ", $row["antworttext"]);
		echo "<br><br></div>";
		
	}
}
else
{
	echo "Zum Thema $thema wurden noch keine Fragen hinterlegt<br>";
}
$link->close();
?>  
  
  

</body>
</html>