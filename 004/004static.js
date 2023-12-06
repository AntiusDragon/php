class Pav1 {

  static channels = channels = ["LRT", "TV3", "LNK", "Polonia", "Discovery", "Animal Planet",];

  static listChannels() {
    console.log('Available channels:');
    for (const channel of this.channels) {
      console.log(channel);
    }
  }

  constructor(brand, owner) {
    this.brand = brand;
    this.owner = owner;
  }
  changeChannel(number) {
    tconsole.log("Changing channel..." + this.constructor.channels[number]);
  }

  whatChennelsList() {
    this.constructor.listChannels();
  }
}


const petras = new TouchEvent("Samsing", "Petras");
const maryte = new TouchEvent("LG", "Maryte");
const bebras = new TouchEvent("Sony", "Bebras");

petras.changeChannel(2);
maryte.changeChannel(3);
bebras.changeChannel(5);

const newChannels = ['MTV', 'VH1', 'CNN', 'Fox', 'BBC', 'TV6'];

petras.changeChannel(2);
maryte.changeChannel(3);
bebras.changeChannel(5);

TV.listChannels();
bebras.whatChennelsList();

console.log(bebras);