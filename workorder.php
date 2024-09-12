<!-- workorder.php -->
<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}

$formatted_details = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $circuit_no = htmlspecialchars($_POST['circuit_no']);
    $cx_name = htmlspecialchars($_POST['cx_name']);
    $os = htmlspecialchars($_POST['os']);
    $vram = htmlspecialchars($_POST['vram']);
    $vcpu = htmlspecialchars($_POST['vcpu']);
    $vsan_storage = htmlspecialchars($_POST['vsan_storage']);

    $formatted_details = "VAPP\n+++++\nName :- " . $circuit_no . "_" . $cx_name .
     "\nDescription :-" .$circuit_no."_".$cx_name."\n\nVM\n++++\nName :-".$circuit_no."_".$cx_name.
    "\nComputer Name :-".$cx_name."\nDescription :-".$circuit_no."-".$cx_name."\n\nSecurity(Firewall)\n++++++++++++++++\nName :-"
    .$cx_name."-".$circuit_no."-124.43.162.106\nDescription :-".$cx_name."-".$circuit_no."\n\nName :-".$cx_name."-".$circuit_no.
    "-172.20.1.27\nDescription :-".$cx_name."-".$circuit_no."\n\nNAT\n+++++\n".$circuit_no."-".$cx_name."\n\nFirewall\n+++++++++\n"
    .$cx_name."-".$circuit_no."- To Server\n".$cx_name."-".$circuit_no."- From Server\n\n==============================\n============================";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details From Work Order</title>
</head>
<body>
    <h2>Details From Work Order</h2>
    <form method="post" action="">
        <div>
            <label>Circuit No :</label>
            <input type="text" name="circuit_no" required>
            <p></p>
        </div>
        <div>
            <label>CX Name :</label>
            <input type="text" name="cx_name" required>
            <p></p>
        </div>
        <div>
            <label>OS :</label>
            <input type="text" name="os" required>
            <p></p>
        </div>
        <div>
            <label>vRAM :</label>
            <input type="text" name="vram" required>
            <p></p>
        </div>
        <div>
            <label>vCPU :</label>
            <input type="text" name="vcpu" required>
            <p></p>
        </div>
        <div>
            <label>VSAN Storage :</label>
            <input type="text" name="vsan_storage" required>
            <p></p>
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>

    <?php if (!empty($formatted_details)) : ?>
        <h2>Parameters For VM Creation</h2>
        <textarea rows="25" cols="200"><?php echo $formatted_details; ?></textarea>
    <?php endif; ?>
</body>
</html>
