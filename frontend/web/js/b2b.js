//b2b logic for hidden imputs
$("#Dr, #Mr, #Mrs, #Ms").change(function () {
    var titleOptionsArr = document.querySelectorAll('#physics_title > option');
    for(var i = 0; i < titleOptionsArr.length; i++){
        titleOptionsArr[i].removeAttribute('selected');
    };

    var valId = this.id;
    $("#physics_title option[value=" + valId + "]").attr('selected', 'true');
});

$("#hear1, #hear2, #hear3, #hear4").change(function () {
    var leadOptionsArr = document.querySelectorAll('#physics_lead > option');
    for(var i = 0; i < leadOptionsArr.length; i++){
        leadOptionsArr[i].removeAttribute('selected');
    };

    var valValue = this.value;
    $("#physics_lead option[value='" + valValue + "']").attr('selected', 'true');
    if(this.id == 'hear4'){
        $('input#other').removeAttr('disabled');
    } else{
        $('input#other').attr('disabled','disabled');
    }

});

 var form = document.querySelector('.form_accelerate');
    form.noValidate = true;
    form.addEventListener('submit', function(event) {
        if (!event.target.checkValidity()) {
            event.preventDefault();
            for(var i = 0; i < event.srcElement.length;i++){
                if(event.srcElement[i].value == '' && event.srcElement[i].required == true){
                    var alert = document.createElement('span');
                    alert.innerHTML = 'Please fill out this field';
                    alert.setAttribute('style','color:red;');
                    alert.setAttribute('class','temp-alert');
                    
                    if (event.srcElement[i].parentElement.getAttribute('class') == 'select'){
                        console.log(event.srcElement[i].parentElement.parentElement.appendChild(alert));
                    } else{
                        console.log(event.srcElement[i].parentElement.appendChild(alert));
                    }
                    
                    setTimeout(function() { 
                        var tempAlert = document.querySelectorAll('.temp-alert');
                        for(var i = 0; i < tempAlert.length; i++){
                             tempAlert[i].remove();
                        }
                    }, 9000);
                }
            }
        }
    }, false);