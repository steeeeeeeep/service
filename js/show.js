function showMsg(){

    var container1 = document.getElementById('container1');
    var container2 = document.getElementById('container2');

    
        if (container1.style.display === "flex") {
            container1.style.display = "none";
        } else {
            container1.style.display = "flex";
        }
    }


function show1(){

    if(container1.style.display == "block"){
        container1.style.display = "none";
        container2.style.display = "block";
    }
    }
function show2(){

    document.getElementById('container3').style.display = "block"
    document.getElementById('container2').style.display = "none"
    }