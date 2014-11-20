var birthday_selected = "0";
var birthmonth_selected = "0";
var birthyear_selected = "0";
function clean(field){
    field.value = "";
}
var create = {
    node : "",
    init : function() {
        this.node = document.body;
        this.logo();
    },
    logo : function() {
        var logo = document.createElement("div");
        logo.setAttribute("id","logo");
        this.node.appendChild(logo);
        this.registration();
    },
    registration : function() {
        var register = document.createElement("div");
        register.setAttribute("id","register");
        register.setAttribute("class","container");
        this.node.appendChild(register);
        var register_div = document.getElementById("register");
        register_div.innerHTML =
            "<div class='container_headline' id='container_headline'></div>"+
            "<form name='registration' enctype='multipart/form-data' method='POST'>"+
            "<div class='container_content' id='profil_data'></div>"+
            "<div class='container_content' id='secure_data'></div>"+
            "<div class='container_content' id='picture_data'></div>"+
            "<div class='container_content' id='complete_data'></div>"+
            "</form>";
        this.profil(1);
    },    
    profil : function(page) {
        var headline_div = document.getElementById("container_headline");                
            if(page==1) {
                headline_div.innerHTML =
                "<div id='headline'>Registrierung // Profildaten</div>"+
                "<div class='navigation_button align_right' onclick='create.profil(2)'>weiter >></div>";
                profil.createInput(page);
                profil.loadData(1);    
            } else if(page==2){
                headline_div.innerHTML =
                "<div class='navigation_button align_left' onclick='create.profil(1)'><< zur¸ck</div>"+
                "<div id='headline'>Registrierung // Profildaten</div>"+
                "<div class='navigation_button align_right' onclick='remove.profil(); create.secure(1);'>weiter >></div>";
                profil.createInput(page);
                profil.loadData(2);
            }    
    },
    secure : function(page) {
        var headline_div = document.getElementById("container_headline");
            if(page==1) {
                headline_div.innerHTML =
                "<div class='navigation_button align_left' onclick='remove.secure(); create.profil(2);'><< zur¸ck</div>"+
                "<div id='headline'>Registrierung // Privatsph‰re</div>"+
                "<div class='navigation_button align_right' onclick='create.secure(2)'>weiter >></div>";
                secure.createInput(1);
            } else if(page==2) {
                headline_div.innerHTML =
                "<div class='navigation_button align_left' onclick='create.secure(1);'><< zur¸ck</div>"+
                "<div id='headline'>Registrierung // Privatsph‰re</div>"+
                "<div class='navigation_button align_right' onclick='remove.secure(); create.picture()'>weiter >></div>";
                secure.createInput(2);
            }
    },
    picture : function() {
                var headline_div = document.getElementById("container_headline");
                headline_div.innerHTML =
                "<div class='navigation_button align_left' onclick='remove.picture(); create.secure(2);'><< zur¸ck</div>"+
                "<div id='headline'>Registrierung // Profilbild</div>"+
                "<div class='navigation_button align_right' onclick='remove.picture(); create.complete()'>weiter >></div>";
                check_picture();
                pictureCheckTimer = setInterval('check_picture()',1000); 
                picture_div.createInput();
                   
    },
    complete : function() {
                var headline_div = document.getElementById("container_headline");
                headline_div.innerHTML =
                "<div class='navigation_button align_left' onclick='remove.complete(); create.picture();'><< zur¸ck</div>"+
                "<div id='headline'>Registrierung abschlieﬂen</div>";
                complete_div.createInput();
    }
    
}
var remove = {
    profil : function() {
        var removeIt = document.getElementById("profil_data");
        removeIt.style.display = "none";            
    },
    secure: function() {
        var removeIt = document.getElementById("secure_data");
        removeIt.style.display = "none";    
    },
    picture: function() {
        var removeIt = document.getElementById("picture_data");
        removeIt.style.display = "none";
        clearTimeout(pictureCheckTimer);
    },
    complete: function() {
        var removeIt = document.getElementById("complete_data");
        removeIt.style.display = "none";
    }
}

var transmission = {
    sendData : function(){
        var response = document.getElementById("complete_data")
        var user_name=store.profil[0]["name"];
        var user_pw=store.profil[0]["password"];
        var transmissionData =
            "user_name="+user_name+
            "&user_pw="+user_pw+
            "&user_firstname="+store.profil[0]['firstname']+
            "&user_familyname="+store.profil[0]['familyname']+
            "&user_birthday="+store.profil[0]['birthday']+
            "&user_birthmonth="+store.profil[0]['birthmonth']+
            "&user_birthyear="+store.profil[0]['birthyear']+
            "&user_gender="+store.profil[0]['gender']+
            "&user_status="+store.profil[0]['status']+
            "&user_status_with="+store.profil[0]['status_with']+
            "&user_lookingfor="+store.profil[0]['looking_for']+
            "&user_language="+store.profil[0]['language']+
            "&user_email="+store.profil[0]['email']+
            "&user_phone="+store.profil[0]['phone']+
            "&user_mobilphone="+store.profil[0]['mobilphone']+
            "&user_adress="+store.profil[0]['adress']+
            "&user_city="+store.profil[0]['city']+
            "&user_country="+store.profil[0]['country']+
            "&options_public_fullname="+store.secure[0]['fullname_s']+
            "&options_public_birthday="+store.secure[0]['birthday_s']+
            "&options_public_gender="+store.secure[0]['gender_s']+
            "&options_public_status="+store.secure[0]['status_s']+
            "&options_public_lookingfor="+store.secure[0]['looking_for_s']+
            "&options_public_language="+store.secure[0]['language_s']+
            "&options_public_email="+store.secure[0]['email_s']+
            "&options_public_phone="+store.secure[0]['phone_s']+
            "&options_public_mobilphone="+store.secure[0]['mobilphone_s']+
            "&options_public_adress="+store.secure[0]['adress_s']+
            "&options_public_city="+store.secure[0]['city_s']+
            "&options_public_country="+store.secure[0]['country_s']+
            "&options_public_interests="+store.secure[0]['interests_s']+
            "&options_public_groups="+store.secure[0]['groups_s']+
            "&options_public_friendlist="+store.secure[0]['friendlist_s'];            
        var xmlhttpSendData = new ajaxRequest(
        "includes/register/sendData.php",
        function()
        {
            var sendDataReady = xmlhttpSendData.req;
            if (sendDataReady.readyState==4)
            {                
                response.innerHTML = sendDataReady.responseText;
            }
        },
        "POST",
        transmissionData,
        ["Content-Type","application/x-www-form-urlencoded"]
        );
        xmlhttpSendData.doRequest();
    }
}