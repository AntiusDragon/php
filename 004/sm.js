console.log("Welcome to Set and Maps!");

const array = [];
array.push(10);
array.push(10);
array.push(10);

console.log(array);

const set = new Set();

set.add(10);
set.add(10);
set.add(11);
set.add(7);

set.delete(7);

console.log(set);

console.log(set.has(10, set.size));

// itterate over a set
// for (const item of set) {
//     console.log(item);
// }
// set.forEach(item => console.log(item));

// convert set to array
const setArray = [...set];
console.log(setArray);
// sort array
setArray.sort((a, b) => a - b);
console.log(setArray);
set.clear();

setArray.forEach(item => set.add(item));

console.log(set);

randSet = new Set();
while (randSet.size < 10) {
    randSet.add(rand(0, 11));
}


const map = new Map();

map.set('Petras', 40);
map.set('Jopnas', 39);
map.set('Antanas', 41);
map.set('petras', 42); // overwrites the previous value
map.set({a:1}, 42); // object as a key
map.set([1, 2, 3], 42); // array as a key
map.set([1, 2, 3], 48); // array as a key

for (const item of map) {
    console.log(item);
}


// forEach
map.forEach((value, key) => console.log(key, value));

console.log(map);