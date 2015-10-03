<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // app_admin_admin
        if ($pathinfo === '/admin') {
            return array (  '_controller' => 'AppBundle\\Controller\\AdminController::adminAction',  '_route' => 'app_admin_admin',);
        }

        if (0 === strpos($pathinfo, '/stammdaten/agenturen')) {
            // agenturen_overview
            if (rtrim($pathinfo, '/') === '/stammdaten/agenturen') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'agenturen_overview');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\AgenturenController::indexAction',  '_route' => 'agenturen_overview',);
            }

            // agenturen_erstellen
            if (rtrim($pathinfo, '/') === '/stammdaten/agenturen/erstellen') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'agenturen_erstellen');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\AgenturenController::addAction',  '_route' => 'agenturen_erstellen',);
            }

        }

        // Author pflegen
        if ($pathinfo === '/author') {
            return array (  '_controller' => 'AppBundle\\Controller\\AuthorController::authorAction',  '_route' => 'Author pflegen',);
        }

        // blog_show
        if (0 === strpos($pathinfo, '/blog') && preg_match('#^/blog/(?P<year>[^/]++)/(?P<monat>[^/]++)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'blog_show');
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'blog_show')), array (  '_controller' => 'AppBundle\\Controller\\BlogController::showAction',));
        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        if (0 === strpos($pathinfo, '/stammdaten/destinationen')) {
            // destinationen_overview
            if (rtrim($pathinfo, '/') === '/stammdaten/destinationen') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'destinationen_overview');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\DestinationenController::indexAction',  '_route' => 'destinationen_overview',);
            }

            // destinationen_erstellen
            if (rtrim($pathinfo, '/') === '/stammdaten/destinationen/erstellen') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'destinationen_erstellen');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\DestinationenController::addAction',  '_route' => 'destinationen_erstellen',);
            }

        }

        // Formular
        if ($pathinfo === '/form') {
            return array (  '_controller' => 'AppBundle\\Controller\\FromController::newAction',  '_route' => 'Formular',);
        }

        // hotelpreise_overview
        if (rtrim($pathinfo, '/') === '/kalkulation/hotelpreise') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'hotelpreise_overview');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\HotelpreiseController::indexAction',  '_route' => 'hotelpreise_overview',);
        }

        if (0 === strpos($pathinfo, '/stammdaten')) {
            if (0 === strpos($pathinfo, '/stammdaten/hotels')) {
                // hotels_overview
                if (rtrim($pathinfo, '/') === '/stammdaten/hotels') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'hotels_overview');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\HotelsController::indexAction',  '_route' => 'hotels_overview',);
                }

                // hotels_erstellen
                if (rtrim($pathinfo, '/') === '/stammdaten/hotels/erstellen') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'hotels_erstellen');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\HotelsController::addAction',  '_route' => 'hotels_erstellen',);
                }

            }

            if (0 === strpos($pathinfo, '/stammdaten/laender')) {
                // laender_overview
                if (rtrim($pathinfo, '/') === '/stammdaten/laender') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'laender_overview');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\LaenderController::indexAction',  '_route' => 'laender_overview',);
                }

                // laender_erstellen
                if (rtrim($pathinfo, '/') === '/stammdaten/laender/erstellen') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'laender_erstellen');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\LaenderController::addAction',  '_route' => 'laender_erstellen',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/kalkulation/preisversionen')) {
            // preisversionen_overview
            if (rtrim($pathinfo, '/') === '/kalkulation/preisversionen') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'preisversionen_overview');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\PreisversionenController::indexAction',  '_route' => 'preisversionen_overview',);
            }

            // preisversionen_erstellen
            if (rtrim($pathinfo, '/') === '/kalkulation/preisversionen/erstellen') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'preisversionen_erstellen');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\PreisversionenController::addAction',  '_route' => 'preisversionen_erstellen',);
            }

            // preisversionen_generieren
            if (0 === strpos($pathinfo, '/kalkulation/preisversionen/generiere') && preg_match('#^/kalkulation/preisversionen/generiere/(?P<pvid>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'preisversionen_generieren');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'preisversionen_generieren')), array (  '_controller' => 'AppBundle\\Controller\\PreisversionenController::calcAction',));
            }

        }

        if (0 === strpos($pathinfo, '/pro')) {
            if (0 === strpos($pathinfo, '/product')) {
                // Produkt einpflegen
                if ($pathinfo === '/product/all') {
                    return array (  '_controller' => 'AppBundle\\Controller\\ProductController::zeigeAction',  '_route' => 'Produkt einpflegen',);
                }

                // Produkt mit Kategorie einpflegen
                if ($pathinfo === '/productcategory') {
                    return array (  '_controller' => 'AppBundle\\Controller\\ProductController::createProductAction',  '_route' => 'Produkt mit Kategorie einpflegen',);
                }

            }

            if (0 === strpos($pathinfo, '/profile')) {
                // profile_overview
                if (rtrim($pathinfo, '/') === '/profile') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'profile_overview');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\ProfileController::indexAction',  '_route' => 'profile_overview',);
                }

                // profile_user
                if (preg_match('#^/profile/(?P<userid>\\d+)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'profile_user');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'profile_user')), array (  '_controller' => 'AppBundle\\Controller\\ProfileController::showAction',));
                }

                // profile_user_erstellen
                if (rtrim($pathinfo, '/') === '/profile/erstellen') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'profile_user_erstellen');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\ProfileController::addAction',  '_route' => 'profile_user_erstellen',);
                }

                // profile_delete
                if (preg_match('#^/profile/(?P<userid>\\d+)/delete$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'profile_delete')), array (  '_controller' => 'AppBundle\\Controller\\ProfileController::deleteAction',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // Login Seite
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'AppBundle\\Controller\\SecurityController::loginAction',  '_route' => 'Login Seite',);
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array (  '_controller' => 'AppBundle\\Controller\\SecurityController::loginCheckAction',  '_route' => 'login_check',);
                }

            }

            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
