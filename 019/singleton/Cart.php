<?php

class Cart {
    private static $CartObject;
    
    public static function getCart() {
        return self::$CartObject ?? self::$CartObject = new self;
    }

    private function __construct(){
    }

    private function __clone() {
    }
    private function __serialize() {
    }

    // ----- ----- ----- -----

    // public $number;

    // public static function getCart($number) {
    //     return new self($number);
    // }

    // private function __construct($number){
    //     $this->number = $number;
    // }
}