<?php
/**
 * Created by PhpStorm.
 * User: ruyonga
 * Date: 21/03/2016
 * Time: 3:59 PM
 */
include('includes/config.inc');
include('header.php');
global $id;
if (!isset($_GET["id"])) {
    header("Location:index.php?msg=Illegal access detected");
} else {
 $id = $_GET['id'];
}
//give region details
$result = $conn->query("SELECT * FROM regions where id = '$id'") or die($conn->error);
$rox = mysqli_fetch_row($result);
//get region head
$resulth = $conn->query("SELECT * FROM accounts where region_id = '$id' AND isregionhead = 1") or die($conn->error);
$head = mysqli_fetch_row($resulth);
 //queen
$resultq = $conn->query("SELECT * FROM accounts where region_id = '$id' AND isqueen = 1") or die($conn->error);
$headq = mysqli_fetch_row($resultq);
//king
$resultk = $conn->query("SELECT * FROM accounts where region_id = '$id' AND isking = 1") or die($conn->error);
$headk = mysqli_fetch_row($resultk);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Activities from <?php echo $rox[1];?></h1>
            <div class="row">
                <div class="col-md-8">

                    <?php

                    $result = $conn->query("SELECT * FROM activities WHERE activities.region_id = '$id'") or die($conn->error);
                    if (mysqli_num_rows($result) == 0) {
                        echo ' <div class="media well"><p>There are no activties in this regison </p> </div>';
                    } else {
                        while ($row = mysqli_fetch_row($result)) {
                            echo ' <div class="media well">
                        <a href="#" class="pull-left"><img alt="Bootstrap Media" src="http://lorempixel.com/64/64/" class="image-thumbnail" /></a>
                        <div class="media-body">
                            <h4 class="media-heading">' . $row[1] . '</h4>
                        ' . $row[2] . '
                        </div>
                    </div>';
                        }
                    }
                    ?>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                               <?php echo $rox[1]?>
                            </h3>
                        </div>
                        <div class="panel-body">

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="media">
                                            <a href="#" class="pull-left"><img alt="Head" src="includes/img/night.jpg" class="media-object" style="width:75px; height: 75px;"/></a>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                  <span style="text-decoration: underline;"> Region Head    </span>
                                                </h4>
                                                <?php echo $head[2].' '.$head[3].'<br />';
                                                      echo $head[4].'<br />';
                                                      echo $head[5];


                                                ?>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a href="#" class="pull-left"><img alt="Head" src="includes/img/king.jpg" class="media-object" style="width:75px; height: 75px;"/></a>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <span style="text-decoration: underline;"> Region King     </span>
                                                </h4>
                                                <?php echo $headk[2].' '.$headk[3].'<br />';
                                                echo $headk[4].'<br />';
                                                echo $headk[5];


                                                ?>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a href="#" class="pull-left"><img alt="Head" src="includes/img/queen.jpg" class="media-object" style="width:75px; height: 75px;"/></a>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <span style="text-decoration: underline;"> Region Queen   </span>
                                                </h4>
                                                <?php echo $headq[2].' '.$headq[3].'<br />';
                                                echo $headq[4].'<br />';
                                                echo $headq[5];


                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
