// import $ from "jquery"
// $(document).ready(function () {
//   $("#product_cat").select2()
// })

// let isLoaded = false

// $("#keyword").on("keyup", function () {
//   if ($("#keyword").val().length >= 3) {
//     $("#result .products").html("")

//     clearTimeout(searchTimeout)
//     let searchTimeout = setTimeout(() => {
//       console.log("Ran")
//       $.ajax({
//         url: admin_url.ajax_url,
//         type: "post",
//         data: {
//           action: "live_search",
//           keyword: $("#keyword").val(),
//           product_cat: $("#product_cat").val(),
//         },
//         success: function (data) {
//           isLoaded = true
//           console.log(data)
//           //   $("#result").html(data);
//           data.forEach((product) => {
//             // console.log(product);
//             // $("#result").html(list);
//           })
//         },
//         fail: function (err) {
//           console.log(err)
//         },
//       })
//     }, 2000)
//   }
// })

// class Search {
//   constructor() {
//     console.log("Hello Class")
//   }

//   showResult() {}

//   closeResult() {}
// }

// export default Search

import $ from "jquery"
$(document).ready(function () {
  $("#product_cat").select2()
})
$("#result").css("opacity", 0)
// document.getElementById("product_search_result").innerHTML = "test"
$("#keyword").on("keyup", function () {
  if ($("#keyword").val().length >= 3) {
    $("#result_products").html("")
    //
    $.ajax({
      url: admin_url.ajax_url,
      type: "post",
      data: {
        action: "live_search",
        keyword: $("#keyword").val(),
        product_cat: $("#product_cat").val(),
      },
      success: function (data) {
        $("#result").css("opacity", 1)
        $.each(data, function (index, product) {
          let result = `
          <li class="result-product d-flex justify-content-between">
            <a href="${product.link}">
              <div class="d-flex align-items-center">
              ${product.image}
                <div class="mx-2">
                  <h5 class="result-title m-0">${product.name}</h5>
                  ${product.price}
                </div>
              </div>
            </a>
          </li>
          `

          $("#result_products").append(result)
        })
        console.log(data)
      },
      fail: function (err) {
        console.log(err)
      },
    })

    //
  }
})

// class Search {
//   constructor() {
//     console.log("Hello Class")
//   }

//   showResult() {}

//   closeResult() {}
// }

// export default Search
