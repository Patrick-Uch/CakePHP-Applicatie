<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Medical Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#1B9AF5" data-border-radius="medium"></script>
</head>
<body class="bg-gray-50 h-screen flex flex-col">
    <nav class="bg-white border-b border-gray-200 fixed w-full z-30 top-0">
        <div class="max-w-8xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center"></div>
                    <div class="hidden md:ml-6 md:flex md:space-x-8">
                        <a href="#" class="border-custom text-custom inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Dashboard</a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Dossiers</a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Adressen</a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Rapporten</a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Documenten</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button type="button" class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none">
                        <span class="sr-only">View notifications</span>
                        <i class="fas fa-bell text-xl"></i>
                    </button>
                    <div class="relative">
                        <button type="button" class="bg-white rounded-full w-10 h-10 flex items-center justify-center border border-gray-300 shadow-sm focus:outline-none">
                            <i class="fa-solid fa-user"></i>
                        </button>
                    </div>
                    <button type="button" class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none">
                        <span class="sr-only">Settings</span>
                        <i class="fas fa-cog text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div class="flex overflow-hidden pt-16">
        <aside class="fixed inset-y-0 left-0 bg-white w-64 mt-16 border-r border-gray-200 shadow-lg">
            <div class="h-full px-4 py-6 overflow-y-auto">
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="flex items-center p-3 text-gray-700 rounded-lg transition duration-200 hover:bg-gray-100 hover:text-blue-600">
                            <i class="fas fa-chart-line w-6 h-6 text-gray-500 mr-3"></i>
                            <span>Overview</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-gray-700 rounded-lg transition duration-200 hover:bg-gray-100 hover:text-blue-600">
                            <i class="fas fa-calendar w-6 h-6 text-gray-500 mr-3"></i>
                            <span>Appointments</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-gray-700 rounded-lg transition duration-200 hover:bg-gray-100 hover:text-blue-600">
                            <i class="fas fa-users w-6 h-6 text-gray-500 mr-3"></i>
                            <span>Patients</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-gray-700 rounded-lg transition duration-200 hover:bg-gray-100 hover:text-blue-600">
                            <i class="fas fa-clipboard-list w-6 h-6 text-gray-500 mr-3"></i>
                            <span>Reports</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="relative md:ml-64 flex-1">
            <main class="h-full py-6 px-4 sm:px-6 lg:px-8">
            </main>
        </div>
    </div>
    <footer class="bg-white shadow fixed bottom-0 w-full">
        <div class="max-w-8xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-500">© 2025 Mentor App. All rights reserved.</div>
                <div class="text-sm text-gray-500">Version 0.0.2</div>
            </div>
        </div>
    </footer>
</body>
</html>
