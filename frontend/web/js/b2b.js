function myValidateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

//b2b logic for hidden imputs
$("#Dr, #Mr, #Mrs, #Ms").change(function () {
    var titleOptionsArr = document.querySelectorAll('#physics_title > option');
    for (var i = 0; i < titleOptionsArr.length; i++) {
        titleOptionsArr[i].removeAttribute('selected');
    }

    var valId = this.id;
    $("#physics_title option[value=" + valId + "]").attr('selected', 'true');
});

$("#hear1, #hear2, #hear3, #hear4").change(function () {
    var leadOptionsArr = document.querySelectorAll('#physics_lead > option');
    for (var i = 0; i < leadOptionsArr.length; i++) {
        leadOptionsArr[i].removeAttribute('selected');
    }


    var valValue = this.value;
    $("#physics_lead option[value='" + valValue + "']").attr('selected', 'true');
    if (this.id == 'hear4') {
        $('input#other').removeAttr('disabled');
    } else {
        $('input#other').attr('disabled', 'disabled');
    }

});

$('.form_accelerate').attr('novalidate', true);

$('.form_accelerate').submit(function () {
    var email = $('input[name="EMAIL"]').val();
    if(!myValidateEmail(email)){
        $('input[name="EMAIL"]').addClass('error');
    }else{
        $('input[name="EMAIL"]').removeClass('error');
    }

    if (!event.target.checkValidity()) {
        event.preventDefault();
        var tempAlert = document.querySelectorAll('.temp-alert');
        var i;
        for ( i = 0; i < tempAlert.length; i++) {
            tempAlert[i].remove();
        }
        for ( i = 0; i < event.srcElement.length; i++) {
            var srcElem = event.srcElement[i];
            if (srcElem.value === '' && srcElem.required === true) {
                var alert = document.createElement('span');
                alert.innerHTML = 'Please fill out this field';
                alert.setAttribute('style', 'color:red;');
                alert.setAttribute('class', 'temp-alert');

                if (srcElem.parentElement.getAttribute('class') === 'select') {
                    srcElem.parentElement.parentElement.appendChild(alert);
                } else {
                    srcElem.parentElement.appendChild(alert);
                }

            }
        }
    }

});

// var form = document.querySelector('.form_accelerate');
// if (form != null) {
//     form.noValidate = true;
//     form.addEventListener('submit', function (event) {
//         if (!event.target.checkValidity()) {
//             event.preventDefault();
//             var tempAlert = document.querySelectorAll('.temp-alert');
//             for (var i = 0; i < tempAlert.length; i++) {
//                 tempAlert[i].remove();
//             }
//             for (var i = 0; i < event.srcElement.length; i++) {
//                 if (event.srcElement[i].value == '' && event.srcElement[i].required == true) {
//                     var alert = document.createElement('span');
//                     alert.innerHTML = 'Please fill out this field';
//                     alert.setAttribute('style', 'color:red;');
//                     alert.setAttribute('class', 'temp-alert');
//
//                     if (event.srcElement[i].parentElement.getAttribute('class') == 'select') {
//                         console.log(event.srcElement[i].parentElement.parentElement.appendChild(alert));
//                     } else {
//                         console.log(event.srcElement[i].parentElement.appendChild(alert));
//                     }
//
//                 }
//             }
//         }
//     }, false);
// }


window.onload = function () {
    $('input[name=COMPLETE_URL]').val(location.origin + '/b2b-thanks');
};
    
