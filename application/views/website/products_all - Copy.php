
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Emigo: A sleek, responsive, and user-friendly HTML template designed for online grocery stores.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Grocery, Store, stores">
    <title>Emigo</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url() ?>assets/website/images/fav.webp">
    <!-- plugins css -->
    <link rel="stylesheet preload" href="<?php echo site_url() ?>assets/website/css/plugins.css" as="style">
    <link rel="stylesheet preload" href="<?php echo site_url() ?>assets/website/css/style.css" as="style">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.product {
    margin-bottom: 20px;
}
.description {
    display: inline;
}
.seeMoreBtn {
    color: #dd041a;
    text-align:right;
}
    .input-group {
    display: flex;
    align-items: center;
    justify-content: center;
    max-width: 150px;
    margin: 0 auto;
}

.input-group .btn {
    width: 40px;
    height: 40px;
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
}

#quantity-input {
    width: 50px;
    text-align: center;
    font-size: 16px;
    padding: 5px;
    border: 1px solid #ccc;
    border-left: none;
    border-right: none;
}

.add-to-cart-popup {
    display: block;
    width: 100%;
    padding: 5px;
    margin-top: 5px;
    background-color: #F44336;
    color: #fff;
    text-align: center;
    border: none;
    border-radius: 5px;
    font-size: 10px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.add-to-cart-popup:hover {
    background-color: #0056b3;
}

.btn-outline-secondary {
    color: #6c757d;
    border-color: #6c757d;
}

.btn-outline-secondary:hover {
    color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
}

</style>

</head>

<body class="shop-main-h">


<input type="hidden" id="store_phone" value="<?php echo $store_phone; ?>">
<input type="hidden" id="store_id" value="<?php echo $store_id; ?>">
<input type="hidden" id="language" name="language" value="<?php echo $language; ?>">
<div class="weekly-best-selling-area bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cover-card-main-over1">

                        <div class="container" style="padding: 0px !important;">








                        <ul class="nav-h_top language p-0">
                                    <li class="category-hover-header language-hover">
                                        <a href="#">
                                        <?php if(isset($language)){
                                                 if($language == 'ma'){
                                                    $lang = 'മലയാളം';
                                                }
                                                if($language == 'en'){
                                                    $lang = 'English';
                                                }
                                                if($language == 'hi'){
                                                    $lang = 'हिन्दी';
                                                }
                                                if($language == 'ar'){
                                                    $lang = 'وتُكتب';
                                                }
                                                echo $lang;
                                            } ?>
                                        </a>
                                        <ul class="category-sub-menu">  
                                        <?php $selected_languages = explode(",", $store_selected_languages );
                                        foreach ($selected_languages as $languag){ ?>   
                                        <li class="category-hover-header language-hover">
                                            <?php if($languag == 'ma'){
                                                $lang = 'മലയാളം';
                                            }
                                            if($languag == 'en'){
                                                $lang = 'English';
                                            }
                                            if($languag == 'hi'){
                                                $lang = 'हिन्दी';
                                            }
                                            if($languag == 'ar'){
                                                $lang = 'وتُكتب';
                                            }
                                            ?>
                                                <a href="<?php echo base_url('website/products/set_language/'.$languag); ?>" class="menu-item">
                                                    <span><?php echo $lang; ?></span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                           
                                        </ul>
                                    </li>
                                </ul>


                                

                       

                                        
                            <div class="row">
                                <div class="col-lg-12">
                                <img class="logo" src="https://dheputtu.com/images/ximg-logo.png.pagespeed.ic.VwEVliEuNo.webp" alt="Veg">
                                <h2 class="title-left"><?php echo $store_informations->store_name; ?> - <?php echo $table; ?></h2>
                                    <div class="title_desc">
  <p><?php echo $store_informations->store_desc; ?></p>
                                    </div>
                                    <hr class="separation-b">
                                <div class="title-area-between mb-0">
                                        
                                        <ul class="nav nav-tabs best-selling-grocery food-type" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button onclick="loadCategories('veg')" class="nav-link active" id="veg-tab" data-bs-toggle="tab" data-bs-target="#veg" type="button" role="tab" aria-controls="veg" aria-selected="true"><img class="veg" src="<?php echo base_url(); ?>assets/website/images/veg.png"> Veg</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button onclick="loadCategories('non-veg')" class="nav-link" id="non-veg-tab" data-bs-toggle="tab" data-bs-target="#non-veg" type="button" role="tab" aria-controls="non-veg" aria-selected="false"><img class="veg" src="<?php echo base_url(); ?>assets/website/images/nonveg.png"> Non-veg</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr>


                            

<div class="accordion" id="accordion-content">

                            </div>
  
      </div>
    </div>
  </div>
  <hr class="separation-b">
  <!-- <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Fish
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <hr class="separation-b"> -->
  <!-- <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Salad
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div> -->
</div>


                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="fixed-cart-total" style="position:fixed;bottom:0px;width:100%;background: #ef4f5f;color: #fff;text-align: center;padding: 13px;font-size: 15px;">
<a href="<?php echo site_url() ?>cart/view"><p class="cart-total" style="color: #fff;font-size: 15px;"><span id="total-items"> Items Added - ₹<span id="cart-total"></span></p></a>
</div>

    



   

    
    
  
    <!-- rts copyright-area start -->
    <div class="rts-copyright-area d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-between-1">
                        <p class="disc">
                            Copyright 2024 <a href="#">EMIGO</a>. All rights reserved.
                        </p>
                        <!-- <a href="#" class="playstore-app-area">
                            <span>Download App</span>
                            <img src="<?php echo site_url() ?>assets/website/images/googleplay.webp" alt="">
                            <img src="<?php echo site_url() ?>assets/website/images/appstore.webp" alt="">
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts copyright-area end -->










    <!-- customize modal -->
     <div class="modal fade" id="customizeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                
                                <iframe id="iframe_product_customize" height="700px" width="100%"></iframe>
                                
                              </div>
                            </div>
                          </div>
                          <!--customize modal end -->




    <div class="modal fade" id="productCustomize" tabindex="-1" role="dialog" aria-labelledby="foodModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" id="modalBodyContent" style="background-color: #f3f3f3;">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                
                <button type="button" class="btn btn-block btn-popup"></button>


                </div>

                
                
                </div>
            </div>

        </div>
    </div>
</div>


<div class="cart d-none">
        <h2>Cart</h2>
        <p>Total Items: <span id="total-items"></span></p>
        <ul id="cart-items"></ul>
        
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- plugins js -->
    <script defer src="<?php echo site_url() ?>assets/website/js/plugins.js"></script>

    <!-- custom js -->
    <script defer src="<?php echo site_url() ?>assets/website/js/main.js"></script>
    <!-- header style two End -->


</body>

</html>


<script>
   function loadCategories(type) {
    $.ajax({
        url: '<?= base_url("website/products/load_categories_with_products") ?>',
        type: 'POST',
        data: { 
            type: type,
            store_id: $('#store_id').val(),
            language: $('#language').val()
        },
        dataType: 'text', // Expect JSON response
        success: function(response) {
            //alert(response); // Inspect the data to ensure it's being received correctly
            $('#accordion-content').html(response);
            // Initialize accordion functionality if needed
        },
        error: function() {
            alert("An error occurred while loading categories.");
        }
    });
}

</script>



<script>
function addToCart(button) {
    // Hide the Add button
    button.style.display = "none";
    // Show the quantity controls
    const quantityControls = button.nextElementSibling;
    quantityControls.style.display = "inline-flex";
}

function incrementQuantity(button) {
    // Get the quantity span and increase the value
    const quantityDisplay = button.previousElementSibling;
    let quantity = parseInt(quantityDisplay.textContent, 10);
    quantityDisplay.textContent = ++quantity;
}

function decrementQuantity(button) {
    // Get the quantity span and decrease the value if greater than 1
    const quantityDisplay = button.nextElementSibling;
    let quantity = parseInt(quantityDisplay.textContent, 10);
    if (quantity > 1) {
        quantityDisplay.textContent = --quantity;
    } else {
        // Hide quantity controls and show Add button again if quantity is 1
        const quantityControls = button.parentElement;
        quantityControls.style.display = "none";
        const addButton = quantityControls.previousElementSibling;
        addButton.style.display = "inline";
    }
}
</script>

<script>
function copyToClipboard(element) {
    var text = element.textContent;
    $('#output-textarea').val(text);
}
</script>



<script>
        $(document).ready(function() {
        loadCart();
        loadProducts();

    // Add to cart
    $(document).on('click', '.add-to-cart', function() {

        const productId = $(this).closest('.product').data('id');
        const price = $(this).closest('.product').data('price');
        const quantity = 1;
        //alert(productId);

        $.ajax({
            url: '<?= base_url("cart/add") ?>',
            method: 'POST',
            data: { product_id: productId, quantity: quantity , price : price , addon : 0 },
            success: function() {
                loadProducts();
                loadCart();
            }
        });
    });

    // Increment quantity
    $(document).on('click', '.increment', function() {
        const product = $(this).closest('.product');
        const productId = product.data('id');
        const quantityInput = product.find('.quantity');
        let quantity = parseInt(quantityInput.val()) + 1;
        quantityInput.val(quantity);
        updateCartQuantity(productId, quantity , 0);
        loadProducts();
    });

    // Decrement quantity
    $(document).on('click', '.decrement', function() {
        const product = $(this).closest('.product');
        const productId = product.data('id');
        const quantityInput = product.find('.quantity');
        let quantity = parseInt(quantityInput.val()) - 1;
        if (quantity > 0) {
            quantityInput.val(quantity);
            updateCartQuantity(productId, quantity , 0);
            loadProducts();
        }else{
            //alert('zero');
            $(this).closest('.product').find('.add-to-cart').css('display', 'block');
            $(this).closest('.product').find('#quantityControls').css('display', 'none');

            deleteCartItem(productId , 0);
            loadProducts();
        }
    });

    // Update cart quantity
    function updateCartQuantity(productId, quantity , is_addon) {
        $.ajax({
            url: '<?= base_url("cart/updateQuantity") ?>',
            method: 'POST',
            data: { product_id: productId, quantity: quantity , is_addon : is_addon },
            success: function() {
                loadCart();
            }
        });
    }

    // Load cart items and total
    function loadCart() {
        $.ajax({
            url: '<?= base_url("cart/get") ?>',
            method: 'GET',
            success: function(data) {
                const cartData = JSON.parse(data);
                displayCart(cartData);
            }
        });
    }

    function loadProducts() {
        $.ajax({
            url: '<?= base_url("website/products/loadProducts") ?>',
            method: 'GET',
            success: function(data) {
                $('#accordion-content').html(data);
            }
        });
    }

    // Display cart items and update total items count and total value
    function displayCart(cartData) {
        $('#cart-items').empty();
        let totalItems = 0;
        let cartTotal = 0;

        $.each(cartData, function(id, item) {
            const itemTotal = item.quantity * item.price;
            cartTotal += itemTotal;
            totalItems = parseInt(totalItems) + parseInt(item.quantity);

            $('#cart-items').append(
                `<li>${item.name} - ₹${item.price} x ${item.quantity} = ₹${itemTotal.toFixed(2)}
                <span class="delete-item" data-id="${id}">X</span></li>`
            );
        });

        let total = totalItems;

        function sumOfDigits(number) {
            let sum = 0;
            let digits = number.toString().split(''); // Convert number to a string and split into digits

            digits.forEach(function(digit) {
                sum += parseInt(digit, 10); // Convert each digit back to an integer and add to sum
            });

            return sum;
        }

          $('#total-items').text(total+ ' Items Added' + ' ₹' + cartTotal.toFixed(2));
        $('#cart-total').text(cartTotal.toFixed(2));
    }

    // Delete item from cart
    $(document).on('click', '.delete-item', function() {
        const productId = $(this).data('id');
        deleteCartItem(productId);
    });

    // Function to delete cart item
    function deleteCartItem(productId , isaddon) {
        $.ajax({
            url: '<?= base_url("cart/delete") ?>',
            method: 'POST',
            data: { product_id: productId,is_addon:isaddon },
            success: function() {
                loadCart();
            }
        });
    }
});

    </script>

<script>
$(document).ready(function() {
  // Triggered when the modal is about to be shown
  $('#productCustomize').on('show.bs.modal', function(event) {
    // Get the button that triggered the modal and extract the product ID
    var button = $(event.relatedTarget);
    var productId = button.data('id');
    var quantity = button.data('quantity');
    var product = button.data('prodid'); //alert(product);

    // Send an AJAX request to fetch variants and addons
    $.ajax({
      url: "<?php echo base_url('website/products/getVariantsAndAddons'); ?>",
      type: "POST",
      data: { product_id: productId , store_id : $('#store_id').val() , language: $('#language').val(),prod : product , quantity : quantity },
      success: function(response) {
        //alert(response);
        // Populate the modal with the response data
        $('#modalBodyContent').html(response);
      },
      error: function() {
        $('#modalBodyContent').html('<p class="text-danger">Unable to load data. Please try again.</p>');
      }
    });
  });
  
  
  
  
   
    // function updateTotalPrice() {
    //     let total = parseFloat($('#default-variant-price').val()); alert(total);

    //     // Add the price of the selected variant
    //     const selectedVariant = $('input[name="variant"]:checked');
    //     if (selectedVariant.length > 0) {
    //         total = parseFloat(total) + parseFloat(selectedVariant.data('price'));
    //         $('#default-variant-price').val(total);
    //     }

    //     // Add the prices of selected addons
    //     $('.addon-option:checked').each(function() {
    //         total = parseFloat(total) + parseFloat($(this).data('price'));
    //         $('#default-variant-price').val(total);
    //     });

    //     // Update the total price in the modal
    //     $('#total-price').text(total.toFixed(2));
    // }

    // Event listeners for changes in variants and addons
    // $(document).on('change', '.variant-option, .addon-option', function() {
    //     $('#quantity-input').val(1);
    //     const productId = $(this).data('prodid'); //alert(productId);
    //     $.ajax({
    //         url: '<?= base_url("cart/delete") ?>',
    //         method: 'POST',
    //         data: { product_id: productId,is_addon:0 },
    //         success: function() {
    //             loadCart();
    //         }
    //     });
    //     updateTotalPrice();
    // });

    // Initialize total price on modal show (in case items are pre-selected)
    $('#productModal').on('show.bs.modal', function() {
        updateTotalPrice();
    });
   
    // $('#modalBodyContent').on('change', 'input[name="variant"]', function() {
    //     basePrice = parseFloat($(this).data("price")); //alert(basePrice);
    //     $('#customizeProduct').attr('data-price', basePrice);
    //     updateTotalPrice();
    // });
    
    

     // Add to cart button
//     $(document).on('change', '.addon-option', function () {
//     var productId = $(this).data('id');
//     var price = $(this).data('price');
//     var quantity = 1;

//     // Check if the checkbox is checked or unchecked
//     if ($(this).prop('checked')) {
//         // If checked, add the addon to the cart
//         $.ajax({
//             url: '<?= base_url("cart/add") ?>',
//             method: 'POST',
//             data: { product_id: productId, quantity: quantity, price: price, addon: 1 },
//             success: function() {
//                 loadCart();
//                 updateTotalPrice();
//             }
//         });
//     } else {
//         // If unchecked, remove the addon from the cart
//         $.ajax({
//             url: '<?= base_url("cart/delete") ?>', // Assuming you have a remove route
//             method: 'POST',
//             data: { product_id: productId, price: price, addon: 1 },
//             success: function() {
//                 loadCart();
//                 updateTotalPrice();
//             }
//         });
//     }
// });

  
    
});
                
</script>


<!-- add tocart popup -->
 <script>
$(document).on('click', '.add-to-cart-popup', function() {
   //alert('here');

const productId = $(this).data('id'); //alert(productId);
const price = $('input[name="variant"]:checked').data('price');//alert(price);
const variantId = $('input[name="variant"]:checked').val();//alert(variantId);
const quantity = $('#quantity').val(); //alert(quantity);
const recipe = $('#output-textarea').val();
const is_addon = 0;
//alert(price);alert(quantity);

$.ajax({
                    url: '<?= base_url("cart/deleteparent") ?>',
                    method: 'POST',
                    data: { prdParentId: productId  },
                    success: function() {
                                $.ajax({
                            url: '<?= base_url("cart/add") ?>',
                            method: 'POST',
                            data: { prdParentId: productId ,product_id: productId, quantity: quantity , price : price , addon : is_addon , recipe : recipe , variant_id : variantId },
                            success: function() {
                                $('#productCustomize').modal('hide');
                                location.reload();
                            }
                        });
                    }
                });

});
</script>
<!-- <script>
    $(document).on('click', '#increment-btn', function() {
        const productId = $(this).data('id'); 
        const quantityInput = $('#quantity-input');
        let currentValue = parseInt(quantityInput.val());
        quantityInput.val(currentValue + 1);
        let quantity = parseInt(quantityInput.val()); //alert(productId);alert(quantity);
        const price = $('input[name="variant"]:checked').data('price'); //alert(price);alert(quantity);
        const current_total_amount =$('#default-variant-price').val();
        const total = parseFloat(current_total_amount) + parseFloat(price * 1);
        $('#default-variant-price').val(total);
    
});

$(document).on('click', '#decrement-btn', function() {
    const productId = $(this).data('id'); //(productId);
    const quantityInput = $('#quantity-input');   
    let currentValue = parseInt(quantityInput.val());
    quantityInput.val(currentValue - 1);
    let quantity = parseInt(quantityInput.val()) - 1; //alert(productId);alert(quantity);
    if (quantity > 0) { // Ensuring minimum value of 1
        $.ajax({
            url: '<?= base_url("cart/updateQuantity") ?>',
            method: 'POST',
            data: { product_id: productId, quantity: quantity },
            success: function() {
                loadCart();
                // $('#productCustomize').modal('hide');
                // location.reload();
            }
        });
    }else{
        $.ajax({
            url: '<?= base_url("cart/delete") ?>',
            method: 'POST',
            data: { product_id: productId },
            success: function() {
                $('#productCustomize').modal('hide');
                location.reload();
            }
        });
    }
});
</script> -->

<script>
$(document).ready(function() {
    $(document).on('click', '.seeMoreBtn', function() {
        const moreText = $(this).siblings(".product-description").find(".more-text");
        if (moreText.is(":visible")) {
            moreText.hide();
            $(this).text("See More");
        } else {
            moreText.show();
            $(this).text("See Less");
        }
    });
});
</script>

<script>
$(document).ready(function() {
    // Function to calculate the base price (variant * quantity)
    function calculateBasePrice() {
        const quantity = parseInt($('#quantity').val()) || 1;
        let variantPrice = $('input[name="variant"]:checked').data('price');

        // Get the selected variant price
        const selectedVariant = $('input[name="variant"]:checked');
        if (selectedVariant.length) {
            variantPrice = parseFloat(selectedVariant.data('price'));
        }

        // Calculate base total (variant price * quantity)
        const baseTotal = variantPrice * quantity;
        return baseTotal;
    }

    // Function to calculate the total addon price
    function calculateAddonPrice() {
        let addonPrice = 0;

        // Calculate addons price
        $('input[name="addon"]:checked').each(function() {
            addonPrice += parseFloat($(this).data('price')) * parseInt($('#quantity').val());
        });

        return addonPrice;
    }

    // Function to update the displayed total price
    function updateTotalPrice() {
        const basePrice = calculateBasePrice();
        const addonPrice = calculateAddonPrice();

        //alert(basePrice);alert(addonPrice);

        // Total price includes base price and addon price
        const totalPrice = basePrice + addonPrice;
        $('#total-price').text(totalPrice.toFixed(2));
    }

    // Event listeners for changes
    $('#modalBodyContent').on('change', 'input[name="variant"]', function() {
        //alert('here');
        $('#quantity').val(1);
        const productId = $(this).data('prodid'); //alert(productId);
        $.ajax({
            url: '<?= base_url("cart/delete") ?>',
            method: 'POST',
            data: { product_id: productId,is_addon:0 },
            success: function() {
                loadCart();
            }
        });
        updateTotalPrice(); // Recalculate the total when the variant changes
    });

    // change addons function
    $('#modalBodyContent').on('change', 'input[name="addon"]', function() {
        var productId = $(this).data('id');
        var parentId = $(this).data('parentid');alert(parentId);
        var price = $(this).data('price');
        var quantity = $('#quantity').val();

        // Check if the checkbox is checked or unchecked
        if ($(this).prop('checked')) {
            // If checked, add the addon to the cart
            $.ajax({
                url: '<?= base_url("cart/add") ?>',
                method: 'POST',
                data: { product_id: productId, quantity: quantity, price: price, addon: 1 , prdParentId : parentId },
                success: function() {
                    loadCart();
                    updateTotalPrice();
                }
            });
        } else {
            // If unchecked, remove the addon from the cart
            $.ajax({
                url: '<?= base_url("cart/delete") ?>', // Assuming you have a remove route
                method: 'POST',
                data: { prdParentId: parentId, price: price, addon: 1 },
                success: function() {
                    loadCart();
                    updateTotalPrice();
                }
            });
        }
        updateTotalPrice(); // Recalculate the total when an addon is changed
    });
    // change addons function

    $(document).on('change', '#quantity', function() {
        var productId = $(this).data('prodid');//alert(productId);
        updateTotalPrice(); // Recalculate the total when the quantity changes
    });

    // Initial calculation
    updateTotalPrice();
});


</script>