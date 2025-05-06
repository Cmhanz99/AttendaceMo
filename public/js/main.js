function darkMode(){
    var icon = document.querySelector('.darkmode');
    var container = document.querySelector('.dark');

    icon.classList.toggle('active');
    container.classList.toggle('dark-mode');

    if(icon.classList.contains('fa-moon')){
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
    }else{
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
    }
}

