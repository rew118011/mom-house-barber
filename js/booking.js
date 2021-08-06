$(document).ready(function() {
    $('#year').change(function() {
        $('#month').change(function() {
            $('#day').change(function() {
                var BK_Year = $('#year').val();
                var BK_Month = $('#month').val();
                var BK_Day = $('#day').val();
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/Booking_Con/fetch_Barber",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        BK_Year: BK_Year,
                        BK_Month: BK_Month,
                        BK_Day: BK_Day
                    },

                    success: function(response) {
                        $('#barber').find('input[type="radio"]').remove();
                        $('#barber').find('.item.barber').remove();
                        $('#Time_Slot').find('input[type="radio"]').remove();
                        $('#Time_Slot').find('.input.slottime').remove();
                        $('#Time_Slot').find('.option.slottime').remove();
                        $('#Time_Slot').find('.option.slottime').remove();
                        $.each(response, function(index, data) {
                            $('#barber').append('<div class="item barber"><div class="content"><input class="bb" type="radio" name="B_ID" value="' + data['B_ID'] + '" id="' + data['B_ID'] + '" class"barber_slottime" /><label class="Nbarber" for="' + data['B_ID'] + '"><div class="image"><img src="http://localhost/Mom_House_Barber/img/' + data['B_Img'] + '"></div><div class="name"><p>ช่าง' + data['B_Nickname'] + '</p></div></label></div></div>');
                        });

                        $('input[type="radio"]').change(function() {
                            var B_ID = $(this).val();
                            $.ajax({
                                url: "<?php echo base_url(); ?>index.php/Booking_Con/fetch_TimeSlot",
                                method: "POST",
                                dataType: 'json',
                                data: {
                                    BK_Year: BK_Year,
                                    BK_Month: BK_Month,
                                    BK_Day: BK_Day,
                                    B_ID: B_ID
                                },

                                success: function(response) {
                                    $('#Time_Slot').find('.content').remove();
                                    $('#Time_Slot').find('input[type="radio"]').remove();
                                    $('#Time_Slot').find('.input.slottime').remove();
                                    $('#Time_Slot').find('.option.slottime').remove();
                                    $.each(response, function(index, data) {
                                        $('#Time_Slot').append('<div class="content"><input class="input slottime" type="radio" name="ST_ID" id="option-' + data['ST_ID'] + '" value="' + data['ST_ID'] + '"><label for="option-' + data['ST_ID'] + '" class="option option-' + data['ST_ID'] + ' slottime"><div class="dot"></div><span>' + data['ST_Time'] + '</span></label></div> ');
                                    });

                                }
                            });
                        });
                    }
                });
            });
        });
    });
});