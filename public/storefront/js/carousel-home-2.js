$("#carousel-home-2 .owl-carousel").on("initialized.owl.carousel", function() {
  setTimeout(function() {
    $("#carousel-home-2 .owl-carousel .owl-item.active.center .animatedslide").addClass("is-transitioned");
    $("section").show();
  }, 200);
});

const $owlCarousel2 = $("#carousel-home-2 .owl-carousel").owlCarousel({
  items: 2,
  loop: true,
  center: true,
  nav: false,
  dots:true,
	responsive: {
			0: {
				items: 1,
				dots:false
			},
			600: {
				items: 1,
				dots:false
			},
			767: {
				items: 1,
				dots:false
			},
			1000: {
				items: 3,
				dots:true
			},
			1400: {
				items: 3,
				dots:true
			}
		}
});

$owlCarousel2.on("changed.owl.carousel", function(e) {
  $(".animatedslide").removeClass("is-transitioned");
  const $currentOwlItem = $("#carousel-home-2 .owl-carousel .owl-item").eq(e.item.index);
  $currentOwlItem.find(".animatedslide").addClass("is-transitioned");
});

$owlCarousel2.on("resize.owl.carousel", function() {
  setTimeout(function() {
  }, 50);
});
