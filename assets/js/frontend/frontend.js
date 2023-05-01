import '../../css/frontend/style.css';

// import foo from './components/bar';
import TestimonialSlider from './components/testimonial-slider-script';
import TransactionsFilter from './components/transactions-filter-script';

const testimonialSlider = new TestimonialSlider();
testimonialSlider.init();

const base_url = window.location.origin;

// eslint-disable-next-line no-unused-vars
const transactionsFilter = new TransactionsFilter(base_url);

window.transactionsFilter = transactionsFilter;
