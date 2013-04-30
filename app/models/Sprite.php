<?php

class Sprite extends Eloquent
{
    public function createImageData($data)
    {
        if($data != false)
        {
            $colors = explode(';', $data);
            $image  = imagecreatetruecolor(16, 16);
            $x = 0;
            $y = 0;
            foreach($colors as $color)
            {
                if($color == '-')
                {
                    // Transparent pixel:
                    $c = imagecolorallocatealpha($image, 0, 0, 0, 0);
                } else {
                    // Regular color:
                    $a = explode(',', $color);
                    $c = imagecolorallocate($image, $a[0], $a[1], $a[2]);
                }
                imagesetpixel($image, $x, $y, $c);
                $x++;
                if($x == 16)
                {
                    $x = 0;
                    $y++;
                }
            }
            $this->image = $image;
        } else {
            return false;
        }
    }
}
