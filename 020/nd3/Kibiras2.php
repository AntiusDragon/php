<?php

class Kibiras2 {
    private $akmenuKiekis = 0;
    static private $akmenuKiekisViduoseKibiruose = 0;
    
    public function prideti1Akmeni() {
        $this->akmenuKiekis++;
        self::$akmenuKiekisViduoseKibiruose++;
    }

    public function pridetiDaugAkmenu($kiekis) {
        if (!is_integer($kiekis)) {
            return;
        }
        if ($kiekis < 0) {
            return;
        }
        $this->akmenuKiekis += $kiekis;
        self::$akmenuKiekisViduoseKibiruose += $kiekis;
    }

    public function kiekPririnktaAkmenu() {
        return $this->akmenuKiekis;
    }

    public function kiekVisoPririnktaAkmenu() {
        return self::$akmenuKiekisViduoseKibiruose;
    }
}