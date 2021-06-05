import $ from 'jquery';

class Search {
  constructor() {
    this.searchTerm = document.getElementById('keyword');
    this.productCat = document.getElementById('product_cat');
    this.resultDiv = document.getElementById('result_products');
    this.isReady = false;
    this.resultDivOpen = false;
    this.typingTimer;
    this.isSpinnerShowing = false;
    this.prevSearchVal;
    this.searchButton = document.getElementsByClassName('product_search_btn');
    this.loader = document.getElementsByClassName('product_search_btn');
    this.events();
  }

  events() {
    //  TODO OPEN showResult()
    //  TODO OPEN closeResult()

    this.searchTerm.on('keyup', this.typingLogic.bind(this));
  }

  typingLogic() {
    if (this.searchTerm.val() == '') {
      $('#result').css('opacity', 0);
    }
    if (this.searchTerm.val() != this.prevSearchVal) {
      clearTimeout(this.typingTimer);
      if (this.searchTerm.val()) {
        if (!this.isSpinnerShowing) {
          this.searchButton.html(
            ' <img class="spinner-loader" src="https://www.myprincipallifestyle.com/assets/img/loading.gif" alt="">'
          );
          this.isSpinnerShowing = true;
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 2000);
      } else {
        this.resultDiv.html('');
        this.isSpinnerShowing = false;
      }
    }
    this.prevSearchVal = this.searchTerm.val();
  }

  getResults() {
    $('#result').css('opacity', 1);
    $.ajax({
      url: admin_url.ajax_url,
      type: 'post',
      data: {
        action: 'live_search',
        keyword: this.searchTerm.val(),
        product_cat: this.productCat.val(),
      },
      success: (data) => {
        // let result = '';
        // $("#result").css("opacity", 1);
        // this.resultDiv.html('');
        // $('#result_products').html('h');
        // let result =data.map(item =>'<div>test<div>')
        let result = data.map(
          (
            product
          ) => `<li class="result-product d-flex justify-content-between">
                  <a href="${product.link}">
                    <div class="d-flex align-items-center">
                    ${product.image}
                      <div class="mx-2">
                        <h5 class="result-title m-0">${product.name}</h5>
                        ${product.price}
                      </div>
                    </div>
                  </a>
                </li>`
        );

        this.resultDiv.html(result);
      },
      fail: (err) => {
        console.log(err);
      },
    });
    // this.resultDiv.html('sklhfvbljblkjb');

    if (this.isSpinnerShowing) {
      this.searchButton.html('button');
      this.isSpinnerShowing = false;
    }
    console.log(`this.isLoading = ${this.isSpinnerShowing}`);
  }
  showResult() {
    this.resultDiv.addClass('result--open');
  }

  closeResult() {
    this.resultDiv.removeClass('result--open');
  }
}

export default Search;

var liveSearch = new Search();
