<form role="search" method="get" id="searchform" action="<?php echo home_url('/') ?>" class="wrapper__search-box">
	<div class="wrapper__search-bar">
		<input
			class="input"
			type="text"
			placeholder="Введите поисковый запрос, например, Сварщик Германия"
			value="<?php echo get_search_query(); ?>" name="s" id="s" />
	</div>
	<button class="wrapper__search-btn">
		<img class="icon" src="<?php echo get_stylesheet_directory_uri() ?> /assets/img/search.svg" alt="Поиск" />
		<input type="hidden" name="post_type" value="vacancies" />
		<p class="wrapper__search-btn-text">Найти работу</p>
	</button>
</form>