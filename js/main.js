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
              $("#signup_msg").html(response);
            }
        });
      
    });

    $("#loginBtn").click(function(event){
        event.preventDefault();
        var login_email = $("#email").val();
        var login_password = $("#password").val();
        $.ajax({
            url: "login.php",
            method: "POST",
            data: {
                userLogin:1,
                email: login_email,
                password: login_password
            }, 
            success:function(response){
                if(response == "success"){
                    window.location.href="profile.php";
                }
            }
        });
    });

    $('body').delegate('#addCartBtn','click',function(event){
        event.preventDefault();
        var pid = $(this).attr('pid');
        $.ajax({
            url: 'action.php',
            method: 'POST',
            data: {addToProduct:1, proId :pid},
            success: function(response){
                $("#product_msg").html(response);
            }
        });
    });
   
    $("#cart_container").click(function(event){
        event.preventDefault();
        $.ajax({
            url: 'action.php',
            method: 'POST',
            data: {getCartProduct:1},
            success: function(response){
                $("#cart_product").html(response);
            }
        });
    });

    cart_checkout();
    function cart_checkout(){
        $.ajax({
            method:'POST' ,
            url: 'action.php',
            data:{cart_checkout: 1},
            success:function(response){
                $("#cart_checkout").html(response); 
            }
        });
    }

    $('body').delegate('.qty','click',function(){
        var pid = $(this).attr('pid');
        var qty = $("#qty-"+pid).val();
        var price = $("#price-"+pid).val();
        var total = qty * price;
        // alert(total);
        $("#total-"+pid).val(total);
    });

    $('body').delegate('.remove','click',function(event){
        event.preventDefault();
        var pid = $(this).attr('remove_id');
        // alert(pid);
        $.ajax({
            url: 'action.php',
            method: 'POST',
            data: {removeFromCart:1,removeId:pid},
            success:function(response){
                // alert(response);
                $("#cart_msg").html(response);
                cart_checkout();
            }
        });
    });

    $('body').delegate('.update','click',function(event){
        event.preventDefault();
        var pid = $(this).attr('update_id');
        alert(pid);
    });
});