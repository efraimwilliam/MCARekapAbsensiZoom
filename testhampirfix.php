<?php
error_reporting(0);
    $conn = mysqli_connect("localhost", "root", "", "db_absensi");


    if(isset($_POST["import"])){
        $filename = $_FILES["file"]["tmp_name"];
        $index = 1;

        if($_FILES["file"]["size"] > 0){
            $file = fopen($filename, "r");
            
            while(($column = fgetcsv($file, 10000, ",")) !==FALSE){
                if($index==1){
                    $index++;
                    continue;
                }
                $column1 = mysqli_real_escape_string($conn, $column[0]);    
                $column2 = mysqli_real_escape_string($conn, $column[1]);
                $column3 = mysqli_real_escape_string($conn, $column[2]);
                $column4 = mysqli_real_escape_string($conn, $column[3]);
                $column5 = mysqli_real_escape_string($conn, $column[4]);
                $column6 = mysqli_real_escape_string($conn, $column[5]);
                $column7 = mysqli_real_escape_string($conn, $column[6]);
                $column8 = mysqli_real_escape_string($conn, $column[7]);
                $column9 = mysqli_real_escape_string($conn, $column[8]);
                $column10 = mysqli_real_escape_string($conn, $column[9]);
                $column11 = mysqli_real_escape_string($conn, $column[10]);
                $column12 = mysqli_real_escape_string($conn, $column[11]);
                $column13 = mysqli_real_escape_string($conn, $column[13]);
                $column14 = mysqli_real_escape_string($conn, $column[14]);
                $column15 = mysqli_real_escape_string($conn, $column[15]);
                $column16 = mysqli_real_escape_string($conn, $column[16]);
                $column17 = mysqli_real_escape_string($conn, $column[17]);
                $column18 = mysqli_real_escape_string($conn, $column[18]);
                
                //$sqlInsert = "Insert into data (nama, tipe) values ('" . $column1 . "', '" . $column2 ."')";
                $sqlInsert = "Insert into import (topic, meeting_id, username, email, department, group_a, haszoom, 
                creation_time, start_time, end_time, duration, participants, padma_name, usermail, join_time, leave_time, 
                duration_user, recording) 
                values 
                ('" . $column1 . "', '" . $column2 ."', '" . $column3 . "', '" . $column4 . "','" . $column5 . "',
                '" . $column6 . "','" . $column7 . "','" .$column8 . "','" . $column9 . "','" . $column10 . "',
                '" . $column11 . "','" . $column12 . "','" . $column13 . "','" . $column14 . "','" .$column15 . "','" . $column16 . "',
                '" . $column17 . "','" . $column18 . "')";
            
                //print_r($column);
                $result = mysqli_query($conn, $sqlInsert);

                if(!$result){
                    echo "Error";
                }
            }
        }
    }
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<form class = "form-horizoontal" action= "" method = "post" name = "uploadCsv" enctype = "multipart/form-data">
    <div class = "container">
        <h2 align="center">Upload Absensi CSV</a></h2>
        <p><label>Choose File</label></p>
        <input type ="file" name = "file" accept = ".csv">
        <p><button type = "submit" name = "import" id = "first-button">Import</button></p>
    </div>
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_absensi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

    $sqlSelect = "SELECT * from tb_sembilan";
    $sqlSelect1 = "SELECT * from tb_sepuluh";

    $result = mysqli_query($conn, $sqlSelect);
    $result1 = mysqli_query($conn, $sqlSelect1);

    if(mysqli_num_rows($result)>0){
        ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      
        <div class = "container">
            <table class = "table">
            <h2 align="center">Hasil Rekapan</h2>
            <p><h3 align="left">Kelas Jam 8-10</h3></p>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Date</th>
                        <th>Start</th>
                        <th>Finished</th>
                    </tr>
                </thead>
            <?php
            while ($row = mysqli_fetch_array($result)){
            ?>
            <tbody>
                <tr>
                    <td><?php echo $row["username"];?></td>
                    <td><?php echo $row["time"];?></td>
                    <td><?php echo $row["waktu"];?></td>
                    <td><?php echo $row["waktu1"];?></td>
                </tr>
            </tbody>
            <?php } ?>
            </table>
        </div>
    
    <?php
    }

    if(mysqli_num_rows($result1)>0){
        ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      
        <div class = "container">
            <table class = "table">
            <h2 align="center">Hasil Rekapan</h2>
            <p><h3 align="left">Kelas Jam 15-18</h3></p>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Date</th>
                        <th>Start</th>
                        <th>Finished</th>
                    </tr>
                </thead>
            <?php
            while ($row = mysqli_fetch_array($result1)){
            ?>
            <tbody>
                <tr>
                    <td><?php echo $row["username"];?></td>
                    <td><?php echo $row["time"];?></td>
                    <td><?php echo $row["waktu"];?></td>
                    <td><?php echo $row["waktu1"];?></td>
                </tr>
            </tbody>
            <?php } ?>
            </table>
        </div>
    
    <?php
    }
?>

<?php
$mysqli = new mysqli("localhost", "root", "", "db_absensi");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$mysqli->query("DROP PROCEDURE IF EXISTS p") ||
    !$mysqli->query('CREATE PROCEDURE p() 
    
    BEGIN 
    DELETE FROM tb_date;
    INSERT INTO tb_date (`date`)
    SELECT DISTINCT DATE(STR_TO_DATE(creation_time, "%m/%d/%Y %H:%i:%s")) AS q FROM `import`;
    
    END;')){

    echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}


if (!$mysqli->query("CALL p()")) {
    echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

?>

<?php
$mysqli = new mysqli("localhost", "root", "", "db_absensi");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$mysqli->query("DROP PROCEDURE IF EXISTS rest") ||
    !$mysqli->query('CREATE PROCEDURE rest() 
    
    BEGIN 
    DECLARE cek_date VARCHAR (60);
	DECLARE finished INTEGER DEFAULT 0;
	DECLARE cur_date CURSOR FOR SELECT tb_date.`date` FROM tb_date;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;
	OPEN cur_date;

	date_loop: LOOP
		FETCH cur_date INTO cek_date;
		IF finished = 1 THEN
			LEAVE date_loop;
		END IF;
		
		INSERT INTO rekap (topic, username, durations, finished, DAY)
		SELECT topic, padma_name,
		HOUR(STR_TO_DATE(join_time, "%m/%d/%Y %H:%i:%s")),
        HOUR(STR_TO_DATE(end_time, "%m/%d/%Y %H:%i:%s")),
		DATE(STR_TO_DATE(creation_time, "%m/%d/%Y %H:%i:%s"))
		FROM `import` WHERE creation_time != 0 AND DATE(STR_TO_DATE(creation_time, "%m/%d/%Y %H:%i:%s")) = cek_date
		GROUP BY padma_name;
	END LOOP;
    CLOSE cur_date;
    
    
    END;')){

    echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}


if (!$mysqli->query("CALL rest()")) {
    echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

?>

<?php
$mysqli = new mysqli("localhost", "root", "", "db_absensi");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$mysqli->query("DROP PROCEDURE IF EXISTS get_username") ||
    !$mysqli->query('CREATE PROCEDURE get_username() 
    
    BEGIN
    DECLARE cek_master VARCHAR (60);
    DECLARE cek_master1 VARCHAR (60);
	DECLARE finished INTEGER DEFAULT 0;
	DECLARE cur_master CURSOR FOR SELECT tb_master.`start` FROM tb_master WHERE tb_master.`id` = 1;
	DECLARE cur_master1 CURSOR FOR SELECT tb_master.`finish` FROM tb_master WHERE tb_master.`id` = 1;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;
	OPEN cur_master;
	OPEN cur_master1;

	date_loop: LOOP
		FETCH cur_master INTO cek_master;
		IF finished = 1 THEN
			LEAVE date_loop;
		END IF;
		
		FETCH cur_master1 INTO cek_master1;
		IF finished = 1 THEN
			LEAVE date_loop;
		END IF;

		INSERT INTO tb_sembilan (username, `time`, `waktu`, waktu1)
		SELECT username,`day`, durations, rekap.`finished`
		FROM `rekap` WHERE durations >= cek_master AND rekap.`finished`<=cek_master1;
	END LOOP;
    CLOSE cur_master;
    CLOSE cur_master1;
    
    
    
    END;')){

    echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}


if (!$mysqli->query("CALL get_username()")) {
    echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

?>

<?php
$mysqli = new mysqli("localhost", "root", "", "db_absensi");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$mysqli->query("DROP PROCEDURE IF EXISTS get_username1") ||
    !$mysqli->query('CREATE PROCEDURE get_username1() 
    
    BEGIN
    DECLARE cek_master VARCHAR (60);
    DECLARE cek_master1 VARCHAR (60);
	DECLARE finished INTEGER DEFAULT 0;
	DECLARE cur_master CURSOR FOR SELECT tb_master.`start` FROM tb_master WHERE tb_master.`id` = 2;
	DECLARE cur_master1 CURSOR FOR SELECT tb_master.`finish` FROM tb_master WHERE tb_master.`id` = 2;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;
	OPEN cur_master;
	OPEN cur_master1;

	date_loop: LOOP
		FETCH cur_master INTO cek_master;
		IF finished = 1 THEN
			LEAVE date_loop;
		END IF;
		
		FETCH cur_master1 INTO cek_master1;
		IF finished = 1 THEN
			LEAVE date_loop;
		END IF;

		INSERT INTO tb_sepuluh (username, `time`, `waktu`, waktu1)
		SELECT username,`day`, durations, rekap.`finished`
		FROM `rekap` WHERE durations >= cek_master AND rekap.`finished`<=cek_master1;
	END LOOP;
    CLOSE cur_master;
    CLOSE cur_master1;
    
    END;')){

    echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}


if (!$mysqli->query("CALL get_username1()")) {
    echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

?>

