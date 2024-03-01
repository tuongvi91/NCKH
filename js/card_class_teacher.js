document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.search-input');
    const cards = document.querySelectorAll('.card');

    searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.toLowerCase();

        cards.forEach(function(card) {
            const cardTitle = card.querySelector('.card-title').textContent.toLowerCase();
            if (cardTitle.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const sortSelect = document.querySelector('.sort-select');
    const cardContainer = document.querySelector('.card-container');
    const cards = Array.from(document.querySelectorAll('.card'));

    sortSelect.addEventListener('change', function() {
        const sortBy = sortSelect.value;

        cards.sort(function(a, b) {
            const aTitle = a.querySelector('.card-title').textContent;
            const bTitle = b.querySelector('.card-title').textContent;

            if (sortBy === 'title') {
                return aTitle.localeCompare(bTitle);
            } else if (sortBy === 'date') {
                const aDate = new Date(a.querySelector('.card-time').textContent);
                const bDate = new Date(b.querySelector('.card-time').textContent);
                return aDate - bDate;
            }
        });

        // Remove existing cards
        cardContainer.innerHTML = '';

        // Append sorted cards to the container
        cards.forEach(function(card) {
            cardContainer.appendChild(card);
        });
    });
});
