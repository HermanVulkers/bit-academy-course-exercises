const button = document.querySelector(".themeswitcher");

const theme = localStorage.getItem("theme");

if (theme) {
	document.body.classList.toggle ("light-theme", theme === "light");
}

button.addEventListener("click", function () {
	const light = document.body.classList.contains("light-theme")
	document.getElementById('themeswitcher').innerHTML = `<span>${light? 'Dark' : 'Light'}</span><img src="images/${light? 'moon' : 'sunrise'}.png" alt="Choose website theme">`;
	document.body.classList.toggle("light-theme");
	localStorage.setItem("theme", light ? "dark" : "light");
});





