document.addEventListener('alpine:init', async () => {
	// eslint-disable-next-line no-unused-expressions, no-undef
	Alpine.data('animatedCounter', (target) => ({
		current: 0,
		// eslint-disable-next-line object-shorthand
		target: target,
		time: 400,
		start: 0,
		updateCounter() {
			const { start } = this;
			const increment = (this.target - start) / this.time;
			const handle = setInterval(() => {
				if (this.current < this.target) this.current += increment;
				else {
					clearInterval(handle);
					this.current = this.target;
				}
			}, 1);
		},
	}));
});
