<?php

/* profile.tpl.php */
class __TwigTemplate_caf51ee73fa9a654efb879ad671f29a8b99f59395f1aae334689496a88e9f587 extends Twig_Template
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
        echo "<!-- admin/site-core/profile.tpl.php v.3.0.0. 04/11/2016 -->
<div class=\"row\">
\t<div class=\"col-md-12\">
\t\t<ul class=\"nav nav-tabs\">
\t\t\t<li class=\"active\"><a href=\"#datibase-tab\" data-toggle=\"tab\">";
        // line 5
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "dati base", array(), "array"));
        echo " <i class=\"fa\"></i></a></li>
  \t\t</ul>
\t\t<form id=\"applicationForm\" class=\"form-horizontal\" role=\"form\" action=\"";
        // line 7
        echo ($context["URLSITE"] ?? null);
        echo "profile/NULL\"  enctype=\"multipart/form-data\" method=\"post\">
\t\t\t<div class=\"tab-content\">
<!-- sezione dati base --> \t
\t\t\t\t<div class=\"tab-pane active\" id=\"datibase-tab\">\t
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"nameID\" class=\"col-md-3 control-label\">";
        // line 13
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "nome", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input required type=\"text\" name=\"name\" class=\"form-control\" id=\"nameID\" placeholder=\"";
        // line 15
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci un nome", array(), "array");
        echo "\" value=\"";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "name", array());
        echo "\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"surnameID\" class=\"col-md-3 control-label\">";
        // line 19
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "cognome", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"surname\" class=\"form-control\" id=\"surnameID\" placeholder=\"";
        // line 21
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci un cognome", array(), "array");
        echo "\" value=\"";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "surname", array());
        echo "\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</fieldset>\t\t\t
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"streetID\" class=\"col-md-3 control-label\">";
        // line 27
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "via", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"street\" class=\"form-control\" id=\"streetID\" placeholder=\"";
        // line 29
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci un indirizzo", array(), "array");
        echo "\" value=\"";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "street", array());
        echo "\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>\t\t
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"cityID\" class=\"col-md-3 control-label\">";
        // line 33
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "città", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"city\" class=\"form-control\" id=\"cityID\" placeholder=\"";
        // line 35
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci una città", array(), "array");
        echo "\" value=\"";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "city", array());
        echo "\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"zip_codeID\" class=\"col-md-3 control-label\">";
        // line 39
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "cap", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"zip_code\" class=\"form-control\" id=\"zip_codeID\" placeholder=\"";
        // line 41
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci un cap", array(), "array");
        echo "\" value=\"";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "zip_code", array());
        echo "\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"provinceID\" class=\"col-md-3 control-label\">";
        // line 45
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "provincia", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"province\" class=\"form-control\" id=\"provinceID\" placeholder=\"";
        // line 47
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci una provincia", array(), "array");
        echo "\" value=\"";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "province", array());
        echo "\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"provinceID\" class=\"col-md-3 control-label\">";
        // line 51
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "stato", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"state\" class=\"form-control\" id=\"stateID\" placeholder=\"";
        // line 53
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci uno stato", array(), "array");
        echo "\" value=\"";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "state", array());
        echo "\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</fieldset>\t\t\t\t\t
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"emailID\" class=\"col-md-3 control-label\">";
        // line 59
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "email", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"email\" name=\"email\" class=\"form-control\" id=\"emailID\" placeholder=\"";
        // line 61
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci un indirizzo email", array(), "array");
        echo "\"  value=\"";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "email", array());
        echo "\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"telephoneID\" class=\"col-md-3 control-label\">";
        // line 65
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "telefono", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"telephone\" class=\"form-control\" id=\"telephoneID\" placeholder=\"";
        // line 67
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci un numero di telefono", array(), "array");
        echo "\"  value=\"";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "telephone", array());
        echo "\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"mobileID\" class=\"col-md-3 control-label\">";
        // line 71
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "cellulare", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"mobile\" class=\"form-control\" id=\"mobileID\" placeholder=\"";
        // line 73
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci un numero di cellulare", array(), "array");
        echo "\"  value=\"";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "mobile", array());
        echo "\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"emailID\" class=\"col-md-3 control-label\">";
        // line 77
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "fax", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"fax\" class=\"form-control\" id=\"faxID\" placeholder=\"";
        // line 79
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci un numero di fax", array(), "array");
        echo "\"  value=\"";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "fax", array());
        echo "\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"skypeID\" class=\"col-md-3 control-label\">";
        // line 83
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "skype", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"skype\" class=\"form-control\" id=\"skypeID\" placeholder=\"";
        // line 85
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci un username skype", array(), "array");
        echo "\"  value=\"";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "skype", array());
        echo "\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</fieldset>\t\t\t\t\t
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"avatarID\" class=\"col-md-3 control-label\">";
        // line 91
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "avatar", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-3\">\t\t\t\t
\t\t\t\t\t\t\t\t<input type=\"file\" name=\"avatar\">\t\t\t\t
\t\t\t\t\t    \t</div>
\t\t\t\t\t    \t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t";
        // line 96
        if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array(), "any", false, true), "avatar", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "avatar", array()) != ""))) {
            echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<img src=\"";
            // line 97
            echo ($context["URLSITE"] ?? null);
            echo "profile/renderAvatarDB/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "id", array());
            echo "\" alt=\"\" style=\"max-height: 110px;\">\t\t\t\t\t
\t\t\t\t            ";
        }
        // line 99
        echo "\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"templateID\" class=\"col-md-3 control-label\">";
        // line 102
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "template", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t";
        // line 104
        if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templatesAvaiable", array()))) {
            // line 105
            echo "\t\t\t\t\t\t\t\t<select name=\"template\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t";
            // line 106
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templatesAvaiable", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 107
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo $context["value"];
                echo "\"";
                if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array(), "any", false, true), "template", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "template", array()) == $context["value"]))) {
                    echo " selected=\"selected\" ";
                }
                echo ">";
                echo $context["value"];
                echo "</option>\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 109
            echo "\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t";
        }
        // line 110
        echo "\t\t\t
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>\t
\t\t\t\t\t</fieldset>
\t\t\t\t</div>
<!-- sezione dati base -->\t\t\t\t\t
\t\t\t</div>
<!--/Tab panes -->\t\t\t
\t\t\t<hr>
\t\t\t<div class=\"form-group\">
\t\t\t\t<div class=\"col-md-offset-3 col-md-9\">
\t\t\t\t<input type=\"hidden\" name=\"id\" value=\"";
        // line 121
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "id", array());
        echo "\">
\t\t\t\t<input type=\"hidden\" name=\"method\" value=\"update\">
\t\t\t\t<button type=\"submit\" class=\"btn btn-primary\">";
        // line 123
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "invia", array(), "array"));
        echo "</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "profile.tpl.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  288 => 123,  283 => 121,  270 => 110,  266 => 109,  251 => 107,  247 => 106,  244 => 105,  242 => 104,  237 => 102,  232 => 99,  225 => 97,  221 => 96,  213 => 91,  202 => 85,  197 => 83,  188 => 79,  183 => 77,  174 => 73,  169 => 71,  160 => 67,  155 => 65,  146 => 61,  141 => 59,  130 => 53,  125 => 51,  116 => 47,  111 => 45,  102 => 41,  97 => 39,  88 => 35,  83 => 33,  74 => 29,  69 => 27,  58 => 21,  53 => 19,  44 => 15,  39 => 13,  30 => 7,  25 => 5,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- admin/site-core/profile.tpl.php v.3.0.0. 04/11/2016 -->
<div class=\"row\">
\t<div class=\"col-md-12\">
\t\t<ul class=\"nav nav-tabs\">
\t\t\t<li class=\"active\"><a href=\"#datibase-tab\" data-toggle=\"tab\">{{ App.lang['dati base']|capitalize }} <i class=\"fa\"></i></a></li>
  \t\t</ul>
\t\t<form id=\"applicationForm\" class=\"form-horizontal\" role=\"form\" action=\"{{ URLSITE }}profile/NULL\"  enctype=\"multipart/form-data\" method=\"post\">
\t\t\t<div class=\"tab-content\">
<!-- sezione dati base --> \t
\t\t\t\t<div class=\"tab-pane active\" id=\"datibase-tab\">\t
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"nameID\" class=\"col-md-3 control-label\">{{ App.lang['nome']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input required type=\"text\" name=\"name\" class=\"form-control\" id=\"nameID\" placeholder=\"{{ App.lang['inserisci un nome'] }}\" value=\"{{ App.item.name }}\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"surnameID\" class=\"col-md-3 control-label\">{{ App.lang['cognome']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"surname\" class=\"form-control\" id=\"surnameID\" placeholder=\"{{ App.lang['inserisci un cognome'] }}\" value=\"{{ App.item.surname }}\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</fieldset>\t\t\t
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"streetID\" class=\"col-md-3 control-label\">{{ App.lang['via']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"street\" class=\"form-control\" id=\"streetID\" placeholder=\"{{ App.lang['inserisci un indirizzo'] }}\" value=\"{{ App.item.street }}\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>\t\t
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"cityID\" class=\"col-md-3 control-label\">{{ App.lang['città']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"city\" class=\"form-control\" id=\"cityID\" placeholder=\"{{ App.lang['inserisci una città'] }}\" value=\"{{ App.item.city }}\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"zip_codeID\" class=\"col-md-3 control-label\">{{ App.lang['cap']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"zip_code\" class=\"form-control\" id=\"zip_codeID\" placeholder=\"{{ App.lang['inserisci un cap'] }}\" value=\"{{ App.item.zip_code }}\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"provinceID\" class=\"col-md-3 control-label\">{{ App.lang['provincia']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"province\" class=\"form-control\" id=\"provinceID\" placeholder=\"{{ App.lang['inserisci una provincia'] }}\" value=\"{{ App.item.province }}\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"provinceID\" class=\"col-md-3 control-label\">{{ App.lang['stato']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"state\" class=\"form-control\" id=\"stateID\" placeholder=\"{{ App.lang['inserisci uno stato'] }}\" value=\"{{ App.item.state }}\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</fieldset>\t\t\t\t\t
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"emailID\" class=\"col-md-3 control-label\">{{ App.lang['email']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"email\" name=\"email\" class=\"form-control\" id=\"emailID\" placeholder=\"{{ App.lang['inserisci un indirizzo email'] }}\"  value=\"{{ App.item.email }}\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"telephoneID\" class=\"col-md-3 control-label\">{{ App.lang['telefono']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"telephone\" class=\"form-control\" id=\"telephoneID\" placeholder=\"{{ App.lang['inserisci un numero di telefono'] }}\"  value=\"{{ App.item.telephone }}\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"mobileID\" class=\"col-md-3 control-label\">{{ App.lang['cellulare']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"mobile\" class=\"form-control\" id=\"mobileID\" placeholder=\"{{ App.lang['inserisci un numero di cellulare'] }}\"  value=\"{{ App.item.mobile }}\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"emailID\" class=\"col-md-3 control-label\">{{ App.lang['fax']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"fax\" class=\"form-control\" id=\"faxID\" placeholder=\"{{ App.lang['inserisci un numero di fax'] }}\"  value=\"{{ App.item.fax }}\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"skypeID\" class=\"col-md-3 control-label\">{{ App.lang['skype']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"skype\" class=\"form-control\" id=\"skypeID\" placeholder=\"{{ App.lang['inserisci un username skype'] }}\"  value=\"{{ App.item.skype }}\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</fieldset>\t\t\t\t\t
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"avatarID\" class=\"col-md-3 control-label\">{{ App.lang['avatar']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-3\">\t\t\t\t
\t\t\t\t\t\t\t\t<input type=\"file\" name=\"avatar\">\t\t\t\t
\t\t\t\t\t    \t</div>
\t\t\t\t\t    \t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t{% if App.item.avatar is defined and App.item.avatar != '' %}\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<img src=\"{{ URLSITE }}profile/renderAvatarDB/{{ App.id }}\" alt=\"\" style=\"max-height: 110px;\">\t\t\t\t\t
\t\t\t\t            {% endif %}
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"templateID\" class=\"col-md-3 control-label\">{{ App.lang['template']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t{% if App.templatesAvaiable is iterable %}
\t\t\t\t\t\t\t\t<select name=\"template\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t{% for key,value in App.templatesAvaiable %}
\t\t\t\t\t\t\t\t\t\t<option value=\"{{ value }}\"{% if App.item.template is defined and App.item.template == value %} selected=\"selected\" {% endif %}>{{ value }}</option>\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t{% endif %}\t\t\t
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>\t
\t\t\t\t\t</fieldset>
\t\t\t\t</div>
<!-- sezione dati base -->\t\t\t\t\t
\t\t\t</div>
<!--/Tab panes -->\t\t\t
\t\t\t<hr>
\t\t\t<div class=\"form-group\">
\t\t\t\t<div class=\"col-md-offset-3 col-md-9\">
\t\t\t\t<input type=\"hidden\" name=\"id\" value=\"{{ App.id }}\">
\t\t\t\t<input type=\"hidden\" name=\"method\" value=\"update\">
\t\t\t\t<button type=\"submit\" class=\"btn btn-primary\">{{ App.lang['invia']|capitalize }}</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t</div>
</div>", "profile.tpl.php", "/var/www/html/myprojects/application/site-core/templates/default/profile.tpl.php");
    }
}
