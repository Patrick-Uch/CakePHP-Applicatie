<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Documenten</h2>
    <div class="p-4 border border-gray-300 rounded-lg mb-6">
        <label class="block text-sm font-medium text-gray-700">Upload Document</label>
        <div class="flex items-center gap-4 mt-2">
            <input type="file" id="fileUpload" class="p-2 border rounded-lg w-full">
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Upload</button>
        </div>
    </div>
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-3">Geüploade Documenten</h3>
        <div id="document-list">
            <div class="document-entry flex justify-between items-center p-4 border-b">
                <div>
                    <p class="text-gray-900 font-medium">Test12345.pdf</p>
                    <p class="text-gray-500 text-sm">Geüpload op: 04-03-2025</p>
                </div>
                <div class="flex gap-3">
                    <a href="#" class="text-blue-600 hover:underline">Download</a>
                    <button class="text-red-600 hover:underline delete-btn">Verwijderen</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector("#fileUpload").addEventListener("change", function () {
        let file = this.files[0];
        if (file) {
            let list = document.querySelector("#document-list");
            let entry = document.createElement("div");
            entry.classList.add("document-entry", "flex", "justify-between", "items-center", "p-4", "border-b");
            entry.innerHTML = `
                <div>
                    <p class="text-gray-900 font-medium">${file.name}</p>
                    <p class="text-gray-500 text-sm">Geüpload op: ${new Date().toLocaleDateString()}</p>
                </div>
                <div class="flex gap-3">
                    <a href="#" class="text-blue-600 hover:underline">Download</a>
                    <button class="text-red-600 hover:underline delete-btn">Verwijderen</button>
                </div>
            `;
            list.appendChild(entry);

            entry.querySelector(".delete-btn").addEventListener("click", function () {
                entry.remove();
            });
        }
    });
</script>
