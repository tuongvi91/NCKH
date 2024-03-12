<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nộp bài tập</title>
    <?php
    include("../php/sidebar_std.php");
    ?>
    <link rel="stylesheet" href="../css/submit_homeworks.css">
</head>
<body>
    <section class="home-section">
    <header>
        <h1>Nộp bài tập</h1>
    </header>
    <main>
        <form action="submit_assignment.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="assignment_title">Tiêu đề bài tập:</label>
                <input type="text" id="assignment_title" name="assignment_title" required>
            </div>
            <div class="form-group">
                <label for="assignment_description">Mô tả bài tập:</label>
                <textarea id="assignment_description" name="assignment_description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="assignment_file">Chọn file:</label>
                <input type="file" id="assignment_file" name="assignment_file" accept=".pdf, .doc, .docx" required>
            </div>
            <button type="submit">Nộp bài</button>
        </form>
    </main>
    </section>
</body>
</html>
