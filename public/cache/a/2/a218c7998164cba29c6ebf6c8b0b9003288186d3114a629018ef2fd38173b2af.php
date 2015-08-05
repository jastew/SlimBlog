<?php

/* home.twig */
class __TwigTemplate_a218c7998164cba29c6ebf6c8b0b9003288186d3114a629018ef2fd38173b2af extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "home.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "<ul>
    <?php foreach (\$articles as \$article) : ?>
        <?php /* @var \$article \\Jastew\\Models\\Article */ ?>
        <li>
            <article>
                <h2><a href=\"/article/<?php echo \$article->getId(); ?>\"><?php echo \$article->getName(); ?></a></h2>
            </article>
        </li>
    <?php endforeach ?>
</ul>
";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 3,  28 => 2,  11 => 1,);
    }
}
