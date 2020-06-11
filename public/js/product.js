var plus = document.getElementById("plus");
var minus = document.getElementById("minus");
var quanity = document.getElementById("quanity");

function plusone() {
    var value = quanity.value;
    quanity.value = ++value;
};