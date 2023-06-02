const sideffect = document.querySelector('#sideffect');
const sidebareffect = document.querySelector('.sidebar');

function handleClick(event) {
  if(sidebareffect.style.display == "none"){
    sidebareffect.style.display = "block"
  }
  else{
    sidebareffect.style.display = "none"
  }
}
sideffect.addEventListener('click', handleClick);

window.addEventListener('scroll', function() {
  var element = document.querySelector('.nav');
  var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;

  if (scrollTop !== 0) {
    element.classList.add('scrolled');
  } else {
    element.classList.remove('scrolled');
  }
});
// js for profile dropdown//
function showProfile(){
  var profile_btn = document.getElementById('profile_btn');
  var profile_dropdown = document.getElementById('profile_dropdown');
  if(profile_dropdown.style.display == 'inline-block'){
    profile_dropdown.style.display = 'none';
  }
  else{
    profile_dropdown.style.display = 'inline-block';
  }
}
//js for image update//
var loadFile = function(event) {
  var image = document.getElementById('output');
  image.src = URL.createObjectURL(event.target.files[0]);
};
function box() {
  var mark = document.getElementById("mark");
  var box = document.getElementById("box");
  if (box.style.display == "inline-block") {
    box.style.display = "none";
  } else {
    box.style.display = "inline-block";
  }
};