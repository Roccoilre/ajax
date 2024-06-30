document.addEventListener("DOMContentLoaded", function() {
    var loader = document.getElementById('loader');
    var content = document.getElementById('content');
    setTimeout(function() {
        if (loader && content) {
            loader.style.display = 'none';
            content.style.display = 'block';

        }
    }, 1000); 
});
