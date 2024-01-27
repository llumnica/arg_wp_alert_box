document.addEventListener('DOMContentLoaded', function () {
    var closeBtns = document.querySelectorAll('.close-btn');

    closeBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            this.parentElement.style.display = 'none';
        });
    });
});
