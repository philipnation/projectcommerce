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
