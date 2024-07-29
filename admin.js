document.getElementById('create-course-form').addEventListener('submit', function(event) {
    event.preventDefault();

    var courseName = document.getElementById('course-name').value;
    var courseCapacity = document.getElementById('course-capacity').value;

    fetch('crear_curso.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'course-name=' + courseName + '&course-capacity=' + courseCapacity
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        // Recargar la página o actualizar la lista de cursos
        location.reload();
    })
    .catch(error => console.error('Error:', error));
});

document.getElementById('enroll-waitlist-form').addEventListener('submit', function(event) {
    event.preventDefault();

    var cursoId = document.getElementById('curso-id').value;

    fetch('matricular_lista_espera.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'curso-id=' + cursoId
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        // Recargar la página o actualizar la lista de espera
        location.reload();
    })
    .catch(error => console.error('Error:', error));
});
