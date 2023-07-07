const sideffect = document.querySelector('#sideffect');
const sidebareffect = document.querySelector('.sidebar');

sideffect.addEventListener('click', function(){
  if(sidebareffect.style.display == "block"){
    sidebareffect.style.display = "none"
  }
  else{
    sidebareffect.style.display = "block"
  }
});

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

function search(array, value) {
  for (let i = 0; i < array.length; i++) {
    if (array[i] === value) {
      return i; // Return the index of the value if found
    }
  }
  return -1; // Return -1 if the value is not found
}

function handleSearch() {
  const categories = ['gaming', 'utility', '300', 40, 50];
  const searchValue = document.getElementById('searchInput').value;

  const result = search(categories, searchValue);
  if (result !== -1) {
    document.getElementById('result').innerHTML = `Value ${searchValue} found at index ${result}`;
  } else {
    document.getElementById('result').innerHTML = `Item ${searchValue} was not found`;
  }
}

//changing/updating of image js//
const profileImageInput = document.getElementById('profile-image');
const previewImage = document.getElementById('preview-image');

profileImageInput.addEventListener('change', (event) => {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = () => {
      previewImage.src = reader.result;
      previewImage.style.display = 'block';
    };
    reader.readAsDataURL(file);
  }
});


//view java//
function payment(){
  var payBtn = document.getElementById('paymentBtn');
  var shipping = document.getElementById('shipping-cont');
  var payment = document.getElementById('payment-cont');
  if(payment.style.display = 'flex'){
    shipping.style.display = 'none';
  }
  else{
    payment.style.display = 'none';
  }
}

function shipping(){
  var shipping = document.getElementById('shipping-cont');
  var payment = document.getElementById('payment-cont');
  if(shipping.style.display = 'flex'){
    payment.style.display = 'none';
  }
  else{
    shipping.style.display = 'none';
  }
}

function decline(){
  document.getElementById("decline-reason").style.display = 'block'
}