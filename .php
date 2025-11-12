<?php
// ==============================
// payment.php — Razorpay Gateway Integration Page
// ==============================

// --- CONFIG ---
$keyId = "rzp_test_yourKeyId"; // Replace with your Razorpay Key ID
$keySecret = "yourKeySecret";  // Replace with your Razorpay Key Secret
$productName = "Zentrix Pro Course Access";
$productPrice = 50000; // amount in paise (500.00 INR)
$currency = "INR";

// --- GENERATE ORDER ---
$orderUrl = "https://api.razorpay.com/v1/orders";
$orderData = [
    "amount" => $productPrice,
    "currency" => $currency,
    "receipt" => "rcpt_" . rand(1000, 9999),
    "payment_capture" => 1
];

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $orderUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_USERPWD => $keyId . ":" . $keySecret,
    CURLOPT_POSTFIELDS => json_encode($orderData),
    CURLOPT_HTTPHEADER => ['Content-Type: application/json']
]);
$response = curl_exec($ch);
curl_close($ch);

$order = json_decode($response, true);
$orderId = $order['id'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Gateway | Zentrix Pro</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            padding: 40px;
            width: 380px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .price {
            font-size: 32px;
            font-weight: bold;
            margin: 10px 0;
        }
        button {
            background: #667eea;
            border: none;
            color: #fff;
            padding: 12px 25px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }
        button:hover {
            background: #5a6fd6;
        }
    </style>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>

<div class="card">
    <h2>Pay for <?php echo $productName; ?></h2>
    <div class="price">₹<?php echo number_format($productPrice / 100, 2); ?></div>
    <button id="payButton">Pay Now</button>
</div>

<script>
const options = {
    "key": "<?php echo $keyId; ?>",
    "amount": "<?php echo $productPrice; ?>",
    "currency": "<?php echo $currency; ?>",
    "name": "Zentrix Pro",
    "description": "<?php echo $productName; ?>",
    "order_id": "<?php echo $orderId; ?>",
    "handler": function (response) {
        alert("Payment successful! Payment ID: " + response.razorpay_payment_id);
        // You can send 'response' to your server here via AJAX to verify and store in DB
    },
    "theme": {
        "color": "#667eea"
    }
};

document.getElementById('payButton').onclick = function(e) {
    var rzp1 = new Razorpay(options);
    rzp1.open();
    e.preventDefault();
}
</script>

</body>
</html>
background: linear-gradient(rgb(241, 248, 248),rgb(244, 252, 251));