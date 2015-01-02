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
        $json_file = file_get_contents('https://www.burning-seri.es/api/series/'.$sid.'/'.$season.'/'); //Speichert den Inhalt der API in $json_file
        $ser = json_decode($json_file, true); //Dekodiert den JSON Inhalt und speichert in im Array $ser
        $info = $ser['series'];
        $id = $info['id'];
        $name = $info['series'];
        $desc = $info['description'];
		$episode = $ser['epi'];
		$season = $ser['season'];
		
    // Variables END

    // Display BEGIN		

    echo '<img src="https://b-s.cc/img/cover/'.$sid.'.jpg" alt=""><br><br>'; // Zeigt Cover an (Format ist immer https://b-s.cc/img/cover/ >ID DER SERIE< .jpg
    echo '<strong>ID:</strong> '.$id.'<br>';
    echo '<strong>Name:</strong> '.$name.'<br>';
    echo '<strong>Beschreibung:</strong> '.$desc.'<br>';
    echo '<strong>Filme:</strong> '.$movies.'<br>';
    echo '<strong>Staffeln:</strong> '.$seasons.'<br>';
    echo '<strong>Produktionsjahre:</strong> '.$start.' - '.$end.'<br>';
    echo '<br>';
    echo '<strong>Produzenten:</strong>';
    echo '<ul>';
    for($x=0; $x<count($info['data']['producer']); $x++){ //Geht alle Produzenten aus dem Array $info['data']['producer'] durch, zeigt sie an.
        echo '<li>'.$info['data']['producer'][$x].'</li>';
    }
    echo '</ul>';

    echo '<strong>Autoren:</strong>';
    echo '<ul>';
    for($x=0; $x<count($info['data']['author']); $x++){
        echo '<li>'.$info['data']['author'][$x].'</li>';
    }
    echo '</ul>';

    echo '<strong>Regisseure:</strong>';
    echo '<ul>';
    for($x=0; $x<count($info['data']['director']); $x++){
        echo '<li>'.$info['data']['director'][$x].'</li>';
    }
    echo '</ul>';

    echo '<strong>Genre(s):</strong>';
    echo '<ul>';
    for($x=0; $x<count($info['data']['genre']); $x++){
        echo '<li>'.$info['data']['genre'][$x].'</li>';
    }
    echo '</ul>';
	
	
	
	echo 'Staffel: '.$season.'<br>';
	
    for($i=0; $i<count($episode); $i++){
        echo '['.$episode[$i]['epi'].'] | <strong>Episode: </strong><a href="episode.php?id='.$sid.'&season='.$season.'&episode='.$episode[$i]['epi'].'">'.$episode[$i]['epi'].'</a> | <strong>Deutscher Titel: </strong>'.$episode[$i]['german'].' | <strong>Englischer Titel: </strong>'.$episode[$i]['english'].'<br>';
        // 0 | Name: [Link]Serienname[/Link] | SerienID
    }
	
    // Display END
?>
