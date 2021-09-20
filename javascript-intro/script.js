console.log('Hello world!');

console.log(document.location);
console.log(document.doctype);
console.log(document.title);

document.querySelector("h1").innerHTML = document.title;

document.querySelector("h1").classList.add("leukeClass");

const matches = document.querySelectorAll("p");

console.log(matches);

matches.forEach((match) => {
    match.classList.add("leukeClass2");
});

document.querySelector("button");

var colorWell;
var defaultColor = "#0000ff";

window.addEventListener("load", startup, false);

function startup() {
    colorWell = document.querySelector("#colorWell");
    colorWell.value = defaultColor;
    colorWell.addEventListener("input", updateFirst, false);
    colorWell.addEventListener("change", updateAll, false);
    colorWell.select();
  }