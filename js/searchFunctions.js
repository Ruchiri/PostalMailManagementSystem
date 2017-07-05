/**
 * Created by user on 7/4/2017.
 */

function getText(id) {
    var ele = document.getElementById(id).value;
    //alert("Function called "+ele);
    return ele;
}

function getCriterialist() {
    // alert("Function called ");
    var crt = [];
    var inp = [];
    var i = 0;

    if (getText('reg_no') != '') {
        crt[i] = 'reg_no';
        inp[i] = getText('reg_no');
        i++;
    }
    if (getText('date') != '') {
        crt[i] = 'date';
        inp[i] = getText('date');
        i++;
    }
    if (getText('section') != '') {
        crt[i] = 'section';
        inp[i] = getText('section');
        i++;
    }
    if (getText('subject') != '') {
        crt[i] = 'subject';
        inp[3] = getText('subject');
        i++;
    }
    if (getText('sender') != '') {
        crt[i] = 'sender';
        inp[4] = getText('sender');
        i++;
    }
    //when user does not give any searching criteria
    if (crt.length == 0) {
        alert("Give valied searching criteria");
    }

    document.getElementById('hidden1').value = crt.toString();
    document.getElementById('hidden2').value = inp.toString();

}

