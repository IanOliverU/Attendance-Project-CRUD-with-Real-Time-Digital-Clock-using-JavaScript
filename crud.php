<!DOCTYPE html>    
<html>
    <head>
        <title>Interns Project  #10</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Oswald|Roboto:100" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="crud1.css">
    </head>

    
    <body>
        <?php
         require_once 'connect.php'; 
        ?>


        <div class="container">

        <div class="row justify-content-center">
        <form action="" method="POST">
        <h1>ATTENDANCE SYSTEM</h1>
        <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="">Student name</label>
                <input type="text" name="studname" value="<?php echo $studname; ?>" class="form-control" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="">Year and Section</label>
                <input type="text" name="yearsec" value="<?php echo $yearsec; ?>" class="form-control" placeholder="Enter Year and Section"> 
            </div>
            <div class="form-group">
                <label for="">Date</label>
                <input type="date" name="datetoday" value="<?php echo $datetoday; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Time-In</label>
                <input type="time" name="tin" value="<?php echo $tin; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Time-Out</label>
                <input type="time" name="tout" value="<?php echo $tout ?>" class="form-control">
            </div>
            <div class="form-group text-center">
                <?php 
                    if ($update == true):
                    ?>
                    <button type="submit" class="btn btn-info" name="update">Save Changes</button>
                <?php
                    else: ?>
                <button type="submit" class="btn btn-primary" name="save">Save Attendance</button>
                <?php endif; ?>
                <button type="button" class="btn btn-secondary" onclick="toggleTable()">View Table</button>

            </div>
        </form>
        </div>

        <br>
        <br>
        <?php 
            $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM studinfo") or die($mysqli->error);
            //pre_r($result);
            ?>

            <div id="attendance-table" style="visibility: hidden;">
            <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <h1>STUDENTS LIST</h1>
                <tr>
                    <th scope="col">Student Name</th>
                    <th scope="col">Year and Section</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time-In</th>
                    <th scope="col">Time-Out</th>
                    <th scope="col" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['studname']; ?></td>
                    <td><?php echo $row['yearsec']; ?></td>
                    <td><?php echo $row['datetoday']; ?></td>
                    <td><?php echo $row['tin']; ?></td>
                    <td><?php echo $row['tout']; ?></td>
                    <td>
                    <a href="crud.php?edit=<?php echo $row['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                    <a href="crud.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                 </tr>
            <?php endwhile; ?>
            </tbody>
            </table>

            </div>
        <?php

            function pre_r( $array ) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
        ?>
        <script src="toggle.js"></script>
        <script src="crud.js"></script>
    </body>
</html>