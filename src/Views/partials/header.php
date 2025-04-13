<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Meu Portfólio</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/tema.css">
    <link rel="stylesheet" href="./css/skills.css">
    <link rel="stylesheet" href="./css/about.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=National+Park&display=swap" rel="stylesheet">
</head>

<body class="dark-theme">
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="#home" class="active" data-i18n="nav-home">Início</a></li>
            <li><a href="#about" data-i18n="nav-about">Sobre Mim</a></li>

            <li><a href="#projects" data-i18n="nav-projects">Projetos</a></li>
            <li><a href="#contact" data-i18n="nav-contact">Contato</a></li>
            <!-- Botão de Tema -->
            <button id="theme-toggle" aria-label="Alternar tema">
                <i class="fa-solid fa-cloud-sun theme-icon"></i>
            </button>
            <!-- Seletor de Idioma -->
            <div class="language-selector">
                <button id="language-toggle" aria-label="Alternar idioma">
                    <i class="fa-solid fa-language"></i>
                    <span id="current-lang">PT</span>
                </button>
            </div>
        </ul>
    </nav>

    <!-- Conteúdo Principal -->
    <div class="container">
        <div class="hero-section">
            <div class="profile-card">
                <img src="assets/img/arthur.png" alt="Arthur" class="profile-image">
                <div class="profile-content">
                    <h2><span data-i18n="hero-hello">Olá, meu nome é</span> <span class="highlight">Arthur</span></h2>
                    <h3 data-i18n="hero-role">Desenvolvedor Web</h3>
                    <div class="social-icons">
                        <a href="#" aria-label="GitHub"><img src="./assets/img/redes/github.png" alt="GitHub"></a>
                        <a href="#" aria-label="LinkedIn"><img src="./assets/img/redes/linkedin.png" alt="LinkedIn"></a>
                        <a href="#" aria-label="Twitter"><img src="./assets/img/redes/twitter.png" alt="Twitter"></a>
                        <a href="#" aria-label="Instagram"><img src="./assets/img/redes/instagram.png" alt="Instagram"></a>
                    </div>
                    <div class="cta-buttons">
                        <a href="#projects" class="btn primary-btn" data-i18n="cta-projects">Meus Projetos</a>
                        <a href="#contact" class="btn secondary-btn" data-i18n="cta-contact">Contato</a>
                    </div>
                    <div class="skills" style="text-align: center;">
                        <h3>Minhas Habilidades</h3>
                        <ul style="list-style: none; padding: 0;">
                            <li>HTML</li>
                            <li>CSS</li>
                            <li>JavaScript</li>
                            <li>PHP</li>
                            <li>React</li>
                            <li>Node.js</li>
                            <li>Python</li>
                            <li>Banco de Dados (MySQL)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/i18n.js"></script>
    <script src="./js/tema.js"></script>
</body>

</html>