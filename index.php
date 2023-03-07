<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Keresztes Hunor</title>
</head>
    <body>
        <?php
            //1. feladat

            echo ujTagekKozeIr("p", null, function() { return "1. feladat"; });
            $db = 5;
            $tomb = tombVeletlenSzammalFeltoltese($db, 69, 420);
            $osszeg = 0;
            foreach ($tomb as $ertek)
            {
                $osszeg += $ertek;
            }
            echo ujTagekKozeIr("p", null, function() use(&$db, &$osszeg) { return "A(z) $db db véletlen szám összege: $osszeg"; });

            //2. feladat

            echo ujTagekKozeIr("p", null, function() { return "2. feladat"; });
            $tomb = tombVeletlenSzammalFeltoltese(3, 1, 5);
            $kiirando = "";
            foreach ($tomb as $jegy)
            {
                $szoveg = "$jegy: ".jegySzovegesMegnevezese($jegy);
                $kiirando .= ujTagekKozeIr("li", null, function() use(&$szoveg) { return $szoveg; });
            }
            echo ujTagekKozeIr("p", null, function() use(&$kiirando) { return ujTagekKozeIr("ul", null, function() use(&$kiirando) { return $kiirando; }); });

            function jegySzovegesMegnevezese($jegy) : string
            {
                switch ($jegy)
                {
                    case 5:
                        return "jeles";
                    case 4:
                        return "jó";
                    case 3:
                        return "közepes";
                    case 2:
                        return "elégséges";
                    default:
                        return "elégtelen";
                }
            }

            //3. feladat

            echo ujTagekKozeIr("p", null, function() { return "3. feladat"; });
            $darabszam = 10;
            $fejIras = ermeDobasok($darabszam);
            $fejekSzama = 0;
            foreach ($fejIras as $fej)
            {
                if ($fej)
                {
                    $fejekSzama++;
                }
            }
            echo ujTagekKozeIr("p", null, function() use(&$darabszam, &$fejekSzama) { return "$darabszam db dobásból $fejekSzama lett fej."; });

            function ermeDobasok($darabszam)
            {
                $fejIras = array();
                for ($i = 0; $i < $darabszam; $i++)
                {
                    $fejIras[] = rand(0, 1) == 0;
                }
                return $fejIras;
            }

            //4. feladat

            echo ujTagekKozeIr("p", null, function() { return "4. feladat"; });
            echo ujTagekKozeIr("article", "id='sakktabla'", function()
            {
                $txt = ujTagekKozeIr("div");
                for ($i = 97; $i <= 104; $i++)
                {
                    $txt .= ujTagekKozeIr("div", null, function() use(&$i) { return ujTagekKozeIr("p", null, function() use(&$i) { return chr($i); }); });
                }
                for ($i = 1; $i <= 8; $i++)
                {
                    $txt .= ujTagekKozeIr("div", null, function() use(&$i) { return ujTagekKozeIr("p", null, function() use(&$i) { return $i; }); });
                    for ($j = 0; $j < 8; $j++)
                    {
                        $txt .= ujTagekKozeIr("div", "class='korvonalas ".(($i + $j) % 2 == 0 ? "feher" : "szurke")."'");
                    }
                }
                return $txt;
            });

            //Általános metódusok

            function tombVeletlenSzammalFeltoltese($db, $alsoHatar, $felsoHatar)
            {
                $tomb = array();
                for ($i = 0; $i < $db; $i++)
                {
                    $tomb[] = rand($alsoHatar, $felsoHatar);
                }
                return $tomb;
            }

            function ujTagekKozeIr($tag, $parameterek = null, $tartalom = null) : string
            {
                return "<$tag".($parameterek ? " $parameterek" : "").">".($tartalom ? $tartalom() : "")."</$tag>";
            }
        ?>
    </body>
</html>