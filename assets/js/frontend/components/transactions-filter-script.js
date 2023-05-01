class TransactionsFilter {
	constructor(uri) {
		this.uri = uri;
		this.isLoading = true;
		this.error = null;
		this.transaction = [];
		this.promise = null;
		this.totalTransaction = null;
	}

	async getJSON() {
		const response = await fetch(
			`${this.uri}/wp-json/wp/v2/transaction?per_page=18&acf_format=standard`,
		);

		if (!response.ok) {
			const message = `An error has occured: ${response.status}`;
			throw new Error(message);
		}

		// get the total pages
		this.totalTransaction = await response.headers['X-WP-Total'];

		const transaction = await response.json().then((data) => {
			this.isLoading = false;
			this.transaction = data;
		});

		return transaction;
	}

	alpineSetting(func) {
		return document.addEventListener('alpine:init', func);
	}

	init() {
		this.promise = this.getJSON();
		// eslint-disable-next-line prettier/prettier
	}
}

export default TransactionsFilter;
