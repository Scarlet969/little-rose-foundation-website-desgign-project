<?php
/*
Template Name: QR Process Page
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
    /* 2. Thay link ảnh của bạn vào chỗ url(...) */
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                url('img/background.jpg') no-repeat center center;
    
    background-size: cover; /* Để ảnh luôn lấp đầy khung hình */
    background-attachment: fixed; /* Tạo hiệu ứng cuộn ảnh nhẹ (Parallax) nếu muốn sang trọng */
}
        .hero-content h1 {
            font-family: 'Playfair Display', serif;
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
         /* --- 3. HIỆU ỨNG ĐƯỜNG LIÊN KẾT (GIỐNG TRONG ẢNH) --- */
        .social-list { list-style: none; padding: 0; }
        .social-link-item {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #adb5bd; /* Màu chữ mặc định hơi xám sang trọng */
            font-size: 1.1rem;
            font-weight: 500;
            margin-bottom: 15px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        .social-icon-box {
            width: 40px;
            text-align: center;
            font-size: 1.3rem;
            margin-right: 15px;
            transition: all 0.4s ease;
        }
        /* Hiệu ứng khi hover: Chữ sáng lên và trượt sang phải */
        .social-link-item:hover {
            color: #ffffff;
            transform: translateX(12px); /* Trượt ngang */
        }
        /* Màu sắc icon đặc trưng khi hover */
        .social-link-item:hover .fa-globe { color: var(--primary-green); }
        .social-link-item:hover .fa-facebook { color: #1877F2; }
        .social-link-item:hover .fa-tiktok { color: #ff0050; }
        .social-link-item:hover .fa-instagram { color: #E4405F; }

        .stat-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.05); }
        .img-premium {
            width: 100%;
            height: 350px;
            object-fit: cover;
            transition: all 0.5s;
        }
        .project-card:hover .img-premium { transform: scale(1.05); }
        /* Tiêu đề Serif (Nếu muốn đổi H1, H2 sang Gotham luôn thì đổi Playfair Display thành var(--font-gotham)) */
        h1, h2, h3, .serif { 
            font-family: var(--font-gotham), serif !important; 
            font-weight: 900 !important; 
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

    <!-- NỘI DUNG ĐÓNG GÓP -->
    
    <div id="content" class="container my-5 py-4">
        <!-- TIÊU ĐỀ VÀ CHÂM NGÔN -->
        <div class="text-center mb-5">
            <h1 class="fw-bold display-4 text-danger mb-3" style="font-family: var(--font-gotham) !important;" data-vi="ĐÓNG GÓP" data-en="DONATE">ĐÓNG GÓP</h1>
            <div style="width: 60px; height: 3px; background: var(--primary-red); margin: 0 auto 20px;"></div>
            <p class="fst-italic text-secondary px-lg-5" style="font-size: 1.1rem;" 
               data-vi='"Không có tình yêu, các hành vi, dù sáng chói nhất, cũng không đáng kể gì."' 
               data-en='"Without love, actions, even the most brilliant, are insignificant."'>
                "Không có tình yêu, các hành vi, dù sáng chói nhất, cũng không đáng kể gì."
            </p>
        </div>
        <!-- PHẦN QR CODE CĂN GIỮA (template-qr-process.php) -->
        <div class="bg-white p-4 p-lg-5 rounded-4 shadow-sm border">
        <h4 class="fw-bold mb-4 text-center" data-vi="Xác nhận đóng góp" data-en="Donation confirmation">Xác nhận đóng góp</h4>
        
        <form id="donationForm" action="<?php echo get_template_directory_uri(); ?>/process_donate.php" method="POST">
            <div class="mb-3">
                <!-- Thêm data-vi/en cho Placeholder -->
                <input type="text" name="fullname" class="form-control" 
                       data-vi="Họ và tên" data-en="Full Name" placeholder="Họ và tên" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" 
                       data-vi="Email" data-en="Email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <textarea name="message" class="form-control" rows="4" 
                          data-vi="Lời nhắn gửi yêu thương..." data-en="Your message..." placeholder="Lời nhắn gửi yêu thương..."></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100 py-3 fw-bold rounded-pill mt-3" 
                    data-vi="Gửi thông tin" data-en="Submit">
                Gửi thông tin
            </button>
        </form>
    </div>
</div>
    <!-- END NỘI DUNG ĐÓNG GÓP -->

    <!-- FOOTER -->
    <footer class="bg-dark text-white pt-5 pb-3 mt-5">
        <div class="container text-center text-md-start">
            <div class="row g-4">
                <div class="col-md-6">
                    <h5 class="text-success fw-bold mb-3">Little Rose Foundation</h5>
                    <p class="small text-secondary">To all we are love.</p>
                </div>
                <div class="col-md-6 text-md-end">
                   <p class="text-center small text-secondary">© <?php echo date("Y"); ?> Little Rose Foundation - Developed by Petal Three</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function changeLang(lang) {
    document.querySelectorAll('[data-vi]').forEach(el => {
        const text = el.getAttribute('data-' + lang);
        
        // Kiểm tra nếu là ô nhập liệu (input hoặc textarea) thì đổi placeholder
        if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
            el.placeholder = text;
        } else {
            // Nếu là các thẻ khác (h4, button, a...) thì đổi nội dung chữ
            el.innerText = text;
        }
    });

    // Cập nhật trạng thái nút VN | EN (Nếu có)
    const btnVi = document.getElementById('btn-vi');
    const btnEn = document.getElementById('btn-en');
    if(btnVi) btnVi.classList.toggle('active', lang === 'vi');
    if(btnEn) btnEn.classList.toggle('active', lang === 'en');
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