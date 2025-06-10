const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navLinks.classList.toggle('show');
});

window.addEventListener('scroll', function () {
  const header = document.querySelector('header');
  const nav_links = document.querySelectorAll('ul.nav-links li a'); 
  const logo = document.querySelector('.logo'); 
  if (window.scrollY > 200) {
    header.classList.add('scrolled');
    logo.classList.add('scrolled');
    nav_links.forEach(link => link.classList.add('scrolled')); 
  } else {
    header.classList.remove('scrolled');
    logo.classList.remove('scrolled');
    nav_links.forEach(link => link.classList.remove('scrolled')); 
  }
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

function toggleSidebar() {
  const sidebar = document.getElementById('sidebar');
  sidebar.classList.toggle('active');
}