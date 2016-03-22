<?php
/**
 * Created by PhpStorm.
 * User: ruyonga
 * Date: 20/03/2016
 * Time: 5:50 PM
 */
session_start();

include('includes/config.inc');
include('header.php');

if (isset($_POST['submit'])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $idnum = $_POST["idnumber"];
    $email = $_POST["email"];
    $position = $_POST["position"];
    $jobdesc = $_POST["jobdescription"];
    $phone = $_POST["phone"];
    $region = $_POST["region"];
    $head = $_POST["head"];
    $king = $_POST["king"];
    $queen = $_POST["queen"];
    //check if the post includes the name and medical name

        $sql = "INSERT INTO accounts(id_number,fname,lname,phone,email,jobposition,region_id,isking,isqueen,isregionhead,jobdescription,created_at,updated_at)VALUES ('$idnum','$fname','$lname','$phone','$email','$position',$region,$king,$queen,$head,'$jobdesc',now(),now())";

        if ($conn->query($sql) === TRUE) {

            echo '<div class="alert alert-dismissible alert-success">
				<button type="button" class="close" data-dismiss="alert">x</button>
				New record created successfully
			</div>';
            if($head== '1'){

                $sql = "UPDATE regions SET head ='$idnum' WHERE id= $region";

                if ($conn->query($sql) === TRUE) {

                } else {
                    echo "Error when updating region head updating record: " . $conn->error;
                }
            }
            if($queen == '1'){

                $sql = "UPDATE regions SET queen ='$idnum' WHERE id= $region";

                if ($conn->query($sql) === TRUE) {

                } else {
                    echo "Error when updating region Queen updating record: " . $conn->error;
                }
            }
            if($king == '1'){

                $sql = "UPDATE regions SET king ='$idnum' WHERE id= $region";

                if ($conn->query($sql) === TRUE) {

                } else {
                    echo "Error when updating region King updating record: " . $conn->error;
                }
            }


        } else {


            echo '<div class="alert alert-dismissible alert-error">
			<button type="button" class="close" data-dismiss="alert">x</button>
			Error while creating record.'.$conn->error.'
		</div>';
        }
        $conn->close();
}

?>
   <?php if(isset($_GET["msg"])){
    $msg = $_GET["msg"];
    echo '<div class="alert alert-dismissible alert-info  ">
    <button type="button" class="close" data-dismiss="alert">x</button>
    '.$msg.'
</div>';}
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <fieldset>
                        <legend>Add Contact</legend>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">First Name</label>
                            <div class="col-lg-10">
                                <input type="text" required='true' name="fname" class="form-control" id="fname"
                                       placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Last Name</label>
                            <div class="col-lg-10">
                                <input type="text" required='true' name="lname" class="form-control" id="lname"
                                       placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Phone Number</label>
                            <div class="col-lg-10">
                                <input type="tel" required='true' name="phone" class="form-control" id="phone"
                                       placeholder="Phone number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputEmail"  name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">ID Number</label>
                            <div class="col-lg-10">
                                <input type="number" required='true' name="idnumber" class="form-control" id="idnumer"
                                       placeholder="ID Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Position</label>
                            <div class="col-lg-10">
                                <input type="text" required='true' name="position" class="form-control" id="position"
                                       placeholder="Position">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textArea" class="col-lg-2 control-label">Job Description</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" rows="3" id="textArea" name="jobdescription"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2 " for="inputDefault">Select Region</label>
                            <div class="col-lg-10" style="margin-bottom: 15px; width:250px;">
                                <select class="form-control" name="region" id="select">
                                    <?php

                                    $result = $conn->query('select * from regions') or die("error fetching data");
                                    while ($row = mysqli_fetch_row($result)) {
                                        echo "<option value = " . $row[0] . ">" . $row[1] . "</option >";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Is Regional Head?</label>
                            <div class="col-lg-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="head" id="optionsRadios1" value="1" checked="">
                                        Yes
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="head" id="optionsRadios2" value="0">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Is Regional King?</label>
                            <div class="col-lg-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="king" id="optionsRadios1" value="1" checked="">
                                        Yes
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="king" id="optionsRadios2" value="0">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Is Regional Queen?</label>
                            <div class="col-lg-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="queen" id="optionsRadios1" value="1" checked="">
                                        Yes
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="queen" id="optionsRadios2" value="0">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>

            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>


<?php include("footer.php"); ?>