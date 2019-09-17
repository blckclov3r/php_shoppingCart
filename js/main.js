$(document).ready(function() {

    cat();
    brand();
    product();

    function cat(){
        $.ajax({
            method: "POST",
            url: "action.php",
            data: {category:1},
            success: function (response) {
                $("#get_category").html(response);
            }
        });
    }
     
    function brand(){
        $.ajax({
            method: "POST",
            url: "action.php",
            data: {brand:1},
            success: function (response) {
                $("#get_brand").html(response);
            }
        });
    }

    function product(){
        $.ajax({
            url: "action.php",
            method: "POST",
            data:{getProduct:1},
            success: function(response){
                $("#get_product").html(response);
            }
        });
    }
});