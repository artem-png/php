


function onChangeName(i){

    var name = $("#inputName"+i).val();
    if (checkForEmpty(i)) {
        deleteProduct(i);
    }
    else {
        $.ajax({
            type: 'POST',
            async: false,
            url: '/basic/web/site/updateproductname',
            data: {
                id: i,
                name: name,
            },
            dataType: 'json',
            success: function (data) {
                if (data['successful'] == 1) {

                } else {
                    alert("no");
                }

            }


        });
    }
}


function onChangeCategory(i){

    var name = $("#inputCategory"+i).val();
    if (checkForEmpty(i)) {
        deleteProduct(i);
    }
    else {
        $.ajax({
            type: 'POST',
            async: false,
            url: '/basic/web/site/updateproductcategory',
            data: {
                id: i,
                name: name,
            },
            dataType: 'json',
            success: function (data) {
                if (data['successful'] == 1) {

                } else {
                    alert("no");
                }

            }


        });
    }
}

function onChangePrice(i) {

    var name = $("#inputPrice" + i).val();
    if (checkForEmpty(i)) {
        deleteProduct(i);
    }
    else
    if (!isNaN(parseFloat(name)) && isFinite(name) && name.length>0) {


            $.ajax({
                type: 'POST',
                async: false,
                url: '/basic/web/site/updateproductprice',
                data: {
                    id: i,
                    name: name,
                },
                dataType: 'json',
                success: function (data) {
                    if (data['successful'] == 1) {

                    } else {
                        alert("no");
                    }

                }


            });
        }

    else {
        $("#inputPrice" + i).val("");
    }
}

function  checkForEmpty(i) {
    var name = $("#inputPrice" + i).val();
    var category = $("#inputCategory" + i).val();
    var price = $("#inputName" + i).val();
    if (name.length < 1 && category.length < 1 && price.length < 1) {


        return true;
    }

}

function deleteProduct(i){
    $.ajax({
        type: 'POST',
        async: false,
        url: '/basic/web/site/deleteproduct',
        data: {
            id: i,
        },
        dataType: 'json',
        success: function (data) {
            if (data['successful'] == 1) {

                $('#stolb'+i).hide('slow', function() {
                    $('#stolb'+i).remove();
                });
            } else {
                alert("no delete");
            }

        }


    });
}


function addNewByName(){
    var name = $("#newName").val();

    $.ajax({
        type: 'POST',
        async: false,
        url: '/basic/web/site/addproduct',
        data: {
            name: name,
        },
        dataType: 'json',
        success: function (data) {
            if (data['successful'] == 1) {


                $('#myTable  tr:last').before('<tr id="stolb'+data['id']+'">' +
                    '<th id="id'+data['id']+'">' +
                    ''+data['id']+'</th>' +
                    '<th id="name'+data['id']+'">' +
                    ' <input id="inputName'+data['id']+'" onchange="onChangeName('+data['id']+')" size="40" value="'+name+'" > </th>' +
                    '<th id="category'+data['id']+'">' +
                    ' <input id="inputCategory'+data['id']+'" onchange="onChangeCategory('+data['id']+')"  value="" > </th>' +
                    '<th id="price'+data['id']+'">' +
                    ' <input id="inputPrice'+data['id']+'" onchange="onChangePrice('+data['id']+')"  value="" > </th>');


                $('#newName').val("");
                $('#inputCategory'+data['id']).focus();



            } else {
                alert("no added");
            }

        }


    });


}


function addNewByCategory(){
    var name = $("#newCategory").val();


    $.ajax({
        type: 'POST',
        async: false,
        url: '/basic/web/site/addproduct',
        data: {
            category: name,
        },
        dataType: 'json',
        success: function (data) {
            if (data['successful'] == 1) {
                $('#myTable  tr:last').before('<tr id="stolb'+data['id']+'">' +
                    '<th id="id'+data['id']+'">' +
                    ''+data['id']+'</th>' +
                    '<th id="name'+data['id']+'">' +
                    ' <input id="inputName'+data['id']+'" onchange="onChangeName('+data['id']+')" size="40" value="" > </th>' +
                    '<th id="category'+data['id']+'">' +
                    ' <input id="inputCategory'+data['id']+'" onchange="onChangeCategory('+data['id']+')"  value="'+name+'" > </th>' +
                    '<th id="price'+data['id']+'">' +
                    ' <input id="inputPrice'+data['id']+'" onchange="onChangePrice('+data['id']+')"  value="" > </th>');

                $('#newCategory').val("");
                $('#inputPrice'+data['id']).focus();

            } else {
                alert("no added");
            }

        }


    });

}


function addNewByPrice(){
    var name = $("#newPrice").val();
    if (!isNaN(parseFloat(name)) && isFinite(name) && name.length>0)
    $.ajax({
        type: 'POST',
        async: false,
        url: '/basic/web/site/addproduct',
        data: {
            price: name,
        },
        dataType: 'json',
        success: function (data) {
            if (data['successful'] == 1) {


                $('#myTable  tr:last').before('<tr id="stolb'+data['id']+'">' +
                    '<th id="id'+data['id']+'">' +
                    ''+data['id']+'</th>' +
                    '<th id="name'+data['id']+'">' +
                    ' <input id="inputName'+data['id']+'" onchange="onChangeName('+data['id']+')" size="40" value="" > </th>' +
                    '<th id="category'+data['id']+'">' +
                    ' <input id="inputCategory'+data['id']+'" onchange="onChangeCategory('+data['id']+')"  value="" > </th>' +
                    '<th id="price'+data['id']+'">' +
                    ' <input id="inputPrice'+data['id']+'" onchange="onChangePrice('+data['id']+')"  value="'+name+'" > </th>');

                $('#newPrice').val("");
                $('#inputCategory'+data['id']).focus();
            } else {
                alert("no added");
            }

        }


    });
    else $("#newPrice").val("");

}
