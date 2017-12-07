
game = document.getElementById('game');
game.addEventListener('mouseout',function(e){
  // alert('YOU LOSE !');
});
game.addEventListener('mousemove',function(e){
  var x = e.clientX;
  var y = e.clientY;
  var p = document.getElementById("Bougez moi !");
  p.style.left = x - 2.5 ;
  p.style.top = y - 2.5;
});

walls = document.getElementsByClassName('wall');
for(var i=0;i<walls.length;i++){
    walls[i].addEventListener('mouseover',function(e){
    alert('YOU LOSE !');
    // document.location.href = "testMouseGame.html";
  });
}

f = document.getElementById('finish');
f.addEventListener('mouseover',function(e){
  alert("Bravo, vous avez gagné !");
  document.location.href = "testKonami.html";
});
