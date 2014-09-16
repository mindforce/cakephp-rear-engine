$(function() {

    $('#side-menu').metisMenu();

	$('.btn-danger.btn-confirmation').confirmation({
		onConfirm: function(event, element){
			console.log(element.attr('href'));
			var $form = $("<form />");
			$form.attr("action", element.attr('href'));
			$form.attr("method", 'post');
			$("body").append($form);
			$form.submit()
		},
		btnOkIcon: 'fa fa-check',
		btnOkClass: 'btn btn-sm btn-danger',
		btnCancelIcon 	: 'fa fa-times'
	});

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
$(function() {
    $(window).bind("load resize", function() {
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.sidebar-collapse').addClass('collapse')
        } else {
            $('div.sidebar-collapse').removeClass('collapse')
        }
    })
})
