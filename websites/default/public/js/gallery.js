$(document).ready(function() {
	$('.zoom-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,

		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
		
	});
})
$(document).ready(function(){
    $("#post").click(function(){
        $("#postdiv").slideToggle(400);
	});
	$("#car").click(function(){
        $("#cardiv").slideToggle(400);
	});
	$("#manufacturer").click(function(){
        $("#manufacturerdiv").slideToggle(400);
	});
	$("#order").click(function(){
        $("#orderdiv").slideToggle(400);
	});
	$("#inquiry").click(function(){
        $("#inquirydiv").slideToggle(400);
	});
	$("#hours").click(function(){
        $("#hoursdiv").slideToggle(400);
	});
	$("#users").click(function(){
	$("#usersdiv").slideToggle(400);
	});
	$("#careers").click(function(){
	$("#careersdiv").slideToggle(400);
    });
});