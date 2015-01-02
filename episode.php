<!DOCTYPE html>
<html>
<head lang="de">
    <meta charset="UTF-8">
</head>
<body>
</body>
</html>
<?php
    // Variables BEGIN
        $sid = $_GET['id']; //Speichert den ?id=X GET-Parameter in $sid
		$season = $_GET['season']; //Speichert den ?season=X GET-Parameter in $season
		$episode = $_GET['episode']; //Speichert den ?episode=X GET-Parameter in $episode
        $json_file = file_get_contents('https://www.burning-seri.es/api/series/'.$sid.'/'.$season.'/'.$episode.'/'); //Speichert den Inhalt der API in $json_file
        $ser = json_decode($json_file, true); //Dekodiert den JSON Inhalt und speichert in im Array $ser
        $name = $ser['series'];
		$epiinfo = $ser['epi'];
		$dtitel = $epiinfo['german'];
		$etitel = $epiinfo['english'];
		$desc = $epiinfo['description'];
		$id = $epiinfo['id'];
		$links = $ser['links'];

		
    // Variables END

    // Display BEGIN		

    echo $name;
	echo '<br><br>';
    echo $dtitel;
	echo '<br><br>';
    echo $etitel;	
	echo '<br><br>';
    echo $desc;
	echo '<br><br>';
    echo $id;	
	echo '<br><br>';

	echo 'Links: <br>';
	
    for($i=0; $i<count($links); $i++){
		
		$json_file = file_get_contents('https://www.burning-seri.es/api/watch/'.$links[$i]['id'].'/'); //Speichert den Inhalt der API in $json_file
		$ser = json_decode($json_file, true); //Dekodiert den JSON Inhalt und speichert in im Array $ser
		$hoster = $ser['hoster'];
		$url = $ser['fullurl'];
		
        echo '['.$i.'] | <strong>Hoster:</strong> <a href="'.$url.'">'.$hoster.'</a> |<br>';
        // 0 | Name: [Link]Serienname[/Link] | SerienID
    }
	
    // Display END
?>
