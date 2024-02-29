<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/test_schedule.css">
    <?php
    include("../php/sidebar_admin.php");
    ?>
    <title>Lịch thi</title>
</head>
<body>
<section class="home-section">
	<div class="container">
		<h1>Lịch thi</h1>
		<div class="form">
			<form>
				<div class="form-row">
					<label for="subject">Môn học:</label>
					<input type="text" id="subject" name="subject">
				</div>
				<div class="form-row">
					<label for="duration">Thời gian:</label>
					<input class="form-control" type="time" id="p2_1">		 
				</div>
				<div class="form-row">
					<label for="date">Ngày:</label>
					<input type="date" id="date" value="2024-00-00" min="2024-01-01" max="2024-12-31" name="date">
				</div>
				<div class="form-row">
					<label for="only_credit">Tín chỉ:</label>
					<select id="only_credit" name="only_credit">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
				</div>
				<input type="button" value="Thêm" onclick="addSubject()">

			</form>
		</div>
		<div class="table">
			<table>
				<thead>
					<tr>
						<th>Môn học </th>
						<th>Thời gian</th>
						<th>Ngày</th>
						<th>Tín chỉ</th></th>
						<th>Hành động</th>
					</tr>
				</thead>
				<tbody id="subject-list">
				</tbody>
			</table>
		</div>
		<div>
			<button id="download-button" onclick="downloadTable()">Tải xuống</button>
		</div>
	</div>
	<script src="../js/test_schedule.js"></script>
 <style>
  .edit-button, .delete-button {
  background-color: #37425c;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.edit-button:hover, .delete-button:hover {
  background-color: #3e8e41;
}
   </style>
   </section>
</body>

</html>