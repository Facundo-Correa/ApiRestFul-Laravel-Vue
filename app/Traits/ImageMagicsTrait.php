<?php
namespace App\Traits;

trait ImageMagicsTrait
{

    public static function paletaRojos($paletaimagen, $file)
    {

        $paletaRojos = array('990000', '990033', '660000', '666666', 'FF0033', 'CC0033', 'CC3333');

        $file = $_SERVER['DOCUMENT_ROOT'] . "/images/productos/thumbs/" . $file . ".jpg";

        if (is_array($paletaimagen)) {

            foreach ($paletaimagen as $color) {


                if (in_array($color, $paletaRojos)) {

                    $im = imagecreatefromjpeg($file);

                    imagefilter($im, IMG_FILTER_GRAYSCALE);

                    $src = imagejpeg($im, $file);


                }
            }
        }

        return $src;
    }

    public static function colorPalette($imageFile, $numColors, $granularity = 5)
    {

        $granularity = max(1, abs((int)$granularity));
        $colors = array();

        $size = @getimagesize(trim($imageFile));

        if ($size === false) {
            user_error("Unable to get image size data");
            return false;
        }

        $img = @imagecreatefromstring(file_get_contents($imageFile));

        if (!$img) {
            user_error("Unable to open image file");
            return false;
        }
        for ($x = 0; $x < $size[0]; $x += $granularity) {
            for ($y = 0; $y < $size[1]; $y += $granularity) {
                $thisColor = imagecolorat($img, $x, $y);
                $rgb = imagecolorsforindex($img, $thisColor);
                $red = round(round(($rgb['red'] / 0x33)) * 0x33);
                $green = round(round(($rgb['green'] / 0x33)) * 0x33);
                $blue = round(round(($rgb['blue'] / 0x33)) * 0x33);
                $thisRGB = sprintf('%02X%02X%02X', $red, $green, $blue);

                if (array_key_exists($thisRGB, $colors)) {
                    $colors[$thisRGB]++;
                } else {
                    $colors[$thisRGB] = 1;
                }
            }
        }
        arsort($colors);
        return array_slice(array_keys($colors), 0, $numColors);
    }

    public static function getPhoto($id)
    {
        $file = "http://www.mlrepuestos.com.ar/images/productos/thumbs/" .$id. ".jpg";

        $file_headers = @get_headers($file);
        //$file_headers[0] ='HTTP/1.1 404 Not Found';

        if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
            $src = "images/productos/thumbs/1_thumb.png";

        } else {

            $src = $file;
        }
        return $src;
    }
}

?>
