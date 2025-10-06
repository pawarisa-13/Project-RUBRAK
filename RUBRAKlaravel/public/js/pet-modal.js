const pets = window.petsData; // รับข้อมูล pets จาก Blade

function openModal(pet_id) {
    const pet = pets.find(p => p.pet_id == pet_id);
    if(pet){
        document.getElementById('modalImage').src = '/storage/' + pet.picture;
        document.getElementById('modalName').innerText = pet.name_pet;
        document.getElementById('modalAge').innerText = pet.age_pet;
        document.getElementById('modalGender').innerText = pet.gender;
        document.getElementById('modalBreed').innerText = pet.breed;
        document.getElementById('modalVaccine').innerText = pet.vaccine ? 'Yes' : 'No';
        document.getElementById('modalInfo').innerText = pet.info;
        document.getElementById('modalFoundation').innerText = pet.foundation;
        document.getElementById('modalProvince').innerText = pet.province;

        document.getElementById('modal').style.display = 'block';
    }
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}

window.onclick = function(event) {
    const modal = document.getElementById('modal');
    if(event.target === modal){
        closeModal();
    }
}

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
