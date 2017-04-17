$(document).ready(function() {
    $('select').select2();
    $('select').css({"display": "block", 'position': 'absolute', 'top': '47px', 'z-index': '-1'}); 
    
    $('table').DataTable({
        responsive: true, 
        fixedHeader: true
    });
         
});