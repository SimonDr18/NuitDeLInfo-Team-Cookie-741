var k = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65],
n = 0;
$(document).keydown(function (e) {
    if (e.keyCode === k[n++]) {
        if (n === k.length) {
            var p = document.getElementById('bravo')
            document.location.href = "includes/enigme1.html"
            n = 0;
            return false;
        }
    }
    else {
        n = 0;
    }
});
