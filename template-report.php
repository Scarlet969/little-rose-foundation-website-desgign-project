<?php
/*
Template Name: Báo Cáo Tài Chính - Luxury Header Fix
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo cáo tài chính - Little Rose Foundation</title>
    
    <!-- 1. Thư viện chuẩn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">

<style>
    :root { 
        --primary-green: #008D42; 
        --primary-red: #E30613; 
        --bg-warm: #FDFBFA;
        --font-main: 'Montserrat', sans-serif;
    }

    /* ÉP PHÔNG ĐỒNG BỘ */
    body, h1, h2, h3, h4, h5, h6, p, span, a, .nav-link, .btn, .counter { 
        font-family: var(--font-main) !important; 
        text-decoration: none !important;
    }

    body { 
        background-color: var(--bg-warm); 
        color: #1a1a1a; 
        overflow-x: hidden; 
        margin: 0;
    }

    /* === LOADING TRÁI TIM GIỐNG TRANG CHỦ === */
    #preloader {
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10000;
    }

    /* Vẽ trái tim theo kỹ thuật Diamond + Circle */
    .heart-pulse {
        position: relative;
        width: 60px;  /* Độ lớn trái tim */
        height: 60px;
        background-color: #B12029; /* Màu đỏ chuẩn LRF */
        transform: rotate(-45deg); /* Xoay hình vuông thành hình thoi */
        animation: heartbeatPlushing 1.2s infinite ease-in-out;
        margin-top: 30px; /* Căn chỉnh vị trí */
    }

    .heart-pulse::before,
    .heart-pulse::after {
        content: "";
        position: absolute;
        width: 60px;
        height: 60px;
        background-color: #B12029;
        border-radius: 50%; /* Tạo thành hình tròn */
    }

    /* Đẩy hình tròn lên trên */
    .heart-pulse::before {
        top: -30px;
        left: 0;
    }

    /* Đẩy hình tròn sang phải */
    .heart-pulse::after {
        top: 0;
        left: 30px;
    }

    /* Hiệu ứng nhịp đập & Tỏa sáng (Quan trọng: phải giữ nguyên rotate(-45deg)) */
    @keyframes heartbeatPlushing {
        0% { 
            transform: scale(1) rotate(-45deg); 
            filter: drop-shadow(0 0 5px rgba(177, 32, 41, 0.2)); 
        }
        14% { 
            transform: scale(1.15) rotate(-45deg); /* Nhịp 1 */
            filter: drop-shadow(0 0 20px rgba(177, 32, 41, 0.6)); 
        }
        28% { 
            transform: scale(1.05) rotate(-45deg); 
        }
        42% { 
            transform: scale(1.3) rotate(-45deg); /* Nhịp 2 mạnh hơn */
            filter: drop-shadow(0 0 40px rgba(177, 32, 41, 0.8)); 
        }
        70% { 
            transform: scale(1) rotate(-45deg); 
            filter: drop-shadow(0 0 5px rgba(177, 32, 41, 0.2));
        }
    }

    /* NAVBAR FIX */
    .navbar-nav .nav-link { 
        font-weight: 800 !important; 
        color: #1a1a1a !important; 
        padding: 10px 20px !important; 
        transition: 0.3s;
    }
    .navbar-nav .nav-link:hover, 
    .navbar-nav .nav-link.active { 
        color: var(--primary-green) !important; 
    }
    .btn-donate { 
        background-color: var(--primary-red) !important; 
        color: white !important; 
        font-weight: 800; 
        border-radius: 50px; 
        padding: 10px 30px !important; 
        border: none !important;
        margin-left: 15px;
    }
    .lang-switch { 
        font-weight: 800; 
        cursor: pointer; 
        color: #999;
        padding: 5px;
    }
    .lang-switch.active { 
        color: var(--primary-green) !important; 
    }

    /* Nút toggle mobile */
    .navbar-toggler {
        border: none !important;
        padding: 8px 12px;
    }
    .navbar-toggler:focus {
        box-shadow: none !important;
    }

    /* CONTENT SECTION */
    .report-top-section { 
        padding: 100px 0 60px; 
        text-align: center; 
    }
    .report-main-title { 
        font-weight: 900; 
        font-size: 3.5rem; 
        letter-spacing: -1px; 
        margin-bottom: 20px; 
        color: #1a1a1a; 
        line-height: 1.2;
    }
    @media (max-width: 768px) {
        .report-main-title {
            font-size: 2.5rem;
        }
    }
    
    .red-line { 
        width: 80px; 
        height: 5px; 
        background: var(--primary-red); 
        margin: 30px auto; 
        border-radius: 10px; 
    }
    .report-summary-text { 
        max-width: 800px; 
        margin: 0 auto 50px; 
        color: #555; 
        line-height: 1.8; 
        font-size: 1.2rem; 
        font-weight: 500;
    }

    /* NÚT TẢI PDF - KHÔNG CÓ ICON */
    .btn-pdf-lrf-action {
        background-color: var(--primary-green) !important; 
        color: white !important;
        border-radius: 50px; 
        padding: 18px 50px; 
        font-weight: 800 !important;
        font-size: 1.1rem;
        display: inline-block; 
        transition: all 0.3s ease; 
        box-shadow: 0 15px 30px rgba(0, 141, 66, 0.25); 
        border: none !important;
        cursor: pointer;
        text-decoration: none !important;
        margin: 30px 0 60px 0;
        letter-spacing: 0.5px;
    }
    .btn-pdf-lrf-action:hover { 
        background-color: var(--primary-red) !important; 
        transform: translateY(-5px) scale(1.05); 
        color: white !important; 
        box-shadow: 0 20px 40px rgba(227, 6, 19, 0.25);
    }

    .kpi-item-box { 
        background: white; 
        border-radius: 24px; 
        padding: 50px 25px; 
        box-shadow: 0 15px 50px rgba(0,0,0,0.08); 
        transition: all 0.4s ease; 
        height: 100%; 
        border: none; 
        text-align: center;
        margin-bottom: 30px;
    }
    .kpi-item-box:hover { 
        transform: translateY(-15px); 
        box-shadow: 0 25px 60px rgba(0,0,0,0.12);
    }
    
    .kpi-item-box small {
        font-size: 0.9rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #666 !important;
    }
    
    .counter {
        font-size: 2.5rem !important;
        font-weight: 900 !important;
        margin-top: 15px;
        font-family: var(--font-main) !important;
    }

    .chart-item-box { 
        background: white; 
        border-radius: 24px; 
        padding: 40px 30px; 
        box-shadow: 0 15px 50px rgba(0,0,0,0.08); 
        height: 100%; 
        margin-bottom: 30px;
    }
    
    .chart-item-box h5 {
        font-weight: 800;
        color: #1a1a1a;
        margin-bottom: 25px;
        font-size: 1.3rem;
    }

    /* Chart container */
    .chart-container {
        position: relative;
        height: 320px;
        width: 100%;
    }

    /* ========== PHẦN NHẬT KÝ GIAO DỊCH THÊM VÀO ========== */
    .transaction-section { 
        padding: 80px 0; 
        margin-top: 80px;
        border-top: 2px solid #f0f0f0;
    }
    
    .section-title { 
        font-weight: 900; 
        font-size: 2.8rem; 
        letter-spacing: -1px; 
        margin-bottom: 20px; 
        color: #1a1a1a; 
        line-height: 1.2;
        text-align: center;
    }
    @media (max-width: 768px) {
        .section-title {
            font-size: 2.2rem;
        }
    }
    
    .section-subtitle {
        text-align: center;
        color: #555;
        font-size: 1.2rem;
        margin-bottom: 50px;
        font-weight: 500;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    /* BẢNG NHẬT KÝ GIAO DỊCH */
    .transaction-table-container {
        background: white;
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.08);
        margin-top: 30px;
        overflow: hidden;
    }
    
    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .table-title {
        font-weight: 800;
        font-size: 1.8rem;
        color: #1a1a1a;
    }
    
    .total-amount {
        background: linear-gradient(135deg, var(--primary-green), #00a859);
        color: white;
        padding: 12px 25px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.3rem;
        box-shadow: 0 8px 25px rgba(0, 141, 66, 0.3);
    }
    
    /* Custom table styling */
    .transaction-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }
    
    .transaction-table thead th {
        background: linear-gradient(135deg, var(--primary-green), #00a859);
        color: white;
        font-weight: 700;
        padding: 18px 15px;
        text-align: center;
        border: none;
        font-size: 1rem;
    }
    
    .transaction-table thead th:first-child {
        border-radius: 15px 0 0 0;
    }
    
    .transaction-table thead th:last-child {
        border-radius: 0 15px 0 0;
    }
    
    .transaction-table tbody tr {
        transition: all 0.3s ease;
    }
    
    .transaction-table tbody tr:hover {
        background-color: rgba(0, 141, 66, 0.05);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .transaction-table tbody td {
        padding: 16px 15px;
        border-bottom: 1px solid #f0f0f0;
        font-weight: 500;
        vertical-align: middle;
    }
    
    .transaction-table tbody tr:last-child td {
        border-bottom: none;
    }
    
    /* Styling cho các cột */
    .stt-column {
        width: 70px;
        text-align: center;
        font-weight: 700;
        color: var(--primary-green);
    }
    
    .date-column {
        width: 120px;
        text-align: center;
        color: #555;
    }
    
    .donor-column {
        min-width: 300px;
        color: #333;
        font-weight: 500;
    }
    
    .amount-column {
        width: 180px;
        text-align: right;
        font-weight: 700;
        color: var(--primary-red);
    }
    
    /* Responsive table */
    @media (max-width: 992px) {
        .transaction-table-container {
            padding: 25px;
            overflow-x: auto;
        }
        
        .transaction-table {
            min-width: 800px;
        }
        
        .table-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 20px;
        }
        
        .total-amount {
            align-self: flex-end;
        }
    }
    
    /* Tổng cộng row */
    .total-row {
        background: linear-gradient(135deg, rgba(0, 141, 66, 0.1), rgba(227, 6, 19, 0.05)) !important;
        font-weight: 900 !important;
    }
    
    .total-row td {
        font-size: 1.2rem !important;
        color: #1a1a1a !important;
        padding: 20px 15px !important;
    }
    
    .total-label {
        text-align: right !important;
        font-weight: 900 !important;
        color: var(--primary-green) !important;
    }
    
    .total-value {
        font-size: 1.4rem !important;
        color: var(--primary-red) !important;
        font-weight: 900 !important;
    }
    
    .view-more {
        text-align: center;
        margin-top: 40px;
        padding: 20px;
    }
    
    .view-more-btn {
        background: transparent;
        border: 2px solid var(--primary-green);
        color: var(--primary-green);
        padding: 12px 35px;
        border-radius: 50px;
        font-weight: 700;
        transition: all 0.3s ease;
    }
    
    .view-more-btn:hover {
        background: var(--primary-green);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 141, 66, 0.2);
    }

    /* --- FOOTER CHUẨN 3 CỘT --- */
    footer { 
        background-color: #1a1a1a !important; 
        color: white !important; 
        padding: 100px 0 50px; 
        margin-top: 120px; 
    }
    footer h5 { 
        font-weight: 800 !important; 
        letter-spacing: 0.5px; 
        margin-bottom: 35px; 
        color: white !important; 
        font-size: 1.3rem; 
    }
    .footer-text { 
        color: #adb5bd; 
        font-size: 1rem; 
        line-height: 1.7; 
        margin-bottom: 0; 
        font-weight: 400;
    }
    
    /* Social links - CÓ ICON */
    .social-list { 
        list-style: none; 
        padding: 0; 
        margin: 0;
    }
    .social-link-item {
        display: flex; 
        align-items: center; 
        text-decoration: none !important;
        color: #adb5bd; 
        font-weight: 600; 
        margin-bottom: 22px;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        font-size: 1.05rem;
    }
    .social-link-item:hover { 
        color: #ffffff !important; 
        transform: translateX(12px); 
    }
    .social-icon-box { 
        width: 45px; 
        text-align: center; 
        font-size: 1.4rem; 
        margin-right: 15px; 
        transition: all 0.3s ease;
    }
    
    /* Màu icon khi hover */
    .social-link-item:hover .fa-globe { color: var(--primary-green) !important; }
    .social-link-item:hover .fa-facebook { color: #1877F2 !important; }
    .social-link-item:hover .fa-tiktok { color: #ff0050 !important; }
    .social-link-item:hover .fa-instagram { color: #E4405F !important; }
    
    /* Contact info */
    .contact-item { 
        display: flex; 
        align-items: flex-start; 
        gap: 18px; 
        margin-bottom: 25px; 
    }
    .contact-item i { 
        color: var(--primary-green); 
        font-size: 1.2rem; 
        margin-top: 3px;
        min-width: 20px;
    }

    /* Footer responsive */
    @media (max-width: 768px) {
        .border-md-start {
            border-left: none !important;
            border-top: 1px solid #333 !important;
            padding-top: 40px !important;
            margin-top: 40px;
            padding-left: 0 !important;
        }
        .ps-md-5 {
            padding-left: 0 !important;
        }
        footer {
            padding: 70px 0 40px;
            margin-top: 80px;
        }
    }

    /* Footer copyright */
    .footer-copyright {
        color: #6c757d !important;
        font-size: 0.9rem;
        font-weight: 400;
        margin-top: 40px;
    }
    /* Hiện menu khi hover cấp 1 */
        .lrf-dropdown:hover > .dropdown-menu {
            display: block;
            margin-top: 0;
        }

        /* Hiện menu con cấp 3 khi hover (Nested Dropdown) */
        .lrf-dropdown .dropend:hover > .dropdown-menu {
            display: block;
            position: absolute;
            left: 100%;
            top: 0;
            margin-left: 0;
        }

        /* Style cho Dropdown Item giống ảnh mẫu */
        .lrf-dropdown .dropdown-menu {
            border-radius: 10px;
            padding: 10px 0;
            min-width: 240px;
            background: #ffffff;
            animation: fadeInMenu 0.3s ease;
        }

        .lrf-dropdown .dropdown-item {
            padding: 12px 20px;
            color: #333 !important;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.95rem;
            border-bottom: 1px solid #f1f1f1; /* Đường kẻ phân cách nhẹ */
            transition: all 0.2s ease;
        }

        .lrf-dropdown .dropdown-item:last-child {
            border-bottom: none;
        }

        .lrf-dropdown .dropdown-item:hover {
            background-color: #f8f9fa;
            color: var(--maroon-dark) !important; /* Đổi màu khi hover */
            padding-left: 25px; /* Hiệu ứng nhích sang phải nhẹ */
        }

        /* Hiệu ứng xuất hiện mượt */
        @keyframes fadeInMenu {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Fix cho mobile: Vẫn cho click nếu cần */
        @media (max-width: 991px) {
            .lrf-dropdown .dropdown-menu { position: static; display: none; }
            .lrf-dropdown.show .dropdown-menu { display: block; }
        }
</style>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- === MÀN HÌNH LOADING TRÁI TIM GIỐNG TRANG CHỦ === -->
<div id="preloader">
    <div class="heart-pulse"></div>
</div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand" href="<?php echo home_url('/'); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/img/LRF-02.png" alt="Logo" height="70">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto fw-bold align-items-center">
                <li class="nav-item"><a class="nav-link px-3" href="<?php echo home_url('/'); ?>" data-vi="Trang chủ" data-en="Home">Trang chủ</a></li>
                <!-- Về chúng tôi -->
                    <li class="nav-item dropdown lrf-dropdown">
                        <a class="nav-link dropdown-toggle fw-bold px-3" href="<?php echo home_url('/about/'); ?>" id="aboutDropdown" role="button" data-vi="Về chúng tôi" data-en="About Us">
                            Về chúng tôi
                        </a>
                        <ul class="dropdown-menu shadow border-0" aria-labelledby="aboutDropdown">
                            <!-- Cấp 2: Đội ngũ nhân sự (Có menu con cấp 3) -->
                            <li class="dropend">
                                <a class="dropdown-item d-flex justify-content-between align-items-center fw-bold" href="<?php echo home_url('/nhan-su'); ?>" data-vi="Đội ngũ nhân sự" data-en="LRF’s Board and Team">
                                    Đội ngũ nhân sự <i class="fas fa-chevron-right ms-2" style="font-size: 0.7rem;"></i>
                                </a>
                                <!-- MENU CON CẤP 3 (Hiện ra khi hover vào Đội ngũ) -->
                                <ul class="dropdown-menu shadow border-0 submenu-left">
                                    <li><a class="dropdown-item" href="<?php echo home_url('/nhan-su/?cat=board'); ?>" data-vi="Hội đồng quản lý" data-en="Board of Directors">Hội đồng quản lý</a></li>
                                    <li><a class="dropdown-item" href="<?php echo home_url('/nhan-su/?cat=control'); ?>" data-vi="Ban kiểm soát" data-en="Supervisory Committee">Ban kiểm soát</a></li>
                                    <li><a class="dropdown-item" href="<?php echo home_url('/nhan-su/?cat=advisor'); ?>" data-vi="Ban cố vấn" data-en="Advisory Board">Ban cố vấn</a></li>
                                </ul>
                            </li>

                            <!-- Các mục khác của cấp 2 -->
                            <li><a class="dropdown-item fw-bold" href="<?php echo home_url('/tam-nhin-su-menh'); ?>" data-vi="Tầm nhìn, Sứ mệnh và Giá trị" data-en="Vision, Mission, Values">Tầm nhìn, Sứ mệnh và Giá trị</a></li>
                            <li><a class="dropdown-item fw-bold" href="<?php echo home_url('/gia-tri-cot-loi'); ?>" data-vi="Giá trị cốt lõi" data-en="Core Commitments">Giá trị cốt lõi</a></li>
                        </ul>
                    </li>
                <li class="nav-item"><a class="nav-link px-3" href="<?php echo home_url('/projects/'); ?>" data-vi="Chương trình" data-en="Programs">Chương trình</a></li>
                <!-- Báo cáo tài chính -->
                    <li class="nav-item dropdown lrf-dropdown">
                        <a class="nav-link dropdown-toggle fw-bold px-3" href="<?php echo home_url('/bao-cao/'); ?>" id="aboutDropdown" role="button" data-vi="Báo cáo tài chính" data-en="Reports">
                            Báo cáo tài chính
                        </a>
                        <ul class="dropdown-menu shadow border-0" aria-labelledby="aboutDropdown">
                            <!-- Cấp 2: Đội ngũ nhân sự (Có menu con cấp 3) -->
                            <li class="dropend">
                                <a class="dropdown-item d-flex justify-content-between align-items-center fw-bold" href="<?php echo home_url('/da-hoan-thanh'); ?>" data-vi="Dự án đã hoàn thành" data-en="Completed Projects">
                                    Dự án đã hoàn thành <i class="fas fa-chevron-right ms-2" style="font-size: 0.7rem;"></i>
                                </a>                                
                            </li>
                            <!-- Các mục khác của cấp 2 -->
                            <li><a class="dropdown-item fw-bold" href="<?php echo home_url('/dang-trien-khai'); ?>" data-vi="Dự án đang triển khai" data-en="Active Projects">Dự án đang triển khai</a></li>
                        </ul>
                    </li>
                <li class="nav-item"><a class="nav-link px-3" href="<?php echo home_url('/news/'); ?>" data-vi="Tin tức" data-en="News">Tin tức</a></li>
                <li class="nav-item"><a class="btn btn-donate ms-lg-3 px-4 py-2 shadow-sm" href="<?php echo home_url('/donate/'); ?>" data-vi="ĐÓNG GÓP" data-en="DONATE">ĐÓNG GÓP</a></li>
                <li class="nav-item d-flex ms-lg-3 align-items-center">
                    <span class="lang-switch active" id="btn-vi" onclick="changeLang('vi')">VN</span>
                    <span class="mx-2 text-muted">|</span>
                    <span class="lang-switch" id="btn-en" onclick="changeLang('en')">EN</span>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <div class="container report-top-section">
        <h1 class="report-main-title" data-vi="Minh bạch tài chính" data-en="Financial Transparency">
            Minh bạch <span style="color: var(--primary-green);">tài chính</span>
        </h1>
        <div class="red-line"></div>
        <p class="report-summary-text" data-vi="Báo cáo nguồn vốn năm 2025. LRF cam kết công khai minh bạch 100% mọi nguồn lực xã hội." data-en="2025 Financial reports. LRF commits to 100% transparency.">
            Báo cáo nguồn vốn năm 2025. LRF cam kết công khai minh bạch 100% mọi nguồn lực xã hội.
        </p>
        
        <!-- NÚT TẢI PDF - KHÔNG CÓ ICON -->
        <a href="<?php echo get_template_directory_uri(); ?>/doc/REPORT-2025.pdf" class="btn-pdf-lrf-action fw-bold" download>
            <span data-vi="Tải báo cáo chi tiết (PDF)" data-en="Download Report (PDF)">Tải báo cáo chi tiết (PDF)</span>
        </a>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="kpi-item-box" style="border-top: 8px solid var(--primary-green);">
                    <small class="text-muted fw-bold" data-vi="TỔNG THU NIÊM YẾT" data-en="TOTAL REVENUE">TỔNG THU NIÊM YẾT</small>
                    <h2 class="fw-bold mt-3 counter" data-target="32540600000" style="color: var(--primary-green);">0</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="kpi-item-box" style="border-top: 8px solid var(--primary-red);">
                    <small class="text-muted fw-bold" data-vi="TỔNG CHI DỰ ÁN" data-en="TOTAL PROJECT EXPENSES">TỔNG CHI DỰ ÁN</small>
                    <h2 class="fw-bold mt-3 counter" data-target="24120800000" style="color: var(--primary-red);">0</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="kpi-item-box" style="border-top: 8px solid #3b82f6;">
                    <small class="text-muted fw-bold" data-vi="SỐ DƯ QUỸ HIỆN TẠI" data-en="CURRENT FUND BALANCE">SỐ DƯ QUỸ HIỆN TẠI</small>
                    <h2 class="fw-bold mt-3 counter" data-target="8419800000" style="color: #3b82f6;">0</h2>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-7">
                <div class="chart-item-box">
                    <h5 data-vi="Biến động Thu/Chi" data-en="Revenue/Expense Trends">Biến động Thu/Chi</h5>
                    <div class="chart-container">
                        <canvas id="trendChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="chart-item-box">
                    <h5 data-vi="Phân bổ nguồn vốn" data-en="Fund Allocation">Phân bổ nguồn vốn</h5>
                    <div class="chart-container">
                        <canvas id="donutChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- ========== PHẦN NHẬT KÝ GIAO DỊCH THÊM VÀO ========== -->
    <div class="container transaction-section">
        <h2 class="section-title" data-vi="NHẬT KÝ GIAO DỊCH" data-en="TRANSACTION JOURNAL">
            NHẬT KÝ GIAO DỊCH
        </h2>
        <div class="red-line"></div>
        <p class="section-subtitle" data-vi="Các khoản đóng góp trong năm 2022 - Quỹ từ thiện Bông Hồng Nhỏ" data-en="Contributions in 2022 - Little Rose Charity Fund">
            Các khoản đóng góp trong năm 2022 - Quỹ từ thiện Bông Hồng Nhỏ
        </p>
        
        <!-- NÚT TẢI PDF -->
        <div class="text-center">
            <a href="<?php echo get_template_directory_uri(); ?>/doc/CAC-KHOAN-DONG-GOP-TRONG-NAM-2022-QUY-TU-THIEN-BONG-HONG-NHO.pdf" class="btn-pdf-lrf-action fw-bold" download>
                <span data-vi="Tải báo cáo đầy đủ (PDF)" data-en="Download Full Report (PDF)">Tải báo cáo đầy đủ (PDF)</span>
            </a>
        </div>

        <!-- BẢNG NHẬT KÝ GIAO DỊCH -->
        <div class="transaction-table-container">
            <div class="table-header">
                <h2 class="table-title" data-vi="Danh sách đóng góp năm 2022" data-en="2022 Contribution List">Danh sách đóng góp năm 2022</h2>
                <div class="total-amount">
                    <span data-vi="Tổng cộng:" data-en="Total:">Tổng cộng:</span> 
                    <span class="ms-2">3.778.495.999 VNĐ</span>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="transaction-table">
                    <thead>
                        <tr>
                            <th class="stt-column" data-vi="STT" data-en="No.">STT</th>
                            <th class="date-column" data-vi="Ngày" data-en="Date">Ngày</th>
                            <th class="donor-column" data-vi="Danh sách Nhà hảo tâm" data-en="Donor List">Danh sách Nhà hảo tâm</th>
                            <th class="amount-column" data-vi="Số tiền (VNĐ)" data-en="Amount (VND)">Số tiền (VNĐ)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Dữ liệu giao dịch từ file PDF - 20 giao dịch đầu
                        $transactions = [
                            ['date' => '12/01/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Hoàng Thị Lệ Trinh', 'amount' => '98.000.000'],
                            ['date' => '19/08/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Cty The Caterers', 'amount' => '5.000.000'],
                            ['date' => '19/08/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Mr Joe Global cafe', 'amount' => '5.000.000'],
                            ['date' => '20/08/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Tuyết Lan', 'amount' => '5.000.000'],
                            ['date' => '20/08/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Nguyễn Thị Phụng', 'amount' => '2.000.000'],
                            ['date' => '22/08/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Cty Education Solutions VN', 'amount' => '1.000.000'],
                            ['date' => '23/08/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - từ chương trình sinh nhật NHG', 'amount' => '39.500.000'],
                            ['date' => '06/09/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Hoàng Quốc Anh Tuấn', 'amount' => '7.300.000'],
                            ['date' => '06/09/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Trang Minh Hà', 'amount' => '730.000'],
                            ['date' => '07/09/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Hoàng Quốc Anh Tuấn', 'amount' => '73.000.000'],
                            ['date' => '07/09/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Nguyễn Mai Chinh', 'amount' => '100.000.000'],
                            ['date' => '29/09/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Hoàng Thị Lệ Trinh', 'amount' => '20.000.000'],
                            ['date' => '29/09/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Trần Nguyễn Thị Mai Sương', 'amount' => '2.000.000'],
                            ['date' => '30/09/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Đặng Thế Đức', 'amount' => '10.000.000'],
                            ['date' => '30/09/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Tô Thanh Hiệp', 'amount' => '999.999'],
                            ['date' => '01/10/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Trang Minh Hà', 'amount' => '2.000.000'],
                            ['date' => '01/10/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Nguyễn Mạnh Hà', 'amount' => '2.000.000'],
                            ['date' => '01/10/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Huỳnh Hiển Vinh', 'amount' => '2.000.000'],
                            ['date' => '01/10/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Đặng Tươi', 'amount' => '6.000.000'],
                            ['date' => '01/10/2022', 'donor' => 'Thu tiền ủng hộ Quỹ BHN - Đặng Văn Tiệp', 'amount' => '3.000.000'],
                        ];
                        
                        // Hiển thị 20 giao dịch đầu tiên
                        for ($i = 0; $i < count($transactions); $i++):
                        ?>
                        <tr>
                            <td class="stt-column"><?php echo $i + 1; ?></td>
                            <td class="date-column"><?php echo $transactions[$i]['date']; ?></td>
                            <td class="donor-column"><?php echo $transactions[$i]['donor']; ?></td>
                            <td class="amount-column"><?php echo $transactions[$i]['amount']; ?></td>
                        </tr>
                        <?php endfor; ?>
                        
                        <!-- Dòng tổng cộng -->
                        <tr class="total-row">
                            <td colspan="3" class="total-label">TỔNG CỘNG (96 giao dịch)</td>
                            <td class="amount-column total-value">3.778.495.999</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Thông tin thêm -->
            <div class="view-more">
                <p class="text-muted mb-4" data-vi="Hiển thị 20 giao dịch đầu tiên trong tổng số 96 giao dịch năm 2022" data-en="Showing first 20 transactions out of 96 total transactions in 2022">
                    Hiển thị 20 giao dịch đầu tiên trong tổng số 96 giao dịch năm 2022
                </p>
                <button class="view-more-btn" onclick="window.location.href='<?php echo get_template_directory_uri(); ?>/doc/CAC-KHOAN-DONG-GOP-TRONG-NAM-2022-QUY-TU-THIEN-BONG-HONG-NHO.pdf'">
                    <i class="fas fa-download me-2"></i>
                    <span data-vi="Xem toàn bộ báo cáo" data-en="View Full Report">Xem toàn bộ báo cáo</span>
                </button>
            </div>
        </div>
    </div>
</main>

<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row g-5">
            <!-- Cột 1 -->
            <div class="col-md-4">
                <h5 class="text-success"><i class="fa-solid fa-heart text-danger me-2"></i> LITTLE ROSE</h5>
                <p class="footer-text" data-vi="Lan tỏa yêu thương, kết nối những tấm lòng nhân ái vì một tương lai tốt đẹp hơn." data-en="Spreading love, connecting compassionate hearts for a better future.">
                    Lan tỏa yêu thương, kết nối những tấm lòng nhân ái vì một tương lai tốt đẹp hơn.
                </p>
            </div>
            
            <!-- Cột 2 -->
            <div class="col-md-4 border-md-start border-secondary ps-md-5">
                <h5 data-vi="Thông tin liên hệ" data-en="Contact Info">Thông tin liên hệ</h5>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <p class="footer-text">49 Phạm Ngọc Thạch, Quận 3, TP.HCM</p>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <p class="footer-text">info@littlerosesfoundation.org</p>
                </div>
            </div>
            
            <!-- Cột 3 -->
            <div class="col-md-4 border-md-start border-secondary ps-md-5">
                <h5 data-vi="Đường liên kết" data-en="Social Links">Đường liên kết</h5>
                <div class="social-list">
                    <a href="https://littlerosesfoundation.org" target="_blank" rel="noopener noreferrer" class="social-link-item">
                        <span class="social-icon-box"><i class="fas fa-globe"></i></span> 
                        <span data-vi="Website" data-en="Website">Website</span>
                    </a>
                    <a href="https://www.facebook.com/littlerosesfoundation" target="_blank" rel="noopener noreferrer" class="social-link-item">
                        <span class="social-icon-box"><i class="fab fa-facebook"></i></span> 
                        <span data-vi="Facebook" data-en="Facebook">Facebook</span>
                    </a>
                    <a href="https://www.tiktok.com/@littlerosesfoundation" target="_blank" rel="noopener noreferrer" class="social-link-item">
                        <span class="social-icon-box"><i class="fab fa-tiktok"></i></span> 
                        <span data-vi="TikTok" data-en="TikTok">TikTok</span>
                    </a>
                    <a href="https://www.instagram.com/little_roses_foundation" target="_blank" rel="noopener noreferrer" class="social-link-item">
                        <span class="social-icon-box"><i class="fab fa-instagram"></i></span> 
                        <span data-vi="Instagram" data-en="Instagram">Instagram</span>
                    </a>
                </div>
            </div>
        </div>
        <hr class="border-secondary mt-5 mb-4">
        <p class="text-center small text-secondary footer-copyright">© 2025 Little Rose Foundation - Developed by Petal Three</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Function to change language
    function changeLang(lang) {
        document.querySelectorAll('[data-vi]').forEach(el => { 
            if (el.getAttribute('data-' + lang)) {
                el.innerText = el.getAttribute('data-' + lang); 
            }
        });
        document.getElementById('btn-vi').classList.toggle('active', lang === 'vi');
        document.getElementById('btn-en').classList.toggle('active', lang === 'en');
        
        // Lưu ngôn ngữ
        window.currentLang = lang;
    }

    // === LOADING SCREEN GIỐNG TRANG CHỦ ===
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(() => {
            const preloader = document.getElementById('preloader');
            if(preloader) {
                preloader.style.opacity = '0';
                setTimeout(() => { 
                    preloader.style.display = 'none'; 
                }, 800);
            }
        }, 1200);
        
        // Initialize charts after page load
        initCharts();
        initCounters();
    });

    // Counter animation
    function initCounters() {
        const counters = document.querySelectorAll('.counter');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-target'));
                    const duration = 2500;
                    const steps = 100;
                    const increment = target / steps;
                    let current = 0;
                    let stepCount = 0;
                    
                    const updateCounter = () => {
                        if (stepCount < steps) {
                            current += increment;
                            counter.innerText = Math.round(current).toLocaleString('vi-VN');
                            stepCount++;
                            setTimeout(updateCounter, duration / steps);
                        } else {
                            counter.innerText = target.toLocaleString('vi-VN');
                        }
                    };
                    
                    updateCounter();
                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5, rootMargin: '0px 0px -100px 0px' });
        
        counters.forEach(counter => {
            observer.observe(counter);
        });
    }

    // Charts
    function initCharts() {
        // Trend Chart
        const trendCtx = document.getElementById('trendChart');
        if (trendCtx) {
            new Chart(trendCtx.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                    datasets: [
                        { 
                            label: 'Thu (triệu VND)', 
                            data: [2500, 2800, 3100, 5200], 
                            backgroundColor: '#008D42', 
                            borderRadius: 10,
                            borderWidth: 0
                        },
                        { 
                            label: 'Chi (triệu VND)', 
                            data: [1800, 2200, 2400, 4100], 
                            backgroundColor: '#E30613', 
                            borderRadius: 10,
                            borderWidth: 0
                        }
                    ]
                },
                options: { 
                    maintainAspectRatio: false,
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                font: {
                                    family: 'Montserrat',
                                    size: 13,
                                    weight: '600'
                                },
                                padding: 20,
                                usePointStyle: true
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    family: 'Montserrat',
                                    size: 12,
                                    weight: '600'
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0,0,0,0.05)'
                            },
                            ticks: {
                                font: {
                                    family: 'Montserrat',
                                    size: 12,
                                    weight: '600'
                                },
                                callback: function(value) {
                                    return value.toLocaleString('vi-VN') + ' tr';
                                }
                            }
                        }
                    }
                }
            });
        }

        // Donut Chart
        const donutCtx = document.getElementById('donutChart');
        if (donutCtx) {
            new Chart(donutCtx.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Giáo dục', 'Y tế', 'Cứu trợ'],
                    datasets: [{
                        data: [50, 30, 20], 
                        backgroundColor: ['#008D42', '#E30613', '#f39c12'], 
                        borderWidth: 0,
                        hoverOffset: 20
                    }]
                },
                options: { 
                    maintainAspectRatio: false,
                    responsive: true,
                    cutout: '75%',
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                font: {
                                    family: 'Montserrat',
                                    size: 13,
                                    weight: '600'
                                },
                                padding: 25,
                                usePointStyle: true,
                                pointStyle: 'circle',
                                boxWidth: 10
                            }
                        }
                    }
                }
            });
        }
    }
</script>

<?php wp_footer(); ?>
</body>
</html>