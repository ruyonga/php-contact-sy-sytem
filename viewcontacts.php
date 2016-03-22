<?php
session_start();
/**
 * Created by PhpStorm.
 * User: ruyonga
 * Date: 22/03/2016
 * Time: 12:57 PM
 */
if(!$_SESSION['username']){
    header("Location:index.php?msg=Login to access the contacts");
}
include('includes/config.inc');
include('header.php');

//$result = $conn->query("SELECT * FROM accounts") or die($conn->error);
//$head = mysqli_fetch_row($result);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">

                <?php

                $result = $conn->query('select * from accounts') or die("error fetching data");
                while ($row = mysqli_fetch_row($result)) {
                    echo '
<div class="col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>
                            ' . $row[2] . ' ' . $row[3] . '
                            </h3>
                            <p>
                              Phone:' . $row[4] . '<br />
                              Email:' . $row[5] . '<br />
                            </p>
                            <p>
                                <a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a>
                            </p>
                        </div>   </div>
        </div>
';
                }
                ?>


            </div>
        </div>
    </div>
</div>
