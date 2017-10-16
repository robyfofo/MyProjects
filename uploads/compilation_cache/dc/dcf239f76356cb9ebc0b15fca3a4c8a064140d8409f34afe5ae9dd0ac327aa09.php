<?php

/* login.tpl.php */
class __TwigTemplate_4954258da11879914f1fec1a7f6fbbd18ebd5a188eaeae14a5eadde9fcaae7bf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!-- admin/site-core/login.tpl.php v.1.0.0. 14/02/2017 -->
<div class=\"row\">
\t<div class=\"col-md-4 col-md-offset-4\">
\t\t<div class=\"login-panel panel panel-default\">
\t\t\t<div class=\"panel-heading\">
\t\t\t\t<h3 class=\"panel-title\">";
        // line 6
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci username e password", array(), "array"));
        echo "</h3>
\t\t\t</div>
\t\t\t<div class=\"panel-body\">
\t\t\t\t<form id=\"no-applicationForm\" class=\"form-signin\" role=\"form\" action=\"";
        // line 9
        echo ($context["URLSITE"] ?? null);
        echo "login\" method=\"post\" autocomplete=\"off\">
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<input required class=\"form-control\" placeholder=\"Username\" name=\"username\" type=\"text\" autocomplete=\"off\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<input required class=\"form-control\" placeholder=\"Password\" name=\"password\" type=\"password\" value=\"\" autocomplete=\"off\">
\t\t\t\t\t\t</div>\t\t\t\t\t\t
\t\t\t\t\t\t<!-- Change this to a button or input when using this as a form -->
\t\t\t\t\t\t<input type=\"hidden\" name=\"method\" value=\"check\" />
\t\t\t\t\t\t<input type=\"submit\" name=\"submit\" value=\"";
        // line 19
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "loggati", array(), "array"));
        echo "\" class=\"btn btn-lg btn-success btn-block\">
\t\t\t\t\t</fieldset>
\t\t\t\t</form>\t\t\t\t\t
\t\t\t</div>
\t\t\t<div class=\"panel-footer\">
\t\t\t\t\t<a href=\"";
        // line 24
        echo ($context["URLSITE"] ?? null);
        echo "nousername\" title=\"";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "clicca per recuperare lo username", array(), "array"));
        echo "\">";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "username", array(), "array"));
        echo "</a> o <a href=\"";
        echo ($context["URLSITE"] ?? null);
        echo "nopassword\" title=\"";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "clicca per recuperare la password", array(), "array"));
        echo "\">";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "password", array(), "array"));
        echo "</a> ";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "dimenticati", array(), "array");
        echo "
\t\t\t</div>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "login.tpl.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 24,  45 => 19,  32 => 9,  26 => 6,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- admin/site-core/login.tpl.php v.1.0.0. 14/02/2017 -->
<div class=\"row\">
\t<div class=\"col-md-4 col-md-offset-4\">
\t\t<div class=\"login-panel panel panel-default\">
\t\t\t<div class=\"panel-heading\">
\t\t\t\t<h3 class=\"panel-title\">{{ App.lang['inserisci username e password']|capitalize }}</h3>
\t\t\t</div>
\t\t\t<div class=\"panel-body\">
\t\t\t\t<form id=\"no-applicationForm\" class=\"form-signin\" role=\"form\" action=\"{{ URLSITE }}login\" method=\"post\" autocomplete=\"off\">
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<input required class=\"form-control\" placeholder=\"Username\" name=\"username\" type=\"text\" autocomplete=\"off\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<input required class=\"form-control\" placeholder=\"Password\" name=\"password\" type=\"password\" value=\"\" autocomplete=\"off\">
\t\t\t\t\t\t</div>\t\t\t\t\t\t
\t\t\t\t\t\t<!-- Change this to a button or input when using this as a form -->
\t\t\t\t\t\t<input type=\"hidden\" name=\"method\" value=\"check\" />
\t\t\t\t\t\t<input type=\"submit\" name=\"submit\" value=\"{{ App.lang['loggati']|capitalize }}\" class=\"btn btn-lg btn-success btn-block\">
\t\t\t\t\t</fieldset>
\t\t\t\t</form>\t\t\t\t\t
\t\t\t</div>
\t\t\t<div class=\"panel-footer\">
\t\t\t\t\t<a href=\"{{ URLSITE }}nousername\" title=\"{{ App.lang['clicca per recuperare lo username']|capitalize }}\">{{ App.lang['username']|capitalize }}</a> o <a href=\"{{ URLSITE }}nopassword\" title=\"{{ App.lang['clicca per recuperare la password']|capitalize }}\">{{ App.lang['password']|capitalize }}</a> {{ App.lang['dimenticati'] }}
\t\t\t</div>
\t\t</div>
\t</div>
</div>", "login.tpl.php", "/var/www/html/myprojects/application/site-core/templates/default/login.tpl.php");
    }
}
