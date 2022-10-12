//Global variables
var date, time;

//Ajax Jquery
$(document).ready(function (e) {
    $("#modal_content").on('submit',(function(e) {e.preventDefault();
        date = $(".date:checked").val();
        time = $(".time:checked").val();
        $.ajax({ 
            type:'POST',
            url:'validate.php',
            data:$("#modal_content").serialize()+"&FormType="+$("#form_btn").val()+"&date="+date+"&time="+time,
            success:function(message){
    		    if (message.match(/verif/gi)){
    		        document.getElementById("modal_content").innerHTML = message;
    		    } else {
    		        alert(message);
    		    }
            }
        });
    }));
});
