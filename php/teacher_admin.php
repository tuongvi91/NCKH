<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Người dạy </title>
    <link rel="stylesheet" href="../css/user_admin.css">
    <?php
    include("../php/sidebar_admin.php");
    ?>
</head>
<body>
<section class="home-section">
<div class="container">

<header>
    <div class="decentralization">
        <ul class="menu">
            <li><a href="teacher_admin.php">Người dạy</a></li>
            <li><a href="learner_admin.php">Người học</a></li>
        </ul>
    </div>

    <div class="filterEntries">
        <div class="filter">
            <form action="" method = "get">
                <label for="search">Tìm kiếm</label>
                <input type="search" name="search" id="search" placeholder="Tìm kiếm" >
                <input type = "submit" name = "OK" value="OK">
            </form>
        </div>
    </div>
    <div class="addMemberBtn">
        <button onclick="location.href = 'fill_in_information.php'">Thêm mới </button>
    </div>
    <div class="plus">
        <form class="form">
            <div class="file-upload-wrapper" data-text="Tải tệp của bạn!">
                <input name="file-upload-field" type="file" class="file-upload-field" value="">
            </div>
        </form>
    </div>
</header>
<table>
    <thead>
        <tr class="heading">
            <th>ID</th>
            <th>Img</th>
            <th>Tên hiển thị</th>
            <th>Vai trò</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Họ tên </th>
            <th>Ngày sinh </th>
            <th>Khoa </th>
            <th>Thời gian thêm</th>
            <th>Thời gian sửa</th>
            <th>Hành động</th>   
        </tr>
    </thead>

    <tbody class="userInfo">
        <?php 
            require 'connect.php';     

            
            //lấy số mục:
            $limit = 20;
            //tổng số dòng dữ liệu 
            $result = mysqli_query($conn, 'select count(*) as total from users where role_id=2');
            $row = mysqli_fetch_assoc($result);                    
            $soluongtin = $row['total'];
            
            //tổng số trang 
            $sotrang = ceil($soluongtin /  $limit);
            //trang hiện tại 
            $trangchon = isset($_GET['trang']) ? $_GET['trang'] : 1;
            // số offset
            $offset = ($trangchon - 1) * 20;
             //tìm kiếm
            if (isset($_GET['OK']) && !empty($_GET['OK']))
            {
                $key = $_GET['search'];
                $findcmd = "select*from users where role_id = 2 and (  user_id = '$key' or fullname like '%$key%' or username = '$key')";
                $layDS = mysqli_query($conn, $findcmd);
            }
            else $layDS = mysqli_query($conn, "SELECT * FROM users  where role_id = 2 limit $offset, $limit");
        ?>
        
        <?php 
        while ($row = mysqli_fetch_array($layDS)) 
        {?>
            <tr>
                <td><?php echo $row['user_id']?></td>
                
                <td><?php echo "<img src='../img/". $row['img'] . "' alt='chưa có ảnh' height='100' width='100' object-fit= 'cover';"?></td>
                <td><?php echo $row['username']?></td>

                <?php
                    if ($row['role_id']==1) $quyen = "Người học";
                    else if ($row['role_id']==0) $quyen = "Admin";
                    else if ($row['role_id']==2) $quyen = "Người dạy";
                    $capquyen = $quyen;
                ?>
                <td><?php echo $capquyen?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['phone_number']?></td>
                <td><?php echo $row['fullname']?></td>
                <td><?php echo $row['DOB']?></td>
                <?php
                    //lấy tên khoa và tên khóa
                    $laykhoa = "SELECT*FROM faculty WHERE faculty_id='".$row['faculty_id']."'";
                    $laykhoahoc = "SELECT*FROM batch WHERE batch_id='".$row['batch_id']."'";
                    $rs1 = mysqli_query($conn, $laykhoa);
                    $rs2 = mysqli_query ($conn, $laykhoahoc);
                    if ($rtenkhoa = mysqli_fetch_array($rs1)) $tenkhoa= $rtenkhoa['faculty_name'];
                    else $tenkhoa = "chưa xác định";
                ?>
                <td><?php echo $tenkhoa?></td>            
                <td><?php echo $row['created_at']?></td>
                <td><?php echo $row['update_at']?></td>
                <td>
                    <button><i class="fa-solid fa-eye"></i></button>
                    <a href="update_user.php?id=<?php echo $row['user_id']; ?>" id="btnUpdate">
                        <button><i class="fa-solid fa-pen"></i></button>
                    </a>
                    <a href="delete_user.php?id=<?php echo $row['user_id']; ?>" id="btnDelete">
                        <button ><i class="fa-solid fa-trash-can"></i></button>
                    </a>
                </td>
            </tr>
        
        <?php 
        }?>
    </tbody>
</table>
<footer class="site-footer">
        <div class="pagination">
            <?php 
                //phân trang - done
                
                if ($trangchon > 1 && $sotrang > 1){
                    echo '<a href="teacher_admin.php?trang='.($trangchon-1).'">&laquo  |  </a> ';                           
                    
                }
                for ($i = 1; $i <= $sotrang; $i++){
                    echo '<a href="teacher_admin.php?trang='.$i.'">'.$i.'</a> |   ';
    
                }
                if ($trangchon < $sotrang && $sotrang > 1){                       
                    echo '<a href="teacher_admin.php?trang='.($trangchon+1).'">&raquo</a> | ';                        
                }   
                
            ?>      
        </div>
    </footer>
</div>
</div>
<script src="../js/user_admin.js"></script>
</section>
</body>
</html>