<?php

/* password.tpl.php */
class __TwigTemplate_cb4c98a6a84c363e5e7eadc1c7befcfa0cb73f58eee691d7b654bfb2f8f349c0 extends Twig_Template
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
        echo "<!-- admin/site-core/password.tpl.php v.1.0.0. 14/02/2017 -->

<div class=\"row\">
\t<div class=\"col-md-12\">
\t\t<ul class=\"nav nav-tabs\">
\t\t\t<li class=\"active\"><a href=\"#datibase-tab\" data-toggle=\"tab\">Dati Base <i class=\"fa\"></i></a></li>
  \t\t</ul>
\t\t<form id=\"applicationForm\" class=\"form-horizontal\" role=\"form\" action=\"";
        // line 8
        echo ($context["URLSITE"] ?? null);
        echo "password/NULL\"  enctype=\"multipart/form-data\" method=\"post\">
\t\t\t<div class=\"tab-content\">
<!-- sezione dati base --> \t
\t\t\t\t<div class=\"tab-pane active\" id=\"datibase-tab\">\t
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"nameID\" class=\"col-md-3 control-label\">";
        // line 14
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "username", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"username\" class=\"form-control\" id=\"usernameID\" placeholder=\"";
        // line 16
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci un username", array(), "array"));
        echo "\" value=\"";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "username", array());
        echo "\" readonly>
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>\t\t\t
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"passwordID\" class=\"col-md-3 control-label\">";
        // line 20
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "password", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t<input required type=\"password\" required name=\"password\" class=\"form-control\" id=\"passwordID\" placeholder=\"";
        // line 22
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci una password", array(), "array"));
        echo "\"  value=\"\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>\t\t\t\t
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"passwordCKID\" class=\"col-md-3 control-label\">";
        // line 26
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "password di controllo", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t<input required type=\"password\" required name=\"passwordCK\" class=\"form-control\" id=\"passwordCKID\" placeholder=\"";
        // line 28
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci una password di controllo", array(), "array"));
        echo "\"  value=\"\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</fieldset>
\t\t\t\t</div>
<!-- sezione dati base -->\t\t\t\t\t
\t\t\t</div>
<!--/Tab panes -->\t\t\t
\t\t  <div class=\"form-group\">
\t\t    <div class=\"col-md-offset-3 col-md-9\">
\t\t    \t<input type=\"hidden\" name=\"id\" value=\"";
        // line 38
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "id", array());
        echo "\">
\t\t    \t<input type=\"hidden\" name=\"method\" value=\"update\">
\t\t      <button type=\"submit\" class=\"btn btn-primary\">";
        // line 40
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "invia", array(), "array"));
        echo "</button>
\t\t    </div>
\t\t  </div>
\t\t</form>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "password.tpl.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 40,  81 => 38,  68 => 28,  63 => 26,  56 => 22,  51 => 20,  42 => 16,  37 => 14,  28 => 8,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- admin/site-core/password.tpl.php v.1.0.0. 14/02/2017 -->

<div class=\"row\">
\t<div class=\"col-md-12\">
\t\t<ul class=\"nav nav-tabs\">
\t\t\t<li class=\"active\"><a href=\"#datibase-tab\" data-toggle=\"tab\">Dati Base <i class=\"fa\"></i></a></li>
  \t\t</ul>
\t\t<form id=\"applicationForm\" class=\"form-horizontal\" role=\"form\" action=\"{{ URLSITE }}password/NULL\"  enctype=\"multipart/form-data\" method=\"post\">
\t\t\t<div class=\"tab-content\">
<!-- sezione dati base --> \t
\t\t\t\t<div class=\"tab-pane active\" id=\"datibase-tab\">\t
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"nameID\" class=\"col-md-3 control-label\">{{ App.lang['username']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"username\" class=\"form-control\" id=\"usernameID\" placeholder=\"{{ App.lang['inserisci un username']|capitalize }}\" value=\"{{ App.item.username }}\" readonly>
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>\t\t\t
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"passwordID\" class=\"col-md-3 control-label\">{{ App.lang['password']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t<input required type=\"password\" required name=\"password\" class=\"form-control\" id=\"passwordID\" placeholder=\"{{ App.lang['inserisci una password']|capitalize }}\"  value=\"\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>\t\t\t\t
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"passwordCKID\" class=\"col-md-3 control-label\">{{ App.lang['password di controllo']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t<input required type=\"password\" required name=\"passwordCK\" class=\"form-control\" id=\"passwordCKID\" placeholder=\"{{ App.lang['inserisci una password di controllo']|capitalize }}\"  value=\"\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</fieldset>
\t\t\t\t</div>
<!-- sezione dati base -->\t\t\t\t\t
\t\t\t</div>
<!--/Tab panes -->\t\t\t
\t\t  <div class=\"form-group\">
\t\t    <div class=\"col-md-offset-3 col-md-9\">
\t\t    \t<input type=\"hidden\" name=\"id\" value=\"{{ App.id }}\">
\t\t    \t<input type=\"hidden\" name=\"method\" value=\"update\">
\t\t      <button type=\"submit\" class=\"btn btn-primary\">{{ App.lang['invia']|capitalize }}</button>
\t\t    </div>
\t\t  </div>
\t\t</form>
\t</div>
</div>", "password.tpl.php", "/var/www/html/myprojects/application/site-core/templates/default/password.tpl.php");
    }
}
