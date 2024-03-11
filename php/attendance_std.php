<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Điểm danh</title>
    <link rel="stylesheet" href="../css/attendance_std.css">
    <?php
    include("../php/sidebar_std.php");
    ?>
</head>

<body>
    <section class="home-section">

        <header>

            <nav>
                <ul>
                    <li><a href="attendance_std.php">Điểm danh</a></li>
                    <li><a href="exercise_std.php">Bài tập</a></li>
                </ul>
            </nav>
        </header>

        <div class="container">
            <h1>Trang Điểm Danh</h1>
            <form>
                <label for="ma-so">Nhập mã bạn đã quét:</label>
                <input type="text" id="ma-so" name="ma-so" required>
                <input type="submit" value="Điểm danh">
            </form>
        </div>
    </section>
</body>

</html>