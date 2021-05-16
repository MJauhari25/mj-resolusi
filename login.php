<?php
    ob_start();
    session_start();
    include "koneksi1.php";
    $user        = $_POST['idnim'];
    $password    = $_POST['idpw'];
    $_SESSION['idnim'] = $user;
    $sql = "SELECT * FROM tbkelompok where nim ='$user'";
    $qry = mysqli_query($koneksi, $sql);
    $num = mysqli_num_rows($qry);
    $row = mysqli_fetch_array($qry);

    if ($num==0 OR $password!=$row['pw']) {
    ?>
        <script language="JavaScript">
            alert('Username atau Password tidak sesuai !');
            document.location='index.php';
        </script>
    <?php
    }
    else {
        $_SESSION['Login']=1;
        header("Location: index1.php");
    }
    mysql_close($Open);
?>