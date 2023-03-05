//web navigation bar
window.onscroll = function() {myFunction1()};

var header = document.getElementById("topnav");
var sticky = header.offsetTop;

function myFunction1() {
  if (window.pageYOffset >= sticky) {
    topnav.classList.add("sticky")
  } else {
    topnav.classList.remove("sticky");
  }
}


function PSvisible() {
  var x = document.getElementById("floatingPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function visibleList(){
  document.getElementById('service-category').style.display='block';
}
function visibleList1(){
  document.getElementById('y','u').style.display='block';
}

function click(){
var items = document.querySelectorAll("#service-category p");
for (var i=0; i<items.value; i++){
  items[i].onclick = function()
  {
    document.getElementById('txt').value = this.innerHTML;
  };
}}
