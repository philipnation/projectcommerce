function expand(){
    var expand = document.getElementById('expand');
    if(expand.v){}
}

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