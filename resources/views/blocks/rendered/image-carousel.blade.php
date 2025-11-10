<div class="image-carousel-block my-8" x-data="imageCarousel({{ json_encode($images) }})" x-init="init()">
    <div class="relative max-w-6xl mx-auto">
        <!-- Основная карусель -->
        <div class="relative overflow-hidden rounded-lg shadow-lg bg-gray-100 touch-pan-y" x-ref="carousel" style="touch-action: pan-y;">
            <div class="carousel-track relative min-h-[350px] lg:min-h-[600px]">
                <template x-for="(item, index) in images" :key="index">
                    <div 
                        class="carousel-slide absolute inset-0" 
                        x-show="currentIndex === index"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                    >
                        <img 
                            :src="'/storage/' + item.image" 
                            :alt="item.caption || 'Image ' + (index + 1)"
                            class="w-full h-full object-contain cursor-pointer select-none"
                            @click="openLightbox(index)"
                            draggable="false"
                        >
                        <div 
                            x-show="item.caption" 
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 via-black/60 to-transparent px-6 pt-12 pb-16 pointer-events-none"
                        >
                            <p class="text-white text-center font-semibold text-base lg:text-lg drop-shadow-lg" x-text="item.caption"></p>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Навигация -->
            <template x-if="images.length > 1">
                <div>
                    <button 
                        @click="prevSlide()" 
                        class="carousel-nav carousel-nav-prev"
                        :class="{ 'opacity-50 cursor-not-allowed': currentIndex === 0 }"
                        :disabled="currentIndex === 0"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button 
                        @click="nextSlide()" 
                        class="carousel-nav carousel-nav-next"
                        :class="{ 'opacity-50 cursor-not-allowed': currentIndex === images.length - 1 }"
                        :disabled="currentIndex === images.length - 1"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </template>

            <!-- Индикаторы -->
            <template x-if="images.length > 1">
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
                    <template x-for="(item, index) in images" :key="index">
                        <button 
                            @click="currentIndex = index"
                            class="carousel-indicator"
                            :class="{ 'carousel-indicator-active': currentIndex === index }"
                        ></button>
                    </template>
                </div>
            </template>
        </div>

        <!-- Подпись снизу удалена -->
    </div>
</div>

<script>
function imageCarousel(images) {
    return {
        images: images,
        currentIndex: 0,
        touchStartX: 0,
        touchEndX: 0,
        isSwipping: false,
        
        init() {
            const carousel = this.$refs.carousel;
            
            carousel.addEventListener('touchstart', (e) => {
                if (this.isSwipping) return;
                this.touchStartX = e.changedTouches[0].screenX;
            }, { passive: true });
            
            carousel.addEventListener('touchend', (e) => {
                if (this.isSwipping) return;
                this.touchEndX = e.changedTouches[0].screenX;
                this.handleSwipe();
            }, { passive: true });
        },
        
        handleSwipe() {
            if (this.isSwipping) return;
            
            const swipeThreshold = 50;
            const diff = this.touchStartX - this.touchEndX;
            
            if (Math.abs(diff) > swipeThreshold) {
                this.isSwipping = true;
                
                if (diff > 0) {
                    this.nextSlide();
                } else {
                    this.prevSlide();
                }
                
                setTimeout(() => {
                    this.isSwipping = false;
                }, 500);
            }
        },
        
        nextSlide() {
            if (this.currentIndex < this.images.length - 1) {
                this.currentIndex++;
            }
        },
        
        prevSlide() {
            if (this.currentIndex > 0) {
                this.currentIndex--;
            }
        },
        
        openLightbox(index) {
            const carouselImages = this.images.map(item => ({
                element: null,
                src: '/storage/' + item.image,
                alt: item.caption || '',
                groupKey: 'carousel-' + Date.now()
            }));
            
            if (window.lightboxInstance) {
                const groupKey = 'carousel-' + Date.now();
                window.lightboxInstance.imageGroups.set(groupKey, carouselImages);
                window.lightboxInstance.currentGroup = carouselImages;
                window.lightboxInstance.currentIndex = index;
                window.lightboxInstance.showImage();
                window.lightboxInstance.lightboxElement.classList.remove('hidden');
                window.lightboxInstance.lightboxElement.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }
    }
}
</script>
