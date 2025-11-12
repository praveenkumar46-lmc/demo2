<?php
// File: handle_form.php

/*
 * This script handles the submission from the consultation form.
 * It validates the data and inserts it into the database.
 */

// Include the database connection file. The script will stop if it's not found.
require_once 'config.php';

// Check if the form was submitted using the POST method.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- 1. Retrieve and Sanitize Form Data ---
    // trim() removes unnecessary whitespace from the beginning and end of the input.
    $name = trim($_POST['name']);
    $company_name = trim($_POST['company-name']);
    $mobile = trim($_POST['mobile']);
    $email = trim($_POST['email']);
    $project_nature = trim($_POST['project-nature']);
    $project_description = trim($_POST['project-description']);

    // --- 2. Basic Server-Side Validation ---
    // Make sure required fields are not empty.
    if (empty($name) || empty($mobile) || empty($email) || empty($project_nature)) {
        // If validation fails, redirect back to the form with an error message.
        // urlencode() is used to safely pass the message in the URL.
        header("location: index.php?status=error&msg=" . urlencode("Please fill in all required fields."));
        exit;
    }

    // --- 3. Prepare an SQL Insert Statement ---
    // Using prepared statements is the standard way to prevent SQL injection attacks.
    // The '?' are placeholders for the data.
    $sql = "INSERT INTO consultations (name, company_name, mobile, email, project_nature, project_description) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // --- 4. Bind Variables to the Prepared Statement ---
        // "ssssss" tells MySQL that all 6 parameters are strings.
        $stmt->bind_param("ssssss", $param_name, $param_company, $param_mobile, $param_email, $param_nature, $param_desc);

        // Set the parameter values from the sanitized form data
        $param_name = $name;
        $param_company = $company_name;
        $param_mobile = $mobile;
        $param_email = $email;
        $param_nature = $project_nature;
        $param_desc = $project_description;

        // --- 5. Execute the Statement ---
        if ($stmt->execute()) {
            // If execution is successful, redirect to the homepage with a success status.
            header("location: index.php?status=success");
            exit();
        } else {
            // If execution fails, redirect with a generic error.
            header("location: index.php?status=error&msg=" . urlencode("Something went wrong. Please try again later."));
            exit();
        }

        // Close the statement
        $stmt->close();
    }
    
    // Close the database connection
    $conn->close();

} else {
    // If the page is accessed directly without a POST request, redirect to the homepage.
    header("location: index.php");
    exit;
}
?>