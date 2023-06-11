<?php

namespace App\Utilities;

use Storage;

class Helpers{

    public static function formatCurrency($number = 0, $unit = 'Rp', $isSuffixUnit = false, $decimal = 0)
    {
        if ($isSuffixUnit) {
            return number_format($number, $decimal, ',', '.') . ' ' . $unit;
        } else {
            return $unit . ' ' . number_format($number, $decimal, ',', '.');
        }
    }
    public static function uploadImage($dir, $file = null)
    {
        if ($file) {
            $path = Storage::disk('local')->putFile('public/'.$dir, $file, 'public');
            return Storage::url($path);
        }
        return null;
    }
}
