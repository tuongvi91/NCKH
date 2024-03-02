document.addEventListener("DOMContentLoaded", function() {
    const addMemberBtn = document.querySelector(".addMemberBtn button");
    const darkBg = document.querySelector(".dark_bg");
    const popup = document.querySelector(".popup");
    const closeBtn = document.querySelector(".closeBtn");

    // Hiển thị popup khi nhấn vào nút "Thêm mới"
    addMemberBtn.addEventListener("click", function() {
        darkBg.classList.add("active");
        popup.classList.add("active");
    });

    // Ẩn popup khi nhấn vào nút đóng
    closeBtn.addEventListener("click", function() {
        darkBg.classList.remove("active");
        popup.classList.remove("active");
    });
});
