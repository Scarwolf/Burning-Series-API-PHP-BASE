<!DOCTYPE html>
<html>
<head lang="de">
    <meta charset="UTF-8">
</head>
<body>
<?php
    $json_file = file_get_contents('https://www.burning-seri.es/api/series');
    $ser = json_decode($json_file, true);

    for($i=0; $i<count($ser); $i++){
        echo '['.$i.'] | <strong>Name: </strong><a href="views.php?id='.$ser[$i]['id'].'">'.$ser[$i]['series'].'</a> | <strong>ID: </strong>'.$ser[$i]['id'].'<br>';
        // 0 | Name: [Link]Serienname[/Link] | SerienID
    }
?>
</body>
</html>
