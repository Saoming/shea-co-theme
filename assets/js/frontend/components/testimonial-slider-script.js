class TestimonialSlider {
	constructor(element) {
		this.element = element;
	}

	splideSettings() {
		// eslint-disable-next-line no-undef
		const splide = new Splide('.splide');
		splide.mount();
	}

	fireWhenReady(func) {
		// call method when DOM is loaded
		return document.addEventListener('DOMContentLoaded', func);
	}

	init() {
		this.fireWhenReady(this.splideSettings);
	}
}

export default TestimonialSlider;
