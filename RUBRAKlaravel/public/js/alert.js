// ฟังก์ชันปิด popup
function closePreem() {
    const popup = document.getElementById('preem-popup');
    popup.classList.remove('show');
}

// แสดง popup อัตโนมัติ
window.addEventListener('DOMContentLoaded', (event) => {
    const popup = document.getElementById('preem-popup');
    if(popup){
        popup.classList.add('show');

        // ปิดเองหลัง 3 วินาที
        setTimeout(() => {
            closePreem();
        }, 10000);
    }
});