/**
 * Bootbox.js — alert, confirm, prompt, and flexible dialogs for the Bootstrap framework 
 * @version: 6.0.0
 * @project: https://github.com/makeusabrew/bootbox
 * @license: MIT http://bootboxjs.com/license.txt
 */
!function(t,e){'use strict';'function'==typeof define&&define.amd?define(['jquery'],e):'object'==typeof exports?module.exports=e(require('jquery')):t.bootbox=e(t.jQuery)}(this,function e(s,c){'use strict';let r={};r.VERSION='6.0.0';let l={en:{OK:'OK',CANCEL:'Cancel',CONFIRM:'OK'}},u={dialog:'<div class="bootbox modal" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-body"><div class="bootbox-body"></div></div></div></div></div>',header:'<div class="modal-header"><h5 class="modal-title"></h5></div>',footer:'<div class="modal-footer"></div>',closeButton:'<button type="button" class="bootbox-close-button close btn-close" aria-hidden="true" aria-label="Close"></button>',form:'<form class="bootbox-form"></form>',button:'<button type="button" class="btn"></button>',option:'<option value=""></option>',promptMessage:'<div class="bootbox-prompt-message"></div>',inputs:{text:'<input class="bootbox-input bootbox-input-text form-control" autocomplete="off" type="text" />',textarea:'<textarea class="bootbox-input bootbox-input-textarea form-control"></textarea>',email:'<input class="bootbox-input bootbox-input-email form-control" autocomplete="off" type="email" />',select:'<select class="bootbox-input bootbox-input-select form-select"></select>',checkbox:'<div class="form-check checkbox"><label class="form-check-label"><input class="form-check-input bootbox-input bootbox-input-checkbox" type="checkbox" /></label></div>',radio:'<div class="form-check radio"><label class="form-check-label"><input class="form-check-input bootbox-input bootbox-input-radio" type="radio" name="bootbox-radio" /></label></div>',date:'<input class="bootbox-input bootbox-input-date form-control" autocomplete="off" type="date" />',time:'<input class="bootbox-input bootbox-input-time form-control" autocomplete="off" type="time" />',number:'<input class="bootbox-input bootbox-input-number form-control" autocomplete="off" type="number" />',password:'<input class="bootbox-input bootbox-input-password form-control" autocomplete="off" type="password" />',range:'<input class="bootbox-input bootbox-input-range form-control-range" autocomplete="off" type="range" />'}},p={locale:'en',backdrop:'static',animate:!0,className:null,closeButton:!0,show:!0,container:'body',value:'',inputType:'text',errorMessage:null,swapButtonOrder:!1,centerVertical:!1,multiple:!1,scrollable:!1,reusable:!1,relatedTarget:null,size:null,id:null};function i(t,e,o){return s.extend(!0,{},t,function(t,e){var o=t.length;let a={};if(o<1||2<o)throw new Error('Invalid argument length');return 2===o||'string'==typeof t[0]?(a[e[0]]=t[0],a[e[1]]=t[1]):a=t[0],a}(e,o))}function d(t,e,a,r){let o;r&&r[0]&&(o=r[0].locale||p.locale,(r[0].swapButtonOrder||p.swapButtonOrder)&&(e=e.reverse()));t={className:'bootbox-'+t,buttons:function(o,a){let r={};for(let e=0,t=o.length;e<t;e++){let t=o[e];var n=t.toLowerCase(),i=t.toUpperCase();r[n]={label:function(t,e){e=l[e];return(e||l.en)[t]}(i,a)}}return r}(e,o)};{t=i(t,r,a);var n=e;let o={};return f(n,function(t,e){o[e]=!0}),f(t.buttons,function(t){if(o[t]===c)throw new Error('button key "'+t+'" is not allowed (options are '+n.join(' ')+')')}),t}}function b(t){return Object.keys(t).length}function f(t,o){let a=0;s.each(t,function(t,e){o(t,e,a++)})}function m(t){t.data.dialog.find('.bootbox-accept').first().trigger('focus')}function h(t){t.target===t.data.dialog[0]&&t.data.dialog.remove()}function w(t){t.target===t.data.dialog[0]&&(t.data.dialog.off('escape.close.bb'),t.data.dialog.off('click'))}function g(t,e,o){t.stopPropagation(),t.preventDefault(),s.isFunction(o)&&!1===o.call(e,t)||e.modal('hide')}function x(t){return/([01][0-9]|2[0-3]):[0-5][0-9]?:[0-5][0-9]/.test(t)}function v(t){return/(\d{4})-(\d{2})-(\d{2})/.test(t)}return r.locales=function(t){return t?l[t]:l},r.addLocale=function(t,o){return s.each(['OK','CANCEL','CONFIRM'],function(t,e){if(!o[e])throw new Error('Please supply a translation for "'+e+'"')}),l[t]={OK:o.OK,CANCEL:o.CANCEL,CONFIRM:o.CONFIRM},r},r.removeLocale=function(t){if('en'===t)throw new Error('"en" is used as the default and fallback locale and cannot be removed.');return delete l[t],r},r.setLocale=function(t){return r.setDefaults('locale',t)},r.setDefaults=function(){let t={};return 2===arguments.length?t[arguments[0]]=arguments[1]:t=arguments[0],s.extend(p,t),r},r.hideAll=function(){return s('.bootbox').modal('hide'),r},r.init=function(t){return e(t||s)},r.dialog=function(e){if(s.fn.modal===c)throw new Error('"$.fn.modal" is not defined; please double check you have included the Bootstrap JavaScript library. See https://getbootstrap.com/docs/5.1/getting-started/introduction/ for more details.');e=function(a){let r,n;if('object'!=typeof a)throw new Error('Please supply an object of options');if(!a.message)throw new Error('"message" option must not be null or an empty string.');(a=s.extend({},p,a)).backdrop?a.backdrop='string'!=typeof a.backdrop||'static'!==a.backdrop.toLowerCase()||'static':a.backdrop=!1!==a.backdrop&&0!==a.backdrop&&'static';a.buttons||(a.buttons={});return r=a.buttons,n=b(r),f(r,function(t,e,o){if(s.isFunction(e)&&(e=r[t]={callback:e}),'object'!==s.type(e))throw new Error('button with key "'+t+'" must be an object');if(e.label||(e.label=t),!e.className){let t=!1;t=a.swapButtonOrder?0===o:o===n-1,n<=2&&t?e.className='btn-primary':e.className='btn-secondary btn-default'}}),a}(e),s.fn.modal.Constructor.VERSION?(e.fullBootstrapVersion=s.fn.modal.Constructor.VERSION,i=e.fullBootstrapVersion.indexOf('.'),e.bootstrap=e.fullBootstrapVersion.substring(0,i)):(e.bootstrap='2',e.fullBootstrapVersion='2.3.2',console.warn('Bootbox will *mostly* work with Bootstrap 2, but we do not officially support it. Please upgrade, if possible.'));let o=s(u.dialog),t=o.find('.modal-dialog'),a=o.find('.modal-body'),r=s(u.header),n=s(u.footer);var i=e.buttons;let l={onEscape:e.onEscape};if(a.find('.bootbox-body').html(e.message),0<b(e.buttons)&&(f(i,function(t,e){let o=s(u.button);switch(o.data('bb-handler',t),o.addClass(e.className),t){case'ok':case'confirm':o.addClass('bootbox-accept');break;case'cancel':o.addClass('bootbox-cancel')}o.html(e.label),e.id&&o.attr({id:e.id}),!0===e.disabled&&o.prop({disabled:!0}),n.append(o),l[t]=e.callback}),a.after(n)),!0===e.animate&&o.addClass('fade'),e.className&&o.addClass(e.className),e.id&&o.attr({id:e.id}),e.size)switch(e.fullBootstrapVersion.substring(0,3)<'3.1'&&console.warn('"size" requires Bootstrap 3.1.0 or higher. You appear to be using '+e.fullBootstrapVersion+'. Please upgrade to use this option.'),e.size){case'small':case'sm':t.addClass('modal-sm');break;case'large':case'lg':t.addClass('modal-lg');break;case'extra-large':case'xl':t.addClass('modal-xl'),e.fullBootstrapVersion.substring(0,3)<'4.2'&&console.warn('Using size "xl"/"extra-large" requires Bootstrap 4.2.0 or higher. You appear to be using '+e.fullBootstrapVersion+'. Please upgrade to use this option.')}if(e.scrollable&&(t.addClass('modal-dialog-scrollable'),e.fullBootstrapVersion.substring(0,3)<'4.3'&&console.warn('Using "scrollable" requires Bootstrap 4.3.0 or higher. You appear to be using '+e.fullBootstrapVersion+'. Please upgrade to use this option.')),e.title||e.closeButton){if(e.title?r.find('.modal-title').html(e.title):r.addClass('border-0'),e.closeButton){let t=s(u.closeButton);e.bootstrap<5&&t.html('&times;'),e.bootstrap<4?r.prepend(t):r.append(t)}a.before(r)}if(e.centerVertical&&(t.addClass('modal-dialog-centered'),e.fullBootstrapVersion<'4.0.0'&&console.warn('"centerVertical" requires Bootstrap 4.0.0-beta.3 or higher. You appear to be using '+e.fullBootstrapVersion+'. Please upgrade to use this option.')),e.reusable||(o.one('hide.bs.modal',{dialog:o},w),o.one('hidden.bs.modal',{dialog:o},h)),e.onHide){if(!s.isFunction(e.onHide))throw new Error('Argument supplied to "onHide" must be a function');o.on('hide.bs.modal',e.onHide)}if(e.onHidden){if(!s.isFunction(e.onHidden))throw new Error('Argument supplied to "onHidden" must be a function');o.on('hidden.bs.modal',e.onHidden)}if(e.onShow){if(!s.isFunction(e.onShow))throw new Error('Argument supplied to "onShow" must be a function');o.on('show.bs.modal',e.onShow)}if(o.one('shown.bs.modal',{dialog:o},m),e.onShown){if(!s.isFunction(e.onShown))throw new Error('Argument supplied to "onShown" must be a function');o.on('shown.bs.modal',e.onShown)}if(!0===e.backdrop){let e=!1;o.on('mousedown','.modal-content',function(t){t.stopPropagation(),e=!0}),o.on('click.dismiss.bs.modal',function(t){e||t.target!==t.currentTarget||o.trigger('escape.close.bb')})}return o.on('escape.close.bb',function(t){l.onEscape&&g(t,o,l.onEscape)}),o.on('click','.modal-footer button:not(.disabled)',function(t){var e=s(this).data('bb-handler');e!==c&&g(t,o,l[e])}),o.on('click','.bootbox-close-button',function(t){g(t,o,l.onEscape)}),o.on('keyup',function(t){27===t.which&&o.trigger('escape.close.bb')}),s(e.container).append(o),o.modal({backdrop:e.backdrop,keyboard:!1,show:!1}),e.show&&o.modal('show',e.relatedTarget),o},r.alert=function(){let t;if((t=d('alert',['ok'],['message','callback'],arguments)).callback&&!s.isFunction(t.callback))throw new Error('alert requires the "callback" property to be a function when provided');return t.buttons.ok.callback=t.onEscape=function(){return!s.isFunction(t.callback)||t.callback.call(this)},r.dialog(t)},r.confirm=function(){let t;if(t=d('confirm',['cancel','confirm'],['message','callback'],arguments),s.isFunction(t.callback))return t.buttons.cancel.callback=t.onEscape=function(){return t.callback.call(this,!1)},t.buttons.confirm.callback=function(){return t.callback.call(this,!0)},r.dialog(t);throw new Error('confirm requires a callback')},r.prompt=function(){let n,e,t,i;var o,a;let l;if(t=s(u.form),(n=d('prompt',['cancel','confirm'],['title','callback'],arguments)).value||(n.value=p.value),n.inputType||(n.inputType=p.inputType),o=(n.show===c?p:n).show,n.show=!1,n.buttons.cancel.callback=n.onEscape=function(){return n.callback.call(this,null)},n.buttons.confirm.callback=function(){let e;if('checkbox'===n.inputType)e=i.find('input:checked').map(function(){return s(this).val()}).get();else if('radio'===n.inputType)e=i.find('input:checked').val();else{let t=i[0];if(n.errorMessage&&t.setCustomValidity(''),t.checkValidity&&!t.checkValidity())return n.errorMessage&&t.setCustomValidity(n.errorMessage),t.reportValidity&&t.reportValidity(),!1;e='select'===n.inputType&&!0===n.multiple?i.find('option:selected').map(function(){return s(this).val()}).get():i.val()}return n.callback.call(this,e)},!n.title)throw new Error('prompt requires a title');if(!s.isFunction(n.callback))throw new Error('prompt requires a callback');if(!u.inputs[n.inputType])throw new Error('Invalid prompt type');switch(i=s(u.inputs[n.inputType]),n.inputType){case'text':case'textarea':case'email':case'password':i.val(n.value),n.placeholder&&i.attr('placeholder',n.placeholder),n.pattern&&i.attr('pattern',n.pattern),n.maxlength&&i.attr('maxlength',n.maxlength),n.required&&i.prop({required:!0}),n.rows&&!isNaN(parseInt(n.rows))&&'textarea'===n.inputType&&i.attr({rows:n.rows});break;case'date':case'time':case'number':case'range':if(i.val(n.value),n.placeholder&&i.attr('placeholder',n.placeholder),n.pattern?i.attr('pattern',n.pattern):'date'===n.inputType?i.attr('pattern','d{4}-d{2}-d{2}'):'time'===n.inputType&&i.attr('pattern','d{2}:d{2}'),n.required&&i.prop({required:!0}),'date'!==n.inputType&&n.step){if(!('any'===n.step||!isNaN(n.step)&&0<parseFloat(n.step)))throw new Error('"step" must be a valid positive number or the value "any". See https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-step for more information.');i.attr('step',n.step)}!function(t,e,o){let a=!1,r=!0,n=!0;if('date'===t)e===c||(r=v(e))?o===c||(n=v(o))||console.warn('Browsers which natively support the "date" input type expect date values to be of the form "YYYY-MM-DD" (see ISO-8601 https://www.iso.org/iso-8601-date-and-time-format.html). Bootbox does not enforce this rule, but your max value may not be enforced by this browser.'):console.warn('Browsers which natively support the "date" input type expect date values to be of the form "YYYY-MM-DD" (see ISO-8601 https://www.iso.org/iso-8601-date-and-time-format.html). Bootbox does not enforce this rule, but your min value may not be enforced by this browser.');else if('time'===t){if(e!==c&&!(r=x(e)))throw new Error('"min" is not a valid time. See https://www.w3.org/TR/2012/WD-html-markup-20120315/datatypes.html#form.data.time for more information.');if(o!==c&&!(n=x(o)))throw new Error('"max" is not a valid time. See https://www.w3.org/TR/2012/WD-html-markup-20120315/datatypes.html#form.data.time for more information.')}else{if(e!==c&&isNaN(e))throw r=!1,new Error('"min" must be a valid number. See https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-min for more information.');if(o!==c&&isNaN(o))throw n=!1,new Error('"max" must be a valid number. See https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-max for more information.')}if(r&&n){if(o<=e)throw new Error('"max" must be greater than "min". See https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-max for more information.');a=!0}return a}(n.inputType,n.min,n.max)||(n.min!==c&&i.attr('min',n.min),n.max!==c&&i.attr('max',n.max));break;case'select':let r={};if(l=n.inputOptions||[],!s.isArray(l))throw new Error('Please pass an array of input options');if(!l.length)throw new Error('prompt with "inputType" set to "select" requires at least one option');n.required&&i.prop({required:!0}),n.multiple&&i.prop({multiple:!0}),f(l,function(t,e){let o=i;if(e.value===c||e.text===c)throw new Error('each option needs a "value" property and a "text" property');e.group&&(r[e.group]||(r[e.group]=s('<optgroup />').attr('label',e.group)),o=r[e.group]);let a=s(u.option);a.attr('value',e.value).text(e.text),o.append(a)}),f(r,function(t,e){i.append(e)}),i.val(n.value),n.bootstrap<5&&i.removeClass('form-select').addClass('form-control');break;case'checkbox':let e=s.isArray(n.value)?n.value:[n.value];if(!(l=n.inputOptions||[]).length)throw new Error('prompt with "inputType" set to "checkbox" requires at least one option');i=s('<div class="bootbox-checkbox-list"></div>'),f(l,function(t,o){if(o.value===c||o.text===c)throw new Error('each option needs a "value" property and a "text" property');let a=s(u.inputs[n.inputType]);a.find('input').attr('value',o.value),a.find('label').append('\n'+o.text),f(e,function(t,e){e===o.value&&a.find('input').prop('checked',!0)}),i.append(a)});break;case'radio':if(n.value!==c&&s.isArray(n.value))throw new Error('prompt with "inputType" set to "radio" requires a single, non-array value for "value"');if(!(l=n.inputOptions||[]).length)throw new Error('prompt with "inputType" set to "radio" requires at least one option');i=s('<div class="bootbox-radiobutton-list"></div>');let a=!0;f(l,function(t,e){if(e.value===c||e.text===c)throw new Error('each option needs a "value" property and a "text" property');let o=s(u.inputs[n.inputType]);o.find('input').attr('value',e.value),o.find('label').append('\n'+e.text),n.value!==c&&e.value===n.value&&(o.find('input').prop('checked',!0),a=!1),i.append(o)}),a&&i.find('input[type="radio"]').first().prop('checked',!0)}return t.append(i),t.on('submit',function(t){t.preventDefault(),t.stopPropagation(),e.find('.bootbox-accept').trigger('click')}),''!==s.trim(n.message)&&(a=s(u.promptMessage).html(n.message),t.prepend(a)),n.message=t,(e=r.dialog(n)).off('shown.bs.modal',m),e.on('shown.bs.modal',function(){i.focus()}),!0===o&&e.modal('show'),e},r});
