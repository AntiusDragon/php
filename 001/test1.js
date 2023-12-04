const { kMaxLength } = require("buffer");

const numberA = [5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25];
let sumA = 0;

numberA.forEach(element => sumA += element);
console.log(sumA);

const sumB = sumA + '';
console.log(sumB);

let numberC = '';
numberA.forEach(numberA1 => kMaxLength === numberA1 ? (numberC += numberA1 + '1') : numberC += (numberA1 + ' '));
console.log(numberC);
function A() {
    const randomSk1 = Math.floor(Math.random() * 11) + 10;
    const array1 = [];

    for (let i = 0; i < randomSk1; i++) {
        array1.push(Math.floor(Math.random() * 11));
    }
    array1.push(0);

    return array1;
}

const a = A();
console.log(a);

// function B() {
//     const randomSk2 = Math.floor(Math.random() * 21) + 10;
//     const array2 = [];

//     for (let i = 0; i < randomSk2; i++) {
//         array2.push(A());
//     }

//     return array2;
// }

// const b = B();
// console.log(b);
  