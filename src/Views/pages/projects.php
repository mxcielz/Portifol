<!-- CSS do Swiper -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<!-- JS do Swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<link rel="stylesheet" href="./css/carrosel.css">
<link rel="stylesheet" href="./css/tema.css">

<section id="projects" class="e e">
  <h2>Projetos em Destaque</h2>
  <div class="project-container">
    
<!-- Imagem do projeto -->
<div class="project-image">
  <div class="swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img src="./assets/img/project-wb/foto1.png" alt="Imagem 1"></div>
      <div class="swiper-slide"><img src="./assets/img/project-wb/foto2.png" alt="Imagem 2"></div>
      <div class="swiper-slide"><img src="./assets/img/project-wb/foto3.png" alt="Imagem 3"></div>
      <div class="swiper-slide"><img src="./assets/img/project-wb/foto4.png" alt="Imagem 4"></div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
</div>
    <!-- Chat com texto digitado -->
    <div class="project-chat">
      <div class="chat-box" id="chatBox"></div>
  <div class="chat-text">Explore este projeto ou <button class="video-trigger">assista ao vídeo</button> para conhecer mais detalhes.</div>
  <span class="blinking-cursor"></span>
<br>

    </div>
  </div>
  
  <script src="./js/carrosel.js"></script>
</section>
<br>
<div class="video-modal">
<div class="video-container">
  <video muted autoplay disableRemotePlayback nocontrols>
    <source src="./assets/img/project-wb/video.mp4" type="video/mp4">
    Seu navegador não suporta vídeos HTML5.
  </video>
  <!-- Adicionar controles personalizados apenas para play/pause -->
  <div class="custom-video-controls">
    <button class="play-pause-btn">⏯️</button>
  </div>
</div>
</div>