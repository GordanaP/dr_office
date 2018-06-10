<?php

namespace App\Services\Utilities;

class ProfileTitles
{
    /*
    *  A list of title
    */
    protected static $titles = [
      'MD' => "MD",
      'Ass. Prof.' => "Ass. Prof",
      'Assoc. Prof.' => "Assoc. Prof.",
      'Prof.' => "Prof.",
    ];


    /**
     * All titles
     *
     * @return arry
     */
    public static function all()
    {
        return static::$titles;
    }

    public static function getArray() {

      $titles = array_keys(static::$titles);

      $titlesArray = implode(',', $titles);

      return $titlesArray;

    }
}