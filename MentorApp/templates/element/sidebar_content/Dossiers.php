<ul class="space-y-1">
    <li>
        <a href="<?= $this->Url->build('/dossiers') ?>"
           class="block p-3 rounded-lg <?= ($this->request->getParam('action') === 'view' && empty($this->request->getParam('pass'))) ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600' ?>">
            Dossier Dashboard
        </a>
    </li>

    <!-- Clienten Dropdown -->
    <?php
    $clientPages = ['Betrokkenen', 'Documenten', 'Formulieren', 'Rechtbank', 'Vermogen', 'Verslagen'];
    $isClientDropdownOpen = in_array($this->request->getParam('pass.1'), $clientPages);
    $isClientActive = ($this->request->getParam('pass.1') === 'Client');
    ?>
    <li class="relative">
        <a href="<?= $this->Url->build("/dossiers/Clienten/Client") ?>"
           class="block p-3 rounded-lg flex justify-between items-center <?= $isClientActive ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600' ?>">
            Client
            <button class="dropdown-toggle text-gray-600 hover:text-blue-600 focus:outline-none ml-2" data-dropdown="Clienten">
                <span class="arrow"><?= $isClientDropdownOpen ? '&#9662;' : '&#9656;' ?></span>
            </button>
        </a>
    </li>
    <ul class="dropdown-menu <?= $isClientDropdownOpen ? '' : 'hidden' ?> pl-6 space-y-1" data-dropdown-menu="Clienten">
        <?php foreach ($clientPages as $page) {
            $isActive = ($this->request->getParam('pass.1') === $page);
        ?>
            <li>
                <a href="<?= $this->Url->build("/dossiers/Clienten/$page") ?>" 
                   class="block p-3 rounded-lg w-full <?= $isActive ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600' ?>">
                    <?= $page ?>
                </a>
            </li>
        <?php } ?>
    </ul>

    <!-- Other Pages -->
    <?php
    $pages = ['Notities', 'Acties', 'Mentorschap', 'Adressen'];
    foreach ($pages as $page) {
        $isActive = ($this->request->getParam('pass.0') === $page);
        echo "<li><a href=\"" . $this->Url->build("/dossiers/$page") . "\" 
                  class=\"block p-3 rounded-lg w-full " . ($isActive ? "bg-blue-100 text-blue-600" : "text-gray-700 hover:bg-gray-100 hover:text-blue-600") . "\">
                  $page
              </a></li>";
    }
    ?>

    <!-- Rekeningen Dropdown -->
    <?php
    $rekeningPages = ['Inkomsten', 'Uitgaven'];
    $isRekeningDropdownOpen = in_array($this->request->getParam('pass.1'), $rekeningPages);
    ?>
    <li class="relative">
        <a href="<?= $this->Url->build('/dossiers/Rekeningen/Inkomsten') ?>"
           class="block p-3 rounded-lg flex justify-between items-center">
            Rekeningen
            <button class="dropdown-toggle text-gray-600 hover:text-blue-600 focus:outline-none ml-2" data-dropdown="Rekeningen">
                <span class="arrow"><?= $isRekeningDropdownOpen ? '&#9662;' : '&#9656;' ?></span>
            </button>
        </a>
    </li>
    <ul class="dropdown-menu <?= $isRekeningDropdownOpen ? '' : 'hidden' ?> pl-6 space-y-1" data-dropdown-menu="Rekeningen">
        <?php foreach ($rekeningPages as $page) {
            $isActive = ($this->request->getParam('pass.1') === $page);
        ?>
            <li>
                <a href="<?= $this->Url->build("/dossiers/Rekeningen/$page") ?>" 
                   class="block p-3 rounded-lg w-full <?= $isActive ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600' ?>">
                    <?= $page ?>
                </a>
            </li>
        <?php } ?>
    </ul>

    <!-- Schulden Dropdown -->
    <?php
    $schuldenPages = ['Schulden'];
    $isSchuldenDropdownOpen = in_array($this->request->getParam('pass.1'), $schuldenPages);
    ?>
    <li class="relative">
        <a href="<?= $this->Url->build('/dossiers/Schulden/Schulden') ?>"
           class="block p-3 rounded-lg flex justify-between items-center">
            Schulden
            <button class="dropdown-toggle text-gray-600 hover:text-blue-600 focus:outline-none ml-2" data-dropdown="Schulden">
                <span class="arrow"><?= $isSchuldenDropdownOpen ? '&#9662;' : '&#9656;' ?></span>
            </button>
        </a>
    </li>
    <ul class="dropdown-menu <?= $isSchuldenDropdownOpen ? '' : 'hidden' ?> pl-6 space-y-1" data-dropdown-menu="Schulden">
        <?php foreach ($schuldenPages as $page) {
            $isActive = ($this->request->getParam('pass.1') === $page);
        ?>
            <li>
                <a href="<?= $this->Url->build("/dossiers/Schulden/$page") ?>" 
                   class="block p-3 rounded-lg w-full <?= $isActive ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600' ?>">
                    <?= $page ?>
                </a>
            </li>
        <?php } ?>
    </ul>

    <li>
        <a href="<?= $this->Url->build('/dossiers/close') ?>"
           class="block p-3 rounded-lg w-full text-red-600 hover:bg-red-100 hover:text-red-800">
            Dossier Afsluiten
        </a>
    </li>
</ul>

<script>
document.querySelectorAll('.dropdown-toggle').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const menu = document.querySelector(`[data-dropdown-menu="${this.dataset.dropdown}"]`);
        menu.classList.toggle('hidden');
        this.querySelector('.arrow').innerHTML = menu.classList.contains('hidden') ? '&#9656;' : '&#9662;';
    });
});
</script>
