/**
 * Created by Supimi on 7/4/2017.
 */

function getText(id) {
    var ele = document.getElementById(id).value;
    return ele;
}

function getCriterialist() {
    // alert("Function called ");
    var crt = [];
    var i = 0;

    if (getText('reg_no') != '') {
        crt[i] = 'reg_no';
        i++;
    }

    if (getText('date') != '') {
        crt[i] = 'date';
        i++;
    }

    if (getText('section') != '') {
        crt[i] = 'section';
        i++;
    }


    if (getText('subject') != '') {
        crt[i] = 'subject';
        i++;
    }
    if (getText('sender') != '') {
        crt[i] = 'sender';
        i++;
    }
    //when user does not give any searching criteria
    if (crt.length == 0) {
        alert("Give valied searching criteria");
        document.getElementById('hidden2').value = "NO";
    }
    else {
        //value of hidden2 input is not setted
        document.getElementById('hidden2').value = "YES";

    }

    document.getElementById('hidden1').value = crt.toString();


}


function user_criteriaList() {
    var crt = [];
    var i = 0;

    if (getText('reg_no') != '') {
        crt[i] = 'reg_no';
        i++;
    }

    if (getText('date') != '') {
        crt[i] = 'date';
        i++;
    }

    if (getText('subject') != '') {
        crt[i] = 'subject';
        i++;
    }
    if (getText('sender') != '') {
        crt[i] = 'sender';
        i++;
    }
    //when user does not give any searching criteria
    if (crt.length == 0) {
        alert("Give valied searching criteria");
        document.getElementById('hidden2').value = "NO";
    }
    else {
        //value of hidden2 input is not setted
        document.getElementById('hidden2').value = "YES";

    }

    document.getElementById('hidden1').value = crt.toString();

}

function validate_date(date) {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //because,January is 0
    var yyyy = today.getFullYear();

    if (month < 10) {
        mm = '0' + month.toString();
    }
    if (day < 10) {
        dd = '0' + day.toString();
    }

    var maxDate = yyyy + '-' + mm + '-' + dd;
    alert(maxDate);
    document.getElementsByName("date").max = maxDate;

}

