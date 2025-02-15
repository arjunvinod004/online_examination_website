<input type="hidden" id="base_url" value="<?php echo base_url();?>">
<link href="<?php echo base_url();?>assets/admin/css/crm-responsive.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/admin/css/classic.min.css" rel="stylesheet" /> <!-- 'classic' theme -->
<link href="<?php echo base_url();?>assets/admin/fonts/css/all.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
    type="text/css" />
<link href="<?php echo base_url();?>assets/admin/css/icon.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>assets/admin/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/bootstrap.bundle.min.js"></script>

<div class="row">
    <input type="hidden" id="order_number" value="<?php echo $order_number;?>">
    <input type="hidden" id="orderType" value="<?php echo $orderType;?>">
    <div class="col-12 text-center">
        <h2>DINING ORDER</h2>
    </div>
    <div class="col-6">
        <label class="form-label" for="default-input">Select Table</label>
        <select class="form-select" name="table_id" id="table_id">
            <option value="">Select Table</option>
            <?php
                                foreach($activeTables as $table)
                                {
                                ?>
            <option value="<?=$table['table_id'];?>" <?php echo set_select('table_id', $table['table_id'])?>>
                <?=$table['table_name'];?></option>
            <?php
                                }
                                ?>
        </select>
    </div>
    <?php if(!empty($products))
    {
        $activeProducts = [];
        foreach ($products as $product) {
            if ($product['status'] == 0) {
                $activeProducts[] = $product;
            }
            $prod = array_merge($activeProducts);
        }
    } 
    //print_r($prod);exit;
    ?>

    <div class="col-6">
        <label class="form-label" for="default-input">Select Product</label>
        <div class="custom-select-container">
            <div class="custom-dropdown" id="dropdown">Select product</div>
            <div class="dropdown-content" id="dropdownContent">
                <input type="text" class="search-box" id="searchBox" placeholder="Search...">
                <?php if(!empty($prod)){ foreach($prod as $product){ ?>
                <div data-value="<?=$product['store_product_id'];?>"><?=$product['product_name_en'];?></div>
                <?php }} ?>
            </div>
            <select class="custom-select form-select d-none" id="originalSelect">
                <?php if(!empty($prod)){ foreach($prod as $product){ ?>
                <option value="<?=$product['store_product_id'];?>"><?=$product['product_name_en'];?></option>
                <?php }} ?>
            </select>
        </div>
    </div>
</div>

<div class="" id="orders-container"></div>
<div id="order_display" class="row"></div>
</div>
</div>

<script src="<?php echo base_url();?>assets/admin/js/modules/store.js"></script>

<!-- JAVASCRIPT -->
<script src="<?php echo base_url();?>assets/admin/js/metismenu.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/simplebar.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/waves.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/feather.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/app.js"></script>

<script>
const dropdown = document.getElementById('dropdown');
const dropdownContent = document.getElementById('dropdownContent');
const searchBox = document.getElementById('searchBox');
const items = Array.from(dropdownContent.querySelectorAll('div[data-value]'));
let highlightedIndex = -1;

// Show dropdown on focus
dropdown.addEventListener('click', () => {
    toggleDropdown();
});

searchBox.addEventListener('focus', () => {
    dropdownContent.style.display = 'block';
});

// Filter items based on search
searchBox.addEventListener('input', () => {
    const filter = searchBox.value.toLowerCase();
    highlightedIndex = -1; // Reset highlight
    items.forEach((item) => {
        item.style.display = item.textContent.toLowerCase().includes(filter) ? '' : 'none';
    });
});

// Keyboard navigation
searchBox.addEventListener('keydown', (e) => {
    const visibleItems = items.filter(item => item.style.display !== 'none');
    if (e.key === 'ArrowDown') {
        e.preventDefault();
        highlightedIndex = (highlightedIndex + 1) % visibleItems.length;
        updateHighlight(visibleItems);
    } else if (e.key === 'ArrowUp') {
        e.preventDefault();
        highlightedIndex = (highlightedIndex - 1 + visibleItems.length) % visibleItems.length;
        updateHighlight(visibleItems);
    } else if (e.key === 'Enter') {
        e.preventDefault();
        if (highlightedIndex > -1) {
            selectItem(visibleItems[highlightedIndex]);
        }
    }
});

// Highlight item
function updateHighlight(visibleItems) {
    visibleItems.forEach((item, index) => {
        item.classList.toggle('highlighted', index === highlightedIndex);
    });
}

// Select item
function selectItem(item) {
    const value = item.dataset.value;
    const text = item.textContent;
    dropdown.textContent = text;
    searchBox.value = text;
    dropdownContent.style.display = 'none';
    searchBox.blur();
    $.ajax({
        url: '<?= base_url("owner/order/getProductRatesWithIsCustomizeNewDiningOrder"); ?>',
        method: 'POST',
        data: {
            order_number: $('#order_number').val(),
            table_id: $('#table_id').val(),
            orderType: $('#orderType').val(),
            product_id: value
        },
        success: function(response) {
            $('#orders-container').html(response);
        }
    });
}

// Toggle dropdown visibility
function toggleDropdown() {
    const isOpen = dropdownContent.style.display === 'block';
    dropdownContent.style.display = isOpen ? 'none' : 'block';
    if (!isOpen) searchBox.focus();
}

// Close dropdown if clicked outside
document.addEventListener('click', (e) => {
    if (!e.target.closest('.custom-select-container')) {
        dropdownContent.style.display = 'none';
    }
});

// Handle click on dropdown items
items.forEach(item => {
    item.addEventListener('click', () => {
        selectItem(item);
    });
});
</script>