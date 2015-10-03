<?php

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use \DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppUsers
 *
 * @ORM\Table(name="app_users", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_C2502824F85E0677", columns={"username"}), @ORM\UniqueConstraint(name="UNIQ_C2502824E7927C74", columns={"email"})})
 * @ORM\Entity
 */
class AppUsers implements UserInterface, EquatableInterface
{
    /**
     * @var string
     * @ORM\Column(name="username", type="string", length=25, nullable=false)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64, nullable=false)
	 * @Assert\NotBlank()
     */
    private $password;
    
    /**
     * @var string
     *
     * @ORM\Column(name="vorname", type="string", length=64, nullable=false)
	 * @Assert\NotBlank()
     */
    private $vorname;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nachname", type="string", length=64, nullable=false)	 
     * @Assert\NotBlank()
     */
    private $nachname;
    
    /**
     * @var datetime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, nullable=false)
   	 * @Assert\NotBlank()

     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="role", type="integer", options={"default":1})
     */
    private $role;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set username
     *
     * @param string $username
     * @return AppUsers
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
     * @return AppUsers
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    
    /**
     * @var bool
     */
    private $localized = false;


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
     * Set email
     *
     * @param string $email
     * @return AppUsers
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return AppUsers
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
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
    
    public function __construct($username = null, $password = null, $salt = null, array $roles = array())
    {
        $this->username = $username;
        $this->password = $password;
        $this->salt = $salt;
        $this->roles = $roles;
	}
    
    public function getSalt()
    {
        return null;
    }
    
	
    public function eraseCredentials()
    {
    }
    
    public function isEqualTo(UserInterface $user)
    {
        if (!$user instanceof WebserviceUser) {
            return false;
		}
        if ($this->password !== $user->getPassword()) {
            return false;
		}
        if ($this->salt !== $user->getSalt()) {
            return false;
		}
        if ($this->username !== $user->getUsername()) {
            return false;
        }
        return true;
    }

    /**
     * Get roles
     */
    public function getRoles()
    {
	    switch($this->role) {
		    case 1: 
		    	$roles = "ROLE_USER";
		    	break;
		    case 2: 
		    	$roles = "ROLE_ADMIN";
		    	break;
			case 9: 
				$roles = "ROLE_SUPER_ADMIN";
		    	break;
			
	    }
        return array($roles);
    }

    /**
     * Set vorname
     *
     * @param string $vorname
     * @return AppUsers
     */
    public function setVorname($vorname)
    {
        $this->vorname = $vorname;

        return $this;
    }

    /**
     * Get vorname
     *
     * @return string 
     */
    public function getVorname()
    {
        return $this->vorname;
    }

    /**
     * Set nachname
     *
     * @param string $nachname
     * @return AppUsers
     */
    public function setNachname($nachname)
    {
        $this->nachname = $nachname;

        return $this;
    }

    /**
     * Get nachname
     *
     * @return string 
     */
    public function getNachname()
    {
        return $this->nachname;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return AppUsers
     */
    public function setCreated($created)
    {
		$this->created = $created;
        return $this->created;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {

        return $this->created;
    }
    
	/**
	   * @ORM\PrePersist()
	  */
	public function preSafe() {
    	// set default date
	    $this->created = date('Y-m-d H:m:s');
	}

    


    /**
     * Set role
     *
     * @param integer $role
     * @return AppUsers
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return integer 
     */
    public function getRole()
    {
        return $this->role;
    }
}
