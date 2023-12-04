function A() {
    const randomSk1 = Math.floor(Math.random() * 11) + 10;
    const array1 = [];

    for (let i = 0; i < randomSk1; i++) {
        array1.push(Math.floor(Math.random() * 11));
    }
    array1.push(0);

    // return randomSk1;
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