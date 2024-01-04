<?php

class Krokodilas extends ManoAfrika {
    public $pavadinimas = 'Krokodilas';
    public $spalva = 'zalias';
    public $svoris = 'nezinomas'; // dar nepasverem
    public $socialinisTinklas = 'TikTok';

    public function __construct() {
        echo 'Hello, Krokodilas' . '<br>';
    }

    public function padainuok() {
        echo 'Krokodilas dainuoja' . '<br>';
        parent::padainuok();
    }
}