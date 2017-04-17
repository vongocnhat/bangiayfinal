//hide menu
$( document ).ready(function(){
    window.dispatchEvent(new Event('resize'));
    $( ".anmenu" ).click(function() {
        $( ".sidebar" ).toggle( "slow", function() {
            if ($('.sidebar').is(':visible'))
            {
                $('.anmenu').text('Ẩn Menu');
                $('#page-wrapper').css({ 'margin': '0 0 0 250px' });
            }
            else
            {
                $('.anmenu').text('Hiện Menu');
                $('#page-wrapper').css({ 'margin': '0' });
            }
            window.dispatchEvent(new Event('resize'));
        });
    });
});
$( window ).resize(function(){
    if(window.matchMedia('(min-width: 768px)').matches)
    {
        $('.anmenu').show();
        $('#page-wrapper').css({ 'margin': '0 0 0 250px' });
        if($('.anmenu').text() == 'Hiện Menu')
        {
            $( ".sidebar" ).hide();
            $('#page-wrapper').css({ 'margin': '0' });
        }
    }
    else
    {
        $('.anmenu').hide();
        $( ".sidebar" ).show();
        $('#page-wrapper').css({ 'margin': '0' });
    }
});
