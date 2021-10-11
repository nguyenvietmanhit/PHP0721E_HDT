var element1 = document.querySelector('#id1');
var element2 = document.querySelector('#id2');
var element3 = document.querySelector('.class1');
var element4 = document.querySelector('.class2');

[ element1, element2, element3, element4 ].forEach(function(element) {
    element.addEventListener("onmouseover", function() {
        // Code
    });
});