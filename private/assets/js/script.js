const navbars = document.querySelector("#nav-bars")
const aside = document.querySelector(".aside")
navbars.addEventListener("click", function(){
    if(aside.style.display == 'block'){
        aside.style.display = 'none'
    }
    else{
        aside.style.display = 'block'
    }
})

const close_footer = document.querySelector(".close-footer")
const cart_footer = document.querySelector(".cart-footer")
close_footer.addEventListener("click", function(){
    if(cart_footer.style.height != '30px'){
        cart_footer.style.height = '30px'
        close_footer.innerText = 'show'
    }
    else{
        cart_footer.style.height = '200px'
        close_footer.innerText = 'close'
    }
})