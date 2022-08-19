self.addEventListener('push',(e)=> {


    let data = e.data.json();
     const options = {
         body: data.body,
         icon:"https://www.shopid.ir/shopid.png",
         data: { url: data.url }
       }
     
         e.waitUntil(self.registration.showNotification(data.title,options));
         
     }); 



self.addEventListener('notificationclick', function(e) {


        e.waitUntil(clients.openWindow(e.notification.data.url))
      

  });