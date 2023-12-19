<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weapons</title>
    <link rel="icon" type="image/x-icon" href="/img/main_icon.png">
    <link rel="stylesheet" type="text/css" href="../../style/style_wiki.css">
</head>
<body>
<form action="../main_page.php">
    <input type="submit" value="" class="main button zoom">
</form>

<?php
$JSON_PATH = "../../data/artifacts.json";
$JSON_DATA = json_decode(file_get_contents($JSON_PATH), true);

echo "<table>";

foreach ($JSON_DATA as $array){
    $img = substr($array['img'], 0, strpos($array['img'], '.png') + 4);
    $name = $array['name'];

    $rarity = 0;
    if(str_contains($array['rarity'], '~'))
        $rarity = 1;

    $properties = str_replace('~', '<br>🔷 ', $array['properties']);
    $properties = str_replace('%', '🔷 ', $properties);

    echo "
    <tr>
    <td>
    <img class='input img zoom' src='".$img."' alt='".$name."' title='".$name. "'>
    </td>
    
    
    <td class='info'>
    <p class='title'>RARITY:</p>";
    if($rarity == 0)
        echo "<p class='text unique'>UNIQUE</p>
    </td>";
    else echo "<p class='text common'>COMMON</p>
    <p class='text rare'>RARE</p>
    </td>";


    echo "<td>
    <p class='info'>".$properties."</p>
</td>";



    echo "</tr>";
}

echo"</table>";
?>
</body>
</html>