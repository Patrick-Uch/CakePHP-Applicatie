<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Security;

class Dossier extends Entity
{
    protected array $_hidden = ['encryption_key_id']; 

    protected array $_accessible = [
        'bedrijf_id' => true,
        'status' => true,
        'naam' => true,
        'email_1' => true,
        'email_2' => true,
        'telefoonnummer_1' => true,
        'telefoonnummer_2' => true,
        'bsn' => true,
        'iban' => true,
        'postadres_straat' => true,
        'postadres_huisnummer' => true,
        'postadres_toevoeging' => true,
        'postadres_gemeente' => true,
        'postadres_provincie' => true,
        'bezoekadres_straat' => true,
        'bezoekadres_huisnummer' => true,
        'bezoekadres_toevoeging' => true,
        'bezoekadres_postcode' => true,
        'bezoekadres_gemeente' => true,
        'bezoekadres_provincie' => true,
        'rechtbank' => true,
        'mb_cb_nummer' => true,
        'betrokkenen_relatie' => true,
        'betrokkenen_voor_achternaam' => true,
        'betrokkenen_telefoonnummer' => true,
        'betrokkenen_email' => true,
        'betrokkenen_straat' => true,
        'betrokkenen_huisnummer' => true,
        'betrokkenen_toevoeging' => true,
        'betrokkenen_postcode' => true,
        'betrokkenen_gemeente' => true,
        'encryption_key_id' => true,
        'gemaakt_op' => true,
        'geupdate_op' => true,
    ];


//     private function getEncryptionKey(): string
//     {
//         return hash('sha256', Security::getSalt(), true);
//     }


//     private function getEncryptionIV(): string
//     {
//         return substr(Security::getSalt(), 0, 16);
//     }

//     private function encrypt(?string $waarde): ?string
//     {
//         if (empty($waarde)) {
//             return null;
//         }

//         $sleutel = $this->getEncryptionKey();
//         $iv = $this->getEncryptionIV();

//         return base64_encode(openssl_encrypt($waarde, 'AES-256-CBC', $sleutel, 0, $iv));
//     }

//     private function decrypt(?string $waarde): ?string
//     {
//         if (empty($waarde)) {
//             return null;
//         }

//         $sleutel = $this->getEncryptionKey();
//         $iv = $this->getEncryptionIV();

//         $ontsleuteld = openssl_decrypt(base64_decode($waarde), 'AES-256-CBC', $sleutel, 0, $iv);
//         return $ontsleuteld ?: null;
//     }

//     protected function _getBsn(): ?string
//     {
//         return $this->decrypt($this->_fields['bsn'] ?? null);
//     }

//     protected function _setBsn(?string $bsn): ?string
//     {
//         return $this->encrypt($bsn);
//     }


//     protected function _getIban(): ?string
//     {
//         return $this->decrypt($this->_fields['iban'] ?? null);
//     }


//     protected function _setIban(?string $iban): ?string
//     {
//         return $this->encrypt($iban);
//     }
}
