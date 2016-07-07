import filterCollection from './filterCollection.js';
import searchFilter from './searchFilter.js';
import tagFilter from './TagFilter.js';
import priceFilter from './priceFilter.js';

document.addEventListener("DOMContentLoaded", function(event) {
    var FilterCollection=new filterCollection(searchFilter, ["input", "searchImage", "id"], tagFilter, ["click", "searchTags","class"], priceFilter, ["input", "priceFilter","class"]);
});