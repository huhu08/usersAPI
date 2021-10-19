<script
			  src="https://code.jquery.com/jquery-3.6.0.js"
			  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
			  crossorigin="anonymous"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {  
    var user_id='1';
    $.ajax({
        url:'/wp-admin/admin-ajax.php',
        data:{
            'action':'',
            'user_id':'user_id',
        }
        success:function(data){
            console.log("test");
        }
    })

}
</script>		