
<!DOCTYPE html>
<html>
<head>
    <style>
        .notSearched {
  display:none;
}
    </style>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="columnsContainer">
  <div class="leftColumn">
    <!--<div class="filterResearch">
      <select name="filter" id="searchFilter">
        <option value="all">Apply a filter</option>
        <option value="1.">1 Star</option>
        <option value="2.">2 Stars</option>
        <option value="3.">3 Stars</option>
        <option value="4">4 Stars</option>
        <option value="5.">5 Stars</option>
      </select>
    </div>-->

    <div class="form-check">
        <label class="form-check-label">
        <input type="checkbox" class="product-check" value="1" id="product_name">
      
    </div>
     <div class="form-check">
        <label class="form-check-label">
       
        <input type="checkbox" class="product-check" value="2" id="product_name">
    </div>

     <div class="form-check">
        <label class="form-check-label">
        <input type="checkbox" class="product-check" value="3" id="product_name">
      
    </div>
     <div class="form-check">
        <label class="form-check-label">
       
        <input type="checkbox" class="product-check" value="4" id="product_name">
    </div>

     <div class="form-check">
        <label class="form-check-label">
        <input type="checkbox" class="product-check" value="5" id="product_name">
      
    </div>
    

    <div id="map"></div>

    <div class="rightColumn" style="margin-top:50px;">

      //Cards down below
      <div class="card-grid">
        <div class="card-wrap" id="">
          <img src="https://image.ibb.co/k4SSPK/Spinaci_Green_Dark_Blue.jpg " class="photo">
          <div class="restoName">
            <h3>Restaurant Name Here</h3>
            <p class="restoAddress">In questo posto ci andrà l'indirizzo del ristorante in questione, sarà una stringa lunga</p>
            <p class="ratePlace">Rating: 4.5</p>
          </div>
        </div>
        <div class="card-wrap" id=""><img src=" https://image.ibb.co/k4SSPK/Spinaci_Green_Dark_Blue.jpg" class="photo">
          <div class="restoName">
            <h3>Restaurant Name Here</h3>
            <p class="restoAddress">In questo posto ci andrà l'indirizzo del ristorante in questione, sarà una stringa lunga222</p>
            <p class="ratePlace">Rating: 2.2</p>
          </div>
        </div>
        <div class="card-wrap" id=""><img src=" https://image.ibb.co/k4SSPK/Spinaci_Green_Dark_Blue.jpg" class="photo">
          <div class="restoName">
            <h3>Restaurant Name Here</h3>
            <p class="restoAddress">In questo posto ci andrà l'indirizzo del ristorante in questione, sarà una stringa lunga222</p>
            <p class="ratePlace">Rating: 4.42</p>
          </div>
        </div>
        <div class="card-wrap" id=""><img src=" https://image.ibb.co/k4SSPK/Spinaci_Green_Dark_Blue.jpg" class="photo">
          <div class="restoName">
            <h3>Restaurant Name Here</h3>
            <p class="restoAddress">In questo posto ci andrà l'indirizzo del ristorante in questione, sarà una stringa lunga222</p>
            <p class="ratePlace">Rating: 2.1</p>
          </div>
        </div>
        <div class="card-wrap" id=""><img src=" https://image.ibb.co/k4SSPK/Spinaci_Green_Dark_Blue.jpg" class="photo">
          <div class="restoName">
            <h3>Restaurant Name Here</h3>
            <p class="restoAddress">In questo posto ci andrà l'indirizzo del ristorante in questione, sarà una stringa lunga333</p>
            <p class="ratePlace">Rating: 4.53</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <script type="text/javascript">
   
        $("input").on("click", function() {
  let selectedValue = this.value;
  if (selectedValue == "all") return;
  $('.card-wrap').each(function(index, element) {
    var text = $(element).find(".ratePlace").text();
    let number = text.match(/[0-9]*\,?[0-9]+/g);
    number = number[0].replace(",", ".");
    number = (Math.round(number));
    console.log(number, selectedValue ,   number >= selectedValue )
    number == selectedValue ? $(element).removeClass("notSearched") : $(element).addClass("notSearched");
  })
});
    </script>
</body>
</html>