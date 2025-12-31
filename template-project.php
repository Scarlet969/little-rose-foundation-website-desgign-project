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

        /* 6. FOOTER HIỆU ỨNG TRƯỢT SLIDE 12PX */
        .social-list { list-style: none; padding: 0; }
        .social-link-item { display: flex; align-items: center; text-decoration: none; color: #adb5bd; font-weight: 600; margin-bottom: 12px; transition: 0.4s cubic-bezier(0.165, 0.84, 0.44, 1); }
        .social-icon-box { width: 35px; text-align: center; font-size: 1.2rem; margin-right: 10px; }
        .social-link-item:hover { color: #ffffff !important; transform: translateX(12px); }
        .social-link-item:hover .fa-globe { color: var(--primary-green); }
        .social-link-item:hover .fa-facebook { color: #1877F2; }
        .social-link-item:hover .fa-tiktok { color: #ffffff; }
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
                    <a class="nav-link <?php echo is_front_page() ? 'active text-success' : 'text-dark'; ?> px-3 fw-bold" 
                       href="<?php echo home_url('/'); ?>" data-vi="Trang chủ" data-en="Home">Trang chủ</a>
                </li>
                <!-- Về chúng tôi -->
                <li class="nav-item">
                    <a class="nav-link <?php echo is_page('about') ? 'active text-success' : 'text-dark'; ?> px-3 fw-bold" 
                       href="<?php echo home_url('/about/'); ?>" data-vi="Về chúng tôi" data-en="About Us">Về chúng tôi</a>
                </li>
                <!-- Chương trình -->
                <li class="nav-item">
                    <a class="nav-link <?php echo is_page('project') ? 'active text-success' : 'text-dark'; ?> px-3 fw-bold" 
                       href="<?php echo home_url('/project/'); ?>" data-vi="Chương trình" data-en="Programs">Chương trình</a>
                </li>
                <!-- Thêm mục Báo cáo tài chính vào Menu -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_page('bao-cao') ? 'active text-success' : ''; ?> px-3 fw-bold" 
                        href="<?php echo home_url('/bao-cao/'); ?>" 
                        data-vi="Báo cáo tài chính" 
                        data-en="Reports">Báo cáo tài chính</a>
                    </li>
                <!-- Tin tức -->
                <li class="nav-item">
                    <a class="nav-link <?php echo is_page('news') ? 'active text-success' : 'text-dark'; ?> px-3 fw-bold" 
                       href="<?php echo home_url('/news/'); ?>" data-vi="Tin tức" data-en="News">Tin tức</a>
                </li>
                <!-- Nút Đóng góp -->
                <li class="nav-item">
                    <a class="btn btn-donate ms-lg-4 px-4 py-2 fw-bold shadow-sm" 
                       href="<?php echo home_url('/donate/'); ?>" data-vi="ĐÓNG GÓP" data-en="DONATE">ĐÓNG GÓP</a>
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
            <h2 class="fw-bold display-6" style="font-family: 'Gotham', sans-serif;" data-vi="Các Chương Trình & Dự Án" data-en="Programs & Projects">Các Chương Trình & Dự Án</h2>
            <div class="mt-3 mt-md-0 text-center">
                <button class="filter-btn active" data-filter="all" data-vi="Tất cả" data-en="All" style="color: black;">Tất cả</button>
                <button class="filter-btn" data-filter="edu" data-vi="Giáo dục" data-en="Education" style="color: black;">Giáo dục</button>
                <button class="filter-btn" data-filter="health" data-vi="Y tế" data-en="Health" style="color: black;">Y tế</button>
                <button class="filter-btn" data-filter="social" data-vi="Xã hội" data-en="Social" style="color: black;">Xã hội</button>
            </div>
        </div>

        <!-- DANH SÁCH DỰ ÁN -->
        <div class="row g-4" id="project-list">
            
            <!-- Dự án 1: Xã hội -->
            <div class="col-lg-4 col-md-6 project-item" data-category="social">
                <div class="project-card h-100 shadow-sm border-0">
                    <div class="project-img-container" style="position: relative; height: 260px; overflow: hidden; border-radius: 20px 20px 0 0;">
                        <img src="http://localhost/little-rose-web/wp-content/uploads/2025/12/xahoi1.jpg" class="w-100 h-100" style="object-fit: cover;" alt="Social">
                        <span class="category-badge-apple" data-vi="Xã hội" data-en="Social">Xã hội</span>
                    </div>
                    <div class="card-body p-4 text-center">
                        <h4 class="project-title" style="font-family: 'Montserrat', sans-serif; font-weight: 800;" data-vi="Hỗ trợ người yếu thế" data-en="Supporting the Vulnerable">Hỗ trợ người yếu thế</h4>
                        <p class="project-desc small text-muted mb-4" data-vi="Trợ giúp vốn, phương tiện mưu sinh, dụng cụ hỗ trợ và đào tạo nghề." data-en="Providing capital, livelihood tools, and vocational training.">Trợ giúp vốn, phương tiện mưu sinh, dụng cụ hỗ trợ và đào tạo nghề.</p>
                        
                        <div class="custom-progress-wrap">
                            <div class="custom-progress" style="height: 5px; background: #eee; border-radius: 10px;">
                                <div class="custom-progress-bar" style="width: 25%; height: 100%; background: var(--primary-red); border-radius: 10px;"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between small fw-bold mb-4 mt-2">
                            <span class="text-danger">25%</span>
                            <span class="text-muted">Goal: 1 tỷ</span>
                        </div>
                        <a href="<?php echo home_url('/donate/'); ?>" class="btn btn-donate w-100"data-vi="ỦNG HỘ NGAY" data-en="DONATE NOW">ỦNG HỘ NGAY</a>
                    </div>
                </div>
            </div>

            <!-- Dự án 2: Giáo dục -->
            <div class="col-lg-4 col-md-6 project-item" data-category="edu">
                <div class="project-card h-100 shadow-sm border-0">
                    <div class="project-img-container" style="position: relative; height: 260px; overflow: hidden; border-radius: 20px 20px 0 0;">
                        <img src="http://localhost/little-rose-web/wp-content/uploads/2025/12/chuongtrinh1.jpg" class="w-100 h-100" style="object-fit: cover;" alt="Education">
                        <span class="category-badge-apple" data-vi="Giáo dục" data-en="Education">Giáo dục</span>
                    </div>
                    <div class="card-body p-4 text-center">
                        <h4 class="project-title" style="font-family: 'Montserrat', sans-serif; font-weight: 800;" data-vi="Học bổng Bông Hồng Nhỏ" data-en="Little Roses Scholarship">Học bổng Bông Hồng Nhỏ</h4>
                        <p class="project-desc small text-muted mb-4" data-vi="Trao tặng cơ hội học tập cho những học sinh, sinh viên nghèo mồ côi, hiếu học." data-en="Providing educational opportunities for poor, orphaned, and studious students.">Trao tặng cơ hội học tập cho những học sinh hiếu học.</p>
                        
                        <div class="custom-progress-wrap">
                            <div class="custom-progress" style="height: 5px; background: #eee; border-radius: 10px;">
                                <div class="custom-progress-bar" style="width: 85%; height: 100%; background: var(--primary-red); border-radius: 10px;"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between small fw-bold mb-4 mt-2">
                            <span class="text-danger">85%</span>
                            <span class="text-muted">Goal: 2 tỷ</span>
                        </div>
                        <a href="<?php echo home_url('/donate/'); ?>" class="btn btn-donate w-100" data-vi="ỦNG HỘ NGAY" data-en="DONATE NOW">ỦNG HỘ NGAY</a>
                    </div>
                </div>
            </div>

            <!-- Dự án 3: Y tế học đường -->
            <div class="col-lg-4 col-md-6 project-item" data-category="health">
                <div class="project-card h-100 shadow-sm border-0">
                    <div class="project-img-container" style="position: relative; height: 260px; overflow: hidden; border-radius: 20px 20px 0 0;">
                        <img src="http://localhost/little-rose-web/wp-content/uploads/2025/12/yte.jpg" class="w-100 h-100" style="object-fit: cover;" alt="Health">
                        <span class="category-badge-apple" data-vi="Y tế" data-en="Health">Y tế</span>
                    </div>
                    <div class="card-body p-4 text-center">
                        <h4 class="project-title" style="font-family: 'Montserrat', sans-serif; font-weight: 800;" data-vi="Sức khỏe học đường" data-en="School Health">Sức khỏe học đường</h4>
                        <p class="project-desc small text-muted mb-4" data-vi="Phối hợp khám tổng quát, phát thuốc và tặng quà cho trẻ em mồ côi." data-en="General check-ups and providing medicine for orphaned children.">Phối hợp khám tổng quát, phát thuốc cho trẻ em mồ côi.</p>
                        
                        <div class="custom-progress-wrap">
                            <div class="custom-progress" style="height: 5px; background: #eee; border-radius: 10px;">
                                <div class="custom-progress-bar" style="width: 50%; height: 100%; background: var(--primary-red); border-radius: 10px;"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between small fw-bold mb-4 mt-2">
                            <span class="text-danger">50%</span>
                            <span class="text-muted">Goal: 2 tỷ</span>
                        </div>
                        <a href="<?php echo home_url('/donate/'); ?>" class="btn btn-donate w-100" data-vi="ỦNG HỘ NGAY" data-en="DONATE NOW">ỦNG HỘ NGAY</a>
                    </div>
                </div>
            </div>

            <!-- Dự án 4: Y tế phòng ngừa -->
            <div class="col-lg-4 col-md-6 project-item" data-category="health">
                <div class="project-card h-100 shadow-sm border-0">
                    <div class="project-img-container" style="position: relative; height: 260px; overflow: hidden; border-radius: 20px 20px 0 0;">
                        <img src="http://localhost/little-rose-web/wp-content/uploads/2025/12/yte2.jpg" class="w-100 h-100" style="object-fit: cover;" alt="Prevention">
                        <span class="category-badge-apple" data-vi="Y tế" data-en="Health">Y tế</span>
                    </div>
                    <div class="card-body p-4 text-center">
                        <h4 class="project-title" style="font-family: 'Montserrat', sans-serif; font-weight: 800;" data-vi="Phòng ngừa bệnh tật" data-en="Disease Prevention">Phòng ngừa bệnh tật</h4>
                        <p class="project-desc small text-muted mb-4" data-vi="Hợp tác triển khai các chương trình nâng cao nhận thức và phòng ngừa bệnh." data-en="Cooperating in awareness programs to prevent and reduce diseases.">Hợp tác triển khai nâng cao nhận thức phòng ngừa bệnh.</p>
                        
                        <div class="custom-progress-wrap">
                            <div class="custom-progress" style="height: 5px; background: #eee; border-radius: 10px;">
                                <div class="custom-progress-bar" style="width: 20%; height: 100%; background: var(--primary-red); border-radius: 10px;"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between small fw-bold mb-4 mt-2">
                            <span class="text-danger">20%</span>
                            <span class="text-muted">Goal: 2 tỷ</span>
                        </div>
                        <a href="<?php echo home_url('/donate/'); ?>" class="btn btn-donate w-100" data-vi="ỦNG HỘ NGAY" data-en="DONATE NOW">ỦNG HỘ NGAY</a>
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
        function changeLang(lang) {
            document.querySelectorAll('[data-vi]').forEach(el => { el.innerText = el.getAttribute('data-' + lang); });
            document.getElementById('btn-vi').classList.toggle('active', lang === 'vi');
            document.getElementById('btn-en').classList.toggle('active', lang === 'en');
        }
        const filterBtns = document.querySelectorAll('.filter-btn');
        const projectItems = document.querySelectorAll('.project-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelector('.filter-btn.active').classList.remove('active');
                btn.classList.add('active');
                const filter = btn.getAttribute('data-filter');
                projectItems.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                        setTimeout(() => { item.style.opacity = '1'; }, 10);
                    } else {
                        item.style.opacity = '0';
                        setTimeout(() => { item.style.display = 'none'; }, 400);
                    }
                });
            });
        });
        window.addEventListener('load', function() {
            setTimeout(() => {
                const preloader = document.getElementById('preloader');
                if(preloader) { preloader.style.opacity = '0'; setTimeout(() => { preloader.style.display = 'none'; }, 800); }
            }, 1200);
        });
    </script>
    <?php wp_footer(); ?>
</body>
</html>