
//  datepicker pour la date de naissance //
        $( function() {
    $("#datepicker" ).datepicker({
        dateFormat : 'dd/mm/yy',
        changeMonth : true,
        changeYear : true,
        yearRange: '1900:2000',
        maxDate: '-1d, -18y ',
    });
});
