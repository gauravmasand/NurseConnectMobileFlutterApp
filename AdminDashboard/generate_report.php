<?php
require_once('tcpdf/tcpdf.php'); // Include TCPDF library

// Get the filter from POST request
$statusFilter = isset($_POST['statusFilter']) ? $_POST['statusFilter'] : 'All';

// Fetch user data from the API
$apiUrl = 'https://nodejs-firebase-4dhi.onrender.com/users';
$jsonData = @file_get_contents($apiUrl);
$data = json_decode($jsonData, true);

// Filter nurses based on the selected specialization filter
$nurses = array_filter($data, function ($user) {
    return isset($user['role']) && $user['role'] === 'nurse';
});

if ($statusFilter !== 'All') {
    $nurses = array_filter($nurses, function ($nurse) use ($statusFilter) {
        return isset($nurse['specialization']) && $nurse['specialization'] === $statusFilter;
    });
}

// Initialize TCPDF
$pdf = new TCPDF();

// Set PDF document properties
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Rakshak');
$pdf->SetTitle('Nurse Report');
$pdf->SetSubject('Nurse Report');
$pdf->SetKeywords('PDF, report, nurses');

// Set default header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Add a page
$pdf->AddPage();

// Set content
$html = '<h1>Nurse Report</h1>';
$html .= '<h3>Specialization: ' . htmlspecialchars($statusFilter) . '</h3>';
$html .= '<table border="1" cellpadding="4">';
$html .= '<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone Number</th><th>Specialization</th><th>Experience</th><th>Charges</th><th>Education</th><th>License Number</th><th>Aadhar Verified</th></tr></thead>';
$html .= '<tbody>';

$sr_no = 0;
if (!empty($nurses)) {
    foreach ($nurses as $nurse) {
        $html .= '<tr>';
        $html .= '<td>' . ++$sr_no . '</td>';
        $html .= '<td>' . htmlspecialchars($nurse['display_name']) . '</td>';
        $html .= '<td>' . htmlspecialchars($nurse['email']) . '</td>';
        $html .= '<td>' . htmlspecialchars($nurse['phone_number']) . '</td>';
        $html .= '<td>' . htmlspecialchars($nurse['specialization']) . '</td>';
        $html .= '<td>' . htmlspecialchars($nurse['experience']) . ' years</td>';
        $html .= '<td>' . htmlspecialchars($nurse['charges']) . '</td>';
        $html .= '<td>' . htmlspecialchars($nurse['education']) . '</td>';
        $html .= '<td>' . htmlspecialchars($nurse['license_number']) . '</td>';
        $html .= '<td>' . ($nurse['aadhar_verified'] ? 'Yes' : 'No') . '</td>';
        $html .= '</tr>';
    }
} else {
    $html .= '<tr><td colspan="10" align="center">No nurses found.</td></tr>';
}

$html .= '</tbody></table>';

// Output content to PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('nurse_report.pdf', 'D'); // D = force download

exit;
?>
