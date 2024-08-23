/**
 * Общий скрипт который нужен для каждой страницы
 */

$(document).ready(function () {
  /**
   * Мобильное меню
   */
  $("#open_mob_menu").on("click", function () {
    if ($(this).hasClass("burger_menu--active")) {
      $(this).removeClass("burger_menu--active");
      $(".menu").removeClass("menu--active");
      addSroll();
      return;
    }

    $(this).addClass("burger_menu--active");
    $(".menu").addClass("menu--active");
    noSroll();
  });

  /**
   * Фильтр меню
   */
  $("#open_filters_mob").on("click", function () {
    $(".main__filters").addClass("main__filters--active");
    noSroll();
  });

  /**
   * Фильтр меню закрытие
   */
  $("#mob_close_filters").on("click", function () {
    $(".main__filters").removeClass("main__filters--active");
    addSroll();
    return;
  });

  /**
   * Удаление скролла
   */
  function noSroll() {
    $("html").addClass("no-scroll");
    $("body").addClass("no-scroll");
  }
  /**
   * Добавление скролла
   */
  function addSroll() {
    $("html").removeClass("no-scroll");
    $("body").removeClass("no-scroll");
  }
});
