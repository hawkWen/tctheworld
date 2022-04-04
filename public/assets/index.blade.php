<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="/dist/assets/images/favicon/favicon.ico">


<!-- Libs CSS -->

<link href="/dist/assets/fonts/feather/feather.css" rel="stylesheet" />
<link href="/dist/assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
<link href="/dist/assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
<link href="/dist/assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
<link href="/dist/assets/libs/prismjs/themes/prism.css" rel="stylesheet" />
<link href="/dist/assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
<link href="/dist/assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
<link href="/dist/assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="/dist/assets/libs/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="/dist/assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
<link href="/dist/assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">




<!-- Theme CSS -->
<link rel="stylesheet" href="/dist/assets/css/theme.min.css">
    <title>{{ $title }} | {{ config('sximo.cnf_appname') }}</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-default">
    <div class="container-fluid px-0">
        <a class="navbar-brand" href="./index.html"
            ><img src="/dist/assets/images/brand/logo/logo.svg" alt=""
        /></a>
        <!-- Mobile view nav wrap -->
        <ul
            class="navbar-nav navbar-right-wrap ms-auto d-lg-none d-flex nav-top-wrap"
        >
            <li class="dropdown stopevent">
                <a
                    class="btn btn-light btn-icon rounded-circle text-muted indicator indicator-primary"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                >
                    <i class="fe fe-bell"> </i>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow">
                    <div>
                        <div
                            class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center"
                        >
                            <span class="h5 mb-0">Notifications</span>
                            <a href="# " class="text-muted"
                                ><span class="align-middle"
                                    ><i class="fe fe-settings me-1"></i></span
                            ></a>
                        </div>
                        <ul class="list-group list-group-flush notification-list-scroll">
                            <li class="list-group-item bg-light">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="text-body">
                                        <div class="d-flex">
                                            <img
                                                src="/dist/assets/images/avatar/avatar-1.jpg"
                                                alt=""
                                                class="avatar-md rounded-circle"
                                            />
                                            <div class="ms-3">
                                                <h5 class="fw-bold mb-1">Kristin Watson:</h5>
                                                <p class="mb-3">
                                                    Krisitn Watsan like your comment on course Javascript
                                                    Introduction!
                                                </p>
                                                <span class="fs-6 text-muted">
                                                    <span
                                                        ><span
                                                            class="fe fe-thumbs-up text-success me-1"
                                                        ></span
                                                        >2 hours ago,</span
                                                    >
                                                    <span class="ms-1">2:19 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-auto text-center me-2">
                                        <a
                                            href="#!"
                                            class="badge-dot bg-info"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="Mark as read"
                                        >
                                        </a>
                                        <div>
                                            <a
                                                href="#"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"

                                                title="Remove"
                                            >
                                                <i class="fe fe-x text-muted"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="text-body">
                                        <div class="d-flex">
                                            <img
                                                src="/dist/assets/images/avatar/avatar-2.jpg"
                                                alt=""
                                                class="avatar-md rounded-circle"
                                            />
                                            <div class="ms-3">
                                                <h5 class="fw-bold mb-1">Brooklyn Simmons</h5>
                                                <p class="mb-3">
                                                    Just launched a new Courses React for Beginner.
                                                </p>
                                                <span class="fs-6 text-muted">
                                                    <span
                                                        ><span
                                                            class="fe fe-thumbs-up text-success me-1"
                                                        ></span
                                                        >Oct 9,</span
                                                    >
                                                    <span class="ms-1">1:20 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-auto text-center me-2">
                                        <a
                                            href="#"
                                            class="badge-dot bg-secondary"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"

                                            title="Mark as unread"
                                        >
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="text-body">
                                        <div class="d-flex">
                                            <img
                                                src="/dist/assets/images/avatar/avatar-3.jpg"
                                                alt=""
                                                class="avatar-md rounded-circle"
                                            />
                                            <div class="ms-3">
                                                <h5 class="fw-bold mb-1">Jenny Wilson</h5>
                                                <p class="mb-3">
                                                    Krisitn Watsan like your comment on course Javascript
                                                    Introduction!
                                                </p>
                                                <span class="fs-6 text-muted">
                                                    <span
                                                        ><span class="fe fe-thumbs-up text-info me-1"></span
                                                        >Oct 9,</span
                                                    >
                                                    <span class="ms-1">1:56 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-auto text-center me-2">
                                        <a
                                            href="#"
                                            class="badge-dot bg-secondary"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"

                                            title="Mark as unread"
                                        >
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="text-body">
                                        <div class="d-flex">
                                            <img
                                                src="/dist/assets/images/avatar/avatar-4.jpg"
                                                alt=""
                                                class="avatar-md rounded-circle"
                                            />
                                            <div class="ms-3">
                                                <h5 class="fw-bold mb-1">Sina Ray</h5>
                                                <p class="mb-3">
                                                    You earn new certificate for complete the Javascript
                                                    Beginner course.
                                                </p>
                                                <span class="fs-6 text-muted">
                                                    <span
                                                        ><span class="fe fe-award text-warning me-1"></span
                                                        >Oct 9,</span
                                                    >
                                                    <span class="ms-1">1:56 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-auto text-center me-2">
                                        <a
                                            href="#"
                                            class="badge-dot bg-secondary"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"

                                            title="Mark as unread"
                                        >
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="border-top px-3 pt-3 pb-0">
                            <a
                                href="./pages/notification-history.html"
                                class="text-link fw-semi-bold"
                                >See all Notifications</a
                            >
                        </div>
                    </div>
                </div>
            </li>
            <li class="dropdown ms-2">
                <a
                    class="rounded-circle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                >
                    <div class="avatar avatar-md avatar-indicators avatar-online">
                        <img
                            alt="avatar"
                            src="/dist/assets/images/avatar/avatar-1.jpg"
                            class="rounded-circle"
                        />
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow">
                    <div class="dropdown-item">
                        <div class="d-flex">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img
                                    alt="avatar"
                                    src="/dist/assets/images/avatar/avatar-1.jpg"
                                    class="rounded-circle"
                                />
                            </div>
                            <div class="ms-3 lh-1">
                                <h5 class="mb-1">Annette Black</h5>
                                <p class="mb-0 text-muted">annette@geeksui.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">
                        <li class="dropdown-submenu">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#"
                            >
                                <i class="fe fe-circle me-2"></i>Status
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="badge-dot bg-success me-2"></span>Online
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="badge-dot bg-secondary me-2"></span>Offline
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="badge-dot bg-warning me-2"></span>Away
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="badge-dot bg-danger me-2"></span>Busy
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="dropdown-item" href="./pages/profile-edit.html">
                                <i class="fe fe-user me-2"></i>Profile
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="./pages/student-subscriptions.html"
                            >
                                <i class="fe fe-star me-2"></i>Subscription
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fe fe-settings me-2"></i>Settings
                            </a>
                        </li>
                    </ul>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">
                        <li>
                            <a class="dropdown-item" href="./index.html">
                                <i class="fe fe-power me-2"></i>Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <!-- Button -->
        <button
            class="navbar-toggler collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbar-default"
            aria-controls="navbar-default"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="icon-bar top-bar mt-0"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarBrowse"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        data-bs-display="static"
                    >
                        Browse
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-arrow"
                        aria-labelledby="navbarBrowse"
                    >
                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#"
                            >
                                Web Development
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/course-category.html"
                                    >
                                        Bootstrap</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/course-category.html"
                                    >
                                        React
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/course-category.html"
                                    >
                                        GraphQl</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/course-category.html"
                                    >
                                        Gatsby</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/course-category.html"
                                    >
                                        Grunt</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/course-category.html"
                                    >
                                        Svelte</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/course-category.html"
                                    >
                                        Meteor</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/course-category.html"
                                    >
                                        HTML5</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/course-category.html"
                                    >
                                        Angular</a
                                    >
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#"
                            >
                                Design
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/course-category.html"
                                    >
                                        Graphic Design</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/course-category.html"
                                    >
                                        Illustrator
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/course-category.html"
                                    >
                                        UX / UI Design</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/course-category.html"
                                    >
                                        Figma Design</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/course-category.html"
                                    >
                                        Adobe XD</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/course-category.html"
                                    >
                                        Sketch</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/course-category.html"
                                    >
                                        Icon Design</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/course-category.html"
                                    >
                                        Photoshop</a
                                    >
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a
                                href="./pages/course-category.html"
                                class="dropdown-item"
                            >
                                Mobile App
                            </a>
                        </li>
                        <li>
                            <a
                                href="./pages/course-category.html"
                                class="dropdown-item"
                            >
                                IT Software
                            </a>
                        </li>
                        <li>
                            <a
                                href="./pages/course-category.html"
                                class="dropdown-item"
                            >
                                Marketing
                            </a>
                        </li>
                        <li>
                            <a
                                href="./pages/course-category.html"
                                class="dropdown-item"
                            >
                                Music
                            </a>
                        </li>
                        <li>
                            <a
                                href="./pages/course-category.html"
                                class="dropdown-item"
                            >
                                Life Style
                            </a>
                        </li>
                        <li>
                            <a
                                href="./pages/course-category.html"
                                class="dropdown-item"
                            >
                                Business
                            </a>
                        </li>
                        <li>
                            <a
                                href="./pages/course-category.html"
                                class="dropdown-item"
                            >
                                Photography
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarLanding"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Landings
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarLanding">
                        <li>
                            <h4 class="dropdown-header">Landings</h4>
                        </li>
                        <li>
                            <a
                                href="./pages/landings/landing-courses.html"
                                class="dropdown-item"
                            >
                                Courses
                            </a>
                        </li>
                        <li>
                            <a
                                href="./pages/landings/course-lead.html"
                                class="dropdown-item"
                            >
                                Lead Course
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarPages"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Pages
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-arrow"
                        aria-labelledby="navbarPages"
                    >
                        <li>
                            <a
                                class="dropdown-item"
                                href="./pages/course-single.html"
                            >
                                Course Single
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="./pages/course-single-v2.html"
                            >
                                Course Single v2
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="./pages/course-resume.html"
                            >
                                Course Resume
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="./pages/course-category.html"
                            >
                                Course Category
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="./pages/course-checkout.html"
                            >
                                Course Checkout
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="./pages/course-filter-list.html"
                            >
                                Course List/Grid
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="./pages/add-course.html">
                                Add New Course
                            </a>
                        </li>
                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#"
                            >
                                Paths
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a
                                        href="./pages/course-path.html"
                                        class="dropdown-item"
                                    >
                                        Browse Path
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="./pages/course-path-single.html"
                                        class="dropdown-item"
                                    >
                                        Path Single
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <hr class="mx-3" />
                        </li>

                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#"
                            >
                                Blog
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="./pages/blog.html">
                                        Listing</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/blog-single.html"
                                    >
                                        Article
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/blog-category.html"
                                    >
                                        Category</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/blog-sidebar.html"
                                    >
                                        Sidebar</a
                                    >
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropdown-item" href="./pages/about.html">
                                About
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                Help Center <span class="badge bg-success ms-1">Pro</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="./pages/pricing.html">
                                Pricing
                            </a>
                        </li>
                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#"
                            >
                                Specialty
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/coming-soon.html"
                                    >
                                        Coming Soon
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/404-error.html"
                                    >
                                        Error 404
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/maintenance-mode.html"
                                    >
                                        Maintenance Mode
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/terms-condition-page.html"
                                    >
                                        Terms & Conditions
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarAccount"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Accounts
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-arrow"
                        aria-labelledby="navbarAccount"
                    >
                        <li>
                            <h4 class="dropdown-header">Accounts</h4>
                        </li>
                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#"
                            >
                                Instructor
                            </a>
                            <ul class="dropdown-menu">
                                <li class="text-wrap">
                                    <h5 class="dropdown-header text-dark">Instructor</h5>
                                    <p class="dropdown-text mb-0">
                                        Instructor dashboard for manage courses and earning.
                                    </p>
                                </li>
                                <li>
                                    <hr class="mx-3" />
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/dashboard-instructor.html"
                                    >
                                        Dashboard</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/instructor-profile.html"
                                    >
                                        Profile</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/instructor-courses.html"
                                    >
                                        My Courses
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/instructor-order.html"
                                    >
                                        Orders</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/instructor-reviews.html"
                                    >
                                        Reviews</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/instructor-students.html"
                                    >
                                        Students</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/instructor-payouts.html"
                                    >
                                        Payouts</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/instructor-earning.html"
                                    >
                                        Earning</a
                                    >
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#"
                            >
                                Students
                            </a>
                            <ul class="dropdown-menu">
                                <li class="text-wrap">
                                    <h5 class="dropdown-header text-dark">Students</h5>
                                    <p class="dropdown-text mb-0">
                                        Students dashboard to manage your courses and subscriptions.
                                    </p>
                                </li>
                                <li>
                                    <hr class="mx-3" />
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/dashboard-student.html"
                                    >
                                        Dashboard</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/student-subscriptions.html"
                                    >
                                        Subscriptions
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/payment-method.html"
                                    >
                                        Payments</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/billing-info.html"
                                    >
                                        Billing Info</a
                                    >
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/invoice.html">
                                        Invoice</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/invoice-details.html"
                                    >
                                        Invoice Details</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/dashboard-student.html"
                                    >
                                        Bookmarked</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="./pages/dashboard-student.html"
                                    >
                                        My Path</a
                                    >
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#"
                            >
                                Admin
                            </a>
                            <ul class="dropdown-menu">
                                <li class="text-wrap">
                                    <h5 class="dropdown-header text-dark">Master Admin</h5>
                                    <p class="dropdown-text mb-0">
                                        Master admin dashboard to manage courses, user, site setting
                                        , and work with amazing apps.
                                    </p>
                                </li>
                                <li>
                                    <hr class="mx-3" />
                                </li>
                                <li class="px-3 d-grid">
                                    <a
                                        href="./pages/dashboard/admin-dashboard.html"
                                        class="btn btn-sm btn-primary"
                                        >Go to Dashboard</a
                                    >
                                </li>
                            </ul>
                        </li>
                        <li>
                            <hr class="mx-3" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="./pages/sign-in.html">
                                Sign In
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="./pages/sign-up.html">
                                Sign Up
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="./pages/forget-password.html"
                            >
                                Forgot Password
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="./pages/profile-edit.html">
                                Edit Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="./pages/security.html">
                                Security
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="./pages/social-profile.html"
                            >
                                Social Profiles
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="./pages/notifications.html"
                            >
                                Notifications
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="./pages/profile-privacy.html"
                            >
                                Privacy Settings
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="./pages/delete-profile.html"
                            >
                                Delete Profile
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="./pages/linked-accounts.html"
                            >
                                Linked Accounts
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <i class="fe fe-more-horizontal fs-3"></i>
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-md"
                        aria-labelledby="navbarDropdown"
                    >
                        <div class="list-group">
                            <a
                                class="list-group-item list-group-item-action border-0"
                                href="./docs/index.html"
                            >
                                <div class="d-flex align-items-center">
                                    <i class="fe fe-file-text fs-3 text-primary"></i>
                                    <div class="ms-3">
                                        <h5 class="mb-0">Documentations</h5>
                                        <p class="mb-0 fs-6">
                                            Browse the all documentation
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a
                                class="list-group-item list-group-item-action border-0"
                                href="./docs/changelog.html"
                            >
                                <div class="d-flex align-items-center">
                                    <i class="fe fe-layers fs-3 text-primary"></i>
                                    <div class="ms-3">
                                        <h5 class="mb-0">
                                            Changelog <span class="text-primary ms-1">v2.0.0</span>
                                        </h5>
                                        <p class="mb-0 fs-6">See what's new</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
            <form class="mt-3 mt-lg-0 ms-lg-3 d-flex align-items-center">
                <span class="position-absolute ps-3 search-icon">
                    <i class="fe fe-search"></i>
                </span>
                <input
                    type="search"
                    class="form-control ps-6"
                    placeholder="Search Courses"
                />
            </form>
            <ul class="navbar-nav navbar-right-wrap ms-auto d-none d-lg-block">
                <li class="dropdown d-inline-block stopevent">
                    <a
                        class="btn btn-light btn-icon rounded-circle text-muted indicator indicator-primary"
                        href="#"
                        role="button"
                        id="dropdownNotificationSecond"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <i class="fe fe-bell"> </i>
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-end dropdown-menu-lg"
                        aria-labelledby="dropdownNotificationSecond"
                    >
                        <div>
                            <div
                                class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center"
                            >
                                <span class="h5 mb-0">Notifications</span>
                                <a href="# " class="text-muted"
                                    ><span class="align-middle"
                                        ><i class="fe fe-settings me-1"></i></span
                                ></a>
                            </div>
                            <ul class="list-group list-group-flush notification-list-scroll ">
                                <li class="list-group-item bg-light">
                                    <div class="row">
                                        <div class="col">
                                            <a class="text-body" href="#">
                                            <div class="d-flex">
                                                <img
                                                    src="/dist/assets/images/avatar/avatar-1.jpg"
                                                    alt=""
                                                    class="avatar-md rounded-circle"
                                                />
                                                <div class="ms-3">
                                                    <h5 class="fw-bold mb-1">Kristin Watson:</h5>
                                                    <p class="mb-3">
                                                        Krisitn Watsan like your comment on course
                                                        Javascript Introduction!
                                                    </p>
                                                    <span class="fs-6 text-muted">
                                                        <span
                                                            ><span
                                                                class="fe fe-thumbs-up text-success me-1"
                                                            ></span
                                                            >2 hours ago,</span
                                                        >
                                                        <span class="ms-1">2:19 PM</span>
                                                    </span>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        <div class="col-auto text-center me-2">

                                            <a
                                                href="#"
                                                class="badge-dot bg-info"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"

                                                title="Mark as read"
                                            >
                                            </a>
                                            <div>
                                                <a
                                                    href="#"
                                                    class="bg-transparent"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"

                                                    title="Remove"
                                                >
                                                    <i class="fe fe-x text-muted"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <a class="text-body" href="#">
                                            <div class="d-flex">
                                                <img
                                                    src="/dist/assets/images/avatar/avatar-2.jpg"
                                                    alt=""
                                                    class="avatar-md rounded-circle"
                                                />
                                                <div class="ms-3">
                                                    <h5 class="fw-bold mb-1">Brooklyn Simmons</h5>
                                                    <p class="mb-3">
                                                        Just launched a new Courses React for Beginner.
                                                    </p>
                                                    <span class="fs-6 text-muted">
                                                        <span
                                                            ><span
                                                                class="fe fe-thumbs-up text-success me-1"
                                                            ></span
                                                            >Oct 9,</span
                                                        >
                                                        <span class="ms-1">1:20 PM</span>
                                                    </span>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        <div class="col-auto text-center me-2">
                                            <a
                                                href="#"
                                                class="badge-dot bg-secondary"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"

                                                title="Mark as unread"
                                            >
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <a class="text-body" href="#">
                                            <div class="d-flex">
                                                <img
                                                    src="/dist/assets/images/avatar/avatar-3.jpg"
                                                    alt=""
                                                    class="avatar-md rounded-circle"
                                                />
                                                <div class="ms-3">
                                                    <h5 class="fw-bold mb-1">Jenny Wilson</h5>
                                                    <p class="mb-3">
                                                        Krisitn Watsan like your comment on course
                                                        Javascript Introduction!
                                                    </p>
                                                    <span class="fs-6 text-muted">
                                                        <span
                                                            ><span
                                                                class="fe fe-thumbs-up text-info me-1"
                                                            ></span
                                                            >Oct 9,</span
                                                        >
                                                        <span class="ms-1">1:56 PM</span>
                                                    </span>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        <div class="col-auto text-center me-2">
                                            <a
                                                href="#"
                                                class="badge-dot bg-secondary"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"

                                                title="Mark as unread"
                                            >
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <a class="text-body" href="#">
                                            <div class="d-flex">
                                                <img
                                                    src="/dist/assets/images/avatar/avatar-4.jpg"
                                                    alt=""
                                                    class="avatar-md rounded-circle"
                                                />
                                                <div class="ms-3">
                                                    <h5 class="fw-bold mb-1">Sina Ray</h5>
                                                    <p class="mb-3">
                                                        You earn new certificate for complete the Javascript
                                                        Beginner course.
                                                    </p>
                                                    <span class="fs-6 text-muted">
                                                        <span
                                                            ><span
                                                                class="fe fe-award text-warning me-1"
                                                            ></span
                                                            >Oct 9,</span
                                                        >
                                                        <span class="ms-1">1:56 PM</span>
                                                    </span>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        <div class="col-auto text-center me-2">
                                            <a
                                                href="#"
                                                class="badge-dot bg-secondary"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"

                                                title="Mark as unread"
                                            >
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="border-top px-3 pt-3 pb-0">
                                <a
                                    href="./pages/notification-history.html"
                                    class="text-link fw-semi-bold"
                                    >See all Notifications</a
                                >
                            </div>
                        </div>
                    </div>
                </li>

                <li class="dropdown ms-2 d-inline-block">
                    <a
                        class="rounded-circle"
                        href="#"
                        data-bs-toggle="dropdown"
                        data-bs-display="static"
                        aria-expanded="false"
                    >
                        <div class="avatar avatar-md avatar-indicators avatar-online">
                            <img
                                alt="avatar"
                                src="/dist/assets/images/avatar/avatar-1.jpg"
                                class="rounded-circle"
                            />
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="dropdown-item">
                            <div class="d-flex">
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    <img
                                        alt="avatar"
                                        src="/dist/assets/images/avatar/avatar-1.jpg"
                                        class="rounded-circle"
                                    />
                                </div>
                                <div class="ms-3 lh-1">
                                    <h5 class="mb-1">Annette Black</h5>
                                    <p class="mb-0 text-muted">annette@geeksui.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <ul class="list-unstyled">
                            <li class="dropdown-submenu dropstart-lg">
                                <a
                                    class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                    href="#"
                                >
                                    <i class="fe fe-circle me-2"></i>Status
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <span class="badge-dot bg-success me-2"></span>Online
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <span class="badge-dot bg-secondary me-2"></span>Offline
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <span class="badge-dot bg-warning me-2"></span>Away
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <span class="badge-dot bg-danger me-2"></span>Busy
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="./pages/profile-edit.html"
                                >
                                    <i class="fe fe-user me-2"></i>Profile
                                </a>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="./pages/student-subscriptions.html"
                                >
                                    <i class="fe fe-star me-2"></i>Subscription
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fe fe-settings me-2"></i>Settings
                                </a>
                            </li>
                        </ul>
                        <div class="dropdown-divider"></div>
                        <ul class="list-unstyled">
                            <li>
                                <a class="dropdown-item" href="./index.html">
                                    <i class="fe fe-power me-2"></i>Sign Out
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
  @if($pages!='layouts.default.template.homepage')
    <!-- App Header -->
    @include('layouts.default.header')

    <!-- * App Header -->
    @endif
    <!-- App Capsule -->

       <!-- * loader -->
    @if($pages=='layouts.default.template.gamelist')
    <!-- App Header -->
    @include('layouts.default.subheader')
    
    <!-- * App Header -->
    @endif

    

        @include($pages)
        <!-- Wallet Card -->
        
        <!-- Wallet Card -->
        <!-- Default Action Sheet -->
        @include('layouts.default.modal')
        <!-- * Default Action Sheet -->
        <!-- Default Action Sheet Inset -->
    <!-- Page Content -->
    <div class="bg-dark">
        <div class="container">
            <!-- Hero Section -->
            <div class="row align-items-center g-0">
                <div class="col-xl-5 col-lg-6 col-md-12">
                    <div class="py-5 py-lg-0">
                        <h1 class="text-white display-4 fw-bold">Moradok88.com
                        </h1>
                        <p class="text-white-50 mb-4 lead">
                            Hand-picked Instructor and expertly crafted courses, designed for the modern students and entrepreneur.
                        </p>
                        <a href="pages/course-filter-list.html" class="btn btn-success">Browse Courses</a>
                        <a href="pages/sign-in.html" class="btn btn-white">Are You Instructor?</a>
                    </div>
                </div>
                <div class=" col-xl-7 col-lg-6 col-md-12 text-lg-end text-center">
                    <img src="assets/images/hero/hero-img.png" alt="" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white py-4 shadow-sm">
        <div class="container">
            <div class="row align-items-center g-0">
                <!-- Features -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-lg-0 mb-4">
                    <div class="d-flex align-items-center">
                        <span class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning fs-4 "> <i
                class="fe fe-video"> </i></span>
                        <div class="ms-3">
                            <h4 class="mb-0 fw-semi-bold">ฝาก-ถอนอัตโนมัติ</h4>
                            <p class="mb-0">ออกแบบมาสำหรับนักล่าโปร</p>
                        </div>
                    </div>
                </div>
                <!-- Features -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-lg-0 mb-4">
                    <div class="d-flex align-items-center">
                        <span class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning fs-4 "> <i
                class="fe fe-users"> </i></span>
                        <div class="ms-3">
                            <h4 class="mb-0 fw-semi-bold">ไม่มีปัญหาเรื่องการเงิน</h4>
                            <p class="mb-0">เท่าไหร่ก็จ่ายไม่มีลิมิตต่อวัน</p>
                        </div>
                    </div>
                </div>
                <!-- Features -->
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="d-flex align-items-center">
                        <span class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning fs-4 "> <i
                class="fe fe-clock"> </i></span>
                        <div class="ms-3">
                            <h4 class="mb-0 fw-semi-bold">ฝ่ายบริการลูกค้า</h4>
                            <p class="mb-0">พร้อมดูแล 24 ชั่วโมง ทุกวัน</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="pt-lg-12 pb-lg-3 pt-8 pb-6">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h2 class="mb-0">เกมรอแตก</h2>
                </div>
            </div>
            <div class="position-relative">
                <ul class="controls " id="sliderFirstControls">
                    <li class="prev">
                        <i class="fe fe-chevron-left"></i>
                    </li>
                    <li class="next">
                        <i class="fe fe-chevron-right"></i>
                    </li>
                </ul>
                <div class="sliderFirst">
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/course-react.jpg" alt="" class="rounded-top-md card-img-top"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">How to
                    easily create a website with React</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>3h 56m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                    </svg> Beginner
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(7,700)</span>
                                </div>
                                <!-- Price -->
                                <div class="lh-1 mt-3">
                                    <span class="text-dark fw-bold">$600</span>
                                    <del class="fs-6 text-muted">$750</del>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-1.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>Morris Mccoy</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/10.png" alt="" class="rounded-top-md card-img-top"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">GraphQL:
                    introduction to graphQL for beginners</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 46m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE" />
                    </svg> Advance
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(9,300)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-2.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>Ted Hawkins</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/course-angular.jpg" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">Angular -
                    the complete guide for beginner</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>1h 30m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                    </svg> Beginner
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(8,890)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-3.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>Juanita Bell</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/course-vue.jpg" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">The
                    Python
                    Course: build web application</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 30m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                    </svg> Intermediate
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(13,245)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-4.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>Claire Robertson</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/04.png" alt="" class="rounded-top-md card-img-top"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">GraphQL:
                    introduction to graphQL for beginners</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 46m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE" />
                    </svg> Advance
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(9,300)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-2.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>Ted Hawkins</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/07.png" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">Angular -
                    the complete guide for beginner</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>1h 30m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                    </svg> Beginner
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(8,890)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-3.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>Juanita Bell</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/08.png" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">The
                    Python
                    Course: build web application</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 30m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                    </svg> Intermediate
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(13,245)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-4.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>Claire Robertson</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-lg-3 pt-lg-3">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h2 class="mb-0">เกมยอดนิยม</h2>
                </div>
            </div>
            <div class="position-relative">
                <ul class="controls " id="sliderSecondControls">
                    <li class="prev">
                        <i class="fe fe-chevron-left"></i>
                    </li>
                    <li class="next">
                        <i class="fe fe-chevron-right"></i>
                    </li>
                </ul>
                <div class="sliderSecond">
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/course-gatsby.jpg" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">Gatsby
                    JS:
                    build blog with GraphQL and React</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>3h 56m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                    </svg> Beginner
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(9,370)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-5.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>Morris Mccoy</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/course-javascript.jpg" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">Getting
                    Started with JavaScript</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 46m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE" />
                    </svg> Advance
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(5,245)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-6.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>Ted Hawkins</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/15.png" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">CSS:
                    ultimate CSS course from beginner to advanced</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>1h 30m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                    </svg> Beginner
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(17,000)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-7.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>PG SOFT™</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/12.png" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">Wordpress:
                    complete WordPress theme & plugin development</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 30m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                    </svg> Intermediate
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(16,500)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-7.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>PG SOFT™</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/14.png" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">Getting
                    Started with JavaScript</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 46m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE" />
                    </svg> Advance
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(5,245)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-7.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>PG SOFT™</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/course-css.jpg" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">CSS:
                    ultimate CSS course from beginner to advanced</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>1h 30m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                    </svg> Beginner
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(17,000)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-7.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>PG SOFT™</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/course-wordpress.jpg" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">Wordpress:
                    complete WordPress theme & plugin development</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 30m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                    </svg> Intermediate
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(16,500)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-7.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>PG SOFT™</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-lg-8 pt-lg-3 py-6">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h2 class="mb-0">เกมมาใหม่</h2>
                </div>

            </div>
            <div class="position-relative">
                <ul class="controls" id="sliderThirdControls">
                    <li class="prev">
                        <i class="fe fe-chevron-left"></i>
                    </li>
                    <li class="next">
                        <i class="fe fe-chevron-right"></i>
                    </li>
                </ul>
                <div class="sliderThird">
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/course-react.jpg" alt="" class="card-img-top rounded-top-md">
                            </a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2"><a href="pages/course-single.html" class="text-inherit">How to
                    easily create a website with React</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>3h 56m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                    </svg> Beginner
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(12,245)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-7.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>PG SOFT™</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/course-graphql.jpg" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">GraphQL:
                    introduction to graphQL for beginners</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 46m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE" />
                    </svg> Advance
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(15,350)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-10.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>Ted Hawkins</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/04.png" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">Angular -
                    the complete guide for beginner</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>1h 30m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                    </svg> Beginner
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(6,600)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-4.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>Juanita Bell</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/02.png" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">The
                    Python
                    Course: build web application</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 30m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                    </svg> Intermediate
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(2,500)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-6.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>Claire Robertson</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/09.png" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">GraphQL:
                    introduction to graphQL for beginners</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 46m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE" />
                    </svg> Advance
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(15,350)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-10.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>Ted Hawkins</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/05.png" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">Angular -
                    the complete guide for beginner</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>1h 30m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                    </svg> Beginner
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(6,600)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-4.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>Juanita Bell</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="pages/course-single.html" class="card-img-top"><img src="assets/images/course/course-python.jpg" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">The
                    Python
                    Course: build web application</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 30m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                    </svg> Intermediate
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(2,500)</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="assets/images/avatar/avatar-6.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>Claire Robertson</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <!-- Footer -->
<div class="footer">
    <div class="container">
        <div class="row align-items-center g-0 border-top py-2">
            <!-- Desc -->
            <div class="col-md-6 col-12 text-center text-md-start">
                <span>© 2021 Geeks. All Rights Reserved.</span>
            </div>
              <!-- Links -->
            <div class="col-12 col-md-6">
                <nav class="nav nav-footer justify-content-center justify-content-md-end">
                    <a class="nav-link active ps-0" href="#">Privacy</a>
                    <a class="nav-link" href="#">Terms </a>
                    <a class="nav-link" href="#">Feedback</a>
                    <a class="nav-link" href="#">Support</a>
                </nav>
            </div>
        </div>
    </div>
</div>


    <!-- Scripts -->
    <!-- Libs JS -->
<script src="/dist/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="/dist/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/dist/assets/libs/odometer/odometer.min.js"></script>
<script src="/dist/assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/dist/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="/dist/assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/dist/assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="/dist/assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
<script src="/dist/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="/dist/assets/libs/quill/dist/quill.min.js"></script>
<script src="/dist/assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
<script src="/dist/assets/libs/dragula/dist/dragula.min.js"></script>
<script src="/dist/assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script src="/dist/assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="/dist/assets/libs/jQuery.print/jQuery.print.js"></script>
<script src="/dist/assets/libs/prismjs/prism.js"></script>
<script src="/dist/assets/libs/prismjs/components/prism-scss.min.js"></script>
<script src="/dist/assets/libs/@yaireo/tagify/dist/tagify.min.js"></script>
<script src="/dist/assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="/dist/assets/libs/@popperjs/core/dist/umd/popper.min.js"></script>
<script src="/dist/assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
<script src="/dist/assets/libs/typed.js/lib/typed.min.js"></script>
<script src="/dist/assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
<script src="/dist/assets/libs/jsvectormap/dist/maps/world.js"></script>



<!-- clipboard -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


<!-- Theme JS -->
<script src="/dist/assets/js/theme.min.js"></script>

</body>

</html>

  
   
        <!-- Monthly Bills -->
        <!-- * Monthly Bills -->
        <!-- app footer -->
        <!-- * app footer -->
