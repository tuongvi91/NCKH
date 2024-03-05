// JavaScript
document.addEventListener("DOMContentLoaded", function() {
    var createTaskBtn = document.querySelector('.create-new-task-btn');
    var taskForm = document.getElementById('task-form');

    createTaskBtn.addEventListener('click', function() {
        taskForm.style.display = 'block';
    });
});

function toggleTaskForm() {
    var taskForm = document.getElementById('task-form');
    if (taskForm.style.display === 'none') {
        taskForm.style.display = 'block';
    } else {
        taskForm.style.display = 'none';
    }
}