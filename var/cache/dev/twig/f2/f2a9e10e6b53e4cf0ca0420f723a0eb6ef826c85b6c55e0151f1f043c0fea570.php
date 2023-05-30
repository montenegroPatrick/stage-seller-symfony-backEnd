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

/* backoffice/user/show.html.twig */
class __TwigTemplate_330657c78b14443aa64b9deded2060e5a063d7b202d88d24e33b105a2d0e3e1a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "backoffice/user/show.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "backoffice/user/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "backoffice/user/show.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "User";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "<div class=\"p-4 sm:ml-64\">
    <table class=\"min-w-full text-center text-sm font-light\">
        <tbody>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Id</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 11, $this->source); })()), "id", [], "any", false, false, false, 11), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Email</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 15, $this->source); })()), "email", [], "any", false, false, false, 15), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Roles</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 19
        ((twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 19, $this->source); })()), "roles", [], "any", false, false, false, 19)) ? (print (twig_escape_filter($this->env, json_encode(twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 19, $this->source); })()), "roles", [], "any", false, false, false, 19)), "html", null, true))) : (print ("")));
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Type</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 23, $this->source); })()), "type", [], "any", false, false, false, 23), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">CompanyName</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 27, $this->source); })()), "companyName", [], "any", false, false, false, 27), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Siret</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 31
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 31, $this->source); })()), "siret", [], "any", false, false, false, 31), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">FirstName</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 35
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 35, $this->source); })()), "firstName", [], "any", false, false, false, 35), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">LastName</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 39, $this->source); })()), "lastName", [], "any", false, false, false, 39), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Address</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 43
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 43, $this->source); })()), "address", [], "any", false, false, false, 43), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">PostCode</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 47
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 47, $this->source); })()), "postCode", [], "any", false, false, false, 47), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">City</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 51
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 51, $this->source); })()), "city", [], "any", false, false, false, 51), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">IsUserActive</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 55
        echo ((twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 55, $this->source); })()), "isUserActive", [], "any", false, false, false, 55)) ? ("Yes") : ("No"));
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">ShowTuto</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 59
        echo ((twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 59, $this->source); })()), "showTuto", [], "any", false, false, false, 59)) ? ("Yes") : ("No"));
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">IsProfileCompleted</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 63
        echo ((twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 63, $this->source); })()), "isProfileCompleted", [], "any", false, false, false, 63)) ? ("Yes") : ("No"));
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">ProfileImage</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 67
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 67, $this->source); })()), "profileImage", [], "any", false, false, false, 67), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Description</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 71
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 71, $this->source); })()), "description", [], "any", false, false, false, 71), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Resume</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 75
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 75, $this->source); })()), "resume", [], "any", false, false, false, 75), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Linkedin</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 79
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 79, $this->source); })()), "linkedin", [], "any", false, false, false, 79), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Github</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 83
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 83, $this->source); })()), "github", [], "any", false, false, false, 83), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">LastConnected</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 87
        ((twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 87, $this->source); })()), "lastConnected", [], "any", false, false, false, 87)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 87, $this->source); })()), "lastConnected", [], "any", false, false, false, 87), "Y-m-d H:i:s"), "html", null, true))) : (print ("")));
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">CreatedAt</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 91
        ((twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 91, $this->source); })()), "createdAt", [], "any", false, false, false, 91)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 91, $this->source); })()), "createdAt", [], "any", false, false, false, 91), "Y-m-d H:i:s"), "html", null, true))) : (print ("")));
        echo "</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">UpdatedAt</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">";
        // line 95
        ((twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 95, $this->source); })()), "updatedAt", [], "any", false, false, false, 95)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 95, $this->source); })()), "updatedAt", [], "any", false, false, false, 95), "Y-m-d H:i:s"), "html", null, true))) : (print ("")));
        echo "</td>
            </tr>
        </tbody>
    </table>
    <div class=\"mt-4 flex justify-center\">
        <a href=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_backoffice_user_edit", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 100, $this->source); })()), "id", [], "any", false, false, false, 100)]), "html", null, true);
        echo "\">
        <button type=\"button\" class=\"focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900\">Edit</button></a>
        ";
        // line 102
        echo twig_include($this->env, $context, "backoffice/user/_delete_form.html.twig");
        echo "
        ";
        // line 103
        echo twig_include($this->env, $context, "partials/modal_delete.html.twig");
        echo "
    </div>
</div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "backoffice/user/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  259 => 103,  255 => 102,  250 => 100,  242 => 95,  235 => 91,  228 => 87,  221 => 83,  214 => 79,  207 => 75,  200 => 71,  193 => 67,  186 => 63,  179 => 59,  172 => 55,  165 => 51,  158 => 47,  151 => 43,  144 => 39,  137 => 35,  130 => 31,  123 => 27,  116 => 23,  109 => 19,  102 => 15,  95 => 11,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}User{% endblock %}

{% block body %}
<div class=\"p-4 sm:ml-64\">
    <table class=\"min-w-full text-center text-sm font-light\">
        <tbody>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Id</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.id }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Email</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.email }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Roles</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.roles ? user.roles|json_encode : '' }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Type</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.type }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">CompanyName</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.companyName }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Siret</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.siret }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">FirstName</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.firstName }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">LastName</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.lastName }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Address</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.address }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">PostCode</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.postCode }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">City</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.city }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">IsUserActive</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.isUserActive ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">ShowTuto</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.showTuto ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">IsProfileCompleted</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.isProfileCompleted ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">ProfileImage</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.profileImage }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Description</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.description }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Resume</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.resume }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Linkedin</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.linkedin }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">Github</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.github }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">LastConnected</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.lastConnected ? user.lastConnected|date('Y-m-d H:i:s') : '' }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">CreatedAt</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.createdAt ? user.createdAt|date('Y-m-d H:i:s') : '' }}</td>
            </tr>
            <tr>
                <th class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">UpdatedAt</th>
                <td class=\"border-b dark:border-neutral-500 whitespace-nowrap  px-6 py-4 font-medium\">{{ user.updatedAt ? user.updatedAt|date('Y-m-d H:i:s') : '' }}</td>
            </tr>
        </tbody>
    </table>
    <div class=\"mt-4 flex justify-center\">
        <a href=\"{{ path('app_backoffice_user_edit', {'id': user.id}) }}\">
        <button type=\"button\" class=\"focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900\">Edit</button></a>
        {{ include(\"backoffice/user/_delete_form.html.twig\") }}
        {{ include(\"partials/modal_delete.html.twig\") }}
    </div>
</div>

{% endblock %}", "backoffice/user/show.html.twig", "/var/www/html/templates/backoffice/user/show.html.twig");
    }
}
