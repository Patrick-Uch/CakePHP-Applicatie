<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Notities</h2>

    <form action="#" method="post">
        <div id="notitie-container">
            <div class="notitie-entry border p-4 rounded-lg mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Titel</label>
                    <input type="text" name="notitie_titel[]" class="w-full p-2 border rounded-lg">
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Beschrijving</label>
                    <textarea name="notitie_beschrijving[]" class="w-full p-2 border rounded-lg h-32"></textarea>
                </div>
            </div>
        </div>

        <button type="button" id="add-notitie" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
            Nog een toevoegen
        </button>

        <div class="mt-6">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Opslaan
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('add-notitie').addEventListener('click', function () {
        let container = document.getElementById('notitie-container');
        let newEntry = document.querySelector('.notitie-entry').cloneNode(true);
        newEntry.querySelectorAll('input, textarea').forEach(input => input.value = '');

        container.appendChild(newEntry);
    });
</script>
