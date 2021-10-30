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
                </a>
                <a class="file" href="http://www.cloudshots.nl">
                    <span>cloudshots.com</span>
                </a>
            </div>
            
            <button class="themeswitcher" id="themeswitcher">
                <span>Dark</span>
                <img src="images/moon.png" alt="Choose website theme">
            </button>

        </header>

        <div class="navbar">
            <nav class="navleft">
                <a href="blog.html" class="tooltip"><img src="images/blog.png" alt="Blog"><span class="tooltiptext">Blog</span></a>
                <a href="projects.html" class="tooltip"><img src="images/projects.png" alt="Projects"><span class="tooltiptext">Projects</span></a>
                <a href="aboutme.html" class="tooltip"><img src="images/aboutme.png" alt="About Me"><span class="tooltiptext">About Me</span></a>
            </nav>
            <nav class="navright">
                <a href="https://github.com/hermanvulkers" target="_blank" rel="noopener noreferrer" class="tooltipright"><img src="images/github-11-48.png" alt="GitHub"><span class="tooltiptextright">GitHub</span></a> 
            </nav>
        </div>
      `;
    }
}
  
customElements.define('header-component', Header);






