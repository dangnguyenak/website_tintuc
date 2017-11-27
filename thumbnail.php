<?php

class class_check
{
    function load_img($filename)
    {

        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if ($this->image_type == IMAGETYPE_JPEG) {

            $this->image = imagecreatefromjpeg($filename);
        } elseif ($this->image_type == IMAGETYPE_GIF) {

            $this->image = imagecreatefromgif($filename);
        } elseif ($this->image_type == IMAGETYPE_PNG) {

            $this->image = imagecreatefrompng($filename);
        }
    }

    function save_img($filename, $image_type = IMAGETYPE_JPEG, $compression = 75, $permissions = null)
    {

        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image, $filename, $compression);
        } elseif ($image_type == IMAGETYPE_GIF) {

            imagegif($this->image, $filename);
        } elseif ($image_type == IMAGETYPE_PNG) {

            imagepng($this->image, $filename);
        }
        if ($permissions != null) {

            chmod($filename, $permissions);
        }
    }

    function output_img($image_type = IMAGETYPE_JPEG)
    {

        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image);
        } elseif ($image_type == IMAGETYPE_GIF) {

            imagegif($this->image);
        } elseif ($image_type == IMAGETYPE_PNG) {

            imagepng($this->image);
        }
    }

    function getWidth_img()
    {

        return imagesx($this->image);
    }

    function getHeight_img()
    {

        return imagesy($this->image);
    }

    function resizeToHeight_img($height)
    {

        $ratio = $height / $this->getHeight_img();
        $width = $this->getWidth_img() * $ratio;
        $this->resize_img($width, $height);
    }

    function resizeToWidth_img($width)
    {
        $ratio = $width / $this->getWidth_img();
        $height = $this->getHeight_img() * $ratio;
        $this->resize_img($width, $height);
    }

    function scale_img($scale)
    {
        $width = $this->getWidth_img() * $scale / 100;
        $height = $this->getHeight_img() * $scale / 100;
        $this->resize_img($width, $height);
    }

    function resize_img($width, $height)
    {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth_img(), $this->getHeight_img());
        $this->image = $new_image;
    }
}

header('Content-Type: image/jpeg');
$check = new class_check();
$link = addslashes($_REQUEST['link']);
$width = intval($_REQUEST['width']);
$height = intval($_REQUEST['height']);
$check->load_img($link);
$check->resize_img($width, $height);
$check->output_img();

?>