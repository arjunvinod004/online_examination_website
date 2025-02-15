
<!-- product_list.php -->
<html>
<head>
    <title>Product List</title>
</head>
<body>

<h1><?php echo lang('product_heading'); ?></h1>



<h1>Home page</h1>



<?php $selected_languages = explode(",", $store_selected_languages ); ?>
<?php foreach ($selected_languages as $languag):
if($languag == 'ma'){
    $lang = 'Malayalam';
}
if($languag == 'en'){
    $lang = 'English';
}
if($languag == 'hi'){
    $lang = 'Hindi';
}
if($languag == 'ar'){
    $lang = 'Arabic';
}
?>
<a href="<?php echo base_url('website/products/set_language/'.$languag); ?>"><?php echo $lang; ?></a>
<?php endforeach; ?>
<!-- <a href="<?php echo base_url('website/products/set_language/en'); ?>">English</a> |
<a href="<?php echo base_url('website/products/set_language/hi'); ?>">Hindi</a> |
<a href="<?php echo base_url('website/products/set_language/ar'); ?>">Arabic</a> <br> -->



<?php if (!empty($products)): ?>
    <ul>
    <?php foreach ($products as $product): ?>
        <li>
            <h2><?php echo $product['title']; ?></h2>
            <p><?php echo $product['description']; ?></p>
            <p>Price: <?php echo $product['price']; ?></p>
            <p>SKU: <?php echo $product['sku']; ?></p>

            <form action="<?php echo site_url('website/cart/add'); ?>" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <button type="submit">Add to Cart</button>
            </form>

        </li>
    <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No products found.</p>
<?php endif; ?>



<a href="<?php echo site_url('website/cart/view'); ?>">View Cart</a>
</body>
</html>




