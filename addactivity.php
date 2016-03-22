<?php
session_start();
/**
 * Created by PhpStorm.
 * User: ruyonga
 * Date: 20/03/2016
 * Time: 5:50 PM
 */
if(!$_SESSION['username']){
    header("Location:index.php?msg=Login to add activity");
}
include('includes/config.inc');
include('header.php');

if (isset($_POST['save'])) {

    $title = $_POST["title"];
    $detail = $_POST["detail"];
    $region = $_POST["region"];
    $account = $_SESSION['username'];


    $sql = "INSERT INTO activities(title,details,account_id,region_id) VALUE ('$title','$detail','$account',$region)";

    if ($conn->query($sql) === TRUE) {

        echo '<div class="alert alert-dismissible alert-success">
				<button type="button" class="close" data-dismiss="alert">x</button>
				New record created successfully
			</div>';

    } else {

        echo '<div class="alert alert-dismissible alert-error">
			<button type="button" class="close" data-dismiss="alert">x</button>
			Error while creating record.'.$conn->error.'
		</div>';
    }
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <fieldset>
                            <legend>Add Activity</legend>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Activity Title</label>
                                <div class="col-lg-10">
                                    <input type="text" required='true' name="title" class="form-control" id="title"
                                           placeholder="Title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="textArea" class="col-lg-2 control-label">Activity Details</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="3" id="textArea" name="detail"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2 " for="inputDefault">Select Region</label>
                                <div class="col-lg-10" style="margin-bottom: 15px; width:250px;">
                                    <select class="form-control" name="region" id="select">
                                        <?php

                                        $result = $conn->query('SELECT * FROM regions') or die("error fetching data");
                                        while ($row = mysqli_fetch_row($result)) {
                                            echo "<option value = " . $row[0] . ">" . $row[1] . "</option >";
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                    <button type="submit" class="btn btn-primary" name="save">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>
</div>
