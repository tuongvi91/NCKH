document.getElementById("searchInput").addEventListener("input", function() {
    var keyword = this.value.toLowerCase(); 

    var teacherRows = document.querySelectorAll(".teachers tbody tr");
    teacherRows.forEach(function(row) {
        var teacherName = row.getElementsByTagName("td")[1].textContent.toLowerCase();
        if (teacherName.includes(keyword)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });

    var studentRows = document.querySelectorAll(".students tbody tr");
    studentRows.forEach(function(row) {
        var studentName = row.getElementsByTagName("td")[1].textContent.toLowerCase(); 
        if (studentName.includes(keyword)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
});
