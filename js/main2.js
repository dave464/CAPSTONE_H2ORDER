$(document).ready(function() {
    $(".filter-section .filter-element h6").click(function() {
        $('.filter-section .filter-element .filter-selection').toggleClass('active');
    });

  
    
    //filter on any checkbox is checked
    $(".product-check").click(function() {
        filter_product();
    });
    
    //filter_product() function filters product in each checkbox click or price range slide
    function filter_product() {
        var action = "filterRequest";
       
        var product_type = get_filtered_product('product_type');
        var price = get_filtered_product('price');
        var product_name = get_filtered_product('product_name');
        var volume = get_filtered_product('volume');
        


        $.ajax({
            url: "../customer/filter.php",
            method: "post",
            data: {
                action: action,
                
                product_type: product_type,
                price: price,
                product_name: product_name,
                volume: volume
            },
            success: function(response) {
                $("#result").html(response);
                $("#filteredTexts").html("Product filtered");
            }
        });
    }

    //whenever a checkbox is checked from a particular filter option say brand, 
    //we will have a fresh list of brands for which product should be filtered
    function get_filtered_product(filter_id) {
        var filtered_data = [];
        $("#" + filter_id + ":checked").each(function() {
            filtered_data.push("\'" + $(this).val() + "\'");
        });
        return filtered_data;
    }


       

});
