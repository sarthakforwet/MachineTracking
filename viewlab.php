<?php
    session_start();
    if( !isset($_SESSION['id']) )
    {
        die('ACCESS DENIED');
    }
    if( $_SESSION['id'] != '0' )
    {
        die('ACCESS DENIED');
    }
    require_once "pdo.php";
?>
<html>
<head>
    <title>Machine Tracking</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="style5.css">
</head>
<body>
                  <div class="wrapper">
       <?php include "navbar.php" ;?>

    <div class="container-fluid row" id="container">

    <div class="page-header">
    <h1>LABS</h1>
    </div>
    <?php
        if ( isset($_SESSION['success']))
        {
            echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
                unset($_SESSION['success']);
        }
        if ( isset($_SESSION['error']))
        {
            echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
            unset($_SESSION['error']);
        }
        //echo('<p><a href="logout.php">Logout</a></p>');
        $stmtcnt = $pdo->query("SELECT COUNT(*) FROM lab");
        $row = $stmtcnt->fetch(PDO::FETCH_ASSOC);
        if($row['COUNT(*)']!=='0')
        {
            $i=1;
            $stmtread = $pdo->query("SELECT * FROM lab order by name");
            echo ("<table class=\"table table-striped\">
                <tr> <th>S.no.</th><th>Lab Name</th><th>Department</th> </tr>");
            while ( $row = $stmtread->fetch(PDO::FETCH_ASSOC) )
            {
                echo ("<tr>");
                echo ("<td>");
                echo($i);
                echo("</td>");
                echo ("<td>");
                //Ghanta Consistent
                echo ("<a class='link-black' href='viewpcbylab.php?lab=".$row['lab_id'])."'>";
                echo (htmlentities($row['name']));
                echo ("</a>");
                echo ("</td>");
                echo ("<td>");
                echo ("<a class='link-black' href='viewpcbydept.php?dept=".$row['department'])."'>";
                echo (htmlentities($row['department']));
                echo ("</a>");
                echo ("</td>");
                $i++;
            }
            echo('</table>');
        }
    ?>

    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script>
        $(document).readt(function(){
            $('.labs').click()
            {
                <?php
                ?>
            }
        });
    </script>
</body>
</html>
