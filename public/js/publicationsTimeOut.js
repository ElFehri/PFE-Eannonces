//annonces time out
const annonces = document.querySelectorAll('.annonce');
let index = 0;
setInterval(() => {
    annonces[index].style.display = 'none';
    index = (index + 1) % annonces.length;
    annonces[index].style.display = 'block';
}, 7000);

//information time 
const information = document.querySelectorAll('.info');
let i = 0;
setInterval(() => {
    information[i].style.display = 'none';
    i = (i + 1) % information.length;
    information[i].style.display = 'block';
}, 5000);