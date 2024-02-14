<?php

namespace DoctrineORMModule\Proxy\__CG__\Authentication\Entity;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class User extends \Authentication\Entity\User implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'id', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'fullname', 'username', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'email', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'password', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'role', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'state', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'question', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'answer', 'registrationDate', 'registrationToken', 'emailConfirmed', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'isProfiled', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'updatedOn', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'createdOn', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'uid', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'uuid', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'mobileActivateCode', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'isOauth', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'oauthProvider', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'oauthUid', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'ipAddress', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'isActive', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'companyName'];
        }

        return ['__isInitialized__', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'id', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'fullname', 'username', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'email', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'password', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'role', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'state', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'question', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'answer', 'registrationDate', 'registrationToken', 'emailConfirmed', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'isProfiled', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'updatedOn', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'createdOn', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'uid', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'uuid', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'mobileActivateCode', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'isOauth', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'oauthProvider', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'oauthUid', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'ipAddress', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'isActive', '' . "\0" . 'Authentication\\Entity\\User' . "\0" . 'companyName'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (User $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load(): void
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized(): bool
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized): void
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null): void
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer(): ?\Closure
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null): void
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner(): ?\Closure
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties(): array
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getUsername()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsername', []);

        return parent::getUsername();
    }

    /**
     * {@inheritDoc}
     */
    public function setUsername($username)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsername', [$username]);

        return parent::setUsername($username);
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', []);

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', [$email]);

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getPassword()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPassword', []);

        return parent::getPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setPassword($password)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPassword', [$password]);

        return parent::setPassword($password);
    }

    /**
     * {@inheritDoc}
     */
    public function getRole()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRole', []);

        return parent::getRole();
    }

    /**
     * {@inheritDoc}
     */
    public function setRole(\Authentication\Entity\Roles $role)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRole', [$role]);

        return parent::setRole($role);
    }

    /**
     * {@inheritDoc}
     */
    public function getState()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getState', []);

        return parent::getState();
    }

    /**
     * {@inheritDoc}
     */
    public function setState(\Authentication\Entity\UserState $state)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setState', [$state]);

        return parent::setState($state);
    }

    /**
     * {@inheritDoc}
     */
    public function getAnswer()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAnswer', []);

        return parent::getAnswer();
    }

    /**
     * {@inheritDoc}
     */
    public function setAnswer(string $answer)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAnswer', [$answer]);

        return parent::setAnswer($answer);
    }

    /**
     * {@inheritDoc}
     */
    public function getRegistrationDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRegistrationDate', []);

        return parent::getRegistrationDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setRegistrationDate(\DateTime $registrationDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRegistrationDate', [$registrationDate]);

        return parent::setRegistrationDate($registrationDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getRegistrationToken()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRegistrationToken', []);

        return parent::getRegistrationToken();
    }

    /**
     * {@inheritDoc}
     */
    public function setRegistrationToken(string $registrationToken)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRegistrationToken', [$registrationToken]);

        return parent::setRegistrationToken($registrationToken);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmailConfirmed()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmailConfirmed', []);

        return parent::getEmailConfirmed();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmailConfirmed(bool $emailConfirmed)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmailConfirmed', [$emailConfirmed]);

        return parent::setEmailConfirmed($emailConfirmed);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsProfiled()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsProfiled', []);

        return parent::getIsProfiled();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsProfiled(bool $isProfiled)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsProfiled', [$isProfiled]);

        return parent::setIsProfiled($isProfiled);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedOn()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedOn', []);

        return parent::getUpdatedOn();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedOn(\DateTime $updatedOn)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedOn', [$updatedOn]);

        return parent::setUpdatedOn($updatedOn);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedOn()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedOn', []);

        return parent::getCreatedOn();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedOn(\DateTime $createdOn)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedOn', [$createdOn]);

        return parent::setCreatedOn($createdOn);
    }

    /**
     * {@inheritDoc}
     */
    public function getUid()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUid', []);

        return parent::getUid();
    }

    /**
     * {@inheritDoc}
     */
    public function setUid(string $uid)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUid', [$uid]);

        return parent::setUid($uid);
    }

    /**
     * {@inheritDoc}
     */
    public function getFullname()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFullname', []);

        return parent::getFullname();
    }

    /**
     * {@inheritDoc}
     */
    public function setFullname(string $fullname)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFullname', [$fullname]);

        return parent::setFullname($fullname);
    }

    /**
     * {@inheritDoc}
     */
    public function getQuestion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getQuestion', []);

        return parent::getQuestion();
    }

    /**
     * {@inheritDoc}
     */
    public function setQuestion(string $question)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setQuestion', [$question]);

        return parent::setQuestion($question);
    }

    /**
     * {@inheritDoc}
     */
    public function getUuid()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUuid', []);

        return parent::getUuid();
    }

    /**
     * {@inheritDoc}
     */
    public function setUuid(string $uuid)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUuid', [$uuid]);

        return parent::setUuid($uuid);
    }

    /**
     * {@inheritDoc}
     */
    public function getMobileActivateCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMobileActivateCode', []);

        return parent::getMobileActivateCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setMobileActivateCode(string $mobileActivateCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMobileActivateCode', [$mobileActivateCode]);

        return parent::setMobileActivateCode($mobileActivateCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsOauth()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsOauth', []);

        return parent::getIsOauth();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsOauth(bool $isOauth)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsOauth', [$isOauth]);

        return parent::setIsOauth($isOauth);
    }

    /**
     * {@inheritDoc}
     */
    public function getOauthProvider()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOauthProvider', []);

        return parent::getOauthProvider();
    }

    /**
     * {@inheritDoc}
     */
    public function setOauthProvider(\Authentication\Entity\OAuthProvider $oauthProvider)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOauthProvider', [$oauthProvider]);

        return parent::setOauthProvider($oauthProvider);
    }

    /**
     * {@inheritDoc}
     */
    public function getOauthUid()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOauthUid', []);

        return parent::getOauthUid();
    }

    /**
     * {@inheritDoc}
     */
    public function setOauthUid(string $oauthUid)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOauthUid', [$oauthUid]);

        return parent::setOauthUid($oauthUid);
    }

    /**
     * {@inheritDoc}
     */
    public function getIpAddress()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIpAddress', []);

        return parent::getIpAddress();
    }

    /**
     * {@inheritDoc}
     */
    public function setIpAddress(string $ipAddress)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIpAddress', [$ipAddress]);

        return parent::setIpAddress($ipAddress);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsActive()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsActive', []);

        return parent::getIsActive();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsActive(bool $isActive)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsActive', [$isActive]);

        return parent::setIsActive($isActive);
    }

    /**
     * {@inheritDoc}
     */
    public function setCompanyName(string $companyName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCompanyName', [$companyName]);

        return parent::setCompanyName($companyName);
    }

}