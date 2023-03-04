var loading;
function loadingPage(){
    loading = setTimeout(showPage, 1000);
}

function showPage(){

    document.getElementById("loader").style.display = "none";

    document.getElementById("center").style.display = "none";

    document.getElementById("loading").style.display = "block";
}