function showHideTask() {
     $('.change input[type=checkbox]').click(function() {
         if ($(this).is(":checked")) {
             $(this).data( 'clicked', 'clicked' );
             if($("td .list").val() == '3') {
                 $(this).parent().parent().parent().parent().parent().find('tbody .chackbox1').show();
             }
             $('.change label').text("Hide competed tasks");
         } else {
             $(this).data( 'clicked', '' );
             if($("td .list").val() == '3') {
                 $(this).parent().parent().parent().parent().parent().find('tbody .chackbox1').hide();
             }
             $('.change label').text("Show competed tasks")
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
            success:function (response) {
                console.log(response);
            },
            error:function (error) {
                console.log(error);
            }
        });
        return false;
    });
}


function updateTask() {
    $(document).on('click','.edit', function(e){
        e.preventDefault();
         var uid   = $(this).data('uid');

         $.ajax({
             url:'../../request.php',
             method:'POST',
             data:{
                 'uid':uid,
                 'p':'updateTask'
             },
             success:function (response) {
                 console.log(response);
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
    updateTask();
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