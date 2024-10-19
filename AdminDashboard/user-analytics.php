<?php
// API URL to fetch users
$apiUrl = 'https://nodejs-firebase-4dhi.onrender.com/users';

// Fetch user data from the API
$jsonData = @file_get_contents($apiUrl);

// Initialize variables
$totalUsersWithRoleUser = 0;
$totalCriticalUsers = 0;
$usersWithRoleUser = [];
$totalMaleUsers = 0;
$totalFemaleUsers = 0;

if ($jsonData !== false) {
    $data = json_decode($jsonData, true);

    // Filter by role 'user'
    $usersWithRoleUser = array_filter($data, function ($user) {
        return isset($user['role']) && $user['role'] === 'user';
    });

    // Filter by critical patients
    $criticalUsers = array_filter($data, function ($user) {
        return isset($user['criticalPatients']) && $user['criticalPatients'] === "true";
    });

    // Handle gender-based filtering and count male and female users
    $selectedFilter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
    if ($selectedFilter == 'male') {
        $usersWithRoleUser = array_filter($usersWithRoleUser, function ($user) {
            return isset($user['gender']) && strtolower($user['gender']) === 'male';
        });
    } elseif ($selectedFilter == 'female') {
        $usersWithRoleUser = array_filter($usersWithRoleUser, function ($user) {
            return isset($user['gender']) && strtolower($user['gender']) === 'female';
        });
    } elseif ($selectedFilter == 'critical') {
        $usersWithRoleUser = array_filter($usersWithRoleUser, function ($user) {
            return isset($user['criticalPatients']) && $user['criticalPatients'] === "true";
        });
    }

    // Calculate total male and female users after filtering
    foreach ($usersWithRoleUser as $user) {
        if (isset($user['gender']) && strtolower($user['gender']) === 'male') {
            $totalMaleUsers++;
        } elseif (isset($user['gender']) && strtolower($user['gender']) === 'female') {
            $totalFemaleUsers++;
        }
    }

    // Calculate the total number of users with the role 'user'
    $totalUsersWithRoleUser = count($usersWithRoleUser);

    // Calculate the total number of critical users
    $totalCriticalUsers = count($criticalUsers);
}
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none">
<!-- Mirrored from themesbrand.com/velzon/html/default/dashboard-analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Jul 2022 06:35:06 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Rakshak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/hackathon_logo.jpg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-md-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search..." autocomplete="off"
                                    id="search-options" value="">
                                <span class="mdi mdi-magnify search-widget-icon"></span>
                                <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                                    id="search-close-options"></span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                                <div data-simplebar style="max-height: 320px;">
                                    <!-- item-->
                                    <div class="dropdown-header">
                                        <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                                    </div>

                                    <div class="dropdown-item bg-transparent text-wrap">
                                        <a href="index.php" class="btn btn-soft-secondary btn-sm btn-rounded">how to
                                            setup <i class="mdi mdi-magnify ms-1"></i></a>
                                        <a href="index.php" class="btn btn-soft-secondary btn-sm btn-rounded">buttons <i
                                                class="mdi mdi-magnify ms-1"></i></a>
                                    </div>
                                    <!-- item-->
                                    <div class="dropdown-header mt-2">
                                        <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                                        <span>Analytics Dashboard</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                                        <span>Help Center</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                                        <span>My account settings</span>
                                    </a>

                                    <!-- item-->
                                    <div class="dropdown-header mt-2">
                                        <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                                    </div>

                                    <div class="notification-list">
                                        <!-- item -->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-2.jpg"
                                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="m-0">Angela Bernier</h6>
                                                    <span class="fs-11 mb-0 text-muted">Manager</span>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- item -->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-3.jpg"
                                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="m-0">David Grasso</h6>
                                                    <span class="fs-11 mb-0 text-muted">Web Designer</span>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- item -->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-5.jpg"
                                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="m-0">Mike Bunch</h6>
                                                    <span class="fs-11 mb-0 text-muted">React Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="text-center pt-3 pb-1">
                                    <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All Results
                                        <i class="ri-arrow-right-line ms-1"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..."
                                                aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Anna
                                            Adame</span>
                                        <span
                                            class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Founder</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome Anna!</h6>
                                <a class="dropdown-item" href="pages-profile.html"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Profile</span></a>
                                <a class="dropdown-item" href="apps-chat.html"><i
                                        class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle">Messages</span></a>
                                <a class="dropdown-item" href="apps-tasks-kanban.html"><i
                                        class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle">Taskboard</span></a>
                                <a class="dropdown-item" href="pages-faqs.html"><i
                                        class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Help</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages-profile.html"><i
                                        class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Balance : <b>$5971.67</b></span></a>
                                <a class="dropdown-item" href="pages-profile-settings.html"><span
                                        class="badge bg-soft-success text-success mt-1 float-end">New</span><i
                                        class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Settings</span></a>
                                <a class="dropdown-item" href="auth-lockscreen-basic.html"><i
                                        class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Lock screen</span></a>
                                <a class="dropdown-item" href="auth-logout-basic.html"><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/hackathon_logo.jpg" alt="" height="50">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="Home.php" class="nav-link" data-key="t-analytics">Nurse Analytics </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="user-analytics.php" class="nav-link" data-key="t-analytics">User Analytics</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="flow.php" class="nav-link" data-key="t-analytics">Nurse Activity Flow </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="disease-cure.php" class="nav-link" data-key="t-analytics">Diseases & Cure</a>
                                    </li>   
                                    <li class="nav-item">
                                        <a href="chatbot.php" class="nav-link" data-key="t-analytics">Chat Assistant</a>
                                    </li>

                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">

                        <div class="col-12">
                            <div classl̥="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">User Analytics</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Analytics</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="d-flex flex-column h-100">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <!-- Displaying the total number of users -->
                                                        <div>
                                                            <p class="fw-medium text-muted mb-0">Total Users</p>
                                                            <h2 class="mt-4 ff-secondary fw-semibold">

                                                                <!-- Dynamically insert total users in data-target and as the content of the span -->
                                                                <span class="counter-value"
                                                                    data-target="<?= $totalUsersWithRoleUser ?>"><?= $totalUsersWithRoleUser ?></span>

                                                            </h2>
                                                            <p class="mb-0 text-muted">
                                                                <span class="badge bg-light text-danger mb-0">
                                                                    <i class="ri-arrow-down-line align-middle"></i> 3.96 %
                                                                </span> vs. previous month
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                                <i data-feather="users" class="text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="fw-medium text-muted mb-0">Critical Patients</p>
                                                        <h2 class="mt-4 ff-secondary fw-semibold">
                                                            <span class="counter-value"
                                                                data-target="<?= $totalCriticalUsers ?>"><?= $totalCriticalUsers ?></span>
                                                        </h2>

                                                        <p class="mb-0 text-muted">
                                                            <span class="badge bg-light text-danger mb-0">
                                                                <i class="ri-arrow-down-line align-middle"></i> 3.96 %
                                                            </span> vs. previous month
                                                        </p>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                            <i data-feather="users" class="text-info"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row-->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="fw-medium text-muted mb-0">Male Patient</p>
                                                        <h2 class="mt-4 ff-secondary fw-semibold">
                                                            <span class="counter-value" data-target="<?= $totalMaleUsers ?>"><?= $totalMaleUsers ?></span>

                                                        </h2>
                                                        <p class="mb-0 text-muted"><span
                                                                class="badge bg-light text-danger mb-0"> <i
                                                                    class="ri-arrow-down-line align-middle"></i> 0.24 %
                                                            </span> vs. previous month</p>
                                                    </div>
                                                    <div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                                <i data-feather="clock" class="text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="fw-medium text-muted mb-0">Female Patient</p>
                                                        <h2 class="mt-4 ff-secondary fw-semibold"><span
                                                                class="counter-value" data-target="<?= $totalFemaleUsers ?>"><?= $totalFemaleUsers ?></span>

                                                        </h2>
                                                        <p class="mb-0 text-muted"><span
                                                                class="badge bg-light text-danger mb-0"> <i
                                                                    class="ri-arrow-down-line align-middle"></i> 0.24 %
                                                            </span> vs. previous month</p>
                                                    </div>
                                                    <div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                                <i data-feather="clock" class="text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row-->
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-    title mb-0 flex-grow-1">All Nurses</h4>
                                    <div class="flex-shrink-0 d-flex align-items-center">
                                        <!-- Filter Form -->
                                        <form method="GET" action="">
                                            <label for="filter">Filter by:</label>
                                            <select name="filter" id="filter" class="form-select form-select-sm w-auto d-inline-block me-3">
                                                <option value="all" <?= (isset($_GET['filter']) && $_GET['filter'] == 'all') ? 'selected' : ''; ?>>All</option>
                                                <option value="male" <?= (isset($_GET['filter']) && $_GET['filter'] == 'male') ? 'selected' : ''; ?>>Male</option>
                                                <option value="female" <?= (isset($_GET['filter']) && $_GET['filter'] == 'female') ? 'selected' : ''; ?>>Female</option>
                                                <option value="critical" <?= (isset($_GET['filter']) && $_GET['filter'] == 'critical') ? 'selected' : ''; ?>>Critical Patients</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary btn-sm">Apply Filter</button>
                                        </form>

                                        <form method="post" action="user-analytics-download.php" class="ms-3">
                                            <input type="hidden" name="filter" value="<?= isset($_GET['filter']) ? $_GET['filter'] : 'all' ?>">
                                            <button type="submit" class="btn btn-soft-info btn-sm">
                                                <i class="ri-file-list-3-line align-middle"></i> Download CSV
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive"> <!-- Added this div to enable horizontal scroll -->
                                        <table class="table table-bordered">
                                            <thead class="text-muted table-light">
                                                <tr>
                                                    <th>Sr. No.</th> <!-- Added serial number header -->
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Doctor Name</th>
                                                    <th>Doctor Contact</th>
                                                    <th>Blood Group</th>
                                                    <th>Gender</th>
                                                    <th>Age</th>
                                                    <th>Critical Patient</th>
                                                    <th>Diabetes</th>
                                                    <th>Hypertension</th>
                                                    <th>Mobility Status</th>
                                                    <th>Preferred Nurse Gender</th>
                                                    <th>Medical History</th>
                                                    <th>Created Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($usersWithRoleUser)) {
                                                    $serialNo = 1; // Initialize serial number
                                                    foreach ($usersWithRoleUser as $user) {
                                                        // Ensure each field is a string or handle arrays correctly
                                                        $display_name = is_array($user['display_name']) ? implode(', ', $user['display_name']) : $user['display_name'];
                                                        $email = is_array($user['email']) ? implode(', ', $user['email']) : $user['email'];
                                                        $phone_number = is_array($user['phone_number']) ? implode(', ', $user['phone_number']) : $user['phone_number'];
                                                        $doctorName = is_array($user['doctorName']) ? implode(', ', $user['doctorName']) : $user['doctorName'];
                                                        $doctorContact = is_array($user['doctorContact']) ? implode(', ', $user['doctorContact']) : $user['doctorContact'];
                                                        $bloodGroup = is_array($user['bloodGroup']) ? implode(', ', $user['bloodGroup']) : $user['bloodGroup'];
                                                        $gender = is_array($user['gender']) ? implode(', ', $user['gender']) : $user['gender'];
                                                        $age = is_array($user['age']) ? implode(', ', $user['age']) : $user['age'];
                                                        $criticalPatients = is_array($user['criticalPatients']) ? implode(', ', $user['criticalPatients']) : $user['criticalPatients'];
                                                        $diabetes = is_array($user['diabetes']) ? implode(', ', $user['diabetes']) : $user['diabetes'];
                                                        $hypertension = is_array($user['hypertension']) ? implode(', ', $user['hypertension']) : $user['hypertension'];
                                                        $mobilityStatus = is_array($user['mobilityStatus']) ? implode(', ', $user['mobilityStatus']) : $user['mobilityStatus'];
                                                        $preferredNurseGender = is_array($user['preferredNurseGender']) ? implode(', ', $user['preferredNurseGender']) : $user['preferredNurseGender'];
                                                        $medicalHistory = is_array($user['medicalHistory']) ? implode(', ', $user['medicalHistory']) : $user['medicalHistory'];
                                                        $created_time = is_array($user['created_time']) ? implode(', ', $user['created_time']) : $user['created_time'];

                                                        echo "<tr>
                                                                    <td>" . $serialNo++ . "</td> <!-- Increment and display serial number -->
                                                                    <td>" . htmlspecialchars($display_name) . "</td>
                                                                    <td>" . htmlspecialchars($email) . "</td>
                                                                    <td>" . htmlspecialchars($phone_number) . "</td>
                                                                    <td>" . htmlspecialchars($doctorName) . "</td>
                                                                    <td>" . htmlspecialchars($doctorContact) . "</td>
                                                                    <td>" . htmlspecialchars($bloodGroup) . "</td>
                                                                    <td>" . htmlspecialchars($gender) . "</td>
                                                                    <td>" . htmlspecialchars($age) . "</td>
                                                                    <td>" . ($criticalPatients === 'true' ? 'Yes' : 'No') . "</td>
                                                                    <td>" . ($diabetes ? 'Yes' : 'No') . "</td>
                                                                    <td>" . ($hypertension ? 'Yes' : 'No') . "</td>
                                                                    <td>" . htmlspecialchars($mobilityStatus) . "</td>
                                                                    <td>" . htmlspecialchars($preferredNurseGender) . "</td>
                                                                    <td>" . htmlspecialchars($medicalHistory) . "</td>
                                                                    <td>" . htmlspecialchars($created_time) . "</td>
                                                                </tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='16' class='text-center'>No users found.</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div> <!-- .card-->
                        </div> <!-- .col-->
                    </div>

                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Velzon.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

        <div class="customizer-setting d-none d-md-block">
            <div class="btn-info btn-rounded shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
                data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
            </div>
        </div>

        <!-- Theme Settings -->
        <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
            <div class="d-flex align-items-center bg-primary bg-gradient p-3 offcanvas-header">
                <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0">
                <div data-simplebar class="h-100">
                    <div class="p-4">
                        <h6 class="mb-0 fw-semibold text-uppercase">Layout</h6>
                        <p class="text-muted">Choose your layout</p>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout01" name="data-layout" type="radio" value="vertical"
                                        class="form-check-input">
                                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout01">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Vertical</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal"
                                        class="form-check-input">
                                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout02">
                                        <span class="d-flex h-100 flex-column gap-1">
                                            <span class="bg-light d-flex p-1 gap-1 align-items-center">
                                                <span class="d-block p-1 bg-soft-primary rounded me-1"></span>
                                                <span class="d-block p-1 pb-0 px-2 bg-soft-primary ms-auto"></span>
                                                <span class="d-block p-1 pb-0 px-2 bg-soft-primary"></span>
                                            </span>
                                            <span class="bg-light d-block p-1"></span>
                                            <span class="bg-light d-block p-1 mt-auto"></span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Horizontal</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout03" name="data-layout" type="radio" value="twocolumn"
                                        class="form-check-input">
                                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout03">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1">
                                                    <span class="d-block p-1 bg-soft-primary mb-2"></span>
                                                    <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Two Column</h5>
                            </div>
                            <!-- end col -->
                        </div>

                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Color Scheme</h6>
                        <p class="text-muted">Choose Light or Dark Scheme.</p>

                        <div class="colorscheme-cardradio">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-mode"
                                            id="layout-mode-light" value="light">
                                        <label class="form-check-label p-0 avatar-md w-100" for="layout-mode-light">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span
                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Light</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check card-radio dark">
                                        <input class="form-check-input" type="radio" name="data-layout-mode"
                                            id="layout-mode-dark" value="dark">
                                        <label class="form-check-label p-0 avatar-md w-100 bg-dark"
                                            for="layout-mode-dark">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-soft-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span
                                                            class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-soft-light d-block p-1"></span>
                                                        <span class="bg-soft-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Dark</h5>
                                </div>
                            </div>
                        </div>

                        <div id="layout-width">
                            <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Width</h6>
                            <p class="text-muted">Choose Fluid or Boxed layout.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-width"
                                            id="layout-width-fluid" value="fluid">
                                        <label class="form-check-label p-0 avatar-md w-100" for="layout-width-fluid">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span
                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Fluid</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-width"
                                            id="layout-width-boxed" value="boxed">
                                        <label class="form-check-label p-0 avatar-md w-100 px-2"
                                            for="layout-width-boxed">
                                            <span class="d-flex gap-1 h-100 border-start border-end">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span
                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Boxed</h5>
                                </div>
                            </div>
                        </div>

                        <div id="layout-position">
                            <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Position</h6>
                            <p class="text-muted">Choose Fixed or Scrollable Layout Position.</p>

                            <div class="btn-group radio" role="group">
                                <input type="radio" class="btn-check" name="data-layout-position"
                                    id="layout-position-fixed" value="fixed">
                                <label class="btn btn-light w-sm" for="layout-position-fixed">Fixed</label>

                                <input type="radio" class="btn-check" name="data-layout-position"
                                    id="layout-position-scrollable" value="scrollable">
                                <label class="btn btn-light w-sm ms-0"
                                    for="layout-position-scrollable">Scrollable</label>
                            </div>
                        </div>
                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Topbar Color</h6>
                        <p class="text-muted">Choose Light or Dark Topbar Color.</p>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-topbar"
                                        id="topbar-color-light" value="light">
                                    <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Light</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-topbar"
                                        id="topbar-color-dark" value="dark">
                                    <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-primary d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Dark</h5>
                            </div>
                        </div>

                        <div id="sidebar-size">
                            <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Size</h6>
                            <p class="text-muted">Choose a size of Sidebar.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-size"
                                            id="sidebar-size-default" value="lg">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-default">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span
                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Default</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-size"
                                            id="sidebar-size-compact" value="md">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-compact">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 bg-soft-primary rounded mb-2"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Compact</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-size"
                                            id="sidebar-size-small" value="sm">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-small">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1">
                                                        <span class="d-block p-1 bg-soft-primary mb-2"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Small (Icon View)</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-size"
                                            id="sidebar-size-small-hover" value="sm-hover">
                                        <label class="form-check-label p-0 avatar-md w-100"
                                            for="sidebar-size-small-hover">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1">
                                                        <span class="d-block p-1 bg-soft-primary mb-2"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Small Hover View</h5>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar-view">
                            <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar View</h6>
                            <p class="text-muted">Choose Default or Detached Sidebar view.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-style"
                                            id="sidebar-view-default" value="default">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-default">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span
                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Default</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-style"
                                            id="sidebar-view-detached" value="detached">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-detached">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-flex p-1 gap-1 align-items-center px-2">
                                                    <span class="d-block p-1 bg-soft-primary rounded me-1"></span>
                                                    <span class="d-block p-1 pb-0 px-2 bg-soft-primary ms-auto"></span>
                                                    <span class="d-block p-1 pb-0 px-2 bg-soft-primary"></span>
                                                </span>
                                                <span class="d-flex gap-1 h-100 p-1 px-2">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                                <span class="bg-light d-block p-1 mt-auto px-2"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Detached</h5>
                                </div>
                            </div>
                        </div>
                        <div id="sidebar-color">
                            <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Color</h6>
                            <p class="text-muted">Choose a color of Sidebar.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio" data-bs-toggle="collapse"
                                        data-bs-target="#collapseBgGradient.show">
                                        <input class="form-check-input" type="radio" name="data-sidebar"
                                            id="sidebar-color-light" value="light">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-light">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span
                                                        class="bg-white border-end d-flex h-100 flex-column gap-1 p-1">
                                                        <span
                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Light</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio" data-bs-toggle="collapse"
                                        data-bs-target="#collapseBgGradient.show">
                                        <input class="form-check-input" type="radio" name="data-sidebar"
                                            id="sidebar-color-dark" value="dark">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-dark">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-primary d-flex h-100 flex-column gap-1 p-1">
                                                        <span
                                                            class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Dark</h5>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-link avatar-md w-100 p-0 overflow-hidden border collapsed"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient"
                                        aria-expanded="false" aria-controls="collapseBgGradient">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-vertical-gradient d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </button>
                                    <h5 class="fs-13 text-center mt-2">Gradient</h5>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="collapse" id="collapseBgGradient">
                                <div class="d-flex gap-2 flex-wrap img-switch p-2 px-3 bg-light rounded">

                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar"
                                            id="sidebar-color-gradient" value="gradient">
                                        <label class="form-check-label p-0 avatar-xs rounded-circle"
                                            for="sidebar-color-gradient">
                                            <span class="avatar-title rounded-circle bg-vertical-gradient"></span>
                                        </label>
                                    </div>
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar"
                                            id="sidebar-color-gradient-2" value="gradient-2">
                                        <label class="form-check-label p-0 avatar-xs rounded-circle"
                                            for="sidebar-color-gradient-2">
                                            <span class="avatar-title rounded-circle bg-vertical-gradient-2"></span>
                                        </label>
                                    </div>
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar"
                                            id="sidebar-color-gradient-3" value="gradient-3">
                                        <label class="form-check-label p-0 avatar-xs rounded-circle"
                                            for="sidebar-color-gradient-3">
                                            <span class="avatar-title rounded-circle bg-vertical-gradient-3"></span>
                                        </label>
                                    </div>
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar"
                                            id="sidebar-color-gradient-4" value="gradient-4">
                                        <label class="form-check-label p-0 avatar-xs rounded-circle"
                                            for="sidebar-color-gradient-4">
                                            <span class="avatar-title rounded-circle bg-vertical-gradient-4"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar-img">
                            <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Images</h6>
                            <p class="text-muted">Choose a image of Sidebar.</p>

                            <div class="d-flex gap-2 flex-wrap img-switch">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image"
                                        id="sidebarimg-none" value="none">
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-none">
                                        <span
                                            class="avatar-md w-auto bg-light d-flex align-items-center justify-content-center">
                                            <i class="ri-close-fill fs-20"></i>
                                        </span>
                                    </label>
                                </div>

                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image"
                                        id="sidebarimg-01" value="img-1">
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-01">
                                        <img src="assets/images/sidebar/img-1.jpg" alt=""
                                            class="avatar-md w-auto object-cover">
                                    </label>
                                </div>

                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image"
                                        id="sidebarimg-02" value="img-2">
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-02">
                                        <img src="assets/images/sidebar/img-2.jpg" alt=""
                                            class="avatar-md w-auto object-cover">
                                    </label>
                                </div>
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image"
                                        id="sidebarimg-03" value="img-3">
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-03">
                                        <img src="assets/images/sidebar/img-3.jpg" alt=""
                                            class="avatar-md w-auto object-cover">
                                    </label>
                                </div>
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image"
                                        id="sidebarimg-04" value="img-4">
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-04">
                                        <img src="assets/images/sidebar/img-4.jpg" alt=""
                                            class="avatar-md w-auto object-cover">
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="offcanvas-footer border-top p-3 text-center">
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                    </div>
                    <div class="col-6">
                        <a href="https://1.envato.market/velzon-admin" target="_blank" class="btn btn-primary w-100">Buy
                            Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script>
            // Fetch and process the user and session data from the JSON file
            fetch('https://auth-web-api.onrender.com/api/users') // Replace with the correct path to your JSON file
                .then(response => response.json())
                .then(data => {
                    // Initialize objects to hold user and session counts by country
                    var countryUserCounts = {};
                    var sessionCountsByCountry = {};

                    // Loop through the data to aggregate both user and session counts by country
                    data.forEach(user => {
                        var country = user.location.country;

                        // Aggregate live user counts by country
                        if (countryUserCounts[country]) {
                            countryUserCounts[country]++;
                        } else {
                            countryUserCounts[country] = 1;
                        }

                        // Aggregate session counts by country (assuming each user represents a session)
                        if (sessionCountsByCountry[country]) {
                            sessionCountsByCountry[country]++;
                        } else {
                            sessionCountsByCountry[country] = 1;
                        }
                    });

                    // --- Live Users by Country Section (jsVectorMap) ---
                    var map = new jsVectorMap({
                        map: 'world_merc', // Use the world map
                        selector: '#users-by-country', // Target the map container
                        regionStyle: {
                            initial: {
                                fill: '#e9ecef' // Initial color for regions
                            }
                        },
                        backgroundColor: '#ffffff', // White background
                        series: {
                            regions: [{
                                values: countryUserCounts, // Live user counts by country
                                scale: ['#C8EEFF', '#0071A4'], // Gradient colors based on value
                                normalizeFunction: 'polynomial' // Normalize the color range
                            }]
                        },
                        onRegionTipShow: function(e, label, code) {
                            if (countryUserCounts[code]) {
                                label.html(label.html() + ': ' + countryUserCounts[code] + ' users');
                            }
                        }
                    });

                    // --- Sessions by Countries Section (ApexCharts) ---
                    var countries = Object.keys(sessionCountsByCountry); // Get the country names
                    var sessionCounts = Object.values(sessionCountsByCountry); // Get the session counts

                    // Initialize ApexChart for Sessions by Country
                    var sessionChartOptions = {
                        chart: {
                            type: 'bar',
                            height: 350,
                            toolbar: {
                                show: false
                            }
                        },
                        plotOptions: {
                            bar: {
                                horizontal: true,
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        series: [{
                            name: 'Sessions',
                            data: sessionCounts // Session counts by country
                        }],
                        xaxis: {
                            categories: countries, // Country names
                            labels: {
                                style: {
                                    colors: [],
                                    fontSize: '12px'
                                }
                            }
                        },
                        colors: ['#0071A4'], // Colour for bars
                        fill: {
                            opacity: 1
                        }
                    };

                    var sessionChart = new ApexCharts(document.querySelector("#countries_charts"), sessionChartOptions);
                    sessionChart.render();
                })
                .catch(error => console.error('Error fetching data:', error));
        </script>


        <!-- JAVASCRIPT -->
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
        <script src="assets/js/plugins.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Vector map-->
        <script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
        <script src="assets/libs/jsvectormap/maps/world-merc.js"></script>

        <!-- Dashboard init -->
        <script src="assets/js/pages/dashboard-analytics.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/dashboard-analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Jul 2022 06:35:07 GMT -->

</html>