class Header extends HTMLElement {
    constructor() {
      super();
    }
  
    connectedCallback() {
      this.innerHTML = `
		<header>

            <div class="files">
                <a class="file" href="index.html" aria-current="page">
                    <span>hermanvulkers.com</span>
                    <img src="images/icon.png">
                </a>
                <a class="file" href="http://www.cloudshots.nl">
                    <span>cloudshots.com</span>
                    <img src="images/Cloudshots_icon.png">
                </a>
            </div>
            
            <button class="themeswitcher" id="themeswitcher">
                <span>Dark</span>
                <img src="images/moon.png" alt="Choose website theme">
            </button>

        </header>

        <div class="navbar">
			<nav class="navleft">
				<span>&lt;</span>
				<a href="blog.html" class="navoption">Blog</a>
				<a href="projects.html" class="navoption">Projects</a>
				<a href="aboutme.html" class="navoption">About Me</a>
				<span>&gt;</span>
				<span class="blinkingdot"> &nbsp;_</span>
            </nav>
        
        </div>
      `;
    }
}
  
customElements.define('header-component', Header);






