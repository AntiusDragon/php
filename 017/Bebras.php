<?php

class Bebras {
    public $spalva = 'rudas';
    private $svoris = 'nezinomas'; // dar nepasverem
    private $ugis = 1.0; // metais

    public function __construct() { // atcpausdina pradžioje
        echo '<br>Bebras atėjo<br>';
    }
    public function __destruct() { // atcpausdina pabaigoje
        echo '<br>Bebras išėjo<br>';
    }

    public function __toString(): string {
        return "<br>Bebras spalvos: $this->spalva, ugis: $this->ugis, svoris: $this->svoris<br>";
    }

    public function  __invoke() {
        echo '<br>Brebras sako:<br>';
        echo 'Labas<br>';
    }

    public function __serialize(): array {
        return [
            'ugis' => $this->ugis,
            'svoris' => $this->svoris,
        ];
    }

    public function __unserialize(array $data): void {
        $this->ugis = $data['ugis'] * 2;
        $this->svoris = $data['svoris'];
    }

    public function __get($prop) {
        return match($prop) {
            'ugis' => $this->ugis . ' metrai',
            'svoris' => $this->svois . ' kg',
            'uodega' => $this->goKaramba(),
            default => null
        };
    }

    private function goKaramba() {
        return 'uodega: ' . rand(20, 30) . ' cm';
    }

    // public function __get($prop) {
    //     if (!in_array($prop, ['svopris'])) {
    //         return;
    //     }
    //     return $this->$prop . ' kg';
    // }

    // public function __get($prop) {
    //     if ($prop == 'svoris') {
    //         return $this->svoris . ' kg';
    //     }
    // }

    // getter'is
    public function koksSvoris() {
        return $this->svoris;
    }

    // setter'is
    public function duotiMaisto($kg) {
        if ( $kg > 5) {
            echo 'Per daug <br>';
            return;
        }
        if ($kg < 0.1) {
            echo 'Per mazai <br>';
            return;
        }
        if ($kg + $this->svoris > 45) {
            echo 'Bebras jau storas <br>';
            return;
        }
        echo 'Bebras pašertas <br>';
        $this->svoris = $this->svoris + $kg;
    }

    public function pasverti() {
        $this->svoris = rand(5, 45);
    }
    
}