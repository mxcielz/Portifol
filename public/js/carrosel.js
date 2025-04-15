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
  document.addEventListener('DOMContentLoaded', function() {
    // Selecionar os elementos
    const videoTrigger = document.querySelector('.video-trigger');
    const videoModal = document.querySelector('.video-modal');
    const closeVideo = document.querySelector('.close-video');
    const videoElement = document.querySelector('.video-container video');
    const playPauseBtn = document.querySelector('.play-pause-btn');
    
    // Garantir que o vídeo esteja permanentemente mudo
    function enforceVideoMute() {
      videoElement.muted = true;
      
      // Tentar definir o volume como 0 para impedir a reprodução de áudio
      videoElement.volume = 0;
      
      // Impedir que o usuário altere o status de mudo
      videoElement.setAttribute('muted', '');
      
      // Impedir que o usuário altere o volume via API
      Object.defineProperty(videoElement, 'muted', {
        writable: false,
        value: true
      });
      
      // Também tentar definir o volume como somente leitura
      try {
        Object.defineProperty(videoElement, 'volume', {
          writable: false,
          value: 0
        });
      } catch(e) {
        console.log('Não foi possível tornar o volume somente leitura, mas ainda está mudo');
      }
    }
    
    // Aplicar a restrição de áudio imediatamente
    if (videoElement) {
      enforceVideoMute();
      
      // E também monitorar qualquer tentativa de mudança
      videoElement.addEventListener('volumechange', enforceVideoMute);
    }
    
    // Abrir o modal quando o botão for clicado
    if (videoTrigger) {
      videoTrigger.addEventListener('click', function() {
        videoModal.style.display = 'flex';
        setTimeout(() => {
          videoModal.style.opacity = '1';
        }, 10);
        
        // Garantir que o vídeo esteja mudo antes de iniciar
        enforceVideoMute();
        videoElement.play();
        document.body.style.overflow = 'hidden';
      });
    }
    
    // Implementar controles personalizados apenas para play/pause
    if (playPauseBtn) {
      playPauseBtn.addEventListener('click', function() {
        if (videoElement.paused) {
          enforceVideoMute(); // Garantir que continua mudo
          videoElement.play();
        } else {
          videoElement.pause();
        }
      });
    }
    
    // Fechar o modal
    if (closeVideo) {
      closeVideo.addEventListener('click', function() {
        videoModal.style.opacity = '0';
        setTimeout(() => {
          videoModal.style.display = 'none';
        }, 400);
        videoElement.pause();
        document.body.style.overflow = '';
      });
    }
    
    // Fechar ao clicar fora
    videoModal.addEventListener('click', function(e) {
      if (e.target === videoModal) {
        videoModal.style.opacity = '0';
        setTimeout(() => {
          videoModal.style.display = 'none';
        }, 400);
        videoElement.pause();
        document.body.style.overflow = '';
      }
    });
    
    // Fechar ao pressionar ESC
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && videoModal.style.display === 'flex') {
        videoModal.style.opacity = '0';
        setTimeout(() => {
          videoModal.style.display = 'none';
        }, 400);
        videoElement.pause();
        document.body.style.overflow = '';
      }
    });
    
    // Aplicar a restrição de áudio sempre que o vídeo for carregado
    videoElement.addEventListener('loadeddata', enforceVideoMute);
  });