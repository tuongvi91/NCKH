const searchInput = document.getElementById('search');
        const cards = document.querySelectorAll('.card');

        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.toLowerCase();

            cards.forEach(card => {
                const title = card.querySelector('.card__title').textContent.toLowerCase();
                const author = card.querySelector('.card__author').textContent.toLowerCase();

                if (title.includes(searchTerm) || author.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });