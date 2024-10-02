alert("mohon maaf bila belum sempurna :>")

const signInButton=document.getElementById('signInButton');
const signUpButton=document.getElementById('signUpButton');
const signInForm=document.getElementById('sign-in');
const signUpForm=document.getElementById('sign-up');


signUpButton.addEventListener('click', function(){
    signInForm.style.display='none';
    signUpForm.style.display='block';
})

signInButton.addEventListener('click', function(){
    signInForm.style.display='block';
    signUpForm.style.display='none';
})

document.getElementById("home-link").addEventListener("click", function(){
    document.getElementById("home").scrollIntoView({behavior: "smooth"});
});

document.getElementById("features-link").addEventListener("click", function(){
    document.getElementById("features").scrollIntoView({behavior: "smooth"});
});

document.getElementById("products-link").addEventListener("click", function(){
    document.getElementById("products").scrollIntoView({behavior: "smooth"});
});

document.getElementById("categories-link").addEventListener("click", function(){
    document.getElementById("categories").scrollIntoView({behavior: "smooth"});
});


let navbarMenu = document.querySelector('.navbar-menu');
let hamburger = document.querySelector('#hamburger');

document.querySelector('#hamburger').onclick = () => {
    console.log('Hamburger clicked'); 
    navbarMenu.classList.toggle('active'); 
};