var yells_query = {
    get_yell : function(user_id,yell_id) {
        var queryYells = "yell_id="+yell_id+"&";
        queryYells = (user_id=="0")? queryYells : queryYells+"user_id="+user_id;
        
        var xmlhttpYells = new ajaxRequest(
        "includes/yells/getYell.php",
        function()
        {
            var YellsReady = xmlhttpYells.req;
            if (YellsReady.readyState==4)
            {   
                var field_id = document.getElementById("myYells_c");                                  
                eval(YellsReady.responseText);
                if(this_yell_id!=false) {
                yell_li = document.createElement("li");
                yell_li.setAttribute("id","my"+this_yell_id);
                yell_li.setAttribute("class","myYells_user");
                /*yell_a1 = document.createElement("a");
                yell_a1.setAttribute("class","delYells");
                yell_a1.setAttribute("onclick","yells_query.Delete('my"+res_array[0]+"')");
                yell_div1 = document.createElement("div");
                yell_div1.setAttribute("style","background-image:url(includes/pictures/avatar.php?"+res_array[5]+"="+res_array[1]+"&S="+res_array[6]+")");
                yell_div1.setAttribute("class","myYells_user_image");
                yell_div1.setAttribute("title",res_array[2]); 
                yell_div2 = document.createElement("div");
                yell_div2.setAttribute("class","myYells_user");
                var yell_div2_text = document.createTextNode(res_array[2]+" hat "+res_array[3]+" geschrieben: ");
                yell_div2.appendChild(yell_div2_text);
                yell_div2_p = document.createElement("p");
                yell_div2_p_text = document.createTextNode(res_array[4]);
                yell_div2.appendChild(yell_div2_p);
                yell_div2_p.appendChild(yell_div2_p_text);
                yell_a2 = document.createElement("a");
                yell_a2.setAttribute("class","myYells");
                yell_a2.nodeValue = "kommentieren";*/
                var node_li = field_id.appendChild(yell_li);
                /*node_li.appendChild(yell_a1);
                node_li.appendChild(yell_div1);
                node_li.appendChild(yell_div2);
                node_li.appendChild(yell_a2); */                
                node_li.innerHTML = li_html;
                yell_ul = document.createElement("ul");
                yell_ul.setAttribute("id","comment_"+this_yell_id); 
                var node_ul = node_li.appendChild(yell_ul);
                
                
                
                                              
                
                    
                    /*"<ul id='comment_"+res_array[0]+"'></ul>";*/      
                
                /*if(res_array[7]!="0") {
                    yells_query.get_comment(user_id,res_array[0],res_array[7]);
                } */
                var first_li = field_id.firstChild;
                field_id.insertBefore(node_li, first_li);
                /*node_li.innerHTML +=
                    "<a class='delYells' onclick=yells_query.Delete('my"+res_array[0]+"')></a>"+
                    "<div style='background-image:url(includes/pictures/avatar.php?"+res_array[5]+"="+res_array[1]+"&S="+res_array[6]+")' class='myYells_user_image' title='"+res_array[2]+"'></div>"+
                    "<div class='myYells_user'>"+res_array[2]+" hat "+res_array[3]+" geschrieben:<br /></div>"+res_array[4]+"<br /><br />"+
                    "<a class='myYells'>kommentieren</a>"; */
                yells_query.get_comment(user_id,this_yell_id,'30');
                current_yell_id=this_yell_id;
                yells_query.get_yell(user_id,current_yell_id);
                }
                
            } /*else {
                eval(YellsReady.responseText);
                if(res_array!=false) {
                    field_id.innerHTML +=
                    "<li id='preloader' class='myYells_user'>loading</li>";
                } 
            }*/
        },
        "POST",
        queryYells,
        ["Content-Type","application/x-www-form-urlencoded"]
    );
    xmlhttpYells.doRequest();  
    },
   get_comment : function(user_id,this_yell_id,limit){
        queryComment = "this_yell_id="+this_yell_id+"&limit="+limit;
        queryComment = (user_id=="0")? queryComment : queryComment+"&user_id="+user_id;
        var xmlhttpComment = new ajaxRequest(
        "includes/yells/getComment.php",
        function()
        {
            var CommentReady = xmlhttpComment.req;
            if (CommentReady.readyState==4)
            {
                var field_id = document.getElementById("comment_"+this_yell_id);                
                field_id.innerHTML = CommentReady.responseText
            }
        },
        "POST",
        queryComment,
        ["Content-Type","application/x-www-form-urlencoded"]
    );
    xmlhttpComment.doRequest();
    },
    construct : function(user_id){
        var queryYells = (user_id=="0")? queryYells : queryYells+"user_id="+user_id+"&";          
        var xmlhttpYells = new ajaxRequest(
        "includes/yells/constructYells.php",
        function()
        {
            var YellsReady = xmlhttpYells.req;
            if (YellsReady.readyState==4)
            {
                var field_id = document.getElementById("myYells");
                var res_array = YellsReady.responseText;
                field_id.innerHTML += YellsReady.responseText;
            }
        },
        "POST",
        queryYells,
        ["Content-Type","application/x-www-form-urlencoded"]
    );
    xmlhttpYells.doRequest();
    },
    check : function(user_id,current_yell_id,yell_id) {
        var queryCheck = "current_yell_id="+current_yell_id+"&";
        queryCheck = (user_id=="0")? queryCheck : "user_id="+user_id+"&";
        queryCheck = (yell_id=="0")? queryCheck : queryCheck+"yell_id="+yell_id+"&";
        var xmlhttpCheck = new ajaxRequest(
        "includes/yells/checkYells.php",
        function()
        {
            var CheckReady = xmlhttpCheck.req;
            if (CheckReady.readyState==4) {                
                new_yell_id = CheckReady.responseText;
                yells_query.construct(0,0,"myYells_c");
            }
        },
        "POST",
        queryCheck,
        ["Content-Type","application/x-www-form-urlencoded"]
    );
    xmlhttpCheck.doRequest();       
    },
    Get : function(user_id,yell_id){
        var yells_c = document.getElementById("myYells");
        var queryYells = "";
        var xmlhttpYells = new ajaxRequest(
        "includes/yells/getYells.php",
        function()
        {
            var YellsReady = xmlhttpYells.req;
            if (YellsReady.readyState==4)
            {
                Yells_c.innerHTML = YellsReady.responseText ;
            }
        },
        "POST",
        queryYells,
        ["Content-Type","application/x-www-form-urlencoded"]
    );
    xmlhttpYells.doRequest();
    },
     
    Post : function(formular){
        var queryMyYellsPost = "myYells_message="+formular.myYells_message.value;
        var xmlhttpMyYellsPost = new ajaxRequest("includes/yells/postMyYells.php",function(){},"POST",queryMyYellsPost,["Content-Type","application/x-www-form-urlencoded"]);
        xmlhttpMyYellsPost.doRequest();
        this.get_yell(0,current_yell_id);
    },
    Delete : function(id) {
        var queryMyYellsDelete = "myYells_id="+id;
        var xmlhttpMyYellsDelete = new ajaxRequest("includes/yells/delMyYells.php",function(){},"POST",queryMyYellsDelete,["Content-Type","application/x-www-form-urlencoded"]);
        xmlhttpMyYellsDelete.doRequest();
        var myYells_id = document.getElementById("myYells_c");
        var myYellsElement = document.getElementById(id);
        myYells_id.removeChild(myYellsElement);
    }
}

var otherYells_querry = {
    Get : function(friendid){
        var otherYells = document.getElementById("otherYells");
        var queryOtherYells = "friendid="+friendid;
        var xmlhttpOtherYells = new ajaxRequest(
        "includes/yells/getOtherYells.php",
        function()
        {
            var onlineOtherYellsReady = xmlhttpOtherYells.req;
            if (onlineOtherYellsReady.readyState==4)
            {
                otherYells.innerHTML = (onlineOtherYellsReady.status == 200)
                ? onlineOtherYellsReady.responseText : "ERROR";
            }
        },
        "POST",
        queryOtherYells,
        ["Content-Type","application/x-www-form-urlencoded"]
        );
        xmlhttpOtherYells.doRequest();
    }
}

var online_icon_querry = {
    check : function(){
        var i=0;
        var icon_online_text = document.getElementById("icon_online_text");
        var queryOnlineIconCheck = "";
        var xmlhttpOnlineIconCheck = new ajaxRequest(
        "includes/online/online_icon.php",
        function()
        {
            var onlineIconCheckReady = xmlhttpOnlineIconCheck.req;
            if (onlineIconCheckReady.readyState==4)
            {
                icon_online_text.innerHTML = (onlineIconCheckReady.status == 200)
                ? onlineIconCheckReady.responseText : "ERROR";
            }
        },
        "POST",
        queryOnlineIconCheck,
        ["Content-Type","application/x-www-form-urlencoded"]
        );
        xmlhttpOnlineIconCheck.doRequest();
    }
}

var online_div_querry = {
    check : function(){
        var i=0;
        var online_div = document.getElementById("online");
        var queryOnlineDivCheck = "";
        var xmlhttpOnlineDivCheck = new ajaxRequest(
        "includes/online/online_check.php",
        function()
        {
            var onlineDivCheckReady = xmlhttpOnlineDivCheck.req;
            if (onlineDivCheckReady.readyState==4)
            {
                online_div.innerHTML = (onlineDivCheckReady.status == 200)
                ? onlineDivCheckReady.responseText : "ERROR";
            }
        },
        "POST",
        queryOnlineDivCheck,
        ["Content-Type","application/x-www-form-urlencoded"]
        );
        xmlhttpOnlineDivCheck.doRequest();
    }
}

var search_querry = {
    doSearch : function(search_form){
        var search_results = document.getElementById("search_results");
        search_results.style.display = (search_form.search_value.value!="")? "block" : "none";
        var querySearch = "search_value="+search_form.search_value.value;
        var xmlhttpSearch = new ajaxRequest(
        "includes/search/search.php",
        function()
        {
            var searchReady = xmlhttpSearch.req;
            if (searchReady.readyState==4)
            {
                search_results.innerHTML = (searchReady.status == 200)
                ? searchReady.responseText : "ERROR";
            }
        },
        "POST",
        querySearch,
        ["Content-Type","application/x-www-form-urlencoded"]
        );
        xmlhttpSearch.doRequest();
    }
}
var friends_querry = {
    addNew : function(friend_id,friend_name) {
        var sendThis = "friend_id="+friend_id;
        var xmlhttpAddFriend = new ajaxRequest(
        "includes/friends/add.php",
        function()
        {
            var AddFriendReady = xmlhttpAddFriend.req;
            if (AddFriendReady.readyState==4)
            {
                response = AddFriendReady.responseText;
                alert("Du hast "+friend_name+" eine Freundschaftseinladung gesendet! "+response,400);
            }
        },
        "POST",
        sendThis,
        ["Content-Type","application/x-www-form-urlencoded"]
        );
        xmlhttpAddFriend.doRequest();    
    }
    
    
}    