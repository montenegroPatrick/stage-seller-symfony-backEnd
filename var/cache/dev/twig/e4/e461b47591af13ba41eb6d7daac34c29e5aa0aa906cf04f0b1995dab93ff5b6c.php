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

/* backoffice/user/index.html.twig */
class __TwigTemplate_2397af25fc1736e59b621807639c5495916ccf87fca04b9bfdedb31aba7c6df2 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "backoffice/user/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "backoffice/user/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "backoffice/user/index.html.twig", 1);
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

        echo "StageSeller | User";
        
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
        echo "  <div class=\"p-4 sm:ml-64\">
      ";
        // line 7
        echo twig_include($this->env, $context, "partials/modal_delete.html.twig");
        echo "
  <a href=\"";
        // line 8
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_backoffice_user_new");
        echo "\">
  <button type=\"button\" class=\"text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800\">New User</i></button></a>
    <div class=\"flex flex-col\">
      <div class=\"overflow-x-auto sm:-mx-6 lg:-mx-8\">
        <div class=\"inline-block min-w-full py-2 sm:px-6 lg:px-8\">
          <div class=\"overflow-hidden\">
            <table class=\"min-w-full text-center text-sm font-light\">
              <thead
                class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">
                <tr>
                  <th scope=\"col\" class=\" px-6 py-4\">ID</th>
                  <th scope=\"col\" class=\" px-6 py-4\">Email</th>
                  <th scope=\"col\" class=\" px-6 py-4\">Firstname</th>
                  <th scope=\"col\" class=\" px-6 py-4\">Lastname</th>
                  <th scope=\"col\" class=\" px-6 py-4\">Type</th>
                  <th scope=\"col\" class=\" px-6 py-4\">Options</th>
                </tr>
              </thead>
              <tbody>
                ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 27, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 28
            echo "                <tr class=\"border-b dark:border-neutral-500\">
                  <td class=\"whitespace-nowrap  px-6 py-4 font-medium\">";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 29), "html", null, true);
            echo "</td>
                  <td class=\"whitespace-nowrap  px-6 py-4\">";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 30), "html", null, true);
            echo "</td>
                  <td class=\"whitespace-nowrap  px-6 py-4\">";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "firstname", [], "any", false, false, false, 31), "html", null, true);
            echo "</td>
                  <td class=\"whitespace-nowrap  px-6 py-4\">";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "lastname", [], "any", false, false, false, 32), "html", null, true);
            echo "</td>
                  <td class=\"whitespace-nowrap  px-6 py-4\">";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "type", [], "any", false, false, false, 33), "html", null, true);
            echo "</td>
                  <td class=\"flex justify-center whitespace-nowrap  px-6 py-4\">
                  <a href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_backoffice_user_show", ["id" => twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 35)]), "html", null, true);
            echo "\">show</a>
                  </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "backoffice/user/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 39,  145 => 35,  140 => 33,  136 => 32,  132 => 31,  128 => 30,  124 => 29,  121 => 28,  117 => 27,  95 => 8,  91 => 7,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}StageSeller | User{% endblock %}

{% block body %}
  <div class=\"p-4 sm:ml-64\">
      {{ include(\"partials/modal_delete.html.twig\") }}
  <a href=\"{{ path('app_backoffice_user_new') }}\">
  <button type=\"button\" class=\"text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800\">New User</i></button></a>
    <div class=\"flex flex-col\">
      <div class=\"overflow-x-auto sm:-mx-6 lg:-mx-8\">
        <div class=\"inline-block min-w-full py-2 sm:px-6 lg:px-8\">
          <div class=\"overflow-hidden\">
            <table class=\"min-w-full text-center text-sm font-light\">
              <thead
                class=\"border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900\">
                <tr>
                  <th scope=\"col\" class=\" px-6 py-4\">ID</th>
                  <th scope=\"col\" class=\" px-6 py-4\">Email</th>
                  <th scope=\"col\" class=\" px-6 py-4\">Firstname</th>
                  <th scope=\"col\" class=\" px-6 py-4\">Lastname</th>
                  <th scope=\"col\" class=\" px-6 py-4\">Type</th>
                  <th scope=\"col\" class=\" px-6 py-4\">Options</th>
                </tr>
              </thead>
              <tbody>
                {% for user in users %}
                <tr class=\"border-b dark:border-neutral-500\">
                  <td class=\"whitespace-nowrap  px-6 py-4 font-medium\">{{user.id}}</td>
                  <td class=\"whitespace-nowrap  px-6 py-4\">{{user.email}}</td>
                  <td class=\"whitespace-nowrap  px-6 py-4\">{{user.firstname}}</td>
                  <td class=\"whitespace-nowrap  px-6 py-4\">{{user.lastname}}</td>
                  <td class=\"whitespace-nowrap  px-6 py-4\">{{user.type}}</td>
                  <td class=\"flex justify-center whitespace-nowrap  px-6 py-4\">
                  <a href=\"{{ path('app_backoffice_user_show', {'id': user.id}) }}\">show</a>
                  </td>
                </tr>
                {% endfor %}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
{% endblock %}
", "backoffice/user/index.html.twig", "/var/www/html/templates/backoffice/user/index.html.twig");
    }
}
