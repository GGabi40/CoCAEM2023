export default function backtoTop() {
    const backBtn = document.querySelector('.back-to-top');

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 0) {
            backBtn.style.display = 'flex';
        } else {
            backBtn.style.display = 'none';
        }
    })
}