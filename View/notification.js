var box = document.getElementById('box');
var down = false;

function toggleNotifi(){
    if(down){
        box.style.height = '0px';
        box.style.opacity = 0;
        down = false;
        var items = document.getElementsByClassName('notifi-item');
        for (let item of items) {
            item.style.display = 'none';
        };
    }
    else{
        box.style.height = '510px';
        box.style.opacity = 1;
        down = true;
        var items = document.getElementsByClassName('notifi-item');
        for (let item of items) {
            item.style.display = 'flex';
        };
    }
}