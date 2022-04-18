const modal = document.querySelectorAll('.modal');
const filter = document.querySelector('.filter')
const logout = document.getElementById('logout');
const body = document.querySelector('body')

for (let i = 0; i < modal.length; i++) {
    logout.addEventListener('click', () => {
        filter.classList.add('displayBlock');
        filter.classList.remove('displayNone');
        modal[i].classList.toggle('modalDisplayNone');
        modal[i].classList.toggle('modalDisplayBlock');
        body.style.overflow = 'hidden';
    });
}