$(document).on('click','.switchShowBtn',function(event) {
//    $(this).parent().children('ul').toogleClass('switchShow');
//$(this).parent().children('ul').toggleClass('switchShow');

Swal.fire({
    title: '<strong><u>Conceptos</u></strong>',
    icon: 'info',
    html:
      '<ul style="list-style:none"><li>Concepto numero 1</li> <li>Concepto numero 2</li><ul>',
    showCloseButton: true,
})

    console.log('switchShowBtn')
});