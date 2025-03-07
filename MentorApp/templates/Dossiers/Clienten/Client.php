<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Bewerk Dossier</h2>

    <form action="#" method="post">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Bedrijf</label>
                <select class="w-full p-2 border rounded-lg">
                    <option value="">Selecteer een bedrijf</option>
                    <option value="1">Bedrijf 1</option>
                    <option value="2">Bedrijf 2</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <select class="w-full p-2 border rounded-lg">
                    <option value="Opstarten">Opstarten</option>
                    <option value="Actief">Actief</option>
                    <option value="In beëindiging">In beëindiging</option>
                    <option value="Afgesloten">Afgesloten</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Naam</label>
                <input type="text" class="w-full p-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">BSN</label>
                <input type="text" class="w-full p-2 border rounded-lg">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">E-mail 1</label>
                <input type="email" class="w-full p-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">E-mail 2</label>
                <input type="email" class="w-full p-2 border rounded-lg">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Telefoonnummer 1</label>
                <input type="tel" class="w-full p-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Telefoonnummer 2</label>
                <input type="tel" class="w-full p-2 border rounded-lg">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">IBAN</label>
                <input type="text" class="w-full p-2 border rounded-lg">
            </div>
        </div>
        <h3 class="text-lg font-semibold text-gray-900 mt-6">Adresgegevens</h3>
        <div class="mt-4">
            <h4 class="text-md font-semibold text-gray-800">Postadres</h4>
            <div class="grid grid-cols-2 gap-4 mt-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Straat</label>
                    <input type="text" class="w-full p-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Huisnummer</label>
                    <input type="text" class="w-full p-2 border rounded-lg">
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Postcode</label>
                    <input type="text" class="w-full p-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Gemeente</label>
                    <input type="text" class="w-full p-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Provincie</label>
                    <input type="text" class="w-full p-2 border rounded-lg">
                </div>
            </div>
        </div>
        <div class="mt-6">
            <h4 class="text-md font-semibold text-gray-800">Bezoekadres</h4>
            <div class="grid grid-cols-2 gap-4 mt-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Straat</label>
                    <input type="text" class="w-full p-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Huisnummer</label>
                    <input type="text" class="w-full p-2 border rounded-lg">
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Postcode</label>
                    <input type="text" class="w-full p-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Gemeente</label>
                    <input type="text" class="w-full p-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Provincie</label>
                    <input type="text" class="w-full p-2 border rounded-lg">
                </div>
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Opslaan
            </button>
        </div>
    </form>
</div>
