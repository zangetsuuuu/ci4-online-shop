// Fugsi buka dan tutup popup
function togglePopup(data) {
    var popup = document.getElementById(data);
    if (popup.classList.contains('hidden')) {
        // Jika popup tersembunyi, tampilkan
        popup.classList.remove('hidden');
        popup.classList.add('flex', 'items-center', 'justify-center');
        setTimeout(() => {
            popup.classList.add('opacity-100');
        }, 80);
    } else {
        // Jika popup ditampilkan, sembunyikan
        popup.classList.remove('flex', 'items-center', 'justify-center');
        popup.classList.add('hidden');
        setTimeout(() => {
            popup.classList.remove('opacity-100');
        }, 80);
    }
}

function switchPopup(data1, data2) {
    togglePopup(data1);
    togglePopup(data2);
}
