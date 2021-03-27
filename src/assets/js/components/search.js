import $ from "jquery";

$("#woocommerce-product-search").on("keyup", function () {
  $("#search_result").html("");
  var searchValue = $("#woocommerce-product-search").val();
  // console.log(searchValue);

  $.ajax({
    url: admin_url.ajax_url,
    type: "post",
    data: {
      action: "live_search",
      product_name: searchValue,
    },
  }).done(function (response) {
    console.log(response);
    $(response).each((index, product) => {
      var result = '<div class="col">';
      result += `${product.name}`;
      // result += `${product.image}`;
      // result += `${product.link}`;
      result += "</div>";

      $("#search_result").append(result);
    });
  });
});
