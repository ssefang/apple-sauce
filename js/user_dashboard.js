$(document).ready(function() {

    $('.btn-primary').click(function(e){
        e.preventDefault();   
        var position_id =  $(this).data('posid');        //get from data-id
        var user_id =  $(this).data('userid');        //get from data-id
        var confirm_status =  confirm("Are you sure to apply this position?");     
        if(confirm_status == true) {

            $(this).attr("disabled",true);  

            $.ajax({

                type: "POST", 
                url: 'user_apply.php', 
                data: {posid:position_id,userid:user_id}, 
                success: function (response) {            
                    if(response == false){
                        alert('You have already applied for this position. You cannot submit twice');
                    }else{
                        alert('Done.');
                    }
                }
            });
        }

    });


    $('#updateform').submit(function(e){
        e.preventDefault();  
        var form = $(this);
        var confirm_status =  confirm("Ready to update?");     
        if(confirm_status == true) {
            $.ajax({
                type: "POST", 
                url:form.attr('action'), 
                data: form.serialize(),
                success: function (result) {
                    console.log(result);
                    if (result == 'success') {
                        document.getElementById('info').innerHTML = '<h3>You have updated your file.</h3>';
                    } else {
                        document.getElementById('info').innerHTML = '<h3>'+result+'</h3>';
                    }
                    
                },
            });
        }

    });



    // //search bar
    // $('.submit-search-btn').click(function(e){
    //     e.preventDefault();
    //     var search_keyword =  $('#search-id-nn').val();
    //     console.log(search_keyword);
        
    //     $.ajax({
    //                 type: "POST",
    //                 url: 'search.php', 
    //                 data: {search_keyword:search_keyword}, 
    //                 success: function (response) {
    //                     $('#customers').html(''); 
    //                     $('#customers').html(response); 
    //                 }
    //             });
    //     });





});
