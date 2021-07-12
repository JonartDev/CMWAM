@section('javascripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>         
         $(document).ready(function() {            
    // Setup - add a text input to each footer cell
        $('#datatables thead tr').clone(true).appendTo( '#datatables thead' );
        $('#datatables thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" />' );          
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
                table.column(5).search().draw()='none';
            } );
        } );    
        var table = $('#datatables').DataTable( {
            orderCellsTop: true,
            fixedHeader: true
        } );
    } );
    </script>
@endsection