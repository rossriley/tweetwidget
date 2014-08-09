<?php
// Sea of Clouds - Twitter Widget Extension for Bolt, by Bob den Otter

namespace SeaOfCloudsWidget;

use Bolt\Extensions\Snippets\Location as SnippetLocation;

class Extension extends \Bolt\BaseExtension
{

    /**
     * Info block for Sea of Clouds - Twitter Widget Extension.
     */
    function info()
    {

        $data = array(
            'name' => "Tweet! - Twitter Widget",
            'description' => "Tweetwidget is a twitter widget, based on the 'Sea of Clouds' Tweet! script.",
            'keywords' => "twitter, widget, sidebar",
            'author' => "Bob den Otter",
            'link' => "http://bolt.cm",
            'version' => "0.1",
            'required_bolt_version' => "1.1.0",
            'highest_bolt_version' => "1.1.1",
            'type' => "Widget",
            'first_releasedate' => "2013-03-10",
            'latest_releasedate' => "2013-03-10",
            'dependencies' => "",
            'priority' => 10
        );

        return $data;

    }

    /**
     * Initialize Sea of Clouds - Twitter Widget. Called during bootstrap phase.
     */
    function initialize()
    {

        // Make sure jQuery is included
        $this->addJquery();

        // Add javascript file
        $this->addJavascript("assets/jquery.tweet.js");

        // Add CSS file
        $this->addCSS("assets/" . $this->config['style_filename']);

        // Initialize the Twig function
        $this->addTwigFunction('tweetwidget', 'tweetwidget');

    }

    /**
     * Twig function {{ tweetwidget() }} in Sea of Clouds - Twitter Widget extension.
     */
    function tweetwidget()
    {

        $this->app['twig.loader.filesystem']->addPath(__DIR__);

        $formhtml = $this->app['twig']->render("assets/" . $this->config['template'], array(
            "config" => $this->config
        ));

        return new \Twig_Markup($formhtml, 'UTF-8');

    }
    
    public function getName()
    {
        return "tweetwidget";
    }



}


