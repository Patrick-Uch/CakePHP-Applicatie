<?php
$host = "localhost";
$dbname = "mentorapp";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO dossiers (
        bedrijf_id, status, naam, email_1, email_2, telefoonnummer_1, telefoonnummer_2, bsn, iban, 
        postadres_straat, postadres_huisnummer, postadres_toevoeging, postadres_gemeente, postadres_provincie,
        bezoekadres_straat, bezoekadres_huisnummer, bezoekadres_toevoeging, bezoekadres_postcode, bezoekadres_gemeente, bezoekadres_provincie,
        rechtbank, mb_cb_nummer, betrokkenen_relatie, betrokkenen_voor_achternaam, betrokkenen_telefoonnummer, betrokkenen_email,
        betrokkenen_straat, betrokkenen_huisnummer, betrokkenen_toevoeging, betrokkenen_postcode, betrokkenen_gemeente,
        encryption_key_id, gemaakt_op, geupdate_op
    ) VALUES 
    (:bedrijf_id, :status, :naam, :email_1, :email_2, :telefoonnummer_1, :telefoonnummer_2, :bsn, :iban, 
     :postadres_straat, :postadres_huisnummer, :postadres_toevoeging, :postadres_gemeente, :postadres_provincie,
     :bezoekadres_straat, :bezoekadres_huisnummer, :bezoekadres_toevoeging, :bezoekadres_postcode, :bezoekadres_gemeente, :bezoekadres_provincie,
     :rechtbank, :mb_cb_nummer, :betrokkenen_relatie, :betrokkenen_voor_achternaam, :betrokkenen_telefoonnummer, :betrokkenen_email,
     :betrokkenen_straat, :betrokkenen_huisnummer, :betrokkenen_toevoeging, :betrokkenen_postcode, :betrokkenen_gemeente,
     :encryption_key_id, NOW(), NOW())";

    $stmt = $pdo->prepare($sql);

    $dummyData = [
        [
            'bedrijf_id' => 1, 'status' => 'Actief', 'naam' => 'John Doe', 'email_1' => 'john@example.com', 'email_2' => 'john.alt@example.com',
            'telefoonnummer_1' => '0612345678', 'telefoonnummer_2' => '0623456789', 'bsn' => '123456789', 'iban' => 'NL91ABNA0417164300',
            'postadres_straat' => 'Hoofdstraat', 'postadres_huisnummer' => '10', 'postadres_toevoeging' => 'A', 'postadres_gemeente' => 'Amsterdam',
            'postadres_provincie' => 'Noord-Holland', 'bezoekadres_straat' => 'Kerkstraat', 'bezoekadres_huisnummer' => '20', 'bezoekadres_toevoeging' => 'B',
            'bezoekadres_postcode' => '1011AB', 'bezoekadres_gemeente' => 'Amsterdam', 'bezoekadres_provincie' => 'Noord-Holland', 
            'rechtbank' => 'Rechtbank Amsterdam', 'mb_cb_nummer' => 'MB123456', 'betrokkenen_relatie' => 'Partner', 'betrokkenen_voor_achternaam' => 'Jane Doe',
            'betrokkenen_telefoonnummer' => '0612345679', 'betrokkenen_email' => 'jane@example.com', 'betrokkenen_straat' => 'Plein', 'betrokkenen_huisnummer' => '5',
            'betrokkenen_toevoeging' => '', 'betrokkenen_postcode' => '1234AB', 'betrokkenen_gemeente' => 'Rotterdam', 'encryption_key_id' => 'ENC123'
        ],
        [
            'bedrijf_id' => 1, 'status' => 'Opstarten', 'naam' => 'Alice Smith', 'email_1' => 'alice@example.com', 'email_2' => NULL,
            'telefoonnummer_1' => '0611122233', 'telefoonnummer_2' => NULL, 'bsn' => '987654321', 'iban' => 'NL91INGB0417164301',
            'postadres_straat' => 'Dorpstraat', 'postadres_huisnummer' => '45', 'postadres_toevoeging' => '', 'postadres_gemeente' => 'Utrecht',
            'postadres_provincie' => 'Utrecht', 'bezoekadres_straat' => 'Laan', 'bezoekadres_huisnummer' => '99', 'bezoekadres_toevoeging' => '',
            'bezoekadres_postcode' => '3456CD', 'bezoekadres_gemeente' => 'Utrecht', 'bezoekadres_provincie' => 'Utrecht', 
            'rechtbank' => 'Rechtbank Utrecht', 'mb_cb_nummer' => 'CB987654', 'betrokkenen_relatie' => 'Kind', 'betrokkenen_voor_achternaam' => 'Bob Smith',
            'betrokkenen_telefoonnummer' => '0611122244', 'betrokkenen_email' => 'bob@example.com', 'betrokkenen_straat' => 'Gracht', 'betrokkenen_huisnummer' => '77',
            'betrokkenen_toevoeging' => 'C', 'betrokkenen_postcode' => '5678EF', 'betrokkenen_gemeente' => 'Den Haag', 'encryption_key_id' => NULL
        ],
        [
            'bedrijf_id' => 1, 'status' => 'In beëindiging', 'naam' => 'Michael Johnson', 'email_1' => 'michael@example.com', 'email_2' => 'michael.alt@example.com',
            'telefoonnummer_1' => '0698765432', 'telefoonnummer_2' => NULL, 'bsn' => '246810121', 'iban' => 'NL91RABO0417164302',
            'postadres_straat' => 'Ringweg', 'postadres_huisnummer' => '3', 'postadres_toevoeging' => '', 'postadres_gemeente' => 'Eindhoven',
            'postadres_provincie' => 'Noord-Brabant', 'bezoekadres_straat' => 'Steenstraat', 'bezoekadres_huisnummer' => '15', 'bezoekadres_toevoeging' => '',
            'bezoekadres_postcode' => '7890GH', 'bezoekadres_gemeente' => 'Eindhoven', 'bezoekadres_provincie' => 'Noord-Brabant', 
            'rechtbank' => 'Rechtbank Eindhoven', 'mb_cb_nummer' => 'MB789012', 'betrokkenen_relatie' => 'Ouder', 'betrokkenen_voor_achternaam' => 'Emily Johnson',
            'betrokkenen_telefoonnummer' => '0612345680', 'betrokkenen_email' => 'emily@example.com', 'betrokkenen_straat' => 'Singel', 'betrokkenen_huisnummer' => '12',
            'betrokkenen_toevoeging' => '', 'betrokkenen_postcode' => '9012IJ', 'betrokkenen_gemeente' => 'Groningen', 'encryption_key_id' => 'ENC456'
        ]
    ];

    foreach ($dummyData as $data) {
        $stmt->execute($data);
    }

    echo "✅ 5 Dummy records inserted successfully!";
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>
