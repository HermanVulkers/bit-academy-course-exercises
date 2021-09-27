
function timeCalc() {
    let dateTime = new Date();
    document.getElementById("datetime").innerHTML = dateTime.toLocaleTimeString();
}

var intervalID = setInterval(timeCalc, 500);

function bereken() {
    const pi = 3.14;
    let diameter = document.querySelector("#input").value;

    let omtrek = document.querySelector("#input").value * pi;
    document.getElementById("myOmtrek").innerHTML = omtrek;

    console.log(omtrek);

    let oppervlakte = diameter * diameter * pi * 0.25;
    document.getElementById("myOppervlakte").innerHTML = oppervlakte;
}

