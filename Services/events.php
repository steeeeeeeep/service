<?php
require_once '../scripts/session.php';
require_once '../scripts/db_conn.php';

if(!isset($_SESSION['username']) || !isset($_SESSION['customer_id'])){
    header('location: index.php');
}
    
  $brgy = ["Apopong",
  "Baluan",
  "Batomelong",
  "Buayan",
  "Bula",
  "Calumpang",
  "City Heights",
  "Conel",
  "Dadiangas East",
  "Dadiangas North",
  "Dadiangas South",
  "Dadiangas West",
  "Fatima",
  "Katangawan",
  "Labangal",
  "Lagao",
  "Ligaya",
  "Mabuhay",
  "Olympog",
  "San Isidro (Lagao 2nd)",
  "San Jose",
  "Siguel",
  "Sinawal",
  "Tambler",
  "Tinagacan",
  "Upper Labay"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkGo.ph</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/loader.css">
</head>
<body>
    <style>
        .container{
            margin-top: 100px;
            text-align: center;    
        }
        .contains{
            columns: 2;
            border: 1px solid #0cd2d2;
            border-radius: 5px;
            padding: 20px;
        }#contains2{
            columns: 1;
            border: 1px solid #0cd2d2;
            border-radius: 5px;
        }
        input,select#container2{
            width: 100%;
            margin: 0 auto;
        }
        button:active {
            color: #fff;
            background-color: #088F8F;
            border-color: #088F8F;
            }
        button:hover {
            color: #fff;
            background-color: #088F8F;
            border-color: #088F8F;
        }
        button.selected {
            background-color: #0cd2d2;
            border: none;
        }
        button{
            width: 100%;
            height: 60px;
            border: none;
            margin: 20px auto;
            background-color: #fff;
            border: 2px solid #088F8F;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        button:focus{
            border-color: #088F8F;
        }
    </style>

    <form id="form" method="post">
    
    <div class="container" id="container2" style="display: none;">

        <div id="contains2"  style=" margin-top: 0;">
        <div class="form-group col-5" style="width: 50%; margin: 10px auto">
            <span for="">Barangay</span><br>
            <select class="form-control" name="barangay" id="barangay" >
                <option value="none">Select Barangay</option>
                <?php foreach ($brgy as $barangay) : ?>
                <option value="<?= $barangay ?>"> <?= $barangay ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group" style="width: 50%; margin: 10px auto" >
			<label for="">Preferred Date</label>
			<input class="form-control" type="date" name="sched_date" id="sched_date">
			<script language="javascript" src="../js/date.js"></script>
        </div>

        
        </div>
        <button onclick="history.back()" style="width: 100px; background: #088F8F; color: #fff; float: left;"><i class='fa fa-arrow-right'></i>Back</button>
        <button name="search" id='search' onclick="show2()" type="button" style="background: #088F8F; color:#fff; width: 100px;float: right;" >Search</button>
        
    </div>
    </form>
    
    <div class="container" id="container1">
        <input type="text" name="service_type" id="txt" hidden>
        <div class="contains">
            <?php
                $query = $db_home_service_111->query("SELECT * FROM `services` WHERE cat_id='6666'");
                while($fetch = $query->fetch_array()){
            ?>
            <button type="button" name="service_type" value="Office and Facility Movers" onclick="selectOption(this)"><?php echo $fetch['service_name']?></button><br>
            <?php }?>
        </div>
        <button onclick="show1()" id="next" style="width: 100px; background: #088f8f2b; color: #fff; float: right;" disabled>Next</button>
    </div>

    
    <div class="table-responsive" id="container3" style="display: none;">
    <button onclick="history.back()" style="width: 100px; background: #088F8F; color: #fff; float: left;"><i class='fa fa-arrow-right'></i>Back</button>
        
        <table id="table-head" class="table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Service</th>
                    <th>Service Fee</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
				<tr>
					<td colspan="6">Choose your service provider here!</td>
				</tr>
            </tbody>
        </table>
    </div>
    <?php
    $db_home_service_111->close();
    ?>

        <script src="../js/jquery.js"></script>
        <script src="../js/services.js"></script>
        <script src="../js/show.js"></script>

    <script>
    const next = document.getElementById('next');
    function selectOption(button) {
        if (button.classList.contains('selected')) {
            button.classList.remove('selected');
        } else {
            button.classList.add('selected');
            next.removeAttribute('disabled');
            next.style.background = '#088F8F';
        }
        var selectedValues = getSelectedValues();
        document.getElementById('txt').value = selectedValues.join(',');
        }

    function getSelectedValues() {
        var selectedButtons = document.querySelectorAll('.selected');
        var values = [];
        for (var i = 0; i < selectedButtons.length; i++) {
            values.push(selectedButtons[i].value);
        }
        return values;
        }
      

      </script>
</body>
</html>