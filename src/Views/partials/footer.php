</main>

<footer class="site-footer footer-auto-theme">
  <div class="footer-container">
    <!-- Navegação -->
    <nav class="footer-nav">
      <a href="index.php">Home</a>
      <a href="#projects">Projetos</a>
      <a href="#skills">Habilidades</a>
      <a href="#contact">Contato</a>
    </nav>

    <!-- Redes sociais -->
    <div class="footer-social">
      <a href="https://github.com/seu-usuario" target="_blank" aria-label="GitHub">
        <i class="fab fa-github"></i>
      </a>
      <a href="https://linkedin.com/in/seu-usuario" target="_blank" aria-label="LinkedIn">
        <i class="fab fa-linkedin-in"></i>
      </a>
      <a href="https://twitter.com/seu-usuario" target="_blank" aria-label="Twitter">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="mailto:seu-email@exemplo.com" aria-label="Email">
        <i class="fas fa-envelope"></i>
      </a>
    </div>

    <!-- Copyright -->
    <div class="footer-copyright">
      <p>&copy; <?php echo date("Y"); ?> - Arthur. Todos os direitos reservados.</p>
    </div>

  </div>
</footer>

<!-- Botão "Voltar ao Topo" -->
<div class="footer-back-to-top" aria-label="Voltar ao topo">
  <i class="fas fa-arrow-up"></i>
</div>

<!-- Botão Toggle de Tema -->
<div class="footer-theme-toggle" aria-label="Alternar tema do rodapé">
  <i class="fas fa-adjust"></i>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Estilo do Footer -->
<link rel="stylesheet" href="./css/footer.css">

<!-- Scripts -->
<script>
  // Script do Dark Mode Toggle
  const footer = document.querySelector('footer.site-footer');
  const toggleButton = document.querySelector('.footer-theme-toggle');
  const themeOptions = ['light', 'dark', 'auto'];
  let currentTheme = localStorage.getItem('footerTheme') || 'auto';

  function applyFooterTheme(theme) {
    footer.classList.remove('footer-dark-mode', 'footer-auto-theme');
    if (theme === 'dark') {
      footer.classList.add('footer-dark-mode');
    } else if (theme === 'auto') {
      footer.classList.add('footer-auto-theme');
    }
    localStorage.setItem('footerTheme', theme);
  }

  function cycleTheme() {
    let index = themeOptions.indexOf(currentTheme);
    currentTheme = themeOptions[(index + 1) % themeOptions.length];
    applyFooterTheme(currentTheme);
  }

  toggleButton.addEventListener('click', cycleTheme);
  applyFooterTheme(currentTheme);
</script>

<script>
  // Script do Botão "Voltar ao Topo"
  const backToTopBtn = document.querySelector('.footer-back-to-top');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
      backToTopBtn.classList.add('visible');
    } else {
      backToTopBtn.classList.remove('visible');
    }
  });

  backToTopBtn.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
</script>

<!-- Outros scripts do seu projeto -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/ScrollTrigger.min.js"></script>
<script src="./js/footer.js"></script>
<script src="./js/animations.js"></script>

</body>
</html>
