<?php

namespace NoticiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Serializable;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="NoticiaBundle\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @var array
     * @ORM\Column(name="roles", type="array")
    **/
    private $roles = array();

    public function __construct()
    {
        $this->salt = base_convert(sha1(uniqid(mt_rand(),true)), 16, 36);
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    public function getRoles()
    {
        $roles = $this->roles;
        $roles[] = "ROLE_USER";

        return array_unique($roles);
    }

    public function setRoles(array $roles)
    {
        $this->roles = $roles;
    }

    public function equals(UserInterface $user)
    {
        return $this->getId() == $user->getId();
    }

    public function eraseCredentials()
    {

    }

    public function serialaize()
    {
        return serialize(array(
            'id' => $this->getId()
    ));
    }

    public function unserialaize($serialized)
    {
        $data = unserialize($serialized);
        $this->id = $data['id'];
    }
}
