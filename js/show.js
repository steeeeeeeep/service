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


$(function(){
    $('#box1').on('click', function(){
        $('#con1').slideDown(1000);
        $('#con2').hide();
        $('#con3').hide();
    });
    $('#box2').on('click', function(){
        $('#con1').hide();
        $('#con2').slideDown(1000);
        $('#con3').hide();
    });
    $('#box3').on('click', function(){
        $('#con1').hide();
        $('#con2').hide();
        $('#con3').slideDown(1000);
    });
});