function deleteProduct(i){

    $.ajax({
        type: 'POST',
        async: false,
        url: '/chamelion/web/index.php?r=books%2Fdeletebook',
        data: {
            id: i,
        },
        dataType: 'json',
        success: function (data) {
            if (data['successful'] == 1) {

                $('#tr'+i).hide('slow', function() {
                    $('#tr'+i).remove();
                });
            } else {
                alert("no delete");
            }

        }


    });
}

function modal(img,name,date,title) {
    $("#modalimg").attr("src",img);
    $("#modaltitle").text(title);
    $("#modalauthor").text("Автор: "+name);
    $("#modaldate").text("Дата написания: "+date);
    $('#exampleModal').arcticmodal();

}