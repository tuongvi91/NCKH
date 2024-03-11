document.addEventListener("DOMContentLoaded", function () {
    var printButton = document.getElementById("printButton");

    printButton.addEventListener("click", function () {
        printScheduler();
    });

    function printScheduler() {
        var schedulerContent = document.querySelector('.week-scheduler');
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = schedulerContent.innerHTML;

        window.print();

        document.body.innerHTML = originalContents;
    }
});
