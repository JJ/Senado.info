
  var on=new Array();
  var off=new Array();

  function cargar_img (totImg,prefImg) {
     if (document.images) {
         for (n=0; n<totImg; n++ )
             {
               on[n]=new Image;
               on[n].src="/senado/_rcs/"+prefImg+n+"a.gif";
   
               off[n]=new Image;
               off[n].src="/senado/_rcs/"+prefImg+n+".gif";
             }
       }
   }
   function img_act (imgName) {
     if (document.images)
        document[imgName].src = on[parseInt(imgName.substring(4,5))].src;
   }
   function img_desact (imgName) {
     if (document.images)
        document[imgName].src = off[parseInt(imgName.substring(4,5))].src;
   }

