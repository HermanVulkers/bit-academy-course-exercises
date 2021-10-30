const button = document.querySelector(".themeswitcher");

button.addEventListener("click", function () {
    if (document.body.classList.contains("light-theme")) {
        // Turn light mode off
        document.body.classList.toggle("light-theme");
        document.getElementById('themeswitcher').innerHTML = `<span>Dark</span><img src="images/moon.png" alt="Choose website theme">`;
    } else {
        // Turn light mode on
        document.body.classList.toggle("light-theme");
        document.getElementById('themeswitcher').innerHTML = `<span>Light</span><img src="images/sunrise.png" alt="Choose website theme"></img>`;
        
        localStorage.setItem("mykey","myvalue");
    }
});




