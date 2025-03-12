<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Rechtbank Gegevens</h2>

    <form action="#" method="post">
        <div id="rechtbank-container">
            <div class="rechtbank-entry border p-4 rounded-lg mb-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Rechtbank</label>
                        <input type="text" name="rechtbank[]" class="w-full p-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">MB/CB Nummer</label>
                        <input type="text" name="mb_cb_nummer[]" class="w-full p-2 border rounded-lg">
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Datum van Instelling</label>
                    <input type="date" name="datum_van_instelling[]" class="w-full p-2 border rounded-lg">
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

