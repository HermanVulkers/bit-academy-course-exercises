var person = {
    naam: "Zara",
    score: 36,
    begindatum: "21 januari 2016",
    vrienden: [
        "Mika",
        "Josef",
        "Maria",
        "Sumail",
        "Lotte",
    ],
    gekwalificeerd: true,
};

person = JSON.stringify(person);

console.log(person);