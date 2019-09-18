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

    

    
    $('body').delegate('.category','click',function(response){
        response.preventDefault();
        var cid = $(this).attr('cid');
        // alert(cid);
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {selectedCategory:1, cat_id:cid},
            success: function (response) {
                $("#get_product").html(response);
            }
        });
    });

    $('body').delegate('.brand','click',function(response){
        response.preventDefault();
        var bid = $(this).attr('bid');
        // alert(bid);
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {selectedBrand:1,brand_id:bid},
            success: function(response){
                $("#get_product").html(response);
            }
        });
    });

    $("#search_btn").click(function(){
        var key = $("#search").val();
        if(key != ""){
            $.ajax({
                method: "POST",
                url: "action.php",
                data: {searchProduct:1,keyword:key},
                success: function (response) {
                    $("#get_product").html(response);
                }
            });
        }else{
           product();
        }
    });

    $("#signup_btn").click(function(event){
        event.preventDefault();
        $.ajax({
            url: "register.php",
            method: "POST",
            data: $("form").serialize(),
            success: function(response){
            //    alert(response);
            $("#signup_msg").html(response);
            }
        });
      
    });
    
});