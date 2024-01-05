<?php

class Tv {
    static public $kanalai = ['TV3', 'LNK', 'LRT', 'Polonia1'];
    static private $visiVelevizoriai = [];

    public $istrizaine;
    public $gamintojas;
    public $savininkas;
    private $kanalas = 'nenustatytas';

    static public function kaistiKanalus($naujiKanalai) {
        self::$kanalai = $naujiKanalai;
        foreach (self::$visiVelevizoriai as $tv) {
            echo 'Kaiciam kanalus televizoriui' . $tv->gamintojas . '<br>';
        }
    }

    public function __construct($gamintojas, $savininkas) {
        $this->gamintojas = $gamintojas;
        $this->savininkas = $savininkas;
        self::$visiVelevizoriai[] = $this;
    }

    public function perjungtiPrograma($kanaloNumeris) {
        if ($kanaloNumeris < 1 || $kanaloNumeris > count(self::$kanalai)) {
            return;
        }
        $this->kanalas = self::$kanalai[$kanaloNumeris - 1];
    }

    public function kaRodo() {
        echo $this->savininkas . ' siuo metu ziuri ' . $this->kanalas . ' per ' . $this->gamintojas . ' televizoriu<br>';
    }

    public function hack($ka) {
        foreach (self::$visiVelevizoriai as $tv) {
            if ($tv->savininkas == $ka) {
                $tv->kanalas = 'HACKED';
            }
        }
    }
}