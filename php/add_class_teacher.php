<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm lớp học</title>
    <?php include("../php/sidebar_teacher.php"); ?>
    <style>
        /* CSS thêm lớp học */
        .add-class {

            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px #69b4fa;
            z-index: 1000;
            width: 350px;
        }

        .add-class header {
            text-align: center;
            margin-bottom: 20px;
            color: #69b4fa;
        }

        .add-class .modalTitle {
            margin: 0;
            font-size: 24px;
        }

        .add-class .form-group label {
            display: block;
            font-weight: bold;
            color: #69b4fa;
            /* Màu chữ của nhãn */
        }

        .add-class .form-group {
            margin-bottom: 15px;
        }

        .add-class .form-group label {
            display: block;
            font-weight: bold;
        }

        .add-class input[type="text"],
        .add-class select {
            width: 100%;
            padding: 8px;
            border: 1px solid #69b4fa;
            border-radius: 5px;
        }

        .add-class .select-wrapper {
            position: relative;
        }

        .add-class .select-wrapper select {
            width: 100%;
            padding: 8px;
            border: 1px solid #69b4fa;
            border-radius: 5px;
            appearance: none;
            -webkit-appearance: none;
            background-color: #ffffff;
            cursor: pointer;
            color: #69b4fa;
        }

        .add-class .select-wrapper::after {
            content: '\25BC';
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none;
            color: #69b4fa;
        }

        .add-class .end {
            text-align: right;
        }

        .add-class button {
            padding: 8px 16px;
            cursor: pointer;
            background-color: #69b4fa;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        .add-class button:hover {
            background-color: #0056b3;
        }

        .card:hover {
            box-shadow: 0 4px 8px #69b4fa;
        }

        .card-info {
            padding: 20px;
        }

        .card-time {
            font-size: 14px;
            color: #69b4fa;
        }

        .card-title {
            font-size: 18px;
            margin-top: 10px;
        }

        .add-class-button-container {
            display: flex;
            justify-content: center;
        }

        .add-class-button {
            background-color: #69b4fa;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            margin-bottom: 20px;
        }

       
        .add-class input[type="time"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #69b4fa;
            border-radius: 5px;
        }

        .add-class input[type="time"]::-webkit-datetime-edit-ampm-field {
            display: none;
        }
    </style>
</head>

<body>
    <section class="home-section">
        <div class="add-class">

            <header>
                <h1 class="modalTitle">Thêm lớp học </h1>
            </header>
            <div class="form-group">
                <label for="lesson_content">Chủ đề</label>
                <input type="text" name="" id="lesson_content" required>
            </div>

            <div class="form-group">
                <label for="room" class="form-label">Phòng học </label>
                <input id="room" name="room" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="start_time" class="form-label">Giờ bắt đầu</label>
                <input id="start_time" name="start_time" type="time" class="form-control">
            </div>

            <div class="form-group">
                <label for="end_time" class="form-label">Giờ kết thúc</label>
                <input id="end_time" name="end_time" type="time" class="form-control">
            </div>


            <div class="form-group">
                <label for="faculty" class="form-label">Khoa </label>
                <input id="faculty" name="faculty" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="batch" class="form-label">Khoá </label>
                <input id="batch" name="batch" type="text" class="form-control">
            </div>

            <div class="end">
                <button id="add-class-submit">Thêm</button>
            </div>

        </div>
    </section>
</body>

</html>