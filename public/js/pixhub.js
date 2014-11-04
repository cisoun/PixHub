var PixHub =  {
	/**
	 * Make a transparent navbar.
	 * @revert revertOnScroll Switch the navbar to its normal style when the user is scrolling.
	 */
	makeTransparentNavbar : function(revertOnScroll) {
		$(document).ready(function() {
			$('nav').addClass('navbar-transparent');
		});

		if (revertOnScroll) {
			$(window).scroll(function() {
				if ($(document).scrollTop() < 50) {
					$('nav').addClass('navbar-transparent');
				} else {
					$('nav').removeClass('navbar-transparent');
				}
			});
		}
	}
};
