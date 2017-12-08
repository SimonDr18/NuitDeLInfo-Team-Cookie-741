setTimeout(function(e){
  var ee = document.getElementById('easterEgg')
  ee.className = "transition";
}, 2000);

setTimeout(function(e){
  document.getElementById('etNon').style.opacity="1";
  document.getElementById('etNon').style.visibility = "visible";
}, 2500);

setTimeout(function(e){
  document.getElementById('etNon').className = "transition";
},3000)

setTimeout(function(e){
  document.getElementById('groupeComplet').style.opacity="1";
  document.getElementById('groupeComplet').style.visibility = "visible";
},3500)
