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
                    <li class="nav-item"><a class="nav-link px-3" href="<?php echo home_url('/about/'); ?>" data-vi="Về chúng tôi" data-en="About Us">Về chúng tôi</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="<?php echo home_url('/project/'); ?>" data-vi="Chương trình" data-en="Programs">Chương trình</a></li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_page('bao-cao') ? 'active text-success' : ''; ?> px-3" 
                           href="<?php echo home_url('/bao-cao/'); ?>" 
                           data-vi="Báo cáo" 
                           data-en="Reports">Báo cáo tài chính</a>
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
                                            <span class="bank-value">Quỹ Tứ Thiện Bông Hồng Nhỏ</span>
                                            <button class="copy-btn" onclick="copyToClipboard('Quỹ Tứ Thiện Bông Hồng Nhỏ', this)">
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

        <!-- TỔNG SỐ TIỀN & QUOTE -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <div class="text-center">
                    <h2 class="fw-bold mb-4" data-vi="TỔNG SỐ TIỀN" data-en="TOTAL AMOUNT">TỔNG SỐ TIỀN</h2>
                    <div class="quote-box">
                        <p class="quote-text" 
                           data-vi="Một lời nói hay một nụ cười thường cũng đủ để đưa sự sống tươi mát vào trong một tâm hồn thất vọng." 
                           data-en="A kind word or a smile is often enough to bring fresh life into a discouraged soul.">
                            "Một lời nói hay một nụ cười thường cũng đủ để đưa sự sống tươi mát vào trong một tâm hồn thất vọng."
                        </p>
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
                    <form id="donationForm" action="<?php echo get_template_directory_uri(); ?>/process_donate.php" method="POST">
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
                    
                    <!-- Loading spinner -->
                    <div id="loadingSpinner" class="text-center mt-3" style="display: none;">
                        <div class="spinner-border text-success" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2" data-vi="Đang xử lý..." data-en="Processing...">Đang xử lý...</p>
                    </div>
                </div>
            </div>
        </div> 
        <div class="donor-table-wrap mt-5">
    <h3 class="table-title" data-vi="DANH SÁCH ĐÓNG GÓP GẦN ĐÂY" data-en="RECENT DONATIONS">DANH SÁCH ĐÓNG GÓP GẦN ĐÂY</h3>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th data-vi="Họ tên" data-en="Name">Họ tên</th>
                    <th data-vi="Số tiền" data-en="Amount">Số tiền</th>
                    <th data-vi="Lời nhắn" data-en="Message">Lời nhắn</th>
                    <th data-vi="Ngày" data-en="Date">Ngày</th>
                </tr>
            </thead>
            <!-- ID PHẢI KHỚP VỚI JAVASCRIPT -->
            <tbody id="donationsTableBody">
                <!-- Dữ liệu sẽ tự động đổ vào đây -->
            </tbody>
        </table>
    </div>
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
        // Language Switching
        function changeLang(lang) {
            document.querySelectorAll('[data-vi]').forEach(el => {
                const text = el.getAttribute('data-' + lang);
                if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
                    const placeholder = el.getAttribute('data-' + lang + '-placeholder');
                    if (placeholder) {
                        el.placeholder = placeholder;
                    }
                } else if (el.tagName === 'BUTTON' && el.type !== 'submit') {
                    // Skip amount buttons
                } else {
                    el.innerText = text;
                }
            });
            document.getElementById('btn-vi').classList.toggle('active', lang === 'vi');
            document.getElementById('btn-en').classList.toggle('active', lang === 'en');
        }

        // Preloader
        window.addEventListener('load', () => {
            setTimeout(() => { 
                const pre = document.getElementById('preloader');
                if(pre) { 
                    pre.style.opacity = '0'; 
                    setTimeout(() => pre.style.display = 'none', 800); 
                }
                // Load donations data after page loads
                loadDonations();
            }, 1200);
        });

        // Copy to Clipboard Function
        function copyToClipboard(text, button) {
            navigator.clipboard.writeText(text).then(() => {
                // Visual feedback
                const originalHTML = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check"></i> Copied!';
                button.classList.add('copied');
                
                setTimeout(() => {
                    button.innerHTML = originalHTML;
                    button.classList.remove('copied');
                }, 2000);
            }).catch(err => {
                console.error('Failed to copy: ', err);
                alert('Không thể sao chép. Vui lòng thử lại.');
            });
        }

        // Amount Preset Selection
        document.querySelectorAll('.amount-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.amount-btn').forEach(b => {
                    b.classList.remove('active');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Set the amount in hidden input and visible input
                const amount = this.getAttribute('data-amount');
                document.getElementById('donationAmount').value = amount;
                document.getElementById('customAmount').value = amount;
            });
        });

        // Custom Amount Input
        document.getElementById('customAmount').addEventListener('input', function() {
            const customAmount = this.value;
            
            // Remove active class from preset buttons
            document.querySelectorAll('.amount-btn').forEach(b => {
                b.classList.remove('active');
            });
            
            // Set the amount in hidden input
            document.getElementById('donationAmount').value = customAmount;
        });

        // Form Submission
        document.getElementById('donationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate amount
            const amount = document.getElementById('donationAmount').value;
            if (!amount || amount < 10000) {
                alert('Vui lòng chọn số tiền đóng góp (tối thiểu 10,000 VNĐ)');
                return;
            }
            
            // Show loading
            const submitBtn = document.getElementById('submitBtn');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.disabled = true;
            submitBtn.style.display = 'none';
            loadingSpinner.style.display = 'block';
            
            // Submit form via AJAX
            const formData = new FormData(this);
            
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Handle response
                console.log('Form submission response:', data);
                
                // Show success message
                loadingSpinner.style.display = 'none';
                
                const successHTML = `
                    <div class="success-message" style="display: block;">
                        <div class="success-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h4 data-vi="Cảm ơn bạn đã đóng góp!" data-en="Thank you for your donation!">
                            Cảm ơn bạn đã đóng góp!
                        </h4>
                        <p data-vi="Thông tin đóng góp của bạn đã được ghi nhận. Chúng tôi sẽ xác nhận với bạn trong thời gian sớm nhất." 
                           data-en="Your donation information has been recorded. We will confirm with you as soon as possible.">
                            Thông tin đóng góp của bạn đã được ghi nhận. Chúng tôi sẽ xác nhận với bạn trong thời gian sớm nhất.
                        </p>
                        <p class="mt-3">
                            <small data-vi="Chúng tôi sẽ gửi email xác nhận đến:" data-en="We will send confirmation email to:">Chúng tôi sẽ gửi email xác nhận đến:</small>
                            <br>
                            <strong>${formData.get('email')}</strong>
                        </p>
                        <button class="btn btn-success mt-3" onclick="location.reload()" 
                                data-vi="Đóng góp tiếp" data-en="Donate Again">
                            Đóng góp tiếp
                        </button>
                    </div>
                `;
                
                document.querySelector('.confirmation-form').innerHTML = successHTML;
                
                // Reload donations data
                setTimeout(loadDonations, 1000);
            })
            .catch(error => {
                console.error('Form submission error:', error);
                loadingSpinner.style.display = 'none';
                submitBtn.style.display = 'block';
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
                
                alert('Có lỗi xảy ra khi gửi form. Vui lòng thử lại.');
            });
        });

        // Function to load donations from database
        function loadDonations() {
    // Gọi file PHP ở Bước 1
    fetch('<?php echo get_template_directory_uri(); ?>/process_donate.php')
        .then(response => response.json())
        .then(data => {
            // Fix ID: Tìm đúng 'donationsTableBody'
            const tableBody = document.getElementById('donationsTableBody');
            if (!tableBody) return;

            if (data.length > 0) {
                let html = '';
                data.forEach(donation => {
                    html += `
                        <tr>
                            <td class="p-3 fw-bold">${donation.fullname}</td>
                            <td class="p-3 text-danger fw-bold">${formatCurrency(donation.amount)}</td>
                            <td class="p-3 small italic">${donation.message || ''}</td>
                            <td class="p-3 text-muted small">${formatDate(donation.created_at)}</td>
                        </tr>
                    `;
                });
                tableBody.innerHTML = html;
            } else {
                tableBody.innerHTML = '<tr><td colspan="4" class="text-center py-4">Chưa có dữ liệu đóng góp</td></tr>';
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
            document.getElementById('donationsTableBody').innerHTML = '<tr><td colspan="4" class="text-center text-danger">Lỗi tải dữ liệu</td></tr>';
        });
}

        // Helper function to format currency
        function formatCurrency(amount) {
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND',
                minimumFractionDigits: 0
            }).format(amount);
        }

        // Helper function to format date
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('vi-VN', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });
        }

        // Set today as default transfer date
        document.addEventListener('DOMContentLoaded', function() {
            // Initial language setup
            changeLang('vi');
        });

        // Add smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
    
    <?php wp_footer(); ?>
</body>
</html>