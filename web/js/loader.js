let mask = document.querySelector('.mask');

window.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        mask.classList.add('hide');
        mask.remove();
    }, 1500);
});

function initDropdown() {
    const dropBtn = document.getElementById('dropdownBtn'); 
    const dropList = document.getElementById('w2');

    dropBtn.addEventListener('click', () => {
        dropList.classList.toggle('open')
    })
}

initDropdown()