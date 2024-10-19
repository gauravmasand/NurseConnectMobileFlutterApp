<?php
// Include the TCPDF library
require_once('tcpdf/tcpdf.php'); // Adjust the path to where you've installed TCPDF

// API URL to fetch users
$apiUrl = 'https://nodejs-firebase-4dhi.onrender.com/users';

// Fetch user data from the API
$jsonData = @file_get_contents($apiUrl);
$filteredUsers = [];

if ($jsonData !== false) {
    $data = json_decode($jsonData, true);

    // Filter based on the filter parameter
    $filter = isset($_POST['filter']) ? $_POST['filter'] : 'all';
    
    // Filter by role 'user'
    $usersWithRoleUser = array_filter($data, function ($user) {
        return isset($user['role']) && $user['role'] === 'user';
    });

    if ($filter == 'male') {
        $filteredUsers = array_filter($usersWithRoleUser, function ($user) {
            return isset($user['gender']) && strtolower($user['gender']) === 'male';
        });
    } elseif ($filter == 'female') {
        $filteredUsers = array_filter($usersWithRoleUser, function ($user) {
            return isset($user['gender']) && strtolower($user['gender']) === 'female';
        });
    } elseif ($filter == 'critical') {
        $filteredUsers = array_filter($usersWithRoleUser, function ($user) {
            return isset($user['criticalPatients']) && $user['criticalPatients'] === 'true';
        });
    } else {
        $filteredUsers = $usersWithRoleUser; // All users
    }

    // Initialize PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
    // Set PDF metadata
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your App Name');
    $pdf->SetTitle('Filtered Users');
    $pdf->SetSubject('Filtered User List');
    
    // Set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
    // Set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
    // Set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
    // Set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
    // Set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
    // Add a page
    $pdf->AddPage();
    
    // Set font
    $pdf->SetFont('helvetica', '', 12);
    
    // Table header
    $html = '<h2>Filtered Users List</h2>';
    $html .= '<table border="1" cellpadding="5">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Critical Patient</th>
                        <th>Diabetes</th>
                        <th>Hypertension</th>
                    </tr>
                </thead>
                <tbody>';
    
    // Populate table rows with user data
    $serialNo = 1;
    foreach ($filteredUsers as $user) {
        $display_name = htmlspecialchars($user['display_name']);
        $email = htmlspecialchars($user['email']);
        $gender = htmlspecialchars($user['gender']);
        $criticalPatients = isset($user['criticalPatients']) && $user['criticalPatients'] === 'true' ? 'Yes' : 'No';
        $diabetes = isset($user['diabetes']) && $user['diabetes'] === true ? 'Yes' : 'No';
        $hypertension = isset($user['hypertension']) && $user['hypertension'] === true ? 'Yes' : 'No';

        $html .= "<tr>
                    <td>{$serialNo}</td>
                    <td>{$display_name}</td>
                    <td>{$email}</td>
                    <td>{$gender}</td>
                    <td>{$criticalPatients}</td>
                    <td>{$diabetes}</td>
                    <td>{$hypertension}</td>
                  </tr>";
        $serialNo++;
    }

    $html .= '</tbody></table>';

    // Write the HTML content to the PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Output the PDF as a download
    $pdf->Output('filtered_users.pdf', 'D'); // D means force download, you can use I to display in browser

    exit;
}
