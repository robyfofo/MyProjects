<?php

/* nopassword.tpl.php */
class __TwigTemplate_3520d7b1a3769288898bd37284d5907e42aeeb21659de3860200385794967ff3 extends Twig_Template
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
        echo "<!-- adin/site-core/nopasssword.tpl.php v.3.0.0. 04/11/2016 -->
<div class=\"row\">
\t<div class=\"col-md-4 col-md-offset-4\">
\t\t<div class=\"login-panel panel panel-default\">
\t\t\t<div class=\"panel-heading\">
\t\t\t\t<h3 class=\"panel-title\">";
        // line 6
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "nopassword core - intro", array(), "array");
        echo "</h3>
\t\t\t</div>
\t\t\t<div class=\"panel-body\">
\t\t\t\t<form id=\"applicationForm\" class=\"form-signin\" role=\"form\" action=\"";
        // line 9
        echo ($context["URLSITE"] ?? null);
        echo "nopassword\" method=\"post\">
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<input required class=\"form-control\" placeholder=\"";
        // line 12
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "nome utente", array(), "array"));
        echo "\" name=\"username\" type=\"text\" autocomplete=\"off\">
\t\t\t\t\t\t</div>\t\t\t\t\t\t\t
\t\t\t\t\t\t<!-- Change this to a button or input when using this as a form -->
\t\t\t\t\t\t<input type=\"hidden\" name=\"method\" value=\"check\" />
\t\t\t\t\t\t<input type=\"submit\" name=\"submit\" value=\"";
        // line 16
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "invia", array(), "array"));
        echo " ";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "email", array(), "array");
        echo "\" class=\"btn btn-lg btn-success btn-block\">
\t\t\t\t\t</fieldset>
\t\t\t\t</form>\t\t\t\t\t
\t\t\t</div>
\t\t\t<div class=\"panel-footer\">
\t\t\t\t\t<p>Dopo aver compilato correttamente i campi il sistema genererà una password casuale che vi sarà inviata nella email indicata nel profilo.<br>
Se dopo la fine delle procedura non riceverete l'email controllate che essa non sia nel filtro antispan (se presente) oppure contattare l'amministratore.";
        // line 22
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "nopassword core - testo", array(), "array");
        echo "</p> 
\t\t\t</div>
\t\t</div>
\t\t<div class=\"panel panel-default\">
\t\t\t<div class=\"panel-body\">
\t\t\t\t<p>";
        // line 27
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "torna alla pagina", array(), "array"));
        echo " <a href=\"";
        echo ($context["URLSITE"] ?? null);
        echo "\" title=\"";
        echo twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "torna alla pagina %PAGE%", array(), "array"), array("%PAGE%" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "loggati", array(), "array"))));
        echo "\">";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "loggati", array(), "array"));
        echo "</a></p>
\t\t\t</div>\t\t\t
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "nopassword.tpl.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 27,  56 => 22,  45 => 16,  38 => 12,  32 => 9,  26 => 6,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- adin/site-core/nopasssword.tpl.php v.3.0.0. 04/11/2016 -->
<div class=\"row\">
\t<div class=\"col-md-4 col-md-offset-4\">
\t\t<div class=\"login-panel panel panel-default\">
\t\t\t<div class=\"panel-heading\">
\t\t\t\t<h3 class=\"panel-title\">{{ App.lang['nopassword core - intro'] }}</h3>
\t\t\t</div>
\t\t\t<div class=\"panel-body\">
\t\t\t\t<form id=\"applicationForm\" class=\"form-signin\" role=\"form\" action=\"{{ URLSITE }}nopassword\" method=\"post\">
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<input required class=\"form-control\" placeholder=\"{{ App.lang['nome utente']|capitalize }}\" name=\"username\" type=\"text\" autocomplete=\"off\">
\t\t\t\t\t\t</div>\t\t\t\t\t\t\t
\t\t\t\t\t\t<!-- Change this to a button or input when using this as a form -->
\t\t\t\t\t\t<input type=\"hidden\" name=\"method\" value=\"check\" />
\t\t\t\t\t\t<input type=\"submit\" name=\"submit\" value=\"{{ App.lang['invia']|capitalize }} {{ App.lang['email']}}\" class=\"btn btn-lg btn-success btn-block\">
\t\t\t\t\t</fieldset>
\t\t\t\t</form>\t\t\t\t\t
\t\t\t</div>
\t\t\t<div class=\"panel-footer\">
\t\t\t\t\t<p>Dopo aver compilato correttamente i campi il sistema genererà una password casuale che vi sarà inviata nella email indicata nel profilo.<br>
Se dopo la fine delle procedura non riceverete l'email controllate che essa non sia nel filtro antispan (se presente) oppure contattare l'amministratore.{{ App.lang['nopassword core - testo']|raw }}</p> 
\t\t\t</div>
\t\t</div>
\t\t<div class=\"panel panel-default\">
\t\t\t<div class=\"panel-body\">
\t\t\t\t<p>{{ App.lang['torna alla pagina']|capitalize }} <a href=\"{{ URLSITE }}\" title=\"{{ App.lang['torna alla pagina %PAGE%']|replace({'%PAGE%': App.lang['loggati']})|capitalize }}\">{{ App.lang['loggati']|capitalize }}</a></p>
\t\t\t</div>\t\t\t
\t\t</div>
\t</div>
</div>", "nopassword.tpl.php", "/var/www/html/myprojects/application/site-core/templates/default/nopassword.tpl.php");
    }
}
