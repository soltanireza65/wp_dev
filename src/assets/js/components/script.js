(function ($) {
  jQuery(document).ready(function () {
    $(".app_woo_single_product_col_4").find("li").addClass("thumb");

    var maxToShow = 5;

    $("ul.product_attributes_top li.attribute_item").each(function (i, e) {
      if ((maxToShow % i) - 1) {
        // Truncate to ellipsis
        $(e).html("...");
      }
      if (i >= maxToShow) {
        $(e).hide();
      }
    });
  });
})(jQuery);
