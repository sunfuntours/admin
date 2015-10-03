<?php
	
	// src/AppBundle/Security/User/WebserviceUserProvider.php

	namespace AppBundle\Security\User;
	
	use AppBundle\Entity\AgenturUser;
	use Symfony\Component\Security\Core\User\UserProviderInterface;
	use Symfony\Component\Security\Core\User\UserNotFoundException;
	use Symfony\Component\Security\Core\User\UserInterface;
	use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
	use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

	class WebserviceUserProvider implements UserProviderInterface
	{
	    public function loadUserByUsername($username)
	    {
	        // make a call to your webservice here
	        $auuser = new AgenturUser();
	        $userData = $auuser->findUserByAubn();
	        
	        // pretend it returns an array on success, false if there is no user
	        
	        if ($userData) {
	            return new AgenturUser($username, $password, $salt, $roles);

	        }
	        
	        throw new UsernameNotFoundException(
	            sprintf('Username "%s" does not exist.', $username)
				); 
		}
	    
	    public function refreshUser(UserInterface $user)
	    {
	        if (!$user instanceof WebserviceUser) {
	            throw new UnsupportedUserException(
	                sprintf('Instances of "%s" are not supported.', get_class($user))
	            );
			}
	
			return $this->loadUserByUsername($user->getUsername());
	    }
	    
	    public function supportsClass($class)
	    {
	        return $class === 'AppBundle\Entity\AgenturUser';
	    }
	}