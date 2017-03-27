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