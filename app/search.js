const itemList = document.getElementById('itemList');
const searchInput = document.getElementById('searchInput');
const cityInput = document.getElementById('searchcity');
const categoryFilter = document.getElementById('categoryFilter');
const priceRangeMin = document.getElementById('priceRangeMin');
const priceRangeMax = document.getElementById('priceRangeMax');

function displayItems(filteredItems) {
    itemList.innerHTML = '';

    if (filteredItems.length === 0) {
        itemList.innerHTML = '<p> No items found.</p>';
        return;
    }

    filteredItems.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.classList.add('item');
        itemElement.innerHTML = `
            <h3>${item.name}</h3>
            <p><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M464 256H48a48 48 0 0 0 0 96h416a48 48 0 0 0 0-96zm16 128H32a16 16 0 0 0-16 16v16a64 64 0 0 0 64 64h352a64 64 0 0 0 64-64v-16a16 16 0 0 0-16-16zM58.64 224h394.72c34.57 0 54.62-43.9 34.82-75.88C448 83.2 359.55 32.1 256 32c-103.54.1-192 51.2-232.18 116.11C4 180.09 24.07 224 58.64 224zM384 112a16 16 0 1 1-16 16 16 16 0 0 1 16-16zM256 80a16 16 0 1 1-16 16 16 16 0 0 1 16-16zm-128 32a16 16 0 1 1-16 16 16 16 0 0 1 16-16z"/></svg> ${item.category}</p>
            <p>Rs: ${item.price}</p>
            <p><i class='bx bxs-map-pin'></i></i> ${item.city}</p>
            <a href="${item.link}" target="_blank">View Location</a>
            `;
        itemList.appendChild(itemElement);
    });
}

function applyFilters() {
    const searchTerm = searchInput.value.toLowerCase();
    const selectedCategory = categoryFilter.value;
    const minPrice = parseFloat(priceRangeMin.value);
    const maxPrice = parseFloat(priceRangeMax.value);
    const selectedCity = cityInput.value.toLowerCase(); // Get the selected city and convert to lowercase

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const itemsFromServer = JSON.parse(xhr.responseText);
                const filteredItems = itemsFromServer.filter(item => {
                    const matchesSearch = item.name.toLowerCase().includes(searchTerm);
                    const matchesCategory = selectedCategory === '' || item.category === selectedCategory;
                    const withinPriceRange = (isNaN(minPrice) || item.price >= minPrice) &&
                        (isNaN(maxPrice) || item.price <= maxPrice);
                    const matchesCity = selectedCity === '' || item.city.toLowerCase().includes(selectedCity); // Check if the item's city includes the selected city

                    return matchesSearch && matchesCategory && withinPriceRange && matchesCity;
                });

                displayItems(filteredItems);
            } else {
                console.error('Error fetching data:', xhr.statusText);
            }
        }
    };

    xhr.open('GET', 'get_items.php', true);
    xhr.send();
}


// Event listeners
searchInput.addEventListener('input', applyFilters);
cityInput.addEventListener('input', applyFilters);
categoryFilter.addEventListener('change', applyFilters);
priceRangeMin.addEventListener('input', applyFilters);
priceRangeMax.addEventListener('input', applyFilters);

// Initial display
applyFilters(); // Load and display data when the page loads
