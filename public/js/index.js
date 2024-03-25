// Fugsi buka dan tutup modal/dialog
function openModal(data) {
    const modal = document.getElementById(data);
    modal.classList.remove('hidden');
    setTimeout(() => {
        modal.classList.add('opacity-100');
    }, 80);
}

function closeModal(data) {
    const modal = document.getElementById(data);
    modal.classList.add('hidden');
    setTimeout(() => {
        modal.classList.remove('opacity-100');
    }, 80);
}

function switchModal(data1, data2) {
    closeModal(data1);
    openModal(data2);
}
