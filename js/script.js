var keyword = document.getElementById('keyword');
var table = document.getElementById('table');
keyword.addEventListener('keyup',function(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            table.innerHTML = xhr.responseText;
        }
    };
    xhr.open('GET','ajax/mahasiswa.php?keyword=' + keyword.value,true);
    xhr.send();
});