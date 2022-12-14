<?php

    /*
    * author: tk
    * name: fa21-blog-mvc
    * date: 29.08.22
    */

    namespace App\View;

    // Project-Imports
    use App\Settings\AppSettings;

    // Package-Imports
    use Twig\Loader\FilesystemLoader;  
    use Twig\Environment;      
    use Twig\TemplateWrapper;

    class View {

        private Environment $twig;

        public function __construct() {

            $loader = new FilesystemLoader(AppSettings::TEMPLATE_PATH);
            
            // twig with cache
            #$this->twig = new Environment($loader, [
            #    'cache' => AppSettings::TEMPLATE_CACHE
            #]);
            
            // twig without cache (only for dev)
            $this->twig = new Environment($loader);

            // twig globals
            $this->twig->addGlobal('title', AppSettings::APP_TITLE);
            $this->twig->addGlobal('session', $_SESSION);
            $this->twig->addGlobal('basePath', AppSettings::ROUTER_URI_PREFIX);

        }

        public function load(string $template): TemplateWrapper {
            
            return $this->twig->load($template);

        }

    }