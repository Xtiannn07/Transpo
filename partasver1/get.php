<?php
include 'sidebar.php';
require_once('back.php');

$query = "SELECT * FROM back";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="image/png" href="Img/logo.png">
    <title>Logs</title>

    <style>

        *{
            margin: 1px;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat Alternates', sans-serif;
        }
        body {
            background-color: #ffffff;
        }

        .card {
            background-color: #fff;
            padding: 3px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #f6f5f5;
            color: #131313;
            padding: 10px;
            text-align: center;
        }

        .card-body {
            padding: 2px;
        }

        table {
            height: 10%;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

    </style>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2 class="display-6 text-center">Reports</h2>
                </div>
                <div class="card-body">
                    <table id="myTable">
                        <thead>
                        <tr>
                            <th onclick="sortTable(0)">Shipper's Name</th>
                            <th onclick="sortTable(1)">Email</th>
                            <th onclick="sortTable(2)">Phone Number</th>
                            <th onclick="sortTable(3)">Receiver's Name</th>
                            <th onclick="sortTable(4)">Phone Number</th>
                            <th onclick="sortTable(5)">Origin</th>
                            <th onclick="sortTable(6)">Destination</th>
                            <th onclick="sortTable(7)">Boxes</th>
                            <th onclick="sortTable(8)">Date & Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)):?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['shippername']);?></td>
                                <td><?php echo htmlspecialchars($row['email']);?></td>
                                <td><?php echo htmlspecialchars($row['shipperphone']);?></td>
                                <td><?php echo htmlspecialchars($row['receivername']);?></td>
                                <td><?php echo htmlspecialchars($row['receiverphone']);?></td>
                                <td><?php echo htmlspecialchars($row['origin']);?></td>
                                <td><?php echo htmlspecialchars($row['des']);?></td>
                                <td><?php echo htmlspecialchars($row['boxes']);?></td>
                                <td><?php echo htmlspecialchars($row['date_and_time']);?></td>
                            </tr>
                        <?php endwhile;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("myTable");
        switching = true;
        dir = "asc";

        // Sort by id column by default
        if (n === undefined) {
            n = 8;
        }

        while (switching) {
            switching = false;
            rows = table.rows;

            for (i = 1; i < rows.length - 1; i++) {
                shouldSwitch = false;

                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];

                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }

            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount++;
            } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }

    // Call the sortTable function with no arguments to sort by id column by default
    window.onload = function() {
        sortTable();
    };
</script>

</body>
</html>