var marked = "";
var secure = {
    createInput : function(page) {
        var secureContainer = document.getElementById("secure_data");
        secureContainer.style.display = "block";
        var fullname_marked1 = (store.secure[0]["fullname_s"]==1)? "checked='checked'" : "";
        var fullname_marked2 = (store.secure[0]["fullname_s"]==2)? "checked='checked'" : "";
        var fullname_marked3 = (store.secure[0]["fullname_s"]==3)? "checked='checked'" : "";
        var gender_marked1 = (store.secure[0]["gender_s"]==1)? "checked='checked'" : "";
        var gender_marked2 = (store.secure[0]["gender_s"]==2)? "checked='checked'" : "";
        var gender_marked3 = (store.secure[0]["gender_s"]==3)? "checked='checked'" : "";
        var status_marked1 = (store.secure[0]["status_s"]==1)? "checked='checked'" : "";
        var status_marked2 = (store.secure[0]["status_s"]==2)? "checked='checked'" : "";
        var status_marked3 = (store.secure[0]["status_s"]==3)? "checked='checked'" : "";
        var looking_for_marked1 = (store.secure[0]["looking_for_s"]==1)? "checked='checked'" : "";
        var looking_for_marked2 = (store.secure[0]["looking_for_s"]==2)? "checked='checked'" : "";
        var looking_for_marked3 = (store.secure[0]["looking_for_s"]==3)? "checked='checked'" : "";
        var language_marked1 = (store.secure[0]["language_s"]==1)? "checked='checked'" : "";
        var language_marked2 = (store.secure[0]["language_s"]==2)? "checked='checked'" : "";
        var language_marked3 = (store.secure[0]["language_s"]==3)? "checked='checked'" : "";
        var email_marked1 = (store.secure[0]["email_s"]==1)? "checked='checked'" : "";
        var email_marked2 = (store.secure[0]["email_s"]==2)? "checked='checked'" : "";
        var email_marked3 = (store.secure[0]["email_s"]==3)? "checked='checked'" : "";
        var phone_marked1 = (store.secure[0]["phone_s"]==1)? "checked='checked'" : "";
        var phone_marked2 = (store.secure[0]["phone_s"]==2)? "checked='checked'" : "";
        var phone_marked3 = (store.secure[0]["phone_s"]==3)? "checked='checked'" : "";
        var mobilphone_marked1 = (store.secure[0]["mobilphone_s"]==1)? "checked='checked'" : "";
        var mobilphone_marked2 = (store.secure[0]["mobilphone_s"]==2)? "checked='checked'" : "";
        var mobilphone_marked3 = (store.secure[0]["mobilphone_s"]==3)? "checked='checked'" : "";
        var adress_marked1 = (store.secure[0]["adress_s"]==1)? "checked='checked'" : "";
        var adress_marked2 = (store.secure[0]["adress_s"]==2)? "checked='checked'" : "";
        var adress_marked3 = (store.secure[0]["adress_s"]==3)? "checked='checked'" : "";
        var city_marked1 = (store.secure[0]["city_s"]==1)? "checked='checked'" : "";
        var city_marked2 = (store.secure[0]["city_s"]==2)? "checked='checked'" : "";
        var city_marked3 = (store.secure[0]["city_s"]==3)? "checked='checked'" : "";
        var country_marked1 = (store.secure[0]["country_s"]==1)? "checked='checked'" : "";
        var country_marked2 = (store.secure[0]["country_s"]==2)? "checked='checked'" : "";
        var country_marked3 = (store.secure[0]["country_s"]==3)? "checked='checked'" : "";
        var interests_marked1 = (store.secure[0]["interests_s"]==1)? "checked='checked'" : "";
        var interests_marked2 = (store.secure[0]["interests_s"]==2)? "checked='checked'" : "";
        var interests_marked3 = (store.secure[0]["interests_s"]==3)? "checked='checked'" : "";
        var groups_marked1 = (store.secure[0]["groups_s"]==1)? "checked='checked'" : "";
        var groups_marked2 = (store.secure[0]["groups_s"]==2)? "checked='checked'" : "";
        var groups_marked3 = (store.secure[0]["groups_s"]==3)? "checked='checked'" : "";
        var friendlist_marked1 = (store.secure[0]["friendlist_s"]==1)? "checked='checked'" : "";
        var friendlist_marked2 = (store.secure[0]["friendlist_s"]==2)? "checked='checked'" : "";
        var friendlist_marked3 = (store.secure[0]["friendlist_s"]==3)? "checked='checked'" : "";
        var secureHTML1 = 
                    "<li class='register'>"+
                        "<div class='input_text' style='width:300px'>Vollen Namen anzeigen für:</div>"+
                            "<input "+fullname_marked1+" type='radio' name='fullname_s' value='1' onchange='secure.store(this)' />Niemanden "+
                            "<input "+fullname_marked2+" type='radio' name='fullname_s' value='2' onchange='secure.store(this)' />Freunde "+
                            "<input "+fullname_marked3+" type='radio' name='fullname_s' value='3' onchange='secure.store(this)' />Registrierte "+
                        "<div class='result'></div>"+
                    "</li>"+
                    "<li class='register'>"+
                        "<div class='input_text' style='width:300px'>Dein Geschlecht anzeigen für:</div>"+
                            "<input "+gender_marked1+" type='radio' name='gender_s' value='1' onchange='secure.store(this)' />Niemanden "+
                            "<input "+gender_marked2+" type='radio' name='gender_s' value='2' onchange='secure.store(this)' />Freunde "+
                            "<input "+gender_marked3+" type='radio' name='gender_s' value='3' onchange='secure.store(this)' />Registrierte "+
                        "<div class='result'></div>"+
                    "</li>"+
                    "<li class='register'>"+
                        "<div class='input_text' style='width:300px'>Deinen Status anzeigen für:</div>"+
                            "<input "+status_marked1+" type='radio' name='status_s' value='1' onchange='secure.store(this)' />Niemanden "+
                            "<input "+status_marked2+" type='radio' name='status_s' value='2' onchange='secure.store(this)' />Freunde "+
                            "<input "+status_marked3+" type='radio' name='status_s' value='3' onchange='secure.store(this)' />Registrierte "+
                        "<div class='result'></div>"+
                    "</li>"+
                    "<li class='register'>"+
                        "<div class='input_text' style='width:300px'>Deine \"Suche nach\" anzeigen für:</div>"+
                            "<input "+looking_for_marked1+" type='radio' name='looking_for_s' value='1' onchange='secure.store(this)' />Niemanden "+
                            "<input "+looking_for_marked2+" type='radio' name='looking_for_s' value='2' onchange='secure.store(this)' />Freunde "+
                            "<input "+looking_for_marked3+" type='radio' name='looking_for_s' value='3' onchange='secure.store(this)' />Registrierte "+
                        "<div class='result'></div>"+
                    "</li>"+
                    "<li class='register'>"+
                        "<div class='input_text' style='width:300px'>Deine Sprachen anzeigen für:</div>"+
                            "<input "+language_marked1+" type='radio' name='language_s' value='1' onchange='secure.store(this)' />Niemanden "+
                            "<input "+language_marked2+" type='radio' name='language_s' value='2' onchange='secure.store(this)' />Freunde "+
                            "<input "+language_marked3+" type='radio' name='language_s' value='3' onchange='secure.store(this)' />Registrierte "+
                        "<div class='result'></div>"+
                    "</li>"+
                    "<li class='register'>"+
                        "<div class='input_text' style='width:300px'>Deine Email anzeigen für:</div>"+
                            "<input "+email_marked1+" type='radio' name='email_s' value='1' onchange='secure.store(this)' />Niemanden "+
                            "<input "+email_marked2+" type='radio' name='email_s' value='2' onchange='secure.store(this)' />Freunde "+
                            "<input "+email_marked3+" type='radio' name='email_s' value='3' onchange='secure.store(this)' />Registrierte "+
                        "<div class='result'></div>"+
                    "</li>"+
                    "<li class='register'>"+
                        "<div class='input_text' style='width:300px'>Deine Telefonnummer anzeigen für:</div>"+
                            "<input "+phone_marked1+" type='radio' name='phone_s' value='1' onchange='secure.store(this)' />Niemanden "+
                            "<input "+phone_marked2+" type='radio' name='phone_s' value='2' onchange='secure.store(this)' />Freunde "+
                            "<input "+phone_marked3+" type='radio' name='phone_s' value='3' onchange='secure.store(this)' />Registrierte "+
                        "<div class='result'></div>"+
                    "</li>";
        var secureHTML2 =
                    "<li class='register'>"+
                        "<div class='input_text' style='width:300px'>Deine Handynummer anzeigen für:</div>"+
                            "<input "+mobilphone_marked1+" type='radio' name='mobilphone_s' value='1' onchange='secure.store(this)' />Niemanden "+
                            "<input "+mobilphone_marked2+" type='radio' name='mobilphone_s' value='2' onchange='secure.store(this)' />Freunde "+
                            "<input "+mobilphone_marked3+" type='radio' name='mobilphone_s' value='3' onchange='secure.store(this)' />Registrierte "+
                        "<div class='result'></div>"+
                    "</li>"+
                    "<li class='register'>"+
                        "<div class='input_text' style='width:300px'>Deine Adresse anzeigen für:</div>"+
                            "<input "+adress_marked1+" type='radio' name='adress_s' value='1' onchange='secure.store(this)' />Niemanden "+
                            "<input "+adress_marked2+" type='radio' name='adress_s' value='2' onchange='secure.store(this)' />Freunde "+
                            "<input "+adress_marked3+" type='radio' name='adress_s' value='3' onchange='secure.store(this)' />Registrierte "+
                        "<div class='result'></div>"+
                    "</li>"+
                    "<li class='register'>"+
                        "<div class='input_text' style='width:300px'>Deinen Wohnort anzeigen für:</div>"+
                            "<input "+city_marked1+" type='radio' name='city_s' value='1' onchange='secure.store(this)' />Niemanden "+
                            "<input "+city_marked2+" type='radio' name='city_s' value='2' onchange='secure.store(this)' />Freunde "+
                            "<input "+city_marked3+" type='radio' name='city_s' value='3' onchange='secure.store(this)' />Registrierte "+
                        "<div class='result'></div>"+
                    "</li>"+
                    "<li class='register'>"+
                        "<div class='input_text' style='width:300px'>Dein Land anzeigen für:</div>"+
                            "<input "+country_marked1+" type='radio' name='country_s' value='1' onchange='secure.store(this)' />Niemanden "+
                            "<input "+country_marked2+" type='radio' name='country_s' value='2' onchange='secure.store(this)' />Freunde "+
                            "<input "+country_marked3+" type='radio' name='country_s' value='3' onchange='secure.store(this)' />Registrierte "+
                        "<div class='result'></div>"+
                    "</li>"+
                    "<li class='register'>"+
                        "<div class='input_text' style='width:300px'>Deine Interessen anzeigen für:</div>"+
                            "<input "+interests_marked1+" type='radio' name='interests_s' value='1' onchange='secure.store(this)' />Niemanden "+
                            "<input "+interests_marked2+" type='radio' name='interests_s' value='2' onchange='secure.store(this)' />Freunde "+
                            "<input "+interests_marked3+" type='radio' name='interests_s' value='3' onchange='secure.store(this)' />Registrierte "+
                        "<div class='result'></div>"+
                    "</li>"+
                    "<li class='register'>"+
                        "<div class='input_text' style='width:300px'>Deine Gruppen anzeigen für:</div>"+
                            "<input "+groups_marked1+" type='radio' name='groups_s' value='1' onchange='secure.store(this)' />Niemanden "+
                            "<input "+groups_marked2+" type='radio' name='groups_s' value='2' onchange='secure.store(this)' />Freunde "+
                            "<input "+groups_marked3+" type='radio' name='groups_s' value='3' onchange='secure.store(this)' />Registrierte "+
                        "<div class='result'></div>"+
                    "</li>"+
                    "<li class='register'>"+
                        "<div class='input_text' style='width:300px'>Deine Freundesliste anzeigen für:</div>"+
                            "<input "+friendlist_marked1+" type='radio' name='friendlist_s' value='1' onchange='secure.store(this)' />Niemanden "+
                            "<input "+friendlist_marked2+" type='radio' name='friendlist_s' value='2' onchange='secure.store(this)' />Freunde "+
                            "<input "+friendlist_marked3+" type='radio' name='friendlist_s' value='3' onchange='secure.store(this)' />Registrierte "+
                        "<div class='result'></div>"+
                    "</li>";        
        secureContainer.innerHTML = (page==1)? secureHTML1 : secureHTML2;
    },
    store : function(field) {       
        store.secure[0][field.name] = field.value;
    }
}
