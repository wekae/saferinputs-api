<?php


namespace App\Auth\Repository;

use App\Auth\Model\AccessToken;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use Laravel\Passport\Bridge\AccessTokenRepository as PassportAccessTokenRepository;

/**
 * Class AccessTokenRepository
 * @package App\Auth\Repository
 * This is the token repository where we call our custom JWT model.
 */
class AccessTokenRepository extends PassportAccessTokenRepository{

    public function getNewToken(ClientEntityInterface $clientEntity, array $scopes, $userIdentifier = null)
    {
        return new AccessToken($userIdentifier, $scopes, $clientEntity);
    }

}
