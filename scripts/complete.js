var complete_div = {
    createInput : function() {
        var completeContainer = document.getElementById("complete_data");
        completeContainer.style.display = "block";
        var error=0;
        error=(store.profil[0]["name"]=="")? error+1 : error;
        error=(store.profil[0]["email"]=="")? error+1 : error;
        error=(store.profil[0]["password"]=="")? error+1 : error;
        error=(store.profil[0]["password_repeat"]=="")? error+1 : error;
        error=(store.profil[0]["firstname"]=="")? error+1 : error;
        error=(store.profil[0]["familyname"]=="")? error+1 : error;
        error=(store.profil[0]["adress"]=="")? error+1 : error;
        error=(store.profil[0]["city"]=="")? error+1 : error;
        error=(store.profil[0]["country"]=="")? error+1 : error;
        if(error == 0) {                
            completeContainer.innerHTML = 
                "<li class='register' style='min-height:250px'>"+
                    "<div class='complete_text'>"+
                        "<br /><br /><br /><br />Registierung komplett!<br />"+
                        "Nachdem die Registrierung gesendet wurde, wird eine Bestätigungsemail<br />"+
                        "an "+store.profil[0]['email']+" gesendet!<br /><br />"+
                        "<div class='complete_button' onclick='transmission.sendData()'>Daten senden</div>"+                                                
                    "</div>"+
                "</li>";
        } else {
            completeContainer.innerHTML =
                "<li class='register' style='min-height:250px'>"+
                    "<div class='complete_text'>"+
                        "<br /><br /><br /><br /><div class='red'>Registierung fehlerhaft!</div><br />"+
                        "Anzahl der fehlenden Felder: "+error+"<br />"+
                        "Bitte fülle alle benötigten Felder aus!"+
                    "</div>"+
                "</li>";    
        }                                       
    }
}