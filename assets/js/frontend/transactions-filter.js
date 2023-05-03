import TransactionsFilter from './components/transactions-filter-script';

const base_url = window.location.origin;

// eslint-disable-next-line no-unused-vars
const transactionsFilter = new TransactionsFilter(base_url);

// eslint-disable-next-line no-unused-expressions, no-undef
document.addEventListener('alpine:init', () => {
	// eslint-disable-next-line no-unused-expressions, no-undef
	Alpine.store('test', {
		transactions: [],
	});
	transactionsFilter.init();
	// eslint-disable-next-line no-unused-expressions, no-undef,, no-console
});

window.transactionsFilter = transactionsFilter;
