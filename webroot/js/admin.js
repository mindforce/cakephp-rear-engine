$(function() {
    $("#side-menu").metisMenu();
    $('.breadcrumb').mfcrumb({
        divider: '',
        windowClass: 'navbar-breadcrumb',
        animationTime: 100,
        animation: true
    });
    //Loads the correct sidebar on window load,
    //collapses the sidebar on window resize.
    $(window).bind("load", function() {
        $('#breadcrumb li').each(function() {
            if(!$(this).hasClass('first')&&!$(this).hasClass('last')){
                if($(this).children("a").length){
                    $(this).children("a").each(function() {
                        $(this).html('<span>'+$(this).text()+'</span>');
                    });
                } else {
                    $(this).html('<span>'+$(this).text()+'</span>');
                }
            }
        });
        $('#breadcrumb li:eq(0)').after('<li><span>...</span></li>');
    });
    $(window).bind("load resize", function() {
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        ellipses1 = $("#breadcrumb li:eq(1)");
        if ($("#breadcrumb li:hidden").length >1) {ellipses1.show()} else {ellipses1.hide()}
    })
})
