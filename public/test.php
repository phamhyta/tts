<!-- Thẻ tìm kiếm 1: Lỗi Reflected XSS
<form action="test.php" method="post">
    <input type="text" name="search">
    <input type="submit" name="submit" value="Search">
</form> -->
Thẻ tìm kiếm 2: Lỗi DOM XSS
<form action="test.php" method="get">
    <input type="text" name="search">
    <input type="submit" name="submit" value="Search">
</form>
<?php
    $servername='localhost';
    $username='tts'; 
    $password='120802';
    $dbname = "tts"; 
    $conn=mysqli_connect($servername,$username,$password,$dbname);
        //reflected
        // if(ISSET($_POST['submit'])){
        //     //$keyword = strip_tags($_POST['search']);
        //     $keyword = $_POST['search'];
        //DOM
        if(ISSET($_GET['submit'])){
            $keyword = $_GET['search'];
?>
KQ tìm kiếm:
<script>
   var pos=document.URL.indexOf("search=")+7;
   var cont = document.URL.substring(pos, document.URL.length - 14);
   cont = decodeURIComponent(cont);
   //console.log(cont.textContent);
   document.write(cont);
</script>
<div>
    <?php
        // echo"<h2>Kết quả tìm kiếm của 
        //     $keyword
        // </h2>";
    ?>
    <?php
        $query = mysqli_query($conn, "SELECT * FROM `news` WHERE `title` like '%$keyword%' ORDER BY `title`") or die(mysqli_error());
        while($fetch = mysqli_fetch_array($query)){
    ?>
        <?php echo $fetch['title']?>
        <p><?php echo $fetch['content']?>...</p>
    <?php
        }
    ?>
</div>
<?php
    }
?>
<!-- stored  -->
<div class="cmt-form">
        <form method="POST" action="test.php">
            <h2>Tạo cmt mới</h2>
            <input type="text" name="title" placeholder="Your title"><br>
            <textarea name="content" cols="30" rows="10" placeholder="Your content here"></textarea>
            <button name="submitcmt" type="submit">Send</button>
        </form>
    </div>
<?php 
    if (isset($_POST['title'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        // $title = strip_tags($_POST['title']);
        // $content = strip_tags($_POST['content']);
        $status = mysqli_query($conn, "INSERT INTO comment(title, content, id_cus) VALUES ('$title', '$content', 1)");
    }
    $result = mysqli_query($conn, "SELECT * FROM comment");
    $contentx = '';
    echo"<h2>Comment</h2>";
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)){
            $contentx = "
                <div>
                    <p>Title: <b>$row[title]</b></p>
                    <p>Content: $row[content]</p>
                </div>";
                 echo $contentx;
        }
    }
?>

<img id="img" src="/img?filename=abc.jpg" alt="" style="width: 600px;">