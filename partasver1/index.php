<?php
include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="image/png" href="Img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Ticketing System</title>

</head>

<body>


<img src="Img/moon.png" id="icon">

    <div class="title">
        <h1>NEWTON TRANSPORTATION, CO INC,</h1>
    </div>



<div class="container" id="container">
    <form action="#" method="POST" id="ticketing-form">

        <div class="details personal">
            <h1>Shipper's Details</h1>
            <span>Identification Purposes</span>
            <input type="text" name="shippername" placeholder="Shipper's Name" id="shippername" required>
            <input type="email" name="email" placeholder="Email" id="email" required>
            <input type="tel" name="shipperphone" placeholder="Phone Number" id="shipperphone" minlength="11" maxlength="11" " required>
        </div>

        <div class="details destination">
            <h1>Receiver's Information</h1>
            <span>Make sure to input the right details of receiver</span>
            <input type="text" name="receivername" placeholder="Name" id="receivername" required>
            <input type="tel" name="receiverphone" placeholder="Phone Number" id="receiverphone" minlength="11" maxlength="11" required>

            <div class="submit-container">
                <label for="boxes">Number of boxes</label>
                <input type="number" min="0" max="10" name="boxes" id="boxes">
            </div>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Enter your </h1>
                    <h1>Personal Details</h1>
                    <h1>for identification</h1>
                    <p>-Newton Scanning Services, INC,-</p>
                    <button type="button" id="next-btn">Next</button>
                </div>
                <div class="toggle-panel toggle-left">
                    <h1>Please,</h1>
                    <h1>Double check</h1>
                    <h1>your details</h1>
                    <button type="button" id="prev-btn">Previous</button>
                </div>
            </div>
            <button type="submit" id="submit" name="submit" >Submit</button>
        </div>

        <div class="dropdown-container">
            <label>
                <select id="origin" name="origin" class="dropdown">
                    <option value="" disabled selected>Origin</option>
                    <option oninput="dropdown">Abra</option>
                    <option oninput="dropdown">Candon</option>
                    <option oninput="dropdown">Cubao</option>
                    <option oninput="dropdown">Dili, Sta. Cruz</option>
                    <option oninput="dropdown">Laoag</option>
                    <option oninput="dropdown">Narvacan</option>
                    <option oninput="dropdown">Pasay</option>
                    <option oninput="dropdown">SFC, La Union</option>
                    <option oninput="dropdown">Vigan</option>
                </select>
            </label>

            <img src="Img/arrow.png" id="arrow">

            <label>
                <select id="des" name="des" class="dropdown">
                    <option value="" disabled selected>Destination</option>
                    <option oninput="dropdown">Abra</option>
                    <option oninput="dropdown">Candon</option>
                    <option oninput="dropdown">Cubao</option>
                    <option oninput="dropdown">Dili, Sta. Cruz</option>
                    <option oninput="dropdown">Laoag</option>
                    <option oninput="dropdown">Narvacan</option>
                    <option oninput="dropdown">Pasay</option>
                    <option oninput="dropdown">SFC, La Union</option>
                    <option oninput="dropdown">Vigan</option>
                </select>
            </label>
        </div>

    </form>

</div>

<footer>
    <div name="date_and_time" id="time"></div>
    <div name="date_and_time" id="date"></div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>

</body>

</html>
