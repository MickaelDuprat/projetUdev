
// datepicker
        $( function() {
    $("#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '1920:2001',
        dateFormat : 'dd-mm-yy',
        defaultDate: new Date(2000,01,01)
    });
});
