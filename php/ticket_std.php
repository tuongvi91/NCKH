<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lý do nghỉ học</title>
    <link rel="stylesheet" href="../css/ticket_std.css">
    <?php
    include("../php/sidebar_std.php");
    ?>
</head>

<body>
    <section class="home-section">
        <div class="container">
            <h1>Phiếu xin nghỉ học</h1>
            <form action="submit.php" method="post">
                <label for="date">Ngày muốn nghỉ:</label>
                <select id="date" name="date" required>
                    <option value="">Chọn ngày</option>
                    <option value="2024-03-17">17/03/2024</option>
                    <option value="2024-03-18">18/03/2024</option>
                    <option value="2024-03-19">19/03/2024</option>
                </select>
                <label for="reason">Lý do nghỉ:</label>
                <textarea id="reason" name="reason" rows="4" required></textarea>
                <input type="submit" value="Gửi">
            </form>
        </div>
    </section>

</body>

</html>
