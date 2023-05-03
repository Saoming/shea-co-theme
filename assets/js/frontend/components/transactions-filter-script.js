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
		const response = await fetch(`${this.uri}/wp-json/custom/v1/transactions`);

		if (!response.ok) {
			const message = `An error has occured: ${response.status}`;
			throw new Error(message);
		}

		this.totalTransaction = await response.headers['X-WP-Total'];

		const transaction = await response.json().then((data) => {
			this.isLoading = false;
			this.transaction = data;
			return data;
		});

		return transaction;
	}

	async init() {
		const newTransactions = await this.getJSON();
		// eslint-disable-next-line no-undef
		Alpine.store('test').transactions = newTransactions;
	}
}

export default TransactionsFilter;
