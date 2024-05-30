
    document.addEventListener('DOMContentLoaded', (event) => {
    const carousel = document.querySelector('#carousel');
    let position = 1;
    const items = document.querySelectorAll('.item');
    const itemsCount = items.length; 
    const intervalTime = 3000; 

    const updateCarousel = () => {

        items.forEach(item => item.classList.remove('in-focus'));

        const currentItem = items[position - 1];
        currentItem.classList.add('in-focus');

        carousel.style.setProperty('--position', position);
        position = (position % itemsCount) + 1;
    };

    updateCarousel();

    setInterval(updateCarousel, intervalTime);
});
