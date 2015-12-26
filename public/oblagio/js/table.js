$(function(){

    div_oblagio_table = $("#div_oblagio_table").text();
    
    if(div_oblagio_table != '')
    {
        oblagio_table_json = JSON.parse(div_oblagio_table);
    }else{
        oblagio_table_json = '';
    }

    $("#oblagio-table").DataTable({
        oLanguage: {
            sProcessing: "<img src = '/oblagio/images/loading.gif'/>"
        },
        processing: true,
        serverSide: true,
        ajax: urlAction("data"),
        columns: oblagio_table_json,
        
    });

    $("#oblagio-table-default").DataTable({
        ordering :false
    });	
});

