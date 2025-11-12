<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include the database configuration file
require_once "config.php";

// Prepare a select statement to fetch all consultation requests
$sql = "SELECT id, name, company_name, mobile, email, project_nature, project_description, submission_date FROM consultations ORDER BY submission_date DESC";

// Attempt to execute the prepared statement
$consultations = [];
if ($result = $conn->query($sql)) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $consultations[] = $row;
        }
        $result->free();
    }
} else {
    echo "Oops! Something went wrong. Please try again later.";
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Food Maveriks</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --hero-green: #2d594e;
            --nav-green: #183D3D;
            --global-bg-color: #eaf2f0;
            --card-border: #edf3f0;
            --text-dark: #2C2C2C;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--global-bg-color);
            margin: 0;
            padding: 2rem;
        }
        body.modal-active {
            overflow: hidden;
        }
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding: 1rem 2rem;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .dashboard-header h1 {
            color: var(--hero-green);
            margin: 0;
            font-size: 1.8rem;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        .user-info span {
            font-weight: 500;
        }
        .logout-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: var(--nav-green);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        .logout-btn:hover {
            background-color: #112a2a;
        }
        .table-container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }
        th, td {
            padding: 15px 20px;
            border-bottom: 1px solid var(--card-border);
            vertical-align: top;
        }
        th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: var(--hero-green);
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }
        td {
            color: #555;
            font-size: 0.95rem;
        }
        tbody tr {
            cursor: pointer;
            transition: background-color 0.2s;
        }
        tbody tr:hover {
            background-color: #f1f8f6;
        }
        tbody tr:last-child td {
            border-bottom: none;
        }
        .no-records {
            text-align: center;
            padding: 40px;
            font-size: 1.1rem;
            color: #777;
        }
        .project-desc-summary {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* --- NEW: MODAL STYLES --- */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(45, 89, 78, 0.7);
            backdrop-filter: blur(5px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 3000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        .modal-content {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            max-width: 700px;
            width: 90%;
            position: relative;
            transform: scale(0.95);
            transition: transform 0.3s ease;
            max-height: 90vh;
            overflow-y: auto;
        }
        .modal-overlay.active .modal-content {
            transform: scale(1);
        }
        .modal-close-btn {
            position: absolute;
            top: 15px;
            right: 25px;
            font-size: 2rem;
            color: #999;
            cursor: pointer;
            line-height: 1;
            transition: color 0.2s;
        }
        .modal-close-btn:hover {
            color: #333;
        }
        .modal-header h2 {
            color: var(--hero-green);
            margin: 0 0 20px 0;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--card-border);
        }
        .modal-details {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 15px 25px;
        }
        .modal-details dt {
            font-weight: 600;
            color: var(--text-dark);
        }
        .modal-details dd {
            margin: 0;
            color: #444;
            white-space: pre-wrap; /* To respect line breaks in description */
            word-break: break-word;
        }
        .modal-details dd a {
            color: var(--nav-green);
            text-decoration: none;
            font-weight: 500;
        }
        .modal-details dd a:hover {
            text-decoration: underline;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            .dashboard-header {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }
            .dashboard-header h1 {
                font-size: 1.5rem;
            }
            .modal-details {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <header class="dashboard-header">
        <h1>Admin Dashboard</h1>
        <div class="user-info">
            <span>Welcome, <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b></span>
            <a href="logout.php" class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>
    </header>

    <main class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Project</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($consultations)) : ?>
                    <?php foreach ($consultations as $row) : ?>
                        <!--
                            IMPORTANT CHANGE:
                            - Added onclick="showDetails(this)" to the <tr> tag.
                            - Added data-* attributes to store all data for this row.
                              This data will be read by the JavaScript function.
                        -->
                        <tr 
                            onclick="showDetails(this)"
                            data-id="<?php echo htmlspecialchars($row['id']); ?>"
                            data-name="<?php echo htmlspecialchars($row['name']); ?>"
                            data-company="<?php echo htmlspecialchars($row['company_name']); ?>"
                            data-mobile="<?php echo htmlspecialchars($row['mobile']); ?>"
                            data-email="<?php echo htmlspecialchars($row['email']); ?>"
                            data-project="<?php echo htmlspecialchars($row['project_nature']); ?>"
                            data-description="<?php echo htmlspecialchars($row['project_description']); ?>"
                            data-date="<?php echo date('F j, Y, g:i a', strtotime($row['submission_date'])); ?>"
                        >
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['company_name'] ?: 'N/A'); ?></td>
                            <td><a href="mailto:<?php echo htmlspecialchars($row['email']); ?>"><?php echo htmlspecialchars($row['email']); ?></a></td>
                            <td><?php echo htmlspecialchars($row['project_nature']); ?></td>
                            <td class="project-desc-summary"><?php echo htmlspecialchars($row['project_description'] ?: 'N/A'); ?></td>
                            <td><?php echo date('M d, Y', strtotime($row['submission_date'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="no-records">No consultation requests found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>

    <!-- NEW: MODAL HTML STRUCTURE (Initially hidden) -->
    <div class="modal-overlay" id="details-modal">
        <div class="modal-content">
            <span class="modal-close-btn" id="modal-close">&times;</span>
            <div class="modal-header">
                <h2>Consultation Details</h2>
            </div>
            <dl class="modal-details">
                <dt>Request ID:</dt>
                <dd id="modal-id"></dd>

                <dt>Submitted On:</dt>
                <dd id="modal-date"></dd>

                <dt>Name:</dt>
                <dd id="modal-name"></dd>

                <dt>Company:</dt>
                <dd id="modal-company"></dd>

                <dt>Email:</dt>
                <dd id="modal-email"></dd>

                <dt>Mobile:</dt>
                <dd id="modal-mobile"></dd>

                <dt>Project Nature:</dt>
                <dd id="modal-project"></dd>

                <dt>Description:</dt>
                <dd id="modal-description"></dd>
            </dl>
        </div>
    </div>


    <!-- NEW: JAVASCRIPT FOR MODAL FUNCTIONALITY -->
    <script>
        // Get modal elements
        const modalOverlay = document.getElementById('details-modal');
        const modalCloseBtn = document.getElementById('modal-close');

        // Function to show the modal and populate it with data
        function showDetails(rowElement) {
            // Retrieve data from the data-* attributes of the clicked row
            const data = rowElement.dataset;

            // Populate the modal with the data
            document.getElementById('modal-id').innerText = data.id;
            document.getElementById('modal-date').innerText = data.date;
            document.getElementById('modal-name').innerText = data.name;
            document.getElementById('modal-company').innerText = data.company || 'N/A';
            
            const emailLink = document.createElement('a');
            emailLink.href = 'mailto:' + data.email;
            emailLink.innerText = data.email;
            document.getElementById('modal-email').innerHTML = ''; // Clear previous content
            document.getElementById('modal-email').appendChild(emailLink);

            document.getElementById('modal-mobile').innerText = data.mobile;
            document.getElementById('modal-project').innerText = data.project;
            document.getElementById('modal-description').innerText = data.description || 'No description provided.';
            
            // Show the modal
            modalOverlay.classList.add('active');
            document.body.classList.add('modal-active');
        }

        // Function to close the modal
        function closeModal() {
            modalOverlay.classList.remove('active');
            document.body.classList.remove('modal-active');
        }

        // Event listeners for closing the modal
        modalCloseBtn.addEventListener('click', closeModal);

        modalOverlay.addEventListener('click', (event) => {
            // Close if the user clicks on the overlay background, but not the content
            if (event.target === modalOverlay) {
                closeModal();
            }
        });

        // Add event listener to close modal with the 'Escape' key
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && modalOverlay.classList.contains('active')) {
                closeModal();
            }
        });
    </script>

</body>
</html>