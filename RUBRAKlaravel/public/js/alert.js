// ฟังก์ชันปิด popup
function closePreem() {
    const popup = document.getElementById('preem-popup');
    popup.classList.remove('show');
}


window.addEventListener('DOMContentLoaded', (event) => {
    const popup = document.getElementById('preem-popup');
    if(popup){
        popup.classList.add('show');

        
        setTimeout(() => {
            closePreem();
        }, 10000);
    }
});
