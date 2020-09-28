<?php


namespace App\Auth\Model;

use App\User;
use Laravel\Passport\Bridge\AccessToken as PassportAccessToken;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Key;
use Lcobucci\JWT\Signer\Rsa\Sha256;
use League\OAuth2\Server\CryptKey;

/**
 * Class AccessToken
 * @package App\Auth\Model
 * This is where we will define our customized JWT containing all the data we want.
 */
class AccessToken extends PassportAccessToken
{
    private $privateKey;

    public function convertToJWT(CryptKey $privateKey){
        $builder = new Builder();
        $user = User::find($this->getUserIdentifier());
        $builder->permittedFor($this->getClient()->getIdentifier())
            ->identifiedBy($this->getIdentifier(), true)
            ->issuedAt(time())
            ->canOnlyBeUsedAfter(time())
            ->expiresAt($this->getExpiryDateTime()->getTimeStamp())
            ->relatedTo($this->getUserIdentifier())
            ->withClaim('scopes', [])
            ->withClaim('id', $user->id)
            ->withClaim('name', $user->name)
            ->withClaim('email', $user->email)
            ->withClaim('access_level', $user->access_level)
            ->withClaim('koan_users_id', $user->koan_users_id)
            ->withClaim('active', $user->active)
            ->withClaim('email_verified_at', $user->email_verified_at);
        return $builder
            ->getToken(new Sha256(), new Key($privateKey->getKeyPath(), $privateKey->getPassPhrase()));
    }

    /**
     * @param mixed $privateKey
     */
    public function setPrivateKey(CryptKey $privateKey)
    {
        $this->privateKey = $privateKey;
    }

    public function __toString()
    {
        return (string) $this->convertToJWT($this->privateKey);
    }

}
