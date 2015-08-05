<?php

/* layout.twig */
class __TwigTemplate_63987b4f07e9cd80021f26a297a26a2973c82cd038a5087e2bac35f54f7e8c74 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>
<body>

    <nav>
        <ul>
            <?php foreach (\$categories as \$category) : ?>
            <?php /* @var \$category \\Jastew\\Models\\Category */ ?>
            <li>
                <a href=\"/category/<?php echo \$category->getId(); ?>\"><?php echo \$category->getName(); ?></a>
            </li>
            <?php endforeach ?>
        </ul>
    </nav>

    <main>
        ";
        // line 21
        $this->displayBlock('content', $context, $blocks);
        // line 24
        echo "    </main>

</body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Home";
    }

    // line 21
    public function block_content($context, array $blocks = array())
    {
        // line 22
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function getDebugInfo()
    {
        return array (  64 => 22,  61 => 21,  55 => 5,  48 => 24,  46 => 21,  27 => 5,  21 => 1,);
    }
}
