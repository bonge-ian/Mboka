  @props(['step', 'title', 'overview', 'meta' => null, 'step_color' => 'uk-text-primary'])
  <article class="uk-panel">
      <div class="uk-grid uk-grid-medium"
           uk-grid>
          <div class="uk-width-auto">
              <p class="uk-text-lead uk-margin-remove-vertical uk-text-bold {{ $step_color }}">
                  {{ $step }}
              </p>
          </div>
          <div class="uk-width-expand">
              <h3 class="uk-card-title uk-text-bold uk-margin-small-bottom">
                  {{ $title }}
              </h3>
              <p class="uk-margin-remove-top uk-text-lead uk-margin-small-bottom">
                  {{ $overview }}
              </p>
              @if ($meta && !is_null($meta))
                  <p class="uk-margin-remove-top uk-text-muted">
                      {{ $meta }}
                  </p>
              @endif
          </div>
      </div>
  </article>
