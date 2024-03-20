document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.bi-star');
    const ratingInput = document.querySelector('#rating');

    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            stars.forEach((s, i) => {
                if (i <= index) {
                    s.classList.add('active');
                } else {
                    s.classList.remove('active');
                }
            });

            ratingInput.value = index + 1; // Guardar el valor de la calificación
        });
    });
});
