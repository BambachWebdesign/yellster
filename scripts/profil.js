var marked = "";
var profil = {
    createInput : function(page) {
        var profilContainer = document.getElementById("profil_data");
        profilContainer.style.display = "block";
        var gender_marked1 = (store.profil[0]["gender"]==1)? "selected='selected'" : "";
        var gender_marked2 = (store.profil[0]["gender"]==2)? "selected='selected'" : "";
        var status_marked1 = (store.profil[0]["status"]==1)? "selected='selected'" : "";
        var status_marked2 = (store.profil[0]["status"]==2)? "selected='selected'" : "";
        var status_marked3 = (store.profil[0]["status"]==3)? "selected='selected'" : "";
        var status_marked4 = (store.profil[0]["status"]==4)? "selected='selected'" : "";
        var looking_for_marked1 = (store.profil[0]["looking_for"]==1)? "selected='selected'" : "";
        var looking_for_marked2 = (store.profil[0]["looking_for"]==2)? "selected='selected'" : "";
        var looking_for_marked3 = (store.profil[0]["looking_for"]==3)? "selected='selected'" : "";
        var language_marked1 = (store.profil[0]["language"]==1)? "selected='selected'" : "";
        var language_marked2 = (store.profil[0]["language"]==2)? "selected='selected'" : "";
        var profilHTML1 =
                    "<li class='register'><div class='input_text'>Benutzername:</div><input type='text' name='name' value='' size='30' onblur=check_name(this)><div id='result_name' class='result' /></div></li>"+
                    "<li class='register'><div class='input_text'>Emailadresse:</div><input type='text' name='email' value='' size='30' onblur='check_email(this)'><div id='result_email' class='result' /></div></li>"+
                    "<li class='register'><div class='input_text'>Passwort:</div><input type='password' name='password' value='' size='30' onblur='check_password(this)'><div id='result_password' class='result' /></div></li>"+
                    "<li class='register'><div class='input_text'>Passwort wiederholen:</div><input type='password' name='password_repeat' value='' size='30' onblur='check_password_repeat()' /><div id='result_password_repeat' class='result'></div></li>"+
                    "<li class='register'><div class='input_text'>Vorname:</div><input type='text' name='firstname' value='' size='30' onblur='check_normal(this)'><div id='result_firstname' class='result' /></div></li>"+
                    "<li class='register'><div class='input_text'>Nachname:</div><input type='text' name='familyname' value='' size='30' onblur='check_normal(this)'><div id='result_familyname' class='result' /></div></li>"+
                    "<li class='register'><div class='input_text'>Geburtstag:</div>"+
                        "<select name='birthday' size='1' onchange='check_birthdate(this,1)'>";
                            for(var d=1;d<=31;d++) {
                                marked = (store.profil[0]["birthday"]==d)? "selected" : "";
                                profilHTML1 = profilHTML1+"<option "+marked+" value="+d+">"+d+"</option>";
                            }
                            profilHTML1 = profilHTML1+
                        "</select>"+
                        "<select name='birthmonth' size='1' onchange='check_birthdate(this,2)'>";
                            for(var m=1;m<=12;m++) {
                                marked = (store.profil[0]["birthmonth"]==m)? "selected" : "";
                                profilHTML1 = profilHTML1+"<option "+marked+" value="+m+">"+m+"</option>";
                            }
                            profilHTML1 = profilHTML1+
                        "</select>"+
                        "<select name='birthyear' size='1' onchange='check_birthdate(this,3)'>";
                            for(var y=2010;y>=1900;y--) {
                                marked = (store.profil[0]["birthyear"]==y)? "selected" : "";
                                profilHTML1 = profilHTML1+"<option "+marked+" value="+y+">"+y+"</option>";
                            }
                            profilHTML1 = profilHTML1+
                        "</select>"+                      
                        "<div id='result_birthdate' class='result'></div>"+
                    "</li>"+
                    "<li class='register'><div class='input_text'>Geschlecht:</div>"+
                        "<select name='gender' size='1' onchange='check_gender(this.value)'>"+
                            "<option "+gender_marked1+" value='1'>weiblich</option>"+
                            "<option "+gender_marked2+" value='2'>m&auml;nnlich</option>"+
                        "</select>"+
                        "<div id='result_gender' class='result'></div>"+
                    "</li>";
        var profilHTML2 =
                    "<li class='register'><div class='input_text'>Status:</div>"+
                        "<select name='status' size='1' onchange='check_status(this.value)'>"+
                            "<option "+status_marked1+" value='1'>single</option>"+
                            "<option "+status_marked2+" value='2'>in einer Beziehung</option>"+
                            "<option "+status_marked3+" value='3'>verlobt</option>"+
                            "<option "+status_marked4+" value='4'>verheiratet</option>"+
                        "</select>"+
                        "<div id='status_with' style='visibility:hidden; display:inline'> mit <input type='text' name='status_with' value='' size='30' onkeyup='check_status_with(this.value)' onblur='check_status_with(this.value)' /></div>"+
                        "<div id='result_status' class='result' style='width:200px;'></div>"+
                    "</li>"+
                    "<li class='register'><div class='input_text'>Ich suche nach:</div>"+
                        "<select name='looking_for' size='1' onchange='check_looking_for(this.value)'>"+
                            "<option "+looking_for_marked1+" value='1'>neuen Freunden</option>"+
                            "<option "+looking_for_marked2+" value='2'>einer Beziehung</option>"+
                            "<option "+looking_for_marked3+" value='3'>nichts, ich stalk' hier nur</option>"+
                        "</select>"+
                        "<div id='result_looking_for' class='result' style='width:85px'></div>"+
                    "</li>"+
                    "<li class='register'><div class='input_text'>Sprachen:</div>"+
                        "<select name='language' size='1' onchange='check_language(this.value)'>"+
                            "<option "+language_marked1+" value='1'>deutsch</option>"+
                            "<option "+language_marked2+" value='2'>englisch</option>"+
                        "</select>"+
                        "<div id='result_language' class='result' style='width:85px'></div>"+
                    "</li>"+
                    "<li class='register'><div class='input_text'>Telefonnummer:</div><input type='text' name='phone' value='' size='30' onblur='check_phones(this)' /><div id='result_phone' class='result'></div></li>"+
                    "<li class='register'><div class='input_text'>Handynummer:</div><input type='text' name='mobilphone' value='' size='30' onblur='check_phones(this)' /><div id='result_mobilphone' class='result'></div></li>"+
                    "<li class='register'><div class='input_text'>Adresse:</div><input type='text' name='adress' value='' size='30' onblur='check_normal(this)' /><div id='result_adress' class='result'></div></li>"+
                    "<li class='register'><div class='input_text'>Wohnort:</div><input type='text' name='city' value='' size='30' onblur='check_normal(this)' /><div id='result_city' class='result'></div></li>"+
                    "<li class='register'><div class='input_text'>Land:</div><input type='text' name='country' value='' size='30' onblur='check_normal(this)' /><div id='result_country' class='result'></div></li>";
        profilContainer.innerHTML = (page==1)? profilHTML1 : profilHTML2;
    },
    loadData : function(page) {
        if(page==1) {
            document.registration.name.value               = store.profil[0]["name"];
            document.registration.email.value              = store.profil[0]["email"];
            document.registration.password.value           = store.profil[0]["password"];
            document.registration.password_repeat.value    = store.profil[0]["password_repeat"];
            document.registration.firstname.value          = store.profil[0]["firstname"];
            document.registration.familyname.value         = store.profil[0]["familyname"];
        }    
        if(page==2) {
            var status_with_div = document.getElementById("status_with");
                if(store.profil[0]["status"]>="2") {
                    document.registration.status_with.value = store.profil[0]["status_with"];
                    status_with_div.style.visibility = "visible";
                } else {
                    store.profil[0]["status_with"] = "";
                    document.registration.status_with.value = "";
                    status_with_div.style.visibility = "hidden";
                }                
            document.registration.phone.value       = store.profil[0]["phone"];
            document.registration.mobilphone.value  = store.profil[0]["mobilphone"];
            document.registration.adress.value      = store.profil[0]["adress"];
            document.registration.city.value        = store.profil[0]["city"];
            document.registration.country.value     = store.profil[0]["country"];
        } 
    }
}
function clear_value(id) {
    id.name.value = "";
}
function check_name(field) {
        var result_name = "result_"+field.name;
        var result_id = document.getElementById(result_name);
        var check_this = field.name+"="+field.value;
        var xmlhttpCheck_name = new ajaxRequest(
        "includes/register/check.php",
        function()
        {
            var CheckReady_name = xmlhttpCheck_name.req;
            if (CheckReady_name.readyState==4)
            {
                if(CheckReady_name.responseText==false) {
                    result_id.innerHTML = "<img src='images/register_check_false.gif' /><div class='check red'>Benutzername bereits vergeben!</div>";
                    
                } else {
                    result_id.innerHTML = "<img src='images/register_check_true.gif' /><div class='check green'>"+CheckReady_name.responseText+" ist noch frei!</div>";
                    field.value = CheckReady_name.responseText;
                    store.profil[0][field.name] = CheckReady_name.responseText;
                }
            }
        },
        "POST",
        check_this,
        ["Content-Type","application/x-www-form-urlencoded"]
        );
        xmlhttpCheck_name.doRequest();
}
function check_normal(field) {
        var result_name = "result_"+field.name;
        var result_id = document.getElementById(result_name);
        var check_this = field.name+"="+field.value;
        var xmlhttpCheck_normal = new ajaxRequest(
        "includes/register/check.php",
        function()
        {
            var CheckReady_normal = xmlhttpCheck_normal.req;
            if (CheckReady_normal.readyState==4)
            {
                if(CheckReady_normal.responseText==false) {
                    result_id.innerHTML = "<img src='images/register_check_false.gif' /><div class='check red'>Feld darf nicht leer sein!</div>";
                    field.value = "";
                } else {
                    result_id.innerHTML = "<img src='images/register_check_true.gif' /><div class='check green'></div>";
                    field.value = CheckReady_normal.responseText;
                    store.profil[0][field.name] = CheckReady_normal.responseText;
                }
            }
        },
        "POST",
        check_this,
        ["Content-Type","application/x-www-form-urlencoded"]
        );
        xmlhttpCheck_normal.doRequest();
}
function check_email(field) {
        var result_name = "result_"+field.name;
        var result_id = document.getElementById(result_name);
        var check_this = field.name+"="+field.value;
        var xmlhttpCheck_email = new ajaxRequest(
        "includes/register/check.php",
        function()
        {
            var CheckReady_email = xmlhttpCheck_email.req;
            if (CheckReady_email.readyState==4)
            {
                if(CheckReady_email.responseText=="1") {
                    result_id.innerHTML = "<img src='images/register_check_false.gif' /><div class='check red'>Emailadresse wird bereits verwendet!</div>";
                } else if(CheckReady_email.responseText=="2"){
                    result_id.innerHTML = "<img src='images/register_check_false.gif' /><div class='check red'>Keine gültige Emailadresse!</div>";
                } else if(CheckReady_email.responseText=="3"){
                    result_id.innerHTML = "<img src='images/register_check_false.gif' /><div class='check red'>Einweg-Emailadressen sind ungültig!</div>";
                } else if(CheckReady_email.responseText=="4"){
                    result_id.innerHTML = "<img src='images/register_check_false.gif' /><div class='check red'>Bitte eine Emailadresse eingeben!</div>";
                } else {
                    result_id.innerHTML = "<img src='images/register_check_true.gif' /><div class='check green'>Emailadresse ist noch frei!</div>";
                    field.value = CheckReady_email.responseText;
                    store.profil[0]["email"] = CheckReady_email.responseText;
                }
            }
        },
        "POST",
        check_this,
        ["Content-Type","application/x-www-form-urlencoded"]
        );
        xmlhttpCheck_email.doRequest();
}
function check_password(field) {
        var result_name = "result_"+field.name;
        var result_id = document.getElementById(result_name);
        var check_this = field.name+"="+field.value;
        var xmlhttpCheck_password = new ajaxRequest(
        "includes/register/check.php",
        function()
        {
            var CheckReady_password = xmlhttpCheck_password.req;
            if (CheckReady_password.readyState==4)
            {
                if(CheckReady_password.responseText=="0") {
                    result_id.innerHTML = "<img src='images/register_check_false.gif' /><div class='check red'>Bitte ein Password eingeben!</div>";
                } else if(CheckReady_password.responseText=="1"){
                    result_id.innerHTML = "<img src='images/register_check_false.gif' /><div class='check red'>Bitte mindestens 6 Zeichen eingeben!</div>";
                } else if(CheckReady_password.responseText=="2"){
                    result_id.innerHTML = "<img src='images/register_check_false.gif' /><div class='check red'>Passwortstärke zu schwach!</div>";
                } else if(CheckReady_password.responseText=="3"){
                    result_id.innerHTML = "<img src='images/register_check_middle.gif' /><div class='check orange'>Passwortstärke: mittel!</div>";
                    store.profil[0][field.name] = field.value;
                } else if(CheckReady_password.responseText=="4"){
                    result_id.innerHTML = "<img src='images/register_check_true.gif' /><div class='check green'>Passwortstärke: hoch!</div>";
                    store.profil[0][field.name] = field.value;
                }
            }
        },
        "POST",
        check_this,
        ["Content-Type","application/x-www-form-urlencoded"]
        );
        xmlhttpCheck_password.doRequest();
}
function check_password_repeat() {
    var password1 = document.registration.password.value;
    var password2 = document.registration.password_repeat.value;
    var result_id = document.getElementById("result_password_repeat");
    if(password1==password2) {
        result_id.innerHTML = "<img src='images/register_check_true.gif' /><div class='check green'>Passwort stimmt überein!</div>";    
        store.profil[0]["password_repeat"] = store.profil[0]["password"];
    } else {
        result_id.innerHTML = "<img src='images/register_check_false.gif' /><div class='check red'>Passwort stimmt nicht überein!</div>";
        store.profil[0]["password"] = "";
        store.profil[0]["password_repeat"] = "";
    }
}
function check_birthdate(selector,number) {
        if(number=="1"){store.profil[0]["birthday"] = selector.value;}
        if(number=="2"){store.profil[0]["birthmonth"] = selector.value;}
        if(number=="3"){store.profil[0]["birthyear"] = selector.value;}
        var result_id = document.getElementById("result_birthdate");
        var check_this ="birthday="+store.profil[0]["birthday"]+
                        "&birthmonth="+store.profil[0]["birthmonth"]+
                        "&birthyear="+store.profil[0]["birthyear"];
        var xmlhttpCheck_birthdate = new ajaxRequest(
        "includes/register/check.php",
        function()
        {
            var CheckReady_birthdate = xmlhttpCheck_birthdate.req;
            if (CheckReady_birthdate.readyState==4)
            {
                if(CheckReady_birthdate.responseText==false) {
                    result_id.innerHTML = "<img src='images/register_check_false.gif' /><div class='check red'>Datum existiert nicht!</div>";
                    store.profil[0]["birthday"]   = "1";
                    store.profil[0]["birthmonth"] = "1";
                    store.profil[0]["birthyear"]  = "2010";
                } else {
                    result_id.innerHTML = "<img src='images/register_check_true.gif' /><div class='check green'>Datum ist korrekt!</div>";
                }
            }
        },
        "POST",
        check_this,
        ["Content-Type","application/x-www-form-urlencoded"]
        );
        xmlhttpCheck_birthdate.doRequest();
}
function check_status(status_value) {
        var result_id = document.getElementById("result_status");
        var status_with_id = document.getElementById("status_with");
        store.profil[0]["status"] = status_value; 
        if(status_value>="2") {
            status_with_id.style.visibility="visible";
            result_id.innerHTML = "";
        } else {
            status_with_id.style.visibility="hidden";
            result_id.innerHTML = "";
        }
}
function check_status_with(status_with_value) {
        var result_id = document.getElementById("result_status");
        var check_this ="status_with="+status_with_value;
        var xmlhttpCheck_status_with = new ajaxRequest(
        "includes/register/check.php",
        function()
        {
            var CheckReady_status_with = xmlhttpCheck_status_with.req;
            if (CheckReady_status_with.readyState==4)
            {
                if(CheckReady_status_with.responseText==false) {
                    result_id.innerHTML = "<img src='images/register_check_false.gif' /><div class='check red' style='width:170px'></div>";
                } else {
                    result_id.innerHTML = "<img src='images/register_check_true.gif' /><div class='check green' style='width:170px'>"+CheckReady_status_with.responseText+"</div>";
                    store.profil[0]["status_with"] = status_with_value;
                }
            }
        },
        "POST",
        check_this,
        ["Content-Type","application/x-www-form-urlencoded"]
        );
        xmlhttpCheck_status_with.doRequest();
}
function check_phones(field) {
        var check_this = field.name+"="+field.value;
        var xmlhttpCheck_phones = new ajaxRequest(
        "includes/register/check.php",
        function()
        {
            var CheckReady_phones = xmlhttpCheck_phones.req;
            if (CheckReady_phones.readyState==4){
                field.value = CheckReady_phones.responseText;
                store.profil[0][field.name] = CheckReady_phones.responseText;
            }
        },
        "POST",
        check_this,
        ["Content-Type","application/x-www-form-urlencoded"]
        );
        xmlhttpCheck_phones.doRequest();
}
function check_gender(field_value) {
    store.profil[0]["gender"] = field_value;  
} 
function check_looking_for(field_value){
    store.profil[0]["looking_for"] = field_value;    
}
function check_language(field_value) {
    store.profil[0]["language"] = field_value;    
}