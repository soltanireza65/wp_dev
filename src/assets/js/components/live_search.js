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

$("#keyword").on("keyup", function () {
  if ($("#keyword").val().length >= 3) {
    $.ajax({
      url: admin_url.ajax_url,
      type: "post",
      data: {
        action: "live_search",
        keyword: $("#keyword").val(),
        product_cat: $("#product_cat").val(),
      },
      success: function (data) {
        console.log(data)
        //   $("#result").html(data);
      },
      fail: function (err) {
        console.log(err)
      },
    })
  }
})

class Search {
  constructor() {
    console.log("Hello Class")
  }

  showResult() {}

  closeResult() {}
}

export default Search
