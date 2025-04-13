// animations.js - Animações com GSAP
document.addEventListener('DOMContentLoaded', function() {
    // Registrar o plugin ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);
    
    // Animação de entrada para os elementos
    animateOnScroll();
    
    // Animação para o swiper
    animateSwiper();
    
    // Animação para os projetos
    animateProjects();
});

// Animar elementos ao rolar a página
function animateOnScroll() {
    // Animar títulos de seção
    gsap.utils.toArray('section > h2').forEach(title => {
        gsap.fromTo(title, 
            { opacity: 0, y: 50 },
            { 
                opacity: 1, 
                y: 0, 
                duration: 0.8,
                scrollTrigger: {
                    trigger: title,
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                }
            }
        );
    });
    
    // Animar elementos com classe .animate-on-scroll
    gsap.utils.toArray('.animate-on-scroll').forEach(element => {
        gsap.fromTo(element, 
            { opacity: 0, y: 30 },
            { 
                opacity: 1, 
                y: 0, 
                duration: 0.7,
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    toggleActions: 'play none none none'
                }
            }
        );
    });
}

// Animar o Swiper
function animateSwiper() {
    const swiper = document.querySelector('.swiper');
    if (swiper) {
        gsap.fromTo(swiper, 
            { opacity: 0, scale: 0.95 },
            { 
                opacity: 1, 
                scale: 1, 
                duration: 1,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: swiper,
                    start: 'top 75%',
                    toggleActions: 'play none none none'
                }
            }
        );
    }
}

// Animar os projetos em cascata
function animateProjects() {
    const projects = document.querySelectorAll('.project-container');
    
    if (projects.length) {
        projects.forEach((project, index) => {
            gsap.fromTo(project, 
                { opacity: 0, y: 50 },
                { 
                    opacity: 1, 
                    y: 0, 
                    duration: 0.8,
                    delay: index * 0.2,
                    ease: "power2.out",
                    scrollTrigger: {
                        trigger: project,
                        start: 'top 80%',
                        toggleActions: 'play none none none'
                    }
                }
            );
        });
    }
}

// Efeito parallax para backgrounds
function initParallaxEffects() {
    const parallaxElements = document.querySelectorAll('.parallax-bg');
    
    parallaxElements.forEach(element => {
        gsap.to(element, {
            y: -80,
            ease: "none",
            scrollTrigger: {
                trigger: element.parentElement,
                start: "top bottom",
                end: "bottom top",
                scrub: true
            }
        });
    });
}

// Adicionar efeito de ondulação nos botões
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.project-btn, .btn');
    
    buttons.forEach(button => {
        button.addEventListener('mouseenter', createRippleEffect);
    });
    
    function createRippleEffect(e) {
        const button = e.currentTarget;
        
        const circle = document.createElement('span');
        const diameter = Math.max(button.clientWidth, button.clientHeight);
        
        circle.style.width = circle.style.height = `${diameter}px`;
        circle.style.left = `${e.clientX - button.offsetLeft - diameter / 2}px`;
        circle.style.top = `${e.clientY - button.offsetTop - diameter / 2}px`;
        circle.classList.add('ripple');
        
        const ripple = button.querySelector('.ripple');
        if (ripple) {
            ripple.remove();
        }
        
        button.appendChild(circle);
    }
});