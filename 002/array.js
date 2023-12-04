console.log('Hello from castle!');

const colors = [
    'pink',
    'orange',
    'yellow',
    'pink',
    'blue',
    'indigo',
    'pink',
];

const  colors1 = [...colors];
const  colors2 = [...colors];

let a = [];

colors1.forEach((color, idx) => {color === 'pink' ? colors1[idx] = 'black' : color});

console.log(colors1);

const colors3 = colors.map(color => color === 'pink' ? 'skyblue' : color);
console.log(colors3);

const colors21 = [
    { name: 'pink' },
    { name: 'orange' },
    { name: 'yellow' },
    { name: 'pink' },
    { name: 'blue' },
    { name: 'indigo' },
    { name: 'pink' },
];
const colors22 = colors21.map(color => color.name === 'pink' ? {name: 'black'} : color);
console.log(colors22);

const colors31 = [
    {name: 'pink', age: 12},
    {name: 'orange', age: 13},
    {name: 'yellow', age: 14},
    {name: 'pink', age: 15, tractor: 'John Deere'},
    {name: 'blue', age: 16},
    {name: 'indigo', age: 17},
    {name: 'pink', age: 18}
];

const colors32 = colors31.map(color => color.name === 'pink' ? {... color, name: 'black'} : {...color});
const colors33 = colors31.map(color => ({...color, name: 'black'}));

colors31[0].age = 100;
colors31[1].age = 100;

console.log('31', colors31);
console.log('32', colors32);
console.log('33', colors33);

console.log('------');

const cats = [
    {name: 'Tomas', age: 12},
    {name: 'Pukis', age: 13},
    {name: 'Juodis', age: 14},
    {name: 'Margis', age: 15, tractor: 'John Deere'},
    {name: 'Ryzas', age: 16},
    {name: 'Pukis', age: 17},
    {name: 'Pukis', age: 18}
];

const cats1 = cats.filter(list => list.name !== 'Pukis');
console.log('catis1', cats1);

console.log('------');

const cats02 = [
    {name: 'Tomas', age: 12},
    {name: 'Juodis', age: 13},
    {name: 'Juodis', age: 14},
    {name: 'Margis', age: 15, tractor: 'John Deere'},
    {name: 'Ryzas', age: 16},
    {name: 'Pukis', age: 17},
    {name: 'Juodis', age: 18}
];

const cats2 = cats02
    .filter(list => list.name !== 'Juodis')
    .map(cat => ({...cat, age: cat.age + 1 }));

console.log('catis2',cats2);

let counter = 0; 

const what = 1;

const j1 = cats02.find((cat, idx) => {
    if (cat.name === 'Juodis') {
        counter++;
    }
    return counter === what;
})
const j2 = cats02.find(cat => cat.name === 'Juodis' && ++counter === what) ?.age;

console.log('counter', counter);
console.log('counter', j1);
console.log('counter', j2);

// const asd = null;
let asd;
console.log(asd?.what);