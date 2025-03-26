<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Log\Log;

class Dossier extends Entity
{
    private function getEncryptionKey(): string
    {
        return base64_decode(file_get_contents(CONFIG . 'crypto' . DS . 'key.txt'));
    }

    private function getEncryptionIV(): string
    {
        return base64_decode(file_get_contents(CONFIG . 'crypto' . DS . 'iv.txt'));
    }

    private function encrypt(?string $waarde): ?string
    {
        if (empty($waarde)) {
            return null;
        }

        $encrypted = openssl_encrypt(
            $waarde,
            'AES-256-CBC',
            $this->getEncryptionKey(),
            OPENSSL_RAW_DATA,
            $this->getEncryptionIV()
        );

        return base64_encode($encrypted ?: '');
    }

    private function decrypt(?string $waarde): ?string
    {
        if (empty($waarde)) {
            return null;
        }

        $decoded = base64_decode($waarde, true);
        if ($decoded === false) {
            Log::error('Base64 decoding mislukt: ' . $waarde);
            return null;
        }

        $decrypted = openssl_decrypt(
            $decoded,
            'AES-256-CBC',
            $this->getEncryptionKey(),
            OPENSSL_RAW_DATA,
            $this->getEncryptionIV()
        );

        return $decrypted ?: null;
    }

    // CakePHP 5 standaard (zonder underscores)

    public function getBsn(): ?string
    {
        return $this->decrypt($this->get('bsn'));
    }

    public function setBsn(?string $bsn): self
    {
        $this->set('bsn', $this->encrypt($bsn));
        return $this;
    }

    public function getIban(): ?string
    {
        return $this->decrypt($this->get('iban'));
    }

    public function setIban(?string $iban): self
    {
        $this->set('iban', $this->encrypt($iban));
        return $this;
    }


    protected array $_hidden = [
        'encryption_key_id'
    ];

    protected array $_virtual = [
        'bsn', 
        'iban'
    ];
    protected array $_accessible = [
        'bedrijf_id' => true,
        'status' => true,
        'naam' => true,
        'email_1' => true,
        'email_2' => true,
        'telefoonnummer_1' => true,
        'telefoonnummer_2' => true,
        'bsn' => false,
        'iban' => false,
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
    
}
