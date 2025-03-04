<aside class="fixed inset-y-0 left-0 bg-white w-64 border-r border-gray-200 shadow-lg mt-20">
    <div class="h-full px-4 py-6 overflow-y-auto">
        <?php
        $controller = $this->request->getParam('controller');
        $sidebarMap = [
            'Dashboard' => 'sidebar_content/Dashboard',
            'Dossiers' => 'sidebar_content/Dossiers',
            'Adressen' => 'sidebar_content/Adressen',
            'Rapporten' => 'sidebar_content/Rapporten',
            'Documenten' => 'sidebar_content/Documenten',
        ];
        if (array_key_exists($controller, $sidebarMap)) {
            echo $this->element($sidebarMap[$controller]);
        } else {
            echo '<p class="text-gray-500">No sidebar available for this section.</p>';
        }
        ?>
    </div>
</aside>
