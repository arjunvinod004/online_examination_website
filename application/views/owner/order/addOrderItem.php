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


    <!-- if response within jquery -->
    <div class="message d-none" role="alert"></div>
    <!-- if response within jquery -->


    <?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success dark" role="alert">
        <?php echo $this->session->flashdata('success');$this->session->unset_userdata('success'); ?>
    </div><?php } ?>

    <?php if($this->session->flashdata('error')){ ?>
    <div class="alert alert-danger dark" role="alert">
        <?php echo $this->session->flashdata('error');$this->session->unset_userdata('error'); ?>
    </div><?php } ?>


    <input type="hidden" id="order_id" value="<?php echo $type;?>">

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
    ?>


    <div class="container">
        <div class="row">
            <!-- Product ID Field -->
            <div class="col-12">
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
    </div>

    <div id="orders-container">

        <!-- Orders will be displayed here -->
    </div>












</div>





<!--modal for delete confirmation-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo confirm; ?></h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="table_id" value="" />
                <input type="hidden" name="id" id="store_id_hidden_popup" value="" />
                <?php echo are_you_sure; ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                <button class="btn btn-secondary" id="yes_del_table" type="button" data-bs-dismiss="modal">Yes</button>
            </div>
        </div>
    </div>
</div>
<!--modal for delete confirmation-->





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
        url: '<?= base_url("owner/order/getProductRatesWithIsCustomizeExistingOrder"); ?>',
        method: 'POST',
        data: {
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