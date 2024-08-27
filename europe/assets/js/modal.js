document.addEventListener('DOMContentLoaded', () => {
    const applicationButtons = document.querySelectorAll('.application__btn');
    const modal = document.getElementById('modal');
    const closeBtn = document.querySelector('.modal__close-btn');

    applicationButtons.forEach((openModalBtn) => {
        openModalBtn.addEventListener('click', () => {
            modal.classList.add('modal_open');
            document.body.classList.add('body__modal-open');
        });
    });

    closeBtn.addEventListener('click', () => {
        modal.classList.remove('modal_open');
        document.body.classList.remove('body__modal-open');
    });

    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.remove('modal_open');
            document.body.classList.remove('body__modal-open');
        }
    });
});
