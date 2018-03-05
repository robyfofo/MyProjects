<?php

/* @base/login.tpl.php */
class __TwigTemplate_ad95db3b56958412a65f2c3877ae4124678aba2b4d51992f15005722c00c6383 extends Twig_Template
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
        echo "<!-- admin/templates/default/login.tpl.php v.2.6.4. 15/06/2016 -->
<!DOCTYPE html>
<html lang=\"";
        // line 3
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "user", array(), "array");
        echo "\">
\t<head>
\t
\t\t<title>";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "metaTitlePage", array()), "html_attr");
        echo "</title>
\t\t<meta charset=\"utf-8\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
\t\t<meta name=\"description\" content=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "metaDescriptionPage", array()), "html_attr");
        echo "\">
\t\t<meta name=\"keyword\" content=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "metaKeywordsPage", array()), "html_attr");
        echo "\">
\t\t<meta name=\"author\" content=\"Roberto Mantovani\">

\t\t<!-- Core CSS - Include with every page -->
\t\t<link href=\"";
        // line 15
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/bower_components/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
\t\t<!-- MetisMenu CSS -->
    \t<link href=\"";
        // line 17
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/bower_components/metisMenu/dist/metisMenu.min.css\" rel=\"stylesheet\">
\t\t<!-- Custom CSS -->
\t\t<link href=\"";
        // line 19
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/css/sb-admin-2.css\" rel=\"stylesheet\">
\t\t<!-- Custom Fonts -->
\t\t<link href=\"";
        // line 21
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/bower_components/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\">

\t\t<!-- OTHER Plugin CSS - Dashboard -->
\t\t<link href=\"";
        // line 24
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/plugins/lightbox/css/lightbox.min.css\" rel=\"stylesheet\">
\t\t<link href=\"";
        // line 25
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/plugins/bootstrapValidator/css/bootstrapValidator.min.css\" rel=\"stylesheet\">
\t\t<link href=\"";
        // line 26
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/plugins/jquery.formvalidation/css/formValidation.min.css\" rel=\"stylesheet\">
\t\t
\t\t<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
\t\t<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
\t\t<!--[if lt IE 9]>
\t\t\t<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
\t\t\t<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
\t\t<![endif]-->
\t\t
\t\t<!-- Custom CSS - Dashboard -->
\t\t<link href=\"";
        // line 36
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/css/default.css\" rel=\"stylesheet\">

    
\t\t<!-- CSS for Page -->
\t\t";
        // line 40
        if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "css", array()))) {
            echo "\t\t\t\t\t\t\t
\t\t\t";
            // line 41
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "css", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 42
                echo "\t\t\t\t";
                echo $context["value"];
                echo "
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "\t\t";
        }
        // line 45
        echo "
\t\t<!-- default vars useful for javascript -->
\t\t<script language=\"javascript\">
\t\t\tsiteUrl = '";
        // line 48
        echo ($context["URLSITE"] ?? null);
        echo "';
\t\t\tsitePath = '";
        // line 49
        echo ($context["PATHSITE"] ?? null);
        echo "';\t\t\t
\t\t\tsiteTemplateUrl = '";
        // line 50
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/';
\t\t\tsiteTemplatePath = '";
        // line 51
        echo ($context["PATHSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/';\t\t\t
\t\t\tsiteDocumentPath = '";
        // line 52
        echo ($context["PATHDOCUMENT"] ?? null);
        echo "';\t\t
\t\t\tvar cur_lang = \"";
        // line 53
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "user", array(), "array");
        echo "\";
\t\t\tvar messages = new Array();
\t\t\tmessages['Sei sicuro?'] = '";
        // line 55
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "Sei sicuro?", array(), "array"), "js");
        echo "';\t
\t\t\t";
        // line 56
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "defaultJavascript", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "defaultJavascript", array()) != ""))) {
            // line 57
            echo "\t\t\t\t";
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "defaultJavascript", array());
            echo "  \t
\t\t\t";
        }
        // line 59
        echo "\t\t</script>

\t</head>
\t
\t<body>

\t\t<div class=\"container\">
\t\t
\t\t\t<div class=\"row\">
\t\t\t\t<a class=\"navbar-brand\" href=\"#\">";
        // line 68
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "globalSettings", array()), "site name", array(), "array");
        echo "  <small>";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "globalSettings", array()), "code version", array(), "array");
        echo "</small></a>
\t\t\t</div>

\t\t\t";
        // line 71
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "systemMessages", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "systemMessages", array()) != ""))) {
            // line 72
            echo "\t\t\t\t";
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "systemMessages", array());
            echo "
\t\t\t";
        }
        // line 74
        echo "\t\t\t
\t\t\t";
        // line 75
        echo twig_include($this->env, $context, twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateApp", array()));
        echo "

\t\t</div>
    
\t\t<!-- Core Scripts - Include with every page -->
\t\t<!-- jQuery -->
\t\t";
        // line 81
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "patchdatapicker", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "patchdatapicker", array()) > 0))) {
            // line 82
            echo "\t\t\t<script src=\"";
            echo ($context["URLSITE"] ?? null);
            echo "templates/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
            echo "/plugins/jquery/jquery-1.10.2.js\"></script>
\t\t";
        } else {
            // line 84
            echo " \t\t\t<script src=\"";
            echo ($context["URLSITE"] ?? null);
            echo "templates/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
            echo "/bower_components/jquery/dist/jquery.min.js\"></script>
 \t\t";
        }
        // line 86
        echo " \t\t
  \t\t<!-- Bootstrap Core JavaScript -->
 \t\t<script src=\"";
        // line 88
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/bower_components/bootstrap/dist/js/bootstrap.min.js\"></script>
 \t\t<!-- Metis Menu Plugin JavaScript -->
 \t\t<script src=\"";
        // line 90
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/bower_components/metisMenu/dist/metisMenu.min.js\"></script>

\t\t<script src=\"";
        // line 92
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/plugins/bootbox/js/bootbox.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"";
        // line 93
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/plugins/lightbox/js/lightbox.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"";
        // line 94
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/plugins/bootstrapValidator/js/bootstrapValidator.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"";
        // line 95
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/plugins/jquery.formvalidation/js/formValidation.min.js\" type=\"text/javascript\"></script>\t
\t\t";
        // line 96
        if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "user", array(), "array") == "it")) {
            // line 97
            echo "\t\t\t<script src=\"";
            echo ($context["URLSITE"] ?? null);
            echo "templates/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
            echo "/plugins/bootstrapValidator/language/it_IT.js\"></script>
\t\t\t<script src=\"";
            // line 98
            echo ($context["URLSITE"] ?? null);
            echo "templates/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
            echo "/plugins/jquery.formvalidation/language/it_IT.js\"></script>\t\t
\t\t";
        }
        // line 100
        echo "\t\t<!-- SB Admin Scripts - Include with every page -->
\t\t<script src=\"";
        // line 101
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/js/sb-admin-2.js\"></script>
\t\t
\t\t
\t\t";
        // line 104
        if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "jscript", array()))) {
            echo "\t\t\t\t\t\t\t
\t\t\t";
            // line 105
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "jscript", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 106
                echo "\t\t\t\t";
                echo $context["value"];
                echo "
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 108
            echo "\t\t";
        }
        // line 109
        echo "\t\t
\t\t";
        // line 110
        if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "jscriptLast", array()))) {
            echo "\t\t\t\t\t\t\t
\t\t\t";
            // line 111
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "jscriptLast", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 112
                echo "\t\t\t\t";
                echo $context["value"];
                echo "
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 114
            echo "\t\t";
        }
        // line 115
        echo "

\t\t<!-- Default Custom Theme JavaScript -->
\t\t<script src=\"";
        // line 118
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/js/default.js\"></script>
\t</body>
</html>";
    }

    public function getTemplateName()
    {
        return "@base/login.tpl.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  352 => 118,  347 => 115,  344 => 114,  335 => 112,  331 => 111,  327 => 110,  324 => 109,  321 => 108,  312 => 106,  308 => 105,  304 => 104,  296 => 101,  293 => 100,  286 => 98,  279 => 97,  277 => 96,  271 => 95,  265 => 94,  259 => 93,  253 => 92,  246 => 90,  239 => 88,  235 => 86,  227 => 84,  219 => 82,  217 => 81,  208 => 75,  205 => 74,  199 => 72,  197 => 71,  189 => 68,  178 => 59,  172 => 57,  170 => 56,  166 => 55,  161 => 53,  157 => 52,  151 => 51,  145 => 50,  141 => 49,  137 => 48,  132 => 45,  129 => 44,  120 => 42,  116 => 41,  112 => 40,  103 => 36,  88 => 26,  82 => 25,  76 => 24,  68 => 21,  61 => 19,  54 => 17,  47 => 15,  40 => 11,  36 => 10,  29 => 6,  23 => 3,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- admin/templates/default/login.tpl.php v.2.6.4. 15/06/2016 -->
<!DOCTYPE html>
<html lang=\"{{ Lang['user'] }}\">
\t<head>
\t
\t\t<title>{{ App.metaTitlePage|e('html_attr') }}</title>
\t\t<meta charset=\"utf-8\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
\t\t<meta name=\"description\" content=\"{{ App.metaDescriptionPage|e('html_attr') }}\">
\t\t<meta name=\"keyword\" content=\"{{ App.metaKeywordsPage|e('html_attr') }}\">
\t\t<meta name=\"author\" content=\"Roberto Mantovani\">

\t\t<!-- Core CSS - Include with every page -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
\t\t<!-- MetisMenu CSS -->
    \t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/metisMenu/dist/metisMenu.min.css\" rel=\"stylesheet\">
\t\t<!-- Custom CSS -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/css/sb-admin-2.css\" rel=\"stylesheet\">
\t\t<!-- Custom Fonts -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\">

\t\t<!-- OTHER Plugin CSS - Dashboard -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/lightbox/css/lightbox.min.css\" rel=\"stylesheet\">
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/bootstrapValidator/css/bootstrapValidator.min.css\" rel=\"stylesheet\">
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/jquery.formvalidation/css/formValidation.min.css\" rel=\"stylesheet\">
\t\t
\t\t<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
\t\t<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
\t\t<!--[if lt IE 9]>
\t\t\t<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
\t\t\t<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
\t\t<![endif]-->
\t\t
\t\t<!-- Custom CSS - Dashboard -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/css/default.css\" rel=\"stylesheet\">

    
\t\t<!-- CSS for Page -->
\t\t{% if App.css is iterable %}\t\t\t\t\t\t\t
\t\t\t{% for key,value in App.css %}
\t\t\t\t{{ value|raw }}
\t\t\t{% endfor %}
\t\t{% endif %}

\t\t<!-- default vars useful for javascript -->
\t\t<script language=\"javascript\">
\t\t\tsiteUrl = '{{ URLSITE }}';
\t\t\tsitePath = '{{ PATHSITE }}';\t\t\t
\t\t\tsiteTemplateUrl = '{{ URLSITE }}templates/{{ App.templateUser }}/';
\t\t\tsiteTemplatePath = '{{ PATHSITE }}templates/{{ App.templateUser }}/';\t\t\t
\t\t\tsiteDocumentPath = '{{ PATHDOCUMENT }}';\t\t
\t\t\tvar cur_lang = \"{{ Lang['user'] }}\";
\t\t\tvar messages = new Array();
\t\t\tmessages['Sei sicuro?'] = '{{ Lang['Sei sicuro?']|e('js') }}';\t
\t\t\t{% if (App.defaultJavascript is defined) and (App.defaultJavascript != '') %}
\t\t\t\t{{ App.defaultJavascript|raw }}  \t
\t\t\t{% endif %}
\t\t</script>

\t</head>
\t
\t<body>

\t\t<div class=\"container\">
\t\t
\t\t\t<div class=\"row\">
\t\t\t\t<a class=\"navbar-brand\" href=\"#\">{{ App.globalSettings['site name'] }}  <small>{{ App.globalSettings['code version'] }}</small></a>
\t\t\t</div>

\t\t\t{% if (App.systemMessages is defined) and (App.systemMessages != '') %}
\t\t\t\t{{ App.systemMessages|raw }}
\t\t\t{% endif %}
\t\t\t
\t\t\t{{ include(App.templateApp) }}

\t\t</div>
    
\t\t<!-- Core Scripts - Include with every page -->
\t\t<!-- jQuery -->
\t\t{% if App.patchdatapicker is defined and App.patchdatapicker > 0 %}
\t\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/jquery/jquery-1.10.2.js\"></script>
\t\t{% else %}
 \t\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/jquery/dist/jquery.min.js\"></script>
 \t\t{% endif %}
 \t\t
  \t\t<!-- Bootstrap Core JavaScript -->
 \t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/bootstrap/dist/js/bootstrap.min.js\"></script>
 \t\t<!-- Metis Menu Plugin JavaScript -->
 \t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/metisMenu/dist/metisMenu.min.js\"></script>

\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/bootbox/js/bootbox.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/lightbox/js/lightbox.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/bootstrapValidator/js/bootstrapValidator.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/jquery.formvalidation/js/formValidation.min.js\" type=\"text/javascript\"></script>\t
\t\t{% if App.lang['user'] == 'it' %}
\t\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/bootstrapValidator/language/it_IT.js\"></script>
\t\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/jquery.formvalidation/language/it_IT.js\"></script>\t\t
\t\t{% endif %}
\t\t<!-- SB Admin Scripts - Include with every page -->
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/js/sb-admin-2.js\"></script>
\t\t
\t\t
\t\t{% if App.jscript is iterable %}\t\t\t\t\t\t\t
\t\t\t{% for key,value in App.jscript %}
\t\t\t\t{{ value|raw }}
\t\t\t{% endfor %}
\t\t{% endif %}
\t\t
\t\t{% if App.jscriptLast is iterable %}\t\t\t\t\t\t\t
\t\t\t{% for key,value in App.jscriptLast %}
\t\t\t\t{{ value|raw }}
\t\t\t{% endfor %}
\t\t{% endif %}


\t\t<!-- Default Custom Theme JavaScript -->
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/js/default.js\"></script>
\t</body>
</html>", "@base/login.tpl.php", "/var/www/html/robyfofo.altervista.org/demo/admin/templates/default/login.tpl.php");
    }
}
