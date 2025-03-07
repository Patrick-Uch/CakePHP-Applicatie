<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Betrokkenen</h2>

    <form action="#" method="post">
        <div id="betrokkenen-container">
            <div class="betrokkenen-entry border p-4 rounded-lg mb-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Relatie</label>
                        <input type="text" name="betrokkenen_relatie[]" class="w-full p-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Voor- en Achternaam</label>
                        <input type="text" name="betrokkenen_voor_achternaam[]" class="w-full p-2 border rounded-lg">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Telefoonnummer</label>
                        <input type="tel" name="betrokkenen_telefoonnummer[]" class="w-full p-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">E-mail</label>
                        <input type="email" name="betrokkenen_email[]" class="w-full p-2 border rounded-lg">
                    </div>
                </div>

                <h3 class="text-lg font-semibold text-gray-900 mt-6">Adresgegevens</h3>

                <div class="grid grid-cols-2 gap-4 mt-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Straat</label>
                        <input type="text" name="betrokkenen_straat[]" class="w-full p-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Huisnummer</label>
                        <input type="text" name="betrokkenen_huisnummer[]" class="w-full p-2 border rounded-lg">
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Toevoeging</label>
                        <input type="text" name="betrokkenen_toevoeging[]" class="w-full p-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Postcode</label>
                        <input type="text" name="betrokkenen_postcode[]" class="w-full p-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Gemeente</label>
                        <input type="text" name="betrokkenen_gemeente[]" class="w-full p-2 border rounded-lg">
                    </div>
                </div>
            </div>
        </div>

        <button type="button" id="add-betrokkenen" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
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
    document.getElementById('add-betrokkenen').addEventListener('click', function () {
        let container = document.getElementById('betrokkenen-container');
        let newEntry = document.querySelector('.betrokkenen-entry').cloneNode(true);
        newEntry.querySelectorAll('input').forEach(input => input.value = '');
        
        container.appendChild(newEntry);
    });
</script>
