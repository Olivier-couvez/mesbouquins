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

/* index_body.html */
class __TwigTemplate_b2abb717327256984a1cd4376023240a1922404ee7b718dd4fcc15fa2b874547 extends \Twig\Template
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
        $location = "overall_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_header.html", "index_body.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<p class=\"";
        // line 3
        echo ($context["S_CONTENT_FLOW_END"] ?? null);
        echo " responsive-center time";
        if (($context["S_USER_LOGGED_IN"] ?? null)) {
            echo " rightside";
        }
        echo "\">";
        if (($context["S_USER_LOGGED_IN"] ?? null)) {
            echo ($context["LAST_VISIT_DATE"] ?? null);
        } else {
            echo ($context["CURRENT_TIME"] ?? null);
        }
        echo "</p>
";
        // line 4
        if (($context["S_USER_LOGGED_IN"] ?? null)) {
            echo "<p class=\"responsive-center time\">";
            echo ($context["CURRENT_TIME"] ?? null);
            echo "</p>";
        }
        // line 5
        echo "
\t\t\t\t\t\t<div class=\"tpownblock_search\">
\t\t\t";
        // line 7
        // line 8
        echo "\t\t\t";
        if ((($context["S_DISPLAY_SEARCH"] ?? null) &&  !($context["S_IN_SEARCH"] ?? null))) {
            // line 9
            echo "\t\t\t<div id=\"search-box\" class=\"search-box search-header\" role=\"search\">
\t\t\t\t<form action=\"";
            // line 10
            echo ($context["U_SEARCH"] ?? null);
            echo "\" method=\"get\" id=\"search\">
\t\t\t\t<fieldset>
\t\t\t\t\t<input name=\"keywords\" id=\"keywords\" type=\"search\" maxlength=\"128\" title=\"";
            // line 12
            echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH_KEYWORDS");
            echo "\" class=\"inputbox search tiny\" size=\"20\" value=\"";
            echo ($context["SEARCH_WORDS"] ?? null);
            echo "\" placeholder=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH_MINI");
            echo "\" />
\t\t\t\t\t<button class=\"button button-search\" type=\"submit\" title=\"";
            // line 13
            echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH");
            echo "\">
\t\t\t\t\t\t<i class=\"icon fa-search fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
            // line 14
            echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH");
            echo "</span>
\t\t\t\t\t</button>
\t\t\t\t\t<a href=\"";
            // line 16
            echo ($context["U_SEARCH"] ?? null);
            echo "\" class=\"button button-search-end\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH_ADV");
            echo "\">
\t\t\t\t\t\t<i class=\"icon fa-cog fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
            // line 17
            echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH_ADV");
            echo "</span>
\t\t\t\t\t</a>
\t\t\t\t\t";
            // line 19
            echo ($context["S_SEARCH_HIDDEN_FIELDS"] ?? null);
            echo "
\t\t\t\t</fieldset>
\t\t\t\t</form>
\t\t\t</div>
\t\t\t";
        }
        // line 24
        echo "\t\t\t";
        // line 25
        echo "\t\t\t\t</div>

";
        // line 27
        // line 28
        if (($context["U_MARK_FORUMS"] ?? null)) {
            // line 29
            echo "\t<div class=\"action-bar compact\">
\t\t<a href=\"";
            // line 30
            echo ($context["U_MARK_FORUMS"] ?? null);
            echo "\" class=\"mark-read rightside\" accesskey=\"m\" data-ajax=\"mark_forums_read\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("MARK_FORUMS_READ");
            echo "</a>
\t</div>
";
        }
        // line 33
        // line 34
        echo "
";
        // line 35
        $location = "forumlist_body.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("forumlist_body.html", "index_body.html", 35)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 36
        echo "
";
        // line 37
        // line 38
        echo "
";
        // line 39
        if (( !($context["S_USER_LOGGED_IN"] ?? null) &&  !($context["S_IS_BOT"] ?? null))) {
            // line 40
            echo "\t<div class=\"forabg\">
\t\t<div class=\"inner\">
\t\t\t<form method=\"post\" action=\"";
            // line 42
            echo ($context["S_LOGIN_ACTION"] ?? null);
            echo "\" id=\"headerspace\">
\t\t\t\t<ul class=\"topiclist\">
\t\t\t\t\t<li class=\"header\">
\t\t\t\t\t\t<dl id=\"icon\">
\t\t\t\t\t\t\t<dt><a href=\"";
            // line 46
            echo ($context["U_LOGIN_LOGOUT"] ?? null);
            echo "\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("LOGIN_LOGOUT");
            echo "</a>";
            if (($context["S_REGISTER_ENABLED"] ?? null)) {
                echo "&nbsp; &bull; &nbsp;<a href=\"";
                echo ($context["U_REGISTER"] ?? null);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("REGISTER");
                echo "</a>";
            }
            echo "</dt>
\t\t\t\t\t\t\t<dd></dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t\t<ul class=\"topiclist forums\">
\t\t\t\t\t<li class=\"row login\">
\t\t\t\t\t\t<fieldset class=\"quick-login\">
\t\t\t\t\t\t\t<label for=\"username\"><span>";
            // line 54
            echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</span> <input type=\"text\" tabindex=\"1\" name=\"username\" id=\"username\" size=\"10\" class=\"inputbox\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME");
            echo "\" /></label>
\t\t\t\t\t\t\t<label for=\"password\"><span>";
            // line 55
            echo $this->extensions['phpbb\template\twig\extension']->lang("PASSWORD");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</span> <input type=\"password\" tabindex=\"2\" name=\"password\" id=\"password\" size=\"10\" class=\"inputbox\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("PASSWORD");
            echo "\" autocomplete=\"off\" /></label>
\t\t\t\t\t\t\t";
            // line 56
            if (($context["U_SEND_PASSWORD"] ?? null)) {
                // line 57
                echo "\t\t\t\t\t\t\t\t<a href=\"";
                echo ($context["U_SEND_PASSWORD"] ?? null);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("FORGOT_PASS");
                echo "</a>
\t\t\t\t\t\t\t";
            }
            // line 59
            echo "\t\t\t\t\t\t\t";
            if (($context["S_AUTOLOGIN_ENABLED"] ?? null)) {
                // line 60
                echo "\t\t\t\t\t\t\t\t<span class=\"responsive-hide\">|</span> <label for=\"autologin\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("LOG_ME_IN");
                echo " <input type=\"checkbox\" tabindex=\"4\" name=\"autologin\" id=\"autologin\" /></label>
\t\t\t\t\t\t\t";
            }
            // line 62
            echo "\t\t\t\t\t\t\t<input type=\"submit\" tabindex=\"5\" name=\"login\" value=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("LOGIN");
            echo "\" class=\"button2\" />
\t\t\t\t\t\t\t";
            // line 63
            echo ($context["S_LOGIN_REDIRECT"] ?? null);
            echo "
\t\t\t\t\t\t\t";
            // line 64
            echo ($context["S_FORM_TOKEN_LOGIN"] ?? null);
            echo "
\t\t\t\t\t\t</fieldset>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t</form>
\t\t</div>
\t</div>
";
        }
        // line 72
        echo "
";
        // line 73
        // line 74
        echo "
";
        // line 75
        if (($context["S_DISPLAY_ONLINE_LIST"] ?? null)) {
            // line 76
            echo "\t<div class=\"stat-block online-list\">
\t\t";
            // line 77
            if (($context["U_VIEWONLINE"] ?? null)) {
                echo "<h3><a href=\"";
                echo ($context["U_VIEWONLINE"] ?? null);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("WHO_IS_ONLINE");
                echo "</a></h3>";
            } else {
                echo "<h3>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("WHO_IS_ONLINE");
                echo "</h3>";
            }
            // line 78
            echo "\t\t<p>
\t\t\t";
            // line 79
            // line 80
            echo "\t\t\t";
            echo ($context["TOTAL_USERS_ONLINE"] ?? null);
            echo " (";
            echo $this->extensions['phpbb\template\twig\extension']->lang("ONLINE_EXPLAIN");
            echo ")<br />";
            echo ($context["RECORD_USERS"] ?? null);
            echo "<br /> 
\t\t\t";
            // line 81
            if (($context["U_VIEWONLINE"] ?? null)) {
                // line 82
                echo "\t\t\t\t<br />";
                echo ($context["LOGGED_IN_USER_LIST"] ?? null);
                echo "
\t\t\t\t";
                // line 83
                if (($context["LEGEND"] ?? null)) {
                    echo "<br /><em>";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("LEGEND");
                    echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                    echo " ";
                    echo ($context["LEGEND"] ?? null);
                    echo "</em>";
                }
                // line 84
                echo "\t\t\t";
            }
            // line 85
            echo "\t\t\t";
            // line 86
            echo "\t\t</p>
\t</div>
";
        }
        // line 89
        echo "
";
        // line 90
        // line 91
        echo "
";
        // line 92
        if (($context["S_DISPLAY_BIRTHDAY_LIST"] ?? null)) {
            // line 93
            echo "\t<div class=\"stat-block birthday-list\">
\t\t<h3>";
            // line 94
            echo $this->extensions['phpbb\template\twig\extension']->lang("BIRTHDAYS");
            echo "</h3>
\t\t<p>
\t\t\t";
            // line 96
            // line 97
            echo "\t\t\t";
            if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "birthdays", [], "any", false, false, false, 97))) {
                echo $this->extensions['phpbb\template\twig\extension']->lang("CONGRATULATIONS");
                echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                echo " <strong>";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "birthdays", [], "any", false, false, false, 97));
                foreach ($context['_seq'] as $context["_key"] => $context["birthdays"]) {
                    echo twig_get_attribute($this->env, $this->source, $context["birthdays"], "USERNAME", [], "any", false, false, false, 97);
                    if ((twig_get_attribute($this->env, $this->source, $context["birthdays"], "AGE", [], "any", false, false, false, 97) !== "")) {
                        echo " (";
                        echo twig_get_attribute($this->env, $this->source, $context["birthdays"], "AGE", [], "any", false, false, false, 97);
                        echo ")";
                    }
                    if ( !twig_get_attribute($this->env, $this->source, $context["birthdays"], "S_LAST_ROW", [], "any", false, false, false, 97)) {
                        echo ", ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['birthdays'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo "</strong>";
            } else {
                echo $this->extensions['phpbb\template\twig\extension']->lang("NO_BIRTHDAYS");
            }
            // line 98
            echo "\t\t\t";
            // line 99
            echo "\t\t</p>
\t</div>
";
        }
        // line 102
        echo "
";
        // line 103
        if (($context["NEWEST_USER"] ?? null)) {
            // line 104
            echo "\t<div class=\"stat-block statistics\">
\t\t<h3>";
            // line 105
            echo $this->extensions['phpbb\template\twig\extension']->lang("STATISTICS");
            echo "</h3>
\t\t<p>
\t\t\t";
            // line 107
            // line 108
            echo "\t\t\t";
            echo ($context["TOTAL_POSTS"] ?? null);
            echo " &bull; ";
            echo ($context["TOTAL_TOPICS"] ?? null);
            echo " &bull; ";
            echo ($context["TOTAL_USERS"] ?? null);
            echo " &bull; ";
            echo ($context["NEWEST_USER"] ?? null);
            echo "
\t\t\t";
            // line 109
            // line 110
            echo "\t\t</p>
\t</div>
";
        }
        // line 113
        echo "
";
        // line 114
        // line 115
        echo "
";
        // line 116
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "index_body.html", 116)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "index_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  406 => 116,  403 => 115,  402 => 114,  399 => 113,  394 => 110,  393 => 109,  382 => 108,  381 => 107,  376 => 105,  373 => 104,  371 => 103,  368 => 102,  363 => 99,  361 => 98,  335 => 97,  334 => 96,  329 => 94,  326 => 93,  324 => 92,  321 => 91,  320 => 90,  317 => 89,  312 => 86,  310 => 85,  307 => 84,  298 => 83,  293 => 82,  291 => 81,  282 => 80,  281 => 79,  278 => 78,  266 => 77,  263 => 76,  261 => 75,  258 => 74,  257 => 73,  254 => 72,  243 => 64,  239 => 63,  234 => 62,  228 => 60,  225 => 59,  217 => 57,  215 => 56,  208 => 55,  201 => 54,  180 => 46,  173 => 42,  169 => 40,  167 => 39,  164 => 38,  163 => 37,  160 => 36,  148 => 35,  145 => 34,  144 => 33,  136 => 30,  133 => 29,  131 => 28,  130 => 27,  126 => 25,  124 => 24,  116 => 19,  111 => 17,  105 => 16,  100 => 14,  96 => 13,  88 => 12,  83 => 10,  80 => 9,  77 => 8,  76 => 7,  72 => 5,  66 => 4,  52 => 3,  49 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index_body.html", "");
    }
}
