let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".fa-solid.fa-solid.fa-magnifying-glass");
let navList = document.querySelector(".nav-list");


closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    navList.classList.toggle("scroll");
    menuBtnChange();
  });
searchBtn.addEventListener("click", ()=>{ 
    menuBtnChange(); 
  });

// Nút thanh bên
function menuBtnChange() {
    if(sidebar.classList.contains("open")) {
        closeBtn.classList.replace("fa-solid fa-bars", "fa-solid fa-bars-staggered"); // Mở 
    }else {
        closeBtn.classList.replace("fa-solid fa-bars-staggered","fa-solid fa-bars");
        console.log("This is in the 'else' block"); // Đóng
    }
}

