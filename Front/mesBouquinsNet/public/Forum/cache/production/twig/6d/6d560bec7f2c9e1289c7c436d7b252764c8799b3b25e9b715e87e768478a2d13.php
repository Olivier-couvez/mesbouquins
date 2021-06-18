<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* navbar_footer.html */
class __TwigTemplate_4feead93ee36f2b44da17864230458e1ba2adc2709f5cc946e98119d79e10818 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"nav-footer_border\">
\t<div class=\"navbar\" role=\"navigation\">
\t\t<div class=\"inner\">

\t\t<ul id=\"nav-footer\" class=\"nav-footer linklist\" role=\"menubar\">
\t\t\t<li class=\"breadcrumbs\">
\t\t\t\t";
        // line 7
        if (($context["U_SITE_HOME"] ?? null)) {
            // line 8
            echo "\t\t\t\t\t";
            ob_start(function () { return ''; });
            // line 9
            echo "\t\t\t\t\t<span class=\"crumb\">
\t\t\t\t\t\t<a href=\"";
            // line 10
            echo ($context["U_SITE_HOME"] ?? null);
            echo "\" data-navbar-reference=\"home\">
\t\t\t\t\t\t\t<i class=\"icon fa-home fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 11
            echo $this->extensions['phpbb\template\twig\extension']->lang("SITE_HOME");
            echo "</span>
\t\t\t\t\t\t</a>
\t\t\t\t\t</span>
\t\t\t\t\t";
            $___internal_36c3b1d526531ce452758b88d6fb0667aa7ecd45b03f5e3d42d6b8cbd93f4d89_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 8
            echo twig_spaceless($___internal_36c3b1d526531ce452758b88d6fb0667aa7ecd45b03f5e3d42d6b8cbd93f4d89_);
            // line 15
            echo "\t\t\t\t";
        }
        // line 16
        echo "\t\t\t\t";
        // line 17
        echo "\t\t\t\t";
        ob_start(function () { return ''; });
        // line 18
        echo "\t\t\t\t<span class=\"crumb\">
\t\t\t\t\t<a href=\"";
        // line 19
        echo ($context["U_INDEX"] ?? null);
        echo "\" data-navbar-reference=\"index\">
\t\t\t\t\t\t";
        // line 20
        if ( !($context["U_SITE_HOME"] ?? null)) {
            echo "<i class=\"icon fa-home fa-fw\" aria-hidden=\"true\"></i>";
        }
        echo "<span>";
        echo $this->extensions['phpbb\template\twig\extension']->lang("INDEX");
        echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</span>
\t\t\t\t";
        $___internal_11d8debf45a851115d7d67bf262e63bfb6ba4662d3c2e7197cfa3823e97173c0_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 17
        echo twig_spaceless($___internal_11d8debf45a851115d7d67bf262e63bfb6ba4662d3c2e7197cfa3823e97173c0_);
        // line 24
        echo "\t\t\t\t";
        // line 25
        echo "\t\t\t</li>
\t\t\t";
        // line 26
        if ((($context["U_WATCH_FORUM_LINK"] ?? null) &&  !($context["S_IS_BOT"] ?? null))) {
            // line 27
            echo "\t\t\t\t<li data-last-responsive=\"true\">
\t\t\t\t\t<a href=\"";
            // line 28
            echo ($context["U_WATCH_FORUM_LINK"] ?? null);
            echo "\" title=\"";
            echo ($context["S_WATCH_FORUM_TITLE"] ?? null);
            echo "\" data-ajax=\"toggle_link\" data-toggle-class=\"icon ";
            if (($context["S_WATCHING_FORUM"] ?? null)) {
                echo "fa-check-square-o";
            } else {
                echo "fa-square-o";
            }
            echo " fa-fw\" data-toggle-text=\"";
            echo ($context["S_WATCH_FORUM_TOGGLE"] ?? null);
            echo "\" data-toggle-url=\"";
            echo ($context["U_WATCH_FORUM_TOGGLE"] ?? null);
            echo "\">
\t\t\t\t\t\t<i class=\"icon ";
            // line 29
            if (($context["S_WATCHING_FORUM"] ?? null)) {
                echo "fa-square-o";
            } else {
                echo "fa-check-square-o";
            }
            echo " fa-fw\" aria-hidden=\"true\"></i><span>";
            echo ($context["S_WATCH_FORUM_TITLE"] ?? null);
            echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 33
        echo "\t\t\t";
        // line 34
        echo "
\t\t\t";
        // line 35
        // line 36
        echo "\t\t\t";
        if ( !($context["S_IS_BOT"] ?? null)) {
            // line 37
            echo "\t\t\t\t<li class=\"rightside\">
\t\t\t\t\t<a href=\"";
            // line 38
            echo ($context["U_DELETE_COOKIES"] ?? null);
            echo "\" data-ajax=\"true\" data-refresh=\"true\" role=\"menuitem\">
\t\t\t\t\t\t<i class=\"icon fa-trash fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 39
            echo $this->extensions['phpbb\template\twig\extension']->lang("DELETE_COOKIES");
            echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t";
            // line 42
            if (($context["S_DISPLAY_MEMBERLIST"] ?? null)) {
                // line 43
                echo "\t\t\t\t\t<li class=\"rightside\" data-last-responsive=\"true\">
\t\t\t\t\t\t<a href=\"";
                // line 44
                echo ($context["U_MEMBERLIST"] ?? null);
                echo "\" title=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("MEMBERLIST_EXPLAIN");
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t<i class=\"icon fa-group fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 45
                echo $this->extensions['phpbb\template\twig\extension']->lang("MEMBERLIST");
                echo "</span>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t";
            }
            // line 49
            echo "\t\t\t";
        }
        // line 50
        echo "\t\t\t";
        // line 51
        echo "\t\t\t";
        if (($context["U_TEAM"] ?? null)) {
            // line 52
            echo "\t\t\t\t<li class=\"rightside\" data-last-responsive=\"true\">
\t\t\t\t\t<a href=\"";
            // line 53
            echo ($context["U_TEAM"] ?? null);
            echo "\" role=\"menuitem\">
\t\t\t\t\t\t<i class=\"icon fa-shield fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 54
            echo $this->extensions['phpbb\template\twig\extension']->lang("THE_TEAM");
            echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 58
        echo "\t\t\t";
        // line 59
        echo "\t\t\t";
        if (($context["U_CONTACT_US"] ?? null)) {
            // line 60
            echo "\t\t\t\t<li class=\"rightside\" data-last-responsive=\"true\">
\t\t\t\t\t<a href=\"";
            // line 61
            echo ($context["U_CONTACT_US"] ?? null);
            echo "\" role=\"menuitem\">
\t\t\t\t\t\t<i class=\"icon fa-envelope fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 62
            echo $this->extensions['phpbb\template\twig\extension']->lang("CONTACT_US");
            echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 66
        echo "\t\t</ul>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "navbar_footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  214 => 66,  207 => 62,  203 => 61,  200 => 60,  197 => 59,  195 => 58,  188 => 54,  184 => 53,  181 => 52,  178 => 51,  176 => 50,  173 => 49,  166 => 45,  160 => 44,  157 => 43,  155 => 42,  149 => 39,  145 => 38,  142 => 37,  139 => 36,  138 => 35,  135 => 34,  133 => 33,  120 => 29,  104 => 28,  101 => 27,  99 => 26,  96 => 25,  94 => 24,  92 => 17,  81 => 20,  77 => 19,  74 => 18,  71 => 17,  69 => 16,  66 => 15,  64 => 8,  57 => 11,  53 => 10,  50 => 9,  47 => 8,  45 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "navbar_footer.html", "");
    }
}
