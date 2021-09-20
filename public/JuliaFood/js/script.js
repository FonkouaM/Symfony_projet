function toggleMenu(){
    const header = document.querySelector('header');
    const responsive = document.querySelector('.responsive');
    responsive.addEventListener('click', () =>{
    header.classList.toggle('view-nav');
    })
}
toggleMenu();