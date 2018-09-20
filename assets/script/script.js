function showHideTask() {

     $('.change input[type=checkbox]').click(function() {
         if ($(this).is(":checked")) {
             $(this).data( 'clicked', 'clicked' );

             $(".chackbox1").find('td .list').each(function () {
                 if($(this).val() == '3') {
                     var ids=$(this).parent().parent().find(".chackbox1");
                        ids['prevObject'].hide();
                 }
             });

             $('.change label').text("Show competed tasks");
         } else {
             $(this).data( 'clicked', '' );
             $(".chackbox1").find('td .list').each(function () {
                 if($(this).val() == '3') {
                     var ids=$(this).parent().parent().find(".chackbox1");
                     ids['prevObject'].show();
                 }
             });
             $('.change label').text("Hide competed tasks")
         }
     });
}

function statusTask() {

    $('.btn-check').on('click', function (e) {
        e.preventDefault();
        var clicks = $(this).data('clicks');

            if(clicks) {
                $(this).css({"background": "MediumSeaGreen", "color": "#fff"});
                $(this).parent().parent().find("td .list").val(3);
                $(this).parent().parent().find("#link").css({"text-decoration": "line-through"});
            } else {
                $(this).css({"background": "transparent", "color": "#343a40"});
                $(this).parent().parent().find("td .list").val(1);
                $(this).parent().parent().find("#link").css({"text-decoration": "none"});
            }
        $(this).data("clicks", !clicks);
    });

    $('.list').on('change', function(){

        if($(this).val() == '3') {
            $(this).parent().parent().find(".btn-check").css({"background": "MediumSeaGreen", "color": "#fff"});
            $(this).parent().parent().find("#link").css({"text-decoration": "line-through"});

        } else {
            $(this).parent().parent().find('.btn-check').css({"background":"transparent","color":"#343a40"});
            $(this).parent().parent().find('#link').css({"text-decoration":"none"});
        }
    });

}

function createTask () {
    $('#submit').on('click', function (e) {
        e.preventDefault();
        var summary      = $('#text-summary').val(),
            date    = $('#date').val(),
            desc     = $('#descriptions').val();

        $.ajax({
            url:'../../request.php',
            method:'POST',
            data:{
                'summary':summary,
                'date':date,
                'desc':desc,
                'p':'insertTask'
            },
            dataType: "json",
            success:function (response) {
                console.log(response.success);
                if(response.success == 'ok') {
                    $('.createSuccess').removeClass('hide');
                }
            },
            error:function (error) {
                console.log(error);
            }
        });
        return false;
    });
}


function editingTask() {
    $(document).on('click','.edit', function(e){
        e.preventDefault();
         var uid   = $(this).data('uid');

         $.ajax({
             url:'../../request.php',
             method:'POST',
             data:{
                 'uid':uid,
                 'p':'editTask'
             },
             dataType: "json",
             success:function (data) {
                 $('#editSummary').val(data[1]);
                 $('#dateEdit').val(data[2]);
                 $('#descriptionsEdit').val(data[3]);
                 $('#idEdit').val(data[0]);
                 console.log(data)
             }
         });
         return false;
     });
}

function viewTask() {
    $(document).on('click','.viewClass', function(e){
        e.preventDefault();
        var vid   = $(this).data('vid');
        console.log(vid);

        $.ajax({
            url:'../../request.php',
            method:'POST',
            data:{
                'vid':vid,
                'p':'viewTask'
            },
            dataType: "json",
            success:function (data) {
                $('.descrpt').html(data[3]);
                $('#vi-id').val(data[0]);
                console.log(data)
            }
        });
        return false;
    });
}

function updateTask() {
    $('.editBtn').on('click',function (e) {
        e.preventDefault();
        var  uid         = $("input[name='idEdit']").val(),
             summary     = $("input[name='editSummary']").val(),
             date        = $("input[name='dateEdit']").val(),
             description = $("textarea[name='descriptionsEdit']").val();

        $.ajax({
            url:'../../request.php',
            method:'POST',
            data:{
                'uid':uid,
                'summary':summary,
                'date':date,
                'description':description,
                'p':'updateTask'
            },
            dataType: "json",
            success: function (response) {
                if(response.success == 'Yes') {
                    $('.updateSuccess').removeClass('hide');
                }
            }
        });
        return false;
    });
}

function deleteTask() {
    $('.btn-del').on('click',function (e) {
        e.preventDefault();
        var  cid = $("#del-id").val();
        $.ajax({
            url:'../../request.php',
            method:'POST',
            data:{
                'cid':cid,
                'p':'deleteTasks'
            },
            success: function (response) {
                location.reload();
            }
        });
        return false;
    });

}

$(document).ready(function() {

    showHideTask();
    statusTask();
    createTask();
    editingTask();
    updateTask();
    viewTask()
    deleteTask();

    /* DataTables options */
    $('#example').DataTable( {
        paging: false,
        searching: false,
        ordering:  true,
        select: false,
        bInfo : false
    } );
    
});