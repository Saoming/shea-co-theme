document.addEventListener('alpine:init', async () => {
	// eslint-disable-next-line no-unused-expressions, no-undef
	Alpine.data('transactionFilter', () => ({
		uri: window.location.origin,
		isLoading: true,
		year: null,
		transactionType: null,
		locationx: null,
		sector: null,
		sub_sector: null,
		error: null,
		shownNumber: 18,
		addPerLoadClick: 18,
		transactions: [],
		actualTransactions: [],
		filters: new URLSearchParams(),
		loadMore() {
			if (this.shownNumber + this.addPerLoadClick > this.transactions.length) {
				this.shownNumber = this.transactions.length;
			} else {
				this.shownNumber += this.addPerLoadClick;
			}
			this.actualTransactions = this.transactions.slice(0, this.shownNumber);
		},
		showAll() {
			this.actualTransactions = this.transactions;
		},
		async fetch() {
			const response = await fetch(
				`${this.uri}/wp-json/custom/v1/transactions?${this.filters.toString()}`,
			);

			if (!response.ok) {
				const message = `An error has occured: ${response.status}`;
				throw new Error(message);
			}

			this.transactions = await response.json().then((data) => {
				this.isLoading = false;
				this.transaction = data;
				return data;
			});

			this.actualTransactions = this.transactions.slice(0, this.shownNumber);
		},
		resetFilter() {
			this.filters = new URLSearchParams();
		},
		toggleFilter(key, val) {
			// eslint-disable-next-line no-alert

			this.filters.set(key, val);
			this.fetch();
		},
		init() {
			this.fetch();
		},
	}));
});
