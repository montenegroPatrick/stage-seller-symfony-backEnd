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

/* partials/navbar.html.twig */
class __TwigTemplate_b08f1e28c6b8d81788a0c1532aff116ea0fd9bc07b7daf2e8047e4819f9dbc0d extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/navbar.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/navbar.html.twig"));

        // line 1
        echo "<!-- Main navigation container -->
<nav
  class=\"relative flex w-full flex-wrap items-center justify-between bg-neutral-900 py-2 text-neutral-200 shadow-lg lg:flex-wrap lg:justify-start lg:py-4\"
  data-te-navbar-ref>
  <div class=\"flex w-full flex-wrap items-center justify-between px-3\">
    <!-- Collapsible navigation container -->
    <div
      class=\"!visible mt-2 hidden flex-grow basis-[100%] items-center lg:mt-0 lg:!flex lg:basis-auto\"
      id=\"navbarSupportedContent4\"
      data-te-collapse-item>
      <!-- Left navigation links -->
      <ul
        class=\"list-style-none mr-auto flex flex-col pl-0 lg:flex-row\"
        data-te-navbar-nav-ref>
        <!-- Dashboard link -->
        <li class=\"my-4 lg:my-0 lg:pr-2\" data-te-nav-item-ref>
          <a
            class=\"text-white disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400\"
            href=\"";
        // line 19
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_backoffice_user_index");
        echo "\"
            data-te-nav-link-ref
            ><i class=\"fa-solid fa-house\"></i></a
          >
        </li>
      </ul>
    </div>

    <!-- Right elements -->
    <div class=\"relative flex items-center\">
        ";
        // line 29
        if (twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 29, $this->source); })()), "user", [], "any", false, false, false, 29)) {
            // line 30
            echo "          <p
            class=\"text-white disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400\"
            data-te-nav-link-ref
          >";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 33, $this->source); })()), "user", [], "any", false, false, false, 33), "email", [], "any", false, false, false, 33), "html", null, true);
            echo "</p
        ";
        }
        // line 35
        echo "
      <!-- Second dropdown container -->
      <div class=\"relative\" data-te-dropdown-ref>
        <!-- Second dropdown trigger -->
        <a href=\"";
        // line 39
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        echo "\" class=\"text-sm  text-blue-600 dark:text-blue-500 hover:underline\">Logout</a>
      </div>
    </div>
  </div>
</nav>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "partials/navbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 39,  88 => 35,  83 => 33,  78 => 30,  76 => 29,  63 => 19,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!-- Main navigation container -->
<nav
  class=\"relative flex w-full flex-wrap items-center justify-between bg-neutral-900 py-2 text-neutral-200 shadow-lg lg:flex-wrap lg:justify-start lg:py-4\"
  data-te-navbar-ref>
  <div class=\"flex w-full flex-wrap items-center justify-between px-3\">
    <!-- Collapsible navigation container -->
    <div
      class=\"!visible mt-2 hidden flex-grow basis-[100%] items-center lg:mt-0 lg:!flex lg:basis-auto\"
      id=\"navbarSupportedContent4\"
      data-te-collapse-item>
      <!-- Left navigation links -->
      <ul
        class=\"list-style-none mr-auto flex flex-col pl-0 lg:flex-row\"
        data-te-navbar-nav-ref>
        <!-- Dashboard link -->
        <li class=\"my-4 lg:my-0 lg:pr-2\" data-te-nav-item-ref>
          <a
            class=\"text-white disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400\"
            href=\"{{ path('app_backoffice_user_index') }}\"
            data-te-nav-link-ref
            ><i class=\"fa-solid fa-house\"></i></a
          >
        </li>
      </ul>
    </div>

    <!-- Right elements -->
    <div class=\"relative flex items-center\">
        {% if app.user %}
          <p
            class=\"text-white disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400\"
            data-te-nav-link-ref
          >{{ app.user.email }}</p
        {% endif %}

      <!-- Second dropdown container -->
      <div class=\"relative\" data-te-dropdown-ref>
        <!-- Second dropdown trigger -->
        <a href=\"{{ path('app_logout') }}\" class=\"text-sm  text-blue-600 dark:text-blue-500 hover:underline\">Logout</a>
      </div>
    </div>
  </div>
</nav>", "partials/navbar.html.twig", "/var/www/html/templates/partials/navbar.html.twig");
    }
}
