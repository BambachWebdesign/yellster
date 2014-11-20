var content_created = false;
var alert_created = false;
var online_div_created = false;
var myYells_div_created = false;
var otherYells_div_created = false;
var question_created = false;
var current_yell_id = 1;
var create = {
    node : "",
    init : function() {
        this.node = document.body;    
    },
    login : function(antispam) {
            var l = document.createElement("div");
            l.setAttribute("id","content");
            l.setAttribute("class","content align_center");
            this.node.appendChild(l);
            var lContent = document.getElementById("content");
            lContent.innerHTML =                      
            "<div id='logo_login' class='align_center valign_top'></div>"+       
            "<div id='login' class='align_center'>"+
                "<fieldset>"+
                    "<legend>Login</legend>"+
                    "<form id='noSpaces' method='POST' action='index.php'>"+
                        "Login:<br />"+
                        "<input type='text' class='standardField' name='login' size='25' maxLength='50' /><br />"+
                        "Password:<br />"+
                        "<input type='password' class='standardField' name='password' size='25' maxLength='50' /><br />"+
                        "<input type='hidden' name='login_done' value='1' />"+
                        "<input type='hidden' name='antispam' value='"+antispam+"' />"+
                        "<input type='submit' onFocus='blur();' class='loginButton' name='doLogin' value='Anmelden' />"+           
                        "<input type='reset' onFocus='blur();' class='loginButton' name='reset' value='L&ouml;schen' />"+
                    "</form>"+
                "</fieldset>"+
            "</div>";
    },
    header : function() {
        if(content_created!=true)
        {
            var h = document.createElement("div");
            h.setAttribute("id","header");
            this.node.appendChild(h);
            var hContent = document.getElementById("header");
            hContent.innerHTML =             
            "<div id='logo' class='align_center valign_top'></div>"+                      
            "<div id='watermark'></div>";
            
            var m = document.createElement("div");
            m.setAttribute("id","menu");
            m.setAttribute("class","align_left valign_top");
            this.node.appendChild(m);
            var mContent = document.getElementById("menu");
            mContent.innerHTML =
                "<div id='menuButton'></div>"+
                "<div id='menuDropdown' class='menuDropdown'>"+
                    "<li id='menu_item_1' class='menu' onclick='remove.myYells_div()'>Nachrichten</li>"+
                    "<li id='menu_item_2' class='menu' onclick='create.myYells_div()'>Startseite</li>"+
                    "<li id='menu_item_3' class='menu' onclick='create.online_div()'>Ansicht</li>"+
                    "<a href='index.php?logout'><li id='menu_item_4' class='menu'>Ausloggen</li></a>"+
                "</div>"+
                "<div id='tasks'></div>";
                
            var t = document.createElement("div");
            t.setAttribute("id","tasks");
            this.node.appendChild(t);
            var tContent = document.getElementById("tasks");
            tContent.innerHTML = "";
            
            var search_div = document.createElement("div");
            search_div.setAttribute("id","search");
            this.node.appendChild(search_div);
            var search_divContent = document.getElementById("search");
            search_divContent.innerHTML = 
                "<form>"+
                "<textarea name='search_value' cols='40' rows='1' onfocus='clean(this)' onblur='setTimeout(clear_search_results(),2000)' onkeydown='search_querry.doSearch(this.form)'></textarea>"+
                "</form>"+
                "<div id='search_results'></div>";
            
            var icon_online = document.createElement("div");
            icon_online.setAttribute("id","icon_online");
            icon_online.setAttribute("class","icon");
            icon_online.setAttribute("onmousedown","startDrag(this)");
            icon_online.setAttribute("ondblclick","create.online_div()");           
            this.node.appendChild(icon_online);
            var icon_onlineContent = document.getElementById("icon_online");
            icon_onlineContent.innerHTML =
                "<div class='icon_supper'></div>"+    
                "<div class='icon_picture icon_online'></div>"+
                "<div id='icon_online_text' class='icon_text icon_online_text'>Online</div>";
            online_icon_querry.check();
            onlineIconTimer = setInterval('online_icon_querry.check()',60000);
                
            var icon_myYells = document.createElement("div");
            icon_myYells.setAttribute("id","icon_myYells");
            icon_myYells.setAttribute("class","icon");
            icon_myYells.setAttribute("onmousedown","startDrag(this)");
            icon_myYells.setAttribute("ondblclick","create.myYells_div()");
            this.node.appendChild(icon_myYells);
            var icon_myYellsContent = document.getElementById("icon_myYells");
            icon_myYells.innerHTML =
                "<div class='icon_supper'></div>"+
                "<div class='icon_picture icon_myYells'></div>"+
                "<div class='icon_text icon_myYells_text'>Meine Yells</div>";
            
            var icon_messages = document.createElement("div");
            icon_messages.setAttribute("id","icon_messages");
            icon_messages.setAttribute("class","icon");
            icon_messages.setAttribute("onmousedown","startDrag(this)");
            icon_messages.setAttribute("ondblclick","create.myYells_div()");
            this.node.appendChild(icon_messages);
            var icon_messagesContent = document.getElementById("icon_messages");
            icon_messages.innerHTML =
                "<div class='icon_supper'></div>"+
                "<div class='icon_picture icon_messages'></div>"+
                "<div class='icon_text icon_messages_text'>Nachrichten</div>";
            
            var icon_friends = document.createElement("div");
            icon_friends.setAttribute("id","icon_friends");
            icon_friends.setAttribute("class","icon");
            icon_friends.setAttribute("onmousedown","startDrag(this)");
            icon_friends.setAttribute("ondblclick","create.myYells_div()");
            this.node.appendChild(icon_friends);
            var icon_friendsContent = document.getElementById("icon_friends");
            icon_friends.innerHTML =
                "<div class='icon_supper'></div>"+
                "<div class='icon_picture icon_friends'></div>"+
                "<div class='icon_text icon_friends_text'>Meine Freunde</div>";
                
            var icon_profil = document.createElement("div");
            icon_profil.setAttribute("id","icon_profil");
            icon_profil.setAttribute("class","icon");
            icon_profil.setAttribute("onmousedown","startDrag(this)");
            icon_profil.setAttribute("ondblclick","create.myYells_div()");
            this.node.appendChild(icon_profil);
            var icon_profilContent = document.getElementById("icon_profil");
            icon_profil.innerHTML =
                "<div class='icon_supper'></div>"+
                "<div class='icon_picture icon_profil'></div>"+
                "<div class='icon_text icon_profil_text'>Mein Profil</div>";
            
            var icon_settings = document.createElement("div");
            icon_settings.setAttribute("id","icon_settings");
            icon_settings.setAttribute("class","icon");
            icon_settings.setAttribute("onmousedown","startDrag(this)");
            icon_settings.setAttribute("ondblclick","create.myYells_div()");
            this.node.appendChild(icon_settings);
            var icon_settingsContent = document.getElementById("icon_settings");
            icon_settings.innerHTML =
                "<div class='icon_supper'></div>"+
                "<div class='icon_picture icon_settings'></div>"+
                "<div class='icon_text icon_settings_text'>Einstellungen</div>";
                        
            content_created=true;
        }
    },    
    myYells_div : function() {
        if(myYells_div_created!=true)
        {
            var my = document.createElement("div");
            my.setAttribute("id","myYells");
            this.node.appendChild(my);          
            myYells_div_created=true;
            yells_query.construct(0,0,"myYells");
            create.myYells_yells();
            YellsTimer = setInterval('create.myYells_yells()',1000);           
        }
    },
    myYells_yells : function() {       
            yells_query.get_yell(0,current_yell_id);              
    },
    otherYells_div : function(friendid) {
        if(otherYells_div_created!=true)
        {
            var oy = document.createElement("div");
            oy.setAttribute("id","otherYells");
            oy.setAttribute("class","container");
            with (oy.style) {
                left = "350px";
                top = "100px";
            }
            this.node.appendChild(oy);
            var oyContent = document.getElementById("otherYells");
            oyContent.innerHTML = "";
            otherYells_div_created=true;
            otherYells_querry.Get(friendid);
            otherYellsTimer = setInterval('otherYells_querry.Get(friendid)',10000);
        }
    },
    online_div : function() {
        if(online_div_created!=true)
        {
            var online_div = document.createElement("div");
            online_div.setAttribute("id","online");
            with (online_div.style) {
                left = "100px";
                top = "100px";
            }
            this.node.appendChild(online_div);
            var onlineContent = document.getElementById("online");
            onlineContent.innerHTML = "";
            online_div_created=true;
            online_div_querry.check();
            onlineDivTimer = setInterval('online_div_querry.check()',60000);
        }
    },
    alert : function(alerttext,alertwidth) {
        if(alert_created!=true)
        {
            var a = document.createElement("div");
            a.setAttribute("id","alert");
            with (a.style) {
                width = alertwidth;
            }
            this.node.appendChild(a);
            var aContent = document.getElementById("alert");
            aContent.innerHTML = 
            "<div class='alertSymbol'></div>"+
            "<div class='alertText'>"+alerttext+"</div>"+
            "<a class='closeAlert' href='#' onclick='remove.alert()'></a>";
            alert_created=true;
        }
    },
    question_friendship: function(friend_id,friend_name) {
        if(question_created!=true) {
            var question_div = document.createElement("div");
            question_div.setAttribute("id","question");
            question_div.setAttribute("class","darker");
            this.node.appendChild(question_div);
            var question_id = document.getElementById("question");
            question_id.innerHTML =
            "<div class='question_container'>"+
            "<div class='question_text'>Möchtest du "+friend_name+" eine Freunschaftseinladung schicken?</div>"+
            "<div class='question_button' onclick=friends_querry.addNew('"+friend_id+"','"+friend_name+"')>Ja</div>"+
            "<div class='question_button' onclick='remove.question()'>Nein</div>"+
            "</div>";
            question_created=true;    
        }
    },
    yells_comment_form : function(id) {
        var comment_id = document.getElementById(id);
        var form_li = document.createElement("li");
        form_li.setAttribute("id","comment_form");
        form_li.setAttribute("class","myYells_comment");
        var form_li_node = comment_id.appendChild(form_li);
        form_li_node.innerHTML =
        "<form>"+
            "<textarea name='myYells_message' cols='35' rows='1' onfocus='clean(this)'>Kommentar eingeben...</textarea>"+
            "<input type='button' value='kommentieren' onclick='yells_query.post_comment(this.form)' />"+
        "</form>";
    }     
}

var remove = {
    header : function() {
        var removeIt = document.getElementById("header");
        document.body.removeChild(removeIt);
        var removeIt2 = document.getElementById("menu");
        document.body.removeChild(removeIt2);
        content_created=false;
        clearTimeout(onlineIconTimer);
    },
    myYells_div : function() {
        var removeIt = document.getElementById("myYells");
        document.body.removeChild(removeIt);
        myYells_div_created=false;
        clearTimeout(YellsTimer);
        current_yell_id="1";
    },
    online_div : function() {
        var removeIt = document.getElementById("online");
        document.body.removeChild(removeIt);
        online_div_created=false;
        clearTimeout(onlineDivTimer);
    },    
    alert : function() {
        var removeIt = document.getElementById("alert");
        document.body.removeChild(removeIt);
        alert_created=false;
    },
    question : function() {
        var removeIt = document.getElementById("question");
        document.body.removeChild(removeIt);
        question_created=false;    
    }
}