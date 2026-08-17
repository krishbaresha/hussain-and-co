<?php
// Database connection parameters


error_reporting(E_ALL);
ini_set('display_errors', 1);


include('config.php'); // Change this to your actual database name



$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(array('status' => 'error', 'message' => 'We apologize for the inconvenience, please try again later.'));
    exit();
}

// Check if the service is set
$service = $_POST['service'] ?? null;
if (!$service) {
    echo json_encode(array('status' => 'error', 'message' => 'Service not specified.'));
    exit();
}

// Get the form data based on the service selected
$formFields = [];
foreach ($_POST as $key => $value) {
    if ($key !== 'service') {
        $formFields[$key] = $conn->real_escape_string($value);
    }
}

// Set the table name based on the selected service
switch ($service) {
    case 'fbr-digital-invoicing':
        $table = 'fbr_digital_invoicing_registration';
        break;
    case 'business-ntn':
        $table = 'business_ntn_registration';
        break;
    case 'individual-ntn':
        $table = 'individual_ntn_registration';
        break;
    case 'company-registration':
        $table = 'company_registration';
        break;
    case 'return-filing':
        $table = 'tax_return_filing';
        break;
    case 'gst-registration':
        $table = 'gst_registration';
        break;
    case 'logo-registration':
        $table = 'logo_registration';
        break;
    case 'pseb-registration':
        $table = 'pseb_registration';
        break;
    case 'copyright-registration':
        $table = 'copyright_registration';
        break;
    case 'trade-mark':
        $table = 'trade_mark_registration';
        break;
    default:
        echo json_encode(array('status' => 'error', 'message' => 'Invalid service.'));
        exit();
}

// Build the SQL query for insertion
$columns = implode(", ", array_keys($formFields));
$values = "'" . implode("', '", $formFields) . "'";

// Insert the data into the database
$sql = "INSERT INTO $table ($columns) VALUES ($values)";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array('status' => 'success', 'message' => 'Form submitted successfully.'));
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Error submitting the form: ' . $conn->error));
}

$conn->close();
?>
