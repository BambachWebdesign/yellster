var picture_div = {
    createInput : function() {
        var pictureContainer = document.getElementById("picture_data");
        pictureContainer.style.display = "block";
        pictureContainer.innerHTML = 
                "<li class='register' style='min-height:290px'>"+
                    "<div class='input_pic_text'>Profilbild hochladen:<br />(maximal 2mb)</div>"+
                    "<div class='input_pic'>"+
                        "<img id='picture_id' style='margin-left:24px;margin-right:24px' src='images/nopic.jpg' alt='no picture received' />"+
                        "<input style='margin:10px' name='upload_button' type='button' value='Bild hochladen' size='50' onclick='upload.create()' />"+                                                
                    "</div>"+
                "</li>";
    check_picture();
    }
}
function check_picture() {
        var picture_file = store.profil[0]["email"];
        var check_this = "picture="+picture_file;
        var picture_id = document.getElementById("picture_id");
        var xmlhttpCheck_picture = new ajaxRequest(
        "includes/register/check.php",
        function()
        {
            var CheckReady_picture = xmlhttpCheck_picture.req;
            if (CheckReady_picture.readyState==4) {
                if(CheckReady_picture.responseText != false) {
                    picture_id.src = CheckReady_picture.responseText;
                    store.profil[0]["picture"]="1";
                    clearTimeout(pictureCheckTimer);
                    if(upload_created==1){setTimeout(upload.remove(),3000)};
                }
            }
        },
        "POST",
        check_this,
        ["Content-Type","application/x-www-form-urlencoded"]
        );
        xmlhttpCheck_picture.doRequest();
}
var upload_created=0;
var upload = {           
        create : function() {
            if(upload_created==0) {
                var sid = store.profil[0]["email"];
                var uploader = document.createElement("div");
                uploader.setAttribute("id","uploader");
                document.body.appendChild(uploader);
                uploaderContent = document.getElementById("uploader");
                uploaderContent.innerHTML =
                    "<div id='uploader_headline' onmousedown='startDrag(this.parentNode);'>Portrait hochladen"+
                        "<a href='#' class='closeDiv' onclick='upload.remove()'></a>"+
                    "</div>"+
                    "<div id='uploader_content'>"+
                        "<iframe src='includes/register/image.php?id="+sid+"' width='100%' height='100%' name='uploader_frame' scrolling='no' frameborder='no'>"+
                        "<p>Ihr Browser kann leider keine eingebetteten Frames anzeigen:"+
                        "Sie k&ouml;nnen die eingebettete Seite &uuml;ber den folgenden Verweis"+
                        "aufrufen: <a href='includes/register/image.php?id="+sid+"'>upload</a></p>"+
                    "</iframe>"+
                    "</div>";
                upload_created=1;
            }
        },
        remove : function() {
            var removeIt = document.getElementById("uploader");
            document.body.removeChild(removeIt);
            upload_created=0;    
        }
}