$(window).scroll(function() {
	if ($(window).width() > 767) {
	   if($(this).scrollTop() > $(window).height()*0.4) {
			$('.site-header').css('display', 'block').stop().addClass('site-header-animation');
			$('a.back-to-top').css('display', 'block');
		}
		else
		{
			$('.site-header').css('display', 'none').removeClass('site-header-animation');
			$('a.back-to-top').css('display', 'none');
		}
	}
});
