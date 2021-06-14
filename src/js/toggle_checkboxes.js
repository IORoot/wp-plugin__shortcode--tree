function toggle_checkboxes(bx) {
    var cbs = document.getElementsByTagName('input');
    for(var i=0; i < cbs.length; i++) {
        if(cbs[i].type == 'checkbox') {
            cbs[i].checked = bx.checked;
        }
    }
}

/**
 * Listen for checkbox click resize header_1 and open header_2
 */
const lvl1_rows = document.querySelectorAll('.lvl1_row');
for (const lvl1_row of lvl1_rows) {
    lvl1_row.addEventListener('click', function(event) {
        var categories = document.querySelector('.header_1');
        if (categories !== null){
            categories.classList.remove('flex-1');
        }
    
        var series = document.querySelector('.header_2');
        if (series !== null){
            series.classList.remove('hidden');
        }
    })
}

/**
 * Listen for any checkbox and open header_3
 */
const lvl2_rows = document.querySelectorAll('.lvl2_row');
for (const lvl2_row of lvl2_rows) {
    lvl2_row.addEventListener('click', function(event) {
        var episodes = document.querySelector('.header_3');
        if (episodes !== null){
            episodes.classList.remove('hidden');
        }
    })
}