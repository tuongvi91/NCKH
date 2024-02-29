let exams = [];

function addSubject() {
    const subject = document.getElementById("subject").value;
    const duration = document.getElementById("p2_1").value;
    const date = document.getElementById("date").value;
    const only_credit = document.getElementById("only_credit").value;
    const room = document.getElementById("room").value;
  
    if (!subject || !room || !duration || !date || !only_credit) {
      alert("Vui lòng điền đầy đủ thông tin");
      return;
    }
  
    const exam = { subject,room, duration, date, only_credit };
    exams.push(exam);
  
    updateTable();
    clearForm();
  }
  
function clearForm() {
  document.getElementById("subject").value = "";
  document.getElementById("room").value = "";
  document.getElementById("duration").value = "";
  document.getElementById("date").value = "2024-00-00";
  document.getElementById("only_credit").value = "";
}

function updateTable() {
    const table = document.querySelector("table");
    table.innerHTML = `
          <tr>
              <th>Môn học </th>
              <th>Phòng thi </th>
              <th>Thời gian</th>
              <th>Ngày</th>
              <th>Tín chỉ</th>
              <th>Hành động</th>
          </tr>
      `;
  
    for (let i = 0; i < exams.length; i++) {
      const exam = exams[i];
      const row = table.insertRow();
  
      const subjectCell = row.insertCell(0);
      subjectCell.textContent = exam.subject;

      const roomCell = row.insertCell(1);
      roomCell.textContent = exam.room;
  
      const dateCell = row.insertCell(2);
      dateCell.textContent = exam.date;
  
      const durationCell = row.insertCell(3);
      durationCell.textContent = exam.duration;
  
      const periodCell = row.insertCell(4);
      periodCell.textContent = exam.only_credit;
  
      const actionsCell = row.insertCell(5);
      const editButton = document.createElement("button");
      editButton.textContent = "Sửa";
      editButton.onclick = function() {
  editExam(i);
};
actionsCell.appendChild(editButton);

const deleteButton = document.createElement("button");
deleteButton.textContent = "Xóa";
deleteButton.onclick = function() {
  deleteExam(i);
};
actionsCell.appendChild(deleteButton);

    }
  }
  

  function deleteExam(index) {
    exams.splice(index, 1);
    updateTable();
  }
  

function editExam(index) {
    const exam = exams[index];
    document.getElementById("subject").value = exam.subject;
    document.getElementById("room").value = exam.room;
    document.getElementById("duration").value = exam.duration;
    document.getElementById("date").value = exam.date;
    document.getElementById("only_credit").value = exam.only_credit;
  }
  
    
function downloadTable() {
    const filename = "lichthi.csv";
    let csv = "Môn học,Lịch thi,Thời gian,Ngày,Tín chỉ\n";
  
    for (let i = 0; i < exams.length; i++) {
      const exam = exams[i];
      csv += `${exam.subject},${exam.room},${exam.duration},${exam.date},${exam.only_credit}\n`;
    }
  
    const link = document.createElement("a");
    link.setAttribute("href", "data:text/csv;charset=utf-8," + encodeURIComponent(csv));
    link.setAttribute("download", filename);
    document.body.appendChild(link);
    link.click();
  }
  

function addExam() {
  var subject = document.getElementById("subject").value;
  var room = document.getElementById("room").value;
  var duration = document.getElementById("duration").value;
  var date = document.getElementById("date").value;
  var only_credit = document.getElementById("only_credit").value;

  var table = document.getElementsByTagName("table")[0];
  var newRow = table.insertRow(-1);

  var subjectCell = newRow.insertCell(0);
  var roomCell = newRow.insertCell(1);
  var dateCell = newRow.insertCell(2);
  var durationCell = newRow.insertCell(3);
  var only_creditCell = newRow.insertCell(4);
  var actionsCell = newRow.insertCell(5);

  subjectCell.innerHTML = subject;
  roomCell.innerHTML = room;
  dateCell.innerHTML = date;
  durationCell.innerHTML = duration;
  only_creditCell.innerHTML = only_credit;
  actionsCell.innerHTML = '<button class="edit-button" onclick="editExam(this)">Edit</button> <button class="delete-button" onclick="deleteExam(this)">Delete</button>';

  document.getElementById("subject").value = "";
  document.getElementById("room").value = "";
  document.getElementById("duration").value = "";
  document.getElementById("date").value = "2023-00-00";
  document.getElementById("only_credit").value = "1";
}
