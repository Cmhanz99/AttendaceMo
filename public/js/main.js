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

const chatIcon = document.querySelector('.chat-icon');
const chatBot = document.querySelector('.chat-bot');
const chatClose = document.querySelector('.chat-close');

chatIcon.addEventListener('click', () => {
    chatBot.classList.add('show');
})

chatClose.addEventListener('click', () => {
    chatBot.classList.remove('show');
}
)
