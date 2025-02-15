// about us function for scrolltop
function scroll_top_about(e) {
    $('html, body').animate({
        scrollTop: $('#ts-features').offset().top - 30 // Scroll to #gallery minus 200px
    }, 800); // 800ms for smooth scroll

    }
    
function scroll_top_gallery() {
    $('html, body').animate({
        scrollTop: $('#project-area').offset().top - 100 // Scroll to #gallery minus 200px
    }, 800); // 800ms for smooth scroll

}


function scroll_top_contact() {
    $('html, body').animate({
        scrollTop: $('#footer').offset().top - 50 // Scroll to #gallery minus 200px
    }, 800); // 800ms for smooth scroll

}
