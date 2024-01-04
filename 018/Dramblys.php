<?php

class Dramblys extends ManoAfrika{
    public $pavadinimas = 'Dramblys';
    public $spalva = 'pilkas';
    public $svoris = 'nezinomas'; // dar napsverem
    public $socialinisTinklas = 'Instagram';
    
    public function __construct() {
        echo 'Hello, Dramblys' . '<br>';
    }

    // public function __construct() {
    //     echo '<h1>DRAMBLYS<h1>';
    //     echo $this->mano;
    // }
}