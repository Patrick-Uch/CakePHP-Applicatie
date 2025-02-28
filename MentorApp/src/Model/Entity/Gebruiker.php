<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

class Gebruiker extends Entity
{
    protected array $_accessible = [
        'bedrijf_id' => true,
        'naam' => true,
        'email' => true,
        'wachtwoord' => true,
        'rol' => true,
        'gemaakt_op' => true,
        'geupdate_op' => true,
    ];

    protected function _setWachtwoord(string $wachtwoord): ?string
    {
        if (!empty($wachtwoord)) {
            return (new DefaultPasswordHasher())->hash($wachtwoord);
        }
        return null;
    }
}
