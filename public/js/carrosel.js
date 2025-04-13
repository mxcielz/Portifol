document.addEventListener("DOMContentLoaded", () => {
    // Iniciar Swiper
    const swiper = new Swiper('.swiper', {
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      },
      autoplay: {
        delay: 2000,
        disableOnInteraction: false
      }
    });
  
    // Efeito de digitação
    const chatBox = document.getElementById("chatBox");
    const text = `👋 Olá! Este projeto é uma landing page com animações suaves, design responsivo e integração com API.
  
  🛠️ Tecnologias: HTML, CSS, JavaScript e Swiper.js.
  
  📱 Adaptado para dispositivos móveis e com modo claro/escuro.`;
  
    let i = 0;
    function typeWriter() {
      if (i < text.length) {
        chatBox.textContent += text.charAt(i);
        i++;
        setTimeout(typeWriter, 35); // Velocidade da digitação
      }
    }
  
    typeWriter();
  });
  