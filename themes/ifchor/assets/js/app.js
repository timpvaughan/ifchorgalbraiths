console.log("👂 Menu toggle event listener attached");
(function ($) {
	$(function () {
		console.log("💡 jQuery ready");

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
		if (typeof AOS !== "undefined") {
			AOS.init({ easing: "ease", duration: 800 });
		} else {
			console.warn("AOS not loaded");
		}
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
		console.log("Menu toggle script loaded");

		$("#menu-primary-menu > li.menu-item-has-children > a").each(function () {
			const $parent = $(this).parent();
			$('<span class="level-trigger"></span>').insertBefore($(this));
		});

		// Replace existing handler with this
		console.log("🧷 Binding direct menu click handler");

		$("#menu-primary-menu").on("click", "span.level-trigger", function (e) {
			console.log("👉 Direct trigger click");

			e.preventDefault();
			e.stopImmediatePropagation(); // just in case something else is listening

			const $parent = $(this).closest("li.menu-item-has-children");

			if ($parent.hasClass("open")) {
				console.log("🔒 Closing submenu");
				$parent.children(".sub-menu").slideUp(400, () => $parent.removeClass("open"));
				$parent.siblings().show();
			} else {
				console.log("🔓 Opening submenu");
				$parent.siblings(".open").removeClass("open").children(".sub-menu").slideUp(400);
				$parent.children(".sub-menu").slideDown(400, () => $parent.addClass("open"));
				$parent.nextAll().hide();
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

		// $("#our_people_form").on("submit", function (e) {
		// 	e.preventDefault();
		// 	window.location.href = `${ifchor_vars.contacts_url}?${$(this).serialize()}`;
		// });

		$("#our_people_form").on("submit", function (e) {
			e.preventDefault();
			window.location.href = ifchor_vars.contacts_url + "?" + $(this).serialize();
		});

		const runOfficeCardAnimation = (context = document) => {
			const $officeCards = $(context).find("#office_items .office_item");
			if (!$officeCards.length) return;

			$officeCards.css({
				opacity: 0,
				transform: "translateY(20px)",
				transition: "transform 400ms ease, opacity 400ms ease",
			});

			setTimeout(() => {
				$officeCards.each((idx, el) => {
					setTimeout(() => {
						$(el).css({ opacity: 1, transform: "translateY(0)" });
					}, idx * 80);
				});
			}, 50);
		};

		const mountOfficeFilters = () => {
			const $section = $(".contacts-filter-section");
			if (!$section.length) return;

			const $deptSelect = $section.find("#dept_items_filters");
			const $regionLinks = $section.find("#office_items_filters a");

			const fetchSection = (targetUrl, skipPush = false) => {
				const $current = $(".contacts-filter-section");
				$current.addClass("is-loading");

				fetch(targetUrl, { credentials: "same-origin" })
					.then((res) => res.text())
					.then((html) => {
						const parser = new DOMParser();
						const doc = parser.parseFromString(html, "text/html");
						const newSection = doc.querySelector(".contacts-filter-section");
						if (!newSection) {
							throw new Error("No contacts filter section found");
						}

						$current.replaceWith($(newSection));
						if (!skipPush) {
							window.history.pushState({}, "", targetUrl);
						}

						mountOfficeFilters();
						runOfficeCardAnimation();
					})
					.catch((err) => {
						console.error("Office filter fetch failed", err);
						window.location.href = targetUrl; // fallback to full reload
					});
			};

			$regionLinks.on("click", function (e) {
				e.preventDefault();
				fetchSection(this.href);
			});

			if ($deptSelect.length) {
				$deptSelect
					.select2()
					.off("change")
					.on("change", function () {
						const url = new URL(window.location.href);
						const params = url.searchParams;
						const selectedDept = $(this).val();

						if (selectedDept && selectedDept !== "ALL") {
							params.set("dept", selectedDept);
						} else {
							params.delete("dept");
						}

						const locValue = params.get("loc");
						if (!locValue || locValue === "ALL") {
							params.delete("loc");
						}

						url.search = params.toString();
						fetchSection(url.toString());
					});
			}

			if (!window.officesPopstateAttached) {
				window.officesPopstateAttached = true;
				window.addEventListener("popstate", () => {
					fetchSection(window.location.href, true);
				});
			}

			runOfficeCardAnimation();
		};

		mountOfficeFilters();

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

document.querySelectorAll("#menu‑primary‑menu span.level‑trigger").forEach((el) => {
	el.addEventListener(
		"click",
		function (e) {
			e.preventDefault();
			const li = this.closest("li.menu‑item‑has‑children");
			if (!li) return;
			if (li.classList.contains("open")) {
				li.querySelector(".sub‑menu").style.display = "none";
				li.classList.remove("open");
			} else {
				document.querySelector("#menu‑primary‑menu li.menu‑item‑has‑children.open")?.classList.remove("open");
				li.querySelector(".sub‑menu").style.display = "block";
				li.classList.add("open");
			}
		},
		{ passive: false },
	);
});
