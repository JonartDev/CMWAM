var table;
$(document).ready(function () {
    $('#datatableH thead tr').clone(true).appendTo( '#datatableH thead' );
        $('#datatableH thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text"/>');
            
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
          
        } );
    table=$('table.user_logs').DataTable({ 
            "dom":  '<"top"i>rt<"bottom"flp><"clear">',
            "language": {
                "emptyTable": " ",
                "processing":"<img style='width:100px; height:100px; color:#455357;' src='/loader.gif' />"
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: '/admin/homes',
                error: function(data) {
                    console.log(data);
                },
                beforeSend: function(xhrObj){
                    xhrObj.setRequestHeader("Authorization","Bearer "+$('meta[name="tok"]').attr('content'));
                },
            },
            columns: [
                { data: 'Email', name:'Email', "width": "14%"},
                { data: 'Name', name:'Name', "width": "14%"},
                { data: 'created_at', name:'created_at', "width": "14%",
                  "render": function (data) {
                    var date = new Date(data);
                    var month = date.getMonth();
                    return (month.toString().length > 1 ? month : "0" + month ) + "/" + date.getDate() + "/" + date.getFullYear() +" - " +date.getHours()+":"+date.getMinutes();
                } },
                { data: 'Activity', name:'Activity'},
            ],
            orderCellsTop: true,
            fixedHeader: true,
            
        });
        
        
        
});