const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navLinks.classList.toggle('show');
});
function openArticle(type) {
    switch(type) {
    case 'penanganan':
        alert('Artikel: Penanganan Hama dan Penyakit - Ini adalah tempat untuk konten lengkap terkait pengendalian hama dan penyakit.');
        break;
    case 'katalog':
        alert('Artikel: Katalog Tanaman & Panduan Budidaya - Informasi lengkap tentang jenis tanaman dan panduan budidaya.');
        break;
    case 'manajemen':
        alert('Artikel: Menejemen Lahan & Kalender Musim Tanam - Jadwal dan tips mengelola lahan pertanian dengan efektif.');
        break;
    }
}