window.onload = function() {
    var message = document.getElementById('message');
    if (message.innerHTML !== '') {
        message.style.display = 'block';
        setTimeout(function() {
            message.style.display = 'none';
        }, 4000);
    }
};
