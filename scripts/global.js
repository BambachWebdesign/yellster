function clear_search_results() {
        var search_results = document.getElementById("search_results");
        search_results.style.display = "none";
        search_results.innerHTML = "";
}
function clean(field){
    field.value = "";
}
function toggle_visibility(id){
    var toggle_id = document.getElementById(id);
    var get_status = toggle_id.style.display;
    if(get_status=="none"){
        toggle_id.style.display="block";
    } else {
        toggle_id.style.display="none";
    }
}
  