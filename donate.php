<?php
/*
Template Name: Donate Page - Art Final
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>    
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đóng góp - Little Rose Foundation</title>
    
    <!-- Bootstrap 5 & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">

    <style>
        :root { 
            --primary-green: #008D42; 
            --primary-red: #E30613; 
            --bg-warm: #FDFBFA;
        }   
        
        body { 
            font-family: 'Montserrat', sans-serif !important; 
            background-color: var(--bg-warm); 
            overflow-x: hidden; 
            font-weight: 500;
        }
        
        /* TYPOGRAPHY với Montserrat */
        h1, h2, h3, h4, h5, h6,
        .form-title,
        .bank-value,
        .btn-donate,
        .btn-submit,
        .nav-link,
        .lang-switch,
        .form-label,
        .form-control,
        .form-select,
        .form-check-label,
        .amount-btn,
        .copy-btn,
        .success-message h4,
        .quote-text,
        .table th,
        .table td {
            font-family: 'Montserrat', sans-serif !important;
        }
        
        /* Các font-weight cụ thể */
        h1, h2, h3, h4, .form-title { font-weight: 800 !important; }
        .btn-donate, .btn-submit, .nav-link, .lang-switch { font-weight: 700 !important; }
        .form-label, .bank-value, .table th { font-weight: 600 !important; }
        body, .form-control, .form-select, .table td { font-weight: 500 !important; }
        
        .btn-donate { 
            background-color: var(--primary-red) !important; 
            color: white !important; 
            border-radius: 50px !important; 
            padding: 10px 30px !important; 
            border: none !important; 
        }

        .lang-switch { 
            cursor: pointer; 
            color: #999; 
            padding-bottom: 2px; 
            text-decoration: none; 
        }
        .lang-switch.active { 
            color: var(--primary-green) !important; 
            border-bottom: 3px solid var(--primary-green) !important; 
        }

        /* --- LOADING TRÁI TIM CHUẨN NHÂN ÁI --- */
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

        .heart-pulse {
            position: relative;
            width: 60px;
            height: 60px;
            background-color: #B12029;
            transform: rotate(-45deg);
            animation: heartbeatPlushing 1.2s infinite ease-in-out;
            margin-top: 30px;
        }

        .heart-pulse::before,
        .heart-pulse::after {
            content: "";
            position: absolute;
            width: 60px;
            height: 60px;
            background-color: #B12029;
            border-radius: 50%;
        }

        .heart-pulse::before {
            top: -30px;
            left: 0;
        }

        .heart-pulse::after {
            top: 0;
            left: 30px;
        }

        @keyframes heartbeatPlushing {
            0% { 
                transform: scale(1) rotate(-45deg); 
                filter: drop-shadow(0 0 5px rgba(177, 32, 41, 0.2)); 
            }
            14% { 
                transform: scale(1.15) rotate(-45deg);
                filter: drop-shadow(0 0 20px rgba(177, 32, 41, 0.6)); 
            }
            28% { 
                transform: scale(1.05) rotate(-45deg); 
            }
            42% { 
                transform: scale(1.3) rotate(-45deg);
                filter: drop-shadow(0 0 40px rgba(177, 32, 41, 0.8)); 
            }
            70% { 
                transform: scale(1) rotate(-45deg); 
                filter: drop-shadow(0 0 5px rgba(177, 32, 41, 0.2));
            }
        }

        /* NAVIGATION */
        .nav-link { color: #1a1a1a !important; }
        .nav-link.active { color: var(--primary-green) !important; }

        /* DONATION CARD STYLES */
        .donation-card {
            background: white;
            border-radius: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
        }

        .quote-box {
            background: linear-gradient(135deg, var(--primary-green) 0%, #00a854 100%);
            color: white;
            padding: 2rem;
            border-radius: 20px;
            margin-bottom: 2rem;
        }

        .quote-text {
            font-size: 1.2rem;
            font-style: italic;
            line-height: 1.6;
            margin: 0;
        }

        .info-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #eee;
        }

        .bank-info-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #eee;
            transition: all 0.3s ease;
        }

        .bank-info-item:hover {
            background: #f8f9fa;
            transform: translateX(5px);
        }

        .bank-info-item:last-child {
            border-bottom: none;
        }

        .bank-icon {
            width: 50px;
            height: 50px;
            background: var(--primary-green);
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .bank-label {
            color: #666;
            display: block;
            margin-bottom: 5px;
            font-size: 0.9rem;
        }

        .bank-value {
            color: #333;
            font-size: 1.1rem;
        }

        .amount-text { 
            color: var(--primary-red); 
        }

        .divider {
            width: 100px;
            height: 3px;
            background: var(--primary-red);
            margin: 1rem auto;
        }

        /* FORM XÁC NHẬN ĐÓNG GÓP */
        .confirmation-form {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
        }

        .form-title {
            color: var(--primary-green);
            margin-bottom: 1.5rem;
            text-align: center;
            font-size: 1.8rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            color: #333;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .form-control, .form-select {
            padding: 0.75rem 1rem;
            border: 2px solid #dee2e6;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 0.25rem rgba(0, 141, 66, 0.25);
        }

        .btn-submit {
            background: var(--primary-red);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            border: none;
            width: 100%;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-submit:hover {
            background: #c00011;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(227, 6, 19, 0.3);
        }

        .btn-submit:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .form-check-input:checked {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }

        .form-check-label {
            color: #555;
        }

        .form-check-label a {
            color: var(--primary-green);
            text-decoration: none;
        }

        .form-check-label a:hover {
            text-decoration: underline;
        }

        /* QR Code Styling */
        .qr-container {
            padding: 1.5rem;
            border: 2px solid #eee;
            border-radius: 15px;
            display: inline-block;
            background: white;
            transition: all 0.3s ease;
        }

        .qr-container:hover {
            border-color: var(--primary-green);
            transform: scale(1.02);
        }

        .qr-code {
            width: 200px;
            height: 200px;
            object-fit: contain;
        }

        /* Success Message */
        .success-message {
            display: none;
            background: linear-gradient(135deg, #008D42 0%, #00a854 100%);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            margin-top: 2rem;
        }

        .success-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .bank-info-item {
                flex-direction: column;
                text-align: center;
            }
            
            .bank-icon {
                margin-right: 0;
                margin-bottom: 1rem;
            }
            
            .qr-code {
                width: 150px;
                height: 150px;
            }
            
            .confirmation-form {
                padding: 1.5rem;
            }
            
            .form-title {
                font-size: 1.5rem;
            }
        }

        /* COPY BUTTON */
        .copy-btn {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 5px 15px;
            font-size: 0.9rem;
            color: #666;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .copy-btn:hover {
            background: var(--primary-green);
            color: white;
            border-color: var(--primary-green);
        }

        .copy-btn.copied {
            background: var(--primary-green);
            color: white;
            border-color: var(--primary-green);
        }

        /* Amount Presets */
        .amount-presets {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 1rem;
        }

        .amount-btn {
            flex: 1;
            min-width: 100px;
            padding: 0.75rem;
            border: 2px solid #dee2e6;
            background: white;
            border-radius: 10px;
            color: #333;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .amount-btn:hover {
            border-color: var(--primary-green);
            color: var(--primary-green);
        }

        .amount-btn.active {
            background: var(--primary-green);
            color: white;
            border-color: var(--primary-green);
        }

        .custom-amount {
            position: relative;
        }

        .custom-amount .form-control {
            padding-left: 2.5rem;
        }

        .currency-symbol {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        /* THANK YOU MESSAGE */
        .thank-you-message {
            text-align: center;
            padding: 3rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin: 2rem auto;
            max-width: 800px;
        }

        .thank-you-icon {
            font-size: 4rem;
            color: var(--primary-green);
            margin-bottom: 1.5rem;
        }

        /* DONATIONS TABLE STYLING */
        .donations-table {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-top: 3rem;
        }

        .table-title {
            background: var(--primary-green) !important;
            color: #ffffff !important; /* Ép chữ màu trắng tinh */
            padding: 1.5rem;
            margin: 0;
            text-align: center;
            font-weight: 800 !important;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .table-responsive {
            max-height: 400px;
            overflow-y: auto;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f8f9fa;
            color: #1a1a1a !important;
            font-weight: 700 !important;
            border-bottom: 2px solid #dee2e6;
            text-align: center;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .donor-name {
            font-weight: 600;
            color: #333;
        }

        .donor-email {
            color: #666;
            font-size: 0.9rem;
        }

        .donation-amount {
            color: var(--primary-red);
            font-weight: 700;
        }

        .donation-date {
            color: #666;
            font-size: 0.9rem;
        }

        /* LOADING SPINNER */
        .spinner-border {
            width: 3rem;
            height: 3rem;
        }
        /* --- FIX LỖI TRÀN CHỮ VNĐ --- */
        .custom-amount {
            position: relative; /* Làm gốc cho chữ VNĐ bám vào */
            display: flex;
            align-items: center;
        }

        .currency-symbol {
            position: absolute;
            left: 15px; /* Khoảng cách từ lề trái */
            font-weight: 800;
            color: var(--primary-green);
            z-index: 5;
            pointer-events: none; /* Để người dùng click xuyên qua chữ vào ô nhập được */
        }

        #customAmount {
            padding-left: 65px !important; /* Đẩy chữ placeholder ra sau chữ VNĐ */
            height: 55px;
            border-radius: 12px;
            font-weight: 700;
            border: 2px solid #eee;
            transition: all 0.3s ease;
        }

        #customAmount:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 4px rgba(0, 141, 66, 0.1);
        }

        /* Ẩn mũi tên tăng giảm mặc định của input number cho đẹp */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        /* Tên người đóng góp sạch sẽ, không avatar */
        .donor-name-clean {
            font-weight: 700 !important;
            color: #333 !important;
            font-size: 1rem !important;
            white-space: nowrap !important; /* Tuyệt chiêu: Ép tên nằm trên 1 hàng duy nhất */
            display: inline-block !important;
        }

        /* Căn chỉnh lại bảng cho thoáng */
        .table td {
            padding: 18px 10px !important; /* Tăng độ cao hàng để nhìn sang hơn */
            vertical-align: middle !important;
        }

        /* Badge số tiền nhìn tinh tế hơn */
        .amount-badge {
            background: rgba(227, 6, 19, 0.05) !important;
            color: #E30613 !important;
            padding: 6px 16px !important;
            border-radius: 50px !important;
            font-weight: 800 !important;
            font-size: 1.05rem !important;
            border: 1px solid rgba(227, 6, 19, 0.1) !important;
            display: inline-block !important;
        }
        /* Hiệu ứng mờ dần và hiện lên cho thông báo thành công */
        .success-card {
            animation: fadeIn 0.8s ease forwards;
            text-align: center;
            padding: 20px 10px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Thẻ biên lai Startup ngay trong Form */
        .inner-receipt {
            background: #f8fdfa;
            border: 1px dashed #008D42;
            border-radius: 15px;
            padding: 20px;
            margin: 20px 0;
            text-align: left;
        }

        .receipt-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 0.95rem;
        }

        .receipt-item b { color: #333; }
        .receipt-item .amt { color: #E30613; font-weight: 800; }

        .heart-beat {
            font-size: 50px;
            color: #E30613;
            animation: beat 1.2s infinite;
            margin-bottom: 15px;
        }

        @keyframes beat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.15); }
        }

        /* Hiệu ứng cánh hoa hồng rơi cục bộ */
        .petal-local {
            position: fixed; top: -10%; z-index: 9999;
            pointer-events: none; user-select: none;
        }
       /* --- FIX DROPDOWN HOVER TRANG CHỦ --- */

        /* Hiển thị menu cấp 2 khi di chuột vào "Về chúng tôi" */
        .lrf-dropdown:hover > .dropdown-menu {
            display: block !important;
            margin-top: 0; /* Xóa khoảng trống để không bị mất hover khi di chuột xuống */
            visibility: visible;
            opacity: 1;
        }

        /* Hiển thị menu cấp 3 (Đội ngũ nhân sự) khi di chuột vào */
        .lrf-dropdown .dropend:hover > .dropdown-menu {
            display: block !important;
            position: absolute;
            left: 100%;
            top: 0;
            margin-left: 0;
            visibility: visible;
            opacity: 1;
        }

        /* Style cho các hộp menu dropdown */
        .lrf-dropdown .dropdown-menu {
            border-radius: 12px;
            padding: 10px 0;
            min-width: 250px;
            background: #ffffff;
            border: none !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
            animation: fadeInMenu 0.3s ease;
        }

        /* Căn chỉnh các item trong menu */
        .lrf-dropdown .dropdown-item {
            padding: 12px 20px;
            color: #333 !important;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.95rem;
            font-weight: 600 !important;
            border-bottom: 1px solid #f8f9fa;
            transition: all 0.2s ease;
        }

        .lrf-dropdown .dropdown-item:last-child {
            border-bottom: none;
        }

        .lrf-dropdown .dropdown-item:hover {
            background-color: #f1f8f4; /* Màu xanh lá cực nhẹ */
            color: var(--primary-green) !important;
            padding-left: 28px; /* Hiệu ứng nhích sang phải */
        }

        /* Đảm bảo mũi tên icon ở menu cấp 2 luôn nằm bên phải */
        .lrf-dropdown .dropend .fa-chevron-right {
            font-size: 0.75rem;
            color: #999;
        }

        /* Hiệu ứng xuất hiện */
        @keyframes fadeInMenu {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Đảm bảo Navbar luôn nằm trên cùng của Hero và Cánh hoa */
        nav.navbar {
            z-index: 2000 !important;
        }

        /* Fix lỗi trên mobile: không hover được thì dùng click */
        @media (max-width: 991px) {
            .lrf-dropdown .dropdown-menu { 
                position: static !important; 
                display: none; 
                box-shadow: none !important;
                border-left: 3px solid var(--primary-green) !important;
                margin-left: 15px;
            }
            .lrf-dropdown.show > .dropdown-menu { 
                display: block !important; 
            }
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

   <div id="preloader">
        <div class="heart-pulse"></div>
    </div>

    <!-- HEADER -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand" href="<?php echo home_url('/'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/img/LRF-02.png" height="70" alt="Little Rose Foundation">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
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
                    <!-- Báo cáo tài chính -->
                    <li class="nav-item"><a class="nav-link px-3" href="<?php echo home_url('/projects/'); ?>" data-vi="Chương trình" data-en="Programs">Chương trình</a></li>
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
                    <li class="nav-item"><a class="btn btn-donate ms-lg-4 shadow-sm" href="<?php echo home_url('/donate/'); ?>" data-vi="ĐÓNG GÓP" data-en="DONATE">ĐÓNG GÓP</a></li>
                    <li class="nav-item d-flex ms-lg-4">
                        <span class="lang-switch active" id="btn-vi" onclick="changeLang('vi')">VN</span>
                        <span class="mx-1">|</span>
                        <span class="lang-switch" id="btn-en" onclick="changeLang('en')">EN</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5 py-4">
        <!-- TIÊU ĐỀ VÀ CHÂM NGÔN -->
        <div class="text-center mb-5">
            <h1 class="fw-bold display-4 text-danger mb-3" data-vi="ĐÓNG GÓP" data-en="DONATE">ĐÓNG GÓP</h1>
            <div class="divider"></div>
            <div class="quote-box">
                <p class="quote-text" 
                   data-vi="Không có tình yêu, các hành vi, dù sáng chói nhất, cũng không đáng kể gì." 
                   data-en="Without love, actions, even the most brilliant, are insignificant.">
                    "Không có tình yêu, các hành vi, dù sáng chói nhất, cũng không đáng kể gì."
                </p>
            </div>
        </div>

        <!-- THÔNG TIN CHUYỂN KHOẢN -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <div class="info-card">
                    <h3 class="fw-bold text-center mb-4" data-vi="Thông tin chuyển khoản" data-en="Bank Transfer Information">
                        Thông tin chuyển khoản
                    </h3>
                    
                    <div class="row">
                        <!-- QR Code Section -->
                        <div class="col-md-5 text-center mb-4 mb-md-0">
                            <div class="qr-container">
                                <!-- Thay thế URL QR code bằng hình từ theme của bạn -->
                                <img src="<?php echo get_template_directory_uri(); ?>/img/donatelrf (1).png" 
                                     alt="QR Code Donation" 
                                     class="qr-code">
                            </div>
                            <p class="mt-3 text-muted" data-vi="Quét mã QR để chuyển khoản nhanh" data-en="Scan QR code for quick transfer">
                                Quét mã QR để chuyển khoản nhanh
                            </p>
                        </div>
                        
                        <!-- Bank Information Section -->
                        <div class="col-md-7">
                            <div class="bank-info">
                                <!-- Tài khoản thụ hưởng -->
                                <div class="bank-info-item">
                                    <div class="bank-icon">
                                        <i class="fas fa-user fa-lg"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="bank-label" data-vi="Tài khoản thụ hưởng" data-en="Beneficiary Account">
                                            Tài khoản thụ hưởng
                                        </span>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bank-value">Quỹ Từ Thiện Bông Hồng Nhỏ</span>
                                            <button class="copy-btn" onclick="copyToClipboard('Quỹ Từ Thiện Bông Hồng Nhỏ', this)">
                                                <i class="far fa-copy"></i> Copy
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Số tài khoản -->
                                <div class="bank-info-item">
                                    <div class="bank-icon">
                                        <i class="fas fa-credit-card fa-lg"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="bank-label">STK</span>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bank-value">060289990456</span>
                                            <button class="copy-btn" onclick="copyToClipboard('060289990456', this)">
                                                <i class="far fa-copy"></i> Copy
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Ngân hàng -->
                                <div class="bank-info-item">
                                    <div class="bank-icon">
                                        <i class="fas fa-university fa-lg"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="bank-label" data-vi="Ngân hàng thụ hưởng" data-en="Beneficiary Bank">
                                            Ngân hàng thụ hưởng
                                        </span>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bank-value">Ngân hàng Sacombank - Chi nhánh: Tân Định</span>
                                            <button class="copy-btn" onclick="copyToClipboard('Ngân hàng Sacombank - Chi nhánh: Tân Định', this)">
                                                <i class="far fa-copy"></i> Copy
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Nội dung chuyển khoản -->
                                <div class="bank-info-item">
                                    <div class="bank-icon">
                                        <i class="fas fa-comment-dollar fa-lg"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="bank-label" data-vi="Nội dung chuyển khoản" data-en="Transfer Content">
                                            Nội dung chuyển khoản
                                        </span>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bank-value">Tên cá nhân đóng góp</span>
                                            <button class="copy-btn" onclick="copyToClipboard('Tên cá nhân đóng góp', this)">
                                                <i class="far fa-copy"></i> Copy
                                            </button>
                                        </div>
                                        <small class="text-muted" data-vi="(Vui lòng ghi rõ tên của bạn)" data-en="(Please include your name)">
                                            (Vui lòng ghi rõ tên của bạn)
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- FORM XÁC NHẬN ĐÓNG GÓP -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="confirmation-form">
                    <h3 class="form-title" data-vi="XÁC NHẬN ĐÓNG GÓP" data-en="DONATION CONFIRMATION">
                        XÁC NHẬN ĐÓNG GÓP
                    </h3>
                    
                    <!-- Form sẽ gửi đến process_donate.php -->
                    <form id="donationForm">
                        <!-- Lựa chọn chương trình -->
                        <div class="form-group">
                            <label for="program_name" class="form-label" data-vi="Chương trình đóng góp *" data-en="Target Program *">
                                Chương trình đóng góp *
                            </label>
                            <select class="form-select" id="program_name" name="program_name" required>
                                <option value="" data-vi="-- Chọn chương trình --" data-en="-- Select a program --">-- Chọn chương trình --</option>
                                <option value="Hỗ trợ người yếu thế" data-vi="Hỗ trợ người yếu thế" data-en="Supporting the Vulnerable">Hỗ trợ người yếu thế</option>
                                <option value="Học bổng Bông Hồng Nhỏ" data-vi="Học bổng Bông Hồng Nhỏ" data-en="Little Roses Scholarship">Học bổng Bông Hồng Nhỏ</option>
                                <option value="Sức khỏe học đường" data-vi="Sức khỏe học đường" data-en="School Health">Sức khỏe học đường</option>
                                <option value="Phòng ngừa bệnh tật" data-vi="Phòng ngừa bệnh tật" data-en="Disease Prevention">Phòng ngừa bệnh tật</option>
                                <option value="Quỹ chung" data-vi="Đóng góp vào quỹ chung" data-en="General Fund">Đóng góp vào quỹ chung</option>
                            </select>
                        </div>
                        <!-- Họ và tên -->
                        <div class="form-group">
                            <label for="fullname" class="form-label" data-vi="Họ và tên *" data-en="Full Name *">
                                Họ và tên *
                            </label>
                            <input type="text" class="form-control" id="fullname" name="fullname" required 
                                   placeholder="Nguyễn Văn A" 
                                   data-vi-placeholder="Nguyễn Văn A" 
                                   data-en-placeholder="John Doe">
                        </div>
                        
                        <!-- Email -->
                        <div class="form-group">
                            <label for="email" class="form-label" data-vi="Email *" data-en="Email *">
                                Email *
                            </label>
                            <input type="email" class="form-control" id="email" name="email" required 
                                   placeholder="nguyenvana@example.com" 
                                   data-vi-placeholder="nguyenvana@example.com" 
                                   data-en-placeholder="john@example.com">
                        </div>
                        
                        <!-- Số điện thoại -->
                        <div class="form-group">
                            <label for="phone" class="form-label" data-vi="Số điện thoại" data-en="Phone Number">
                                Số điện thoại
                            </label>
                            <input type="tel" class="form-control" id="phone" name="phone" 
                                   placeholder="0901234567" 
                                   data-vi-placeholder="0901234567" 
                                   data-en-placeholder="0901234567">
                        </div>
                        
                        <!-- Số tiền đóng góp -->
                        <div class="form-group">
                            <label class="form-label" data-vi="Số tiền đóng góp *" data-en="Donation Amount *">
                                Số tiền đóng góp *
                            </label>
                            
                            <!-- Lựa chọn nhanh -->
                            <div class="amount-presets">
                                <button type="button" class="amount-btn" data-amount="100000">
                                    100,000 VNĐ
                                </button>
                                <button type="button" class="amount-btn" data-amount="500000">
                                    500,000 VNĐ
                                </button>
                                <button type="button" class="amount-btn" data-amount="1000000">
                                    1,000,000 VNĐ
                                </button>
                                <button type="button" class="amount-btn" data-amount="5000000">
                                    5,000,000 VNĐ
                                </button>
                            </div>
                            
                            <!-- Nhập số tiền tùy chỉnh -->
                            <div class="custom-amount">
                                <span class="currency-symbol">VNĐ</span>
                                <input type="number" class="form-control" id="customAmount" name="amount"
                                       placeholder="Nhập số tiền khác" 
                                       min="10000" step="10000"
                                       data-vi-placeholder="Nhập số tiền khác" 
                                       data-en-placeholder="Enter other amount">
                            </div>
                            <input type="hidden" id="donationAmount" name="donationAmount" required>
                        </div>
                        
                        <!-- Tin nhắn (tùy chọn) -->
                        <div class="form-group">
                            <label for="message" class="form-label" data-vi="Lời nhắn (tùy chọn)" data-en="Message (optional)">
                                Lời nhắn (tùy chọn)
                            </label>
                            <textarea class="form-control" id="message" name="message" rows="3" 
                                      placeholder="Gửi lời chúc đến các em nhỏ..." 
                                      data-vi-placeholder="Gửi lời chúc đến các em nhỏ..." 
                                      data-en-placeholder="Send wishes to the children..."></textarea>
                        </div>
                        
                        <!-- Checkbox xác nhận -->
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="termsCheck" required>
                                <label class="form-check-label" for="termsCheck">
                                    <span data-vi="Tôi xác nhận đã thực hiện chuyển khoản và thông tin trên là chính xác." 
                                          data-en="I confirm that I have made the transfer and the information above is accurate.">
                                        Tôi xác nhận đã thực hiện chuyển khoản và thông tin trên là chính xác.
                                    </span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Nút gửi -->
                        <button type="submit" class="btn-submit" id="submitBtn" 
                                data-vi="XÁC NHẬN ĐÓNG GÓP" 
                                data-en="CONFIRM DONATION">
                            XÁC NHẬN ĐÓNG GÓP
                        </button>
                    </form>
                    
                    
        </div>       
    </main>

    <footer class="bg-dark text-white pt-5 pb-4 mt-5">
        <div class="container text-center">
            <p class="text-center small text-secondary">
                © <?php echo date("Y"); ?> Little Rose Foundation - Developed by Petal Three
            </p>
        </div>
    </footer>

    <script>
    // --- 1. CÁC HÀM TRỢ GIÚP (Helper Functions) ---
    function formatCurrency(amount) {
        return new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0
        }).format(amount);
    }

    function formatDate(dateString) {
        if (!dateString) return '';
        const date = new Date(dateString);
        return date.toLocaleDateString('vi-VN', {
            day: '2-digit', month: '2-digit', year: 'numeric'
        });
    }

    // --- 2. LOGIC NGÔN NGỮ (Giữ nguyên của bạn) ---
    function changeLang(lang) {
        document.querySelectorAll('[data-vi]').forEach(el => {
            const text = el.getAttribute('data-' + lang);
            if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
                const placeholder = el.getAttribute('data-' + lang + '-placeholder');
                if (placeholder) el.placeholder = placeholder;
            } else {
                el.innerText = text;
            }
        });
        document.getElementById('btn-vi').classList.toggle('active', lang === 'vi');
        document.getElementById('btn-en').classList.toggle('active', lang === 'en');
    }

    // --- 3. TẢI DANH SÁCH (Cập nhật giao diện Đẹp) ---
    function loadDonations() {
    const tableBody = document.getElementById('donationsTableBody');
    if (!tableBody) return;

    // Thêm timestamp (&t=...) để chống lưu cache, giúp hiện tên mới ngay lập tức
    fetch('<?php echo admin_url('admin-ajax.php'); ?>?action=get_donations&t=' + Date.now())
        .then(r => r.json())
        .then(data => {
            let html = '';
            if (data && data.length > 0) {
                data.forEach(d => {
                    html += `
                        <tr>
                            <td class="text-start ps-4">
                                <span class="donor-name-clean">${d.fullname}</span>
                            </td>
                            <td>
                                <span class="amount-badge">${formatCurrency(d.amount)}</span>
                            </td>
                            <td class="text-muted small">
                                <i class="far fa-calendar-alt me-1"></i> ${formatDate(d.created_at)}
                            </td>
                        </tr>`;
                });
            } else {
                html = '<tr><td colspan="3" class="text-center py-4">Chưa có dữ liệu đóng góp. 🌹</td></tr>';
            }
            tableBody.innerHTML = html;
        })
        .catch(err => console.error("Lỗi tải bảng:", err));
}

    // --- 4. XỬ LÝ COPY & CHỌN TIỀN ---
    function copyToClipboard(text, button) {
        navigator.clipboard.writeText(text).then(() => {
            const original = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check"></i> Copied!';
            button.classList.add('copied');
            setTimeout(() => { button.innerHTML = original; button.classList.remove('copied'); }, 2000);
        });
    }

    // Chọn số tiền nhanh
    document.querySelectorAll('.amount-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.amount-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const amount = this.getAttribute('data-amount');
            document.getElementById('donationAmount').value = amount;
            document.getElementById('customAmount').value = amount;
        });
    });

    // Tự gõ số tiền (Đồng bộ với hidden input)
    const customInput = document.getElementById('customAmount');
    if(customInput) {
        customInput.addEventListener('input', function() {
            document.querySelectorAll('.amount-btn').forEach(b => b.classList.remove('active'));
            document.getElementById('donationAmount').value = this.value;
        });
    }

    // --- 5. GỬI FORM (Giữ logic Bắt bệnh Firewall của bạn) ---
    document.getElementById('donationForm').onsubmit = function(e) {
        e.preventDefault();
        const btn = document.getElementById('submitBtn'), loader = document.getElementById('loadingSpinner');
        const fd = new FormData(this);
        fd.append('action', 'save_donation');

        btn.style.display = 'none'; 
        if(loader) loader.style.display = 'block';

        fetch('<?php echo admin_url('admin-ajax.php'); ?>', { method: 'POST', body: fd })
            .then(r => r.json())
            .then(res => {
                if(res.success) {
                    // 1. Lấy dữ liệu để hiển thị
                    const name = fd.get('fullname');
                    const amount = formatCurrency(fd.get('amount'));
                    const email = fd.get('email');
                    const code = res.data.code || 'LRF-SUCCESS';

                    // 2. PHẦN QUAN TRỌNG: Thay thế toàn bộ nội dung Form bằng thẻ Cảm ơn
                    const formContainer = document.querySelector('.confirmation-form');
                    formContainer.innerHTML = `
                        <div class="success-card">
                            <div class="heart-beat"><i class="fas fa-heart"></i></div>
                            <h3 class="fw-bold text-success">TRÂN TRỌNG CẢM ƠN</h3>
                            <p class="greeting">Chào <b>${name}</b>!</p>
                            <p>Đóng góp của bạn đã mang đến hy vọng cho những mảnh đời yếu thế.</p>
                            
                            <div class="inner-receipt">
                                <div class="receipt-item"><span>Mã giao dịch:</span> <b>#${code}</b></div>
                                <div class="receipt-item"><span>Số tiền ủng hộ:</span> <span class="amt">${amount}</span></div>
                                <div class="receipt-item"><span>Email xác nhận:</span> <b>${email}</b></div>
                            </div>

                            <p class="small text-muted italic">"Một đóa hồng nhỏ đã nở vì tấm lòng nhân ái của bạn."</p>
                            <button class="btn btn-outline-success mt-3 px-5" style="border-radius:50px" onclick="location.reload()">Tiếp tục lan tỏa</button>
                        </div>
                    `;

                    // 3. Kích hoạt hiệu ứng hoa rơi (Giống trang chủ)
                    startFallingPetals();
                    
                    // 4. Load lại bảng danh sách ở dưới
                    loadDonations();
                } else {
                    alert("Lỗi: " + res.data.message);
                    btn.style.display = 'block'; if(loader) loader.style.display = 'none';
                }
            });
    };

    // Hàm tạo hoa rơi khi thành công
    function startFallingPetals() {
        const petalInterval = setInterval(() => {
            const petal = document.createElement('div');
            const flowers = ['🌸', '🌹', '🍃'];
            petal.innerHTML = flowers[Math.floor(Math.random() * flowers.length)];
            petal.className = 'petal-local';
            petal.style.left = Math.random() * 100 + 'vw';
            petal.style.fontSize = Math.random() * 20 + 10 + 'px';
            petal.style.animation = `fall ${Math.random() * 3 + 2}s linear forwards`;
            document.body.appendChild(petal);
            setTimeout(() => petal.remove(), 5000);
        }, 300);

        // Dừng hoa rơi sau 10 giây để đỡ tốn ram máy khách
        setTimeout(() => clearInterval(petalInterval), 10000);
    }

    // --- 6. KHỞI TẠO (Preloader & Load bảng) ---
    window.addEventListener('load', () => {
        // Tự động chọn dự án nếu có ?program=... trên link
        const urlParams = new URLSearchParams(window.location.search);
        const programFromUrl = urlParams.get('program');
        if (programFromUrl) {
            const selectProgram = document.getElementById('program_name');
            if (selectProgram) {
                // Tìm option có value hoặc text khớp với programFromUrl
                for(let i=0; i < selectProgram.options.length; i++) {
                    if(selectProgram.options[i].value === programFromUrl) {
                        selectProgram.selectedIndex = i;
                        break;
                    }
                }
            }
        }
        const pre = document.getElementById('preloader');
        if(pre) {
            pre.style.opacity = '0';
            setTimeout(() => { pre.style.display = 'none'; }, 800);
        }
        changeLang('vi'); // Mặc định tiếng Việt
        loadDonations();  // Chạy tải bảng ngay lập tức
    });
</script>
    
    <?php wp_footer(); ?>
</body>
</html>