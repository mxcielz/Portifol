// Arquivo de traduções
const translations = {
    'pt-BR': {
        // Navegação
        'nav-home': 'Início',
        'nav-projects': 'Projetos',
        'nav-about': 'Sobre Mim',
        'nav-contact': 'Contato',
        
        // Seção Hero
        'hero-hello': 'Olá, meu nome é',
        'hero-role': 'Eu sou Desenvolvedor Web',
        'hero-tagline': 'Transformando ideias em experiências digitais incríveis',
        
        // Botões CTA
        'cta-projects': 'Meus Projetos',
        'cta-contact': 'Contato'
    },
    'en-US': {
        // Navigation
        'nav-home': 'Home',
        'nav-projects': 'Projects',
        'nav-about': 'About Me',
        'nav-contact': 'Contact',
        
        // Hero Section
        'hero-hello': 'Hello, my name is',
        'hero-role': 'I am Web Developer',
        'hero-tagline': 'Transforming ideas into amazing digital experiences',
        
        // CTA Buttons
        'cta-projects': 'My Projects',
        'cta-contact': 'Contact'
    }
};

// Classe para gerenciar as traduções
class LanguageManager {
    constructor() {
        this.currentLanguage = localStorage.getItem('language') || 'pt-BR';
        this.initLanguageToggle();
        this.updateLanguage(this.currentLanguage);
    }
    
    initLanguageToggle() {
        const languageToggle = document.getElementById('language-toggle');
        const currentLangDisplay = document.getElementById('current-lang');
        
        // Atualiza o indicador de idioma atual
        currentLangDisplay.textContent = this.currentLanguage === 'pt-BR' ? 'PT' : 'EN';
        
        // Adiciona evento de clique para alternar o idioma
        languageToggle.addEventListener('click', () => {
            const newLanguage = this.currentLanguage === 'pt-BR' ? 'en-US' : 'pt-BR';
            this.updateLanguage(newLanguage);
            localStorage.setItem('language', newLanguage);
            
            // Atualiza o idioma exibido no botão
            currentLangDisplay.textContent = newLanguage === 'pt-BR' ? 'PT' : 'EN';
            
            // Atualiza o atributo lang da tag html
            document.documentElement.lang = newLanguage === 'pt-BR' ? 'pt-BR' : 'en-US';
        });
    }
    
    updateLanguage(language) {
        this.currentLanguage = language;
        
        // Seleciona todos os elementos com o atributo data-i18n
        const elements = document.querySelectorAll('[data-i18n]');
        
        // Atualiza o texto de cada elemento com a tradução correspondente
        elements.forEach(element => {
            const key = element.getAttribute('data-i18n');
            if (translations[language][key]) {
                element.textContent = translations[language][key];
            }
        });
    }
}

// Inicializa o gerenciador de idiomas quando o DOM estiver pronto
document.addEventListener('DOMContentLoaded', () => {
    window.languageManager = new LanguageManager();
});