import $ from "jquery";
// $(document).ready(function () {
//   $("#product_cat").select2();
// });
// // $("#result").css("opacity", 0);
// // document.getElementById("product_search_result").innerHTML = "test"
// $("#keyword").on("keyup", function () {
//   if ($("#keyword").val().length >= 3) {
//     $("#result_products").html("");
//     //
//     $.ajax({
//       url: admin_url.ajax_url,
//       type: "post",
//       data: {
//         action: "live_search",
//         keyword: $("#keyword").val(),
//         product_cat: $("#product_cat").val(),
//       },
//       success: function (data) {
//         // $("#result").css("opacity", 1);
//         $.each(data, function (index, product) {
//           let result = `
//           <li class="result-product d-flex justify-content-between">
//             <a href="${product.link}">
//               <div class="d-flex align-items-center">
//               ${product.image}
//                 <div class="mx-2">
//                   <h5 class="result-title m-0">${product.name}</h5>
//                   ${product.price}
//                 </div>
//               </div>
//             </a>
//           </li>
//           `;

//           $("#result_products").append(result);
//         });
//         console.log(data);
//       },
//       fail: function (err) {
//         console.log(err);
//       },
//     });

//     //
//   }
// });

class Search {
  constructor() {
    this.searchTerm = $("#keyword");
    this.resultDiv = $(".result");
    this.isReady = false;
    this.resultDivOpen = false;
    this.typingTimer;
    this.searchButton = $(".product_search_btn");
    this.loader = $(".product_search_btn");
    this.events();
  }

  events() {
    //  TODO OPEN showResult()
    //  TODO OPEN closeResult()

    this.searchTerm.on("keydown", this.typingLogic.bind(this));
  }

  typingLogic() {
    clearTimeout(this.typingTimer);
    // this.searchButton.html('<div class="spinner-loader"></div>');
    this.searchButton.html(' <img class="spinner-loader" src="https://www.myprincipallifestyle.com/assets/img/loading.gif" alt="">');
    this.typingTimer = setTimeout(this.getResults.bind(this), 2000);
  }

  getResults() {
    this.resultDiv.html("sklhfvbljblkjb");
  }
  showResult() {
    this.resultDiv.addClass("result--open");
  }

  closeResult() {
    this.resultDiv.removeClass("result--open");
  }
}

export default Search;

var liveSearch = new Search();
