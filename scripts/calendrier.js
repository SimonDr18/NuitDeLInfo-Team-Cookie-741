var buts = document.getElementsByClassName('button');
alert(buts);
for(var i = 0; i < buts.length; i++){
    buts[i].addEventListener
    var num = buts[i].href.substr(-2);
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    alert(num);
    if(dd<10) {
        dd = '0'+dd;
    }
    if (dd < num || mm != '12'){
      buts[i].href = "#";
    }
}
