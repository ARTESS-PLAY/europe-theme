document.addEventListener('mousemove', function (event) {
    const animationBlock1 = document.querySelector('.blue-bg__animation-block-img-1');
    const animationBlock2 = document.querySelector('.blue-bg__animation-block-img-2');

    const windowWidth = window.innerWidth;
    const windowHeight = window.innerHeight;

    const mouseX = event.clientX;
    const mouseY = event.clientY;

    const centerX = windowWidth / 2;
    const centerY = windowHeight / 2;

    const offsetFactorX1 = 0.15;
    const offsetFactorY1 = 0.1;
    const offsetFactorX2 = 0.06;
    const offsetFactorY2 = 0.05;

    const offsetX1 = (mouseX - centerX) * -offsetFactorX1;
    const offsetY1 = (mouseY - centerY) * -offsetFactorY1;
    const offsetX2 = (mouseX - centerX) * -offsetFactorX2;
    const offsetY2 = (mouseY - centerY) * -offsetFactorY2;

    animationBlock1.style.transform = `translate(${offsetX1}px, ${offsetY1}px)`;
    animationBlock2.style.transform = `translate(${offsetX2}px, ${offsetY2}px)`;
});