<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>MentorApp</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <?= $this->Html->css('app') ?>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 h-screen flex flex-col">

<!-- Navigatiebalk -->
<nav class="bg-white border-b border-gray-200 fixed w-full z-30 top-0">
    <div class="max-w-8xl mx-auto px-6">
        <div class="flex justify-between items-center h-20">
            <div class="flex space-x-8">
                <!-- Dashboard -->
                <a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index']) ?>" 
                   class="navbar-link <?= ($this->request->getParam('controller') === 'Dashboard') ? 'text-blue-600' : 'text-gray-500 hover:text-blue-600' ?>">
                    <img src="<?= $this->Url->image('icons/dashboard.png') ?>" class="w-12 h-12" alt="Dashboard">
                    <span>Dashboard</span>
                </a>

                <!-- Dossiers -->
                <a href="<?= $this->Url->build(['controller' => 'Dossiers', 'action' => 'index']) ?>" 
                   class="navbar-link <?= ($this->request->getParam('controller') === 'Dossiers') ? 'text-blue-600' : 'text-gray-500 hover:text-blue-600' ?>">
                    <img src="<?= $this->Url->image('icons/dossier.png') ?>" class="w-12 h-12" alt="Dossiers">
                    <span>Dossiers</span>
                </a>

                <!-- Adressen -->
                <a href="<?= $this->Url->build(['controller' => 'Adressen', 'action' => 'index']) ?>" 
                   class="navbar-link <?= ($this->request->getParam('controller') === 'Adressen') ? 'text-blue-600' : 'text-gray-500 hover:text-blue-600' ?>">
                    <img src="<?= $this->Url->image('icons/adres.png') ?>" class="w-12 h-12" alt="Adressen">
                    <span>Adressen</span>
                </a>

                <!-- Rapporten -->
                <a href="<?= $this->Url->build(['controller' => 'Rapporten', 'action' => 'index']) ?>" 
                   class="navbar-link <?= ($this->request->getParam('controller') === 'Rapporten') ? 'text-blue-600' : 'text-gray-500 hover:text-blue-600' ?>">
                    <img src="<?= $this->Url->image('icons/report.png') ?>" class="w-12 h-12" alt="Rapporten">
                    <span>Rapporten</span>
                </a>

                <!-- Documenten -->
                <a href="<?= $this->Url->build(['controller' => 'Documenten', 'action' => 'index']) ?>" 
                   class="navbar-link <?= ($this->request->getParam('controller') === 'Documenten') ? 'text-blue-600' : 'text-gray-500 hover:text-blue-600' ?>">
                    <img src="<?= $this->Url->image('icons/document.png') ?>" class="w-12 h-12" alt="Documenten">
                    <span>Documenten</span>
                </a>
            </div>

            <!-- Profiel dropdownmenu -->
            <div class="relative">
                <button id="profileDropdownBtn" type="button" class="bg-white rounded-full w-12 h-12 flex items-center justify-center border border-gray-300 shadow-sm focus:outline-none">
                    <i class="fa-solid fa-user text-xl"></i>
                </button>
                <div id="profileDropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-md rounded-lg hidden">
                    <a href="<?= $this->Url->build(['controller' => 'Profile', 'action' => 'profile']) ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profiel</a>
                    <a href="<?= $this->Url->build(['controller' => 'Profile', 'action' => 'settings']) ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Instellingen</a>
                    <a href="<?= $this->Url->build(['controller' => 'Profile', 'action' => 'Logboek']) ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logboek</a>
                    <a href="<?= $this->Url->build(['controller' => 'Gebruikers', 'action' => 'logout']) ?>" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Uitloggen</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Zijbalk -->
<aside class="fixed left-0 top-20 bg-white w-64 border-r border-gray-200 shadow-lg h-[calc(100vh-80px)]">
    <div class="h-full px-4 py-6 overflow-y-auto">
        <?= $this->element('sidebar') ?>
    </div>
</aside>

<!-- Hoofdinhoud -->
<div class="relative ml-64 flex-1 mt-20">
    <main class="h-full py-6 px-4 sm:px-6 lg:px-8">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Profiel dropdownmenu
    const profileBtn = document.getElementById("profileDropdownBtn");
    const dropdownMenu = document.getElementById("profileDropdownMenu");

    profileBtn.addEventListener("click", function () {
        dropdownMenu.classList.toggle("hidden");
    });

    document.addEventListener("click", function (event) {
        if (!profileBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add("hidden");
        }
    });

    // Verberg de zijbalk als deze leeg is
    const sidebar = document.querySelector("aside");
    const sidebarContent = document.getElementById("sidebar-content");

    if (!sidebarContent || sidebarContent.innerHTML.trim() === "") {
        sidebar.style.display = "none"; 
        document.querySelector(".ml-64").classList.remove("ml-64"); 
    }
});
</script>

</body>
</html>
