const requestUrl = 'https://mdn.github.io/learning-area/javascript/oojs/json/superheroes.json';

function requestJSON(url) {
    let request = new XMLHttpRequest();
    request.open('GET', url);
    request.send();
    request.onload = function () {
        let response = request.response;
        processResponse(response);
    }
}

function sendRequest() {
    requestJSON(requestUrl);
}

function processResponse(response) {
    var responseParsed = JSON.parse(response);
    console.log(responseParsed);
    document.getElementById("squadName").innerHTML = responseParsed.squadName;
    document.getElementById("homeTown").innerHTML = responseParsed.homeTown;
    document.getElementById("formed").innerHTML = responseParsed.formed;
    document.getElementById("secretBase").innerHTML = responseParsed.secretBase;
    document.getElementById("active").innerHTML = responseParsed.active;

    var members = responseParsed.members;
    
    for (i = 0; i < members.length; i++) {
        addRow('member-table', members[i]);
    }

    function addRow(tableID, member) {
        let tableRef = document.getElementById(tableID);
        let newRow = tableRef.insertRow(-1);
        for (let prop in member) {
            let newCell = newRow.insertCell(-1);
            let newText = document.createTextNode(member[prop]);
            newCell.appendChild(newText);
        }
    }
}

sendRequest();
