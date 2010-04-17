function compo_9g(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventsen=window.open (documento,'compo_9g','dependent=yes,scrollbars=no,status=no,resizable=no, toolbars=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=310,height=450');
}

function compo_9(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventsen=window.open (documento,'compo_9','dependent=yes,scrollbars=no,status=no,resizable=no, toolbars=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=225,height=355');
}

function compo_3(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventsen=window.open (documento,'compo_3','dependent=yes,scrollbars=no,status=no,resizable=no, toolbars=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=240,height=160');
}

function compo_3g(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventsen=window.open (documento,'compo_3g','dependent=yes,scrollbars=no,status=no,resizable=no, toolbars=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=285,height=200');
}

function abrir_ventsesple(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventsen=window.open (documento,'ventsesple','dependent=yes,scrollbars=yes,status=no,resizable=yes, toolbars=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=609,height=397');
}

function abrir_ventopcses(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
//l = self.screenX+57
//a = self.screenY+20
l=200
a=200
}
ventsen=window.open (documento,'ventopcses','dependent=yes,scrollbars=yes,status=no,resizable=yes, toolbars=0,location=0,directories=0,menubar=0,screenX=200,screenY=200,width=255,height=300');
}

function abrir_ventvideodiff(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventsen=window.open (documento,'ventvideodiff','dependent=yes,scrollbars=yes,status=no,resizable=yes, toolbars=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=785,height=590');
}


function abrir_ventbus(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventbus=window.open (documento,'ventbus','dependent=yes,scrollbars=yes,status=0,resizable=yes,toolbar=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=680,height=600');
}
//
function abrir_video_directo(video)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
valorvideo='';

valorvideo=top.frames[1].frames[0].frames[0].document.copia.videot_primero.value;
top.frames[1].frames[0].frames[0].document.close();
top.frames[1].frames[0].frames[0].document.writeln('<html><head><title>Intervencion anterior</title></head>'); 
top.frames[1].frames[0].frames[0].document.writeln('<body background="/senado/_rcs/textura2.JPG">');
top.frames[1].frames[0].frames[0].document.writeln('<table width="100%" height="100%"><tr><td align="center">');
top.frames[1].frames[0].frames[0].document.writeln('<embed src="'+video+'" type="audio/x-pn-realaudio-plugin" controls="ImageWindow" width=320 height=300 console=one autostart="true"/>');
top.frames[1].frames[0].frames[0].document.writeln('<embed src="'+video+'" type="audio/x-pn-realaudio-plugin" controls="ControlPanel" width=320 height=43 console=one autostart="false"/>');
top.frames[1].frames[0].frames[0].document.writeln('</td></tr></table>');
top.frames[1].frames[0].frames[0].document.writeln('<form name="copia"><input type="hidden" name="videot_primero" value="'+valorvideo+'"></form>');
top.frames[1].frames[0].frames[0].document.writeln('</body></html>');
}
//
function abrir_video_dir(video)
{
valorvideo='';
valorvideo=top.frames[1].frames[0].frames[0].document.copia.video_primero.value;
top.frames[1].frames[0].frames[0].document.close();
top.frames[1].frames[0].frames[0].document.writeln('<html><head><title>Intervencion anterior</title></head>');
top.frames[1].frames[0].frames[0].document.writeln('<body background="/senado/_rcs/textura2.JPG">');
top.frames[1].frames[0].frames[0].document.writeln('<table width="100%" height="100%"><tr><td align="center">');
top.frames[1].frames[0].frames[0].document.writeln('<embed src="'+video+'" type="audio/x-pn-realaudio-plugin" controls="ImageWindow" width=320 height=240 console=one autostart="false"/>');
top.frames[1].frames[0].frames[0].document.writeln('<embed src="'+video+'" type="audio/x-pn-realaudio-plugin" controls="ControlPanel" width=320 height=43 console=one autostart="true"/>');
top.frames[1].frames[0].frames[0].document.writeln('</td></tr></table>');
top.frames[1].frames[0].frames[0].document.writeln('<form name="copia"><input type="hidden" name="video_primero" value="'+valorvideo+'"></form>');
top.frames[1].frames[0].frames[0].document.writeln('</body></html>');
}
//
function abrir_video_dif(video,organo,sesion,orador)
{
valorvideo='';

if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}

valorvideo=top.frames[1].frames[0].frames[0].document.copia.videot_primero.value;
top.frames[1].frames[0].frames[0].document.close();
top.frames[1].frames[0].frames[0].document.writeln('<html><head><script src="/senado/js/ventanas.js"></script></head><body background="/senado/_rcs/textura2.JPG">');
top.frames[1].frames[0].frames[0].document.writeln('<table width="100%" height="100%"><tr><td align="center">');
top.frames[1].frames[0].frames[0].document.writeln('<embed src="'+video+'"  type="audio/x-pn-realaudio-plugin" controls="ImageWindow" width=320 height=240 console=one autostart="true"/>');
top.frames[1].frames[0].frames[0].document.writeln('<embed src="'+video+'" type="audio/x-pn-realaudio-plugin" controls="ControlPanel" width=320 height=43 console=one autostart="false"/>');
top.frames[1].frames[0].frames[0].document.writeln('</td></tr></table>');
top.frames[1].frames[0].frames[0].document.writeln('<a href="javascript:abrir_video_directo(\''+valorvideo+'\')">Volver al video inicial</a></font>') ;
top.frames[1].frames[0].frames[0].document.writeln('<form name="copia"><input type="hidden" name="videot_primero" value="'+valorvideo+'"></form>');
top.frames[1].frames[0].frames[0].document.writeln('</body></html>');
}
//
function abrir_video_d(video,orador)
{
valorvideo='';
valorvideo=top.frames[1].frames[0].frames[0].document.copia.video_primero.value;
top.frames[1].frames[0].frames[0].document.close();
top.frames[1].frames[0].frames[0].document.writeln('<html><head><script src="/senado/js/ventanas.js"></script></head><body background="/senado/_rcs/textura2.JPG">');
top.frames[1].frames[0].frames[0].document.writeln('<table width="100%" height="100%"><tr><td align="center">');
top.frames[1].frames[0].frames[0].document.writeln('<embed src="/tarsys/'+video+'" type="audio/x-pn-realaudio-plugin" controls="ImageWindow" width=320 height=240 console=one autostart="false"/>');
top.frames[1].frames[0].frames[0].document.writeln('<embed src="/tarsys/'+video+'" type="audio/x-pn-realaudio-plugin" controls="ControlPanel" width=320 height=43 console=one autostart="true"/>');
top.frames[1].frames[0].frames[0].document.writeln('</td></tr></table>');
top.frames[1].frames[0].frames[0].document.writeln('<a href="javascript:abrir_video_dir(\''+valorvideo+'\')">Volver al video en directo</a></font>') ;
top.frames[1].frames[0].frames[0].document.writeln('<form name="copia"><input type="hidden" name="video_primero" value="'+valorvideo+'"></form>');
top.frames[1].frames[0].frames[0].document.writeln('</body></html>');
}
//
function abrir_video(video,orador)
{
valorvideo='';

if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}

valorvideo=top.frames[1].frames[0].frames[0].document.copia.videot_primero.value;
top.frames[1].frames[0].frames[0].document.close();
top.frames[1].frames[0].frames[0].document.writeln('<html><head><script src="/senado/js/ventanas.js"></script></head><body background="/senado/_rcs/textura2.JPG">');
top.frames[1].frames[0].frames[0].document.writeln('<table width="100%" height="100%"><tr><td align="center">');
top.frames[1].frames[0].frames[0].document.writeln('<embed src="'+video+'" type="audio/x-pn-realaudio-plugin" controls="ImageWindow" width=320 height=300 console=one autostart="true"/>');
top.frames[1].frames[0].frames[0].document.writeln('<embed src="'+video+'" type="audio/x-pn-realaudio-plugin" controls="ControlPanel" width=320 height=43 console=one autostart="false"/>');
top.frames[1].frames[0].frames[0].document.writeln('</td></tr></table>');
top.frames[1].frames[0].frames[0].document.writeln('<a href="javascript:abrir_video_directo(\''+valorvideo+'\')">Volver al video inicial</a></font>') ;
top.frames[1].frames[0].frames[0].document.writeln('<form name="copia"><input type="hidden" name="videot_primero" value="'+valorvideo+'"></form>');
top.frames[1].frames[0].frames[0].document.writeln('</body></html>');
}
//
function abrir_ventord(documento)
{
if (self.screenX>=10 || self.screenY>=10)
{
l=0;
a=0;
}
else
{
l = self.screenX+10
a = self.screenY+10
}
vent_ord=window.open (documento,'vent_ord','dependent=yes,scrollbars=yes,status=0,resizable=yes,toolbar=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=770,height=520');
}
//
function abrir_ventsen(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventsen=window.open (documento,'ventsen','dependent=yes,scrollbars=yes,status=no,resizable=yes, toolbars=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=609,height=397');
}

function abrir_curricu(documento)
{
if (self.screenX>=180 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
curricu=window.open (documento,'curricu','dependent=yes,scrollbars=yes,status=no,resizable=yes, toolbars=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=450,height=300');
}


function abrir_ventlegant(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventlegant=window.open (documento,'ventlegant','dependent=yes,scrollbars=yes,status=no,resizable=yes,toolbars=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=609,height=397');

}

function abrir_ventpp(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventpp=window.open (documento,'ventpp','dependent=yes,scrollbars=yes,status=no,resizable=yes,toolbars=0,location=0,directories=0,menubar=0,screenX='+l+',sreenY='+a+',width=609,height=397');
}

function abrir_venvot(documento)
{
if (self.screenX>=170 || self.screenY>=101)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
venvot=window.open (documento,'venvot','dependent=yes,scrollbars=yes,status=no,resizable=yes,toolbars=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=629,height=498');
}

function abrir_ventgru(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventgru=window.open (documento,'ventgru','dependent=yes,scrollbars=yes,status=no,resizable=yes,toolbars=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=609,height=397');
}

function abrir_ventini(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventini=window.open (documento,'ventini','dependent=yes,scrollbars=yes,status=no,resizable=yes,toolbars=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=609,height=397');
}

function abrir_ventcom(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventcom=window.open (documento,'ventcom','dependent=yes,scrollbars=yes,status=0,resizable=yes,toolbar=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=609,height=397');
}


function abrir_ventsenarc(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventsenarc=window.open (documento,'ventsenarc','dependent=no,scrollbars=yes,status=0,resizable=yes,toolbar=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=609,height=397');
}

function abrir_ventinterv(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
vent_interv=window.open (documento,'vent_interv','dependent=yes,scrollbars=yes,status=0,resizable=yes,toolbar=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=609,height=397');
}

function abrir_ventexp(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
vent_exp=window.open (documento,'vent_exp','dependent=yes,scrollbars=yes,status=0,resizable=yes,toolbar=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=785,height=540');
}

/*
Funcion auxiliar para esperar que existan los frames 
*/
/* 
function isFrameLoaded(nameOfFrame) {
    return ( !window.frames[nameOfFrame] || ( navigator.__ice_version &&
	         window.frames[nameOfFrame].document.toString().toLowerCase().indexOf('documentproxy') + 1 ) )
				        ? false : true;
						  }

function waitForFrames(pagina) {
// if (!isFrameLoaded('bolcuerpo')) {
if (ventbolpag.top.frames.length == 0){
       alert("Aun no : " +ventbolpag.top.frames.length);
//	    setTimeout('waitForFrames(pagina);', 1000);
		 var myinterval = ventbolpag.setInterval(waitForFrames(pagina),10000);
    } 
	 alert("cargado : " +ventbolpag.top.frames.length);
	ventbolpag.clearInterval(myinterval);
}

function delay(gap)
{
 var then, now;
 then=new Date().getTime();
 now=then;
 while( (now-then)<gap)
 {
   now=new Date().getTime();
 }
} 
function wait(time)
{
 if (time > 0)
 {
    setTimeout('wait(-1)',time); 
 }
}
*/

function abrir_ventbolpag(documento, pagina, fich)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventbolpag=window.open (documento,'ventbolpag','dependent=yes,scrollbars=yes,status=0,resizable=yes,toolbar=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=609,height=397');
/*
while (!ventbolpag.frames[1] || !ventbolpag.frames[0] ) ; 
*/
/*
waitForFrames(ventbolpag);
*/
// while (!ventbolpag.frames[1].closed && ventbolpag.frames[1].location) ;

//getelementbyname("bolcuerpo").location.href= '/legis7/publicaciones/html/textos/'+fich+'#'+pagina; 

//ventbolpag.focus();
//dumpProps(ventbolpag.top.frames);
//ventbolpag.onload=cargar_frames('/legis7/publicaciones/html/textos/'+fich+'#'+pagina,pagina);
//ventbolpag.onload=ventbolpag.frames[1].location.href= '/legis7/publicaciones/html/textos/'+fich+'#'+pagina;

//alert("Frames: "+ventbolpag.frames[0]+"  : "+ventbolpag.top.frames.length);
//ventbolpag.frames[1].location.href= '/legis7/publicaciones/html/textos/'+fich+'#'+pagina; 
//ventbolpag.focus();
//ventbolpag.frames[1].location.href= '/legis8/publicaciones/html/textos/'+fich+'#'+pagina; 
//ventbolpag.frames[0].document.forms[0].elements[0].value = pagina;

}

function abrir_pag(pagina, fich)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}


ventbol.frames[1].location= '/legis7/publicaciones/html/textos/'+fich+'#'+pagina; 
ventbol.frames[0].document.forms[0].elements[0].value = pagina;
}

function abrir_ventbol(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventbol=window.open (documento,'ventbol','dependent=yes,scrollbars=yes,status=0,resizable=yes,toolbar=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=609,height=397');
}

function abrir_ventiff(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventiff=window.open (documento,'ventiff','dependent=yes,scrollbars=yes,status=0,resizable=yes,toolbar=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=680,height=600');
}

function abrir_ventayforos(documento)
{
ventayforos=window.open (documento,'ventayforos','dependent=yes,scrollbars=yes,status=0,resizable=0,toolbar=0,location=0,directories=0,menubar=0,screenX=10,screenY=10,width=350,height=400');
}

function abrir_ventanahi(documento)
{
ventanahi=window.open (documento,'ventanahi','dependent=yes,status=0,resizable=0,toolbar=0,location=0,directories=0,menubar=0,screenX=10,screenY=30,width=350,height=300');
}
function cerrar_ventanahi(documento)
{
ventanahi=window.close (documento);
}

function cerrar_ventayuda(documento)
{
ventayuda=window.close (documento);
}

function cerrar_vent(documento)
{
vent=window.close (documento);
}

function abrir_ventayudacorta(documento)
{
ventayudacorta=window.open (documento,'ventayudacorta','dependent=yes,status=0,resizable=0,toolbar=0,location=0,directories=0,menubar=0,screenX=10,screenY=30,width=750,height=320');
}
function cerrar_ventayudacorta(documento)
{
ventayudacorta=window.close (documento);
}
 
function abrir_ventayuda(documento)
{
ventayuda=window.open (documento,'ventayuda','dependent=yes,scrollbars=yes,status=0,resizable=0,toolbar=0,location=0,directories=0,menubar=0,screenX=5,screenY=5,width=600,height=400');
}

function abrir_ventini(documento)
{
ventayuda=window.open (documento,'ventini','left=210,dependent=yes,scrollbars=yes,status=0,resizable=0,toolbar=0,location=0,directories=0,menubar=0,screenX=5,screenY=5,width=800,height=600');
}

function abrir_ventclas(documento)
{
ventayuda=window.open (documento,'ventclas','left=310,dependent=yes,scrollbars=no,status=0,resizable=0,toolbar=0,location=0,directories=0,menubar=0,screenX=5,screenY=5,width=680,height=450');
}

function abrir_ventlegi(documento)
{
ventayuda=window.open (documento,'ventlegi','left=200,dependent=yes,scrollbars=no,status=0,resizable=0,toolbar=0,location=0,directories=0,menubar=0,screenX=5,screenY=5,width=700,height=550');
}

function abrir_ventimpresion(documento)
{
ventimpresion=window.open (documento,'ventimpresion','dependent=yes,scrollbars=yes,status=0,resizable=0,toolbar=0,location=0,directories=0,menubar=0,screenX=5,screenY=5,width=550,height=400');
}

function abrir_ventamatecare(documento)
{
ventcare=window.open (documento,'ventamatecare','dependent=yes,scrollbars=yes,status=0,resizable=0,toolbar=0,location=0,directories=0,menubar=0,screenX=5,screenY=5,width=520,height=525');
}

function abrir_ventnoved(documento)
{
ventnoved=window.open (documento,'ventnoved','dependent=yes,scrollbars=yes,status=0,resizable=0,toolbar=0,location=0,directories=0,menubar=0,left=250,top=200,width=350,height=350');
ventnoved.Creator=self;
parent.name='senado';
}

function abrir_vent6(documento)
{
vent6=window.open (documento,'vent6','dependent=yes, scrollbars=yes,status=0,resizable=yes,toolbar=1,location=1,directories=1,menubar=0,screenX=0,screenY=0,width=725,height=525');
vent6.creator=self;
}

function abrir_ventbuscador(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventbuscador=window.open (documento,'ventbuscador','dependent=yes,scrollbars=yes,status=no,resizable=yes,toolbars=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=659,height=450');
}

function abrir_ventpdf(documento)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventbuscador=window.open (documento,'ventpdf','dependent=yes,scrollbars=yes,status=no,resizable=yes,toolbars=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=940,height=660');
}


function abrir_ventparametro(sign)
{
var cabecera= " ";
ventana=window.open ("",'ventana_sec','scrollbars=no,status=no,resizable=yes,toolbars=0,location=0,directories=0,menubar=0,width=210,height=20');
ventana.document.open();
ventana.creator=window;
cabecera+= "<html><head><title>acceso imagen TIFF</title>";
cabecera+= " <script language='JavaScript1.2'></script></head>";
cabecera+= "<BODY background=/senado/_rcs/textura4.JPG ";
cabecera+= "onLoad='imag.CONT.focus();'>";
cabecera+= "<FORM name='imag' action=javascript:abrir_ventsenarc('http://www.senado.es/PWApiWeb.dll?API_Ver_Documento?Login=silvia&Password=silvia&IdApi=API67'); ";
cabecera+= "onSubmit='window.close();'>";
cabecera+= "<input type=hidden name=SIGN value="+sign+">";
cabecera+= "<center><b>Introduzca nº que precede al texto de la imagen en el campo contenido:</b><br>";
cabecera+= "<input type=text name=CONT size=3>";
cabecera+= " </center>";
cabecera+= "</form>";
cabecera+= "</BODY>";
cabecera+= "</HTML>";
ventana.document.write(cabecera);
ventana.document.close();
ventana.creator=window;
}




function abrir_ventparametro2(sign)
{
var cabecera= " ";
ventana=window.open ("",'ventana_sec','scrollbars=no,status=no,resizable=yes,toolbars=0,location=0,directories=0,menubar=0,width=410,height=200');
ventana.document.open();
ventana.creator=window;


cabecera+= "<HTML>\n";  
cabecera+="<HEAD>\n";
cabecera+="   <TITLE>Parámetros</TITLE>\n";

cabecera+="<SCRIPT LANGUAGE='JavaScript1.2' SRC='http://wwwdesa.senado.es/senado/js/ventanas.js'></SCRIPT>\n";

cabecera+="<SCRIPT LANGUAGE='JavaScript'>\n";
cabecera+="function jsubmit1()\n";
cabecera+="{\n";
cabecera+=" document.buscar.CONTENIDO.value = document.elegir.CONTENIDO.value;\n";      
cabecera+="  if (document.buscar.CONTENIDO.value =='')\n";
cabecera+="       alert('Falta Campo CONTENIDO');\n";
cabecera+="  else\n";
cabecera+="  {       \n";
cabecera+="   window.open('http://www.senado.es/PWApiWeb.dll?API_Ver_Documento?Login=silvia&Password=silvia&IdApi=API67&Signatura="+ sign +"&Contenido=document.buscar.CONTENIDO.value');\n";
cabecera+="   }\n";
cabecera+="}\n";
cabecera+="function jreset1()\n";
cabecera+="{   \n";
cabecera+="   document.elegir.CONTENIDO.value='';  \n"; 
cabecera+="}\n";
cabecera+="</SCRIPT>\n";
cabecera+="  </HEAD>\n";
cabecera+="  <BODY BACKGROUND='http://wwwdesa.senado.es/senado/_rcs/textura4.JPG' TOPMARGIN='4' LINK='#004080' VLINK='#3F50DD' ONLOAD='javascript:jreset1();'>\n";
cabecera+="   <FORM NAME='buscar' ACTION='/cgi-bin/BRSCGI'>\n";
cabecera+="   <INPUT TYPE='hidden' NAME='CONTENIDO' VALUE=''>  \n";    
cabecera+="  </FORM>\n";
cabecera+="   <FORM NAME='elegir'>    \n";
cabecera+="   <P></P>\n";
cabecera+="  <TABLE WIDTH='100%' BORDER='0'>   \n";        
cabecera+="     <TR>        \n";
cabecera+="       <TD  ALIGN='LEFT' HEIGHT='120'> \n";       
cabecera+="         <H4><BR><BR>\n";
cabecera+="        	<FONT FACE='Comic Sans MS' SIZE='+1'>Parámetros Prueba</FONT>\n";
cabecera+="        </H4>        \n";
cabecera+="        <BR> \n";
cabecera+="      </TD>\n";
cabecera+="      <TD></TD>\n";
cabecera+="      <TD></TD>\n";
cabecera+="      </TR>      \n";  
cabecera+="     <TR>     \n";
cabecera+="       <TD  WIDTH='30%' ALIGN='LEFT'>   \n";         	         
cabecera+="           <FONT FACE='Arial Black' SIZE='-1'>Contenido: </FONT>\n";
cabecera+="           <INPUT TYPE='Text' NAME='CONTENIDO' SIZE='10'>\n";
cabecera+="       </TD>              \n";
cabecera+="       <TD ALIGN='LEFT' WIDTH='15%'>\n";
cabecera+="         <P><FONT FACE='Comic Sans MS' COLOR='#004080'>Pinche aquí:</FONT>\n";
cabecera+="       </TD>\n";
cabecera+="       <TD ALIGN='LEFT'>\n";
cabecera+="      	  <IMG SRC='http://www.senado.es/senado/_rcs/pdf.gif' ALT='Ver Acta en formato PDF' BORDER='0' ALIGN='LEFT' ONCLICK='jsubmit1();'> \n";
cabecera+="       		</P>\n";
cabecera+="        </TD>\n";
cabecera+="     </TR>\n";
cabecera+="  </TABLE>    \n";
cabecera+="   </FORM>\n";
cabecera+=" </BODY>\n";
cabecera+="</HTML>\n";
ventana.document.write(cabecera);
ventana.document.close();
ventana.creator=window;
}

function abrir_vgrande(documento,nomventana)
{
if (self.screenX>=190 || self.screenY>=202)
{
l=0;
a=0;
}
else
{
l = self.screenX+57
a = self.screenY+20
}
ventcom=window.open (documento,nomventana,'dependent=yes,scrollbars=yes,status=0,resizable=yes,toolbar=0,location=0,directories=0,menubar=0,screenX='+l+',screenY='+a+',width=800,height=500');
}
