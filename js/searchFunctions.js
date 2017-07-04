/**
 * Created by user on 7/4/2017.
 */
function getText(id) {
    var ele = document.getElementById(id).value;
    //alert("Function called "+ele);
    return ele;
}

function getCriterialist() {
    var inp = [];
    inp[0] = getText('letterno');
    inp[1] = getText('date');
    inp[2] = getText('section');
    inp[3] = getText('subject');
    inp[4] = getText('sender');
    alert(inp);
    // alert("Function called ");

    return inp;

}