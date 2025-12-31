/* 1. CHỐNG TẤN CÔNG ĐẦU VÀO (XSS) */
function sanitizeInput(str) {
    const temp = document.createElement('div');
    temp.textContent = str;
    return temp.innerHTML;
}

/* 2. PHẢN HỒI LỖI (Norman: Provide Feedback) */
document.querySelectorAll('.form-control').forEach(input => {
    input.addEventListener('blur', function() {
        if (!this.value) {
            this.style.borderColor = 'var(--primary-red)';
            // Hiện thông báo lỗi ngay lập tức
        } else {
            this.style.borderColor = '#ddd';
        }
    });
});

/* 3. COOKIES MINH BẠCH (Krug: Usability as common courtesy) */
// Thiết lập Cookie an toàn với thuộc tính SameSite và Secure
function setSecureCookie(name, value, days) {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    // Thuộc tính SameSite=Lax giúp chống tấn công CSRF
    document.cookie = name + "=" + (value || "")  + expires + "; path=/; SameSite=Lax; Secure";
}