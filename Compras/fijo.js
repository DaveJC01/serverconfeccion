const fijo = document.querySelector('.fijo');

window.addEventListener('scroll', function(){
    fijo.classList.toggle('active', window.scrollY >0)
})