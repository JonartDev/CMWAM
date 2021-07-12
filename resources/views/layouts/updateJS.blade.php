<script>
var id;
$(document).on('click', '.userEdit', function () {
    id = $(this).attr('data_id');
        $('#cid').val(id);
    var name = $(this).attr('data_name');
        $('#name').val(name);
    var email = $(this).attr('data_email');
        $('#email').val(email);
    var status = $(this).attr('data_status');
        $('#stat').val(status);
    var userlevel = $(this).attr('data_ulevel');
        $('#ulevel').val(userlevel);
});
</script>