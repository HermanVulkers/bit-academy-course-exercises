const quizQuestions = [
    "Wat is de hoofdstad van Frankrijk?",
    "Hoeveel benen heeft een spin?",
    "Wat is het grootste meer van Nederland?",
    "Noem een Duits automerk",
    "Noem een Waddeneiland",
    "In hoeveel dagen draait de aarde om de zon?",
    "Wat is de grootste oceaan ter wereld?",
];
const correctAnswers = [
    "Parijs",
    8,
    "IJsselmeer",
    ["Volkswagen", "Audi", "Opel", "Porsche", "BMW", "Mercedes", "Mercedes-Benz"],
    ["Texel", "Vlieland", "Terschelling", "Ameland", "Schiermonnikoog"],
    365,
    "Stille Oceaan",
];

document.getElementById("question0").innerHTML = quizQuestions[0];
document.getElementById("question1").innerHTML = quizQuestions[1];
document.getElementById("question2").innerHTML = quizQuestions[2];
document.getElementById("question3").innerHTML = quizQuestions[3];
document.getElementById("question4").innerHTML = quizQuestions[4];
document.getElementById("question5").innerHTML = quizQuestions[5];
document.getElementById("question6").innerHTML = quizQuestions[6];

function check() {
    let numberCorrect = 0;

    var answer = document.querySelector("#input0").value;
    if (correctAnswers[0] == answer) {
        numberCorrect++;
    }

    answer = document.querySelector("#input1").value;
    if (correctAnswers[1] == answer) {
        numberCorrect++;
    }

    answer = document.querySelector("#input2").value;
    if (correctAnswers[2] == answer) {
        numberCorrect++;
    }

    answer = document.querySelector("#input3").value;
    if (correctAnswers[3].includes(answer) == true) {
        numberCorrect++;
    }

    answer = document.querySelector("#input4").value;
    if (correctAnswers[3].includes(answer) == true) {
        numberCorrect++;
    }

    answer = document.querySelector("#input5").value;
    if (correctAnswers[5] == answer) {
        numberCorrect++;
    }

    answer = document.querySelector("#input6").value;
    if (correctAnswers[6] == answer) {
        numberCorrect++;
    }
    document.getElementById("punten").innerHTML = "Je hebt " + numberCorrect + " punten gescoord.";
}


