	$(document).ready(function() {
		$('#closecampus').on('click', function() {
			$.sidr('close', 'sidr-campus-nav');
		});
		$('#closesearch').on('click', function() {
			$.sidr('close', 'sidr-search-nav');
		});
	    $('#sidr-campus').sidr({
	      name: 'sidr-campus-nav',
	      side: 'left' // By default
	    });
	    $('#sidr-search').sidr({
	      name: 'sidr-search-nav',
	      side: 'right'
	    });

	});
