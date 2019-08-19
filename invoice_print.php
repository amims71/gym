<?php
include 'inc/db.php';
if(isset($_GET['i'])&&isset($_GET['d'])&&isset($_GET['p'])&&isset($_GET['n'])){
    if (!empty($_GET['i'])&&!empty($_GET['d'])&&!empty($_GET['n'])) {
        echo "string";
        echo $n=$_GET['n'];
        $d=$_GET['d'];
        if (isset($_GET['r'])) {
            if (!empty($_GET['r'])) {
                $reg=$_GET['r'];
                $month=$_GET['m'];
                $inv="#000".$_GET['i']."-".$_GET['p'];
                
                $pr='<tr>
                        <td>Registraton Fee</td>
                        <td class="alignright">'.$reg.' BDT</td>
                    </tr>
                    <tr>
                        <td>Monthly Fee for '.$_GET['f'].'</td>
                        <td class="alignright">'.$month.' BDT</td>
                    </tr>';
                    $total=$month+$reg;
                    $sql="INSERT INTO invoice (`inv`, `name`, `total`, `type`, `time`)  VALUES ('$inv','$n','$total','Registration',NOW())";
            }
        } else if(isset($_GET['g'])){
            $game=$_GET['g'];
                $inv="#000".$_GET['i']."-".@$_GET['p'];

                $pr='<tr>
                        <td>Game('.$_GET['it'].') Fee for '.date("d M, Y",strtotime($d)).'</td>
                        <td class="alignright">'.$game.' BDT</td>
                    </tr>
                    <tr><td>(Estimated start time: '.$_GET['start'].')</td></tr>';
                    $total=$game;
                    $redirect=1;
                    $sql="INSERT INTO invoice (`inv`, `name`, `total`, `type`, `time`)  VALUES ('$inv','$n','$total','Game zone',NOW())";


        } else{
                $month=$_GET['m'];
                $inv="#000".$_GET['i']."-".$_GET['p'];

                $pr='<tr>
                        <td>Monthly Fee for '.$_GET['f'].'</td>
                        <td class="alignright">'.$month.' BDT</td>
                    </tr>';
                    $total=$month;
                    $sql="INSERT INTO invoice (`inv`, `name`, `total`, `type`, `time`) VALUES ('$inv','$n','$total','Monthly',NOW())";
        }
        mysqli_query($con,$sql);
    }
}

?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Digicon | Invoice Print</title>
    <link href="styles.css" media="all" rel="stylesheet" type="text/css" />

</head>

<body class="white-bg">
<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="content-block">
                                        <h2><img src="techcity.png">Thanks for using Tech City Gym Service</h2>
                                        <br>
                                        <p>Invoice</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tr>
                                                <td><?php echo $n."<br>";?>Invoice <?php echo $inv;?><br><?php echo date("d M, Y");?></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <?php
                                                        echo $pr;
                                                        ?>
                                                        <tr class="total">
                                                            <td class="alignright" width="80%">Total</td>
                                                            <td class="alignright"><?php echo $total;?></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        Software Technology Park, Janata Tower, 71 Kawran Bazar , Dhaka.<br> Bangladesh
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <div class="footer">
                    <table width="100%">
                        <tr>
                            <td class="aligncenter content-block">Questions? Email <a href="mailto:">support@digicon.com</a></td>
                        </tr>
                    </table>
                </div></div>
        </td>
        <td></td>
    </tr>
</table>
    <script type="text/javascript">
        window.print();
        window.onafterprint = function(event) {
            <?php
            if ($redirect==1) {
                echo 'document.location.href = "gamezone.php";';
            } else{
                echo 'document.location.href = "view_user.php";';
            }
            ?> 
        }
    </script>

</body>

</html>
