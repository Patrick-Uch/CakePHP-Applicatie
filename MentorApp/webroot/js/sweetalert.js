document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.sweet-delete').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();

            const deleteUrl = button.dataset.url;

            Swal.fire({
                title: 'Weet je zeker dat je dit dossier wilt verwijderen?',
                text: 'Deze actie kan niet ongedaan worden gemaakt.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ja, verwijderen',
                cancelButtonText: 'Annuleren'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Maak een verborgen formulier aan voor POST-request
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = deleteUrl;

                    // Voeg CSRF-token toe aan formulier
                    const csrfToken = document.querySelector('meta[name="csrfToken"]').getAttribute('content');
                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_csrfToken';
                    csrfInput.value = csrfToken;

                    form.appendChild(csrfInput);
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    });
});
