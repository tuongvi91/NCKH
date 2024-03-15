<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thời khóa biểu</title></title>
    <link rel="stylesheet" href="../css/timetable_teacher.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
    <?php
    include("../php/sidebar_teacher.php");
    ?>
</head>
<body>
    <?php 
      $userid = $_SESSION['manguoidung'];
      require 'connect.php';
    ?>
    <section class="home-section">
    <div class="scheduler">
      <h3>Thời khóa biểu giảng viên</h3>    
      <div id="left">
        <?php
          //lấy các môn người này dạy:
          $layMon = "SELECT c.name
          FROM course c
          INNER JOIN teaching_schedule t ON c.course_id = t.course_id
          WHERE t.user_id = '".$userid."'";
          $kq = mysqli_query($conn, $layMon);
          while  ($r = mysqli_fetch_array($kq)) 
          {   
        ?>
            <div class="list" draggable="true">
                <i class="fa fa-list-ul" aria-hidden="true"></i><?php echo $r['name']?>
            </div>
        <?php }?>
      </div>
      
      
            
      <div id="week_scheduler">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>Time</th>
              <th>Monday</th>
              <th>Tuesday</th>
              <th>Wednesday</th>
              <th>Thursday</th>
              <th>Friday</th>
              <th>Saturday</th>
              <th>Sunday</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>7:00 - 8:40</td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
            </tr>
            <tr>
              <td>9:00-11:30</td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
            </tr>
            <tr>
              <td>13:00-14:40</td>
              <td>
              <div id="right"></div>
              </td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
            </tr>
            <tr>
              <td>15:00-17:30</td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
              <td><div id="right"></div></td>
            </tr>
          </tbody>
        </table>
      </div>
    
      

      <div class="print-button-container">
        <button id="printButton">In thời khóa biểu</button>
      </div>

    </div>

    
  </div>

  
  
    <script src="../js/timetable_teacher.js"></script>
    </section>
</body>
</html>