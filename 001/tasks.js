const farm = [
  "Cow",
  "Pig",
  "Chicken",
  "Dog",
  "Cat",
  "Cow",
  "Horse",
  "Sheep",
  "Goat",
  "Cow",
  "Duck",
  "Cat",
  "Turkey",
];

// Kindergarder
let sum = 0;
for (let i = 0; i < farm.length; i++) {
  if ("Cow" === farm[i]) {
    sum += 1;
  }
}
console.log("ats:", sum);

console.log("-----");

// Minddle school
let cowsSum2 = 0;
for (const animal of farm) {
  if (animal === "Cow") {
    cowsSum2++;
  }
}
console.log();

// High school
let cowsSum3 = 0;
farm.forEach((animal) => (animal === "Cow" ? cowsSum3++ : null));

// University
let cowsSum4 = 0;
farm.forEach((animal) => animal === "Cow" && cowsSum4);
console.log("cowsSum4", cowsSum4);

console.log("-----");

const farm2 = [
  { name: "Cow", age: 5 },
  { name: "Pig", age: 3 },
  { name: "Chicken", age: 1 },
  { name: "Dog", age: 2 },
  { name: "Cat", age: 4 },
  { name: "Cow", age: 7 },
  { name: "Horse", age: 4 },
  { name: "Sheep", age: 6 },
  { name: "Goat", age: 3 },
  { name: "Cow", age: 2 },
  { name: "Duck", age: 1 },
  { name: "Cat", age: 2 },
  { name: "Turkey", age: 3 },
];

let farm2sum1 = 0;
for (let i = 0; i < farm2.length; i++) {
  if ("Cow" === farm2[i].name) {
    farm2sum1 += farm2[i].age;
  }
}

console.log("ats2:", farm2sum1);

let farm2sum2 = 0;
farm2.forEach(
  (animal2) => animal2.name === "Cow" && (farm2sum2 += animal2.age)
);
console.log("ats2:", farm2sum2);

console.log("-----");

let A = 5;
let B = A;

A = 10;

console.log("A", A);
console.log("B", B);

let C = { value: 5 };
let D = C;

C.value = 10;

console.log("C", C);
console.log("D", D);

let E = 12;
let F = 12;

console.log(E === F);

let G = { value: 12 };
let H = { value: 12 };

console.log(G === H);

// res and spread

// ,,,,,,,,,,, => [] rest
// {} => ,,,,,,,,,,, spread

const Sum = (...numbers) => {
  console.log("numbers", numbers);
  let result = 0;
  for (const number of numbers) {
    result += number;
  }
  console.log("result", result);
};

Sum(5, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20);

let V = { value: 5, name: 'Vasya', age: 25, hasCat: true };
let I = { age: 44,  ...V, hasCat: false };

V.value = 10;

console.log('V', V);
console.log('I', I);

const mas1 = [1, 2, 3, 4, 5];
const obj1 = { value: 5, name: "Vasya", age: 25 };

const [T, M] = mas1;

console.log(T);
console.log(M);

// console.log('age', age);
// console.log('what', what);
