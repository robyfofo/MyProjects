<?php

/* contacts/templates/default/listItem.tpl.php */
class __TwigTemplate_5404afbbaf6f2d63ef634c46f14ae6e4ae039e15438319f35be3dba15ac60a41 extends Twig_Template
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
        echo "<!-- admin/contacts/listItem.tpl.php v.1.0.0. 16/02/2017 -->
<div class=\"row\">
\t<div class=\"col-md-3 new\">
 \t\t<a href=\"";
        // line 4
        echo ($context["URLSITE"] ?? null);
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
        echo "/newItem\" title=\"";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "inserisci nuova voce", array(), "array"));
        echo "\" class=\"btn btn-primary\">";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "nuova voce", array(), "array"));
        echo "</a>
\t</div>
\t<div class=\"col-md-7 help-small-list\">
\t\t";
        // line 7
        if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "params", array(), "any", false, true), "help_small", array(), "any", true, true)) {
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "params", array()), "help_small", array());
        }
        echo " 
\t</div>
\t<div class=\"col-md-2\">
\t</div>
</div>
<hr class=\"divider-top-module\">
<form role=\"form\" action=\"";
        // line 13
        echo ($context["URLSITE"] ?? null);
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
        echo "/listItem\" method=\"post\" enctype=\"multipart/form-data\">
\t<div class=\"row\">
\t\t<div class=\"col-md-12\">\t\t\t
\t\t\t<div class=\"form-inline\" role=\"grid\">\t\t\t\t\t
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">\t\t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t<select class=\"form-control input-md\" name=\"itemsforpage\" onchange=\"this.form.submit();\" >
\t\t\t\t\t\t\t\t\t<option value=\"5\"";
        // line 22
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "itemsForPage", array()) == 5)) {
            echo " selected=\"selected\"";
        }
        echo ">5</option>
\t\t\t\t\t\t\t\t\t<option value=\"10\"";
        // line 23
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "itemsForPage", array()) == 10)) {
            echo " selected=\"selected\"";
        }
        echo ">10</option>
\t\t\t\t\t\t\t\t\t<option value=\"25\"";
        // line 24
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "itemsForPage", array()) == 25)) {
            echo " selected=\"selected\"";
        }
        echo ">25</option>
\t\t\t\t\t\t\t\t\t<option value=\"50\"";
        // line 25
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "itemsForPage", array()) == 50)) {
            echo " selected=\"selected\"";
        }
        echo ">50</option>
\t\t\t\t\t\t\t\t\t<option value=\"100\"";
        // line 26
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "itemsForPage", array()) == 100)) {
            echo " selected=\"selected\"";
        }
        echo ">100</option>
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t";
        // line 28
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "voci per pagina", array(), "array"));
        echo "
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>\t\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group pull-right\">
\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t";
        // line 35
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "cerca", array(), "array"));
        echo ":
\t\t\t\t\t\t\t\t<input name=\"searchFromTable\" value=\"";
        // line 36
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["MySessionVars"] ?? null), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "sessionName", array()), array(), "array"), "srcTab", array(), "array");
        echo "\" class=\"form-control input-md\" type=\"search\" onchange=\"this.form.submit();\">
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"table-responsive\">
\t\t\t\t\t<table class=\"table table-striped table-bordered table-hover listData\">
\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t";
        // line 45
        if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "is_root", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "is_root", array()) === 1))) {
            // line 46
            echo "\t\t\t\t\t\t\t\t\t<th>ID</th>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
        }
        // line 48
        echo "\t\t\t\t\t\t\t\t<th>";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "nome", array(), "array"));
        echo "</th>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</thead>
\t\t\t\t\t\t<tbody>\t\t\t\t
\t\t\t\t\t\t\t";
        // line 53
        if ((twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "items", array())) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "items", array())) > 0))) {
            // line 54
            echo "\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "items", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 55
                echo "\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t";
                // line 56
                if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "is_root", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "is_root", array()) === 1))) {
                    echo "\t
\t\t\t\t\t\t\t\t\t\t\t<td>";
                    // line 57
                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 59
                echo "\t\t\t\t\t\t\t\t\t\t<td>";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "name", array());
                echo "</td>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<td class=\"actions\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"";
                // line 61
                echo ($context["URLSITE"] ?? null);
                echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                echo "/";
                echo (((twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "active", array()) == 1)) ? ("disactive") : ("active"));
                echo "Item/";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\" title=\"";
                echo (((twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "active", array()) == 1)) ? (twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "disattiva %ITEM%", array(), "array"), array("%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "la voce", array(), "array"))))) : (twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "attiva %ITEM%", array(), "array"), array("%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "la voce", array(), "array"))))));
                echo "\"><i class=\"fa fa-";
                echo (((twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "active", array()) == 1)) ? ("unlock") : ("lock"));
                echo "\"> </i></a>\t\t\t 
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"";
                // line 62
                echo ($context["URLSITE"] ?? null);
                echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                echo "/modifyItem/";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\" title=\"";
                echo twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "modifica %ITEM%", array(), "array"), array("%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "la voce", array(), "array"))));
                echo "\"><i class=\"fa fa-edit\"> </i></a>
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle confirm\" href=\"";
                // line 63
                echo ($context["URLSITE"] ?? null);
                echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                echo "/deleteItem/";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\" title=\"";
                echo twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "cancella %ITEM%", array(), "array"), array("%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "la voce", array(), "array"))));
                echo "\"><i class=\"fa fa-cut\"> </i></a>
\t\t\t\t\t\t\t\t\t\t</td>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</tr>\t
\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "\t\t\t\t\t\t\t";
        } else {
            // line 68
            echo "\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t";
            // line 69
            if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "is_root", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "is_root", array()) === 1))) {
                echo "<td></td>";
            }
            // line 70
            echo "\t\t\t\t\t\t\t\t\t<td colspan=\"2\">";
            echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "nessuna voce trovata!", array(), "array"));
            echo "</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t";
        }
        // line 73
        echo "\t\t\t\t\t\t</tbody>
\t\t\t\t\t</table>
\t\t\t\t</div>
\t\t\t\t<!-- /.table-responsive -->\t\t
\t\t\t\t";
        // line 77
        if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "itemsTotal", array()) > 0)) {
            // line 78
            echo "\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"dataTables_info\" id=\"dataTables_info\" role=\"alert\" aria-live=\"polite\" aria-relevant=\"all\">
\t\t\t\t\t\t\t";
            // line 81
            echo twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "mostra da %%START%% a %%END%% di %%ITEM%% elementi", array(), "array"), array("%%START%%" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "firstPartItem", array()), "%%END%%" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "lastPartItem", array()), "%%ITEM%%" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "itemsTotal", array()))));
            echo "
\t\t\t\t\t\t</div>\t
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"dataTables_paginate paging_simple_numbers\" id=\"dataTables_paginate\">
\t\t\t\t\t\t\t<ul class=\"pagination\">
\t\t\t\t\t\t\t\t<li class=\"paginate_button previous<?php if (\$this->App->pagination->page == 1) echo ' disabled'; ?>\">
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 88
            echo ($context["URLSITE"] ?? null);
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
            echo "/pageItem/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "itemPrevious", array());
            echo "\">";
            echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "precedente", array(), "array"));
            echo "</a>
\t\t\t\t\t\t\t\t</li>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            // line 90
            if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "pagePrevious", array()))) {
                // line 91
                echo "\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "pagePrevious", array()));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 92
                    echo "\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                    echo ($context["URLSITE"] ?? null);
                    echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                    echo "/pageItem/";
                    echo $context["value"];
                    echo "\">";
                    echo $context["value"];
                    echo "</a></li>
\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 94
                echo "\t\t\t\t\t\t\t\t";
            }
            echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<li class=\"active\"><a href=\"";
            // line 95
            echo ($context["URLSITE"] ?? null);
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
            echo "/pageItem/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "page", array());
            echo "\">";
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "page", array());
            echo "</a></li>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            // line 96
            if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "pageNext", array()))) {
                // line 97
                echo "\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "pageNext", array()));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 98
                    echo "\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                    echo ($context["URLSITE"] ?? null);
                    echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                    echo "/pageItem/";
                    echo $context["value"];
                    echo "\">";
                    echo $context["value"];
                    echo "</a></li>
\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 100
                echo "\t\t\t\t\t\t\t\t";
            }
            echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<li class=\"paginate_button next";
            // line 101
            if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "page", array()) >= twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "totalpage", array()))) {
                echo " disabled";
            }
            echo "\">
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 102
            echo ($context["URLSITE"] ?? null);
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
            echo "/pageItem/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "itemNext", array());
            echo "\">";
            echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "prossima", array(), "array"));
            echo "</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        }
        // line 109
        echo "\t\t\t</div>\t
\t\t\t<!-- /.form-inline wrapper -->
\t\t</div>
\t\t<!-- /.col-md-12 -->
\t</div>
</form>";
    }

    public function getTemplateName()
    {
        return "contacts/templates/default/listItem.tpl.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  325 => 109,  310 => 102,  304 => 101,  299 => 100,  285 => 98,  280 => 97,  278 => 96,  269 => 95,  264 => 94,  250 => 92,  245 => 91,  243 => 90,  233 => 88,  223 => 81,  218 => 78,  216 => 77,  210 => 73,  203 => 70,  199 => 69,  196 => 68,  193 => 67,  178 => 63,  169 => 62,  156 => 61,  150 => 59,  145 => 57,  141 => 56,  138 => 55,  133 => 54,  131 => 53,  122 => 48,  118 => 46,  116 => 45,  104 => 36,  100 => 35,  90 => 28,  83 => 26,  77 => 25,  71 => 24,  65 => 23,  59 => 22,  46 => 13,  35 => 7,  24 => 4,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- admin/contacts/listItem.tpl.php v.1.0.0. 16/02/2017 -->
<div class=\"row\">
\t<div class=\"col-md-3 new\">
 \t\t<a href=\"{{ URLSITE }}{{ CoreRequest.action }}/newItem\" title=\"{{ App.lang['inserisci nuova voce']|capitalize }}\" class=\"btn btn-primary\">{{ App.lang['nuova voce']|capitalize }}</a>
\t</div>
\t<div class=\"col-md-7 help-small-list\">
\t\t{% if App.params.help_small is defined %}{{ App.params.help_small }}{% endif %} 
\t</div>
\t<div class=\"col-md-2\">
\t</div>
</div>
<hr class=\"divider-top-module\">
<form role=\"form\" action=\"{{ URLSITE }}{{ CoreRequest.action }}/listItem\" method=\"post\" enctype=\"multipart/form-data\">
\t<div class=\"row\">
\t\t<div class=\"col-md-12\">\t\t\t
\t\t\t<div class=\"form-inline\" role=\"grid\">\t\t\t\t\t
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">\t\t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t<select class=\"form-control input-md\" name=\"itemsforpage\" onchange=\"this.form.submit();\" >
\t\t\t\t\t\t\t\t\t<option value=\"5\"{% if App.itemsForPage == 5 %} selected=\"selected\"{% endif %}>5</option>
\t\t\t\t\t\t\t\t\t<option value=\"10\"{% if App.itemsForPage == 10 %} selected=\"selected\"{% endif %}>10</option>
\t\t\t\t\t\t\t\t\t<option value=\"25\"{% if App.itemsForPage == 25 %} selected=\"selected\"{% endif %}>25</option>
\t\t\t\t\t\t\t\t\t<option value=\"50\"{% if App.itemsForPage == 50 %} selected=\"selected\"{% endif %}>50</option>
\t\t\t\t\t\t\t\t\t<option value=\"100\"{% if App.itemsForPage == 100 %} selected=\"selected\"{% endif %}>100</option>
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t{{ App.lang['voci per pagina']|capitalize }}
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>\t\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group pull-right\">
\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t{{ App.lang['cerca']|capitalize }}:
\t\t\t\t\t\t\t\t<input name=\"searchFromTable\" value=\"{{ MySessionVars[App.sessionName]['srcTab'] }}\" class=\"form-control input-md\" type=\"search\" onchange=\"this.form.submit();\">
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"table-responsive\">
\t\t\t\t\t<table class=\"table table-striped table-bordered table-hover listData\">
\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}
\t\t\t\t\t\t\t\t\t<th>ID</th>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t<th>{{ App.lang['nome']|capitalize }}</th>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</thead>
\t\t\t\t\t\t<tbody>\t\t\t\t
\t\t\t\t\t\t\t{% if App.items is iterable and App.items|length > 0 %}
\t\t\t\t\t\t\t\t{% for key,value in App.items %}
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}\t
\t\t\t\t\t\t\t\t\t\t\t<td>{{ value.id }}</td>
\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t<td>{{ value.name }}</td>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<td class=\"actions\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"{{ URLSITE }}{{ CoreRequest.action }}/{{ value.active == 1 ? 'disactive' : 'active' }}Item/{{ value.id  }}\" title=\"{{ value.active == 1 ? App.lang['disattiva %ITEM%']|replace({'%ITEM%': App.lang['la voce']})|capitalize : App.lang['attiva %ITEM%']|replace({'%ITEM%': App.lang['la voce']})|capitalize }}\"><i class=\"fa fa-{{ value.active == 1 ? 'unlock' : 'lock' }}\"> </i></a>\t\t\t 
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"{{ URLSITE }}{{ CoreRequest.action }}/modifyItem/{{ value.id }}\" title=\"{{ App.lang['modifica %ITEM%']|replace({'%ITEM%': App.lang['la voce']})|capitalize }}\"><i class=\"fa fa-edit\"> </i></a>
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle confirm\" href=\"{{ URLSITE }}{{ CoreRequest.action }}/deleteItem/{{ value.id }}\" title=\"{{ App.lang['cancella %ITEM%']|replace({'%ITEM%': App.lang['la voce']})|capitalize }}\"><i class=\"fa fa-cut\"> </i></a>
\t\t\t\t\t\t\t\t\t\t</td>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</tr>\t
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}<td></td>{% endif %}
\t\t\t\t\t\t\t\t\t<td colspan=\"2\">{{ App.lang['nessuna voce trovata!']|capitalize }}</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</tbody>
\t\t\t\t\t</table>
\t\t\t\t</div>
\t\t\t\t<!-- /.table-responsive -->\t\t
\t\t\t\t{% if App.pagination.itemsTotal > 0 %}
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"dataTables_info\" id=\"dataTables_info\" role=\"alert\" aria-live=\"polite\" aria-relevant=\"all\">
\t\t\t\t\t\t\t{{ App.lang['mostra da %%START%% a %%END%% di %%ITEM%% elementi']|replace({'%%START%%': App.pagination.firstPartItem, '%%END%%': App.pagination.lastPartItem,'%%ITEM%%': App.pagination.itemsTotal})|capitalize }}
\t\t\t\t\t\t</div>\t
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"dataTables_paginate paging_simple_numbers\" id=\"dataTables_paginate\">
\t\t\t\t\t\t\t<ul class=\"pagination\">
\t\t\t\t\t\t\t\t<li class=\"paginate_button previous<?php if (\$this->App->pagination->page == 1) echo ' disabled'; ?>\">
\t\t\t\t\t\t\t\t\t<a href=\"{{ URLSITE }}{{ CoreRequest.action }}/pageItem/{{ App.pagination.itemPrevious }}\">{{ App.lang['precedente']|capitalize }}</a>
\t\t\t\t\t\t\t\t</li>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% if App.pagination.pagePrevious is iterable %}
\t\t\t\t\t\t\t\t\t{%  for key,value in App.pagination.pagePrevious %}
\t\t\t\t\t\t\t\t\t\t<li><a href=\"{{ URLSITE }}{{ CoreRequest.action }}/pageItem/{{ value }}\">{{ value }}</a></li>
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t{% endif %}\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<li class=\"active\"><a href=\"{{ URLSITE }}{{ CoreRequest.action }}/pageItem/{{ App.pagination.page }}\">{{ App.pagination.page }}</a></li>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% if App.pagination.pageNext is iterable %}
\t\t\t\t\t\t\t\t\t{%  for key,value in App.pagination.pageNext %}
\t\t\t\t\t\t\t\t\t\t<li><a href=\"{{ URLSITE }}{{ CoreRequest.action }}/pageItem/{{ value }}\">{{ value }}</a></li>
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t{% endif %}\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<li class=\"paginate_button next{% if App.pagination.page >= App.pagination.totalpage %} disabled{% endif %}\">
\t\t\t\t\t\t\t\t\t<a href=\"{{ URLSITE }}{{ CoreRequest.action }}/pageItem/{{ App.pagination.itemNext }}\">{{ App.lang['prossima']|capitalize }}</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t{% endif %}
\t\t\t</div>\t
\t\t\t<!-- /.form-inline wrapper -->
\t\t</div>
\t\t<!-- /.col-md-12 -->
\t</div>
</form>", "contacts/templates/default/listItem.tpl.php", "/var/www/html/myprojects/application/contacts/templates/default/listItem.tpl.php");
    }
}
