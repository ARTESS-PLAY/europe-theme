/**
 * Фильтрация элементов
 */
$(document).ready(function () {
    const filterForm = $('#main-filters');
    const searchForm = $('#search_form');

    if (filterForm.length) {
        filterForm.on('submit', function (e) {
            e.preventDefault();

            const countyIds = [];

            $('input[name="country[]"]:checked').each(function () {
                countyIds.push(parseInt($(this).val()));
            });

            const countryPrev = $('input[name="countryPrev"]').val()
                ? $('input[name="countryPrev"]').val()
                : '[]';
            const url = new URL(window.location.href);

            // Проверка чтобы фильтры не менялись
            if (
                JSON.stringify(JSON.parse(countryPrev).sort()) !== JSON.stringify(countyIds.sort())
            ) {
                url.searchParams.delete('needReload');
                url.searchParams.append('needReload', true);
            }

            url.searchParams.delete('countries');
            url.searchParams.append('countries', JSON.stringify(countyIds));

            window.location.replace(url.href);
        });
    }

    if (searchForm.length) {
        searchForm.on('submit', function (e) {
            e.preventDefault();

            const action = $(this).attr('action');

            const s = $(this).find('#search_input').val().trim();
            const sP = $(this).find('input[name="searchCountryPrev"]').val().trim();
            const url = new URL(action);

            if (s !== sP) {
                url.searchParams.delete('needReload');
                url.searchParams.append('needReload', true);
            }

            url.searchParams.delete('searchCountry');

            if (s.length > 0) {
                url.searchParams.append('searchCountry', s);
            }

            window.location.replace(url.href);
        });
    }
});
