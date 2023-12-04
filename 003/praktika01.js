// class Kibiras1 {
//     constructor() {
//          this.akmenuKiekis = 0;
//     }
//     prideti1Akmeni() {
//         this.akmenuKiekis++;
//     }
//     pridetiDaugAkmenu(kiekis) {
//         this.akmenuKiekis += kiekis;
//     }
//     kiekPririnktaAkmenu() {
//         console.log(this.akmenuKiekis);
//     }
//     deleteAkmenu() {
//         console.log('dabartinis kiekis', this.akmenuKiekis);
//         this.akmenuKiekis = 0;
//         console.log('ispilamas', this.akmenuKiekis);
//     }
// }

// x1 = new Kibiras1();
// x2 = new Kibiras1();

// x1.pridetiDaugAkmenu(1);
// x2.pridetiDaugAkmenu(5);
// x1.kiekPririnktaAkmenu();
// x2.kiekPririnktaAkmenu();
// x2.deleteAkmenu();

console.log("-----");

// const pinigine = {
//   popieriniai: 0,
//   mateliniai: 1,
// };

// pinigine.mateliniai += 5;
// pinigine.popieriniai += 58;

// function skaiciokBapkes() {
//   return pinigine.popieriniai + pinigine.mateliniai;
// }

// console.log(skaiciokBapkes());

class NaujaPinigine {
  constructor() {
    this.poperiniai = 0;
    this.metaliniai = 0;
  }
  ideti(kiekis){
    if (kiekis > 2) {
        this.poperiniai+= kiekis;
    } else {
        this.metaliniai+=kiekis;
    }
  }
  skaicioti(){
    console.log(this.poperiniai + this.metaliniai);
  }
}

const pinigine1 = new NaujaPinigine;
const pinigine2 = new NaujaPinigine;

console.log('Pries dedant', pinigine1);
pinigine1.ideti(9);
console.log('po dejimo', pinigine1);

pinigine2.ideti(2);

console.log('po dejimo', pinigine1);
