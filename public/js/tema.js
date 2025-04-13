// Script para gerenciar o tema e a navegação
document.addEventListener('DOMContentLoaded', function() {
  // Gerenciamento do tema
  const themeToggle = document.getElementById('theme-toggle');
  const themeIcon = document.querySelector('.theme-icon');
  
  // Verificar se há uma preferência de tema salva no localStorage
  const savedTheme = localStorage.getItem('theme');
  if (savedTheme === 'light') {
      document.body.classList.remove('dark-theme');
      themeIcon.classList.remove('fa-cloud-sun');
      themeIcon.classList.add('fa-moon');
  }
  
  // Função para alternar o tema
  themeToggle.addEventListener('click', function() {
      // Alternar a classe dark-theme no body
      document.body.classList.toggle('dark-theme');
      
      // Alternar o ícone
      if (document.body.classList.contains('dark-theme')) {
          themeIcon.classList.remove('fa-moon');
          themeIcon.classList.add('fa-cloud-sun');
          localStorage.setItem('theme', 'dark');
      } else {
          themeIcon.classList.remove('fa-cloud-sun');
          themeIcon.classList.add('fa-moon');
          localStorage.setItem('theme', 'light');
      }
  });
  
  // Marcar o item atual no menu
  const navLinks = document.querySelectorAll('nav ul li a');
  navLinks.forEach(link => {
      if (window.location.hash === link.getAttribute('href') || 
          (window.location.hash === "" && link.getAttribute('href') === "#home")) {
          link.classList.add('active');
      }
      
      // Adicionar evento de clique para atualizar a classe active
      link.addEventListener('click', function() {
          navLinks.forEach(l => l.classList.remove('active'));
          this.classList.add('active');
      });
  });

  // O gerenciador de idiomas já está inicializado em i18n.js
});