<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>MentorApp</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
</head>
<body class="bg-gray-50 h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 fixed w-full z-30 top-0">
        <div class="max-w-8xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center"></div>
                    <div class="hidden md:ml-6 md:flex md:space-x-8">
                        <a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index']) ?>"
                           class="<?= ($this->request->getParam('controller') === 'Dashboard') ? 'border-custom text-custom' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                           Dashboard
                        </a>
                        <a href="<?= $this->Url->build(['controller' => 'Dossiers', 'action' => 'index']) ?>"
                           class="<?= ($this->request->getParam('controller') === 'Dossiers') ? 'border-custom text-custom' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                           Dossiers
                        </a>
                        <a href="<?= $this->Url->build(['controller' => 'Adressen', 'action' => 'index']) ?>"
                           class="<?= ($this->request->getParam('controller') === 'Adressen') ? 'border-custom text-custom' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                           Adressen
                        </a>
                        <a href="<?= $this->Url->build(['controller' => 'Rapporten', 'action' => 'index']) ?>"
                           class="<?= ($this->request->getParam('controller') === 'Rapporten') ? 'border-custom text-custom' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                           Rapporten
                        </a>
                        <a href="<?= $this->Url->build(['controller' => 'Documenten', 'action' => 'index']) ?>"
                           class="<?= ($this->request->getParam('controller') === 'Documenten') ? 'border-custom text-custom' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                           Documenten
                        </a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <button id="profileDropdownBtn" type="button" class="bg-white rounded-full w-10 h-10 flex items-center justify-center border border-gray-300 shadow-sm focus:outline-none">
                            <i class="fa-solid fa-user"></i>
                        </button>
                        <div id="profileDropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-md rounded-lg hidden">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                            <a href="<?= $this->Url->build(['controller' => 'Gebruikers', 'action' => 'logout']) ?>"  class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 bg-white w-64 mt-16 border-r border-gray-200 shadow-lg">
        <div class="h-full px-4 py-6 overflow-y-auto">
            <ul class="space-y-2">
                <?php
                $currentController = $this->request->getParam('controller');
                switch ($currentController) {
                    case 'Dashboard': ?>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'Forms', 'action' => 'create']) ?>"
                               class="flex items-center p-3 text-gray-700 rounded-lg transition duration-200 hover:bg-gray-100 hover:text-blue-600">
                                <i class="fas fa-plus-circle w-6 h-6 text-gray-500 mr-3"></i>
                                <span>Create Form</span>
                            </a>
                        </li>
                    <?php break;
                    case 'Dossiers': ?>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'Dossiers', 'action' => 'create']) ?>"
                               class="flex items-center p-3 text-gray-700 rounded-lg transition duration-200 hover:bg-gray-100 hover:text-blue-600">
                                <i class="fas fa-folder-plus w-6 h-6 text-gray-500 mr-3"></i>
                                <span>Create Dossier</span>
                            </a>
                        </li>
                    <?php break;
                    default: ?>
                        <li>
                            <span class="text-gray-500">No actions available</span>
                        </li>
                <?php } ?>
            </ul>
        </div>
    </aside>

    <!-- Page Content -->
    <div class="relative md:ml-64 flex-1">
    <main class="h-full py-6 px-4 sm:px-6 lg:px-8 pt-20">
            <?= $this->fetch('content') ?>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-white shadow fixed bottom-0 w-full">
        <div class="max-w-8xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-500">© 2025 Mentor App. All rights reserved.</div>
                <div class="text-sm text-gray-500">Version 0.0.2</div>
            </div>
        </div>
    </footer>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
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
    });
    </script>
</body>
</html>
