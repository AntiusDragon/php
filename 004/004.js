const { CHAR_LEFT_PARENTHESES } = require("picomatch/lib/constants");

class Kibiras1 {
  constructor() {
    this.akmenuKiekis = 0;
  }
  prideti1Akmeni() {
    this.akmenuKiekis++;
  }
  pridetiDaugAkmenu(kiekis) {
    this.akmenuKiekis += kiekis;
  }
  kiekPririnktaAkmenu() {
    console.log("Akmenu kiekis:", this.akmenuKiekis);
  }
}

const kibiras1 = new Kibiras1();
const kibiras2 = new Kibiras1();
const kibiras3 = new Kibiras1();

kibiras1.prideti1Akmeni();
kibiras1.prideti1Akmeni();
kibiras1.prideti1Akmeni();
kibiras1.pridetiDaugAkmenu(10);

kibiras2.prideti1Akmeni();

kibiras3.prideti1Akmeni();
kibiras3.prideti1Akmeni();
kibiras3.prideti1Akmeni();
kibiras3.prideti1Akmeni();
kibiras3.prideti1Akmeni();
kibiras3.prideti1Akmeni();
kibiras3.prideti1Akmeni();
kibiras3.pridetiDaugAkmenu(100);

kibiras1.kiekPririnktaAkmenu()
kibiras2.kiekPririnktaAkmenu()
kibiras3.kiekPririnktaAkmenu()

console.log('-----');

class Stikline {
    constructor() {
        this.turis = 'turinis';
        this.kiekis = 0;
    }

    ipilti(kiekis) {
        this.kiekis = Math.min(this.turis, this.kiekis + kiekis);
        return this;
    }

    ispilti(kiekis) {
        const kiekis = this.kiekis;
        this.kiekis = 0;
        return kiekis;
    }

    stiklinejeYra() {
        console.log(this.kiekis);
    }
}


const s100 = new Stikline(100);
const s150 = new Stikline(150);
const s200 = new Stikline(200);

s100.ipilti(s200.ipilti(s150.ispilti(500).ispilti()).ispilti);

// s100.stiklinejeYra()
// s150.stiklinejeYra()
// s200.stiklinejeYra()