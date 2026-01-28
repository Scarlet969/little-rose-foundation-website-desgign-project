<?php
/*
Template Name: Project  Art - All In One
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Về chúng tôi - Little Rose Foundation</title>
    
    <!-- 1. Thư viện chuẩn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
         /* --- KHAI BÁO FONT GOTHAM (Bạn cần có file font trong thư mục theme) --- */
        @font-face {
            font-family: 'Gotham';
            src: url('<?php echo get_template_directory_uri(); ?>/fonts/Gotham-Book.woff2') format('woff2');
            font-weight: 400;
            font-style: normal;
        }
        @font-face {
            font-family: 'Gotham';
            src: url('<?php echo get_template_directory_uri(); ?>/fonts/Gotham-Bold.woff2') format('woff2');
            font-weight: 700;
            font-style: normal;
        }
        @font-face {
            font-family: 'Gotham';
            src: url('<?php echo get_template_directory_uri(); ?>/fonts/Gotham-Black.woff2') format('woff2');
            font-weight: 800;
            font-style: normal;
        }

        :root { 
            --primary-green: #008D42; 
            --primary-red: #E30613; 
            --bg-warm: #FDFBFA;
            --font-gotham: 'Gotham', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }   
        
        /* --- CẬP NHẬT FONT CHỮ GOTHAM TOÀN BỘ --- */
        body { 
            font-family: var(--font-gotham) !important; 
            background-color: var(--bg-warm); 
            overflow-x: hidden; 
        }
        
        /* Nút Đóng góp hình viên thuốc */
        .btn-donate { 
            background-color: var(--primary-red) !important; 
            color: white !important; 
            font-weight: 800 !important; 
            border-radius: 50px !important; 
            padding: 10px 30px !important; 
            border: none !important; 
            font-family: var(--font-gotham) !important;
        }

        /* Gạch chân ngôn ngữ chuẩn Art */
        .lang-switch { 
            font-family: var(--font-gotham) !important;
            font-weight: 800 !important; 
            cursor: pointer; 
            color: #999; 
            padding-bottom: 2px; 
            text-decoration: none; 
        }
        /* CSS bổ sung để đảm bảo hiển thị "đều" và "đẹp" ngay lập tức */
       .hero-custom {
    height: 85vh; /* Độ cao của khu vực banner */
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: relative;
    overflow: hidden;

    /* CÁCH THÊM ẢNH NỀN */
    /* 1. Chúng ta dùng linear-gradient để tạo một lớp phủ đen mờ (0.5) giúp chữ trắng nổi bật lên */
   
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                url('img/background.jpg') no-repeat center center;
    
    background-size: cover; /* Để ảnh luôn lấp đầy khung hình */
    background-attachment: fixed; /* Tạo hiệu ứng cuộn ảnh nhẹ (Parallax) nếu muốn sang trọng */
}
        .hero-content h1 {
            font-family: var(--font-gotham) !important;
            font-size: 4.5rem;
            line-height: 1.1;
            margin-bottom: 2rem;
        }
        .hero-btns {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .btn-outline-white {
            border: 2px solid white;
            color: white;
            padding: 12px 35px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s;
        }
        .btn-outline-white:hover {
            background: white;
            color: #E30613;
        }
        .section-padding { padding: 100px 0; }
        .stat-card {
            padding: 40px;
            border: 1px solid #eee;
            transition: all 0.4s ease;
            background: white;
            height: 100%;
        }
        /* 2. LOADING ĐỒNG BỘ */
        /* --- 1. LOADING TRÁI TIM NHÂN ÁI (THAY THẾ TOÀN BỘ CODE CŨ) --- */
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



        /* Cập nhật font cho các thẻ chữ khác */
        p, span, a, label, input, select, .stat-card h3, .stat-card p {
            font-family: var(--font-gotham) !important;
        }
        section.bg-white.border-top.border-bottom h2.display-5 {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 800 !important; /* Độ đậm chuẩn Gotham Black */
            line-height: 1.2 !important;
            letter-spacing: -1px !important;
            text-transform: none !important;
            color: #212529 !important;
        }

        /* 2. Ép font cho chữ "sự minh bạch" màu xanh */
        section.bg-white.border-top.border-bottom h2.display-5 span.text-success {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 800 !important;
            color: #008D42 !important; /* Màu xanh thương hiệu */
        }   

        /* 3. Ép font cho các con số (90%, 15.000, 100%) */
        .stat-card h3 {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 900 !important; /* Cực đậm cho con số */
            letter-spacing: -1.5px !important;
        }

        /* 4. Ép font cho các dòng chữ mô tả nhỏ */
        .stat-card p, .stat-card small, .text-muted {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 600 !important;
        }

        /* 5. LOẠI BỎ font có chân nếu nó vẫn còn dính */
        .display-5, .fw-bold {
            font-family: 'Montserrat', sans-serif !important;
        }
        .project-card h4, 
        .project-card h5, 
        .project-item h4, 
        .project-item h5,
        .bg-white h5.fw-bold {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 800 !important; /* Độ đậm chuẩn Gotham Black */
            color: #212529 !important;
            letter-spacing: -0.5px !important;
            line-height: 1.4 !important;
            text-transform: none !important; /* Giữ chữ hoa/thường tự nhiên */
        }

        /* ÉP FONT CHO ĐOẠN MÔ TẢ BÊN DƯỚI (Hợp tác triển khai...) */
        .project-card p, 
        .project-desc, 
        .text-muted {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 500 !important; /* Độ đậm vừa phải cho nội dung */
            color: #495057 !important;
            line-height: 1.6 !important;
        }

        /* Sửa khoảng cách để nhìn chuyên nghiệp hơn */
        .project-card {
            border-radius: 20px !important;
            overflow: hidden;
        }

        .project-card .card-body {
            padding: 1.5rem !important;
        }

        /* 3. MENU & NÚT (Đúng chuẩn Art) */
        .nav-link { font-weight: 800 !important; color: #1a1a1a !important; transition: 0.3s; }
        .nav-link:hover, .nav-link.active { color: var(--primary-green) !important; }
        .btn-donate { background-color: var(--primary-red) !important; color: white !important; font-weight: 800 !important; border-radius: 50px !important; padding: 10px 30px !important; border: none !important; transition: 0.3s; }
        .btn-donate:hover { transform: scale(1.05); background-color: #b30510 !important; }

        .lang-switch { font-weight: 800 !important; cursor: pointer; color: #999; padding-bottom: 2px; transition: 0.3s; text-decoration: none; }
        .lang-switch.active { color: var(--primary-green) !important; border-bottom: 2px solid var(--primary-green); }

        /* 4. BỘ LỌC (FILTER) */
        .filter-btn { border-radius: 50px; padding: 8px 25px; font-weight: 700; border: 1px solid #ddd; background: white; transition: 0.3s; margin: 5px; }
        .filter-btn.active { background: var(--primary-green); color: white; border-color: var(--primary-green); box-shadow: 0 4px 15px rgba(0, 141, 66, 0.2); }

        /* 5. PROJECT CARDS & BADGE (Giống ảnh mẫu 100%) */
        .project-item { transition: all 0.5s ease; }
        .project-card { border: none; border-radius: 25px; overflow: hidden; transition: 0.4s; background: white; box-shadow: 0 10px 30px rgba(0,0,0,0.03); }
        .project-card:hover { transform: translateY(-12px); box-shadow: 0 20px 40px rgba(0,0,0,0.08) !important; }
        
        .project-img-container { position: relative; height: 320px; overflow: hidden; background: #eee; }
        .project-img-container img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
        .project-card:hover .project-img-container img { transform: scale(1.1); }
        
        .category-badge-apple {
            position: absolute; top: 20px; right: 20px; background-color: white; 
            color: var(--primary-green); padding: 6px 20px; border-radius: 50px; 
            font-size: 0.85rem; font-weight: 800; box-shadow: 0 4px 10px rgba(0,0,0,0.1); z-index: 2;
        }

        .progress { height: 8px; border-radius: 50px; background-color: #eee; }
        .progress-bar { background-color: var(--primary-red); }

        /* FOOTER SOCIAL LINKS */
        .social-list { 
            list-style: none; 
            padding: 0; 
        }
        
        .social-link-item {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #adb5bd;
            font-size: 1rem;
            font-weight: 500;
            margin-bottom: 12px;
            transition: all 0.3s ease;
        }
        
        .social-icon-box {
            width: 35px;
            text-align: center;
            font-size: 1.2rem;
            margin-right: 10px;
            transition: all 0.3s ease;
        }
        
        .social-link-item:hover {
            color: white;
            transform: translateX(5px);
        }
        
        .social-link-item:hover .fa-globe { color: var(--primary-green); }
        .social-link-item:hover .fa-facebook { color: #1877F2; }
        .social-link-item:hover .fa-tiktok { color: #ff0050; }
        .social-link-item:hover .fa-instagram { color: #E4405F; }

        .project-card h4, 
        .project-item h4, 
        #project-list h4 {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 800 !important; /* Độ đậm chuẩn Gotham Black */
            color: #212529 !important;
            letter-spacing: -0.5px !important;
            text-transform: none !important;
        }

        /* 2. ÉP FONT CHO NHÃN GÓC ẢNH (Xã hội, Giáo dục, Y tế) */
        .category-badge-apple, 
        [data-vi="Xã hội"], 
        [data-vi="Giáo dục"], 
        [data-vi="Y tế"] {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 700 !important;
            color: #008D42 !important; /* Màu xanh chuẩn */
        }

        /* 3. ÉP FONT CHO ĐOẠN MÔ TẢ (Trợ giúp vốn, Trao tặng cơ hội...) */
        .project-card p, 
        .project-desc {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 500 !important; /* Độ đậm vừa phải cho dễ đọc */
            color: #495057 !important;
            line-height: 1.6 !important;
        }

        /* 4. ÉP FONT CHO PHẦN THÔNG SỐ (25%, Goal: 1 tỷ) */
        .progress-bar + div, 
        .text-muted, 
        .text-danger, 
        span[data-vi*="Mục tiêu"] {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 700 !important; /* Đậm để nổi bật số liệu */
        }

        /* 5. NÚT ỦNG HỘ NGAY */
        .btn-donate {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 800 !important;
            letter-spacing: 0.5px !important;
        }
        .filter-btn {
    color: black !important;
    background: transparent;
    border: none;
    padding: 8px 20px;
    margin: 0 5px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    border-radius: 5px;
}

.filter-btn.active {
    background-color: #008D42; /* Màu nền xanh khi active */
    color: white !important; /* Chữ trắng khi active */
}

.filter-btn:hover {
    background-color: #f0f0f0;
}
        /* Tổng thể khối tiêu đề và lọc */
    .lrf-filter-container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 50px;
        gap: 20px;
    }

    /* Tiêu đề 2 dòng */
    .lrf-main-title {
        color: #B12029 !important;
        font-family: 'Montserrat', sans-serif !important;
        font-weight: 800 !important;
        line-height: 1.2 !important;
        margin: 0 !important;
        font-size: 2.8rem !important;
    }

    /* Khối chứa các nút bấm */
    .lrf-filter-group {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    /* Nút bấm kiểu viên thuốc (Pill button) */
    .btn-lrf-pill {
        border: 2px solid #008D42 !important;
        background-color: transparent !important;
        color: #008D42 !important;
        font-weight: 700 !important;
        padding: 8px 24px !important;
        border-radius: 50px !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
        font-family: 'Montserrat', sans-serif !important;
        font-size: 1rem !important;
        text-decoration: none !important;
        display: inline-block !important;
        outline: none !important;
    }

    /* Hiệu ứng khi di chuột vào */
    .btn-lrf-pill:hover {
        background-color: #f0fdf4 !important; /* Xanh lá cực nhẹ */
        transform: translateY(-2px);
    }

    /* Trạng thái khi đang được chọn (Active) */
    .btn-lrf-pill.active {
        background-color: #008D42 !important;
        color: #ffffff !important;
        box-shadow: 0 4px 12px rgba(0, 141, 66, 0.3) !important;
    }

    /* Responsive cho điện thoại */
    @media (max-width: 768px) {
        .lrf-filter-container {
            flex-direction: column;
            align-items: flex-start;
        }
        .lrf-main-title { font-size: 2rem !important; }
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
        /* --- THIẾT KẾ CARD DỰ ÁN CHUẨN ART --- */
        .project-card {
            display: flex;
            flex-direction: column;
            border: none;
            border-radius: 20px !important;
            background: #fff;
            transition: all 0.4s ease;
        }

        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
        }

        .project-card .card-body {
            display: flex;
            flex-direction: column;
            flex-grow: 1; /* Đảm bảo body chiếm hết không gian còn lại */
            padding: 1.5rem !important;
        }

        /* Câu chuyện ngắn - Ép 3 dòng để các card luôn đều nhau */
        .project-story {
            font-family: 'Montserrat', sans-serif !important;
            font-size: 0.9rem;
            line-height: 1.6;
            color: #555;
            font-style: italic;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 4.8em; /* Độ cao cố định cho 3 dòng */
        }

        /* Thanh tiến trình */
        .custom-progress-wrap { margin-bottom: 15px; }
        .custom-progress-bar { transition: width 1s ease-in-out; }

              
       
        
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!-- MÀN HÌNH LOADING -->
   <div id="preloader">
    <!-- Trái tim thuần CSS đã vẽ ở trên -->
    <div class="heart-pulse"></div>
</div>

    <!-- HEADER - ĐÃ SỬA LINK CHUẨN WORDPRESS -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand" href="<?php echo home_url('/'); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/img/LRF-02.png" alt="Logo" height="70">
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto fw-bold align-items-center">
                <!-- Trang chủ -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_front_page() ? 'active text-success' : ''; ?> px-3 fw-bold" 
                           href="<?php echo home_url('/'); ?>" data-vi="Trang chủ" data-en="Home">Trang chủ</a>
                    </li>
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
                    <!-- Chương trình -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_page('projects') ? 'active text-success' : ''; ?> px-3 fw-bold" 
                           href="<?php echo home_url('/projects/'); ?>" data-vi="Chương trình" data-en="Programs">Chương trình</a>
                    </li>
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
                    <!-- Tin tức -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_page('news') ? 'active text-success' : ''; ?> px-3 fw-bold" 
                           href="<?php echo home_url('/news/'); ?>" data-vi="Tin tức" data-en="News">Tin tức</a>
                    </li>
                    <!-- Nút Đóng góp - ĐÃ FIX -->
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-donate px-4 py-2 shadow-sm" 
                           href="<?php echo home_url('/donate/'); ?>" data-vi="ĐÓNG GÓP" data-en="DONATE">
                            ĐÓNG GÓP
                        </a>
                    </li>
                
                <!-- Chuyển ngôn ngữ -->
                <li class="nav-item d-flex ms-lg-4 fw-bold">
                    <span class="lang-switch active fw-bold" id="btn-vi" onclick="changeLang('vi')" style="cursor:pointer">VN</span>
                    <span class="mx-1 text-muted">|</span>
                    <span class="lang-switch fw-bold" id="btn-en" onclick="changeLang('en')" style="cursor:pointer">EN</span>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <main id="content" class="bg-light">
    <div class="container my-5 py-5">
        <!-- Tiêu đề và Bộ lọc (Filter) -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-5">
    <h2 class="fw-bold display-5 mb-3 mb-md-0" style="color: #B12029; font-family: 'Montserrat', sans-serif;">
        Các Chương Trình <br>& Dự Án
    </h2>
    
    <div id="project-filters" class="d-flex gap-2 flex-wrap">
        <button class="btn btn-filter-lrf active" data-filter="all" data-vi="Tất cả" data-en="All">Tất cả</button>
        <button class="btn btn-filter-lrf" data-filter="edu" data-vi="Giáo dục" data-en="Education">Giáo dục</button>
        <button class="btn btn-filter-lrf" data-filter="health" data-vi="Y tế" data-en="Health">Y tế</button>
        <button class="btn btn-filter-lrf" data-filter="social" data-vi="Xã hội" data-en="Social">Xã hội</button>
    </div>
</div>

        <!-- DANH SÁCH DỰ ÁN -->
        <div class="row g-4" id="project-list">
    <!-- DỰ ÁN 1: XÃ HỘI -->
    <div class="col-lg-4 col-md-6 project-item" data-category="social">
        <div class="project-card h-100 shadow-sm border-0">
            <div class="project-img-container" style="height: 240px;">
                <img src="https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2025/12/xahoi1.jpg" class="w-100 h-100">
                <span class="category-badge-apple" data-vi="Xã hội" data-en="Social">Xã hội</span>
            </div>
            <div class="card-body">
                <h4 class="text-center mb-3" data-vi="Hỗ trợ người yếu thế" data-en="Supporting the Vulnerable">Hỗ trợ người yếu thế</h4>
                <p class="project-story text-center" data-vi="“Nhờ chiếc xe nước mía của quỹ, tôi đã có thể tự nuôi bản thân và lo cho đứa cháu đi học” - Bà Sáu chia sẻ đầy xúc động." data-en="“Thanks to the fund's support, I can now support myself and my grandchild's education.”">“Nhờ chiếc xe nước mía của quỹ, tôi đã có thể tự nuôi bản thân và lo cho đứa cháu đi học” - Bà Sáu chia sẻ đầy xúc động.</p>
                
                <div class="custom-progress-wrap">
                    <div class="custom-progress" style="height: 6px; background: #eee; border-radius: 10px;">
                        <div class="custom-progress-bar" style="width: 25%; height: 100%; background: var(--primary-red); border-radius: 10px;"></div>
                    </div>
                    <div class="d-flex justify-content-between small fw-bold mt-2">
                        <span class="text-danger">25%</span>
                        <span class="text-muted">Goal: 1 tỷ</span>
                    </div>
                </div>

                <div class="project-actions">
                    <a href="<?php echo home_url('/bao-cao/dang-trien-khai'); ?>" class="btn-report-link" data-vi="XEM BÁO CÁO" data-en="VIEW REPORT">XEM BÁO CÁO</a>
                    <a href="<?php echo home_url('/donate/'); ?>" class="btn-donate-card" data-vi="ỦNG HỘ" data-en="DONATE">ỦNG HỘ</a>
                </div>
            </div>
        </div>
    </div>

    <!-- DỰ ÁN 2: GIÁO DỤC -->
    <div class="col-lg-4 col-md-6 project-item" data-category="edu">
        <div class="project-card h-100 shadow-sm border-0">
            <div class="project-img-container" style="height: 240px;">
                <img src="https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2025/12/chuongtrinh1.jpg" class="w-100 h-100">
                <span class="category-badge-apple" data-vi="Giáo dục" data-en="Education">Giáo dục</span>
            </div>
            <div class="card-body">
                <h4 class="text-center mb-3" data-vi="Học bổng Bông Hồng Nhỏ" data-en="Little Roses Scholarship">Học bổng Bông Hồng Nhỏ</h4>
                <p class="project-story text-center" data-vi="Em Nam mồ côi cha từ nhỏ, nhờ học bổng em đã không phải bỏ học giữa chừng và hiện đang là sinh viên sư phạm." data-en="Nam, an orphan, continued his education thanks to the scholarship and is now a pedagogy student.">Em Nam mồ côi cha từ nhỏ, nhờ học bổng em đã không phải bỏ học giữa chừng và hiện đang là sinh viên sư phạm.</p>
                
                <div class="custom-progress-wrap">
                    <div class="custom-progress" style="height: 6px; background: #eee; border-radius: 10px;">
                        <div class="custom-progress-bar" style="width: 85%; height: 100%; background: var(--primary-red); border-radius: 10px;"></div>
                    </div>
                    <div class="d-flex justify-content-between small fw-bold mt-2">
                        <span class="text-danger">85%</span>
                        <span class="text-muted">Goal: 2 tỷ</span>
                    </div>
                </div>

                <div class="project-actions">
                    <a href="<?php echo home_url('/bao-cao/dang-trien-khai'); ?>" class="btn-report-link" data-vi="XEM BÁO CÁO" data-en="VIEW REPORT">XEM BÁO CÁO</a>
                    <a href="<?php echo home_url('/donate/'); ?>" class="btn-donate-card" data-vi="ỦNG HỘ" data-en="DONATE">ỦNG HỘ</a>
                </div>
            </div>
        </div>
    </div>

    <!-- DỰ ÁN 3: Y TẾ HỌC ĐƯỜNG -->
    <div class="col-lg-4 col-md-6 project-item" data-category="health">
        <div class="project-card h-100 shadow-sm border-0">
            <div class="project-img-container" style="height: 240px;">
                <img src="https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2025/12/yte.jpg" class="w-100 h-100">
                <span class="category-badge-apple" data-vi="Y tế" data-en="Health">Y tế</span>
            </div>
            <div class="card-body">
                <h4 class="text-center mb-3" data-vi="Sức khỏe học đường" data-en="School Health">Sức khỏe học đường</h4>
                <p class="project-story text-center" data-vi="“Con không còn sợ bác sĩ nữa vì các cô chú rất hiền.” - Em Lan (9 tuổi) cười rạng rỡ sau khi được khám tổng quát." data-en="“I’m not afraid of doctors anymore because they are so kind.” - Lan (9 years old) smiled after her check-up.">“Con không còn sợ bác sĩ nữa vì các cô chú rất hiền.” - Em Lan (9 tuổi) cười rạng rỡ sau khi được khám tổng quát.</p>
                
                <div class="custom-progress-wrap">
                    <div class="custom-progress" style="height: 6px; background: #eee; border-radius: 10px;">
                        <div class="custom-progress-bar" style="width: 50%; height: 100%; background: var(--primary-red); border-radius: 10px;"></div>
                    </div>
                    <div class="d-flex justify-content-between small fw-bold mt-2">
                        <span class="text-danger">50%</span>
                        <span class="text-muted">Goal: 2 tỷ</span>
                    </div>
                </div>

                <div class="project-actions">
                    <a href="<?php echo home_url('/bao-cao/dang-trien-khai'); ?>" class="btn-report-link" data-vi="XEM BÁO CÁO" data-en="VIEW REPORT">XEM BÁO CÁO</a>
                    <a href="<?php echo home_url('/donate/'); ?>" class="btn-donate-card" data-vi="ỦNG HỘ" data-en="DONATE">ỦNG HỘ</a>
                </div>
            </div>
        </div>
    </div>

    <!-- DỰ ÁN 4: Y TẾ PHÒNG NGỪA -->
    <div class="col-lg-4 col-md-6 project-item" data-category="health">
        <div class="project-card h-100 shadow-sm border-0">
            <div class="project-img-container" style="height: 240px;">
                <img src="https://petal-three-lrf.infinityfreeapp.com//wp-content/uploads/2025/12/yte2.jpg" class="w-100 h-100">
                <span class="category-badge-apple" data-vi="Y tế" data-en="Health">Y tế</span>
            </div>
            <div class="card-body">
                <h4 class="text-center mb-3" data-vi="Phòng ngừa bệnh tật" data-en="Disease Prevention">Phòng ngừa bệnh tật</h4>
                <p class="project-story text-center" data-vi="Những buổi hướng dẫn rửa tay sạch đã giúp giảm 40% tỷ lệ mắc bệnh truyền nhiễm tại các điểm trường vùng xa." data-en="Handwashing workshops helped reduce infectious disease rates by 40% in remote schools.">Những buổi hướng dẫn rửa tay sạch đã giúp giảm 40% tỷ lệ mắc bệnh truyền nhiễm tại các điểm trường vùng xa.</p>
                
                <div class="custom-progress-wrap">
                    <div class="custom-progress" style="height: 6px; background: #eee; border-radius: 10px;">
                        <div class="custom-progress-bar" style="width: 20%; height: 100%; background: var(--primary-red); border-radius: 10px;"></div>
                    </div>
                    <div class="d-flex justify-content-between small fw-bold mt-2">
                        <span class="text-danger">20%</span>
                        <span class="text-muted">Goal: 2 tỷ</span>
                    </div>
                </div>

                <div class="project-actions">
                    <a href="<?php echo home_url('/bao-cao/dang-trien-khai'); ?>" class="btn-report-link" data-vi="XEM BÁO CÁO" data-en="VIEW REPORT">XEM BÁO CÁO</a>
                    <a href="<?php echo home_url('/donate/'); ?>" class="btn-donate-card" data-vi="ỦNG HỘ" data-en="DONATE">ỦNG HỘ</a>
                </div>
            </div>
        </div>
    </div>
</div>
</main>



    <!-- FOOTER -->
    <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5 class="text-success fw-bold mb-4"><i class="fa-solid fa-heart text-danger me-2"></i> LITTLE ROSE</h5>
                    <p class="text-secondary small" data-vi="Lan tỏa yêu thương, kết nối những tấm lòng nhân ái." data-en="Spreading love, connecting compassionate hearts.">Lan tỏa yêu thương, kết nối những tấm lòng nhân ái.</p>
                </div>
                <div class="col-md-4 border-md-start border-secondary ps-md-4">
                    <h5 class="fw-bold mb-4" data-vi="Thông tin liên hệ" data-en="Contact Info">Thông tin liên hệ</h5>
                    <p class="small text-secondary mb-2"><i class="fas fa-map-marker-alt me-2 text-danger"></i> 49 Phạm Ngọc Thạch, Quận 3, TP.HCM</p>
                    <p class="small text-secondary"><i class="fas fa-envelope me-2 text-primary"></i> info@littlerosesfoundation.org</p>
                </div>
                <div class="col-md-4 border-md-start border-secondary ps-md-4">
                    <h5 class="fw-bold mb-4" data-vi="Đường liên kết" data-en="Social Links">Đường liên kết</h5>
                    <div class="social-list">
                        <a href="https://littlerosesfoundation.org" target="_blank" rel="noopener" class="social-link-item"><span class="social-icon-box"><i class="fas fa-globe"></i></span> Website</a>
                        <a href="https://www.facebook.com/littlerosesfoundation" target="_blank" rel="noopener" class="social-link-item"><span class="social-icon-box"><i class="fab fa-facebook"></i></span> Facebook</a>
                        <a href="https://www.tiktok.com/@littlerosesfoundation" target="_blank" rel="noopener" class="social-link-item"><span class="social-icon-box"><i class="fab fa-tiktok"></i></span> TikTok</a>
                        <a href="https://www.instagram.com/little_roses_foundation" target="_blank" rel="noopener" class="social-link-item"><span class="social-icon-box"><i class="fab fa-instagram"></i></span> Instagram</a>
                    </div>
                </div>
            </div>
            <hr class="border-secondary mt-5">
            <p class="text-center small text-secondary">© <?php echo date("Y"); ?> Little Rose Foundation - Developed by Petal Three</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // 1. Hàm lọc nội dung (Phải để ngoài cùng để gọi được ở mọi nơi)
        function applyFilter(category) {
            // Cập nhật nút active
            document.querySelectorAll('.btn-filter-lrf').forEach(btn => {
                btn.classList.toggle('active', btn.getAttribute('data-filter') === category);
            });

            // Ẩn hiện card
            document.querySelectorAll('.project-item').forEach(item => {
                if (category === 'all' || item.getAttribute('data-category') === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // 2. Hàm ngôn ngữ
        function changeLang(lang) {
            document.querySelectorAll('[data-vi]').forEach(el => {
                el.innerText = el.getAttribute('data-' + lang);
            });
            document.getElementById('btn-vi').classList.toggle('active', lang === 'vi');
            document.getElementById('btn-en').classList.toggle('active', lang === 'en');
        }

        // 3. Khởi tạo khi trang sẵn sàng
        document.addEventListener('DOMContentLoaded', () => {
            // Sự kiện nút lọc
            document.querySelectorAll('.btn-filter-lrf').forEach(button => {
                button.addEventListener('click', function() {
                    applyFilter(this.getAttribute('data-filter'));
                });
            });

            // Kiểm tra filter từ URL (?filter=edu)
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('filter')) applyFilter(urlParams.get('filter'));
        });

        // 4. Tắt màn hình loading khi trang tải xong hoàn toàn
        window.addEventListener('load', () => {
            const preloader = document.getElementById('preloader');
            if(preloader) {
                preloader.style.opacity = '0';
                setTimeout(() => { preloader.style.display = 'none'; }, 500);
            }
        });
    </script>
    <?php wp_footer(); ?>
</body>
</html>