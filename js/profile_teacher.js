document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('uploadimg');

    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        const maxSizeInBytes = 5 * 1024 * 1024; // 5MB

        if (file.size > maxSizeInBytes) {
            alert('Kích thước tệp hình ảnh quá lớn. Vui lòng chọn tệp hình ảnh nhỏ hơn.');
            this.value = ''; 
        }
    });
});
