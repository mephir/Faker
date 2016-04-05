<?php

namespace Faker\Provider\en_AE;

use Faker\Provider\Image;

class Image extends Image
{
    protected static $categories = array(
        'abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife',
        'fashion', 'people', 'nature', 'sports', 'technics', 'transport'
    );

    /**
     * Download a remote random image to disk and return its location
     *
     * Requires curl, or allow_url_fopen to be on in php.ini.
     *
     * @example '/path/to/dir/13b73edae8443990be1aa8f1a483bc27.jpg'
     */
    public static function image($dir = null, $width = 640, $height = 480, $category = null, $fullPath = true, $randomize = true, $word = null)
    {
        if (!function_exists('imagecreate')) {
            throw new \DomainException("GD extension not installed or enabled");
        }

        $dir = is_null($dir) ? sys_get_temp_dir() : $dir; // GNU/Linux / OS X / Windows compatible
        // Validate directory path
        if (!is_dir($dir) || !is_writable($dir)) {
            throw new \InvalidArgumentException(sprintf('Cannot write to directory "%s"', $dir));
        }

        // Generate a random filename. Use the server address so that a file
        // generated at the same time on a different server won't have a collision.
        $name = md5(uniqid(empty($_SERVER['SERVER_ADDR']) ? '' : $_SERVER['SERVER_ADDR'], true));
        $filename = $name .'.jpg';
        $filepath = $dir . DIRECTORY_SEPARATOR . $filename;

        $image = imagecreatetruecolor($width, $height);

        for($x = 0; $x < $width; $x++) {
            for($y = 0; $y < $height; $y++) {
                $c1 = mt_rand(50,200);
                $c2 = mt_rand(50,200);
                $c3 = mt_rand(50,200);

                imagesetpixel($image, $x, $y, imagecolorallocate($image, $c1, $c2, $c3));
            }
        }

        imagejpeg($image, $filepath);


        return $fullPath ? $filepath : $filename;
    }
}
