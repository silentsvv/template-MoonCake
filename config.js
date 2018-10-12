module.exports = {
  {{#if_eq framework "qucskin"}}
  framework: 'qucskin',
  {{/if_eq}}
  {{#if_eq framework "laraval"}}
  framework: 'laraval',
  {{/if_eq}}
}