<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* admin/view/template/marketplace/cron_list.twig */
class __TwigTemplate_40627027fc7acefe1a3652a1c49a518c extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<form id=\"form-cron\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
        yield ($context["action"] ?? null);
        yield "\" data-oc-target=\"#cron\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <th class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></th>
          <th><a href=\"";
        // line 7
        yield ($context["sort_code"] ?? null);
        yield "\"";
        if ((($context["sort"] ?? null) == "code")) {
            yield " class=\"";
            yield Twig\Extension\CoreExtension::lower($this->env->getCharset(), ($context["order"] ?? null));
            yield "\"";
        }
        yield ">";
        yield ($context["column_code"] ?? null);
        yield "</a></th>
          <th><a href=\"";
        // line 8
        yield ($context["sort_cycle"] ?? null);
        yield "\"";
        if ((($context["sort"] ?? null) == "cycle")) {
            yield " class=\"";
            yield Twig\Extension\CoreExtension::lower($this->env->getCharset(), ($context["order"] ?? null));
            yield "\"";
        }
        yield ">";
        yield ($context["column_cycle"] ?? null);
        yield "</a></th>
          <th><a href=\"";
        // line 9
        yield ($context["sort_action"] ?? null);
        yield "\"";
        if ((($context["sort"] ?? null) == "action")) {
            yield " class=\"";
            yield Twig\Extension\CoreExtension::lower($this->env->getCharset(), ($context["order"] ?? null));
            yield "\"";
        }
        yield ">";
        yield ($context["column_action"] ?? null);
        yield "</a></th>
          <th class=\"d-none d-lg-table-cell\"><a href=\"";
        // line 10
        yield ($context["sort_date_added"] ?? null);
        yield "\"";
        if ((($context["sort"] ?? null) == "date_added")) {
            yield " class=\"";
            yield Twig\Extension\CoreExtension::lower($this->env->getCharset(), ($context["order"] ?? null));
            yield "\"";
        }
        yield ">";
        yield ($context["column_date_added"] ?? null);
        yield "</a></th>
          <th class=\"d-none d-lg-table-cell\"><a href=\"";
        // line 11
        yield ($context["sort_date_modified"] ?? null);
        yield "\"";
        if ((($context["sort"] ?? null) == "date_modified")) {
            yield " class=\"";
            yield Twig\Extension\CoreExtension::lower($this->env->getCharset(), ($context["order"] ?? null));
            yield "\"";
        }
        yield ">";
        yield ($context["column_date_modified"] ?? null);
        yield "</a></th>
          <th class=\"text-end\">";
        // line 12
        yield ($context["column_action"] ?? null);
        yield "</th>
        </tr>
      </thead>
      <tbody>
        ";
        // line 16
        if (($context["crons"] ?? null)) {
            // line 17
            yield "          ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["crons"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["cron"]) {
                // line 18
                yield "            <tr";
                if ( !CoreExtension::getAttribute($this->env, $this->source, $context["cron"], "status", [], "any", false, false, false, 18)) {
                    yield " class=\"table-active opacity-50\"";
                }
                yield ">
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"";
                // line 19
                yield CoreExtension::getAttribute($this->env, $this->source, $context["cron"], "cron_id", [], "any", false, false, false, 19);
                yield "\" class=\"form-check-input\"/></td>
              <td>";
                // line 20
                yield CoreExtension::getAttribute($this->env, $this->source, $context["cron"], "code", [], "any", false, false, false, 20);
                yield "</td>
              <td>";
                // line 21
                yield CoreExtension::getAttribute($this->env, $this->source, $context["cron"], "cycle", [], "any", false, false, false, 21);
                yield "</td>
              <td>";
                // line 22
                yield CoreExtension::getAttribute($this->env, $this->source, $context["cron"], "action", [], "any", false, false, false, 22);
                yield "</td>
              <td class=\"d-none d-lg-table-cell\">";
                // line 23
                yield CoreExtension::getAttribute($this->env, $this->source, $context["cron"], "date_added", [], "any", false, false, false, 23);
                yield "</td>
              <td class=\"d-none d-lg-table-cell\">";
                // line 24
                yield CoreExtension::getAttribute($this->env, $this->source, $context["cron"], "date_modified", [], "any", false, false, false, 24);
                yield "</td>
              <td class=\"text-end text-nowrap\">
                ";
                // line 26
                if (CoreExtension::getAttribute($this->env, $this->source, $context["cron"], "description", [], "any", false, false, false, 26)) {
                    // line 27
                    yield "                  <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-cron-";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["cron"], "cron_id", [], "any", false, false, false, 27);
                    yield "\" class=\"btn btn-info\"><i class=\"fa-solid fa-info-circle\"></i></button>
                ";
                } else {
                    // line 29
                    yield "                  <button type=\"button\" class=\"btn btn-info\" disabled><i class=\"fa-solid fa-info-circle\"></i></button>
                ";
                }
                // line 31
                yield "                <button type=\"button\" value=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["cron"], "run", [], "any", false, false, false, 31);
                yield "\" data-bs-toggle=\"tooltip\" title=\"";
                yield ($context["button_run"] ?? null);
                yield "\" class=\"btn btn-warning\"><i class=\"fa-solid fa-play\"></i></button>
                ";
                // line 32
                if ( !CoreExtension::getAttribute($this->env, $this->source, $context["cron"], "status", [], "any", false, false, false, 32)) {
                    // line 33
                    yield "                  <button type=\"button\" value=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["cron"], "enable", [], "any", false, false, false, 33);
                    yield "\" data-bs-toggle=\"tooltip\" title=\"";
                    yield ($context["button_enable"] ?? null);
                    yield "\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></button>
                ";
                } else {
                    // line 35
                    yield "                  <button type=\"button\" value=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["cron"], "disable", [], "any", false, false, false, 35);
                    yield "\" data-bs-toggle=\"tooltip\" title=\"";
                    yield ($context["button_disable"] ?? null);
                    yield "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>
                ";
                }
                // line 36
                yield "</td>
            </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['cron'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            yield "        ";
        } else {
            // line 40
            yield "          <tr>
            <td class=\"text-center\" colspan=\"7\">";
            // line 41
            yield ($context["text_no_results"] ?? null);
            yield "</td>
          </tr>
        ";
        }
        // line 44
        yield "      </tbody>
    </table>
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">";
        // line 48
        yield ($context["pagination"] ?? null);
        yield "</div>
    <div class=\"col-sm-6 text-end\">";
        // line 49
        yield ($context["results"] ?? null);
        yield "</div>
  </div>
</form>
";
        // line 52
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["crons"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["cron"]) {
            // line 53
            yield "  ";
            if (CoreExtension::getAttribute($this->env, $this->source, $context["cron"], "description", [], "any", false, false, false, 53)) {
                // line 54
                yield "    <div id=\"modal-cron-";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["cron"], "cron_id", [], "any", false, false, false, 54);
                yield "\" class=\"modal\">
      <div class=\"modal-dialog\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <h5 class=\"modal-title\"><i class=\"fa-solid fa-info-circle\"></i> ";
                // line 58
                yield ($context["text_info"] ?? null);
                yield "</h5>
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
          </div>
          <div class=\"modal-body\"><textarea rows=\"5\" class=\"form-control\" readonly>";
                // line 61
                yield CoreExtension::getAttribute($this->env, $this->source, $context["cron"], "description", [], "any", false, false, false, 61);
                yield "</textarea></div>
        </div>
      </div>
    </div>
  ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['cron'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/view/template/marketplace/cron_list.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  252 => 61,  246 => 58,  238 => 54,  235 => 53,  231 => 52,  225 => 49,  221 => 48,  215 => 44,  209 => 41,  206 => 40,  203 => 39,  195 => 36,  187 => 35,  179 => 33,  177 => 32,  170 => 31,  166 => 29,  160 => 27,  158 => 26,  153 => 24,  149 => 23,  145 => 22,  141 => 21,  137 => 20,  133 => 19,  126 => 18,  121 => 17,  119 => 16,  112 => 12,  100 => 11,  88 => 10,  76 => 9,  64 => 8,  52 => 7,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<form id=\"form-cron\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"{{ action }}\" data-oc-target=\"#cron\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <th class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></th>
          <th><a href=\"{{ sort_code }}\"{% if sort == 'code' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_code }}</a></th>
          <th><a href=\"{{ sort_cycle }}\"{% if sort == 'cycle' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_cycle }}</a></th>
          <th><a href=\"{{ sort_action }}\"{% if sort == 'action' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_action }}</a></th>
          <th class=\"d-none d-lg-table-cell\"><a href=\"{{ sort_date_added }}\"{% if sort == 'date_added' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_date_added }}</a></th>
          <th class=\"d-none d-lg-table-cell\"><a href=\"{{ sort_date_modified }}\"{% if sort == 'date_modified' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_date_modified }}</a></th>
          <th class=\"text-end\">{{ column_action }}</th>
        </tr>
      </thead>
      <tbody>
        {% if crons %}
          {% for cron in crons %}
            <tr{% if not cron.status %} class=\"table-active opacity-50\"{% endif %}>
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"{{ cron.cron_id }}\" class=\"form-check-input\"/></td>
              <td>{{ cron.code }}</td>
              <td>{{ cron.cycle }}</td>
              <td>{{ cron.action }}</td>
              <td class=\"d-none d-lg-table-cell\">{{ cron.date_added }}</td>
              <td class=\"d-none d-lg-table-cell\">{{ cron.date_modified }}</td>
              <td class=\"text-end text-nowrap\">
                {% if cron.description %}
                  <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-cron-{{ cron.cron_id }}\" class=\"btn btn-info\"><i class=\"fa-solid fa-info-circle\"></i></button>
                {% else %}
                  <button type=\"button\" class=\"btn btn-info\" disabled><i class=\"fa-solid fa-info-circle\"></i></button>
                {% endif %}
                <button type=\"button\" value=\"{{ cron.run }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_run }}\" class=\"btn btn-warning\"><i class=\"fa-solid fa-play\"></i></button>
                {% if not cron.status %}
                  <button type=\"button\" value=\"{{ cron.enable }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_enable }}\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></button>
                {% else %}
                  <button type=\"button\" value=\"{{ cron.disable }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_disable }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>
                {% endif %}</td>
            </tr>
          {% endfor %}
        {% else %}
          <tr>
            <td class=\"text-center\" colspan=\"7\">{{ text_no_results }}</td>
          </tr>
        {% endif %}
      </tbody>
    </table>
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">{{ pagination }}</div>
    <div class=\"col-sm-6 text-end\">{{ results }}</div>
  </div>
</form>
{% for cron in crons %}
  {% if cron.description %}
    <div id=\"modal-cron-{{ cron.cron_id }}\" class=\"modal\">
      <div class=\"modal-dialog\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <h5 class=\"modal-title\"><i class=\"fa-solid fa-info-circle\"></i> {{ text_info }}</h5>
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
          </div>
          <div class=\"modal-body\"><textarea rows=\"5\" class=\"form-control\" readonly>{{ cron.description }}</textarea></div>
        </div>
      </div>
    </div>
  {% endif %}
{% endfor %}", "admin/view/template/marketplace/cron_list.twig", "/Users/saqibashraf/Desktop/upwork/public/upload/admin/view/template/marketplace/cron_list.twig");
    }
}
