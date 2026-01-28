<?php
/*
Template Name: Báo Cáo Tổng Hợp 3 Dự Án (All in One)
*/

// --- 1. DỮ LIỆU CỦA CẢ 3 DỰ ÁN ---
$all_projects = [
    'vuon-hong' => [
        'title' => 'Vườn Hồng Giáo Dục',
        'desc' => 'Tiếp sức đến trường cho trẻ em vùng cao',
        'status' => 'Đã hoàn thành',
        'time' => '01/2022 - 12/2022',
        'location' => '15 Tỉnh thành (Hà Giang, Lào Cai...)',
        'goal_text' => 'Hỗ trợ học bổng và dụng cụ học tập',
        'money_target' => 500000000,
        'money_received' => 525000000,
        'money_spent' => 510000000,
        'impact' => [
            ['icon' => 'fa-user-graduate', 'num' => '1.200', 'text' => 'Học sinh nhận học bổng'],
            ['icon' => 'fa-school', 'num' => '15', 'text' => 'Tỉnh thành triển khai'],
            ['icon' => 'fa-book', 'num' => '5.000', 'text' => 'Bộ sách giáo khoa']
        ],
        // Dữ liệu biểu đồ
        'bar_data_thu' => [2500, 2800, 3100, 5200],
        'bar_data_chi' => [1800, 2200, 2400, 4100],
        'donut_data' => [55, 30, 15], 
        'donors' => [
            ['date' => '15/01/2022', 'name' => 'Công ty Giáo dục Hoa Sen', 'amount' => '100.000.000'],
            ['date' => '20/01/2022', 'name' => 'Nhóm Thiện nguyện Tâm Đức', 'amount' => '50.000.000'],
            ['date' => '05/02/2022', 'name' => 'Nguyễn Văn A', 'amount' => '2.000.000']
        ]
    ],
    'anh-sang' => [
        'title' => 'Ánh Sáng Từ Tâm',
        'desc' => 'Phẫu thuật mắt miễn phí cho trẻ em nghèo',
        'status' => 'Đã hoàn thành',
        'time' => '03/2022 - 10/2022',
        'location' => 'TP.HCM & ĐBSCL',
        'goal_text' => 'Mang lại ánh sáng cho trẻ em đục thủy tinh thể',
        'money_target' => 2000000000,
        'money_received' => 2150000000,
        'money_spent' => 2150000000,
        'impact' => [
            ['icon' => 'fa-eye', 'num' => '300', 'text' => 'Ca phẫu thuật thành công'],
            ['icon' => 'fa-hospital', 'num' => '40', 'text' => 'Điểm trường khám sàng lọc'],
            ['icon' => 'fa-user-md', 'num' => '50', 'text' => 'Bác sĩ tham gia']
        ],
        'bar_data_thu' => [4000, 4500, 5000, 6000],
        'bar_data_chi' => [3500, 4000, 4800, 5900],
        'donut_data' => [70, 20, 10], 
        'donors' => [
            ['date' => '01/03/2022', 'name' => 'Bệnh viện Mắt Quốc Tế', 'amount' => '500.000.000'],
            ['date' => '05/03/2022', 'name' => 'Tập đoàn Vingroup (Quỹ Thiện Tâm)', 'amount' => '1.000.000.000'],
            ['date' => '10/04/2022', 'name' => 'Hội Chữ Thập Đỏ', 'amount' => '50.000.000']
        ]
    ],
    'nuoc-sach' => [
        'title' => 'Nước Sạch Bản Xa',
        'desc' => 'Hệ thống lọc nước cho đồng bào vùng ngập mặn',
        'status' => 'Đã hoàn thành',
        'time' => '06/2022 - 09/2022',
        'location' => 'Sóc Trăng, Bến Tre',
        'goal_text' => 'Cung cấp nước uống sạch đạt chuẩn',
        'money_target' => 800000000,
        'money_received' => 820000000,
        'money_spent' => 790000000,
        'impact' => [
            ['icon' => 'fa-tint', 'num' => '5.000', 'text' => 'Người dân có nước sạch'],
            ['icon' => 'fa-faucet', 'num' => '10', 'text' => 'Hệ thống lọc RO lắp đặt'],
            ['icon' => 'fa-home', 'num' => '8', 'text' => 'Xã được hỗ trợ']
        ],
        'bar_data_thu' => [1500, 1800, 2000, 2500],
        'bar_data_chi' => [1000, 1500, 1800, 2200],
        'donut_data' => [40, 40, 20],
        'donors' => [
            ['date' => '01/06/2022', 'name' => 'Công ty Cấp Nước Sài Gòn', 'amount' => '200.000.000'],
            ['date' => '15/06/2022', 'name' => 'Hiệp hội Doanh nghiệp', 'amount' => '150.000.000'],
            ['date' => '20/06/2022', 'name' => 'Lê Thị Hồng', 'amount' => '5.000.000']
        ]
    ]
];
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo cáo tài chính tổng hợp - Little Rose Foundation</title>
    
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
        --card-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }
    body { font-family: var(--font-main); background-color: var(--bg-warm); color: #333; }
    
    .navbar-nav .nav-link { font-weight: 800; color: #1a1a1a; }
    .btn-donate { background-color: var(--primary-red); color: white; border-radius: 50px; font-weight: 800; }
    
    /* PROJECT HERO */
    .project-hero {
        background-color: #27ae60;
        color: white;
        padding: 80px 0 100px;
        text-align: center;
        border-radius: 0 0 50px 50px;
        margin-bottom: 50px;
        position: relative;
    }
    /* Đổi màu nền cho các Hero khác nhau để dễ phân biệt */
    .project-wrapper:nth-child(even) .project-hero { background-color: #2980b9; /* Màu xanh dương cho dự án 2 */ }
    .project-wrapper:nth-child(odd) .project-hero { background-color: #27ae60; /* Màu xanh lá cho dự án 1 & 3 */ }

    .project-status {
        background: #fff; color: var(--primary-green);
        padding: 8px 20px; border-radius: 50px;
        font-weight: 800; font-size: 0.9rem; text-transform: uppercase;
        display: inline-block; margin-bottom: 25px;
    }
    .project-title { font-weight: 900; color: #fff; text-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 15px; }
    .project-desc { font-weight: 500; font-size: 1.2rem; opacity: 0.95; }

    /* CARD STYLES */
    .info-card {
        background: white; border-radius: 15px; padding: 25px;
        box-shadow: var(--card-shadow); height: 100%;
        border-left: 5px solid var(--primary-green);
        transition: transform 0.3s;
    }
    .info-label { font-size: 0.85rem; color: #777; font-weight: 700; text-transform: uppercase; margin-bottom: 10px; }
    .info-value { font-size: 1.1rem; font-weight: 800; color: #1a1a1a; }
    
    .money-card {
        padding: 30px 20px; border-radius: 15px; color: white;
        box-shadow: var(--card-shadow); text-align: center; height: 100%;
        display: flex; flex-direction: column; justify-content: center;
    }
    .money-card.target { background: #5a6268; }
    .money-card.received { background: #00b894; }
    .money-card.spent { background: #ff4757; }
    .money-amount { font-size: 1.8rem; font-weight: 900; margin: 10px 0; }

    .impact-box {
        background: white; border-radius: 20px; padding: 40px 20px;
        text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        border: 1px solid #eee; height: 100%;
    }
    .impact-icon {
        width: 80px; height: 80px; background: rgba(0,141,66,0.1);
        color: var(--primary-green); font-size: 2.5rem;
        display: flex; align-items: center; justify-content: center;
        border-radius: 50%; margin: 0 auto 20px;
    }

    /* CHART CARD */
    .chart-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 0 20px rgba(0,0,0,0.03);
        border: 1px solid rgba(0,0,0,0.02);
        height: 100%;
    }
    .chart-title { font-weight: 800; margin-bottom: 25px; color: #1a1a1a; font-size: 1.25rem; text-align: center; }
    .chart-container-wrapper { position: relative; height: 320px; width: 100%; }

    /* TABLE */
    .custom-table th { background-color: var(--primary-green) !important; color: white; padding: 18px; border: none; font-weight: 700;}
    .custom-table td { padding: 18px; border-bottom: 1px solid #f0f0f0; vertical-align: middle; font-weight: 600; color: #555; }
    
    .section-underline { height: 5px; width: 60px; background-color: var(--primary-red); margin-top: 10px; border-radius: 5px; }
    
    /* SPACER GIỮA CÁC DỰ ÁN */
    .project-divider {
        height: 100px;
        background-image: url('data:image/svg+xml;utf8,<svg width="100" height="20" viewBox="0 0 100 20" xmlns="http://www.w3.org/2000/svg"><path d="M21.184 20c.357-.13.72-.264 1.088-.402l1.768-.661C33.64 15.347 39.647 14 50 14c10.271 0 15.362 1.222 24.629 4.928.955.383 1.869.74 2.75 1.072h6.225c-2.51-.73-5.139-1.691-8.233-2.928C65.888 13.278 60.562 12 50 12c-10.626 0-16.855 1.397-26.66 5.063l-1.767.662c-2.475.923-4.66 1.674-6.724 2.275h6.335zm0-20C13.258 2.892 8.077 4 0 4V2c5.744 0 9.951-.574 14.85-2h6.334zM77.38 0C85.239 2.966 90.502 4 100 4V2c-6.842 0-11.386-.542-16.396-2h-6.225zM0 14c8.44 0 13.718-1.21 22.272-4.402l1.768-.661C33.64 5.347 39.647 4 50 4c10.271 0 15.362 1.222 24.629 4.928C84.112 12.722 89.438 14 100 14v-2c-10.271 0-15.362-1.222-24.629-4.928C65.888 3.278 60.562 2 50 2 39.374 2 33.145 3.397 23.34 7.063l-1.767.662C13.223 10.84 8.163 12 0 12v2z" fill="%23cccccc" fill-opacity="0.2" fill-rule="evenodd"/></svg>');
        margin: 50px 0;
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

<!-- ======================= BẮT ĐẦU VÒNG LẶP HIỂN THỊ 3 DỰ ÁN ======================= -->
<?php 
    $counter = 0;
    foreach($all_projects as $key => $project): 
    $counter++;
    $percent_received = ($project['money_received'] / $project['money_target']) * 100;
?>

<div class="project-wrapper" id="project-<?php echo $key; ?>">
    <!-- HERO HEADER -->
    <header class="project-hero">
        <div class="container">
            <div class="project-status"><i class="fas fa-check-circle me-2"></i><?php echo $project['status']; ?></div>
            <h1 class="display-3 project-title"><?php echo $project['title']; ?></h1>
            <p class="project-desc"><?php echo $project['desc']; ?></p>
        </div>
    </header>

    <main class="container pb-5" style="margin-top: -60px; position: relative; z-index: 2;">
        <!-- SECTION A: TỔNG QUAN -->
        <div class="bg-white p-4 rounded-3 shadow-sm mb-5">
            <div class="mb-4">
                <h2 class="fw-bold" style="color: #2c3e50;">A. Tổng Quan Dự Án</h2>
                <div class="section-underline"></div>
            </div>
            
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="info-card">
                        <div class="info-label">Thời gian thực hiện</div>
                        <div class="info-value"><i class="far fa-clock text-success me-2"></i><?php echo $project['time']; ?></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card" style="border-left-color: var(--primary-red);">
                        <div class="info-label">Địa điểm</div>
                        <div class="info-value"><i class="fas fa-map-marker-alt text-danger me-2"></i><?php echo $project['location']; ?></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card" style="border-left-color: #f39c12;">
                        <div class="info-label">Mục tiêu ban đầu</div>
                        <div class="info-value"><i class="fas fa-bullseye text-warning me-2"></i><?php echo $project['goal_text']; ?></div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="money-card target">
                        <div class="small text-uppercase opacity-75 fw-bold">Mục tiêu kêu gọi</div>
                        <div class="money-amount"><?php echo number_format($project['money_target'], 0, ',', '.'); ?> đ</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="money-card received">
                        <div class="small text-uppercase opacity-75 fw-bold">Số tiền đã nhận</div>
                        <div class="money-amount"><?php echo number_format($project['money_received'], 0, ',', '.'); ?> đ</div>
                        <div class="progress mt-2" style="height: 4px; background: rgba(255,255,255,0.3);">
                            <div class="progress-bar bg-white" style="width: <?php echo min($percent_received, 100); ?>%"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="money-card spent">
                        <div class="small text-uppercase opacity-75 fw-bold">Số tiền đã chi</div>
                        <div class="money-amount"><?php echo number_format($project['money_spent'], 0, ',', '.'); ?> đ</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION B: KẾT QUẢ -->
        <div class="mb-5">
            <div class="mb-4">
                <h2 class="fw-bold" style="color: #2c3e50;">B. Kết Quả & Tác Động</h2>
                <div class="section-underline"></div>
            </div>
            
            <div class="row g-4">
                <?php foreach($project['impact'] as $item): ?>
                <div class="col-md-4">
                    <div class="impact-box">
                        <div class="impact-icon"><i class="fas <?php echo $item['icon']; ?>"></i></div>
                        <div class="display-4 fw-black text-success counter" data-target="<?php echo str_replace('.', '', $item['num']); ?>"><?php echo $item['num']; ?></div>
                        <div class="fw-bold text-secondary mt-2"><?php echo $item['text']; ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- SECTION C: BIỂU ĐỒ (DÙNG ID ĐỘNG KÈM $KEY) -->
        <div class="row g-4 mb-5">
            <div class="col-lg-7">
                <div class="chart-card">
                    <h4 class="chart-title">Biến động Thu/Chi</h4>
                    <div class="chart-container-wrapper">
                        <!-- ID canvas thay đổi theo từng dự án -->
                        <canvas id="barChart-<?php echo $key; ?>"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="chart-card">
                    <h4 class="chart-title">Phân bổ nguồn vốn</h4>
                    <div class="chart-container-wrapper d-flex justify-content-center align-items-center">
                        <canvas id="doughnutChart-<?php echo $key; ?>"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION D: DANH SÁCH -->
        <div class="bg-white p-4 rounded-3 shadow-sm">
            <div class="mb-4 text-center">
                <h2 class="fw-bold" style="color: #2c3e50;">C. Danh Sách Đóng Góp Tiêu Biểu</h2>
                <div class="section-underline mx-auto"></div>
            </div>
            
            <div class="table-responsive">
                <table class="table custom-table table-hover">
                    <thead>
                        <tr>
                            <th class="rounded-start">Ngày</th>
                            <th>Nhà hảo tâm</th>
                            <th class="text-end rounded-end">Số tiền (VNĐ)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($project['donors'] as $donor): ?>
                        <tr>
                            <td><?php echo $donor['date']; ?></td>
                            <td><?php echo $donor['name']; ?></td>
                            <td class="text-end text-danger"><?php echo $donor['amount']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
    <!-- Khoảng cách giữa các dự án -->
    <?php if($counter < count($all_projects)): ?>
        <div class="project-divider"></div>
    <?php endif; ?>

</div>
<?php endforeach; ?>
<!-- ======================= KẾT THÚC VÒNG LẶP ======================= -->

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
    document.addEventListener("DOMContentLoaded", function() {
        
        // --- 1. NHẬN DỮ LIỆU TỪ PHP ---
        // Chuyển toàn bộ mảng dữ liệu PHP sang biến Javascript object
        const allProjectsData = <?php echo json_encode($all_projects); ?>;

        // --- 2. VÒNG LẶP TẠO BIỂU ĐỒ CHO TỪNG DỰ ÁN ---
        Object.keys(allProjectsData).forEach(function(key) {
            const project = allProjectsData[key];

            // A. BIỂU ĐỒ CỘT (BAR CHART)
            const ctxBar = document.getElementById('barChart-' + key).getContext('2d');
            new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: ['Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                    datasets: [
                        {
                            label: 'Thu (triệu VND)',
                            data: project.bar_data_thu, // Lấy dữ liệu riêng của dự án
                            backgroundColor: '#008D42',
                            borderRadius: 6,
                            barPercentage: 0.6,
                            categoryPercentage: 0.8
                        },
                        {
                            label: 'Chi (triệu VND)',
                            data: project.bar_data_chi, // Lấy dữ liệu riêng của dự án
                            backgroundColor: '#E30613',
                            borderRadius: 6,
                            barPercentage: 0.6,
                            categoryPercentage: 0.8
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'top', labels: { usePointStyle: true, pointStyle: 'circle', font: { family: 'Montserrat', weight: '600' } } }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { borderDash: [5, 5], color: '#f0f0f0' },
                            ticks: { font: { family: 'Montserrat', size: 11 }, callback: function(value) { return value + ' tr'; } },
                            border: { display: false }
                        },
                        x: { grid: { display: false }, border: { display: false } }
                    }
                }
            });

            // B. BIỂU ĐỒ TRÒN (DONUT CHART)
            const ctxDoughnut = document.getElementById('doughnutChart-' + key).getContext('2d');
            new Chart(ctxDoughnut, {
                type: 'doughnut',
                data: {
                    labels: ['Giáo dục', 'Y tế', 'Cứu trợ'],
                    datasets: [{
                        data: project.donut_data, // Lấy dữ liệu riêng
                        backgroundColor: ['#008D42', '#E30613', '#F39C12'],
                        borderWidth: 0,
                        hoverOffset: 10
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '72%',
                    plugins: {
                        legend: { position: 'right', labels: { usePointStyle: true, pointStyle: 'circle', boxWidth: 8, padding: 20, font: { family: 'Montserrat', size: 13, weight: '600' } } }
                    }
                }
            });
        });

        // --- 3. HIỆU ỨNG SỐ CHẠY (COUNTER) ---
        // Phần này giữ nguyên, nó tự tìm tất cả class .counter trên trang
        const counters = document.querySelectorAll('.counter');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const rawTarget = counter.getAttribute('data-target');
                    if (!rawTarget) return;

                    const target = parseInt(rawTarget);
                    const duration = 2000;
                    const steps = 60;
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
        }, { threshold: 0.5 });
        
        counters.forEach(counter => { observer.observe(counter); });
    });
</script>

<?php wp_footer(); ?>
</body>
</html>