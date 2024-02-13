<?php 
    session_start();
?>
<html>
    <head>
    </head>
    <body>
    <h1>Danh sách cuộc thảo luận</h1>
        <?php
		    	$conn = mysqli_connect ("localhost", "root", "", "qlsv") or die ("!!");
                mysqli_query($conn,"SET NAMES 'utf8'");
                $sqlcmd = "SELECT * FROM discussions ";        
                $result = mysqli_query($conn, $sqlcmd);
                $sobai = 10;
                $sodongdl = mysqli_num_rows($result);
                $sotrangdl = $sodongdl/$sobai;
                if (isset($GET['trang'])) $trangchon=$_GET['trang'];
                else $trangchon= 0;
                $start = $trangchon*$sobai;
                $sqllaydulieu = "select *from discussions limit {$start}{$sobai}";
                $rslaydl = mysqli_query($conn, $sqllaydulieu);
                $dem = $start;
                while ($row= mysqli_fetch_array($rslaydl))
                {
                    $dem++;
                    echo "<tr><td><a href='chat.php?ma={$row['id']}'>".$row['title']."</a></td></tr>";
                }
                for($i=0;$i<=$sotrangdl;$i++)
                {
                	$tr = $i+1;
                	echo "<a href='discussion_list.php?trang={$i}'>Trang {$tr},</a>";
                }
                mysqli_close($conn);
            
        ?>     
	</body>
</html>