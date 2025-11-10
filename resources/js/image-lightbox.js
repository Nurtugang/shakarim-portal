/**
 * Image Lightbox с группировкой по <details> элементам
 * Изображения группируются по контексту:
 * - В одном <details> - отдельная группа
 * - Вне <details> - общая группа
 */

class ImageLightbox {
    constructor() {
        this.currentGroup = [];
        this.currentIndex = 0;
        this.lightboxElement = null;
        this.imageGroups = new Map();
        
        this.init();
    }

    init() {
        // Создаём HTML структуру lightbox
        this.createLightboxHTML();
        
        // Находим все изображения на странице в .tiptap-content
        this.groupImages();
        
        // Добавляем обработчики событий
        this.attachEventListeners();
    }

    createLightboxHTML() {
        const lightboxHTML = `
            <div id="image-lightbox" class="image-lightbox hidden">
                <div class="lightbox-overlay"></div>
                <div class="lightbox-content">
                    <button class="lightbox-close" aria-label="Закрыть">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                    <button class="lightbox-prev" aria-label="Предыдущее изображение">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </button>
                    <button class="lightbox-next" aria-label="Следующее изображение">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </button>
                    <div class="lightbox-image-container">
                        <img src="" alt="" class="lightbox-image">
                    </div>
                    <div class="lightbox-counter"></div>
                </div>
            </div>
        `;
        
        document.body.insertAdjacentHTML('beforeend', lightboxHTML);
        this.lightboxElement = document.getElementById('image-lightbox');
    }

    groupImages() {
        const pageContent = document.querySelector('.tiptap-content');
        if (!pageContent) return;

        // Находим все изображения
        const allImages = pageContent.querySelectorAll('img');
        
        allImages.forEach((img, index) => {
            // Проверяем, находится ли изображение внутри <details>
            const detailsParent = img.closest('details');
            
            let groupKey;
            if (detailsParent) {
                // Если внутри <details>, используем уникальный идентификатор
                if (!detailsParent.dataset.lightboxGroup) {
                    detailsParent.dataset.lightboxGroup = `details-${Date.now()}-${Math.random()}`;
                }
                groupKey = detailsParent.dataset.lightboxGroup;
            } else {
                // Если вне <details>, общая группа
                groupKey = 'page-root';
            }

            // Добавляем изображение в группу
            if (!this.imageGroups.has(groupKey)) {
                this.imageGroups.set(groupKey, []);
            }
            
            const imageData = {
                element: img,
                src: img.src,
                alt: img.alt || '',
                groupKey: groupKey
            };
            
            this.imageGroups.get(groupKey).push(imageData);
            
            // Добавляем data-атрибуты для идентификации
            img.dataset.lightboxGroup = groupKey;
            img.dataset.lightboxIndex = this.imageGroups.get(groupKey).length - 1;
            
            // Добавляем cursor pointer
            img.style.cursor = 'pointer';
        });
    }

    attachEventListeners() {
        const pageContent = document.querySelector('.tiptap-content');
        if (!pageContent) return;

        // Делегирование событий для изображений
        pageContent.addEventListener('click', (e) => {
            const img = e.target.closest('img');
            if (img && img.dataset.lightboxGroup) {
                e.preventDefault();
                this.openLightbox(img);
            }
        });

        // Кнопка закрытия
        const closeBtn = this.lightboxElement.querySelector('.lightbox-close');
        closeBtn.addEventListener('click', () => this.closeLightbox());

        // Клик по оверлею
        const overlay = this.lightboxElement.querySelector('.lightbox-overlay');
        overlay.addEventListener('click', () => this.closeLightbox());

        // Навигационные кнопки
        const prevBtn = this.lightboxElement.querySelector('.lightbox-prev');
        const nextBtn = this.lightboxElement.querySelector('.lightbox-next');
        
        prevBtn.addEventListener('click', () => this.showPrevious());
        nextBtn.addEventListener('click', () => this.showNext());

        // Клавиатурная навигация
        document.addEventListener('keydown', (e) => {
            if (!this.lightboxElement.classList.contains('active')) return;
            
            switch(e.key) {
                case 'Escape':
                    this.closeLightbox();
                    break;
                case 'ArrowLeft':
                    this.showPrevious();
                    break;
                case 'ArrowRight':
                    this.showNext();
                    break;
            }
        });

        // Touch события для мобильных устройств
        this.setupTouchEvents();
    }

    setupTouchEvents() {
        let touchStartX = 0;
        let touchEndX = 0;
        const minSwipeDistance = 50;

        const imageContainer = this.lightboxElement.querySelector('.lightbox-image-container');

        imageContainer.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        imageContainer.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            this.handleSwipe(touchStartX, touchEndX, minSwipeDistance);
        }, { passive: true });
    }

    handleSwipe(startX, endX, minDistance) {
        const diff = startX - endX;
        
        if (Math.abs(diff) < minDistance) return;

        if (diff > 0) {
            // Swipe left - next image
            this.showNext();
        } else {
            // Swipe right - previous image
            this.showPrevious();
        }
    }

    openLightbox(img) {
        const groupKey = img.dataset.lightboxGroup;
        const imageIndex = parseInt(img.dataset.lightboxIndex);
        
        this.currentGroup = this.imageGroups.get(groupKey);
        this.currentIndex = imageIndex;
        
        this.showImage();
        this.lightboxElement.classList.remove('hidden');
        this.lightboxElement.classList.add('active');
        
        // Блокируем прокрутку body
        document.body.style.overflow = 'hidden';
    }

    closeLightbox() {
        this.lightboxElement.classList.remove('active');
        this.lightboxElement.classList.add('hidden');
        
        // Возвращаем прокрутку
        document.body.style.overflow = '';
    }

    showImage() {
        const imageData = this.currentGroup[this.currentIndex];
        const imgElement = this.lightboxElement.querySelector('.lightbox-image');
        const counter = this.lightboxElement.querySelector('.lightbox-counter');
        const prevBtn = this.lightboxElement.querySelector('.lightbox-prev');
        const nextBtn = this.lightboxElement.querySelector('.lightbox-next');
        
        imgElement.src = imageData.src;
        imgElement.alt = imageData.alt;
        
        // Обновляем счётчик
        counter.textContent = `${this.currentIndex + 1} / ${this.currentGroup.length}`;
        
        // Показываем/скрываем кнопки навигации
        if (this.currentGroup.length <= 1) {
            prevBtn.style.display = 'none';
            nextBtn.style.display = 'none';
        } else {
            prevBtn.style.display = 'flex';
            nextBtn.style.display = 'flex';
            
            // Скрываем кнопки на краях
            prevBtn.style.opacity = this.currentIndex === 0 ? '0.3' : '1';
            prevBtn.style.pointerEvents = this.currentIndex === 0 ? 'none' : 'auto';
            
            nextBtn.style.opacity = this.currentIndex === this.currentGroup.length - 1 ? '0.3' : '1';
            nextBtn.style.pointerEvents = this.currentIndex === this.currentGroup.length - 1 ? 'none' : 'auto';
        }
    }

    showPrevious() {
        if (this.currentIndex > 0) {
            this.currentIndex--;
            this.showImage();
        }
    }

    showNext() {
        if (this.currentIndex < this.currentGroup.length - 1) {
            this.currentIndex++;
            this.showImage();
        }
    }

    // Метод для обновления при динамическом изменении контента
    refresh() {
        this.imageGroups.clear();
        this.groupImages();
    }
}

// Инициализация при загрузке страницы
let lightboxInstance = null;

function initImageLightbox() {
    if (document.querySelector('.tiptap-content')) {
        lightboxInstance = new ImageLightbox();
    }
}

// Для динамической инициализации (если контент загружается асинхронно)
export function refreshLightbox() {
    if (lightboxInstance) {
        lightboxInstance.refresh();
    } else {
        initImageLightbox();
    }
}

// Автоматическая инициализация
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initImageLightbox);
} else {
    initImageLightbox();
}

export default ImageLightbox;
