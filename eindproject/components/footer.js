class Footer extends HTMLElement {
    constructor() {
      super();
    }
  
    connectedCallback() {
      this.innerHTML = `
      <footer>
      <section>
          <nav>
              <span class="desktop-only">Made by Herman Vulkers</span>
          </nav>
          <nav>
            <a href="mailto:hermanvulkers@gmail.com">info@hermanvulkers.com</A>
			<a href="https://github.com/hermanvulkers" title="GitHub" target="_blank" rel="noopener noreferrer"><span
					class="github">GitHub</span><img src="images/github-11-48.png" alt="GitHub"></a>
              <a href="https://www.linkedin.com/in/herman-vulkers-74a36554/" title="LinkedIn" target="_blank" rel="noopener noreferrer"><span>LinkedIn</span><img src="images/linkedin-3-48.png" alt="LinkedIn"></a>
          </nav>
      </section>
    </footer>
      `;
    }
  }
  
  customElements.define('footer-component', Footer);