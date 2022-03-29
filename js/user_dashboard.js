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
                    alert('You have update your file.');
                }
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


    // //全选按钮 
    // $(".checkall").change(function(){
    //     $(".select-delete-nn").prop("checked",$(this).prop("checked"));
    // });    

    //  //所有小按钮选完自动勾选checkall 按钮

    // $(".select-delete-nn").change(function(){
    //     if($(".select-delete-nn:checked").length === $(".select-delete-nn").length){
    //         $(".checkall").prop("checked",true);
    //     }else{
    //         $(".checkall").prop("checked",false);
    //     }
    // });



    
    // //删除多行
    // $('.delete-all').click(function(e){
    //     e.preventDefault;
    //     var delete_rows = []; 
    //     $('.select-delete-nn:checked').each(function(i){
    //         delete_rows[i] = $(this).data('id');
    //     })
    //     console.log(delete_rows);
    //     if(delete_rows.length === 0){
    //         alert("At least chose one.");
    //     }else{
    //         $.ajax({
    //             type: "POST", 
    //             url: 'deleterows.php', 
    //             data: {id:delete_rows}, 
    //             success: function (res) {
    //                 for(var i=0; i<delete_rows.length;i++){
    //                     $('#customers').html(''); 
    //                     $('#customers').html(res);
    //                 }
    //             }
    //         });
    //     }
    // })




});
