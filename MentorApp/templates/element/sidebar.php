<aside id="sidebar" class="fixed inset-y-0 left-0 bg-white w-64 border-r border-gray-200 shadow-lg mt-20">
    <div id="sidebar-content" class="h-full px-4 py-6 overflow-y-auto">
        <?php
        // Haalt de huidige controller op om de juiste zijbalkinhoud te tonen
        $controller = $this->request->getParam('controller');

        // Definieert welke zijbalkinhoud bij welke controller hoort
        $sidebarMap = [
            'Dashboard' => 'sidebar_content/Dashboard',
            'Dossiers' => 'sidebar_content/Dossiers',
            'Adressen' => 'sidebar_content/Adressen',
            'Rapporten' => 'sidebar_content/Rapporten',
            'Documenten' => 'sidebar_content/Documenten',
        ];
        
        // Controleert of er een specifieke zijbalkinhoud bestaat voor de huidige controller
        if (array_key_exists($controller, $sidebarMap)) {
            echo $this->element($sidebarMap[$controller]);
        }
        ?>
    </div>
</aside>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Selecteert de zijbalk en de zijbalkinhoud
    const sidebar = document.getElementById("sidebar");
    const sidebarContent = document.getElementById("sidebar-content");

    // Controleert of de zijbalk leeg is en verbergt deze indien nodig
    if (!sidebarContent || sidebarContent.innerHTML.trim() === "") {
        sidebar.style.display = "none"; // Verberg de zijbalk
        document.querySelector(".ml-64").classList.remove("ml-64"); // Zorg ervoor dat de hoofdinhoud breder wordt
    }
});
</script>
