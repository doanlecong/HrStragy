var accordion_button = document.getElementsByClassName('accordion-button');

for( var i = 0; i < accordion_button.length ; i ++){
    accordion_button[i].onclick = function() {
        this.classList.toggle('is-open');
        var content = this.nextElementSibling;
        if(content.style.maxHeight) {
            content.style.maxHeight = null;
        } else {
            content.style.maxHeight = content.scrollHeight + 'px';
        }
    }
}