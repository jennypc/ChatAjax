var button = document.getElementById("button");

button.addEventListener('click',function(){
    alert("diste click");
    noti();
}); 


function noti(){
    
    if (Notification) {
        if (Notification.permission !== "granted") {
            Notification.requestPermission();
        }
            var title = "Xitrus"
            var extra = {
                icon: "http://xitrus.es/imgs/logo_claro.png",
                body: "Notificación de prueba en Xitrus"
                }
        var noti = new Notification( title, extra)
        setTimeout( function() { noti.close() }, 10000)
        }
    
}
//    
//    if(!("Notification" in window)){
//        
//        alert("tu navegador no acepta notificaciones");
//        
//    } else if(Notification.permission === "granted"){
//        var body = "Hola";
////        var icon = "https://www.quecodigo.com/img/qc_logo.jpg";
//        var title = "Notificación";
//        var options = {
//          body: body,
//          icon: icon,
//        }
//        var notification = new Notification(body);
//        
//    }else if(Notification.permission !== "deined"){
//        
//        Notification.requestPermission(function(permission){
//            
//           if(Notification.permission === "granted"){
//               
//               var notification = new Notification("Holamundo");
//           } 
//        });
//    }
//}
 
    


