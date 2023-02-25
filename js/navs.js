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



//for phone navigation
function openNav() {
  
  document.getElementById("myNav").style.display = "flex";
  document.getElementById("myNav").style.width = "100%";
	
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
	
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
