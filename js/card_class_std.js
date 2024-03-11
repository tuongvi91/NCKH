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



var modal = document.getElementById("modal");
var addClassButton = document.querySelector(".add-class-button");
var closeButton = document.querySelector(".close");

addClassButton.addEventListener("click", function() {
    modal.style.display = "block";
});

closeButton.addEventListener("click", function() {
    modal.style.display = "none";
});

window.addEventListener("click", function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
});


var submitButton = document.getElementById("submit-class-code");

submitButton.addEventListener("click", function() {
    var classCodeInput = document.getElementById("class-code-input").value;
 
    console.log("Mã lớp học: " + classCodeInput);
    modal.style.display = "none"; 
});



