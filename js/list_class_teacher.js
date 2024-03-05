var modal = document.getElementById("myModal");

var btn = document.querySelector('.fa-pen');

var span = document.getElementsByClassName("close")[0];


btn.onclick = function() {
  modal.style.display = "block";
}


span.onclick = function() {
  modal.style.display = "none";
}

// Chỉnh sửa
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

document.getElementById('saveNoteBtn').addEventListener('click', function() {
    var noteText = document.getElementById('noteTextarea').value;
   
    modal.style.display = "none";
});

// Tìm kiếm

document.addEventListener("DOMContentLoaded", function() {
  const searchInput = document.getElementById("search");
  const tableRows = document.querySelectorAll("tbody tr");

  searchInput.addEventListener("input", function() {
      const searchTerm = searchInput.value.toLowerCase();

      tableRows.forEach(function(row) {
          const nameCell = row.querySelector("td:first-child");
          if (nameCell) {
              const nameText = nameCell.textContent.toLowerCase();
              if (nameText.includes(searchTerm)) {
                  row.style.display = "";
              } else {
                  row.style.display = "none"; 
              }
          }
      });
  });
});
