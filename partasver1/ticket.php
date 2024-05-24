<?php
include 'sidebar.php';
require_once('back.php');

$sql = "SELECT * FROM back ORDER BY date_and_time DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$order = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg" href="Img/logo.png">
    <link rel="stylesheet" href="css/ticket.css">
    <title>Success! Newton Ticketing System</title>
</head>

<body>

<div class="container">
    <p id="number">000</p>
    <h1>Queuing number</h1>
</div>

<div id="qrcode-container">
    <div id="qrcode"></div>
</div>

<?php
    function encryptData($data, $key) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($iv . $encrypted);
}
?>

<!-- QR Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var btn = document.querySelector('.menu');
    var btnst = true;

    btn.onclick = function() {
        if (btnst === true) {
            document.querySelector('.menu span').classList.add('menu');
            document.getElementById('sidebar').classList.add('sidebarshow');
            btnst = false;
        } else if (btnst === false) {
            document.querySelector('.menu span').classList.remove('menu');
            document.getElementById('sidebar').classList.remove('sidebarshow');
            btnst = true;
        }
    }

    // Fetch data from PHP
    const orderData = <?php echo json_encode($order); ?>;
    console.log('Order Data:', orderData); // Debugging line

    const generateQRCode = () => {
        // Extract data
        const { shippername, email, shipperphone, receivername, receiverphone, origin, destination, boxes, date_and_time } = orderData;

        const order = {
            shippername,
            email,
            shipperphone,
            receivername,
            receiverphone,
            origin,
            destination,
            boxes,
            date_and_time
        };


        // Encode the order data
        const encodedOrderData = encodeURIComponent(JSON.stringify(order));
        console.log("<?php echo encryptData('"+ encodedOrderData +"','kahitano'); ?>")

        const qrcodeContainer = document.getElementById('qrcode');
        new QRCode(qrcodeContainer, {
            text: ("<?php echo encryptData('"+ encodedOrderData +"','kahitano'); ?>"),
            width: 350,
            height: 350,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H,
        });
    }
    const Queuing = () => {
        const numberElement = document.getElementById('number');

        function incrementQueuingNumber() {
            const queuingNumber = localStorage.getItem('queuingNumber') || 0;
            const newQueuingNumber = parseInt(queuingNumber) + 1;
            localStorage.setItem('queuingNumber', newQueuingNumber);
            numberElement.textContent = newQueuingNumber;
        }

        // Increment the queuing number when the page is loaded
        window.addEventListener('load', incrementQueuingNumber);
    };

    // Call the Queuing function to initialize the queuing number
    Queuing();

    window.onload = function() {
        generateQRCode();
    };
</script>

</body>
</html>
