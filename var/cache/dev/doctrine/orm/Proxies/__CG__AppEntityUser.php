<?php

namespace Proxies\__CG__\App\Entity;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class User extends \App\Entity\User implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\User' . "\0" . 'id', '' . "\0" . 'App\\Entity\\User' . "\0" . 'email', '' . "\0" . 'App\\Entity\\User' . "\0" . 'roles', '' . "\0" . 'App\\Entity\\User' . "\0" . 'password', '' . "\0" . 'App\\Entity\\User' . "\0" . 'type', '' . "\0" . 'App\\Entity\\User' . "\0" . 'companyName', '' . "\0" . 'App\\Entity\\User' . "\0" . 'siret', '' . "\0" . 'App\\Entity\\User' . "\0" . 'firstName', '' . "\0" . 'App\\Entity\\User' . "\0" . 'lastName', '' . "\0" . 'App\\Entity\\User' . "\0" . 'address', '' . "\0" . 'App\\Entity\\User' . "\0" . 'postCode', '' . "\0" . 'App\\Entity\\User' . "\0" . 'city', '' . "\0" . 'App\\Entity\\User' . "\0" . 'isUserActive', '' . "\0" . 'App\\Entity\\User' . "\0" . 'showTuto', '' . "\0" . 'App\\Entity\\User' . "\0" . 'isProfileCompleted', '' . "\0" . 'App\\Entity\\User' . "\0" . 'profileImage', '' . "\0" . 'App\\Entity\\User' . "\0" . 'description', '' . "\0" . 'App\\Entity\\User' . "\0" . 'resume', '' . "\0" . 'App\\Entity\\User' . "\0" . 'linkedin', '' . "\0" . 'App\\Entity\\User' . "\0" . 'github', '' . "\0" . 'App\\Entity\\User' . "\0" . 'lastConnected', '' . "\0" . 'App\\Entity\\User' . "\0" . 'createdAt', '' . "\0" . 'App\\Entity\\User' . "\0" . 'updatedAt', '' . "\0" . 'App\\Entity\\User' . "\0" . 'skills', '' . "\0" . 'App\\Entity\\User' . "\0" . 'stages', '' . "\0" . 'App\\Entity\\User' . "\0" . 'matchesFromMe', '' . "\0" . 'App\\Entity\\User' . "\0" . 'matchesToMe'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\User' . "\0" . 'id', '' . "\0" . 'App\\Entity\\User' . "\0" . 'email', '' . "\0" . 'App\\Entity\\User' . "\0" . 'roles', '' . "\0" . 'App\\Entity\\User' . "\0" . 'password', '' . "\0" . 'App\\Entity\\User' . "\0" . 'type', '' . "\0" . 'App\\Entity\\User' . "\0" . 'companyName', '' . "\0" . 'App\\Entity\\User' . "\0" . 'siret', '' . "\0" . 'App\\Entity\\User' . "\0" . 'firstName', '' . "\0" . 'App\\Entity\\User' . "\0" . 'lastName', '' . "\0" . 'App\\Entity\\User' . "\0" . 'address', '' . "\0" . 'App\\Entity\\User' . "\0" . 'postCode', '' . "\0" . 'App\\Entity\\User' . "\0" . 'city', '' . "\0" . 'App\\Entity\\User' . "\0" . 'isUserActive', '' . "\0" . 'App\\Entity\\User' . "\0" . 'showTuto', '' . "\0" . 'App\\Entity\\User' . "\0" . 'isProfileCompleted', '' . "\0" . 'App\\Entity\\User' . "\0" . 'profileImage', '' . "\0" . 'App\\Entity\\User' . "\0" . 'description', '' . "\0" . 'App\\Entity\\User' . "\0" . 'resume', '' . "\0" . 'App\\Entity\\User' . "\0" . 'linkedin', '' . "\0" . 'App\\Entity\\User' . "\0" . 'github', '' . "\0" . 'App\\Entity\\User' . "\0" . 'lastConnected', '' . "\0" . 'App\\Entity\\User' . "\0" . 'createdAt', '' . "\0" . 'App\\Entity\\User' . "\0" . 'updatedAt', '' . "\0" . 'App\\Entity\\User' . "\0" . 'skills', '' . "\0" . 'App\\Entity\\User' . "\0" . 'stages', '' . "\0" . 'App\\Entity\\User' . "\0" . 'matchesFromMe', '' . "\0" . 'App\\Entity\\User' . "\0" . 'matchesToMe'];
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
    public function onPreUpdate(): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'onPreUpdate', []);

        parent::onPreUpdate();
    }

    /**
     * {@inheritDoc}
     */
    public function getId(): ?int
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
    public function getEmail(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', []);

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail(string $email): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', [$email]);

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getUserIdentifier(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUserIdentifier', []);

        return parent::getUserIdentifier();
    }

    /**
     * {@inheritDoc}
     */
    public function getUsername(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsername', []);

        return parent::getUsername();
    }

    /**
     * {@inheritDoc}
     */
    public function getRoles(): array
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRoles', []);

        return parent::getRoles();
    }

    /**
     * {@inheritDoc}
     */
    public function setRoles(array $roles): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRoles', [$roles]);

        return parent::setRoles($roles);
    }

    /**
     * {@inheritDoc}
     */
    public function getPassword(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPassword', []);

        return parent::getPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setPassword(string $password): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPassword', [$password]);

        return parent::setPassword($password);
    }

    /**
     * {@inheritDoc}
     */
    public function getSalt(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSalt', []);

        return parent::getSalt();
    }

    /**
     * {@inheritDoc}
     */
    public function eraseCredentials()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'eraseCredentials', []);

        return parent::eraseCredentials();
    }

    /**
     * {@inheritDoc}
     */
    public function getCompanyName(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompanyName', []);

        return parent::getCompanyName();
    }

    /**
     * {@inheritDoc}
     */
    public function setCompanyName(?string $companyName): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCompanyName', [$companyName]);

        return parent::setCompanyName($companyName);
    }

    /**
     * {@inheritDoc}
     */
    public function getSiret(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSiret', []);

        return parent::getSiret();
    }

    /**
     * {@inheritDoc}
     */
    public function setSiret(?string $siret): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSiret', [$siret]);

        return parent::setSiret($siret);
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstName(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFirstName', []);

        return parent::getFirstName();
    }

    /**
     * {@inheritDoc}
     */
    public function setFirstName(?string $firstName): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFirstName', [$firstName]);

        return parent::setFirstName($firstName);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastName(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastName', []);

        return parent::getLastName();
    }

    /**
     * {@inheritDoc}
     */
    public function setLastName(?string $lastName): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLastName', [$lastName]);

        return parent::setLastName($lastName);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddress(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddress', []);

        return parent::getAddress();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddress(string $address): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddress', [$address]);

        return parent::setAddress($address);
    }

    /**
     * {@inheritDoc}
     */
    public function getPostCode(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPostCode', []);

        return parent::getPostCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setPostCode(int $postCode): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPostCode', [$postCode]);

        return parent::setPostCode($postCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getCity(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCity', []);

        return parent::getCity();
    }

    /**
     * {@inheritDoc}
     */
    public function setCity(string $city): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCity', [$city]);

        return parent::setCity($city);
    }

    /**
     * {@inheritDoc}
     */
    public function isIsUserActive(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isIsUserActive', []);

        return parent::isIsUserActive();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsUserActive(bool $isUserActive): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsUserActive', [$isUserActive]);

        return parent::setIsUserActive($isUserActive);
    }

    /**
     * {@inheritDoc}
     */
    public function isShowTuto(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isShowTuto', []);

        return parent::isShowTuto();
    }

    /**
     * {@inheritDoc}
     */
    public function setShowTuto(bool $showTuto): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setShowTuto', [$showTuto]);

        return parent::setShowTuto($showTuto);
    }

    /**
     * {@inheritDoc}
     */
    public function isIsProfileCompleted(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isIsProfileCompleted', []);

        return parent::isIsProfileCompleted();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsProfileCompleted(bool $isProfileCompleted): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsProfileCompleted', [$isProfileCompleted]);

        return parent::setIsProfileCompleted($isProfileCompleted);
    }

    /**
     * {@inheritDoc}
     */
    public function getProfileImage(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProfileImage', []);

        return parent::getProfileImage();
    }

    /**
     * {@inheritDoc}
     */
    public function setProfileImage(string $profileImage): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProfileImage', [$profileImage]);

        return parent::setProfileImage($profileImage);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', []);

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription(?string $description): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', [$description]);

        return parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getResume(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getResume', []);

        return parent::getResume();
    }

    /**
     * {@inheritDoc}
     */
    public function setResume(string $resume): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setResume', [$resume]);

        return parent::setResume($resume);
    }

    /**
     * {@inheritDoc}
     */
    public function getLinkedin(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLinkedin', []);

        return parent::getLinkedin();
    }

    /**
     * {@inheritDoc}
     */
    public function setLinkedin(?string $linkedin): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLinkedin', [$linkedin]);

        return parent::setLinkedin($linkedin);
    }

    /**
     * {@inheritDoc}
     */
    public function getGithub(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGithub', []);

        return parent::getGithub();
    }

    /**
     * {@inheritDoc}
     */
    public function setGithub(?string $github): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGithub', [$github]);

        return parent::setGithub($github);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastConnected(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastConnected', []);

        return parent::getLastConnected();
    }

    /**
     * {@inheritDoc}
     */
    public function setLastConnected(\DateTimeInterface $lastConnected): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLastConnected', [$lastConnected]);

        return parent::setLastConnected($lastConnected);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', [$createdAt]);

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', []);

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt(?\DateTimeInterface $updatedAt): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', [$updatedAt]);

        return parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getType(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getType', []);

        return parent::getType();
    }

    /**
     * {@inheritDoc}
     */
    public function setType(string $type): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setType', [$type]);

        return parent::setType($type);
    }

    /**
     * {@inheritDoc}
     */
    public function getSkills(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSkills', []);

        return parent::getSkills();
    }

    /**
     * {@inheritDoc}
     */
    public function addSkill(\App\Entity\Skill $skill): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addSkill', [$skill]);

        return parent::addSkill($skill);
    }

    /**
     * {@inheritDoc}
     */
    public function removeSkill(\App\Entity\Skill $skill): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeSkill', [$skill]);

        return parent::removeSkill($skill);
    }

    /**
     * {@inheritDoc}
     */
    public function getStages(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStages', []);

        return parent::getStages();
    }

    /**
     * {@inheritDoc}
     */
    public function addStage(\App\Entity\Stage $stage): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addStage', [$stage]);

        return parent::addStage($stage);
    }

    /**
     * {@inheritDoc}
     */
    public function removeStage(\App\Entity\Stage $stage): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeStage', [$stage]);

        return parent::removeStage($stage);
    }

    /**
     * {@inheritDoc}
     */
    public function getMatchesFromMe(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMatchesFromMe', []);

        return parent::getMatchesFromMe();
    }

    /**
     * {@inheritDoc}
     */
    public function addMatchesFromMe(\App\Entity\MyMatch $matchesFromMe): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMatchesFromMe', [$matchesFromMe]);

        return parent::addMatchesFromMe($matchesFromMe);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMatchesFromMe(\App\Entity\MyMatch $matchesFromMe): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMatchesFromMe', [$matchesFromMe]);

        return parent::removeMatchesFromMe($matchesFromMe);
    }

    /**
     * {@inheritDoc}
     */
    public function getMatchesToMe(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMatchesToMe', []);

        return parent::getMatchesToMe();
    }

    /**
     * {@inheritDoc}
     */
    public function addMatchesToMe(\App\Entity\MyMatch $matchesToMe): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMatchesToMe', [$matchesToMe]);

        return parent::addMatchesToMe($matchesToMe);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMatchesToMe(\App\Entity\MyMatch $matchesToMe): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMatchesToMe', [$matchesToMe]);

        return parent::removeMatchesToMe($matchesToMe);
    }

}