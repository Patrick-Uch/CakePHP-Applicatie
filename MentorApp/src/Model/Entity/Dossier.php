<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Security;


class Dossier extends Entity
{
        // Laad en decodeer de encryptiesleutel uit key.txt
        private function getEncryptionKey(): string
        {
            $keyPath = CONFIG . 'crypto' . DS . 'key.txt';
            $base64Key = trim(file_get_contents($keyPath));
            return base64_decode($base64Key);
        }
    
        // Laad en decodeer de IV uit iv.txt
        private function getEncryptionIV(): string
        {
            $ivPath = CONFIG . 'crypto' . DS . 'iv.txt';
            $base64IV = trim(file_get_contents($ivPath));
            return base64_decode($base64IV);
        }
    
        // Encrypt een stringwaarde
        private function encrypt(?string $waarde): ?string
        {
            if (empty($waarde)) {
                return null;
            }
    
            $sleutel = $this->getEncryptionKey();
            $iv = $this->getEncryptionIV();
    
            $encrypted = openssl_encrypt($waarde, 'AES-256-CBC', $sleutel, OPENSSL_RAW_DATA, $iv);
    
            if ($encrypted === false) {
                \Cake\Log\Log::write('error', 'Encryptie mislukt voor waarde: ' . $waarde);
                return null;
            }
    
            return base64_encode($encrypted);
        }
    
        // Decrypt een gecodeerde waarde
        private function decrypt(?string $waarde): ?string
        {
            if (empty($waarde)) {
                return null;
            }
    
            $sleutel = $this->getEncryptionKey();
            $iv = $this->getEncryptionIV();
    
            $decoded = base64_decode($waarde, true);
            if ($decoded === false) {
                \Cake\Log\Log::write('error', 'Base64 decoding mislukt: ' . $waarde);
                return null;
            }
    
            $decrypted = openssl_decrypt($decoded, 'AES-256-CBC', $sleutel, OPENSSL_RAW_DATA, $iv);
    
            if ($decrypted === false) {
                \Cake\Log\Log::write('error', 'Decryptie mislukt: ' . $waarde . ' | ' . openssl_error_string());
            }
    
            return $decrypted ?: null;
        }
    
        // Haal decrypted BSN op
        public function _getBsn(): ?string
        {
            return $this->decrypt($this->_fields['bsn'] ?? null);
        }
    
        // Zet een BSN en encrypt deze
        public function _setBsn(?string $bsn): ?string
        {
            return $this->encrypt($bsn);
        }
    
        // Haal decrypted IBAN op
        protected function _getIban(): ?string
        {
            return $this->decrypt($this->_fields['iban'] ?? null);
        }
    
        // Zet een IBAN en encrypt deze
        protected function _setIban(?string $iban): ?string
        {
            return $this->encrypt($iban);
        }
    

    
    



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
        'postadres_postcode' => true,
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

    protected array $_virtual = [
        'bsn',
         'iban'
        ];
}
