$(document).ready(function() {
    $('#btnPay').click(function() {
        var BK_ID = $(this).val();

        $.ajax({
            url: "<?php echo base_url(); ?>index.php/Booking_Con/dynamically_KeepQueue",
            method: "POST",
            dataType: 'json',
            data: {
                BK_ID: BK_ID,

            },
            success: function(response) {
                $("#<?php echo $row->BK_ID; ?>").html(response);
                $('#<?php echo $row->BK_ID; ?> tr').remove();
                location.reload();
            }
        });

    });
});