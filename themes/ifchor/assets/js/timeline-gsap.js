window.setupTimelinePinning = function setupTimelinePinning() {
	(function () {
		if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined") return;

		gsap.registerPlugin(ScrollTrigger);

		ScrollTrigger.create({
			trigger: ".history-section",
			start: "top top",
			endTrigger: ".timeline-end",
			end: "top center",
			pin: ".history-items",
			pinSpacing: false,
			onLeave: () => console.log("📍 history-items unpinned"),
		});

		window.addEventListener("load", () => {
			requestAnimationFrame(() => {
				requestAnimationFrame(() => {
					const leftPin = document.querySelector(".timeline-left-pin");
					const rightPin = document.querySelector(".timeline-right-pin");
					const leftCol = document.querySelector(".timeline-column.left");
					const rightCol = document.querySelector(".timeline-column.right");

					if (!(leftPin && rightPin && leftCol && rightCol)) return;

					const circleEl = (el) => el?.querySelector?.(".circle") || null;
					const circleText = (el) => circleEl(el)?.textContent?.trim() || "";
					const centerOf = (el) => {
						const c = circleEl(el) || el;
						if (!c) return null;
						const r = c.getBoundingClientRect();
						return r.top + window.scrollY + c.offsetHeight / 2;
					};

					const findYearItem = (col, test) => {
						return Array.from(col.querySelectorAll("[data-year]")).find((n) => {
							const dy = n.getAttribute("data-year")?.trim();
							const txt = circleText(n);
							return test(dy, txt, n);
						});
					};

					const yearTest = (range) => (val) => {
						if (!val) return false;
						const v = val.replace(/\D/g, "");
						const num = parseInt(v, 10);
						return num >= range[0] && num <= range[1];
					};

					const left1970 = findYearItem(leftCol, (dy, txt) => yearTest([1970, 1979])(dy || txt));
					const right1970 = findYearItem(rightCol, (dy, txt) => yearTest([1970, 1979])(dy || txt));
					const left1980s = findYearItem(leftCol, (dy, txt) => yearTest([1980, 1989])(dy || txt));
					const right2020s = findYearItem(rightCol, (dy, txt) => yearTest([2020, 2029])(dy || txt));

					if (!(left1970 && right1970 && left1980s && right2020s)) return;

					const band = document.querySelector(".history-items");
					const bandOffset = (band?.offsetHeight || 0) - 339;
					const visualStart = `top+=${bandOffset} top`;
					const spacer = document.querySelector(".timeline-spacer");

					gsap.set([leftPin, rightPin], { clearProps: "all" });

					requestAnimationFrame(() => {
						const cL1970 = centerOf(left1970);
						const cR1970 = centerOf(right1970);
						const cL1980s = centerOf(left1980s);
						const cR2020s = centerOf(right2020s);

						if (![cL1970, cR1970, cL1980s, cR2020s].every(Number.isFinite)) return;

						const dist1970 = Math.abs(cL1970 - cR1970);
						const dist1980to2020 = Math.abs(cR2020s - cL1980s);
						const totalDist = dist1970 + dist1980to2020;

						if (spacer) spacer.style.height = `${totalDist}px`;

						ScrollTrigger.create({
							trigger: ".history-section",
							start: visualStart,
							end: `+=${dist1970}`,
							pin: rightPin,
							pinSpacing: false,
						});

						ScrollTrigger.create({
							trigger: left1970,
							start: visualStart,
							end: `+=${totalDist}`,
							pin: leftPin,
							pinSpacing: false,
						});
					});
				});
			});
		});
	})();
};
