$.fn.editable.defaults.mode = 'inline';
$.fn.editable.defaults.ajaxOptions = {type:'PUT'};
$(document).ready(function() {
$('.editable').editable({

        source:[
        {value:"1", text: "ASIGNADO"},
        {value:"2", text: "DISPONIBLE"},
    ]
});
});