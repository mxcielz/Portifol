<!-- CSS do Swiper -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<!-- JS do Swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<link rel="stylesheet" href="./css/carrosel.css">
<link rel="stylesheet" href="./css/tema.css">

<section id="projects" class="projects-section">
  <h2>Projetos em Destaque</h2>
  <div class="project-container">
    
    <!-- Imagem do projeto -->
    <div class="project-image">
      <div class="swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide"><img src="./assets/img/background.gif" alt="Imagem 1"></div>
          <div class="swiper-slide"><img src="./assets/img/background.jpg" alt="Imagem 2"></div>
          <div class="swiper-slide"><img src="./assets/img/coding.jpg" alt="Imagem 3"></div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
      </div>
    </div>

    <!-- Chat com texto digitado -->
    <div class="project-chat">
      <div class="chat-box" id="chatBox"></div>
    </div>
  </div>
  
  <script src="./js/carrosel.js"></script>
</section>

