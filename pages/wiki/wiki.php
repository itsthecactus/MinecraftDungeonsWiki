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

<?php
$JSON_FILE = $_COOKIE['file'];
$JSON_PATH = "../../data/".$JSON_FILE.".json";
$JSON_DATA = json_decode(file_get_contents($JSON_PATH), true);


//-------------------------------------------------------------------------------------------------------------------
//LETTERS

echo "<input type='button' value='' class='first null'>";
$chars = str_split($JSON_FILE);
foreach ($chars as $char)
    echo "<input type='button' value='".strtoupper($char)."' class='main letter'>";
echo "</form>";



echo "<table>";

//-------------------------------------------------------------------------------------------------------------------
//CREATING VARIABLES

foreach ($JSON_DATA as $array){
    $img = substr($array['img'], 0, strpos($array['img'], '.png') + 4);
    $name = $array['name'];


    $rarity = 0;
    if (str_contains($array['rarity'], '~'))
        $rarity = 1;

    if (isset($array['power'])) {
        $power = $array['power'];
        $speed = $array['speed'];
        $area_ammo = $array['area/ammo'];
    }

    $properties = str_replace('~', '<br><img class="point" alt="point.svg" src="../../img/buttons/point.svg"> ', $array['properties']);
    $properties = str_replace('^', '<img class="point" alt="point.svg" src="../../img/buttons/point.svg"> ', $properties);

    if (isset($array['enchantments'])) {
        $enchantments = str_replace('~', '<br><img class="point" alt="point.svg" src="../../img/buttons/point.svg"> ', $array['enchantments']);
        $enchantments = str_replace('^', '<img class="point" alt="point.svg" src="../../img/buttons/point.svg"> ', $enchantments);
    }


//-------------------------------------------------------------------------------------------------------------------
    //RARITY

    echo "
    <tr>
    
    <td class='specs'>
    <p class='title'>".$name."</p><br>";

    if($rarity == 0)
        echo "<p class='text rarity unique'>UNIQUE</p><br>";
    else echo "<p class='text rarity common'>COMMON</p><br>
    <p class='text rarity rare'>RARE</p><br>";


//-------------------------------------------------------------------------------------------------------------------
    //STATS

    if(isset($array['power'])) {
        echo "
    <p class='subtitle'>STATS:</p><br>
    <p class='stat text'>";
        for ($i = 0; $i < $power; $i++)
            echo "o";
        echo "</p><br>
    <p class='stat text'>";
        for ($i = 0; $i < $speed; $i++)
            echo "o";
        echo "</p><br>
    <p class='stat text'>";
        for ($i = 0; $i < $area_ammo; $i++)
            echo "o";
        echo "</p><br>";
    }


//-------------------------------------------------------------------------------------------------------------------
    //IMAGE

    echo "</td>
    
    
    <td class='img'>
    <img class='zoom' src='".$img."' alt='".$name."' title='".$name. "'>
    </td>
";


//-------------------------------------------------------------------------------------------------------------------
    //PROPERTIES

    echo "<td class='info'>
    <p>".$properties."</p>
</td>";


//-------------------------------------------------------------------------------------------------------------------
    //ENCHANTMENTS

    if (isset($array['enchantments']) && !empty($enchantments))
        echo "<td class='info'>
            <p>".$enchantments."</p>
        </td>";



echo "</tr>";
}

echo"</table>";
?>
</body>
</html>