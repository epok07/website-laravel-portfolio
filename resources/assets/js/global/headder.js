$(".nav-link").each(function(subElem){
	if ($(this).attr('href') == "/" && window.location.pathname == "/") {
		$(this).addClass("active");
	} else if ( $(this).attr('href') != "/" && (window.location.href).includes($(this).attr('href'))) {
		$(this).addClass("active");
	}
})
