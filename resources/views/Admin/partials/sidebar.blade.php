<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar with Scroll Bars</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
        }

        .sidebar {
            background-color: #343a40;
            color: white;
            width: 250px; /* Adjust width as needed */
            height: 100vh; /* Full height */
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 20px;
            background-color: #212529;
            text-align: center;
        }

        .sidebar-header .sidebar-brand {
            color: #ffffff;
            text-decoration: none;
            font-size: 1.5em;
        }

        .sidebar-body {
            overflow-x: auto; /* Allows horizontal scrolling */
            overflow-y: auto; /* Allows vertical scrolling */
            max-height: calc(100vh - 80px); /* Adjust height based on header */
            padding: 10px;
            scrollbar-width: thin; /* For Firefox */
            scrollbar-color: #ff9900 #343a40; /* For Firefox */
        }

        /* Webkit scrollbar styles for Chrome and Safari */
        .sidebar-body::-webkit-scrollbar {
            width: 8px; /* Width of the scrollbar */
            background-color: #343a40; /* Background color of the scrollbar */
        }

        .sidebar-body::-webkit-scrollbar-thumb {
            background-color: #ff9900; /* Color of the scrollbar thumb */
            border-radius: 10px; /* Rounded corners for the scrollbar thumb */
        }

        .sidebar-body::-webkit-scrollbar-thumb:hover {
            background-color: #ffcc00; /* Color of the scrollbar thumb on hover */
        }

        .nav {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            padding: 10px 15px;
        }

        .nav-link {
            color: #ffffff;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: background-color 0.3s;
        }

        .nav-link:hover {
            background-color: #495057;
        }

        .nav-category {
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
            padding: 5px 15px;
            color: #adb5bd;
        }

        .link-icon {
            margin-right: 10px;
        }

        /* Colorful fonts */
        .link-title {
            color: #ffcc00; /* Bright yellow for titles */
            transition: color 0.3s;
        }

        .nav-link:hover .link-title {
            color: #ff9900; /* Darker yellow on hover */
        }

        .nav-item:nth-child(even) .link-title {
            color: #00ccff; /* Light blue for even items */
        }

        .nav-item:nth-child(odd) .link-title {
            color: #ff6699; /* Pink for odd items */
        }

        .link-arrow {
            margin-left: auto;
            color: #ffffff;
        }
    </style>
</head>
<body>

<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Nzaui<span>Offices</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon fas fa-tachometer-alt"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">NZAUI SUB-COUNTY SCHOOLS</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon fas fa-school"></i>
                    <span class="link-title">Schools</span>
                    <i class="link-arrow fas fa-chevron-down"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('schools.primary') }}" class="nav-link">
                    <i class="link-icon fas fa-book-open"></i>
                    <span class="link-title">Primary</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('schools.secondary') }}" class="nav-link">
                    <i class="link-icon fas fa-chalkboard-teacher"></i>
                    <span class="link-title">Secondary</span>
                </a>
            </li>
            <li class="nav-item nav-category">Head Of Institution(H.O.I)</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon fas fa-user-friends"></i>
                    <span class="link-title">Teachers</span>
                    <i class="link-arrow fas fa-chevron-down"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('all.teacher') }}" class="nav-link">
                    <i class="link-icon fas fa-users"></i>
                    <span class="link-title">All Teachers</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('add.teacher') }}" class="nav-link">
                    <i class="link-icon fas fa-user-plus"></i>
                    <span class="link-title">Add Teachers</span>
                </a>
            </li>
            <li class="nav-item nav-category">ICT DEPARTMENT</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
                    <i class="link-icon fas fa-laptop"></i>
                    <span class="link-title">DIGITAL LITERACY(DLP)</span>
                    <i class="link-arrow fas fa-chevron-down"></i>
                </a>
                <div class="collapse" id="uiComponents">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('show.learner.devices') }}" class="nav-link">Learner Devices (LDD)</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('show.teacher.devices') }}" class="nav-link">Teacher Devices (TDD)</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('show.routers') }}" class="nav-link">Routers</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('show.hard.disks') }}" class="nav-link">Hard Disks</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('show.projectors') }}" class="nav-link">Projectors</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#forms" role="button" aria-expanded="false" aria-controls="forms">
                    <i class="link-icon fas fa-tools"></i>
                    <span class="link-title">Technical Support</span>
                    <i class="link-arrow fas fa-chevron-down"></i>
                </a>
                <div class="collapse" id="forms">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/forms/basic-elements.html" class="nav-link">Basic Elements</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/advanced-elements.html" class="nav-link">Advanced Elements</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/editors.html" class="nav-link">Editors</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/wizard.html" class="nav-link">Wizard</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#charts" role="button" aria-expanded="false" aria-controls="charts">
                    <i class="link-icon fas fa-chart-pie"></i>
                    <span class="link-title">Device Management</span>
                    <i class="link-arrow fas fa-chevron-down"></i>
                </a>
                <div class="collapse" id="charts">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/charts/apex.html" class="nav-link">Software Installation</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">Inventory Tracking</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#tables" role="button" aria-expanded="false" aria-controls="tables">
                    <i class="link-icon fas fa-graduation-cap"></i>
                    <span class="link-title">Training and Development</span>
                    <i class="link-arrow fas fa-chevron-down"></i>
                </a>
                <div class="collapse" id="tables">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/tables/basic-table.html" class="nav-link">ICT Integration</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/basic-table.html" class="nav-link">Teacher Workshops</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/data-table.html" class="nav-link">Online tutorials</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#icons" role="button" aria-expanded="false" aria-controls="icons">
                    <i class="link-icon fas fa-address-book"></i>
                    <span class="link-title">Contact Us</span>
                    <i class="link-arrow fas fa-chevron-down"></i>
                </a>
                <div class="collapse" id="icons">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/icons/feather-icons.html" class="nav-link">Feather Icons</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/icons/flag-icons.html" class="nav-link">Flag Icons</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/icons/mdi-icons.html" class="nav-link">Mdi Icons</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">OFFICE RECORDS</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button" aria-expanded="false" aria-controls="general-pages">
                    <i class="link-icon fas fa-file-alt"></i>
                    <span class="link-title">RECORDS</span>
                    <i class="link-arrow fas fa-chevron-down"></i>
                </a>
                <div class="collapse" id="general-pages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{---- route('all.record') ---}}" class="nav-link">Inventory Records</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{-- -s --}}" class="nav-link">Staff Attendance Register</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{-- - --}}" class="nav-link">Text Books Inventory</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#authPages" role="button" aria-expanded="false" aria-controls="authPages">
                    <i class="link-icon fas fa-user-lock"></i>
                    <span class="link-title">Authentication</span>
                    <i class="link-arrow fas fa-chevron-down"></i>
                </a>
                <div class="collapse" id="authPages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/auth/login.html" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/auth/register.html" class="nav-link">Register</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#errorPages" role="button" aria-expanded="false" aria-controls="errorPages">
                    <i class="link-icon fas fa-exclamation-triangle"></i>
                    <span class="link-title">Error Pages</span>
                    <i class="link-arrow fas fa-chevron-down"></i>
                </a>
                <div class="collapse" id="errorPages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/error/404.html" class="nav-link">404</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/error/500.html" class="nav-link">500</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
                    <i class="link-icon fas fa-book"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace();
</script>
</body>
</html>
