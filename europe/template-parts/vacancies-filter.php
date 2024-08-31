<?php 
/**
 * Шаблон фильтров для вакансий
 */

$preselected_countries = get_params_countries();
?>

<form action="." method="post" class="filters main__filters" id='main-filters'>
    <div id="mob_close_filters"></div>

    <div class="filters__block">
        <h3 class="filters__block__title"><?php _e('Страны', 'europe')?></h3>
        <div class="filters__block__content">
            <?php foreach (get_all_counties() as $country):?>
                <label for="<?php echo 'country_' . $country->slug?>" class="checkbox">
                    <input type="checkbox" name="country[]" id="<?php echo 'country_' . $country->slug?>" value="<?php echo $country->term_id?>" <?php echo in_array($country->term_id, $preselected_countries) ? 'checked' : ''?>/>
                    <div class="checkmark"></div>
                    <p><?php echo $country->name?></p>
                </label>
            <?php endforeach;?>
            <input type="hidden" name="countryPrev" value="<?php echo esc_attr($_GET['countries'])?>">
        </div>
    </div>

    <div class="filters__block filters__block--submit">
        <button type="submit"><?php _e('Применить', 'europe')?></button>
    </div>
</form>