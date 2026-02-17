// Carousel JavaScript functionality
(function() {
    'use strict';

    function initCarousel() {
        const track = document.querySelector('.carousel-track');
        const cards = document.querySelectorAll('.card');
        const prevBtn = document.querySelector('.arrow.prev');
        const nextBtn = document.querySelector('.arrow.next');

        if (!track || !cards.length || !prevBtn || !nextBtn) {
            return;
        }

        let index = 0;
        let visibleCards = getVisibleCards();
        let autoSlideInterval;
        const AUTO_SLIDE_DELAY = 3000; // 3 seconds per card
        const SLIDE_ANIMATION_DELAY = 500; // Time for smooth transition

        function getVisibleCards() {
            if (window.innerWidth < 768) {
                return 1;
            } else if (window.innerWidth < 1024) {
                return 2;
            } else {
                return 3;
            }
        }

        function updateSlider() {
            const cardWidth = cards[0].offsetWidth + 30;
            track.style.transform = `translateX(-${index * cardWidth}px)`;
        }

        function goToNextCard() {
            if (index < cards.length - visibleCards) {
                index++;
            } else {
                index = 0;
            }
            updateSlider();
        }

        function startAutoSlide() {
            autoSlideInterval = setInterval(() => {
                goToNextCard();
            }, AUTO_SLIDE_DELAY);
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        // Previous button click
        prevBtn.addEventListener('click', () => {
            if (index > 0) {
                index--;
            } else {
                index = cards.length - visibleCards;
            }
            updateSlider();
            resetAutoSlide();
        });

        // Next button click
        nextBtn.addEventListener('click', () => {
            goToNextCard();
            updateSlider();
            resetAutoSlide();
        });

        // Pause auto-slide on hover
        track.addEventListener('mouseenter', () => {
            clearInterval(autoSlideInterval);
        });

        track.addEventListener('mouseleave', () => {
            startAutoSlide();
        });

        // Start auto slide
        startAutoSlide();

        // Handle window resize
        window.addEventListener('resize', () => {
            const newVisibleCards = getVisibleCards();
            if (newVisibleCards !== visibleCards) {
                visibleCards = newVisibleCards;
                if (index > cards.length - visibleCards) {
                    index = Math.max(0, cards.length - visibleCards);
                }
                updateSlider();
            }
        });

        // Ensure all card images are loaded and visible
        cards.forEach((card) => {
            const img = card.querySelector('img');
            if (img) {
                img.addEventListener('error', function() {
                    this.style.backgroundColor = '#e0e0e0';
                    this.alt = 'Image not available';
                });
            }
        });
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCarousel);
    } else {
        initCarousel();
    }
})();
