alert("mohon maaf bila belum sempurna :>")


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

document.getElementById('hamburger').addEventListener('click', function(){
    const navbarmenu = document.getElementById('navbar-menu');
    navbarmenu.classList.toggle('active');
});


