<?php include("header.php");
include('includes/config.inc'); ?>

<div class="container-fluid">
    <?php
    if (isset($_GET["msg"])) {
        $msg = $_GET["msg"];
        echo '<div class="alert alert-dismissible alert-info  ">
	<button type="button" class="close" data-dismiss="alert">x</button>
	' . $msg . '
</div>';
    }

    ?>

    <h1> Latest Activities</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="media well">
                        <a href="#" class="pull-left">
                            <img alt="some pic" src="http://lorempixel.com/64/64/" class="media-object"/></a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                Random pic
                            </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                            sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                            <div class="media">
                                <a href="#" class="pull-left">
                                    <img alt="Random pic"
                                         src="http://lorempixel.com/64/64/"
                                         class="media-object"/></a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        Nested media heading
                                    </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                    sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                                    turpis.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">Region </a>


                        <?php

                        $result = $conn->query('SELECT * FROM regions') or die("error fetching data");

                        while ($row = mysqli_fetch_row($result)) {
                            /// $result = $conn->query('SELECT count(*) FROM activities GROUP BY region_id') or die("error fetching data");  <span class='badge'>14</span>
                            echo "    <a href='details.php?id=" . $row[0] . "' class='list-group-item'> " . $row[1] . "</a> ";

                        }
                        ?>

                        <a class="list-group-item active"><span class="badge"></span>Select Region to sort
                            activities</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
