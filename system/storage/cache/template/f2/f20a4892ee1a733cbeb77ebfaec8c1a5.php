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

/* admin/view/template/marketplace/event_list.twig */
class __TwigTemplate_a339745444c85b749d5d9f220984151e extends Template
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
        yield "<form id=\"form-event\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
        yield ($context["action"] ?? null);
        yield "\" data-oc-target=\"#event\">
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
          <th class=\"text-end d-none d-lg-table-cell\"><a href=\"";
        // line 8
        yield ($context["sort_sort_order"] ?? null);
        yield "\"";
        if ((($context["sort"] ?? null) == "sort_order")) {
            yield " class=\"";
            yield Twig\Extension\CoreExtension::lower($this->env->getCharset(), ($context["order"] ?? null));
            yield "\"";
        }
        yield ">";
        yield ($context["column_sort_order"] ?? null);
        yield "</a></th>
          <th class=\"text-end\">";
        // line 9
        yield ($context["column_action"] ?? null);
        yield "</th>
        </tr>
      </thead>
      <tbody>
        ";
        // line 13
        if (($context["events"] ?? null)) {
            // line 14
            yield "          ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["events"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
                // line 15
                yield "            <tr";
                if ( !CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 15)) {
                    yield " class=\"table-active opacity-50\"";
                }
                yield ">
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"";
                // line 16
                yield CoreExtension::getAttribute($this->env, $this->source, $context["event"], "event_id", [], "any", false, false, false, 16);
                yield "\" class=\"form-check-input\"/></td>
              <td>";
                // line 17
                yield CoreExtension::getAttribute($this->env, $this->source, $context["event"], "code", [], "any", false, false, false, 17);
                yield "</td>
              <td class=\"text-end d-none d-lg-table-cell\">";
                // line 18
                yield CoreExtension::getAttribute($this->env, $this->source, $context["event"], "sort_order", [], "any", false, false, false, 18);
                yield "</td>
              <td class=\"text-end text-nowrap\">";
                // line 19
                if (CoreExtension::getAttribute($this->env, $this->source, $context["event"], "description", [], "any", false, false, false, 19)) {
                    // line 20
                    yield "                <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-event-";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["event"], "event_id", [], "any", false, false, false, 20);
                    yield "\" class=\"btn btn-info\"><i class=\"fa-solid fa-info-circle\"></i></button>
              ";
                } else {
                    // line 22
                    yield "                <button type=\"button\" class=\"btn btn-info\" disabled><i class=\"fa-solid fa-info-circle\"></i></button>
              ";
                }
                // line 24
                yield "              ";
                if ( !CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 24)) {
                    // line 25
                    yield "                <button type=\"button\" value=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["event"], "enable", [], "any", false, false, false, 25);
                    yield "\" data-bs-toggle=\"tooltip\" title=\"";
                    yield ($context["button_enable"] ?? null);
                    yield "\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></button>
              ";
                } else {
                    // line 27
                    yield "                <button type=\"button\" value=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["event"], "disable", [], "any", false, false, false, 27);
                    yield "\" data-bs-toggle=\"tooltip\" title=\"";
                    yield ($context["button_disable"] ?? null);
                    yield "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>
              ";
                }
                // line 28
                yield "</td>
            </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['event'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            yield "        ";
        } else {
            // line 32
            yield "          <tr>
            <td class=\"text-center\" colspan=\"4\">";
            // line 33
            yield ($context["text_no_results"] ?? null);
            yield "</td>
          </tr>
        ";
        }
        // line 36
        yield "      </tbody>
    </table>
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">";
        // line 40
        yield ($context["pagination"] ?? null);
        yield "</div>
    <div class=\"col-sm-6 text-end\">";
        // line 41
        yield ($context["results"] ?? null);
        yield "</div>
  </div>
</form>
";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["events"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            // line 45
            yield "  <div id=\"modal-event-";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["event"], "event_id", [], "any", false, false, false, 45);
            yield "\" class=\"modal\">
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\"><i class=\"fa-solid fa-info-circle\"></i> ";
            // line 49
            yield ($context["text_info"] ?? null);
            yield "</h5>
          <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
        </div>
        <div class=\"modal-body\">
          <div class=\"mb-3\">
            <label class=\"form-label\">";
            // line 54
            yield ($context["entry_description"] ?? null);
            yield "</label>
            <textarea rows=\"5\" class=\"form-control\" readonly>";
            // line 55
            yield CoreExtension::getAttribute($this->env, $this->source, $context["event"], "description", [], "any", false, false, false, 55);
            yield "</textarea>
          </div>
          <div class=\"mb-3\">
            <label class=\"form-label\">";
            // line 58
            yield ($context["entry_trigger"] ?? null);
            yield "</label>
            <textarea class=\"form-control\" readonly>";
            // line 59
            yield CoreExtension::getAttribute($this->env, $this->source, $context["event"], "trigger", [], "any", false, false, false, 59);
            yield "</textarea>
          </div>
          <div>
            <label class=\"form-label\">";
            // line 62
            yield ($context["entry_action"] ?? null);
            yield "</label>
            <textarea class=\"form-control\" readonly>";
            // line 63
            yield CoreExtension::getAttribute($this->env, $this->source, $context["event"], "action", [], "any", false, false, false, 63);
            yield "</textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['event'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/view/template/marketplace/event_list.twig";
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
        return array (  220 => 63,  216 => 62,  210 => 59,  206 => 58,  200 => 55,  196 => 54,  188 => 49,  180 => 45,  176 => 44,  170 => 41,  166 => 40,  160 => 36,  154 => 33,  151 => 32,  148 => 31,  140 => 28,  132 => 27,  124 => 25,  121 => 24,  117 => 22,  111 => 20,  109 => 19,  105 => 18,  101 => 17,  97 => 16,  90 => 15,  85 => 14,  83 => 13,  76 => 9,  64 => 8,  52 => 7,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<form id=\"form-event\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"{{ action }}\" data-oc-target=\"#event\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <th class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></th>
          <th><a href=\"{{ sort_code }}\"{% if sort == 'code' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_code }}</a></th>
          <th class=\"text-end d-none d-lg-table-cell\"><a href=\"{{ sort_sort_order }}\"{% if sort == 'sort_order' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_sort_order }}</a></th>
          <th class=\"text-end\">{{ column_action }}</th>
        </tr>
      </thead>
      <tbody>
        {% if events %}
          {% for event in events %}
            <tr{% if not event.status %} class=\"table-active opacity-50\"{% endif %}>
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"{{ event.event_id }}\" class=\"form-check-input\"/></td>
              <td>{{ event.code }}</td>
              <td class=\"text-end d-none d-lg-table-cell\">{{ event.sort_order }}</td>
              <td class=\"text-end text-nowrap\">{% if event.description %}
                <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-event-{{ event.event_id }}\" class=\"btn btn-info\"><i class=\"fa-solid fa-info-circle\"></i></button>
              {% else %}
                <button type=\"button\" class=\"btn btn-info\" disabled><i class=\"fa-solid fa-info-circle\"></i></button>
              {% endif %}
              {% if not event.status %}
                <button type=\"button\" value=\"{{ event.enable }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_enable }}\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></button>
              {% else %}
                <button type=\"button\" value=\"{{ event.disable }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_disable }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>
              {% endif %}</td>
            </tr>
          {% endfor %}
        {% else %}
          <tr>
            <td class=\"text-center\" colspan=\"4\">{{ text_no_results }}</td>
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
{% for event in events %}
  <div id=\"modal-event-{{ event.event_id }}\" class=\"modal\">
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\"><i class=\"fa-solid fa-info-circle\"></i> {{ text_info }}</h5>
          <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
        </div>
        <div class=\"modal-body\">
          <div class=\"mb-3\">
            <label class=\"form-label\">{{ entry_description }}</label>
            <textarea rows=\"5\" class=\"form-control\" readonly>{{ event.description }}</textarea>
          </div>
          <div class=\"mb-3\">
            <label class=\"form-label\">{{ entry_trigger }}</label>
            <textarea class=\"form-control\" readonly>{{ event.trigger }}</textarea>
          </div>
          <div>
            <label class=\"form-label\">{{ entry_action }}</label>
            <textarea class=\"form-control\" readonly>{{ event.action }}</textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
{% endfor %}", "admin/view/template/marketplace/event_list.twig", "/Users/saqibashraf/Desktop/upwork/public/upload/admin/view/template/marketplace/event_list.twig");
    }
}
