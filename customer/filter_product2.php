<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="generator" content="" />
    <title>Product List</title>

    <link rel="canonical" href="" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>

  <body>
    <div class="col-lg-8 mx-auto">
      <main>
        <h1 class="text-center mt-3 mb-3">Products</h1>

        <div class="row">
          <div class="col-sm-3 p-3 bg-light">
            <button
              type="button"
              name="clear_filter"
              class="btn btn-warning btn-sm form-control mb-2"
              id="clear_filter"
            >
              Clear Filter
            </button>

            <p class="fs-4 text-center border-bottom text-bold">Product Type</p>

            <div id="product_filter" class="mb-2"></div>

            <p class="fs-4 text-center border-bottom text-bold">Price</p>

            <div id="price_filter" class="mb-2"></div>

            <p class="fs-4 text-center border-bottom text-bold">Rating</p>

            <div
              id="product_filter"
              class="overflow-auto mb-3"
              style="height: 350px"
            ></div>
          </div>

          <div class="col-sm-9">
            <div id="product_area" style="display: none"></div>

            <div id="skeleton_area"></div>

            <div id="pagination_area" class="mt-2 mb-5"></div>
          </div>
        </div>
      </main>
    </div>
  </body>
</html>

<script>
  function $(selector) {
    return document.querySelector(selector);
  }

  load_product(1, "");

  function load_product(page = 1, query = "") {
    $("#product_area").style.display = "none";

    $("#skeleton_area").style.display = "block";

    $("#skeleton_area").innerHTML = make_skeleton();
    console.log(query, "query");

    fetch("process.php?page=" + page + query + "")
      .then(function (response) {
        return response.json();
      })
      .then(function (responseData) {
        console.log(responseData, "responseData");
        var t_html = "";
        if (responseData.data) {
          if (responseData.data.length > 0) {
            t_html +=
              '<p class="h6">' +
              responseData.total_data +
              " Products Found</p>";
            t_html += '<div class="row">';
            for (var i = 0; i < responseData.data.length; i++) {
              console.log(responseData.data[i]);
              t_html += '<div class="col-md-3 mb-2 p-3">';
              t_html +=
                '<img src = "' +
                "../photo/" +
                responseData.data[i].image +
                '" class="img-fluid border mb-3 p-3" />';
              t_html +=
                '<p class="fs-6 text-center">' +
                responseData.data[i].product_name +
                '&nbsp;&nbsp;&nbsp;<span class="badge bg-info text-dark">' +
                responseData.data[i].product_type +
                "</span><br />";
              t_html +=
                '<span class="fw-bold text-danger"><span>&#8369;</span> ' +
                responseData.data[i].price +
                ".00";
              ("</p>");
              t_html += "</div>";
            }
            t_html += "</div>";
            $("#product_area").innerHTML = t_html;
          } else {
            $("#product_area").innerHTML = '<p class="h6">No Product Found</p>';
          }
        }

        if (responseData.pagination) {
          $("#pagination_area").innerHTML = responseData.pagination;
        }

        setTimeout(function () {
          $("#product_area").style.display = "block";

          $("#skeleton_area").style.display = "none";
        }, 1);
      })
      .catch((error) => {
        console.log(error, "error");
      });
  }

  function make_skeleton() {
    var output = '<div class="row">';
    for (var count = 0; count < 8; count++) {
      output += '<div class="col-md-3 mb-3 p-4">';
      output +=
        '<div class="mb-2 bg-light text-dark" style="height:240px;"></div>';
      output +=
        '<div class="mb-2 bg-light text-dark" style="height:50px;"></div>';
      output +=
        '<div class="mb-2 bg-light text-dark" style="height:25px;"></div>';
      output += "</div>";
    }
    output += "</div>";
    return output;
  }

  load_filter();

  function load_filter() {
    fetch("process.php?action=filter")
      .then(function (response) {
        return response.json();
      })
      .then(function (responseData) {
        if (responseData.product_type) {
          if (responseData.product_type.length > 0) {
            var html = '<div class="list-group">';
            for (var i = 0; i < responseData.product_type.length; i++) {
              html += '<label class="list-group-item">';

              html +=
                '<input class="form-check-input me-1 product_filter" type="checkbox" value="' +
                responseData.product_type[i].name +
                '">';

              html +=
                responseData.product_type[i].name +
                ' <span class="text-muted">(' +
                responseData.product_type[i].total +
                ")</span>";

              html += "</label>";
            }

            html += "</div>";

            $("#product_filter").innerHTML = html;

            var product_type_elements =
              document.getElementsByClassName("product_filter");

            for (var i = 0; i < product_type_elements.length; i++) {
              product_type_elements[i].onclick = function () {
                load_product((page = 1), make_query());
              };
            }
          }
        }

        if (responseData.price) {
          console.log(responseData.price, "responseData.price");
          if (responseData.price.length > 0) {
            var html = '<div class="list-group">';

            for (var i = 0; i < responseData.price.length; i++) {
              console.log(responseData.price[i].condition, "kmkm");
              html +=
                '<a href="#" class="list-group-item list-group-item-action price_filter" id="' +
                responseData.price[i].condition +
                '"> ' +
                responseData.price[i].name +
                ' <span class="text-muted">(' +
                responseData.price[i].total +
                ")</a>";
            }

            html += "</div>";

            $("#price_filter").innerHTML = html;

            var price_elements =
              document.getElementsByClassName("price_filter");

            for (var i = 0; i < price_elements.length; i++) {
              price_elements[i].onclick = function () {
                remove_active_class(price_elements);

                this.classList.add("active");

                load_product((page = 1), make_query());
              };
            }
          }
        }
      });
  }

  function remove_active_class(element) {
    for (var i = 0; i < element.length; i++) {
      if (element[i].matches(".active")) {
        element[i].classList.remove("active");
      }
    }
  }

  function make_query() {
    var query = "";

    var price_elements = document.getElementsByClassName("price_filter");

    for (var i = 0; i < price_elements.length; i++) {
      console.log(
        "&price_filter=" + price_elements[i].getAttribute("id") + "",
        "aaa"
      );
      if (price_elements[i].matches(".active")) {
        query += "&price_filter=" + price_elements[i].getAttribute("id") + "";
      }
    }

    var product_type_elements =
      document.getElementsByClassName("product_filter");

    var product_type_list = "";

    for (var i = 0; i < product_type_elements.length; i++) {
      if (product_type_elements[i].checked) {
        product_type_list += product_type_elements[i].value + ",";
      }
    }

    if (product_type_list != "") {
      query += "&product_filter=" + product_type_list + "";
    }
    console.log(query, "query");
    return query;
  }

  $("#clear_filter").onclick = function () {
    var gender_elements = document.getElementsByClassName("product_filter");

    for (var i = 0; i < gender_elements.length; i++) {
      gender_elements[i].checked = false;
    }

    var price_elements = document.getElementsByClassName("price_filter");

    remove_active_class(price_elements);

    var product_type_elements =
      document.getElementsByClassName("product_filter");

    for (var i = 0; i < product_type_elements.length; i++) {
      product_type_elements[i].checked = false;
    }

    load_product(1, "");
  };
</script>
