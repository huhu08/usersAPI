$(document).ready(function(){
 
    // handle 'read one' button click
    $(document).on('click', '.read-one-user-button', function(){
        // user ID will be here
        var id = $(this).attr('data-id');
        $.getJSON("https://jsonplaceholder.typicode.com/users/" + id, function(data){
    // read products button will be here
});
    });
 
});