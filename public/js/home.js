const bars = document.querySelector('.toggle-btn');
const navbar = document.querySelector('header .navbar');

bars.addEventListener('click', function(){
    if(bars.classList.contains('fa-bars')){
        bars.classList.remove('fa-bars');
        bars.classList.add('fa-xmark');
        navbar.classList.add('slide');
    }
    else{
        bars.classList.remove('fa-xmark');
        bars.classList.add('fa-bars');
        navbar.classList.remove('slide');
    }
});