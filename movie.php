<?php
$db = mysqli_connect('localhost', 'root', '', 'college');


$create_table_qry = 'CREATE TABLE IF NOT EXISTS `movie` (
    `book_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `movie_name` varchar(20) NOT NULL,
    `seat_no` int(10) NOT NULL,
    `book_date` date NOT NULL,
    `no_of_seats` int(15) NOT NULL)';
    
    
  
  $create_table = mysqli_query($db, $create_table_qry);
  if (isset($_POST['movie_ticket']))
   {
    $bookid = $_POST['bookid'];
    $moviename = $_POST['moviename'];
    $seatno = $_POST['seatno'];
    $bookdate = $_POST['bookdate'];
    $noofseat = $_POST['noofseat'];
    $insert_ticket = "INSERT INTO movie (book_id,movie_name,seat_no,book_date,no_of_seats) VALUES ($bookid,'$moviename',$seatno,'$bookdate',$noofseat)";
    $insert_result = mysqli_query($db, $insert_ticket);
    if ($insert_result)
            $succ_msg = "<p>Successfully booked ticket</p>";
        else
            $err_msg = "<p>Could not book ticket</p>";

    }
    $tickets_qry = 'SELECT * from movie';
    $tickets_records = mysqli_query($db, $tickets_qry);
    ?>
    <title>movie ticket booking</title>
    <body>
    <center><h3>movie ticket booking</h3></center>

<div class="container">

    <div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>book id</th>
                    <th>movie name</th>
                    <th>seat no</th>
                    <th>book date</th>
                    <th>no of seat</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                while ($tickets = mysqli_fetch_array($tickets_records)) {
                ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $tickets['book_id'] ?></td>
                        <td><?= $tickets['movie_name'] ?></td>
                        <td><?= $tickets['seat_no'] ?></td>
                        <td><?= $tickets['book_date'] ?></td>
                        <td><?= $tickets['no_of_seats'] ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="alert alert-error" id="error_message" style="display: none;">
            </div>


    <form method="post" onsubmit="return check_validation()">
                <label for="lname">bookid</label>
                <input type="text" id="bookid" name="bookid" placeholder="book id..">
                
                <label for="mname">movie Name</label>
                <input type="text" id="moviename" name="moviename" placeholder="movie name.." required>

                <label for="lname">seat no</label>
                <input  type="text" id="seatno" name="seatno" placeholder="seat no...."  required>
                
                
                <label for="lname">book date</label>
                <input type="date" id="bookdate" name="bookdate" placeholder="book date.." ><br>

                <label for="lname">no of seat</label>
                <input type="text" id="noofseat" name="noofseat" placeholder="no of seat.." required>

                <input type="submit" name="movie_ticket" value="movie ticket">
                <!-- <input type="submit" name="show_tickets" value="Show tickets"> -->
            </form>
        </div>



    </div>
    <script>
        function check_validation() {
        var bookid = document.getElementById("bookid").value;
        var moviename = document.getElementById("moviename").value;
        var seatno = document.getElementById("seatno").value;
        var bookdate = document.getElementById("bookdate").value;
        var noofseat = document.getElementById("noofseat").value;



        var error_message = document.getElementById("error_message");

        var err_msg = "";
        if (bookid == "" || isNaN(bookid))
            err_msg += "<p>bookid name cannot be empty</p>";

        if (moviename == "")
            err_msg += "<p>movie name cannot be empty</p>";

        if (seatno == "" || isNaN(seatno))
            err_msg += "<p>seat number cannot be empty</p>";
        if (bookdate == "")
            err_msg += "<p>book date cannot be empty</p>";

        if (noofseat == "" || isNaN(noofseat))
            err_msg += "<p>Product price cannot be empty and must be an integer</p>";

        if (err_msg.length == 0)
            return true;



        error_message.style.display = 'block';
        error_message.innerHTML = err_msg;
        return false;
    }
</script>
    </body>
    <style>

table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}


table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #007bff;
  color: white;
}



    input[type=text],
    input[type=date],
    input[type=time],
    textarea,
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[name=show_tickets] {
        background-color: #46a7f5 !important;
    }

    input[type=submit] {
        width: 30%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .col-3 {
        width: 50%;
    }

    .alert {
        padding: 20px;
        background-color: #f44336;
        color: #fff;
        margin-bottom: 2%;
    }

    .alert-error {
        background-color: #f44336;
    }

    .alert-success {
        background-color: #2eb885;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>