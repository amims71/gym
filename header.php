<?php
include 'inc/db.php';

$uri=$_SERVER['REQUEST_URI'];
$view_user='';
$gamezone = '';
$payment='';
$index='';
$damage='';
$equipment_report='';
$cost='';
$revenue='';
$login='';
$refer=@$_SESSION["suc"];
$referf=@$_SESSION["fail"];
$path='/gym-master/';

switch ($refer) {
    case 'cost':
        $login="
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Success', 'Cost Added ');

            }, 1300);
        });";
        break;
    case 'damage':
        $login="
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Success', 'Damage Added ');

            }, 1300);
        });";
        break;
    case 'finish':
        $login="
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Success', 'Repairment Finished ');

            }, 1300);
        });";
        break;
    case 'update_user':
         $login="
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Success', 'User Updated ');

            }, 1300);
        });";
        break;
    case 'repair':
        $login="
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Success', 'Sent to Repair ');

            }, 1300);
        });";
        break;
    case 'payment':
        $login="
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Success', 'Payment Success ');

            }, 1300);
        });";
        break;
    case 'add_user':
        $login="
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Success', 'User Added ');

            }, 1300);
        });";
        break;
    case 'add_equipment':
        $login="
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Success', 'Equipment Added ');

            }, 1300);
        });";
        break;
    case 'login':
        $login="
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Success', 'Welcome Admin ');

            }, 1300);
        });";
        break;
    case 'add_game':
        $login="
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Success', 'User Added');

            }, 1300);
        });";
        break;

    default:
        switch ($referf) {
            case 'cost':
                $login="
                $(document).ready(function() {
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Failed', 'Please Try Again ');

                    }, 1300);
                });";
                break;
            case 'damage':
                $login="
                $(document).ready(function() {
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Failed', 'Please Try Again ');

                    }, 1300);
                });";
                break;
            case 'finish':
                $login="
                $(document).ready(function() {
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Failed', 'Please Try Again ');

                    }, 1300);
                });";
                break;
            case 'update_user':
                $login="
                $(document).ready(function() {
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Failed', 'Please Try Again ');

                    }, 1300);
                });";
                break;
            case 'repair':
                $login="
                $(document).ready(function() {
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Failed', 'Please Try Again ');

                    }, 1300);
                });";
                break;
            case 'payment':
                $login="
                $(document).ready(function() {
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Failed', 'Please Try Again ');

                    }, 1300);
                });";
                break;
            case 'add_user':
                $login="
                $(document).ready(function() {
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Failed', 'Please Try Again ');

                    }, 1300);
                });";
                break;
            case 'add_equipment':
                $login="
                $(document).ready(function() {
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Failed', 'Please Try Again ');

                    }, 1300);
                });";
                break;
            case 'login':
                $login="
                $(document).ready(function() {
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Failed', 'Please Try Again ');

                    }, 1300);
                });";
                break;
            case 'add_game':
                $login="
                $(document).ready(function() {
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Failed', 'Please Try Again ');

                    }, 1300);
                });";
                break;

            default:
                if (empty($login)) {
                    $login='';
                }
                break;
        }

        break;
}
        
$_SESSION["fail"]='';
$_SESSION["suc"]='';

        switch ($uri) {
            case $path.'damage.php':
                $damage='class="active"';
                $title='Damage Report';
                break;
            case $path.'view_user.php':
                $view_user='class="active"';
                $title='User List';
                break;
            case $path.'gamezone.php':
                $gamezone='class="active"';
                $title='Game Zone/Sauna';
                break;
            case $path.'equipment_report.php':
                $equipment_report='class="active"';
                $title='Equipment Report';
                break;
            case $path.'cost.php':
                $cost='class="active"';
                $title='Cost Report';
                $payment='class="active"';
                break;
            case $path.'revenue.php':
                $revenue='class="active"';
                $title='Revenue Report';
                $payment='class="active"';
                break;
            default:
                $index='class="active"';
                $title='Dashboard';
                break;
        }

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo$user;?> | <?php echo $title; ?></title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="favicon.png" rel="shortcut icon" type="image/x-icon">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">


<link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom-style.css" rel="stylesheet">

    <link href="css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <!--CSS for Image Uploaded -->
    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <!--Datbase table view-->
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
     <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="user.png" width="100px" height="100px"/>
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong
                                            class="font-bold"><?php echo$user;?></strong>
                             </span><!--  <span class="text-muted text-xs block">admin <b class="caret"></b></span> </span> -->
                        </a>
                        <!-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul> -->
                    </div>
                    <div class="logo-element">
                        GYM
                    </div>
                </li>
                <li <?php echo $index;?>>
                    <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></span>
                    </a>
                </li>
                <li <?php echo $view_user; ?>>
                    <a href="view_user.php"><i class="fa fa-user-plus"></i> <span class="nav-label">Users</span></a>
                </li>
                <li <?php echo $gamezone; ?>>
                    <a href="gamezone.php"><i class="fa fa-user-plus"></i> <span class="nav-label">Game Zone/Sauna</span></a>
                </li>
                 <li <?php echo $equipment_report; ?>>
                    <a href="equipment_report.php"><i class="fa fa-archive"></i> <span class="nav-label">Equipments</span></a>
                </li>
              <!--   <li <?php echo $add_equipment; ?>>
                    <a href="add_equipment.php"><i class="fa fa-plus-circle"></i> <span class="nav-label">Add Equipment</span></a>
                </li> -->
                <li <?php echo $damage; ?>>
                    <a href="damage.php"><i class="fa fa-gear fa-spin"></i> <span class="nav-label">Damage Report</span></a>
                </li>
                <li <?php echo $payment; ?>>
                        <a href="#"><i class="fa fa-money"></i> <span class="nav-label">Transactions</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li <?php echo $cost;?>><a href="cost.php">Cost</a></li>
                <?php
                if ($id==2) {
                    # code...
                }else{
                    ?>
                        
                            <li <?php echo $revenue;?>><a href="revenue.php">Revenue Report</a></li>
                    <?php
                }

                ?>
                 </ul>
                    </li>
              <!--   <li <?php echo $user_report; ?>>
                    <a href="layouts.html"><i class="fa fa-file-code-o"></i> <span class="nav-label">User Report</span></a>
                </li> -->



            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <!--        put sidebar on start of page-wrapper -->
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm welcome-message">Welcome Admin</span>
                </li>

                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        <div class="row  border-bottom "></div>

   <!--      <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>CSS Animations</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                          <li class="breadcrumb-item active">
                            <strong>CSS Animations</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div> -->
