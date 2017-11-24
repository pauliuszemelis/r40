<html
    <head>
        <title>R40 spyruoklių pasirinkimas</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
        echo "      <b><pre>
        R40 spyruoklių parinkimas </b>
        <form action = 'r40.php' method = 'POST'>
        Vartų svoris:  <input name = 'vartusvoris' /><br>
        Vartų aukštis: <input name = 'vartuaukstis' /><br><br>
        <input type = 'submit' value = 'Skaičiuoti' />
        </form>
</pre>
        ";
        if (isset($_POST['vartuaukstis']) and ! empty($_POST['vartuaukstis'])) {

            $vartuaukstis = $_POST['vartuaukstis'];
            $vartusvoris = $_POST['vartusvoris'];

            echo "
        Vartų aukštis: <b>$vartuaukstis mm</b><br>
        Vartų svoris: <b>$vartusvoris kg</b><br><br><br>";

            $duom1 = array('id' => '1', 'pav' => '30x3x720', 'DD' => '27', 'd' => '3', 'G' => '78800', 'n' => '223', 'F0' => '20');
            $duom2 = array('id' => '2', 'pav' => '40.75x3.75x720', 'DD' => '37', 'd' => '3.75', 'G' => '78800', 'n' => '177', 'F0' => '20');
            $duom3 = array('id' => '3', 'pav' => '28x3x700', 'DD' => '25', 'd' => '3', 'G' => '81500', 'n' => '219', 'F0' => '20');
            $duom4 = array('id' => '4', 'pav' => '40x4x700', 'DD' => '36', 'd' => '4', 'G' => '81500', 'n' => '159', 'F0' => '20');
            $duom5 = array('id' => '5', 'pav' => '40x4x720', 'DD' => '36', 'd' => '4', 'G' => '78800', 'n' => '166', 'F0' => '20');
            $duom6 = array('id' => '6', 'pav' => '37x4x720', 'DD' => '33', 'd' => '4', 'G' => '78800', 'n' => '166', 'F0' => '20');
            $duom7 = array('id' => '7', 'pav' => '42.5x4.5x720', 'DD' => '38', 'd' => '4.5', 'G' => '81500', 'n' => '149', 'F0' => '20');

            $sp1 = (($vartuaukstis / 2) * $duom1['G'] * $duom1['d'] ** 4) / (8 * $duom1['n'] * $duom1['DD'] ** 3) + $duom1['F0'];
            $sp2 = (($vartuaukstis / 2) * $duom2['G'] * $duom2['d'] ** 4) / (8 * $duom2['n'] * $duom2['DD'] ** 3) + $duom2['F0'];
            $sp3 = (($vartuaukstis / 2) * $duom3['G'] * $duom3['d'] ** 4) / (8 * $duom3['n'] * $duom3['DD'] ** 3) + $duom3['F0'];
            $sp4 = (($vartuaukstis / 2) * $duom4['G'] * $duom4['d'] ** 4) / (8 * $duom4['n'] * $duom4['DD'] ** 3) + $duom4['F0'];
            $sp5 = (($vartuaukstis / 2) * $duom5['G'] * $duom5['d'] ** 4) / (8 * $duom5['n'] * $duom5['DD'] ** 3) + $duom5['F0'];
            $sp6 = (($vartuaukstis / 2) * $duom6['G'] * $duom6['d'] ** 4) / (8 * $duom6['n'] * $duom6['DD'] ** 3) + $duom6['F0'];
            $sp7 = (($vartuaukstis / 2) * $duom7['G'] * $duom7['d'] ** 4) / (8 * $duom7['n'] * $duom7['DD'] ** 3) + $duom7['F0'];

            $kom1 = ($sp1 + $sp2) / 9.8;
            $kom2 = ($sp1 + $sp5) / 9.8;
            $kom3 = ($sp3 + $sp4) / 9.8;
            $kom4 = ($sp3 + $sp6) / 9.8;
            $kom5 = ($sp3 + $sp7) / 9.8;

            $sk0 = $kom1-$vartusvoris;
            $sk1 = $kom2-$vartusvoris;
            $sk2 = $kom3-$vartusvoris;
            $sk3 = $kom4-$vartusvoris;
            $sk4 = $kom5-$vartusvoris;

            $r40sp0 = array("id" => "30x3x720; 40,75x3,75x720", "kg" => $sk0);
            $r40sp1 = array("id" => "30x3x720; 40x4x720", "kg" => $sk1);
            $r40sp2 = array("id" => "28x3x700; 40x4x700", "kg" => $sk2);
            $r40sp3 = array("id" => "28x3x700; 37x4x720", "kg" => $sk3);
            $r40sp4 = array("id" => "28x3x700; 42,5x4,5x720", "kg" => $sk4);

            $arr = [$r40sp0["kg"], $r40sp1["kg"], $r40sp2["kg"], $r40sp3["kg"], $r40sp4["kg"]];
            $spyr = [$r40sp0, $r40sp1, $r40sp2, $r40sp3, $r40sp4];
            $spy = [$r40sp0["id"], $r40sp1["id"], $r40sp2["id"], $r40sp3["id"], $r40sp4["id"]];

            $k = count($arr);
            for ($i = 0; $i < $k; ++$i) {
                $o = $i + 1;
                echo "<pre><b>".round($arr[$i], 2)."</b>    kg su spyruoklėm - $spy[$i]<br></pre>";
                
            }
            echo '<br><br>';
            $array = array();
            $d = count($spyr);
            for ($a = 0; $a < $d; ++$a) {
                if ($arr[$a] <= 4 and $arr[$a] >= -8) {
                    $spyr[$a]['kg'] = abs($spyr[$a]['kg']);
                    $array[$a] = $spyr[$a];
                    echo "Tinkamos spyruoklės - $spy[$a]<br>";
                } else {
                   // echo 'Spyruoklės netinka<br>';
                }
            }

            function pre_print_r($val) {
                echo '<pre>';
                print_r($val);
                echo '</pre>';
            }

            $c = count($array);

            echo "<br><br>Jums tinka $c spyruoklė(s)<br>";


            usort($array, function($v1, $v2) {
                return $v1['kg'] < $v2['kg'];
            });

            $tinkamiausia = array_pop($array);
            extract($tinkamiausia);


            echo "Labiausiai tinkančios - <b>" . $id . "</b>";
        }
        ?>
    </body>
</html>