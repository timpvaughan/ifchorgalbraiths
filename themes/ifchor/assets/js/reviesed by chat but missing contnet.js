(function ($) {
	$(document).ready(function () {
		// Burger menu
		$(".burger-menu, .arrow-menu").on("click", function (event) {
			event.preventDefault();
			$(this).toggleClass("active");
			$(".burger-menu-wrap").toggleClass("open-menu");
			$("body").toggleClass("no-scroll");
		});

		// Close menu when clicking outside
		$(".site-content").on("click", function (event) {
			if (!$(event.target).closest(".burger-menu-wrap").length) {
				$(".burger-menu").removeClass("active");
				$(".burger-menu-wrap").removeClass("open-menu");
				$("body").removeClass("no-scroll");
			}
		});

		$(".arrow-menu").on("click", function () {
			$(".burger-menu").removeClass("active");
		});

		$("#side-panel").on("click", ".close-btn", function (event) {
			event.preventDefault();
			$("#side-panel").removeClass("active");
			$(".burger-menu").removeClass("active");
			$("body").removeClass("no-scroll");
			$(".site, .site-header").removeClass("pusher");
		});

		// Sticky header
		if ($("body").hasClass("home")) {
			$(window).on("scroll", function () {
				$(".site-header").toggleClass("sticky", $(window).scrollTop() > 0);
			});
		} else {
			$(".site-header").addClass("sticky");
		}

		// AOS
		AOS.init({ easing: "ease", duration: 800 });

		// Swiper sliders
		[
			[".capsize-slider", ".capsize-pagination", ".capsize-next", ".capsize-prev"],
			[".panamax-slider", ".panamax-pagination", ".panamax-next", ".panamax-prev"],
			[".ultramax-slider", ".ultramax-pagination", ".ultramax-next", ".ultramax-prev"],
			[".career-slider", ".career-pagination", ".car-next", ".car-prev"],
		].forEach(([slider, pagination, next, prev]) => {
			new Swiper(slider, {
				slidesPerView: 1,
				spaceBetween: 0,
				loop: true,
				speed: 1000,
				pagination: { el: pagination, clickable: true },
				navigation: { nextEl: next, prevEl: prev },
			});
		});

		// Menu toggle for primary
		$("#menu-primary-menu li > a").each(function () {
			const $parent = $(this).parent();
			if ($parent.hasClass("level-0")) {
				$('<span class="level-trigger"></span>').insertBefore($(this));
			}
		});

		$("#menu-primary-menu").on("click", "span.level-trigger", function () {
			const $parent = $(this).parent();
			if ($parent.hasClass("menu-item-has-children")) {
				if ($parent.hasClass("open")) {
					$parent.children(".sub-menu").slideUp(400, () => $parent.removeClass("open"));
					$parent.siblings().show();
				} else {
					$parent.siblings(".open").removeClass("open").children(".sub-menu").slideUp(400);
					$parent.children(".sub-menu").slideDown(400, () => $parent.addClass("open"));
					$parent.nextAll().hide();
				}
			}
		});

		// Load more button
		$("body").on("click", ".ifchor_loadmore", function () {
			const button = $(this);
			const data = {
				action: "ifchor_load_more",
				query: ifchor_vars.posts,
				page: ifchor_vars.current_page,
				nonce: ifchor_vars.nonce,
			};

			$.post(ifchor_vars.ajaxurl, data, (response) => {
				if (response) {
					$(response).hide().appendTo(".post-grid-container").fadeIn();
					button.find("span").text(ifchor_vars.load_more);
					ifchor_vars.current_page++;
					if (ifchor_vars.current_page == ifchor_vars.max_page) button.remove();
				} else {
					button.remove();
				}
			});
		});

		// Select2 and contact form
		$(".contacts-field-item").each(function () {
			const $select = $(this).find(".selecttwo-select");
			$select
				.select2({
					placeholder: $(this).data("placeholder"),
					allowClear: true,
					theme: "default select2-container--cbx",
					searchInputPlaceholder: "Search",
				})
				.on("select2:select", () => $("#our_people_form").trigger("submit"));
		});

		$("#our_people_form").on("submit", function (e) {
			e.preventDefault();
			window.location.href = `${ifchor_vars.contacts_url}?${$(this).serialize()}`;
		});

		$("#dept_items_filters")
			.select2()
			.on("change", function () {
				window.location.href = `${ifchor_vars.offices_url}?dept=${$(this).val()}`;
			});

		// Timeline GSAP (conditionally loaded)
		if (typeof gsap !== "undefined" && document.querySelector(".timeline-left-pin")) {
			// Your validated GSAP setup logic should be inserted here
			setupTimelinePinning();
		}

		if ($("#homevideoModal").length) {
			const $iframe = $("#homevideoiframe");
			const videoUrl = $iframe.data("link");
			const modal = new bootstrap.Modal("#homevideoModal");

			$("#video-popup").on("click", function (e) {
				e.preventDefault();
				modal.show();
			});

			const modalEl = document.getElementById("homevideoModal");

			modalEl.addEventListener("show.bs.modal", () => {
				$iframe.attr("src", videoUrl);
			});

			modalEl.addEventListener("hide.bs.modal", () => {
				$iframe.attr("src", "");
			});

			modalEl.addEventListener("shown.bs.modal", () => {
				const player = new Vimeo.Player("homevideoiframe", {
					loop: true,
					muted: false,
					autoplay: true,
				});
				player.setVolume(1);
			});
		}
	});
})(jQuery);
