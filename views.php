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
        $sid = $_GET['id'];
        $json_file = file_get_contents('https://www.burning-seri.es/api/series/'.$sid.'/1');
        $ser = json_decode($json_file, true);
        $info = $ser["series"];
        $id = $info["id"];
        $name = $info["series"];
        $desc = $info["description"];
        $movies = $info["movies"];
        $seasons = $info["seasons"];
        $start = $info["start"];
        if($start == null)$start = "Unbekannt";
        $end = $info["end"];
        if($end == null)$end = "Unbekannt";
    // Variables END

    // Display BEGIN
    echo '<img src="https://b-s.cc/img/cover/'.$id.'.jpg" alt=""><br><br>';
    echo '<strong>ID:</strong> '.$id.'<br>';
    echo '<strong>Name:</strong> '.$name.'<br>';
    echo '<strong>Beschreibung:</strong> '.$desc.'<br>';
    echo '<strong>Filme:</strong> '.$movies.'<br>';
    echo '<strong>Staffeln:</strong> '.$seasons.'<br>';
    echo '<strong>Produktionsjahre:</strong> '.$start.' - '.$end.'<br>';
    echo '<br>';
    echo '<strong>Produzenten:</strong>';
    echo '<ul>';
    for($x=0; $x<count($info["data"]["producer"]); $x++){
        echo '<li>'.$info["data"]["producer"][$x].'</li>';
    }
    echo '</ul>';

    echo '<strong>Autoren:</strong>';
    echo '<ul>';
    for($x=0; $x<count($info["data"]["author"]); $x++){
        echo '<li>'.$info["data"]["author"][$x].'</li>';
    }
    echo '</ul>';

    echo '<strong>Regisseure:</strong>';
    echo '<ul>';
    for($x=0; $x<count($info["data"]["director"]); $x++){
        echo '<li>'.$info["data"]["director"][$x].'</li>';
    }
    echo '</ul>';

    echo '<strong>Genre(s):</strong>';
    echo '<ul>';
    for($x=0; $x<count($info["data"]["genre"]); $x++){
        echo '<li>'.$info["data"]["genre"][$x].'</li>';
    }
    echo '</ul>';
    // Display END
?>