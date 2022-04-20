const modal = document.querySelectorAll('.modal');
const filter = document.querySelectorAll('.filter');
const logout = document.getElementById('logout');
const body = document.querySelector('body');

for (let i = 0; i < modal.length; i++) {
    logout.addEventListener('click', () => {
        filter[i].classList.add('displayBlock');
        filter[i].classList.remove('displayNone');
        modal[i].classList.toggle('modalDisplayNone');
        modal[i].classList.toggle('modalDisplayBlock');
        body.style.overflow = 'hidden';
    });
}
