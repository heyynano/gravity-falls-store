document.addEventListener('DOMContentLoaded', function() {
    // Carousel elements
    const carousel = document.getElementById('productCarousel');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const indicatorsContainer = document.getElementById('carouselIndicators');
    
    // Get all carousel items
    const items = carousel.querySelectorAll('.group');
    
    // Calculate how many items to show based on screen width
    let itemsPerView = calculateItemsPerView();
    
    // Current position
    let currentPosition = 0;
    
    // Total number of slides (considering items per view)
    const totalSlides = Math.ceil(items.length / itemsPerView);
    
    // Create indicators
    createIndicators();
    
    // Update indicators
    updateIndicators();
    
    // Add event listeners for buttons
    prevBtn.addEventListener('click', () => {
        navigate(-1);
    });
    
    nextBtn.addEventListener('click', () => {
        navigate(1);
    });
    
    // Add window resize event listener
    window.addEventListener('resize', () => {
        // Recalculate items per view
        const newItemsPerView = calculateItemsPerView();
        
        // If items per view changed, reset carousel
        if (newItemsPerView !== itemsPerView) {
            itemsPerView = newItemsPerView;
            currentPosition = 0;
            updateCarousel();
            
            // Recreate indicators
            createIndicators();
            updateIndicators();
        }
    });
    
    // Function to calculate items per view based on screen width
    function calculateItemsPerView() {
        const width = window.innerWidth;
        if (width < 640) {
            return 1;
        } else if (width < 1024) {
            return 2;
        } else if (width < 1280) {
            return 3;
        } else {
            return 4;
        }
    }
    
    // Function to navigate carousel
    function navigate(direction) {
        currentPosition += direction;
        
        // Handle boundaries
        if (currentPosition < 0) {
            currentPosition = 0;
        } else if (currentPosition >= totalSlides) {
            currentPosition = totalSlides - 1;
        }
        
        updateCarousel();
        updateIndicators();
    }
    
    // Function to update carousel position
    function updateCarousel() {
        // Calculate item width (including gap)
        const itemWidth = items[0].offsetWidth;
        const gapWidth = 24; // 6 * 4px (space-x-6 in Tailwind)
        const offset = currentPosition * itemsPerView * (itemWidth + gapWidth);
        
        // Update transform
        carousel.style.transform = `translateX(-${offset}px)`;
        
        // Update button states
        prevBtn.disabled = currentPosition === 0;
        prevBtn.classList.toggle('opacity-50', currentPosition === 0);
        
        nextBtn.disabled = currentPosition === totalSlides - 1;
        nextBtn.classList.toggle('opacity-50', currentPosition === totalSlides - 1);
    }
    
    // Function to create indicators
    function createIndicators() {
        // Clear existing indicators
        indicatorsContainer.innerHTML = '';
        
        // Create new indicators
        for (let i = 0; i < totalSlides; i++) {
            const indicator = document.createElement('button');
            indicator.className = 'w-2 h-2 rounded-full bg-gray-300 hover:bg-gray-500 focus:outline-none transition-colors';
            indicator.setAttribute('aria-label', `Go to slide ${i + 1}`);
            indicator.dataset.index = i;
            
            indicator.addEventListener('click', () => {
                currentPosition = i;
                updateCarousel();
                updateIndicators();
            });
            
            indicatorsContainer.appendChild(indicator);
        }
    }
    
    // Function to update indicators
    function updateIndicators() {
        const indicators = indicatorsContainer.querySelectorAll('button');
        
        indicators.forEach((indicator, index) => {
            if (index === currentPosition) {
                indicator.classList.remove('bg-gray-300');
                indicator.classList.add('bg-gray-800');
            } else {
                indicator.classList.remove('bg-gray-800');
                indicator.classList.add('bg-gray-300');
            }
        });
    }
    
    // Initialize carousel
    updateCarousel();

});
const inpuTfooter = document.getElementById ('footer_input');

inpuTfooter0.src = `placeholder/<i class="fa-solid fa-magnifying-glass"></i> enter search term`