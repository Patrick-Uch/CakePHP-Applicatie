<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->css('custom') ?> 
</head>
<body>
    <header>
        <h1>My Custom Layout</h1>
    </header>
    <main>
        <?= $this->fetch('content') ?> 
    </main>
    <footer>
        <p>Footer Content</p>
    </footer>
</body>
</html>
