var table;
var mspg;
var puregold;
var select="puregold";

$(document).ready(function () {
    $('#datatable thead tr').clone(true).appendTo( '#datatable thead' );
        $('#datatable thead tr:eq(1) th').each( function (i) {
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
   table= $('table.puregoldTable').DataTable({ 
            "dom": '<"top"i>rt<"bottom"flp><"clear">',
            "language": {
                "emptyTable": " ",
                "processing": "<img style='width:100px; height:100px;' src='/loader.gif' />"
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: 'customer/puregolds',
                error: function(data) {
                    console.log(data);
                },
                beforeSend: function(xhrObj){
                    xhrObj.setRequestHeader("Authorization","Bearer "+$('meta[name="tok"]').attr('content'));
                },
            },
            'fnRowCallback':function (row,data) {
                if (data.Status == "ACTIVE") {
                    $('td', row).eq(6).css('color', 'green');                    
                    $('td', row).eq(6).css('text-align', 'center');          
                    $('td', row).eq(6).css('font-weight', 'bold');
                }
                if(data.Status == "EXPIRED") {
                    $('td', row).eq(6).css('color', 'blue');           
                    $('td', row).eq(6).css('text-align', 'center');         
                    $('td', row).eq(6).css('font-weight', 'bold');
                }if(data.Status == "EXPIRING"){
                    $('td', row).eq(6).css('color', 'red');           
                    $('td', row).eq(6).css('text-align', 'center');         
                    $('td', row).eq(6).css('font-weight', 'bold');
                }
            },
            columns: [
                { data: 'Customer_name', name:'Customer_name'},
                { data: 'Item_description', name:'Item_description', "width": "14%"},
                { data: 'Serial', name:'Serial', "width": "14%"},
                { data: 'Receiving_date', name:'Receiving_date', "width": "14%"},
                { data: 'End_warranty', name:'End_warranty', "width": "14%"},
                { data: 'Specification', name:'Specification', "width": "20%"},
                { data: 'Status', name:'Status', "width": "14%"}
            ],
            orderCellsTop: true,
            fixedHeader: true            
        }); 
        $("#PUREGOLD").toggleClass('nav-tabs nav-link active');   
        $("#puregoldTable").toggle();   

    //PUREGOLD
     $('#PUREGOLD').on('click', function () {
        $("#mspgTable").hide(); 
        $("#MSPG").removeClass('nav-tabs nav-link active');
        $("#LCC").removeClass('nav-tabs nav-link active');
        $("#lccTable").hide();
        $("#SHOEMART").removeClass('nav-tabs nav-link active');
        $("#shoemartTable").hide();
        $("#PUREGOLD").toggleClass('nav-tabs nav-link active');
        $("#puregoldTable").toggle();
        $('table.puregoldTable').dataTable().fnDestroy();   
        select = 'pg';
        table=$('table.puregoldTable').DataTable({ 
                "dom": '<"top"i>rt<"bottom"flp><"clear">',
                "language": {
                    "emptyTable": " ",
                    "processing": "<img style='width:100px; height:100px;' src='/loader.gif' />"
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: 'customer/puregolds',
                    error: function(data) {
                        console.log(data);
                    },
                    beforeSend: function(xhrObj){
                        xhrObj.setRequestHeader("Authorization","Bearer "+$('meta[name="tok"]').attr('content'));
                    },
                },
                'fnRowCallback':function (row,data) {
                    if (data.Status == "ACTIVE") {
                        $('td', row).eq(6).css('color', 'green');                    
                        $('td', row).eq(6).css('text-align', 'center');          
                        $('td', row).eq(6).css('font-weight', 'bold');
                    }
                    if(data.Status == "EXPIRED") {
                        $('td', row).eq(6).css('color', 'blue');           
                        $('td', row).eq(6).css('text-align', 'center');         
                        $('td', row).eq(6).css('font-weight', 'bold');
                    }if(data.Status == "EXPIRING"){
                        $('td', row).eq(6).css('color', 'red');           
                        $('td', row).eq(6).css('text-align', 'center');         
                        $('td', row).eq(6).css('font-weight', 'bold');
                    }
                },
                columns: [
                    { data: 'Customer_name', name:'Customer_name'},
                    { data: 'Item_description', name:'Item_description', "width": "14%"},
                    { data: 'Serial', name:'Serial', "width": "14%"},
                    { data: 'Receiving_date', name:'Receiving_date', "width": "14%"},
                    { data: 'End_warranty', name:'End_warranty', "width": "14%"},
                    { data: 'Specification', name:'Specification', "width": "20%"},
                    { data: 'Status', name:'Status', "width": "14%"}
                ],
                orderCellsTop: true,
                fixedHeader: true            
            }); 
        
    });

    // MSPG
         $('#datatablem thead tr').clone(true).appendTo( '#datatablem thead' );
        $('#datatablem thead tr:eq(1) th').each( function (i) {
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
     $('#MSPG').on('click', function () {   
        $("#PUREGOLD").removeClass('nav-tabs nav-link active');
        $("#puregoldTable").hide();
        $("#LCC").removeClass('nav-tabs nav-link active');
        $("#lccTable").hide();
        $("#SHOEMART").removeClass('nav-tabs nav-link active');
        $("#shoemartTable").hide();
        $("#SMMA").removeClass('nav-tabs nav-link active');
        $("#smmaTable").hide();
        $("#MSPG").toggleClass('nav-tabs nav-link active');
        $("#mspgTable").toggle();
        $('table.mspgTable').dataTable().fnDestroy();    
        select = 'mspg';
        table=$('table.mspgTable').DataTable({ 
                "dom": '<"top"i>rt<"bottom"flp><"clear">',
                "language": {
                    "emptyTable": " ",
                    "processing": "Searching"
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: 'customer/mspgs',
                    error: function(data) {
                        alert(data.responseText);
                    },
                    beforeSend: function(xhrObj){
                        xhrObj.setRequestHeader("Authorization","Bearer "+$('meta[name="tok"]').attr('content'));
                    },
                },
                'fnRowCallback':function (row,data) {
                    if (data.Status == "ACTIVE") {
                        $('td', row).eq(8).css('color', 'green');                    
                        $('td', row).eq(8).css('text-align', 'center');          
                        $('td', row).eq(8).css('font-weight', 'bold');
                    }
                    if(data.Status == "EXPIRED") {
                        $('td', row).eq(8).css('color', 'blue');           
                        $('td', row).eq(8).css('text-align', 'center');         
                        $('td', row).eq(8).css('font-weight', 'bold');
                    }if(data.Status == "EXPIRING"){
                        $('td', row).eq(8).css('color', 'red');           
                        $('td', row).eq(8).css('text-align', 'center');         
                        $('td', row).eq(8).css('font-weight', 'bold');
                    }
                },
                columns: [
                    { data: 'Company', name:'Company', "width": "100%"},
                    { data: 'Branch_Name', name:'Branch_Name', "width": "12%"},
                    { data: 'Handling_Branch', name:'Handling_Branch', "width": "12%"},
                    { data: 'Store_Name', name:'Store_Name', "width": "12%"},
                    { data: 'Brand', name:'Brand', "width": "12%"},
                    { data: 'Serial_Number', name:'Serial_Number', "width": "12%"},
                    { data: 'Start', name:'Start', "width": "12%"},
                    { data: 'End', name:'End', "width": "12%"},
                    { data: 'Status', name:'Status', "width": "12%"}
                ]
            });
    });
    // LCC
        $('#datatablelcc thead tr').clone(true).appendTo( '#datatablelcc thead' );
            $('#datatablelcc thead tr:eq(1) th').each( function (i) {
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

     $('#LCC').on('click', function () {    
        $("#PUREGOLD").removeClass('nav-tabs nav-link active');
        $("#puregoldTable").hide();
        $("#MSPG").removeClass('nav-tabs nav-link active');
        $("#mspgTable").hide();
        $("#shoemartTable").hide();
        $("#SHOEMART").removeClass('nav-tabs nav-link active');
        $("#SMMA").removeClass('nav-tabs nav-link active');
        $("#smmaTable").hide();
        $("#LCC").toggleClass('nav-tabs nav-link active');
        $("#lccTable").toggle();
        $('table.lccTable').dataTable().fnDestroy();    
        select = 'lcc';
        table=$('table.lccTable').DataTable({ 
                "dom": '<"top"i>rt<"bottom"flp><"clear">',
                "language": {
                    "emptyTable": " ",
                    "processing": "Searching"
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: 'customer/lccs',
                    error: function(data) {
                        alert(data.responseText);
                    },
                    beforeSend: function(xhrObj){
                        xhrObj.setRequestHeader("Authorization","Bearer "+$('meta[name="tok"]').attr('content'));
                    },
                },
                'fnRowCallback':function (row,data) {
                    if (data.Status == "ACTIVE") {
                        $('td', row).eq(6).css('color', 'green');                    
                        $('td', row).eq(6).css('text-align', 'center');          
                        $('td', row).eq(6).css('font-weight', 'bold');
                    }
                    if(data.Status == "EXPIRED") {
                        $('td', row).eq(6).css('color', 'blue');           
                        $('td', row).eq(6).css('text-align', 'center');         
                        $('td', row).eq(6).css('font-weight', 'bold');
                    }if(data.Status == "EXPIRING"){
                        $('td', row).eq(6).css('color', 'red');           
                        $('td', row).eq(6).css('text-align', 'center');         
                        $('td', row).eq(6).css('font-weight', 'bold');
                    }
                },
                columns: [
                    { data: 'Customer_name', name:'Customer_name'},
                    { data: 'Item_description', name:'Item_description', "width": "14%"},
                    { data: 'Serial', name:'Serial', "width": "14%"},
                    { data: 'Receiving_date', name:'Receiving_date', "width": "14%"},
                    { data: 'End_warranty', name:'End_warranty', "width": "14%"},
                    { data: 'Specification', name:'Specification', "width": "20%"},
                    { data: 'Status', name:'Status', "width": "14%"}
                ]
            });
             
    });

        // SHOEMART
        $('#datatableshoemart thead tr').clone(true).appendTo( '#datatableshoemart thead' );
            $('#datatableshoemart thead tr:eq(1) th').each( function (i) {
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

     $('#SHOEMART').on('click', function () {    
        $("#PUREGOLD").removeClass('nav-tabs nav-link active');
        $("#puregoldTable").hide();
        $("#MSPG").removeClass('nav-tabs nav-link active');
        $("#mspgTable").hide();
        $("#LCC").removeClass('nav-tabs nav-link active');
        $("#lccTable").hide();
        $("#SMMA").removeClass('nav-tabs nav-link active');
        $("#smmaTable").hide();
        $("#SHOEMART").toggleClass('nav-tabs nav-link active');
        $("#shoemartTable").toggle();
        $('table.shoemartTable').dataTable().fnDestroy();    
        select = 'shoemart';
        table=$('table.shoemartTable').DataTable({ 
                "dom": '<"top"i>rt<"bottom"flp><"clear">',
                "language": {
                    "emptyTable": " ",
                    "processing": "Searching"
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: 'customer/shoemarts',
                    error: function(data) {
                        alert(data.responseText);
                    },
                    beforeSend: function(xhrObj){
                        xhrObj.setRequestHeader("Authorization","Bearer "+$('meta[name="tok"]').attr('content'));
                    },
                },
                'fnRowCallback':function (row,data) {
                    if (data.Status == "ACTIVE") {
                        $('td', row).eq(7).css('color', 'green');                    
                        $('td', row).eq(7).css('text-align', 'center');          
                        $('td', row).eq(7).css('font-weight', 'bold');
                    }
                    if(data.Status == "EXPIRED") {
                        $('td', row).eq(7).css('color', 'blue');           
                        $('td', row).eq(7).css('text-align', 'center');         
                        $('td', row).eq(7).css('font-weight', 'bold');
                    }if(data.Status == "EXPIRING"){
                        $('td', row).eq(7).css('color', 'red');           
                        $('td', row).eq(7).css('text-align', 'center');         
                        $('td', row).eq(7).css('font-weight', 'bold');
                    }
                },
                columns: [
                    { data: 'Customer_name', name:'Customer_name'},
                    { data: 'Pos_model', name:'Pos_model', "width": "14%"},
                    { data: 'Serial', name:'Serial', "width": "14%"},
                    { data: 'Receiving_date', name:'Receiving_date', "width": "14%"},
                    { data: 'End_warranty', name:'End_warranty', "width": "14%"},
                    { data: 'KB_Touchscreen', name:'KB_Touchscreen', "width": "14%"},
                    { data: 'Specification', name:'Specification', "width": "20%"},
                    { data: 'Status', name:'Status', "width": "14%"}
                ]
            });
             
    }); 

     // SMMA
        $('#datatablesmma thead tr').clone(true).appendTo( '#datatablesmma thead' );
            $('#datatablesmma thead tr:eq(1) th').each( function (i) {
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

     $('#SMMA').on('click', function () {    
        $("#PUREGOLD").removeClass('nav-tabs nav-link active');
        $("#puregoldTable").hide();
        $("#MSPG").removeClass('nav-tabs nav-link active');
        $("#mspgTable").hide();
        $("#LCC").removeClass('nav-tabs nav-link active');
        $("#lccTable").hide();
        $("#SHOEMART").removeClass('nav-tabs nav-link active');
        $("#shoemartTable").hide();
        $("#SMMA").toggleClass('nav-tabs nav-link active');
        $("#smmaTable").toggle();
        $('table.smmaTable').dataTable().fnDestroy();    
        select = 'smma';
        table=$('table.smmaTable').DataTable({ 
                "dom": '<"top"i>rt<"bottom"flp><"clear">',
                "language": {
                    "emptyTable": " ",
                    "processing": "Searching"
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: 'customer/smmas',
                    error: function(data) {
                        alert(data.responseText);
                    },
                    beforeSend: function(xhrObj){
                        xhrObj.setRequestHeader("Authorization","Bearer "+$('meta[name="tok"]').attr('content'));
                    },
                },
                'fnRowCallback':function (row,data) {
                    if (data.Status == "ACTIVE") {
                        $('td', row).eq(6).css('color', 'green');                    
                        $('td', row).eq(6).css('text-align', 'center');          
                        $('td', row).eq(6).css('font-weight', 'bold');
                    }
                    if(data.Status == "EXPIRED") {
                        $('td', row).eq(6).css('color', 'blue');           
                        $('td', row).eq(6).css('text-align', 'center');         
                        $('td', row).eq(6).css('font-weight', 'bold');
                    }if(data.Status == "EXPIRING"){
                        $('td', row).eq(6).css('color', 'red');           
                        $('td', row).eq(6).css('text-align', 'center');         
                        $('td', row).eq(6).css('font-weight', 'bold');
                    }
                },
                columns: [
                    { data: 'Company_name', name:'Company_name'},
                    { data: 'Location', name:'Location', "width": "14%"},
                    { data: 'Model', name:'Model', "width": "14%"},
                    { data: 'Serial_number', name:'Serial_number', "width": "14%"},
                    { data: 'Start_date', name:'Start_date', "width": "14%"},
                    { data: 'End_date', name:'End_date', "width": "14%"},
                    { data: 'Status', name:'Status', "width": "14%"}
                ]
            });
             
    });    

    if(window.location.href.indexOf('#lccTable') > -1){
        if (!$('#datatablelcc').is(':visible')) {
            $('#LCC').trigger('click');
        }
    }if(window.location.href.indexOf('#puregoldTable') > -1){
        if (!$('#datatable').is(':visible')) {
            $('#PUREGOLD').trigger('click');
        }
    }if(window.location.href.indexOf('mspgTable') > -1){
        if (!$('#datatablem').is(':visible')) {
            $('#MSPG').trigger('click');
        }
    }if(window.location.href.indexOf('shoemartTable') > -1){
        if (!$('#datatableshoemart').is(':visible')) {
            $('#SHOEMART').trigger('click');
        }
    }if(window.location.href.indexOf('smmaTable') > -1){
        if (!$('#datatablesmma').is(':visible')) {
            $('#SMMA').trigger('click');
        }
    }
      
});
    $(document).click(function(e) {
        if ($('#divError').is(':visible')) {
            if(confirm('Do you want to removed error message?')){
                e.preventDefault();
                $('#divError').hide();
            }        
        }
    });

