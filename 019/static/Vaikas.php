<?php

class Vaikas extends Tevas {
    static public $socialinisTinklas = 'TikTok';

    static public function kaSkrolinaVaikas() {
        echo 'Skropinu ' . self::$socialinisTinklas . '<br>';
        echo 'Skropinu ' . static::$socialinisTinklas . '<br>';
    }
}