function toggle_checkboxes(bx) {
    var cbs = document.getElementsByTagName('input');
    for(var i=0; i < cbs.length; i++) {
        if(cbs[i].type == 'checkbox') {
            cbs[i].checked = bx.checked;
        }
    }
}

document.addEventListener("input", function(evnt){
    var episodes = document.querySelector('.header_3');
    episodes.classList.remove('hidden');
});