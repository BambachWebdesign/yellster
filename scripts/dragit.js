 <!--
  var objDrag = null;		// Element, �ber dem Maus bewegt wurde

	var mouseX 	 = 0;				// X-Koordinate der Maus
	var mouseY 	 = 0;				// Y-Koordinate der Maus

  var offX = 0;					// X-Offset des Elements, das geschoben werden soll
  var offY = 0;					// Y-Offset des Elements, das geschoben werden soll
  var pinnwand=false;

  // Browserweiche
	IE = document.all&&!window.opera;
	DOM = document.getElementById&&!IE;

  // Initialisierungs-Funktion

function dragit_init() {
    document.onmousemove = doDrag;
	document.onmouseup = stopDrag;
} 
  
  // Wird aufgerufen, wenn die Maus �ber einer Box gedr�ckt wird
	function startDrag(objElem) {
  	// Objekt der globalen Variabel zuweisen -> hierdurch wird Bewegung m�glich
    objDrag = objElem;

    // Offsets im zu bewegenden Element ermitteln
    offX = mouseX - objDrag.offsetLeft;
    offY = mouseY - objDrag.offsetTop;
	}

  // Wird ausgef�hrt, wenn die Maus bewegt wird
	function doDrag(ereignis) {
  	// Aktuelle Mauskoordinaten bei Mausbewegung ermitteln
    mouseX = (IE) ? window.event.clientX : ereignis.pageX;
    mouseY = (IE) ? window.event.clientY : ereignis.pageY;

  	// Wurde die Maus �ber einem Element gedr�ck, erfolgt eine Bewegung
    if (objDrag != null) {
    	// Element neue Koordinaten zuweisen
      objDrag.style.left = (mouseX - offX) + "px";
      objDrag.style.top = (mouseY - offY) + "px";
    }
	}

  // Wird ausgef�hrt, wenn die Maustaste losgelassen wird
	function stopDrag(ereignis) {
  	// Objekt l�schen -> beim Bewegen der Maus wird Element nicht mehr verschoben
    objDrag = null;
	}
  -->