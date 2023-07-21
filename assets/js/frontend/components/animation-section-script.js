class AnimationSection {
	constructor(element) {
		this.element = element;
	}

	intersecting() {
		const observerOptions = {
			root: null,
			threshold: 0,
			rootMargin: '0px 0px -50px 0px',
		};

		const observer = new IntersectionObserver((entries) => {
			entries.forEach((entry) => {
				if (entry.isIntersecting) {
					entry.target.classList.add('in-view');
					observer.unobserve(entry.target);
				}
			});
		}, observerOptions);

		const sections = Array.from(document.getElementsByClassName('section'));
		for (const section of sections) {
			const fadeups = section.getElementsByClassName('fade-delay');
			for (let count = 0; count < fadeups.length; count++) {
				fadeups[count].setAttribute('style', `transition-delay: ${count * 0.25}s`);
			}
			observer.observe(section);
		}
	}

	fireWhenReady(func) {
		// call method when DOM is loaded
		return document.addEventListener('DOMContentLoaded', func);
	}

	init() {
		this.fireWhenReady(this.intersecting);
	}
}

export default AnimationSection;
