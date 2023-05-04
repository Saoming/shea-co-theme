const serializeFilters = (filters) => {
	return Object.keys(filters).reduce((acc, curr) => {
		return `${acc}&${filters[curr]}`;
	}, "");
};

class TransactionsFilter {
	constructor(uri) {
		this.uri = uri;
		this.isLoading = true;
		this.error = null;
		this.transaction = [];
		this.filter = {};
	}

	async getJSON() {
		const response = await fetch(
			`${this.uri}/wp-json/custom/v1/transactions?${serializeFilters(
				this.filter
			)}`
		);

		if (!response.ok) {
			const message = `An error has occured: ${response.status}`;
			throw new Error(message);
		}

		const transaction = await response.json().then((data) => {
			this.isLoading = false;
			this.transaction = data;
			return data;
		});

		return transaction;
	}

	async toggleFilter(key, val) {
		// eslint-disable-next-line no-console
		console.log(this.filter);
		if (this.filter[key]) {
			delete this.filter[key];
		} else {
			this.filter[key] = val;
		}
		await this.getJSON();
	}

	resetFilter() {
		this.filter = {};
	}

	async init() {
		this.transactions = await this.getJSON();
		// eslint-disable-next-line no-undef
		Alpine.store("test").transactions = this.transactions;
	}
}

export default TransactionsFilter;
