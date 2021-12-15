const readOneBtn = document.getElementById("#read-one-btn");
// var id =readOneBtn.data-id;

jQuery(readOneBtn).click(function($){
    $.ajax({
        url: '/rest-ajax/'
    }).done(function(data) {
        console.log(data);

       
        
    });
});






// var id=1;
// if (readOneBtn){
//     getStoreBtn.addEventListener('click', (e) => {
        
//         fetch('api/users/1').then(response => {
    
//                 return response.json();
            
//               }).then(jsonResponse => {
            
//                 console.log({ jsonResponse });
//                 window.alert({jsonResponse});
//               });
            
//             });
            
      
//         });
       

// }

// new rest api ajax
//
   
    // $.ajax({
    // //     url:'https://jsonplaceholder.typicode.com/users/1',
    // //    data= $.getJSON("https://jsonplaceholder.typicode.com/users/")
    // })
    
       
    //     .done(function(data){
    //         window.alert("click successfully");
    //         window.alert('data');
    //         console.log('data');
    //     } );
        
    // });
    // readOneBtn.addEventListener('click', (e) => {

    //     e.preventDefault();
    
        //rest api  ajax
        
    //     fetch('/wordpress/users/v1/users/1').then(response => {
    
    //         return response.json();
      
    //       }).then(jsonResponse => {
    
    //         window.alert({jsonResponse});
    //         console.log({ jsonResponse });
      
    //       });
    //     });