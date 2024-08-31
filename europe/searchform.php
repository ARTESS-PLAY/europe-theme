<form role="search" method="get" id="search_form" action="<?php echo get_vacansies_link_page()?>" class="wrapper__search-box">
	<div class="wrapper__search-bar">
		<input
			class="input"
			type="text"
			id='search_input'
			placeholder="<?php _e('Введите поисковый запрос, например, Сварщик Германия', 'europe'); ?>"
			value="<?php echo get_search_query(); ?>" name="searchCountry" id="search_input" />
	</div>
	<button class="wrapper__search-btn">
		<img class="icon" src="<?php echo get_stylesheet_directory_uri() ?> /assets/img/search.svg" alt="Поиск" />
		<p class="wrapper__search-btn-text"><?php _e('Найти работу', 'europe'); ?></p>
	</button>
</form>