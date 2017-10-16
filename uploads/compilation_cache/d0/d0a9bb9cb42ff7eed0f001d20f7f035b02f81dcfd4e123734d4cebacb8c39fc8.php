<?php

/* timecard/templates/default/formItem.tpl.php */
class __TwigTemplate_70e7a1b4f210f3d986340eca29040b24491e3362479c5822d8b4bcf5637c14aa extends Twig_Template
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
        echo "<!-- admin/timecard/formItem.tpl.php v.1.0.1. 04/10/2017 -->

<div class=\"row\">
\t<div class=\"col-md-3 new\">
 \t</div>
\t<div class=\"col-md-7 help-small-form\">
\t\t";
        // line 7
        if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "params", array(), "any", false, true), "help_small", array(), "any", true, true)) {
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "params", array()), "help_small", array());
        }
        // line 8
        echo "\t</div>
\t<div class=\"col-md-2 help\">
\t</div>
</div>

<div class=\"row\">
\t<div class=\"col-md-6 col-xs-12\" style=\"padding-bottom:30px;\">
\t\t<form id=\"applicationForm\" class=\"form-horizontal form-daydata bg-info\" role=\"form\" action=\"";
        // line 15
        echo ($context["URLSITE"] ?? null);
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
        echo "/modappData\"  enctype=\"multipart/form-data\" method=\"post\">\t
\t\t\t<div class=\"form-group has-feedback\">
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t<input type=\"text\" name=\"appdata\" id=\"appdataDPID\" class=\"form-control\" placeholder=\"";
        // line 18
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci una data globale", array(), "array"));
        echo "\" value=\"\">
\t\t\t\t\t<span class=\"glyphicon glyphicon-calendar form-control-feedback\"></span>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t<button type=\"submit\" class=\"btn btn-sm btn-primary\">";
        // line 22
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "invia", array(), "array"));
        echo "</button>
\t\t\t\t</div>
\t\t\t</div>\t
\t\t</form>
\t\t<form id=\"applicationForm1\" class=\"form-horizontal form-daydata bg-info\" role=\"form\" action=\"";
        // line 26
        echo ($context["URLSITE"] ?? null);
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
        echo "/modappProj\"  enctype=\"multipart/form-data\" method=\"post\">
\t\t\t<div class=\"form-group\">
\t\t\t\t<div class=\"col-md-8\">\t\t
\t\t\t\t\t<select name=\"id_project\" id=\"id_projectID\" class=\"selectpicker form-control\" data-live-search=\"true\" title=\"";
        // line 29
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "seleziona un progetto", array(), "array"));
        echo "\">
\t\t\t\t\t\t<option value=\"0\"";
        // line 30
        if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["MySessionVars"] ?? null), "app", array(), "array"), "id_project", array(), "array") == 0)) {
            echo " selected=\"selected\"";
        }
        echo ">";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "tutti", array(), "array"));
        echo "</option>
\t\t\t\t\t\t";
        // line 31
        if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "allprogetti", array()))) {
            // line 32
            echo "\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "allprogetti", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                echo "\t\t
\t\t\t\t\t\t\t\t<option value=\"";
                // line 33
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\"";
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array()) == twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["MySessionVars"] ?? null), "app", array(), "array"), "id_project", array(), "array"))) {
                    echo " selected=\"selected\" ";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "title", array());
                echo "</option>\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "\t\t\t\t\t\t";
        }
        echo "\t\t
\t\t\t\t\t</select>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t<button type=\"submit\" class=\"btn btn-sm btn-primary\">";
        // line 39
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "invia", array(), "array"));
        echo "</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t\t<hr>
\t\t<div class=\"timecards\" id=\"accordion\">
\t\t";
        // line 45
        if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "dates_month", array()))) {
            // line 46
            echo "\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "dates_month", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["key"] => $context["day"]) {
                // line 47
                echo "
\t\t\t\t<div class=\"panel panel-default\">
\t\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t\t<h4 class=\"panel-title\">
\t\t\t\t\t\t\t<a class=\"changedata\" href=\"";
                // line 51
                echo ($context["URLSITE"] ?? null);
                echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                echo "/setappData/";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "value", array(), "array");
                echo "\" title=\"";
                echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "vai a questa data", array(), "array"));
                echo "\"><span class=\"glyphicon glyphicon-calendar\"></span></a>
\t\t\t\t\t\t\t<a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse";
                // line 52
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["loop"], "index", array());
                echo "\">
\t\t\t\t\t\t\t";
                // line 53
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "label", array(), "array");
                echo "&nbsp;-&nbsp;";
                echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "nameday", array(), "array"));
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "value", array(), "array") == twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["MySessionVars"] ?? null), "app", array(), "array"), "data-timecard", array(), "array"))) {
                    echo "&nbsp;&nbsp;<span class=\"glyphicon glyphicon-ok-circle\"></span>";
                }
                // line 54
                echo "\t\t\t\t\t\t\t</a>
 \t\t\t\t\t\t
 \t\t\t\t\t\t";
                // line 56
                if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "timecards_total", array()), twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "value", array(), "array"), array(), "array") > 0)) {
                    echo "<span class=\"pull-right\">";
                    echo twig_slice($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "timecards_total", array()), twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "value", array(), "array"), array(), "array"), 0, 5);
                    echo "</span>";
                }
                // line 57
                echo " \t\t\t\t\t\t</h4>
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"collapse";
                // line 59
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["loop"], "index", array());
                echo "\" class=\"panel-collapse collapse";
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "value", array(), "array") == twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["MySessionVars"] ?? null), "app", array(), "array"), "data-timecard", array(), "array"))) {
                    echo " in";
                } else {
                    echo " out";
                }
                echo "\">
\t\t\t\t\t\t<div class=\"panel-body";
                // line 60
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "value", array(), "array") == twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["MySessionVars"] ?? null), "app", array(), "array"), "data-timecard", array(), "array"))) {
                    echo " current";
                }
                echo "\">
\t\t\t\t\t\t\t";
                // line 61
                if ((twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "timecards", array()), twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "value", array(), "array"), array(), "array"), "timecards", array(), "array")) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "timecards", array()), twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "value", array(), "array"), array(), "array"), "timecards", array(), "array")) > 0))) {
                    // line 62
                    echo "\t\t\t\t\t\t\t\t<table class=\"table table-condensed table-bordered subtimecards tooltip-proj\">
\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t";
                    // line 64
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "timecards", array()), twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "value", array(), "array"), array(), "array"), "timecards", array(), "array"));
                    foreach ($context['_seq'] as $context["_key"] => $context["day"]) {
                        // line 65
                        echo "\t\t\t\t\t\t\t\t\t\t\t<tr>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t<td data-toggle=\"tooltip\" data-placement=\"top\" title=\"";
                        // line 66
                        echo twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "project", array());
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "project", array());
                        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td data-toggle=\"tooltip\" data-placement=\"top\" title=\"";
                        // line 67
                        echo twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "content", array());
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "content", array());
                        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 68
                        if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "is_root", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "is_root", array()) === 1))) {
                            echo "\t
\t\t\t\t\t\t\t\t\t\t\t\t\t<td style=\"width:55px;\">IOw: ";
                            // line 69
                            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "id_owner", array());
                            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 71
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"hours\">";
                        echo twig_slice($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "starttime", array()), 0, 5);
                        echo "-";
                        echo twig_slice($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "endtime", array()), 0, 5);
                        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"tothours text-right\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"\" href=\"";
                        // line 73
                        echo ($context["URLSITE"] ?? null);
                        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                        echo "/modifyTime/";
                        echo twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "id", array());
                        echo "\" title=\"";
                        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "modifica", array(), "array"));
                        echo "\">";
                        echo twig_slice($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "worktime", array()), 0, 5);
                        echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['day'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 76
                    echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<tr class=\"\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 78
                    $context["colspan"] = "3";
                    echo "\t
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 79
                    if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "is_root", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "is_root", array()) === 1))) {
                        $context["colspan"] = "4";
                    }
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<td colspan=\"";
                    // line 80
                    echo ($context["colspan"] ?? null);
                    echo "\">&nbsp;</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"hours text-right success\">";
                    // line 81
                    echo twig_slice($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "timecards_total", array()), twig_get_attribute($this->env, $this->getSourceContext(), $context["day"], "value", array(), "array"), array(), "array"), 0, 5);
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t";
                }
                // line 86
                echo " \t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t
\t\t\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['day'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 90
            echo "\t\t
\t\t";
        }
        // line 92
        echo "\t\t\t<div class=\"ore-totali\">
\t\t\t\t<div class=\"pull-right\">";
        // line 93
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "tempo totale", array(), "array"));
        echo ":&nbsp;<span class=\"value\">";
        echo twig_slice($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "timecards_total_time", array()), 0, 5);
        echo "</span></div>
\t\t\t</div>
\t\t</div>
\t\t
\t</div>
\t
\t<div class=\"col-md-6 col-xs-12\">
\t\t<form id=\"applicationForm2\" method=\"post\" class=\"form-horizontal form-daydata bg-info\" role=\"form\" action=\"";
        // line 100
        echo ($context["URLSITE"] ?? null);
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
        echo "/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "methodForm", array());
        echo "\"  enctype=\"multipart/form-data\" method=\"post\">
\t\t\t\t<div class=\"form-group has-feedback\">
\t\t\t\t\t<label for=\"dataID\" class=\"col-md-3 control-label\">";
        // line 102
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "data", array(), "array"));
        echo "</label>
\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t<input type=\"text\" name=\"data\" id=\"dataDPID\" class=\"form-control\" placeholder=\"";
        // line 104
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci una data", array(), "array"));
        echo "\" value=\"\">
\t\t\t\t\t\t<span class=\"glyphicon glyphicon-calendar form-control-feedback\"></span>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"progettoID\" class=\"col-md-3 control-label\">";
        // line 109
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "progetto", array(), "array"));
        echo "</label>
\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t<select name=\"progetto\" class=\"selectpicker form-control\" data-live-search=\"true\" title=\"";
        // line 111
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "seleziona un progetto", array(), "array"));
        echo "\">
\t\t\t\t\t\t\t";
        // line 112
        if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "progetti", array()))) {
            // line 113
            echo "\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "progetti", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                // line 114
                echo "\t\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\"";
                if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array(), "any", false, true), "id_project", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "id_project", array()) == twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array())))) {
                    echo " selected=\"selected\" ";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "title", array());
                echo "</option>\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 116
            echo "\t\t\t\t\t\t\t";
        }
        echo "\t\tform-horizontal form-daydata bg-info
\t\t\t\t\t\t</select>\t\t\t\t\t\t\t\t\t\t
\t\t\t    \t</div>
\t\t\t\t</div>\t\t\t\t
\t\t\t\t<div class=\"form-group has-feedback\">
\t\t\t\t\t<label for=\"startTimeID\" class=\"col-md-3 control-label\">";
        // line 121
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inizio", array(), "array"));
        echo "</label>
\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t<input type=\"text\" name=\"startTime\" id=\"startTimeID\" class=\"form-control\" placeholder=\"";
        // line 123
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci ora inizio", array(), "array"));
        echo "\" value=\"\">\t
\t\t\t\t\t\t<span class=\"glyphicon glyphicon-time form-control-feedback\"></span>
\t\t\t    \t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group has-feedback\">
\t\t\t\t\t<label for=\"endTimeID\" class=\"col-md-3 control-label\">";
        // line 128
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "fine", array(), "array"));
        echo "</label>
\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t<input type=\"text\" name=\"endTime\" id=\"endTimeID\" class=\"form-control\" placeholder=\"";
        // line 130
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci ora fine", array(), "array"));
        echo "\"value=\"\">\t
\t\t\t\t\t\t<span class=\"glyphicon glyphicon-time form-control-feedback\"></span>
\t\t\t    \t</div>
\t\t\t\t</div>\t\t
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"contentID\" class=\"col-md-3 control-label\">";
        // line 135
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "contenuto", array(), "array"));
        echo "</label>
\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t<textarea name=\"content\" class=\"form-control\" id=\"contentID\" rows=\"5\">";
        // line 137
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "content", array());
        echo "</textarea>
\t\t\t\t\t</div>
\t\t\t\t</div>\t
\t\t\t<div class=\"form-group\">
\t\t\t\t";
        // line 141
        if ((((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "methodForm", array()) == "updateTime") && twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array(), "any", false, true), "id", array(), "any", true, true)) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "id", array()) > 0))) {
            // line 142
            echo "\t\t\t\t\t<div class=\"col-md-6 text-center\">
\t\t\t\t\t\t<input type=\"hidden\" name=\"id\" value=\"";
            // line 143
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "id", array());
            echo "\">\t\t\t\t\t
\t\t\t\t\t\t<button type=\"submit\" name=\"submitForm\" value=\"submit\" class=\"btn btn-primary\">";
            // line 144
            echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "modifica", array(), "array"));
            echo "</button>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6 text-right\">
\t\t\t\t\t\t<button class=\"btn btn-danger timedelconfirm\" href=\"";
            // line 147
            echo ($context["URLSITE"] ?? null);
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
            echo "/deleteTime/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "id", array());
            echo "\" title=\"";
            echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "cancella", array(), "array"));
            echo "\">";
            echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "cancella", array(), "array"));
            echo "</a>
\t\t\t\t\t</div>
\t\t\t\t";
        } else {
            // line 150
            echo "\t\t\t\t<div class=\"col-md-12 text-center\">
\t\t\t\t\t<button type=\"submit\" name=\"submitForm\" value=\"submit\" class=\"btn btn-primary\">";
            // line 151
            echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "invia", array(), "array"));
            echo "</button>
\t\t\t\t</div>
\t\t\t\t";
        }
        // line 153
        echo "\t\t\t\t\t
\t\t\t</div>
\t\t</form>

\t\t<hr class=\"divider-top-module\">
\t\t
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-8\"><big><strong>";
        // line 160
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci una timecard predefinita", array(), "array"));
        echo "</strong></big>
\t\t\t</div>
\t\t\t<div class=\"col-md-4\">
\t\t \t\t<a class=\"btn btn-primary\" href=\"";
        // line 163
        echo ($context["URLSITE"] ?? null);
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
        echo "/listPite\" title=\"";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "gestisci le timecard predefinite", array(), "array"));
        echo "\">";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "gestisci", array(), "array"));
        echo "</a>
\t\t\t</div>
\t\t</div>
\t\t
\t\t<hr class=\"divider-top-module\">

\t\t<form id=\"applicationForm4\" method=\"post\" class=\"form-horizontal form-daydata bg-info\" role=\"form\" action=\"";
        // line 169
        echo ($context["URLSITE"] ?? null);
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
        echo "/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "methodForm1", array());
        echo "\"  enctype=\"multipart/form-data\" method=\"post\">
\t\t\t\t<div class=\"form-group has-feedback\">
\t\t\t\t\t<label for=\"dataID\" class=\"col-md-3 control-label\">";
        // line 171
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "data", array(), "array"));
        echo "</label>
\t\t\t\t\t<div class=\"col-md-4\">\t
\t\t\t\t\t\t<input type=\"text\" name=\"data1\" id=\"data1DPID\" class=\"form-control\" placeholder=\"";
        // line 173
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci una data", array(), "array"));
        echo "\" value=\"\">
\t\t\t\t\t\t<span class=\"glyphicon glyphicon-calendar form-control-feedback\"></span>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"project1ID\" class=\"col-md-3 control-label\">";
        // line 178
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "progetto", array(), "array"));
        echo "</label>
\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t<select name=\"project1\" class=\"selectpicker form-control\" data-live-search=\"true\" title=\"";
        // line 180
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "seleziona un progetto", array(), "array"));
        echo "\">
\t\t\t\t\t\t\t";
        // line 181
        if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "progetti", array()))) {
            // line 182
            echo "\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "progetti", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                echo "\t
\t\t\t\t\t\t\t\t\t<option value=\"";
                // line 183
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\"";
                if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "currentProject", array()), "id", array()) == twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array()))) {
                    echo " selected=\"selected\" ";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "title", array());
                echo "</option>\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 185
            echo "\t\t\t\t\t\t\t";
        }
        echo "\t\t
\t\t\t\t\t\t</select>
\t\t\t    \t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group has-feedback\">
\t\t\t\t\t<label for=\"starttime1ID\" class=\"col-md-3 control-label\">";
        // line 190
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inizio", array(), "array"));
        echo "</label>
\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t<input type=\"text\" name=\"starttime1\" id=\"starttime1ID\" class=\"form-control\" placeholder=\"";
        // line 192
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci ora inizio", array(), "array"));
        echo " \"value=\"\">\t
\t\t\t\t\t\t<span class=\"glyphicon glyphicon-time form-control-feedback\"></span>\t\t\t\t
\t\t\t    \t</div>
\t\t\t\t</div>
\t\t  \t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"activeID\" class=\"col-md-3 control-label\">";
        // line 197
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "usa questo inizio", array(), "array"));
        echo "</label>
\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t<div class=\"form-check\">
\t\t\t\t\t\t\t<label class=\"form-check-label\">
\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"usedata\" id=\"usedataID\" value=\"1\">
\t\t\t\t\t\t\t</label>
  \t\t\t\t\t\t</div>
\t\t\t\t\t</div>
 \t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"timecardID\" class=\"col-md-3 control-label\">";
        // line 207
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "timecard", array(), "array"));
        echo "</label>
\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t<select name=\"timecard\" id=\"timecardID\" class=\"selectpicker form-control\" data-live-search=\"true\" title=\"";
        // line 209
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "seleziona una timecard", array(), "array"));
        echo "\">
\t\t\t\t\t\t\t";
        // line 210
        if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "allpreftimecard", array()))) {
            // line 211
            echo "\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "allpreftimecard", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                echo "\t
\t\t\t\t\t\t\t\t\t<option value=\"";
                // line 212
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\">";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "title", array());
                echo " (";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "worktime", array());
                echo " ";
                echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "hours", array(), "array");
                echo ")</option>\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 214
            echo "\t\t\t\t\t\t\t";
        }
        echo "\t\t
\t\t\t\t\t\t</select>\t\t\t\t\t\t\t\t\t\t
\t\t\t    \t</div>
\t\t\t\t</div>
\t\t\t<div class=\"form-group text-center\">
\t\t\t\t<button type=\"submit\" name=\"submitForm\" value=\"submit\" class=\"btn btn-primary\">";
        // line 219
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "invia", array(), "array"));
        echo "</button>\t\t\t
\t\t\t</div>
\t\t</form>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "timecard/templates/default/formItem.tpl.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  612 => 219,  603 => 214,  589 => 212,  582 => 211,  580 => 210,  576 => 209,  571 => 207,  558 => 197,  550 => 192,  545 => 190,  536 => 185,  522 => 183,  515 => 182,  513 => 181,  509 => 180,  504 => 178,  496 => 173,  491 => 171,  483 => 169,  469 => 163,  463 => 160,  454 => 153,  448 => 151,  445 => 150,  432 => 147,  426 => 144,  422 => 143,  419 => 142,  417 => 141,  410 => 137,  405 => 135,  397 => 130,  392 => 128,  384 => 123,  379 => 121,  370 => 116,  355 => 114,  350 => 113,  348 => 112,  344 => 111,  339 => 109,  331 => 104,  326 => 102,  318 => 100,  306 => 93,  303 => 92,  299 => 90,  281 => 86,  273 => 81,  269 => 80,  263 => 79,  259 => 78,  255 => 76,  238 => 73,  230 => 71,  225 => 69,  221 => 68,  215 => 67,  209 => 66,  206 => 65,  202 => 64,  198 => 62,  196 => 61,  190 => 60,  180 => 59,  176 => 57,  170 => 56,  166 => 54,  159 => 53,  155 => 52,  146 => 51,  140 => 47,  122 => 46,  120 => 45,  111 => 39,  103 => 35,  89 => 33,  82 => 32,  80 => 31,  72 => 30,  68 => 29,  61 => 26,  54 => 22,  47 => 18,  40 => 15,  31 => 8,  27 => 7,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- admin/timecard/formItem.tpl.php v.1.0.1. 04/10/2017 -->

<div class=\"row\">
\t<div class=\"col-md-3 new\">
 \t</div>
\t<div class=\"col-md-7 help-small-form\">
\t\t{% if App.params.help_small is defined %}{{ App.params.help_small }}{% endif %}
\t</div>
\t<div class=\"col-md-2 help\">
\t</div>
</div>

<div class=\"row\">
\t<div class=\"col-md-6 col-xs-12\" style=\"padding-bottom:30px;\">
\t\t<form id=\"applicationForm\" class=\"form-horizontal form-daydata bg-info\" role=\"form\" action=\"{{ URLSITE }}{{ CoreRequest.action }}/modappData\"  enctype=\"multipart/form-data\" method=\"post\">\t
\t\t\t<div class=\"form-group has-feedback\">
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t<input type=\"text\" name=\"appdata\" id=\"appdataDPID\" class=\"form-control\" placeholder=\"{{ App.lang['inserisci una data globale']|capitalize }}\" value=\"\">
\t\t\t\t\t<span class=\"glyphicon glyphicon-calendar form-control-feedback\"></span>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t<button type=\"submit\" class=\"btn btn-sm btn-primary\">{{ App.lang['invia']|capitalize }}</button>
\t\t\t\t</div>
\t\t\t</div>\t
\t\t</form>
\t\t<form id=\"applicationForm1\" class=\"form-horizontal form-daydata bg-info\" role=\"form\" action=\"{{ URLSITE }}{{ CoreRequest.action }}/modappProj\"  enctype=\"multipart/form-data\" method=\"post\">
\t\t\t<div class=\"form-group\">
\t\t\t\t<div class=\"col-md-8\">\t\t
\t\t\t\t\t<select name=\"id_project\" id=\"id_projectID\" class=\"selectpicker form-control\" data-live-search=\"true\" title=\"{{ App.lang['seleziona un progetto']|capitalize }}\">
\t\t\t\t\t\t<option value=\"0\"{% if MySessionVars['app']['id_project'] == 0 %} selected=\"selected\"{% endif %}>{{ App.lang['tutti']|capitalize }}</option>
\t\t\t\t\t\t{% if App.allprogetti is iterable %}
\t\t\t\t\t\t\t{% for value in App.allprogetti %}\t\t
\t\t\t\t\t\t\t\t<option value=\"{{ value.id }}\"{% if value.id == MySessionVars['app']['id_project'] %} selected=\"selected\" {% endif %}>{{ value.title }}</option>\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t{% endif %}\t\t
\t\t\t\t\t</select>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t<button type=\"submit\" class=\"btn btn-sm btn-primary\">{{ App.lang['invia']|capitalize }}</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t\t<hr>
\t\t<div class=\"timecards\" id=\"accordion\">
\t\t{% if App.dates_month is iterable %}
\t\t\t{% for key,day in App.dates_month %}

\t\t\t\t<div class=\"panel panel-default\">
\t\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t\t<h4 class=\"panel-title\">
\t\t\t\t\t\t\t<a class=\"changedata\" href=\"{{ URLSITE }}{{ CoreRequest.action }}/setappData/{{ day['value'] }}\" title=\"{{ App.lang['vai a questa data']|capitalize }}\"><span class=\"glyphicon glyphicon-calendar\"></span></a>
\t\t\t\t\t\t\t<a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse{{ loop.index }}\">
\t\t\t\t\t\t\t{{ day['label'] }}&nbsp;-&nbsp;{{ day['nameday']|capitalize }}{% if day['value'] == MySessionVars['app']['data-timecard'] %}&nbsp;&nbsp;<span class=\"glyphicon glyphicon-ok-circle\"></span>{% endif %}
\t\t\t\t\t\t\t</a>
 \t\t\t\t\t\t
 \t\t\t\t\t\t{% if App.timecards_total[day['value']] > 0  %}<span class=\"pull-right\">{{ App.timecards_total[day['value']]|slice(0, 5) }}</span>{% endif %}
 \t\t\t\t\t\t</h4>
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"collapse{{ loop.index }}\" class=\"panel-collapse collapse{% if day['value'] == MySessionVars['app']['data-timecard'] %} in{% else %} out{% endif %}\">
\t\t\t\t\t\t<div class=\"panel-body{% if day['value'] == MySessionVars['app']['data-timecard'] %} current{% endif %}\">
\t\t\t\t\t\t\t{% if App.timecards[day['value']]['timecards'] is iterable and App.timecards[day['value']]['timecards']|length > 0  %}
\t\t\t\t\t\t\t\t<table class=\"table table-condensed table-bordered subtimecards tooltip-proj\">
\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t{% for day in App.timecards[day['value']]['timecards'] %}
\t\t\t\t\t\t\t\t\t\t\t<tr>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t<td data-toggle=\"tooltip\" data-placement=\"top\" title=\"{{ day.project }}\">{{ day.project }}</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td data-toggle=\"tooltip\" data-placement=\"top\" title=\"{{ day.content }}\">{{ day.content }}</td>
\t\t\t\t\t\t\t\t\t\t\t\t{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}\t
\t\t\t\t\t\t\t\t\t\t\t\t\t<td style=\"width:55px;\">IOw: {{ day.id_owner }}</td>
\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"hours\">{{ day.starttime|slice(0, 5) }}-{{ day.endtime|slice(0, 5) }}</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"tothours text-right\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"\" href=\"{{ URLSITE }}{{ CoreRequest.action }}/modifyTime/{{ day.id }}\" title=\"{{ App.lang['modifica']|capitalize }}\">{{ day.worktime|slice(0, 5) }}</a>
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t{% endfor %}\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<tr class=\"\">
\t\t\t\t\t\t\t\t\t\t\t{% set colspan = \"3\" %}\t
\t\t\t\t\t\t\t\t\t\t\t{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}{% set colspan = \"4\" %}{% endif %}\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<td colspan=\"{{ colspan }}\">&nbsp;</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"hours text-right success\">{{ App.timecards_total[day['value']]|slice(0, 5) }}</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t{% endif %}
 \t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t
\t\t\t{% endfor %}\t\t
\t\t{% endif %}
\t\t\t<div class=\"ore-totali\">
\t\t\t\t<div class=\"pull-right\">{{ App.lang['tempo totale']|capitalize }}:&nbsp;<span class=\"value\">{{ App.timecards_total_time|slice(0, 5) }}</span></div>
\t\t\t</div>
\t\t</div>
\t\t
\t</div>
\t
\t<div class=\"col-md-6 col-xs-12\">
\t\t<form id=\"applicationForm2\" method=\"post\" class=\"form-horizontal form-daydata bg-info\" role=\"form\" action=\"{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}\"  enctype=\"multipart/form-data\" method=\"post\">
\t\t\t\t<div class=\"form-group has-feedback\">
\t\t\t\t\t<label for=\"dataID\" class=\"col-md-3 control-label\">{{ App.lang['data']|capitalize }}</label>
\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t<input type=\"text\" name=\"data\" id=\"dataDPID\" class=\"form-control\" placeholder=\"{{ App.lang['inserisci una data']|capitalize }}\" value=\"\">
\t\t\t\t\t\t<span class=\"glyphicon glyphicon-calendar form-control-feedback\"></span>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"progettoID\" class=\"col-md-3 control-label\">{{ App.lang['progetto']|capitalize }}</label>
\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t<select name=\"progetto\" class=\"selectpicker form-control\" data-live-search=\"true\" title=\"{{ App.lang['seleziona un progetto']|capitalize }}\">
\t\t\t\t\t\t\t{% if App.progetti is iterable %}
\t\t\t\t\t\t\t\t{% for value in App.progetti %}
\t\t\t\t\t\t\t\t\t<option value=\"{{ value.id }}\"{% if (App.item.id_project is defined) and (App.item.id_project == value.id)  %} selected=\"selected\" {% endif %}>{{ value.title }}</option>\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t{% endif %}\t\tform-horizontal form-daydata bg-info
\t\t\t\t\t\t</select>\t\t\t\t\t\t\t\t\t\t
\t\t\t    \t</div>
\t\t\t\t</div>\t\t\t\t
\t\t\t\t<div class=\"form-group has-feedback\">
\t\t\t\t\t<label for=\"startTimeID\" class=\"col-md-3 control-label\">{{ App.lang['inizio']|capitalize }}</label>
\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t<input type=\"text\" name=\"startTime\" id=\"startTimeID\" class=\"form-control\" placeholder=\"{{ App.lang['inserisci ora inizio']|capitalize }}\" value=\"\">\t
\t\t\t\t\t\t<span class=\"glyphicon glyphicon-time form-control-feedback\"></span>
\t\t\t    \t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group has-feedback\">
\t\t\t\t\t<label for=\"endTimeID\" class=\"col-md-3 control-label\">{{ App.lang['fine']|capitalize }}</label>
\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t<input type=\"text\" name=\"endTime\" id=\"endTimeID\" class=\"form-control\" placeholder=\"{{ App.lang['inserisci ora fine']|capitalize }}\"value=\"\">\t
\t\t\t\t\t\t<span class=\"glyphicon glyphicon-time form-control-feedback\"></span>
\t\t\t    \t</div>
\t\t\t\t</div>\t\t
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"contentID\" class=\"col-md-3 control-label\">{{ App.lang['contenuto']|capitalize }}</label>
\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t<textarea name=\"content\" class=\"form-control\" id=\"contentID\" rows=\"5\">{{ App.item.content }}</textarea>
\t\t\t\t\t</div>
\t\t\t\t</div>\t
\t\t\t<div class=\"form-group\">
\t\t\t\t{% if (App.methodForm == 'updateTime' and App.item.id is defined and App.item.id > 0) %}
\t\t\t\t\t<div class=\"col-md-6 text-center\">
\t\t\t\t\t\t<input type=\"hidden\" name=\"id\" value=\"{{ App.item.id }}\">\t\t\t\t\t
\t\t\t\t\t\t<button type=\"submit\" name=\"submitForm\" value=\"submit\" class=\"btn btn-primary\">{{ App.lang['modifica']|capitalize }}</button>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6 text-right\">
\t\t\t\t\t\t<button class=\"btn btn-danger timedelconfirm\" href=\"{{ URLSITE }}{{ CoreRequest.action }}/deleteTime/{{ App.item.id }}\" title=\"{{ App.lang['cancella']|capitalize }}\">{{ App.lang['cancella']|capitalize }}</a>
\t\t\t\t\t</div>
\t\t\t\t{% else %}
\t\t\t\t<div class=\"col-md-12 text-center\">
\t\t\t\t\t<button type=\"submit\" name=\"submitForm\" value=\"submit\" class=\"btn btn-primary\">{{ App.lang['invia']|capitalize }}</button>
\t\t\t\t</div>
\t\t\t\t{% endif %}\t\t\t\t\t
\t\t\t</div>
\t\t</form>

\t\t<hr class=\"divider-top-module\">
\t\t
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-8\"><big><strong>{{ App.lang['inserisci una timecard predefinita']|capitalize }}</strong></big>
\t\t\t</div>
\t\t\t<div class=\"col-md-4\">
\t\t \t\t<a class=\"btn btn-primary\" href=\"{{ URLSITE }}{{ CoreRequest.action }}/listPite\" title=\"{{ App.lang['gestisci le timecard predefinite']|capitalize }}\">{{ App.lang['gestisci']|capitalize }}</a>
\t\t\t</div>
\t\t</div>
\t\t
\t\t<hr class=\"divider-top-module\">

\t\t<form id=\"applicationForm4\" method=\"post\" class=\"form-horizontal form-daydata bg-info\" role=\"form\" action=\"{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm1 }}\"  enctype=\"multipart/form-data\" method=\"post\">
\t\t\t\t<div class=\"form-group has-feedback\">
\t\t\t\t\t<label for=\"dataID\" class=\"col-md-3 control-label\">{{ App.lang['data']|capitalize }}</label>
\t\t\t\t\t<div class=\"col-md-4\">\t
\t\t\t\t\t\t<input type=\"text\" name=\"data1\" id=\"data1DPID\" class=\"form-control\" placeholder=\"{{ App.lang['inserisci una data']|capitalize }}\" value=\"\">
\t\t\t\t\t\t<span class=\"glyphicon glyphicon-calendar form-control-feedback\"></span>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"project1ID\" class=\"col-md-3 control-label\">{{ App.lang['progetto']|capitalize }}</label>
\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t<select name=\"project1\" class=\"selectpicker form-control\" data-live-search=\"true\" title=\"{{ App.lang['seleziona un progetto']|capitalize }}\">
\t\t\t\t\t\t\t{% if App.progetti is iterable %}
\t\t\t\t\t\t\t\t{% for value in App.progetti %}\t
\t\t\t\t\t\t\t\t\t<option value=\"{{ value.id }}\"{% if App.currentProject.id == value.id %} selected=\"selected\" {% endif %}>{{ value.title }}</option>\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t{% endif %}\t\t
\t\t\t\t\t\t</select>
\t\t\t    \t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group has-feedback\">
\t\t\t\t\t<label for=\"starttime1ID\" class=\"col-md-3 control-label\">{{ App.lang['inizio']|capitalize }}</label>
\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t<input type=\"text\" name=\"starttime1\" id=\"starttime1ID\" class=\"form-control\" placeholder=\"{{ App.lang['inserisci ora inizio']|capitalize }} \"value=\"\">\t
\t\t\t\t\t\t<span class=\"glyphicon glyphicon-time form-control-feedback\"></span>\t\t\t\t
\t\t\t    \t</div>
\t\t\t\t</div>
\t\t  \t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"activeID\" class=\"col-md-3 control-label\">{{ App.lang['usa questo inizio']|capitalize }}</label>
\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t<div class=\"form-check\">
\t\t\t\t\t\t\t<label class=\"form-check-label\">
\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"usedata\" id=\"usedataID\" value=\"1\">
\t\t\t\t\t\t\t</label>
  \t\t\t\t\t\t</div>
\t\t\t\t\t</div>
 \t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"timecardID\" class=\"col-md-3 control-label\">{{ App.lang['timecard']|capitalize }}</label>
\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t<select name=\"timecard\" id=\"timecardID\" class=\"selectpicker form-control\" data-live-search=\"true\" title=\"{{ App.lang['seleziona una timecard']|capitalize }}\">
\t\t\t\t\t\t\t{% if App.allpreftimecard is iterable %}
\t\t\t\t\t\t\t\t{% for value in App.allpreftimecard %}\t
\t\t\t\t\t\t\t\t\t<option value=\"{{ value.id }}\">{{ value.title }} ({{ value.worktime }} {{ App.lang['hours'] }})</option>\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t{% endif %}\t\t
\t\t\t\t\t\t</select>\t\t\t\t\t\t\t\t\t\t
\t\t\t    \t</div>
\t\t\t\t</div>
\t\t\t<div class=\"form-group text-center\">
\t\t\t\t<button type=\"submit\" name=\"submitForm\" value=\"submit\" class=\"btn btn-primary\">{{ App.lang['invia']|capitalize }}</button>\t\t\t
\t\t\t</div>
\t\t</form>
\t</div>
</div>", "timecard/templates/default/formItem.tpl.php", "/var/www/html/myprojects/application/timecard/templates/default/formItem.tpl.php");
    }
}
