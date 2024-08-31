$(document).ready(function () {
    const validateEmail = (email) => {
        return email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
        );
    };

    const $modal = $('#modal');

    if ($modal.length) {
        /**
         * Показ модалки
         */
        $('.application__btn').on('click', function () {
            $modal.fadeIn();
            noSroll();
        });

        /**
         * Скрытие модалки
         */
        $('.modal__close-btn, #modal').on('click', function () {
            $modal.fadeOut();
            addSroll();
        });

        /**
         * Скрытие модалки
         */
        $('#modal_thx').on('click', function () {
            $('#modal_thx').fadeOut();
            addSroll();
        });

        $('.modal__content').on('click', function (e) {
            e.stopPropagation();
        });

        /**
         * Снятие ошибки
         */
        $('.modal__input').on('change, keyup', function () {
            $(this).removeClass('modal__input--error');
        });

        /**
         * Отправка модалки
         */
        $('#modal-leed').on('submit', function (e) {
            e.preventDefault();

            if ($('#modal-leed').find('.application__btn').hasClass('application__btn--loading'))
                return;

            const name = $('#name').val();
            const email = $('#email').val();
            const nonce = $('#_send_leed_nonce').val();

            let valid = true;

            if (!name) {
                $('#name').addClass('modal__input--error');
                valid = false;
            }

            if (!email || !validateEmail(email)) {
                $('#email').addClass('modal__input--error');
                valid = false;
            }

            if (!valid) return;

            $.ajax({
                method: 'POST',
                url: ajaxUrl,
                data: {
                    action: 'send_modal_leed',
                    nonce,
                    name,
                    email,
                },
                beforeSend: function () {
                    $('#modal-leed')
                        .find('.application__btn')
                        .addClass('application__btn--loading');
                },
                success: function (res) {
                    const data = JSON.parse(res);

                    if (!data.success) return;

                    $('#modal-leed')
                        .find('.application__btn')
                        .removeClass('application__btn--loading');

                    $('#name').val('');
                    $('#email').val('');

                    $('#modal_thx').fadeIn();
                    $modal.fadeOut();

                    setTimeout(() => {
                        $('#modal_thx').fadeOut();
                        addSroll();
                    }, 5000);
                },
                error: function (e) {
                    console.log(e);
                },
            });
        });
    }
});
